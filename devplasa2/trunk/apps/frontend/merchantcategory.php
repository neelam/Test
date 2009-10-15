<?php
include_once('../../config/config_webstore.php');
include_once('../../apps/common_class.php');

class merchantcategory
{
	public function merchantcategory() {
		$this->config = new config();
		$this->commonClass = new commonClass();
		$this->commonClass->setConfig($this->config);
		$this->parseData();
	}

	function parseData()
	{
		$query = 'count(//products/*/product/subcategory)';
		$this->subcategory_count = $this->commonClass->evaluateXML($query);

		$query = '//products/*/product/category';
		$this->category_list = $this->commonClass->readXML($query);
		$temp = array();

		foreach($this->category_list as $value)
		{
			array_push($temp, $value->firstChild->nodeValue);
		}
		$this->category_list = array_unique($temp);

		$query = '//products/*/product[product_type="feature" and merchant_id="'.$_REQUEST["id"].'"]';
		$this->feature_product_list = $this->commonClass->readXML($query);

		if($this->feature_product_list->item(0) == null)
		{

			$query = '//products/*/product[merchant_id="'.$_REQUEST["id"].'" and product_id < 21]';
			//$this->feature_product_list = $this->commonClass->readXML($query);
		}

		$query = '';
		if(isset($_REQUEST['id']) && !empty($_REQUEST['id'])) $query = '//merchants/merchant[@id="'.$_REQUEST["id"].'"]';
		$this->merchant_detail = $this->commonClass->readXML($query);
	}
	function getProductcountByCategory($merchant_id, $category)
	{
		$query = 'count(//products/*/product[merchant_id="'.$merchant_id.'" and category="'.$category.'"])';
		return $this->commonClass->evaluateXML($query);
	}
	function getMerchantgroupName($group_id)
	{
		$query = '//merchantgroups/merchantgroup[@id="'.$group_id.'"]';
		return $this->commonClass->readXML($query)->item(0)->firstChild->nodeValue;
	}
}

?>