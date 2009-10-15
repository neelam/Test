<?php
class userInfo
{
	private $userid;
	private $username;
	private $email;
	private $usertype;
	private $password;
	private $lastaccess;
	private $activationcode;
	private $status;
	private $userprofileid;
	private $firstname;
	private $lastname;
	private $stateid;
	private $cityid;
	private $countryid;
	private $phone;
	private $address1;
	private $address2;
	private $gender;
	private $profilepicture;
	private $languagepreference;
	private $createdat;
	private $updatedat;
	private $acceptance;
	private $zip;
	private $dob;

	public function userInfo()
	{
		$this->defaultValues();
	}

	public function defaultValues()
	{
	}

	public function getUserid()
	{
		return $this->userid;
	}
	public function setUserid($v)
	{
		$this->userid = $v;
	}

	public function getUsername()
	{
		return $this->username;
	}

	public function setUsername($v)
	{
		$this->username = $v;
	}
	public function getUsertype()
	{
		return $this->usertype;
	}

	public function setUsertype($v)
	{
		$this->usertype = $v;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setEmail($v)
	{
		$this->email = $v;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function setPassword($v)
	{
		$this->password = $v;
	}

	public function getLastaccess()
	{
		return $this->lastaccess;
	}

	public function setLastaccess($v)
	{
		$this->lastaccess = $v;
	}

	public function getActivationcode()
	{
		return $this->activationcode;
	}

	public function setActivationcode($v)
	{
		$this->activationcode = $v;
	}

	public function getStatus()
	{
		return $this->status;
	}

	public function setStatus($v)
	{
		$this->status = $v;
	}

	public function getUserprofileid()
	{
		return $this->userprofileid;
	}
	public function setUserprofileid($v)
	{
		$this->userprofileid = $v;
	}

	public function getFirstname()
	{
		return $this->firstname;
	}

	public function setFirstname($v)
	{
		$this->firstname = $v;
	}

	public function getLastname()
	{
		return $this->lastname;
	}

	public function setLastname($v)
	{
		$this->lastname = $v;
	}

	public function getStateid()
	{
		return $this->stateid;
	}

	public function setStateid($v)
	{
		$this->stateid = $v;
	}

	public function getCityid()
	{
		return $this->cityid;
	}

	public function setCityid($v)
	{
		$this->cityid = $v;
	}

	public function getCountryid()
	{
		return $this->countryid;
	}

	public function setCountryid($v)
	{
		$this->countryid = $v;
	}

	public function getPhone()
	{
		return $this->phone;
	}

	public function setPhone($v)
	{
		$this->phone = $v;
	}

	public function getAddress1()
	{
		return $this->address1;
	}

	public function setAddress1($v)
	{
		$this->address1 = $v;
	}

	public function getAddress2()
	{
		return $this->address2;
	}

	public function setAddress2($v)
	{
		$this->address2 = $v;
	}

	public function getGender()
	{
		return $this->gender;
	}

	public function setGender($v)
	{
		$this->gender = $v;
	}

	public function getProfilepicture()
	{
		return $this->profilepicture;
	}

	public function setProfilepicture($v)
	{
		$this->profilepicture = $v;
	}

	public function getLanguagepreference()
	{
		return $this->languagepreference;
	}

	public function setLanguagepreference($v)
	{
		$this->languagepreference = $v;
	}

	public function getCreatedat()
	{
		return $this->createdat;
	}

	public function setCreatedat($v)
	{
		$this->createdat = $v;
	}

	public function getUpdatedat()
	{
		return $this->updatedat;
	}

	public function setUpdatedat($v)
	{
		$this->updatedat = $v;
	}

	public function getAcceptance()
	{
		return $this->acceptance;
	}

	public function setAcceptance($v)
	{
		$this->acceptance = $v;
	}

	public function getZip()
	{
		return $this->zip;
	}

	public function setZip($v)
	{
		$this->zip = $v;
	}

	public function getDob()
	{
		return $this->dob;
	}

	public function setDob($v)
	{
		$this->dob = $v;
	}
}
?>