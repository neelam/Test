<?php
class parseXml
{
	var $insideitem = false;
	var $from;
    var $tag = "";
    var $product_list;
    var $merchant_list;
    var $merchant_group_list;
    var $merchat_product_list = array();
    var $product;
    var $merchant;
    var $detail_id=0;
    var $detail_second_id = 0;
    var $is_detail = false;
    var $merchant_group;

	public function parseXml($from = 'index'){
		$this->from = $from;
	}
	function setInsideItem($tagname_lower, $is_true)
	{
		switch(strtolower($tagname_lower))
		{
			case "pname" :
			case "category" :
			case "subcategory" :
			case "merchantname" :
			case "companyname" :
			case "regno" :
			case "address" :
			case "phone" :
			case "email" :
			case "merchantimage" :
			case "nowprice" :
			case "nowcurrency" :
			case "previousprice" :
			case "previouscurrency" :
			case "mallpcode" :
			case "merchantpcode" :
			case "sizeinfo" :
			case "largeimage" :
			case "smallimage" :
			case "thumbnail" :
			case "others" :
			case "description" :
			case "longdescription" :
			case "prodstatus" :
			case "merchantname" :
			case "companyname" :
			case "regno" :
			case "address" :
			case "phone" :
			case "email" :
			case "product_id" :
			case "merchantgroup" :
			case "merchatdescription" :
			case "merchatdescriptionlong" : if($is_true) $this->insideitem = true; else $this->insideitem = false; break;
		}
	}

    function startElement($parser, $tagName, $attrs)
    {
		if($this->from == 'index')
		{
			$this->tag = $tagName;

			$this->setInsideItem($this->tag, true);

			if(strcasecmp($tagName, 'merchant') == 0)
			{//Start merchant here!
				if($this->merchant == null) $this->merchant = new merchantInfo();
				if(isset($attrs) && isset($attrs["ID"])) $this->merchant->setMerchantid($attrs["ID"]);
				if(isset($attrs) && isset($attrs["TYPE"])) $this->merchant->setMechanttype($attrs["TYPE"]);
				if(isset($attrs) && isset($attrs["GROUP"])) $this->merchant->setMerchantgroup($attrs["GROUP"]);
			}

			if(strcasecmp($tagName, 'product') == 0)
			{//Start product here!
				if($this->product == null) $this->product = new productInfo();
				if(isset($attrs) && isset($attrs["ID"])) $this->product->setProductid($attrs["ID"]);
				if(isset($attrs) && isset($attrs["TYPE"])) $this->product->setProducttype($attrs["TYPE"]);
				if(isset($attrs) && isset($attrs["MERCHANTID"])) $this->product->setMerchantid($attrs["MERCHANTID"]);
			}
		}
		else if($this->from == 'product_detail')
		{
			$this->tag = $tagName;
			$this->setInsideItem($this->tag, true);

			if(strcasecmp($tagName, 'product') == 0)
			{//Start product here!
				if(isset($attrs) && isset($attrs["ID"]) && $attrs["ID"] == $this->detail_id)
				{
					$this->is_detail = true;
					if($this->product == null) $this->product = new productInfo();
					if(isset($attrs) && isset($attrs["ID"])) $this->product->setProductid($attrs["ID"]);
					if(isset($attrs) && isset($attrs["MERCHANTID"])) $this->product->setMerchantid($attrs["MERCHANTID"]);
					if(isset($attrs) && isset($attrs["TYPE"])) $this->product->setProducttype($attrs["TYPE"]);
					$this->detail_second_id = $this->product->GetMerchantid();
				}
			}

			if(strcasecmp($tagName, 'merchant') == 0)
			{//Start merchant here!
				if(isset($attrs) && isset($attrs["ID"]) && $attrs["ID"] == $this->detail_second_id)
				{
					$this->is_detail = true;
					if($this->merchant == null) $this->merchant = new merchantInfo();
					if(isset($attrs) && isset($attrs["ID"])) $this->merchant->setMerchantid($attrs["ID"]);
					if(isset($attrs) && isset($attrs["TYPE"])) $this->merchant->setMechanttype($attrs["TYPE"]);
					if(isset($attrs) && isset($attrs["GROUP"])) $this->merchant->setMerchantgroup($attrs["GROUP"]);
				}
			}
		}
		else if($this->from == 'merchant_detail')
		{
			$this->tag = $tagName;
			$this->setInsideItem($this->tag, true);

			if(strcasecmp($tagName, 'product') == 0)
			{//Start product here!
				if(isset($attrs) && isset($attrs["MERCHANTID"]) && $attrs["MERCHANTID"] == $this->detail_id)
				{
					$this->is_detail = true;
					if($this->product == null) $this->product = new productInfo();
					if(isset($attrs) && isset($attrs["ID"])) $this->product->setProductid($attrs["ID"]);
					if(isset($attrs) && isset($attrs["MERCHANTID"])) $this->product->setMerchantid($attrs["MERCHANTID"]);
					if(isset($attrs) && isset($attrs["TYPE"])) $this->product->setProducttype($attrs["TYPE"]);
				}
			}

			if(strcasecmp($tagName, 'merchant') == 0)
			{//Start merchant here!
				if(isset($attrs) && isset($attrs["ID"]) && $attrs["ID"] == $this->detail_id)
				{
					$this->is_detail = true;
					if($this->merchant == null) $this->merchant = new merchantInfo();
					if(isset($attrs) && isset($attrs["ID"])) $this->merchant->setMerchantid($attrs["ID"]);
					if(isset($attrs) && isset($attrs["TYPE"])) $this->merchant->setMechanttype($attrs["TYPE"]);
					if(isset($attrs) && isset($attrs["GROUP"])) $this->merchant->setMerchantgroup($attrs["GROUP"]);
				}
			}
		}


		if($this->from == 'index' || $this->from == 'forgotpassword' || $this->from == 'register')
		{
			if(strcasecmp($tagName, 'merchantgroup') == 0)
			{//Start product here!
				$this->tag = $tagName;
				$this->setInsideItem($this->tag, true);

				if($this->merchant_group == null) $this->merchant_group = new merchantGroupInfo();

				if(isset($attrs) && isset($attrs["ID"])) $this->merchant_group->setMerchantgroupid($attrs["ID"]);
			}
		}
    }

