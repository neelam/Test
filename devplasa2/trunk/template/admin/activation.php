<?php include_once('header.php'); ?>
<?php
include_once('../../apps/admin/activation.php');
class activation_interface extends activation
{
	public function activation_interface(){
		parent::activation();
	}
}

$activation_interface = new activation_interface();

?>

<h2>Congratulations, Username</h2>
<p>Your account at plasa.com has been activated.<a href="login.php">Click here</a> to log in.</p>


<?php include_once('footer.php'); ?>