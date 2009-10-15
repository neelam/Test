<?php
include_once('../../classes/model/Users_webstore.php');
include_once('../../apps/common_constant.php');
include_once('../../classes/model/reference_class.php');

class userprofile_edit
{
	public function userprofile_edit() {
		$this->users = new users();


	if(!isset($_SESSION['session_userid']) || empty($_SESSION['session_userid'])) $this->users->common->redirect('index.php');
		$this->reference = new reference();

		if(isset($_POST['__EVENTTARGET_PROFILE']) && $_POST['__EVENTTARGET_PROFILE'] == 'update_profile')
			$this->updateUserprofile();

		//if(isset($_REQUEST['do']) && !empty($_REQUEST['do']) && $_REQUEST['do'] == 'edit'
		  //&& isset($_REQUEST['who']) && !empty($_REQUEST['who']))
		//{
			$this->userInfo = new userInfo();
			$this->userInfo->setUserid($_SESSION['session_userid']);
			$this->users->setUserinfo($this->userInfo);
			$this->retrieveUserprofile();

		//}
		//else if($this->users->getUserinfo() != null && $this->users->getUserinfo()->getUserid() != 0)
			//$this->retrieveUserprofile();
	}

	function validate()
	{
		$result = false;

		if(isset($this->userInfo))
		{
			if(!$this->users->common->validator('require', $this->userInfo->getEmail())) return $result;
			if(!$this->users->common->validator('email', $this->userInfo->getEmail())) return $result;

			$result = true;
		}

		return $result;
	}

	function retrieveUserprofile()
	{
		$this->users->retrieveUserprofile(' AND `plasa_users`.`user_id`='.$this->users->getUserinfo()->getUserid().'', true);
	}

	function updateUserprofile()
	{
		$this->userInfo = new userInfo();
		$this->userInfo->setUserid((isset($_POST['userid']))?$_POST['userid']:'');
		$this->userInfo->setEmail((isset($_POST['email']))?$_POST['email']:'');
		$this->userInfo->setFirstname((isset($_POST['firstname']))?$_POST['firstname']:'');
		$this->userInfo->setLastname((isset($_POST['lastname']))?$_POST['lastname']:'');
		$this->userInfo->setStateid((isset($_POST['cbostate']))?$_POST['cbostate']:'');
		$this->userInfo->setCityid((isset($_POST['cbocity']))?$_POST['cbocity']:'');
		$this->userInfo->setCountryid((isset($_POST['cbocountry']))?$_POST['cbocountry']:'');
		$this->userInfo->setPhone((isset($_POST['phone']))?$_POST['phone']:'');
		$this->userInfo->setAddress1((isset($_POST['address1']))?$_POST['address1']:'');
		$this->userInfo->setAddress2((isset($_POST['address2']))?$_POST['address2']:'');
		$this->userInfo->setGender((isset($_POST['gender']))?$_POST['gender']:'');
		$this->userInfo->setLanguagepreference((isset($_POST['language']))?$_POST['language']:'');
		$this->userInfo->setUpdatedat(date('Y-m-d H:i:s'));
		$this->userInfo->setZip((isset($_POST['zip']))?$_POST['zip']:'');
		$this->userInfo->setDob((isset($_POST['dob']))? date_create($_POST['dob']):'');

		$this->userInfo->setDob((isset($_POST['dob']))? $_POST['dob']:'');
		$this->userInfo->setProfilepicture((isset($_FILES['openssme']['name']))? $_FILES['openssme']['name'] : '');

		if($this->userInfo->getProfilepicture() != '')
		{
			$target_path = $this->users->config->absolute_url."upload/".$this->userInfo->getUserid().'/';
			if(!is_dir($target_path)) mkdir($target_path, 0777);
			$target_path .= basename($_FILES['openssme']['name']);

			if(move_uploaded_file($_FILES['openssme']['tmp_name'], $target_path)) {
			    //echo "The file ".  basename( $_FILES['uploadedfile']['name']).
			    //" has been uploaded";
			} else{
			    //echo "There was an error uploading the file, please try again!";
			}
		}
		else $this->userInfo->setProfilepicture((isset($_POST['hidphoto']))? $_POST['hidphoto'] : '');

		$this->users->setUserinfo($this->userInfo);

		if($this->validate())
		{
			if($this->users->updateUserprofile()) $this->msg = 'Update Successfully!';
		}
	}

}

?>