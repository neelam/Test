<?php
//include_once('../../config/config.php');
include_once('../../apps/common_class.php');

class reference
{
	public function reference(){
		$this->config = new config();
		$this->commonConstant = new commonConstant();
		$this->common = new commonClass();
		$this->common->setConfig($this->config);
	}
	public function loadState($condition = '')
	{
		$con = $this->common->getConnection();
		if (!con)
		{
		  	die('Could not connect: ' . mysql_error());
		}

		$result;

		mysql_select_db($this->config->db_name, $con);

		$result = mysql_query("select * from `plasa_state` WHERE 1=1 ".$condition);

		mysql_close($con);

		return $result;
	}

	public function loadCity($condition = '')
	{
		$con = $this->common->getConnection();
		if (!con)
		{
			die('Could not connect: ' . mysql_error());
		}

		$result;

		mysql_select_db($this->config->db_name, $con);
		$result = mysql_query("SELECT * FROM `plasa_city` WHERE 1=1 ".$condition);
		mysql_close($con);

		return $result;
	}

	public function loadCountry($condition = '')
	{
		$con = $this->common->getConnection();
		if (!con)
		{
			die('Could not connect: ' . mysql_error());
		}

		$result;

		mysql_select_db($this->config->db_name, $con);
		$result = mysql_query("SELECT * FROM `plasa_country` WHERE 1=1 ".$condition);
		mysql_close($con);

		return $result;
	}

	function loadGender($selectedVal = 0, $attr = '')
	{
		$result = "<select ".$attr.">";

		$i = 0;
		foreach($this->commonConstant->gender as $key => $value)
		{
			if($key == $selectedVal) $result .= "<option value='".$key."' selected='selected'>".$value."</option>";
			else $result .= "<option value='".$key."'>".$value."</option>";
		}

		$result .= '</select>';

		return $result;
	}

	public function buildSelectBox($resultVal, $selectedVal = 0, $key_name, $value_name, $attr = '')
	{
		$result = "<select ".$attr.">";

		$i = 0;
		while($i < mysql_numrows($resultVal))
		{
			$key = mysql_result($resultVal, $i, $key_name);
			$value = mysql_result($resultVal, $i, $value_name);

			if(isset($key) && isset($value))
			{
				if($key == $selectedVal) $result .= "<option value='".$key."' selected='selected'>".$value."</option>";
				else $result .= "<option value='".$key."'>".$value."</option>";
			}
			$i++;
		}

		$result .= '</select>';

		return $result;
	}
}

?>