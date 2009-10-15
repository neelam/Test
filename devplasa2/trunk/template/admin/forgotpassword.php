<?php include_once('header.php'); ?>
<?php
include_once('../../apps/admin/forgotpassword.php');
class forgotpassword_interface extends forgotpassword
{
	public function forgotpassword_interface(){
		parent::forgotpassword();
	}
}

$forgotpassword_interface = new forgotpassword_interface();

?>
	<script type="text/javascript">
		$(document).ready(function(){
			$(function() {
				$("#form1").validate({
					rules: {
						email: {
							required: true,
							email: true,
							maxlength: 100
						}
					},

					messages: {
						email: {
							required : "Please enter your email.",
							email : "Please enter a valid email address.",
							maxlength : "Maximum length is 100.",
						}
					},

					errorPlacement: function(error, element) {
						 error.insertBefore(element);
					}
				});
			});

			$('#btnsubmit').click(function(){
					obj = $('#__EVENTTARGET'); if(obj) obj.val("forgotpassword");
					obj = $('#__EVENTARGUMENT'); if(obj) obj.val('');
			});
		});
	</script>
	<div id="page">
		<div id="login-area">
			<img src="<?php echo $config->live_site.'images/admin/admin-controlpanel.gif'; ?>" alt="plasa.com admin control panel" />
			<?php echo (isset($forgotpassword_interface->msg) && !empty($forgotpassword_interface->msg))? $forgotpassword_interface->users->common->showMessage($forgotpassword_interface->msg) : ''; ?>
			<div class="login-panel">
				<form id="form1" name="form1" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
				<input type="hidden" id="__EVENTTARGET" name="__EVENTTARGET" />
				<input type="hidden" id="__EVENTARGUMENT" name="__EVENTARGUMENT" />
					<ul>
						<li><p style="color:#fff">Please enter your username or e-mail address. You will receive a new password via e-mail.</p></li>

						<li><label class="label" for="email">Email</label><input type="text" id="email" name="email" class="login-input" /></li>
						<li class="submit"><input id="submit" name="submit" type="image" SRC="<?php echo $config->live_site.'images/admin/getpassword-button.png'; ?>" border="0" ALT="login button"></li>
						<li><div class="forgotpassword"><p><a href="login.php">Back to login</a></p></div></li>

					</ul>


				</form>
			</div>



			<div class="footer"><p>Copyright &copy; 2009. plasa.com. All rights reserved.</p></div>
		</div>
	</div>


<?php include_once('footer.php'); ?>