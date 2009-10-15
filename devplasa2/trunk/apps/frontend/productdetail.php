<?php
include_once('../../config/config_webstore.php');
include_once('../../apps/common_class.php');

class productdetail
{
	public function productdetail() {
		$this->config = new config();
		$this->commonClass = new commonClass();
		$this->commonClass->setConfig($this->config);
		$this->parseData();

		if(isset($_POST['__EVENTTARGET_PRODUCT']) && !empty($_POST['__EVENTTARGET_PRODUCT']) && $_POST['__EVENTTARGET_PRODUCT'] == 'addproduct')
			$this->addtocart();
	}

	function parseData()
	{
		$query = '//products/*/product[product_id="'.$_REQUEST["pid"].'"]';
		$this->product_detail = $this->commonClass->readXML($query);

		$query = '';
		if(isset($_REQUEST['id']) && !empty($_REQUEST['id'])) $query = '//merchants/merchant[@id="'.$_REQUEST["id"].'"]';
		$this->merchant_detail = $this->commonClass->readXML($query);
	}
	function getMerchantgroupName($group_id)
	{
		$query = '//merchantgroups/merchantgroup[@id="'.$group_id.'"]';
		return $this->commonClass->readXML($query)->item(0)->firstChild->nodeValue;

	}

/*
	function addtocart()
	{
		$result = array();

		if(!empty($_SESSION['session_xml']))
			$result = $_SESSION['session_xml'];

		$is_existing_product_id = false;

		if(isset($result) && count($result) > 0)
		{
			foreach($result as $key => $value)
			{
				echo $key.'---'.$_REQUEST["pid"];
				if($key == $_REQUEST["pid"])
				{
					if(isset($_POST['qty']) && $_POST['qty'] > 0) $value[1] += $_POST['qty'];
					else $value[1] += 1;

					$is_existing_product_id = true;
				}
			}

			if(!$is_existing_product_id)
			{
				array_push($result, array($_REQUEST["pid"] => array($_REQUEST["id"] => (isset($_POST['qty']))? $_POST['qty'] : 0)));
			}
		}
		else $result = array($_REQUEST["pid"] => array($_REQUEST["id"] => (isset($_POST['qty']))? $_POST['qty'] : 0));

		$_SESSION['session_xml'] = $result;
		//if($_SESSION['session_xml'] != null) $_SESSION['session_xml'] = $result;
		var_dump($_SESSION['session_xml']);
	}
	*/

	function addtocart()
	{
		$dom;
		$root;

		if(empty($_SESSION['session_xml']))
		{
			$dom = new DOMDocument("1.0");
			// create root element
			$root = $dom->createElement("products");
			$dom->appendChild($root);
			$dom->formatOutput=true;
			$dom->preserveWhiteSpace = false;
		}
		else
		{
			$dom = new DOMDocument("1.0");
			$dom->loadXML($_SESSION['session_xml']);
			$dom->formatOutput=true;
			$dom->preserveWhiteSpace = false;
			$root = $dom->getElementsByTagName("products");

			if($root != null) $root = $root->item(0);
		}

		if($root != null)
		{
			$xpath = new DOMXPath($dom);
			$result = $xpath->query('//products/product[@id="'.$_REQUEST["pid"].'"]');

			if($result->item(0) == null)
			{
				// create child element
				$product = $dom->createElement("product");
				$root->appendChild($product);

				$id = $dom->createAttribute("id");
				$product->appendChild($id);

				$idValue = $dom->createTextNode((isset($_REQUEST['pid']))? $_REQUEST['pid'] : 0);
				$id->appendChild($idValue);

				$id = $dom->createAttribute("merchant_id");
				$product->appendChild($id);

				$idValue = $dom->createTextNode((isset($_REQUEST['id']))? $_REQUEST['id'] : 0);
				$id->appendChild($idValue);

				$id = $dom->createAttribute("qty");
				$product->appendChild($id);

				$idValue = $dom->createTextNode((isset($_POST['qty']))? $_POST['qty'] : 1);
				$id->appendChild($idValue);
			}
			else
			{
				$attrVal = $result->item(0)->getAttribute("qty");
				if(isset($_POST['qty']) && !empty($_POST['qty'])) $result->item(0)->setAttribute("qty", $attrVal + $_POST['qty']);
				else $result->item(0)->setAttribute("qty", $attrVal + 1);
				$result = $result->item(0);

				$dom->importNode($result, true);
			}
		}


		$_SESSION['session_xml'] = $dom->saveXML();

		$xpath = new DOMXPath($dom);
		$_SESSION['session_pcount'] = $xpath->evaluate('count(//products/product)');

		$result = $this->commonClass->readXML('//merchants/merchant[@id="'.$_REQUEST['id'].'"]');
		if($result != null && $result->item(0) != null)
		{
			$_SESSION['session_pmerchant'] = $result->item(0)->getAttribute("id").','.$result->item(0)->firstChild->nodeValue.','.$result->item(0)->getAttribute("");
		}

		$this->commonClass->redirect($_SERVER['REQUEST_URI']);
	}
}

?>