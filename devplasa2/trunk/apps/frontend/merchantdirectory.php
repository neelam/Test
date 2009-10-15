<?php
include_once('../../classes/model/Users_webstore.php');
include_once('../../apps/common_class.php');

class merchantdirectory
{
	public function merchantdirectory() {
		$this->users = new users();
		$this->parseData();
	}
	function parseData()
	{
		//$query = '//merchants/merchant/[group="'.(isset($_REQUEST['id']) && !empty($_REQUEST['id']))? $_REQUEST["id"] : "".'"]';
		$query = '';
		if(isset($_REQUEST['id']) && !empty($_REQUEST['id'])) $query = '//merchants/merchant[@group="'.$_REQUEST["id"].'"]';
		else $query = '//merchants/merchant[@type="feature"]';
		$this->merchant_list = $this->users->common->readXML($query);

		$query = '//merchantgroups/merchantgroup';
		$this->merchant_group_list = $this->users->common->readXML($query);
	}
	function NoFeature_OneCategory($merchant_id)
	{
		$query = 'count(//products/*/product[merchant_id="'.$merchant_id.'"]/category)';
		$category_count = $this->users->common->evaluateXML($query);

		$query = 'count(//products/*/product[merchant_id="'.$merchant_id.'" and product_type="feature"])';
		$feature_count = $this->users->common->evaluateXML($query);

		if(($category_count <= 1) && $feature_count < 1){
			$query = 'count(//products/*/product[merchant_id="'.$merchant_id.'"]/category)';
			$temp = $this->users->common->evaluateXML($query);
			if($temp != null) $this->category_name = $temp->item(0)->nodeValue;
			return true;
		}
		return false;
	}
	function is_hasProduct($merchant_id)
	{
		$query = 'count(//products/*/product[merchant_id = "'.$merchant_id.'"])';
		if($this->users->common->evaluateXML($query) > 0) return true; else return false;
	}
	function getMerchantgroupName($group_id)
	{
		$query = '//merchantgroups/merchantgroup[@id="'.$group_id.'"]';
		return $this->users->common->readXML($query)->item(0)->firstChild->nodeValue;
	}
}

?>