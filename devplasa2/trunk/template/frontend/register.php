<?php include_once('header.php'); ?>
<?php
include_once('../../apps/frontend/register.php');
class register_interface extends register
{
	public function register_interface(){
		parent::register();
	}
}

$register_interface = new register_interface();

?>

	<script type="text/javascript">
	$(document).ready(function(){
		$(function() {
			$("#form_reg").validate({
				rules: {
					username: {
						required: true,
						minlength: 3,
						maxlength: 30
					},

					email: {
						required: true,
						email: true,
						maxlength: 100
					},

					upassword: {
						required: true,
						minlength: 6,
						maxlength: 50
					},

					upasswordconfirm: {
						required: true,
						minlength: 6,
						maxlength: 50,
						equalTo: "#upassword"
					},

					termscondition : "required"
				},

				messages: {
					username: {
						required : "<span><?php echo (isset($GLOBALS['header_interface']) && isset($GLOBALS['header_interface']->lang))? $GLOBALS['header_interface']->lang->getSingleError_msg('REQUIRE_USERNAME'):'' ?></span>",
						minlength : "<?php echo (isset($GLOBALS['header_interface']) && isset($GLOBALS['header_interface']->lang))? $GLOBALS['header_interface']->lang->getSingleError_msg('MIN_USERNAME'):'' ?>",
						maxlength : "<?php echo (isset($GLOBALS['header_interface']) && isset($GLOBALS['header_interface']->lang))? $GLOBALS['header_interface']->lang->getSingleError_msg('MAX_USERNAME'):'' ?>",
					},

					email: {
						required : "<?php echo (isset($GLOBALS['header_interface']) && isset($GLOBALS['header_interface']->lang))? $GLOBALS['header_interface']->lang->getSingleError_msg('REQUIRE_EMAIL'):'' ?>",
						email : "<?php echo (isset($GLOBALS['header_interface']) && isset($GLOBALS['header_interface']->lang))? $GLOBALS['header_interface']->lang->getSingleError_msg('INVALID_EMAIL'):'' ?>",
						maxlength : "<?php echo (isset($GLOBALS['header_interface']) && isset($GLOBALS['header_interface']->lang))? $GLOBALS['header_interface']->lang->getSingleError_msg('MAX_EMAIL'):'' ?>",
					},

					upassword: {
						required: "<?php echo (isset($GLOBALS['header_interface']) && isset($GLOBALS['header_interface']->lang))? $GLOBALS['header_interface']->lang->getSingleError_msg('REQUIRE_PASSWORD'):'' ?>",
						minlength: "<?php echo (isset($GLOBALS['header_interface']) && isset($GLOBALS['header_interface']->lang))? $GLOBALS['header_interface']->lang->getSingleError_msg('MIN_PASSWORD'):'' ?>",
						maxlength : "<?php echo (isset($GLOBALS['header_interface']) && isset($GLOBALS['header_interface']->lang))? $GLOBALS['header_interface']->lang->getSingleError_msg('MAX_PASSWORD'):'' ?>",
					},

					upasswordconfirm: {
						required: "<?php echo (isset($GLOBALS['header_interface']) && isset($GLOBALS['header_interface']->lang))? $GLOBALS['header_interface']->lang->getSingleError_msg('REQUIRE_CONFIRM_PASSWORD'):'' ?>",
						minlength: "<?php echo (isset($GLOBALS['header_interface']) && isset($GLOBALS['header_interface']->lang))? $GLOBALS['header_interface']->lang->getSingleError_msg('MIN_CONFIRM_PASSWORD'):'' ?>",
						equalTo: "<?php echo (isset($GLOBALS['header_interface']) && isset($GLOBALS['header_interface']->lang))? $GLOBALS['header_interface']->lang->getSingleError_msg('CONFIRM_PASSWORD_EQUAL_TO'):'' ?>",
						maxlength : "<?php echo (isset($GLOBALS['header_interface']) && isset($GLOBALS['header_interface']->lang))? $GLOBALS['header_interface']->lang->getSingleError_msg('MAX_CONFIRM_PASSWORD'):'' ?>"

					}
				},

				errorPlacement: function(error, element) {
					if(element && element.attr('id') == 'termscondition') error.insertBefore(element);
					else error.insertAfter(element);
				}
			});
		});

		$("#chkusername").click(function(){
			$.ajax({
				url     : $(this).attr('href') + '?for=user&do=ajax_checkusername&who=' + $('#username').val(),
				dataType: 'xml',
				complete: function(xml)
				{
					var data = xml.responseXML;
					$('#chkusername_show').html($(data).find("text").text());
				},
				beforeSend: function() {
					$('#chkusername_show').html('<img src="../../../../images/frontend/frontend/loading_arrow.gif" alt="Loading" /> <span><?php echo (isset($GLOBALS['header_interface']) && isset($GLOBALS['header_interface']->lang))? $GLOBALS['header_interface']->lang->getSinglelanguage('CHECKING_USERNAME'):'' ?></span>');
				}
			});
			return false;
		});

		$("#chkemail").click(function(){
			$.ajax({
				url     : $(this).attr('href') + '?for=user&do=ajax_checkemail&who=' + $('#email').val(),
				dataType: 'xml',
				complete: function(xml)
				{
					var data = xml.responseXML;
					$('#chkemail_show').html($(data).find("text").text());
				},
				beforeSend: function() {
					$('#chkemail_show').html('<img src="../../../../images/frontend/frontend/loading_arrow.gif" alt="Loading" /> <span><?php echo (isset($GLOBALS['header_interface']) && isset($GLOBALS['header_interface']->lang))? $GLOBALS['header_interface']->lang->getSinglelanguage('CHECKING_EMAIL'):'' ?></span>');
				}
			});
			return false;
		});

		$("#signup").click(function() {
				document.form_reg.__EVENTTARGET.value = 'signup';
				document.form_reg.__EVENTARGUMENT.value = 'signup';
				//obj = $('#__EVENTTARGET'); if(obj) obj.val("signup");
				//obj = $('#__EVENTARGUMENT'); if(obj) obj.val('');
		});

		$("#termscondition").click(function() {
				$("#tandc_content").css('display', 'inline');
		});
  	});
	</script>

	<div id="content">
	<div id="content-c">
		<div class="category">
			<div class="category-title">
				<h4><?php echo (isset($GLOBALS['header_interface']) && isset($GLOBALS['header_interface']->lang))? $GLOBALS['header_interface']->lang->getSinglelanguage('MERCHANT_DIRECTORY'):'' ?></h4>
			</div>
			<?php if($register_interface->merchant_group_list != null) { ?>
				<div class="category-list">
					<ul>
						<?php
							foreach($register_interface->merchant_group_list as $obj)
							{
						?>
						<li><a href="merchantcategory.php?id=<?php echo $obj->getMerchantgroupid() ?>"><?php echo $obj->getMerchantgroupname() ?></a></li>
						<?php } ?>
					</ul>
				</div>
			<?php } ?>
		<img src="../../images/frontend/category-bottom.gif" alt="category bottom" />
		</div>

		<div class="register">
			<div class="user-registration">
				<div class="title">
					<h4><?php echo (isset($GLOBALS['header_interface']) && isset($GLOBALS['header_interface']->lang))? $GLOBALS['header_interface']->lang->getSinglelanguage('USER_REGISTRATION'):'' ?></h4>
				</div>

				<div class="product-spacerline"></div>
				<?php echo (isset($register_interface->msg) && !empty($register_interface->msg))? $register_interface->users->common->showMessage($register_interface->msg) : ''; ?>

				<form name="form_reg" id="form_reg" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
				<input type="hidden" id="__EVENTTARGET" name="__EVENTTARGET" />
				<input type="hidden" id="__EVENTARGUMENT" name="__EVENTARGUMENT" />

				<ul>
					<li>
						<label for="username"><?php echo $GLOBALS['header_interface']->lang->getSingleLabel('USERNAME') ?></label><br />
						<input type="text"class="register-inputarea" id="username" name="username" value="<?php echo (isset($register_interface) && $register_interface->userInfo != null)? $register_interface->userInfo->getUsername() : ''; ?>" ></input>
						<p><a id="chkusername" name="chkusername" href="ajaxHelper.php"><?php echo (isset($GLOBALS['header_interface']) && isset($GLOBALS['header_interface']->lang))? $GLOBALS['header_interface']->lang->getSinglelanguage('CHECK_AVAILABILITY'):'' ?></a> <span id="chkusername_show"></span></p>
					</li>

					<li>
						<label for="email"><?php echo $GLOBALS['header_interface']->lang->getSingleLabel('EMAIL') ?></label><br />
						<input type="text"class="register-inputarea" id="email" name="email" value="<?php echo (isset($register_interface) && $register_interface->userInfo != null)? $register_interface->userInfo->getEmail() : ''; ?>" ></input>
						<p><a id="chkemail" name="chkemail" href="ajaxHelper.php"><?php echo (isset($GLOBALS['header_interface']) && isset($GLOBALS['header_interface']->lang))? $GLOBALS['header_interface']->lang->getSinglelanguage('CHECK_AVAILABILITY'):'' ?></a> <span id="chkemail_show"></span></p>
					</li>

					<li>
						<label for="upassword"><?php echo $GLOBALS['header_interface']->lang->getSingleLabel('PASSWORD') ?></label><br />
						<input type="password" class="register-inputarea" id="upassword" name="upassword" value="<?php echo (isset($_POST['upassword']))? $_POST['upassword'] : ''; ?>"></input>
					</li>

					<li>
						<label for="upasswordconfirm"><?php echo $GLOBALS['header_interface']->lang->getSingleLabel('CONFIRM_PASSWORD') ?></label><br />
						<input type="password"class="register-inputarea" id="upasswordconfirm" name="upasswordconfirm" value="<?php echo (isset($_POST['upasswordconfirm']))? $_POST['upasswordconfirm'] : ''; ?>"></input>
					</li>

					<li><input type="checkbox" id="termscondition" name="termscondition"></input><label for="termscondition">I have read and agree to the <a href='javascript:void(0);'>Terms of Use and Privacy Policy.</a></label></li>
					<div id="tandc_content" name="tandc_content" style="display:none;">
						<p>Your privacy is very important to us. We designed our Privacy Policy to make important disclosures about how you can use Facebook to share with others and how we collect and can use your content and information. We encourage you to read the Privacy Policy, and to use it to help make informed decisions.</p>
					</div>
					<li><input type="submit" value="SIGN UP" class="signup-button" id="signup" name="signup"></input></li>					</ul>
				<?php //echo (isset($register_interface->msg))? $register_interface->users->common->showMessage($register_interface->msg, ) ?>
				</form>

			</div><!-- end of user registration -->

		</div>

		<div class="advertising">
			<div class="title">
				<p>Advertising</p>
			</div>

			<div class="vertical-ad-list">
				<ul>
					<li>
						<div class="vertical-ad-container">
							<div class="vertical-ad-banner">
								<a href="http://ksi.plasa.com" target="_blank"><img src="../../images/frontend/ksi-banner.gif" alt="komunitas sekolah indonesia"/></a>
							</div>
							<h4>Direktori sekolah di Indonesia</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
							<div class="vertical-ad-link">
								<ul>
									<li><img src="../../images/frontend/store-icon.png" alt="store icon" /></li>
									<li><a href="http://ksi.plasa.com" target="_blank">Go to KSI</a></li>
								</ul>
							</div>
						</div>
					</li>

					<li>
						<div class="vertical-ad-container">
							<div class="vertical-ad-banner">
								<a href="http://blog.plasa.com" target="_blank"><img src="../../images/frontend/blog-banner.gif" alt="plasa blog"/></a>
							</div>
							<h4>Plasa Blog</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
							<div class="vertical-ad-link">
								<ul>
									<li><img src="../../images/frontend/store-icon.png" alt="store icon" /></li>
									<li><a href="http://blog.plasa.com" target="_blank" >Go to Plasa Blog</a></li>
								</ul>
							</div>
						</div>
					</li>

					<li>
						<div class="vertical-ad-container">
							<div class="vertical-ad-banner">
								<a href="merchantdetail.php"><img src="../../images/frontend/sample-ad.gif" alt="sample ad"/></a>
							</div>
							<h4>Sample Ads</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
							<div class="vertical-ad-link">
								<ul>
									<li><img src="../../images/frontend/store-icon.png" alt="store icon" /></li>
									<li><a href="merhantdetail.php">Go to store</a></li>
								</ul>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>

	</div>

	<div class="horizontal-ad-container">
		<a href="merchantdetail.php"><img src="../../images/frontend/sample-horizontal-ad.gif" alt="sample ad" /></a>
	</div>

</div>

<?php include_once('footer.php'); ?>