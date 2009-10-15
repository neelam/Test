<?php
include_once('../../config/config_webstore.php');
include_once('../../apps/common_class.php');
class merchantsubcategory
{
	public function merchantsubcategory() {
		$this->config = new config();
		$this->commonClass = new commonClass();
		$this->commonClass->setConfig($this->config);
		$this->parseData();
	}

	function parseData()
	{
		$query = '';
		if(isset($_REQUEST['id']) && !empty($_REQUEST['id'])) $query = '//merchants/merchant[@id="'.$_REQUEST["id"].'"]';
		$this->merchant_detail = $this->commonClass->readXML($query);

		$query = '//products/*/product[product_id < 5 and merchant_id="'.$_REQUEST["id"].'" and category="'.$_REQUEST["category"].'"]';
		$subcategory_list_temp = $this->commonClass->readXML($query);
		$temp = array();

		foreach($subcategory_list_temp as $obj)
		{
			array_push($temp, $obj->firstChild->nextSibling->nextSibling->nextSibling->nextSibling->nextSibling->nodeValue);
		}

		$this->subcategory_list = array_unique($temp);
	}

	function getSubcategoryCount($subcategory)
	{
		$query = 'count(//products/*/product[merchant_id="'.$_REQUEST["id"].'" and category="'.$_REQUEST["category"].'" and subcategory="'.$subcategory.'"])';
		return $this->commonClass->evaluateXML($query);

	}
	function getProductListbySubCategory($subcategory)
	{
		$query = '//products/*/product[product_id < 5 and merchant_id="'.$_REQUEST["id"].'" and category="'.$_REQUEST["category"].'" and subcategory="'.$subcategory.'"]';
		return $this->commonClass->readXML($query);
	}
	function getMerchantgroupName($group_id)
	{
		$query = '//merchantgroups/merchantgroup[@id="'.$group_id.'"]';
		return $this->commonClass->readXML($query)->item(0)->firstChild->nodeValue;

	}
}

?>