    function endElement($parser, $tagName) {
    	$this->setInsideItem($this->tag, false);
    	if($this->from == 'index')
    	{
    		//$this->setInsideItem($this->tag, false);

			if(strcasecmp($tagName, 'longdescription') == 0)
			{
				if($this->product_list == null) $this->product_list = array();
  				if($this->product != null) {
  					array_push($this->product_list, $this->product);
  					unset($this->product);
  				}
  			}

			if(strcasecmp($tagName, 'merchatdescriptionlong') == 0)
			{
  				if($this->merchant_list == null) $this->merchant_list = array();
  				if($this->merchant != null) {
  					$this->merchant->setProductlist($this->merchat_product_list);
  					array_push($this->merchant_list, $this->merchant);
  					unset($this->merchant);
  				}
  			}
  		}
  		else if($this->from == 'product_detail' || $this->from == 'merchant_detail')
  		{
			$this->setInsideItem($this->tag, false);

			if($this->is_detail)
			{
				if(strcasecmp($tagName, 'longdescription') == 0)
				{
					$this->is_detail = false;

					if($this->from == 'merchant_detail')
					{
						if($this->product_list == null) $this->product_list = array();
						if($this->product != null) {
							array_push($this->product_list, $this->product);
							unset($this->product);
  						}
					}
				}

				if(strcasecmp($tagName, 'merchatdescriptionlong') == 0)
				{
					$this->is_detail = false;
					$this->merchant->setProductlist($this->merchat_product_list);
				}
			}
  		}


		if($this->from == 'index' || $this->from == 'forgotpassword' || $this->from == 'register')
		{
  			if(strcasecmp($tagName, 'merchantgroup') == 0)
			{
				if($this->merchant_group_list == null) $this->merchant_group_list = array();
					if($this->merchant_group != null) {
						array_push($this->merchant_group_list, $this->merchant_group);
						unset($this->merchant_group);
				}

			}
		}
    }

    function characterData($parser, $data)
    {
    	if($this->from == 'index' || $this->from == 'product_detail' || $this->from == 'merchant_detail')
    	{
    		//echo ($this->from == 'product_detail' || $this->from == 'merchant_detail') && $this->is_detail.'<br/>';
    		if($this->insideitem && ($this->from == 'index' || (($this->from == 'product_detail' || $this->from == 'merchant_detail') && $this->is_detail)))
			{
			//	echo $is_detail.'---'.$data.'<br/>';
				if($this->product != null)
				{
					switch(strtolower($this->tag))
					{
						case "pname" : $this->product->setProductname($data); break;
						case "category" : $this->product->setCategory($data); break;
						case "subcategory" : $this->product->setSubcategory($data); break;
						case "nowprice" : $this->product->setNowprice($data); break;
						case "nowcurrency" : $this->product->setNowcurrency($data); break;
						case "previousprice" : $this->product->setPreviousprice($data); break;
						case "previouscurrency" : $this->product->setPreviouscurrency($data); break;
						case "mallpcode" : $this->product->setMallpcode($data); break;
						case "merchantpcode" : $this->product->setMerchantpcode($data); break;
						case "sizeinfo" : $this->product->setSizeinfo($data); break;
						case "largeimage" : $this->product->setLargeimage($data); break;
						case "smallimage" : $this->product->setSmallimage($data); break;
						case "thumbnail" : $this->product->setThumbnail($data); break;
						case "others" : $this->product->setOthers($data); break;
						case "description" : $this->product->setDescription($data); break;
						case "longdescription" : $this->product->setDescriptionLong($data); break;
						case "prodstatus" : $this->product->setProductstatus($data); break;
					}
				}

				if($this->merchant != null)
				{
					switch(strtolower($this->tag))
					{
						case "merchantname" : $this->merchant->setMerchantname($data); break;
						case "companyname" : $this->merchant->setCompanyname($data); break;
						case "regno" : $this->merchant->setRegno($data); break;
						case "address" : $this->merchant->setAddress($data); break;
						case "phone" : $this->merchant->setPhone($data); break;
						case "email" : $this->merchant->setEmail($data); break;
						case "merchantimage" : $this->merchant->setMerchantimage($data); break;
						case "product" : array_push($this->merchat_product_list, $data); break;
						case "merchatdescription" : $this->merchant->setMerchantdesc($data); break;
						case "merchatdescriptionlong" : $this->merchant->setMerchantlongdesc($data); break;
					}
				}


			}
		}

		if($this->from == 'index' || $this->from == 'forgotpassword' || $this->from == 'register')
		{
			if($this->merchant_group != null)
			{
				switch(strtolower($this->tag))
				{
					case "merchantgroup" : $this->merchant_group->setMerchantgroupname($data); break;
				}
			}
		}
    }
}
?>