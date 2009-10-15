<?php
include_once('../../classes/model/Users_webstore.php');

class howtobuy
{
	public function howtobuy() {
		$this->users = new users();

/*
		$xml = file_get_contents('php://input');
		echo $xml.'----'.';;';
		$dom = new DOMDocument("1.0");

		$dom->loadXML($xml);

		if($dom != null){
			echo $dom->saveXML().'sadssd';
			$root = $dom->getElementsByTagName("products");


			foreach($root as $a)
			{
				var_dump($a->getAttribute("id"));
			}

		}

  		exit();
*/
	}
}

?>