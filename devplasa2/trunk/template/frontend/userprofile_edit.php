<?php include_once('header.php'); ?>
<?php
include_once('../../apps/frontend/userprofile_edit.php');
class userprofile_edit_interface extends userprofile_edit
{
	public function userprofile_edit_interface(){
		parent::userprofile_edit();
	}
}

$userprofile_edit_interface = new userprofile_edit_interface();

?>

<script type="text/javascript">
		$(document).ready(function(){
			$("#btnupdate").click(function() {
				doSubmit('update_profile', '');
			});

			$("#btncancel").click(function() {
				window.location.href = 'index.php';
				return false;
			});

			$(function() {
				$('#dob').datepicker();
				//$('#dob').datepicker('option', {dateFormat: "dd-mm-yy"});
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

<form id="form1" name="form1" action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="POST" enctype="multipart/form-data">
	<input type="hidden" id="__EVENTTARGET_PROFILE" name="__EVENTTARGET_PROFILE" />
	<input type="hidden" id="__EVENTARGUMENT_PROFILE" name="__EVENTARGUMENT_PROFILE" />
	<input type="hidden" id="userid" name="userid" value="<?php echo ($userprofile_edit_interface->users->getUserinfo() != null) ? $userprofile_edit_interface->users->getUserinfo()->getUserid() : ''; ?>" />
	<input type="hidden" id="hidphoto" name="hidphoto" value="<?php echo ($userprofile_edit_interface->users->getUserinfo() != null) ? $userprofile_edit_interface->users->getUserinfo()->getProfilepicture() : '' ; ?>" />
<div id="content">
	<div id="content-c">
		<div class="userprofile-edit">
			<div class="userprofile-edit-title">
				<h4><?php echo $userprofile_edit_interface->users->getUserinfo()->getUsername() ?></h4>
			</div>

			<div class="userprofile-avatar">
				<!-- <img src="../../images/frontend/sample-merchant.gif" alt="sample user profile" /> -->
                <img width="150px" border="0"  src="<?php echo ($userprofile_edit_interface->users->getUserinfo() != null && $userprofile_edit_interface->users->getUserinfo()->getProfilepicture() != '')? '../../upload/'.$userprofile_edit_interface->users->getUserinfo()->getUserid().'/'.$userprofile_edit_interface->users->getUserinfo()->getProfilepicture() : '../../images/frontend/sample-profile.gif'; ?>"
			alt="<?php echo ($userprofile_edit_interface->users->getUserinfo() != null && $userprofile_edit_interface->users->getUserinfo()->getProfilepicture() != '')? $userprofile_edit_interface->users->getUserinfo()->getProfilepicture() : 'sample profile'; ?>" />
			</div>

			<div class="upload-photo-profile">
				<label class="label" ><strong>Update profile photo</strong></label>
				<input type="button" class="upload-file-button" id="pseudobutton" value="Upload Photo" />
				<input type="file" class="hide" id="openssme" name="openssme" onmousedown="buttonPush('depressed');" onmouseup="buttonPush('normal');" onmouseout="buttonPush('phased');" />
			</div>

			<div class="userprofile-edit-stat">
				<div class="line-spacer-profile"></div>
				<p>Created date: <?php echo date_format(date_create($userprofile_edit_interface->users->getUserinfo()->getCreatedat()),"d F y") ?></p>
				<div class="line-spacer-profile"></div>
				<p>Last update: <?php echo date_format(date_create($userprofile_edit_interface->users->getUserinfo()->getUpdatedat()),"d F y") ?></p>
			</div>

		<img src="../../images/frontend/category-bottom.gif" alt="category bottom" />
		</div>

		<div class="profile">
			<div class="profile-edit">
				<div class="title">
					<h2>Edit my profile</h2>
				</div>

				<ul>
					<li>
						<label class="label2" >First Name</label><br />
						<input type="text" id="firstname" name="firstname" value="<?php echo $userprofile_edit_interface->users->getUserinfo()->getFirstname(); ?>" class="edit-input" />
					</li>

					<li>
						<label class="label2" >Last Name</label><br />
						<input type="text" id="lastname" name="lastname" value="<?php echo $userprofile_edit_interface->users->getUserinfo()->getLastname(); ?>" class="edit-input" />
					</li>

					<li>
						<label class="label2" >Date of birth</label><br />
						<input type="text" id="dob" name="dob" value="<?php echo $userprofile_edit_interface->users->getUserinfo()->getDob(); ?>" class="edit-input" />
					</li>

					<li>
						<label class="label2" >Gender</label><br />
						<!-- <input type="radio" />Male&nbsp;&nbsp;&nbsp;<input type="radio" />Female -->
                        <?php echo $userprofile_edit_interface->reference->loadGender($userprofile_edit_interface->users->getUserinfo()->getGender(), "id='gender' name='gender' class='genderselect-input'") ?>
					</li>

					<li>
						<label class="label2" >Language</label><br />
						<input type="text" id="language" name="language" value="<?php echo $userprofile_edit_interface->users->getUserinfo()->getLanguagepreference(); ?>" class="edit-input" />
					</li>

					<li>
						<label class="label2" for="email">Email</label><br />
						<input type="text" id="email" name="email" value="<?php echo $userprofile_edit_interface->users->getUserinfo()->getEmail(); ?>" class="edit-input" />
					</li>

					<li>
						<label class="label2" >State</label><br />
                        <?php echo $userprofile_edit_interface->reference->buildSelectBox($userprofile_edit_interface->reference->loadState(), $userprofile_edit_interface->users->getUserinfo()->getStateid(), 'state_id', 'state_name', "id='cbostate' name='cbostate' class='countryselect-input'") ?>
					</li>

					<li>
						<label class="label2" >City</label><br />
                        <?php echo $userprofile_edit_interface->reference->buildSelectBox($userprofile_edit_interface->reference->loadCity(), $userprofile_edit_interface->users->getUserinfo()->getCityid(), 'city_id', 'city_name', "id='cbocity' name='cbocity' class='countryselect-input'") ?>
					</li>

					<li>
						<label class="label2" >Country</label><br />
                        <?php echo $userprofile_edit_interface->reference->buildSelectBox($userprofile_edit_interface->reference->loadCountry(), $userprofile_edit_interface->users->getUserinfo()->getCountryid(), 'country_id', 'country_name', "id='cbocountry' name='cbocountry' class='countryselect-input'") ?>
					</li>


					<li>
						<label class="label2" >Address(1)</label><br />
						<input type="text" id="address1" name="address1" value="<?php echo $userprofile_edit_interface->users->getUserinfo()->getAddress1(); ?>" class="edit-input" />

					</li>

					<li>
						<label class="label2" >Address(2)</label><br />
						<input type="text" id="address2" name="address2" value="<?php echo $userprofile_edit_interface->users->getUserinfo()->getAddress2(); ?>" class="edit-input" />

					</li>


					<li>
						<label class="label2" >Zip Code</label><br />
						<input type="text" id="zip" name="zip" value="<?php echo $userprofile_edit_interface->users->getUserinfo()->getZip(); ?>" class="edit-input" />

					</li>

					<li>
						<label class="label2" >Phone</label><br />
						<input type="text" id="phone" name="phone" value="<?php echo $userprofile_edit_interface->users->getUserinfo()->getPhone(); ?>" class="edit-input" />
					</li>

					<li>
						<!-- <input type="button" id="btnupdate" name="btnupdate" value="Save" class="save-cancel-button" />
						<input type="button" id="btncancel" name="btncancel" value="Cancel" class="save-cancel-button" /> -->

                        <input id="btnupdate" name="btnupdate" type="image" src="../../images/admin/save-button.png" alt="save" vspace="10px" />
						<input id="btncancel" name="btncancel" type="image" src="../../images/admin/cancel-button.png" alt="cancel" vspace="10px" />

					</li>
				</ul>

			</div><!-- end of edit profile -->

		</div>

	</div>

	<div class="horizontal-ad-container">
		<a href="merchantdetail.php"><img src="../../images/frontend/sample-horizontal-ad.gif" alt="sample ad" /></a>
	</div>

</div>
</form>

<script type="text/javascript">
		function doSubmit(etarget, eargument)
		{
			obj = $('#__EVENTTARGET_PROFILE'); if(obj) obj.val(etarget);
			obj = $('#__EVENTARGUMENT_PROFILE'); if(obj) obj.val(eargument);
		}
	</script>

<?php include_once('footer.php'); ?>