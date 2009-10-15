<?php
class merchantGroupInfo
{
	private $merchantgroupid;
	private $merchantgroupname;
	private $merchantgroupurl;

	public function merchantInfo()
	{

	}
	public function getMerchantgroupid()
	{
		return $this->merchantgroupid;
	}
	public function setMerchantgroupid($v)
	{
		$this->merchantgroupid = $v;
	}
	public function getMerchantgroupname()
	{
		return $this->merchantgroupname;
	}
	public function setMerchantgroupname($v)
	{
		$this->merchantgroupname = $v;
	}
	public function getMerchantgroupurl()
	{
		return $this->merchantgroupurl;
	}
	public function setMerchantgroupurl($v)
	{
		$this->merchantgroupurl = $v;
	}
}
?>