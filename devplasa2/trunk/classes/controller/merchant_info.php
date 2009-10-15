<?php
class merchantInfo
{
	private $merchantid;
	private $merchantname;
	private $companyname;
	private $mechanttype;
	private $merchantgroup;
	private $regno;
	private $address;
	private $phone;
	private $email;
	private $fax;
	private $city;
	private $state;
	private $country;
	private $postalcode;
	private $merchantdesc;
	private $merchantlongdesc;
	private $merchantimage;
	private $productlist;//array with product id

	public function merchantInfo()
	{

	}
	public function getMerchantid()
	{
		return $this->merchantid;
	}
	public function setMerchantid($v)
	{
		$this->merchantid = $v;
	}
	public function getMerchantname()
	{
		return $this->merchantname;
	}
	public function setMerchantname($v)
	{
		$this->merchantname = $v;
	}
	public function getCompanyname()
	{
		return $this->companyname;
	}
	public function setCompanyname($v)
	{
		$this->companyname = $v;
	}
	public function getMechanttype()
	{
		return $this->mechanttype;
	}
	public function setMechanttype($v)
	{
		$this->mechanttype = $v;
	}
	public function getMerchantgroup()
	{
		return $this->merchantgroup;
	}
	public function setMerchantgroup($v)
	{
		$this->merchantgroup = $v;
	}
	public function getRegno()
	{
		return $this->regno;
	}
	public function setRegno($v)
	{
		$this->regno = $v;
	}
	public function getAddress()
	{
		return $this->address;
	}
	public function setAddress($v)
	{
		$this->address = $v;
	}
	public function getPhone()
	{
		return $this->phone;
	}
	public function setPhone($v)
	{
		$this->phone = $v;
	}
	public function getEmail()
	{
		return $this->email;
	}
	public function setEmail($v)
	{
		$this->email = $v;
	}
	public function getFax()
	{
		return $this->fax;
	}
	public function setFax($v)
	{
		$this->fax = $v;
	}
	public function getCity()
	{
		return $this->city;
	}
	public function setCity($v)
	{
		$this->city = $v;
	}
	public function getState()
	{
		return $this->state;
	}
	public function setState($v)
	{
		$this->state = $v;
	}
	public function getCountry()
	{
		return $this->country;
	}
	public function setCountry($v)
	{
		$this->country = $v;
	}
	public function getPostalcode()
	{
		return $this->postalcode;
	}
	public function setPostalcode($v)
	{
		$this->postalcode = $v;
	}
	public function getMerchantdesc()
	{
		return $this->merchantdesc;
	}
	public function setMerchantdesc($v)
	{
		$this->merchantdesc = $v;
	}
	public function getMerchantlongdesc()
	{
		return $this->merchantlongdesc;
	}
	public function setMerchantlongdesc($v)
	{
		$this->merchantlongdesc = $v;
	}
	public function getMerchantimage()
	{
		return $this->merchantimage;
	}
	public function setMerchantimage($v)
	{
		$this->merchantimage = $v;
	}
	public function getProductlist()
	{
		return $this->productlist;
	}

	public function setProductlist($v)
	{
		$this->productlist = $v;
	}
}
?>