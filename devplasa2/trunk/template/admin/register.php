<?php include_once('header.php'); ?>
<?php
include_once('../../apps/admin/register.php');
class register_interface extends register
{
	public function register_interface(){
		parent::register();
	}

}

$register_interface = new register_interface();

?>

<body>
	<script type="text/javascript">
	$(document).ready(function(){
		$(function() {
			$("#form1").validate({
				rules: {
					username: {
						required: true,
					},

					email: {
						required: true,
						email: true
					},

					upassword: {
						required: true,
						minlength: 6
					},

					upasswordconfirm: {
						required: true,
						minlength: 6,
						equalTo: "#upassword"
					},

					termscondition : "required"

				},

				messages: {
					username: "Please enter your user name.",

					email: "Please enter a valid email address.",

					upassword: {
						required: "Please enter your password.",
						minlength: "Your password must be at least 6 characters long",
					},

					upasswordconfirm: {
						required: "Please enter your confirm password.",
						minlength: "Your password must be at least 6 characters long",
						equalTo: "Please enter the same password as above"

					}
				}
			});
		});

		$("#chkusername").click(function(){
			$.ajax({
				url     : $(this).attr('href'),
				success : function(html) {
					$('#chkusername_show').html(html);
				},
				beforeSend: function() {
					$('#chkusername_show').html('Loading data...');
				}
			});
			//$(this).parent().addClass('sublinkactive');
			return false;
		});

		$("#chkemail").click(function(){
			$.ajax({
				url     : $(this).attr('href'),
				success : function(html) {
					$('#chkemail_show').html(html);
				},
				beforeSend: function() {
					$('#chkemail_show').html('Loading data...');
				}
			});
			//$(this).parent().addClass('sublinkactive');
			return false;
		});

		$("#signup").click(function() {
				obj = $('#__EVENTTARGET'); if(obj) obj.val("signup");
				obj = $('#__EVENTARGUMENT'); if(obj) obj.val('');
		});


		$("#chkusername").click(function() {
				obj = $('#__EVENTTARGET'); if(obj) obj.val("checkusername");
				obj = $('#__EVENTARGUMENT'); if(obj) obj.val('');
		});


		$("#chkemail").click(function() {
				obj = $('#__EVENTTARGET'); if(obj) obj.val("checkemail");
				obj = $('#__EVENTARGUMENT'); if(obj) obj.val('');
		});


  	});
	</script>
<style type="text/css">
.error {
	color: red;
	font: .8em verdana;
	padding-left: 10px
}
</style>

	<!-- FOR DIRMAN -->

	<div class="title-left">
		<h2>Add New User</h2>
	</div>

	<div class="clear"></div>

	<div class="addnewuser-form">
		<form name="form1" id="form1" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
		<input type="hidden" id="__EVENTTARGET" name="__EVENTTARGET" />
		<input type="hidden" id="__EVENTARGUMENT" name="__EVENTARGUMENT" />
			<ul>
				<li>
					<label class="label2" for="username">Username</label><br />
					<input type='text' id='username' name='username'  class='edit-input' /> <a id="chkusername" href="register.php?do=checkusername">check availability</a>
					<br /> <div id="chkusername_show"></div>
				</li>

				<li>
					<label class="label2" for="email">E-mail</label><br />
					<input type='text' id='email' name='email'  class='edit-input'/> <a id="chkemail" href="register.php?do=checkemail">check availability</a>
					<br /> <div id="chkemail_show"></div>
				</li>

				<li>
					<label class="label2" for="upassword">Password</label><br />
					<input type='password' id='upassword' name='upassword' class='edit-input' />
				</li>

				<li>
					<label class="label2" for="upasswordconfirm">Confirm Password</label><br />
					<input type='password' id='upasswordconfirm' name='upasswordconfirm' class='edit-input' />
				</li>

			</ul>

			<div class="spacer-line"></div>

			<input type='checkbox' id='termscondition' name='termscondition' /><label class="label2" for="termscondition">I have read and agree to the <a href='javascript:void(0);'>Terms of Use and Privacy Policy.</a></label>

			<div class="spacer-line"></div>

			<input type='submit' id='signup' name='signup' value=' ' class="create-button"  />

		</form>
	</div>

	<!--
	<form name="form1" id="form1" action="<?php echo $_SERVER['PHP_SELF'].'?do=signup' ?>" method="POST">
		<div class="form_center" style="width:700px;margin-top:30px;margin-bottom:50px;">
			<div style="text-align:left;height:30px;"><label class="label" for="username">User name : </label><input type='text' id='username' name='username' /></div>
			<div style="text-align:left;height:30px;"><label class="label" for="email">E-mail &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label><input type='text' id='email' name='email' /></div>
			<div style="text-align:left;height:30px;"><label class="label" for="upassword">Password &nbsp;: </label><input type='password' id='upassword' name='upassword' /></div>
			<div style="text-align:left;height:30px;"><label class="label" for="upasswordconfirm">Confirm Password : </label><input type='password' id='upasswordconfirm' name='upasswordconfirm' /></div>
			<div class="label" style="height:30px;"><input type='checkbox' id='termscondition' name='termscondition' /><label class="label" for="termscondition">I have read and agree to the <a href='javascript:void(0);'>Terms of Use and Privacy Policy.</a></label></div>
			<div class="label" style="height:30px;text-align:left;"><input type='submit' id='signup' name='signup' value='Sign Up' /></div>
		</div>
	</form>

	<?php echo $register_interface->users->common->showMessage($register_interface->msg); ?>
	-->
</body>

<?php include_once('footer.php'); ?>