<?php
include_once('../../classes/model/Users.php');
include_once('../../lib/paginator.class.php');
include_once('../../apps/common_constant.php');

class userlist
{
	public function userlist() {
		$this->users = new users();
		if(!isset($_SESSION['session_userid']) || empty($_SESSION['session_userid'])) $this->users->common->redirect('login.php');
		$this->paginator = new Paginator();
		$this->commonConstant = new commonConstant();

		if(isset($_REQUEST['do']) && $_REQUEST['do'] == 'suspended' && isset($_REQUEST['who']))
			$this->doSuspended($_REQUEST['who']);
		else if(isset($_REQUEST['do']) && $_REQUEST['do'] == 'multisuspend' && isset($_REQUEST['params']))
		{
			$this->doMultiSuspended($_REQUEST['params']);
		}

		$this->getUserList_All();
	}

	function getConditionOption()
	{
		$result;

		if(isset($_REQUEST['do']) && $_REQUEST['do'] == 'search' && isset($_POST['search']) && $_POST['search'] != 'Search user here')
		{
			$result = " AND (`plasa_users`.`username` LIKE '%".$_POST['search']."%' ";
			$result .= " OR `plasa_users`.`email` LIKE '%".$_POST['search']."%' ";
			$result .= " OR `plasa_users_profiles`.`firstname` LIKE '%".$_POST['search']."%' ";
			$result .= " OR `plasa_users_profiles`.`lastname` LIKE '%".$_POST['search']."%' ";
			$result .= " OR (case `plasa_users`.`status` when 0 then '".$this->commonConstant->user_status[0]."'
			when 1 then '".$this->commonConstant->user_status[1]."' when 2 then '".$this->commonConstant->user_status[2]."'
			end) LIKE '%".$_POST['search']."%'";
			$result .= " ) ";
		}

		$limit = (isset($this->paginator->limit))? ' LIMIT '.$this->paginator->limit : '';

		if(isset($_POST['__EVENTTARGET']) && !empty($_POST['__EVENTTARGET']) && $_POST['__EVENTTARGET'] == 'sort_username')
			$result .= (isset($_POST['__EVENTARGUMENT']))? ' ORDER BY `plasa_users`.`username` '.$_POST['__EVENTARGUMENT'] : ' ORDER BY `plasa_users`.`username` ';
		else if(isset($_POST['__EVENTTARGET']) && !empty($_POST['__EVENTTARGET']) && $_POST['__EVENTTARGET'] == 'sort_date')
			$result .= (isset($_POST['__EVENTARGUMENT']))? ' ORDER BY `plasa_users_profiles`.`created_at` '.$_POST['__EVENTARGUMENT'] : ' ORDER BY `plasa_users_profiles`.`created_at` ';
		else if(isset($_POST['__EVENTTARGET']) && !empty($_POST['__EVENTTARGET']) && $_POST['__EVENTTARGET'] == 'sort_email')
			$result .= (isset($_POST['__EVENTARGUMENT']))? ' ORDER BY `plasa_users`.`email` '.$_POST['__EVENTARGUMENT'] : ' ORDER BY `plasa_users`.`email` ';
		else if(isset($_POST['__EVENTTARGET']) && !empty($_POST['__EVENTTARGET']) && $_POST['__EVENTTARGET'] == 'sort_status')
			$result .= (isset($_POST['__EVENTARGUMENT']))? ' ORDER BY `plasa_users`.`status` '.$_POST['__EVENTARGUMENT'] : ' ORDER BY `plasa_users`.`status` ';

		$result .= $limit;

		return $result;
	}

	function getUserList_All()
	{
		$this->paginator->items_total = $this->users->retrieveUserprofile($this->getConditionOption(), false);
		$this->paginator->mid_range = 9;
		$this->paginator->paginate();
	}

	function doSuspended($who)
	{
		$this->userInfo = new userInfo();
		$this->userInfo->setUserid($who);
		$this->userInfo->setStatus(2);
		$this->users->setUserinfo($this->userInfo);

		$this->users->doSuspended();
	}
	function doMultiSuspended($list)
	{
		$this->userInfo = new userInfo();
		$this->userInfo->setUserid($list);
		$this->userInfo->setStatus(2);

		$this->users->doMultiSuspended();
	}
}

?>