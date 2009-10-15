<?php include_once('header.php'); ?>
<?php
include_once('../../apps/admin/login.php');
class login_interface extends login
{
	public function login_interface(){
		parent::login();
	}
}

$login_interface = new login_interface();

?>

	<script type="text/javascript">
	$(document).ready(function(){
		$("#form1").validate({
			rules: {
				username: {
					required: true,
					minlength: 3,
					maxlength: 30
				},

				password: {
					required: true,
					minlength: 6,
					maxlength: 50
				}
			},

			messages: {
				username: {
					required : "Please enter your user name.",
					minlength : "Minimum length is 3.",
					maxlength : "Maximum length is 30.",
				},

				password: {
					required: "Please enter your password.",
					minlength: "Your password must be at least 6 characters long",
					maxlength : "Maximum length is 50."
				}
			}
		});

		$("#submit").click(function() {
			  if($("#form1").valid())
			  {
				 doSubmit('login', '');
			  }
		});
	});
	</script>
	<div id="page">
		<div id="login-area">
			<img src="<?php echo $config->live_site.'images/admin/admin-controlpanel.gif'; ?>" alt="plasa.com admin control panel" />
			<?php echo (isset($login_interface->msg) && !empty($login_interface->msg))? $login_interface->users->common->showMessage($login_interface->msg) : ''; ?>
			<div class="login-panel">
				<form id="form1" name="form1" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
				<input type="hidden" id="__EVENTTARGET" name="__EVENTTARGET" />
				<input type="hidden" id="__EVENTARGUMENT" name="__EVENTARGUMENT" />
					<ul>
						<li><label class="label" for="username">User name</label><input type="text" id="username" name="username" class="login-input" /></li>

						<li><label class="label" for="password">Password</label><input type="password" id="password" name="password" class="login-input" /></li>
						<li class="submit"><input id="submit" name="submit" type="image" SRC="<?php echo $config->live_site.'images/admin/login-button.png'; ?>" border="0" ALT="login button"></li>
						<li><div class="forgotpassword"><p><a href="forgotpassword.php">Lost your password?</a></p></div></li>

					</ul>

				</form>
			</div>
			<div class="footer"><p>Copyright &copy; 2009. plasa.com. All rights reserved.</p></div>
		</div>
	</div>
	<script type="text/javascript">
		function doSubmit(etarget, eargument)
		{
			obj = $('#__EVENTTARGET'); if(obj) obj.val(etarget);
			obj = $('#__EVENTARGUMENT'); if(obj) obj.val(eargument);
		}
	</script>

<?php include_once('footer.php'); ?>