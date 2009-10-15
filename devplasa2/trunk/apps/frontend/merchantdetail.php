<?php
include_once('../../config/config_webstore.php');
include_once('../../apps/common_class.php');
include_once('../../lib/paginator.class.php');

class merchantdetail
{
	public function merchantdetail() {
		$this->config = new config();
		$this->commonClass = new commonClass();
		$this->commonClass->setConfig($this->config);
		$this->paginator = new Paginator();
		$this->parseData();
	}
	function parseData()
	{
		$query = 'count(//products/*/product[merchant_id="'.$_REQUEST["id"].'" and category="'.$_REQUEST["category"].'" and subcategory="'.$_REQUEST["subcategory"].'"])';

		$this->paginator->items_total = $this->commonClass->evaluateXML($query);
		$this->paginator->mid_range = 10;
		$this->paginator->is_querystring = true;
		$this->paginator->paginate();

		$query = '//products/page_'.$this->paginator->current_page.'/product[merchant_id="'.$_REQUEST["id"].'" and category="'.$_REQUEST["category"].'" and subcategory="'.$_REQUEST["subcategory"].'"]';
		$this->product_list = $this->commonClass->readXML($query);

		$query = '';
		if(isset($_REQUEST['id']) && !empty($_REQUEST['id'])) $query = '//merchants/merchant[@id="'.$_REQUEST["id"].'"]';
		$this->merchant_detail = $this->commonClass->readXML($query);
	}
	function getMerchantgroupName($group_id)
	{
		$query = '//merchantgroups/merchantgroup[@id="'.$group_id.'"]';
		return $this->commonClass->readXML($query)->item(0)->firstChild->nodeValue;

	}
}

?>