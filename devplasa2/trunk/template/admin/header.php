<?php
include_once('../../apps/admin/header.php');

class header_interface extends header
{
	public function header_interface(){
		parent::header();
	}
}

$header_interface = new header_interface();

?>
<?php if(!isset($config)) $config = new config(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo $config->page_title ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="imagetoolbar" content="no" />
	<?php if(strstr($_SERVER["PHP_SELF"] , "login.php") != "login.php" && strstr($_SERVER["PHP_SELF"] , "forgotpassword.php") != "forgotpassword.php") { ?>
	<link rel="stylesheet" type="text/css" href="<?php echo $config->live_site.'web/admin/css/shared/default.css' ?>" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?php echo $config->live_site.'web/admin/css/shared/navi.css' ?>" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?php echo $config->live_site.'web/admin/css/shared/footer.css' ?>" media="screen" />
	<?php } ?>
	<link rel="stylesheet" type="text/css" href="<?php echo $config->live_site.'web/admin/css/admin.css' ?>" media="screen" />
	<script type="text/javascript" src="<?php echo $config->live_site.'web/js/jquery-1.2.6.js' ?>"></script>
	<script type="text/javascript" src="<?php echo $config->live_site.'web/js/jquery.validate.js' ?>"></script>
	<script type="text/javascript" src="<?php echo $config->live_site.'web/js/jquery-ui-1.7.2.custom.min.js' ?>"></script>
	<body>
		<?php if(strstr($_SERVER["PHP_SELF"] , "login.php") != "login.php" && strstr($_SERVER["PHP_SELF"] , "forgotpassword.php") != "forgotpassword.php") { ?>

		<div id="page">
			<div id="top">
				<div class="top-link">
					<ul>
						<li><a href="http://www.plasa.com" target="_blank">Visit plasa.com</a></li>
						<li><a href="#" target="_blank">Visit Web Store Admin</a></li>
						<li><a href="#" target="_blank">Visit Merchant Admin</a></li>
					</ul>
				</div>
			</div>
			<div id="header">
				<div class="header-row1">
					<div class="logo">
						<a href="index.html"><img src="<?php echo $config->live_site.'images/admin/plasa-logo.png' ?>" alt="plasa.com logo" /></a>
					</div>
					<div class="login-area">
						<div class="login-box">
							<ul>
								<li><p>Welcome Administrator</p></li>
								<li><p><a href="#">Manage your account</a></p></li>
								<li><p><a href="login.php?do=logout">Logout</a></p></li>
							</ul>
						</div>
					</div>
				</div> <!-- end of header first row -->

				<div class="header-row2">
					<div class="navi">
						<ul>
							<li <?php echo (isset($header_interface) && $header_interface->current_menu == 'dashboard') ? 'id=current' : ''; ?> ><a href="dashboard.php">Dashboard</a></li>
							<li <?php echo (isset($header_interface) && $header_interface->current_menu == 'user') ? 'id=current': ''; ?> ><a href="userlist.php">User Management</a></li>
						</ul>
					</div>
				</div> <!-- end of header second row -->

				<div class="header-row3">
					<div class="search-area">
						<form id="frmsearch" name="frmsearch" action="userlist.php?do=search" method="POST">
							<div class="search-form">
								<ul>
									<li><input type="text" value="Search user here" class="search-inputarea" id="search" name="search" onfocus="javascript:if(this.value == 'Search user here') this.value = '';" onblur="javascript:if(this.value == '') this.value = 'Search user here';return false;" ></input></li>
									<li><input type="image" src="<?php echo $config->live_site.'images/frontend/search-button.gif' ?>" alt="search button" /></a></li>
								</ul>
							</div>
						</form>
					</div>
				</div> <!-- end of header third row -->
			</div> <!-- end of header section -->

		<?php } ?>
