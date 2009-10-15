<?php include_once('header.php'); ?>
<?php
include_once('../../apps/admin/userprofile.php');
class userprofile_interface extends userprofile
{
	public function userprofile_interface(){
		parent::userprofile();
	}
}

$userprofile_interface = new userprofile_interface();
?>

	<script type="text/javascript">
		$(document).ready(function(){
			$("#btnupdate, #btnupdate_top").click(function() {
				doSubmit('update_profile', '');
			});
			$("#btnsuspended").click(function() {
				doSubmit('do_suspended', '');
			});
			$("#btncancel").click(function() {
				window.location.href = 'userlist.php';
				return false;
			});

			$(function() {
				$('#dob').datepicker();
				$('#dob').datepicker('option', {dateFormat: "dd-mm-yy"});
			});

			function buttonPush (buttonStatus) {
				if (buttonStatus == "depressed")
					document.getElementById("pseudobutton").style.borderStyle = "inset";
				else
					document.getElementById("pseudobutton").style.borderStyle = "outset";
			}

			$(function() {
				$("#form1").validate({
					rules: {
						email: {
							required: true,
							email: true
						}
					},

					messages: {
						email: "Please enter a valid email address.",
					}
				});
			});
	  	});
	</script>

	<!--[if IE]>
    <style type="text/css">
    input.hide
  {
      position:absolute;
      left:10px;
      -moz-opacity:0;
      filter:alpha(opacity: 0);
      opacity: 0;
      z-index: 2;
      width:0px;
      border-width:0px;
  }
    </style>
