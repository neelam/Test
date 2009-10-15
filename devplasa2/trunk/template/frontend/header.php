<?php $time_start = microtime(1); ?>
<?php
include_once('../../apps/frontend/header.php');

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
	<title><?php echo $config->page_title ?><?php echo (!empty($header_interface->pagetitle))? ' - '.$header_interface->pagetitle : '' ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="imagetoolbar" content="no" />
	<meta name="description" content="Plasa Indonesia" />
	<meta name="keywords" content="plasa, mall, store, merchant, indonesian" />

	<link rel="stylesheet" type="text/css" href="<?php echo $config->live_site.'web/frontend/css/shared/default.css' ?>" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?php echo $config->live_site.'web/frontend/css/shared/navi.css' ?>" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?php echo $config->live_site.'web/frontend/css/shared/footer.css' ?>" media="screen" />

	<script type="text/javascript" src="<?php echo $config->live_site.'web/js/jquery-1.2.6.js' ?>"></script>
	<script type="text/javascript" src="<?php echo $config->live_site.'web/js/jquery.tooltips.js' ?>"></script>
	<script type="text/javascript" src="<?php echo $config->live_site.'web/js/jquery.validate.js' ?>"></script>
	<script type="text/javascript" src="<?php echo $config->live_site.'web/js/jquery-ui-1.7.2.custom.min.js' ?>"></script>
	<!-- slider -->
	<script type="text/javascript" src="<?php echo $config->live_site.'web/js/jquery-easing-1.3.pack.js' ?>"></script>
	<script type="text/javascript" src="<?php echo $config->live_site.'web/js/jquery-easing-compatibility.1.2.pack.js' ?>"></script>
	<script type="text/javascript" src="<?php echo $config->live_site.'web/js/coda-slider.1.1.1.pack.js' ?>"></script>

	<script type="text/javascript">

		var theInt = null;
		var $crosslink, $navthumb;
		var curclicked = 0;

		theInterval = function(cur){
			clearInterval(theInt);

			if( typeof cur != 'undefined' )
				curclicked = cur;

			$crosslink.removeClass("active-thumb");
			$navthumb.eq(curclicked).parent().addClass("active-thumb");
				$(".stripNav ul li a").eq(curclicked).trigger('click');

			theInt = setInterval(function(){
				$crosslink.removeClass("active-thumb");
				$navthumb.eq(curclicked).parent().addClass("active-thumb");
				$(".stripNav ul li a").eq(curclicked).trigger('click');
				curclicked++;
				if( 8 == curclicked )
					curclicked = 0;

			}, 3000);
		};

		$(function(){

			$("#main-photo-slider").codaSlider();

			$navthumb = $(".nav-thumb");
			$crosslink = $(".cross-link");

			$navthumb
			.click(function() {
				var $this = $(this);
				theInterval($this.parent().attr('href').slice(1) - 1);
				return false;
			});

			theInterval();
		});
	</script>

</head>

<body>
<form id="header_form1" name="header_form1" action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post" >
<input type="hidden" id="__EVENTTARGET" name="__EVENTTARGET" />
<input type="hidden" id="__EVENTARGUMENT" name="__EVENTARGUMENT" />
	<input type="hidden" id="hid_lang" name="hid_lang" />
	<script type="text/javascript">
		$(document).ready(function(){
			$('#lang_bahasa').click(function(){
				$('#hid_lang').val('id');
				$('#header_form1').submit();
			});
			$('#lang_english').click(function(){
				$('#hid_lang').val('en');$('#header_form1').submit();
			});
			$('#btnlogin').click(function(){
				obj = $('#__EVENTTARGET'); if(obj) obj.val("login");
				obj = $('#__EVENTARGUMENT'); if(obj) obj.val('');
			});
			$('#btnviewcart, #doviewcart').click(function(){
				obj = $('#__EVENTTARGET'); if(obj) obj.val("doViewcart");
				obj = $('#__EVENTARGUMENT'); if(obj) obj.val('');
				$('#header_form1').submit();
			});

		});

	</script>
<!--</form>-->
<div id="topbar">
	<div id="topbar-c">
		<div class="language">
			<ul>
				<li><a href="javascript:void(0);" id="lang_bahasa">Bahasa</a></li>
				<li><a href="javascript:void(0);" id="lang_english">English</a></li>
			</ul>
		</div>

		<div class="back_to_plasa">
			<a href="http://www.plasa.com"><?php echo $header_interface->lang->getSinglelanguage('VISIT_THE_FORMER_PLASA_COM') ?></a>
		</div>

		<?php if(!empty($_SESSION['session_userid'])) { ?>
		<div class="edit_profile">
            <p><a href="userprofile_edit.php"><?php echo $header_interface->lang->getSinglelanguage('EDIT_PROFILE') ?></a>
            &nbsp;&nbsp;&nbsp;
            <a href="index.php?do=logout"><?php echo $header_interface->lang->getSinglelanguage('SIGN_OUT') ?></a>
            </p>
       </div>
       <?php } else { ?>
       <div class="user_login">
			<p><?php echo $header_interface->lang->getSinglelanguage('MEMBER_LOGIN') ?></p>
       </div>
       <?php } ?>
	</div>
</div><!-- end of top bar-->

