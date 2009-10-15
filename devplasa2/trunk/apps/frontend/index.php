<?php

include_once('../../classes/model/Users_webstore.php');
include_once('../../apps/common_class.php');
include_once('../../classes/controller/merchant_info.php');
include_once('../../classes/controller/product_info.php');
include_once('../../classes/controller/merchant_group_info.php');


class index
{
	public function index() {
		$this->config = new config();
		$this->commonClass = new commonClass();
		$this->commonClass->setConfig($this->config);
		if(isset($_REQUEST['do']) && $_REQUEST['do'] == 'logout') { session_destroy(); 	$this->commonClass->redirect('index.php'); }
		$this->parseData();
	}

	function parseData()
	{
		$query = '//products/*/product[product_type="feature"]';
		$this->feature_product_list = $this->commonClass->readXML($query);

		$query = '//products/*/product[product_type="hot"]';
		$this->hot_product_list = $this->commonClass->readXML($query);

		$query = '//merchants/merchant[@type="feature"]';
		$this->feature_merchant_list = $this->commonClass->readXML($query);

		$query = '//merchantgroups/merchantgroup';
		$this->merchant_group_list = $this->commonClass->readXML($query);

	}
}

?>