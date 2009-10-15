<?php
include_once('../../config/config.php');
include_once('../../apps/common_class.php');
include_once('../../classes/controller/user_info.php');

class users
{
	private $userinfo;
	private $infoList;
	public function users(){
		$this->config = new config();
		$this->common = new commonClass();
		$this->common->setConfig($this->config);
	}

	public function getUserinfo()
	{
		return $this->userinfo;
	}

	public function setUserinfo($v)
	{
		$this->userinfo= $v;
	}

	public function getInfoList()
	{
		return $this->infoList;
	}
	public function setInfoList($v)
	{
		$this->infoList = $v;
	}

	function requestPassword()
	{
		$con = $this->common->getConnection();
		if (!con)
		{
			die('Could not connect: ' . mysql_error());
		}

		$result;

		mysql_select_db($this->config->db_name, $con);

		$result = mysql_query("SELECT `user_id`, `username`,`password` FROM `plasa_users` WHERE `plasa_users`.`email` = '".$this->userinfo->getEmail()."'
		AND `plasa_users`.`usertype` = ".$this->userinfo->getUsertype()." AND `plasa_users`.`status` = ".$this->userinfo->getStatus()." LIMIT 0,1");

		mysql_close($con);

		if(isset($result))
		{
			$this->userinfo->setUserid(mysql_result($result, 0, 'user_id'));
			$this->userinfo->setUsername(mysql_result($result, 0, 'username'));
			$this->userinfo->setPassword($this->common->data_decrypt(mysql_result($result, 0, 'password')));

			return true;
		}
		else return false;
	}

	public function signupUser()
	{
		$con = $this->common->getConnection();
		if (!con)
		{
		  	die('Could not connect: ' . mysql_error());
		}

		$result;

		mysql_select_db($this->config->db_name, $con);

		mysql_query('BEGIN signup');

		$result = mysql_query("INSERT INTO `plasa_users` (`username`, `email`, `password`, `last_access`, `activationcode`, `status`, `usertype`)
		VALUES ('".$this->userinfo->getUsername()."', '".$this->userinfo->getEmail()."', '".$this->userinfo->getPassword()."',
		'".$this->userinfo->getLastaccess()."', '".$this->userinfo->getActivationcode()."', ".$this->userinfo->getStatus().", ".$this->userinfo->getUsertype().")");

		if(isset($result) && $result == 1)
		{
            $result = mysql_result(mysql_query("select last_insert_id()"),0);

			$result = mysql_query("INSERT INTO `plasa_users_profiles` (`user_id`, `created_at`, `acceptance`, `updated_at`)
			VALUES (".$result.", '".$this->userinfo->getCreatedat()."', '".$this->userinfo->getUpdatedat()."', ".$this->userinfo->getAcceptance().")");
		}

		if(isset($result) && $result == 1) mysql_query('COMMIT'); else mysql_query('ROLLBACK');

		mysql_close($con);

		return $result;
	}

	function checkusername()
	{
		$con = $this->common->getConnection();
		if (!con)
		{
			die('Could not connect: ' . mysql_error());
		}

		$result;

		mysql_select_db($this->config->db_name, $con);

		$result = mysql_result(mysql_query("select count(`plasa_users`.`user_id`) from `plasa_users`
		where `plasa_users`.`username`='".$this->userinfo->getUsername()."'"),0);

		if($result > 0) return true;
		else return false;
	}

	function checkemail()
	{
		$con = $this->common->getConnection();
		if (!con)
		{
			die('Could not connect: ' . mysql_error());
		}

		$result;

		mysql_select_db($this->config->db_name, $con);

		$result = mysql_result(mysql_query("select count(`plasa_users`.`user_id`) from `plasa_users`
		where `plasa_users`.`email`='".$this->userinfo->getEmail()."'"),0);

		if($result > 0) return true;
		else return false;
	}

	public function loginUser()
	{
		$con = $this->common->getConnection();
		if (!con)
		{
		  	die('Could not connect: ' . mysql_error());
		}

		$result;

		mysql_select_db($this->config->db_name, $con);

		$result = @mysql_result(mysql_query("select `plasa_users`.`user_id` from `plasa_users`
		where `plasa_users`.`username`='".$this->userinfo->getUsername()."' AND `plasa_users`.`password`='".$this->userinfo->getPassword()."'
		AND `plasa_users`.`status`=".$this->userinfo->getStatus()." AND `plasa_users`.`usertype`=".$this->userinfo->getUsertype().""),0);

		return $result;
	}
	function retrieveUserprofile($condition = '', $is_single = true)
	{
		$con = $this->common->getConnection();
		if (!con)
		{
		  	die('Could not connect: ' . mysql_error());
		}

		$result;

		mysql_select_db($this->config->db_name, $con);

		if($is_single)
		{
			$result = mysql_fetch_array(mysql_query("select * from `plasa_users` inner join `plasa_users_profiles` on `plasa_users`.`user_id` = `plasa_users_profiles`.`user_id`
			where 1=1 ".$condition));

			$this->loadSingledata($result);
		}
		else
		{
			$result = mysql_query("select * from `plasa_users` inner join `plasa_users_profiles` on `plasa_users`.`user_id` = `plasa_users_profiles`.`user_id`
			where 1=1 ".$condition);

			$this->loadListdata($result);

			return mysql_result(mysql_query("select count(`plasa_users`.`user_id`) from `plasa_users` inner join `plasa_users_profiles` on `plasa_users`.`user_id` = `plasa_users_profiles`.`user_id`
			where 1=1 ".$condition),0);
		}
	}
	function updateLastAccess($id, $lastaccess)
	{
		$con = $this->common->getConnection();
		if (!con)
		{
			die('Could not connect: ' . mysql_error());
		}

		$result;

		mysql_select_db($this->config->db_name, $con);

		$result = mysql_query("UPDATE `plasa_users` SET `last_access` = '".$lastaccess."' WHERE `user_id` = ".$id." ");

		mysql_close($con);
	}
	function updateUserprofile()
	{
		$con = $this->common->getConnection();
		if (!con)
		{
			die('Could not connect: ' . mysql_error());
		}

		$result;

		mysql_select_db($this->config->db_name, $con);

		mysql_query('BEGIN updateUserprofile');

		$result = mysql_query("UPDATE `plasa_users` SET `email` = '".$this->userinfo->getEmail()."' WHERE `user_id` = ".$this->userinfo->getUserid()." AND `status` = 1 ");

		if(isset($result) && $result == 1)
		{
			$result = mysql_query("UPDATE `plasa_users_profiles` SET `firstname` = '".$this->userinfo->getFirstname()."',
			`profile_picture` = '".$this->userinfo->getProfilepicture()."',
			`lastname` = '".$this->userinfo->getLastname()."', `state_id` = ".$this->userinfo->getStateid().",
			`city_id` = ".$this->userinfo->getCityid().", `country_id` = ".$this->userinfo->getCountryid().",
			`phone` = ".$this->userinfo->getCountryid().", `address1` = '".$this->userinfo->getAddress1()."',
			`address2` = '".$this->userinfo->getAddress2()."', `gender` = ".$this->userinfo->getGender().",
			`language_preference` = '".$this->userinfo->getLanguagepreference()."', `updated_at` = '".$this->userinfo->getUpdatedat()."',
			`zip` = '".$this->userinfo->getZip()."', `dob` = '".$this->userinfo->getDob()."' WHERE `user_id` = ".$this->userinfo->getUserid()." ");
		}


		if(isset($result) && $result == 1) mysql_query('COMMIT'); else mysql_query('ROLLBACK');

		mysql_close($con);

		return $result;
	}
	function activateUser()
	{
		$con = $this->common->getConnection();
		if (!con)
		{
			die('Could not connect: ' . mysql_error());
		}

		$result;

		mysql_select_db($this->config->db_name, $con);

		$result = mysql_query("UPDATE `plasa_users` SET `status` = ".$this->userinfo->getStatus()."
		WHERE `activationcode` = '".$this->userinfo->getActivationcode()."' AND `email` = '".$this->userinfo->getEmail()."' ");

		mysql_close($con);
	}
	function doSuspended()
	{
		$con = $this->common->getConnection();
		if (!con)
		{
			die('Could not connect: ' . mysql_error());
		}

		$result;

		mysql_select_db($this->config->db_name, $con);

		$result = mysql_query("UPDATE `plasa_users` SET `status` = ".$this->userinfo->getStatus()."
		WHERE `user_id` = '".$this->userinfo->getUserid()."' ");

		mysql_close($con);

		if(isset($result) && $result > 0) $result = true;
		else $result = false;

		return $result;
	}
	function doMultiSuspended()
	{
		$con = $this->common->getConnection();
		if (!con)
		{
			die('Could not connect: ' . mysql_error());
		}

		$result;

		mysql_select_db($this->config->db_name, $con);

		$result = mysql_query("UPDATE `plasa_users` SET `status` = ".$this->userinfo->getStatus()."
		WHERE `user_id` IN (".$this->userinfo->getUserid().") ");

		mysql_close($con);

		if(isset($result) && $result > 0) $result = true;
		else $result = false;

		return $result;
	}
	function loadSingledata($result)
	{
		if(isset($result) && !empty($result))
		{
			if(!$this->userinfo) $this->userinfo = new userInfo();
			$this->userinfo->setUserid((isset($result['user_id']))?$result['user_id']:'');
			$this->userinfo->setUsername((isset($result['username']))?$result['username']:'');
			$this->userinfo->setEmail((isset($result['email']))?$result['email']:'');
			$this->userinfo->setPassword((isset($result['password']))?$result['password']:'');
			$this->userinfo->setLastaccess((isset($result['last_access']))?$result['last_access']:'');
			$this->userinfo->setActivationcode((isset($result['activationcode']))?$result['activationcode']:'');
			$this->userinfo->setStatus((isset($result['status']))?$result['status']:'');
			$this->userinfo->setUserprofileid((isset($result['user_profile_id']))?$result['user_profile_id']:'');
			$this->userinfo->setFirstname((isset($result['firstname']))?$result['firstname']:'');
			$this->userinfo->setLastname((isset($result['lastname']))?$result['lastname']:'');
			$this->userinfo->setStateid((isset($result['state_id']))?$result['state_id']:'');
			$this->userinfo->setCityid((isset($result['city_id']))?$result['city_id']:'');
			$this->userinfo->setCountryid((isset($result['country_id']))?$result['country_id']:'');
			$this->userinfo->setPhone((isset($result['phone']))?$result['phone']:'');
			$this->userinfo->setAddress1((isset($result['address1']))?$result['address1']:'');
			$this->userinfo->setAddress2((isset($result['address2']))?$result['address2']:'');
			$this->userinfo->setGender((isset($result['gender']))?$result['gender']:'');
			$this->userinfo->setProfilepicture((isset($result['profile_picture']))?$result['profile_picture']:'');
			$this->userinfo->setLanguagepreference((isset($result['language_preference']))?$result['language_preference']:'');
			$this->userinfo->setCreatedat((isset($result['created_at']))?$result['created_at']:'');
			$this->userinfo->setUpdatedat((isset($result['updated_at']))?$result['updated_at']:'');
			$this->userinfo->setAcceptance((isset($result['acceptance']))?$result['acceptance']:'');
			$this->userinfo->setZip((isset($result['zip']))?$result['zip']:'');
			$this->userinfo->setDob((isset($result['dob']))?$result['dob']:'');
		}
	}
	function loadListdata($resultList)
	{
		if(isset($resultList) && !empty($resultList))
		{
			$i = 0;
			if(!isset($this->infoList)) $this->infoList = array();
			while($i < mysql_numrows($resultList))
			{
				$this->userinfo = new userInfo();
				$this->userinfo->setUserid(mysql_result($resultList, $i, 'user_id'));
				$this->userinfo->setUsername(mysql_result($resultList, $i, 'username'));
				$this->userinfo->setEmail(mysql_result($resultList, $i, 'email'));
				$this->userinfo->setPassword(mysql_result($resultList, $i, 'password'));
				$this->userinfo->setLastaccess(mysql_result($resultList, $i, 'last_access'));
				$this->userinfo->setActivationcode(mysql_result($resultList, $i, 'activationcode'));
				$this->userinfo->setStatus(mysql_result($resultList, $i, 'status'));
				$this->userinfo->setUserprofileid(mysql_result($resultList, $i, 'user_profile_id'));
				$this->userinfo->setFirstname(mysql_result($resultList, $i, 'firstname'));
				$this->userinfo->setLastname(mysql_result($resultList, $i, 'lastname'));
				$this->userinfo->setStateid(mysql_result($resultList, $i, 'state_id'));
				$this->userinfo->setCityid(mysql_result($resultList, $i, 'city_id'));
				$this->userinfo->setCountryid(mysql_result($resultList, $i, 'country_id'));
				$this->userinfo->setPhone(mysql_result($resultList, $i, 'phone'));
				$this->userinfo->setAddress1(mysql_result($resultList, $i, 'address1'));
				$this->userinfo->setAddress2(mysql_result($resultList, $i, 'address2'));
				$this->userinfo->setGender(mysql_result($resultList, $i, 'gender'));
				$this->userinfo->setProfilepicture(mysql_result($resultList, $i, 'profile_picture'));
				$this->userinfo->setLanguagepreference(mysql_result($resultList, $i, 'language_preference'));
				$this->userinfo->setCreatedat(mysql_result($resultList, $i, 'created_at'));
				$this->userinfo->setUpdatedat(mysql_result($resultList, $i, 'updated_at'));
				$this->userinfo->setAcceptance(mysql_result($resultList, $i, 'acceptance'));
				$this->userinfo->setZip(mysql_result($resultList, $i, 'zip'));
				$this->userinfo->setDob(mysql_result($resultList, $i, 'dob'));

				$i++;

				array_push($this->infoList, $this->userinfo);
			}
		}
	}
}

?>