<!--<form id="form_header_b" name="form_header_b" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">-->
<div id="header">
	<div id="header-c">
		<div class="logo">
			<a href="index.php"><img src="../../images/frontend/plasa-logo.png" alt="plasa.com logo" /></a>
		</div>

		<?php if(empty($_SESSION['session_userid'])) { ?>
		<div class="user_login-box">
			<ul>
				<li><input id="username" name="username" type="text" class="login-inputarea" value="<?php echo $header_interface->lang->getSingleLabel('USERNAME') ?>"
				onfocus="javascript:if(this.value == '<?php echo $header_interface->lang->getSingleLabel('USERNAME') ?>') this.value = '';"
				onblur="javascript:if(this.value == '') this.value = '<?php echo $header_interface->lang->getSingleLabel('USERNAME') ?>';return false;"></input></li>
				<li><input id="password" name="password" type="password" class="login-inputarea" value="<?php echo $header_interface->lang->getSingleLabel('PASSWORD') ?>"
				onfocus="javascript:if(this.value == '<?php echo $header_interface->lang->getSingleLabel('PASSWORD') ?>') this.value = '';"
				onblur="javascript:if(this.value == '') this.value = '<?php echo $header_interface->lang->getSingleLabel('PASSWORD') ?>';return false;"></input></li>
				<li><input id="btnlogin" name="btnlogin" type="submit" value="LOGIN" class="login-button"></input></li>
				<li><a href="forgotpassword.php"><?php echo $header_interface->lang->getSinglelanguage('FORGOT_PASSWORD?') ?></a></li>
			</ul>
		</div>
		<?php } ?>
		<!---- menu bar ---->
		<div class="menubar">
			<div class="mainmenu">
				<ul>
					<li><a href="index.php"><?php echo $header_interface->lang->getSinglelanguage('HOME') ?></a></li>
					<li><a href="merchantdirectory.php"><?php echo $header_interface->lang->getSinglelanguage('MERCHANT_DIRECTORY') ?></a></li>
					<li><a href="howtobuy.php"><?php echo $header_interface->lang->getSinglelanguage('HOW_TO_BUY') ?></a></li>
					<li><a href="#"><?php echo $header_interface->lang->getSinglelanguage('SUPPORT') ?></a></li>
				</ul>
			</div>

			<div class="signup">
            	<?php if(!empty($_SESSION['session_userid'])) { ?>
                <a href="userprofile.php" class="signup-button"><?php echo $header_interface->lang->getSinglelanguage('VIEW_PROFILE') ?></a>
                <?php } else { ?>
				<a href="register.php" class="signup-button"><?php echo $header_interface->lang->getSinglelanguage('SIGN_UP_NOW') ?></a>
                <?php } ?>
			</div>
			<div class="search">
				<ul>
					<li style="padding-left:22px"><img src="../../images/frontend/find-icon.png" alt="find icon" /></li>
					<li><h1><?php echo $header_interface->lang->getSinglelanguage('FIND') ?></h1></li>
					<li><input type="text" class="search-inputarea" value="<?php echo $header_interface->lang->getSinglelanguage('SEARCH_ANYTHING_HERE') ?>"
					onfocus="javascript:if(this.value == '<?php echo $header_interface->lang->getSinglelanguage('SEARCH_ANYTHING_HERE') ?>') this.value = '';" onblur="javascript:if(this.value == '') this.value = '<?php echo $header_interface->lang->getSinglelanguage('SEARCH_ANYTHING_HERE') ?>';return false;"></input></li>
					<li><input type="submit" class="search-button" value="<?php echo $header_interface->lang->getSinglelanguage('SEARCH') ?>"></input></li>
				</ul>
			</div>

		</div>

		<?php if($_SESSION['session_pcount'] > 0) { ?>
		<div class="quickcart">
			<div class="quickcart-title">
				<h4>Quick Cart</h4>
			</div>
			<div class="mycart">
				<?php $pmerchant = explode(',', $_SESSION['session_pmerchant'], 3) ?>
				<p>You have <a href="javascript:void(0);" id="doviewcart" name="doviewcart" ><?php echo $_SESSION['session_pcount'] ?> items</a> in your cart at <a href="merchantcategory.php?id=<?php echo $pmerchant[0] ?>&groupid=<?php echo $pmerchant[2] ?>"><?php echo $pmerchant[1] ?></a></p>
				<p><input id="btnviewcart" name="btnviewcart" type="submit" value="VIEW CART"  class="checkout-button" /></p>
			</div>
		</div>
		<?php } else { ?>
		<!-- quick cart -->
		<div class="quickcart">
			<div class="quickcart-title">
				<h4><?php echo $header_interface->lang->getSinglelanguage('QUICK_CART') ?></h4>
			</div>

			<div class="mycart">
				<p><?php echo $header_interface->lang->getSinglelanguage('YOUR_CART_IS_EMPTY_NOW') ?></p>
				<p><a href="shoppingcart.html"><?php echo $header_interface->lang->getSinglelanguage('GO_TO_YOUR_SHOPPING_CART') ?></a></p>
			</div>
		</div>

		<?php } ?>

		<!-- main banner -->
		<div class="mainbanner">
			<div class="slider-wrap">
					<div id="main-photo-slider" class="csw">
						<div class="panelContainer">

							<div class="panel">
								<div class="wrapper"><a href="merchantdetail.php"><img src="../../images/frontend/sample-banner.jpg" alt="sample banner"/></a></div>
                        	</div>

                        	<div class="panel">
								<div class="wrapper"><a href="merchantdetail.php"><img src="../../images/frontend/sample-banner2.jpg" alt="sample banner"/></a></div>
                        	</div>

                        	<div class="panel">
								<div class="wrapper"><a href="merchantdetail.php"><img src="../../images/frontend/sample-banner3.jpg" alt="sample banner"/></a></div>
                        	</div>



                        </div><!-- end of panel container -->
                     </div><!-- end of main photo slider -->
			</div><!-- end of slider wrap -->
		</div>

	</div>
</div>

</form>
</form>