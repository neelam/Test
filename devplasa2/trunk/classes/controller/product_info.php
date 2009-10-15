<?php
include_once('merchant_info.php');
class productInfo extends merchantInfo
{
	private $productid;
	private $productname;
	private $category;
	private $subcategory;
	private $producttype;
	private $nowprice;
	private $nowcurrency;
	private $previousprice;
	private $previouscurrency;
	private $mallpcode;
	private $merchantpcode;
	private $sizeinfo;
	private $largeimage;
	private $smallimage;
	private $thumbnail;
	private $others;
	private $description;
	private $productstatus;
	private $description_long;

	public function productInfo()
	{

	}

	public function getProductid()
	{
		return $this->productid;
	}
	public function setProductid($v)
	{
		$this->productid = $v;
	}

	public function getProductname()
	{
		return $this->productname;
	}

	public function setProductname($v)
	{
		$this->productname = $v;
	}

	public function getCategory()
	{
		return $this->category;
	}

	public function setCategory($v)
	{
		$this->category = $v;
	}

	public function getSubcategory()
	{
		return $this->subcategory;
	}

	public function setSubcategory($v)
	{
		$this->subcategory = $v;
	}

	public function getProducttype()
	{
		return $this->producttype;
	}

	public function setProducttype($v)
	{
		$this->producttype = $v;
	}

	public function getNowprice()
	{
		return $this->nowprice;
	}

	public function setNowprice($v)
	{
		$this->nowprice = $v;
	}

	public function getNowcurrency()
	{
		return $this->nowcurrency;
	}

	public function setNowcurrency($v)
	{
		$this->nowcurrency = $v;
	}

	public function getPreviousprice()
	{
		return $this->previousprice;
	}

	public function setPreviousprice($v)
	{
		$this->previousprice = $v;
	}

	public function getPreviouscurrency()
	{
		return $this->previouscurrency;
	}

	public function setPreviouscurrency($v)
	{
		$this->previouscurrency = $v;
	}
	public function getMallpcode()
	{
		return $this->mallpcode;
	}
	public function setMallpcode($v)
	{
		$this->mallpcode = $v;
	}
	public function getMerchantpcode()
	{
		return $this->merchantpcode;
	}
	public function setMerchantpcode($v)
	{
		$this->merchantpcode = $v;
	}
	public function getSizeinfo()
	{
		return $this->sizeinfo;
	}
	public function setSizeinfo($v)
	{
		$this->sizeinfo = $v;
	}
	public function getLargeimage()
	{
		return $this->largeimage;
	}
	public function setLargeimage($v)
	{
		$this->largeimage = $v;
	}
	public function getSmallimage()
	{
		return $this->smallimage;
	}
	public function setSmallimage($v)
	{
		$this->smallimage = $v;
	}
	public function getThumbnail()
	{
		return $this->thumbnail;
	}
	public function setThumbnail($v)
	{
		$this->thumbnail = $v;
	}
	public function getOthers()
	{
		return $this->others;
	}

	public function setOthers($v)
	{
		$this->others = $v;
	}
	public function getDescription()
	{
		return $this->description;
	}

	public function setDescription($v)
	{
		$this->description = $v;
	}

	public function getProductstatus()
	{
		return $this->productstatus;
	}

	public function setProductstatus($v)
	{
		$this->productstatus = $v;
	}
	public function getDescriptionLong()
	{
		return $this->description_long;
	}

	public function setDescriptionLong($v)
	{
		$this->description_long = $v;
	}
}

?>