<![endif]-->

	<form id="form1" name="form1" action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="POST" enctype="multipart/form-data">
	<input type="hidden" id="__EVENTTARGET" name="__EVENTTARGET" />
	<input type="hidden" id="__EVENTARGUMENT" name="__EVENTARGUMENT" />
	<input type="hidden" id="userid" name="userid" value="<?php echo ($userprofile_interface->users->getUserinfo() != null) ? $userprofile_interface->users->getUserinfo()->getUserid() : ''; ?>" />
	<input type="hidden" id="hidphoto" name="hidphoto" value="<?php echo ($userprofile_interface->users->getUserinfo() != null) ? $userprofile_interface->users->getUserinfo()->getProfilepicture() : '' ; ?>" />

	<div id="content">

		<div class="title-left">
			<h2><?php echo $userprofile_interface->users->getUserinfo()->getUsername() ?></h2>

		</div>

		<div class="title-right">
			<input type="image" id="btnsuspended" name="btnsuspended" src="../../images/admin/suspend-button.png" alt="suspend" />
			<input type="image" id="btnupdate_top" name="btnupdate_top" src="../../images/admin/save-button.png" alt="save" />

		</div>

		<div class="clear"></div>

		<div class="profile-l">
			<img width="150px" border="0"  src="<?php echo ($userprofile_interface->users->getUserinfo() != null && $userprofile_interface->users->getUserinfo()->getProfilepicture() != '')? '../../upload/'.$userprofile_interface->users->getUserinfo()->getUserid().'/'.$userprofile_interface->users->getUserinfo()->getProfilepicture() : '../../images/admin/sample-profile.gif'; ?>"
			alt="<?php echo ($userprofile_interface->users->getUserinfo() != null && $userprofile_interface->users->getUserinfo()->getProfilepicture() != '')? $userprofile_interface->users->getUserinfo()->getProfilepicture() : 'sample profile'; ?>" />

			<div class="upload-photo-profile">
				<label class="label2" ><strong>Update profile photo</strong></label>
				<input type="button" class="upload-file" id="pseudobutton" value="" />
				<input type="file" class="hide" id="openssme" name="openssme" onmousedown="buttonPush('depressed');" onmouseup="buttonPush('normal');" onmouseout="buttonPush('phased');" />
				<form>

				</form>
			</div>

			<div class="line-spacer-profile"></div>

			<p>Created date: <?php echo date_format(date_create($userprofile_interface->users->getUserinfo()->getCreatedat()),"d F y") ?></p>

			<div class="line-spacer-profile"></div>

			<p>Last update: <?php echo date_format(date_create($userprofile_interface->users->getUserinfo()->getUpdatedat()),"d F y") ?></p>

			<div class="line-spacer-profile"></div>

		</div>

		<div class="profile-r">
				<ul>
					<li>
						<label class="label2" >First Name</label><br />
						<input type="text" id="firstname" name="firstname" value="<?php echo $userprofile_interface->users->getUserinfo()->getFirstname(); ?>" class="edit-input" />

					</li>

					<li>
						<label class="label2" >Last Name</label><br />
						<input type="text" id="lastname" name="lastname" value="<?php echo $userprofile_interface->users->getUserinfo()->getLastname(); ?>" class="edit-input" />

					</li>

					<li>
						<label class="label2" >Date of birth</label><br />
						<input type="text" id="dob" name="dob" value="<?php echo $userprofile_interface->users->getUserinfo()->getDob(); ?>" class="edit-input" />

					</li>
					<li>
						<label class="label2" >Gender</label><br />
						<?php echo $userprofile_interface->reference->loadGender($userprofile_interface->users->getUserinfo()->getGender(), "id='gender' name='gender' class='genderselect-input'") ?>

					</li>

					<li>
						<label class="label2" >Language</label><br />
						<input type="text" id="language" name="language" value="<?php echo $userprofile_interface->users->getUserinfo()->getLanguagepreference(); ?>" class="edit-input" />

					</li>

					<li>
						<label class="label2" for="email">Email</label><br />
						<input type="text" id="email" name="email" value="<?php echo $userprofile_interface->users->getUserinfo()->getEmail(); ?>" class="edit-input" />

					</li>

					<li>
						<label class="label2" >State</label><br />
						<?php echo $userprofile_interface->reference->buildSelectBox($userprofile_interface->reference->loadState(), $userprofile_interface->users->getUserinfo()->getStateid(), 'state_id', 'state_name', "id='cbostate' name='cbostate' class='countryselect-input'") ?>

					</li>

					<li>
						<label class="label2" >City</label><br />
						<?php echo $userprofile_interface->reference->buildSelectBox($userprofile_interface->reference->loadCity(), $userprofile_interface->users->getUserinfo()->getCityid(), 'city_id', 'city_name', "id='cbocity' name='cbocity' class='countryselect-input'") ?>

					</li>

					<li>
						<label class="label2" >Country</label><br />
						<?php echo $userprofile_interface->reference->buildSelectBox($userprofile_interface->reference->loadCountry(), $userprofile_interface->users->getUserinfo()->getCountryid(), 'country_id', 'country_name', "id='cbocountry' name='cbocountry' class='countryselect-input'") ?>

					</li>


					<li>
						<label class="label2" >Address(1)</label><br />
						<input type="text" id="address1" name="address1" value="<?php echo $userprofile_interface->users->getUserinfo()->getAddress1(); ?>" class="edit-input" />

					</li>

					<li>
						<label class="label2" >Address(2)</label><br />
						<input type="text" id="address2" name="address2" value="<?php echo $userprofile_interface->users->getUserinfo()->getAddress2(); ?>" class="edit-input" />

					</li>


					<li>
						<label class="label2" >Zip Code</label><br />
						<input type="text" id="zip" name="zip" value="<?php echo $userprofile_interface->users->getUserinfo()->getZip(); ?>" class="edit-input" />

					</li>

					<li>
						<label class="label2" >Phone</label><br />
						<input type="text" id="phone" name="phone" value="<?php echo $userprofile_interface->users->getUserinfo()->getPhone(); ?>" class="edit-input" />

					</li>

				</ul>

				<input id="btnupdate" name="btnupdate" type="image" src="../../images/admin/save-button.png" alt="save" vspace="10px" />
				<input id="btncancel" name="btncancel" type="image" src="../../images/admin/cancel-button.png" alt="cancel" vspace="10px" />
		</div>
	</div> <!-- end of content section -->
	</form>
	<?php //echo $userprofile_interface->users->common->showMessage($userprofile_interface->msg); ?>
	<script type="text/javascript">
		function doSubmit(etarget, eargument)
		{
			obj = $('#__EVENTTARGET'); if(obj) obj.val(etarget);
			obj = $('#__EVENTARGUMENT'); if(obj) obj.val(eargument);
		}
	</script>

<?php include_once('footer.php'); ?>