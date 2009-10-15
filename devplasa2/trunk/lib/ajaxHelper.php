<?php
class ajaxHelper
{
	public function ajaxHelper(){
		if(isset($_REQUEST['for']) && !empty($_REQUEST['for']) && $_REQUEST['for'] == 'user') $this->for_user_model();
	}

	function for_user_model()
	{
		include_once('../../config/config_webstore.php');
		include_once('../../apps/common_class.php');
		include_once('../../classes/model/Users_webstore.php');
		$this->users = new users();
		if(isset($_REQUEST['do']) && !empty($_REQUEST['do']) && $_REQUEST['do'] == 'ajax_checkusername')
			$this->ajax_checkusername($_REQUEST['who']);
		else if(isset($_REQUEST['do']) && !empty($_REQUEST['do']) && $_REQUEST['do'] == 'ajax_checkemail')
			$this->ajax_checkemail($_REQUEST['who']);
		else if(isset($_REQUEST['do']) && !empty($_REQUEST['do']) && $_REQUEST['do'] == 'ajax_addtocart')
			$this->ajax_addtocart();
	}

	function validate($lang)
	{
		if(isset($_REQUEST['who']))
		{
			if(isset($_REQUEST['do']) && !empty($_REQUEST['do']) && $_REQUEST['do'] == 'ajax_checkusername')
			{
				if(!$this->users->common->validator('require', $_REQUEST['who'])) return $lang->getSingleError_msg('REQUIRE_USERNAME');
				if(!$this->users->common->validator('minlen', $_REQUEST['who'], 3)) return $lang->getSingleError_msg('MIN_USERNAME');
				if(!$this->users->common->validator('maxlen', $_REQUEST['who'], 30)) return $lang->getSingleError_msg('MAX_USERNAME');
			}

			if(isset($_REQUEST['do']) && !empty($_REQUEST['do']) && $_REQUEST['do'] == 'ajax_checkemail')
			{
				if(!$this->users->common->validator('require', $_REQUEST['who'])) return $lang->getSingleError_msg('REQUIRE_EMAIL');
				if(!$this->users->common->validator('email', $_REQUEST['who'])) return $lang->getSingleError_msg('INVALID_EMAIL');
				if(!$this->users->common->validator('maxlen', $_REQUEST['who'], 100)) return $lang->getSingleError_msg('MAX_EMAIL');
			}
		}

		return '';
	}
	function ajax_checkusername($who)
	{
		$lang_folder = (isset($_POST['hid_lang']) && !empty($_POST['hid_lang']))? $_POST['hid_lang'] : ((isset($_COOKIE['lang']) && !empty($_COOKIE['lang']))? $_COOKIE['lang']: 'en');
		$lang_folder = '../../lang/'.$lang_folder.'/language.php';
		include_once($lang_folder);
		$lang = new language_class();

		$validate = $this->validate($lang);
		if(isset($validate) && empty($validate))
		{
			$this->userInfo = new userInfo();
			$this->userInfo->setUsername((isset($who))? $who :'');
			$this->users->setUserinfo($this->userInfo);

			header ("content-type: text/xml");
			echo '<?xml version="1.0" encoding="utf-8" ?><result>';
			if($this->users->checkusername()) echo '<text>'.$lang->getSingleError_msg('S_USERNAME_NOT_AVAILABLE').'</text>';
			else echo '<text>'.$lang->getSingleError_msg('S_USERNAME_AVAILABLE').'</text>';
			echo '</result>';
		}
		else
		{
			header ("content-type: text/xml");
			echo '<?xml version="1.0" encoding="utf-8" ?><result>';
			echo '<text>'.$validate.'</text>';
			echo '</result>';
		}
	}
	function ajax_checkemail($who)
	{
		$lang_folder = (isset($_POST['hid_lang']) && !empty($_POST['hid_lang']))? $_POST['hid_lang'] : ((isset($_COOKIE['lang']) && !empty($_COOKIE['lang']))? $_COOKIE['lang']: 'en');
		$lang_folder = '../../lang/'.$lang_folder.'/language.php';
		include_once($lang_folder);
		$lang = new language_class();

		$validate = $this->validate($lang);
		if(isset($validate) && empty($validate))
		{
			$this->userInfo = new userInfo();
			$this->userInfo->setEmail((isset($who))? $who :'');
			$this->users->setUserinfo($this->userInfo);

			header ("content-type: text/xml");
			echo '<?xml version="1.0" encoding="utf-8" ?><result>';
			if($this->users->checkemail()) echo '<text>'.$lang->getSingleError_msg('S_EMAIL_NOT_AVAILABLE').'</text>';
			else echo '<text>'.$lang->getSingleError_msg('S_EMAIL_AVAILABLE').'</text>';
			echo '</result>';
		}
		else
		{
			header ("content-type: text/xml");
			echo '<?xml version="1.0" encoding="utf-8" ?><result>';
			echo '<text>'.$validate.'</text>';
			echo '</result>';
		}
	}
	function ajax_addtocart()
	{

include_once('../../config/config_webstore.php');
include_once('../../lib/sessions/session_mysql.php');
		$dom;
		$root;
		if(empty($_SESSION['session_xml']))
		{
			echo 'New';
			$dom = new DOMDocument("1.0");
			// create root element
			$root = $dom->createElement("products");
			$dom->appendChild($root);
			$dom->formatOutput=true;
			$dom->preserveWhiteSpace = false;
		}
		else
		{
			echo 'Exist';
			$dom = $_SESSION['session_xml'];
			$dom->formatOutput=true;
			$doc->preserveWhiteSpace = false;
			$root = $doc->getElementsByTagName("products")->item(0);
		}

		if($root != null)
		{
			$xpath = new DOMXPath($dom);

			$result = $xpath->query('//products/product[@id="'.$_REQUEST["id"].'"]');

			if($result->item(0) == null)
			{
				// create child element
				$product = $dom->createElement("product");
				$root->appendChild($product);

				$id = $dom->createAttribute("id");
				$product->appendChild($id);

				$idValue = $dom->createTextNode((isset($_REQUEST['id']))? $_REQUEST['id'] : 0);
				$id->appendChild($idValue);

				$id = $dom->createAttribute("merchant_id");
				$product->appendChild($id);

				$idValue = $dom->createTextNode((isset($_REQUEST['mid']))? $_REQUEST['mid'] : 0);
				$id->appendChild($idValue);

				$id = $dom->createAttribute("qty");
				$product->appendChild($id);

				$idValue = $dom->createTextNode((isset($_REQUEST['qty']))? $_REQUEST['qty'] : 1);
				$id->appendChild($idValue);
			}
			else
			{
				$attrVal = $result->item(0)->getAttribute();
				$result->setAttribute("qty", $attrVal++);
			}
		}

		$dom->saveXML();

		var_dump($_SESSION['session_xml']);

		//$this->addProduct();
	}
	function addProduct()
	{
			if($_SESSION['session_xml'] != null)
			{
				$doc = $_SESSION['session_xml'];

				$products = $doc->getElementsByTagName("products");

				foreach($products as $product)
				{
				  $name = $product->firstChild->getAttribute('id');
				  $m = $product->firstChild->getAttribute('merchant_id');
				  $qty = $product->firstChild->getAttribute('qty');

				  echo "$name.'--'.$m.'--'.$qty";
  			}
		}
	}
}
?>