<?php include_once('header.php'); ?>
<?php
include_once('../../apps/admin/userlist.php');

class userlist_interface extends userlist
{
	public function userlist_interface(){
		parent::userlist();
	}
}

$userlist_interface = new userlist_interface();

?>
<form id="form1" name="form1" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
<input type="hidden" id="__EVENTTARGET" name="__EVENTTARGET" value="<?php echo (isset($_POST['__EVENTTARGET'])) ? $_POST['__EVENTTARGET'] : '' ?>" />
<input type="hidden" id="__EVENTARGUMENT" name="__EVENTARGUMENT" value="<?php echo (isset($_POST['__EVENTARGUMENT'])) ? $_POST['__EVENTARGUMENT'] : '' ?>" />
	<div id="content">

		<div class="title-left">
			<h2>User Management</h2>

		</div>

		<div class="title-right">
			<a href="register.php"><img src="../../images/admin/addnewuser-button.png" alt="add new user" /></a>
			<a href="#" id="suspend_button"><img src="../../images/admin/suspend-button-inactive.png" alt="suspend" /></a>
		</div>

		<div class="content-full">
		<div class="box-title-row">
			<div class="select-col-title">
				<input type="checkbox" id="chkall" name="chkall"></input>

			</div>

			<div class="username-col">
				<h3><a href="javascript:void(0);" id="sort_username">Username</a> <img src="../../images/admin/sort-icon.png" alt="sort icon" /></a></h3>
			</div>

			<div class="created-col">
				<h3><a href="javascript:void(0);" id="sort_date">Joined Date</a> <a href="#"><img src="../../images/admin/sort-icon.png" alt="sort icon" /></a></h3>
			</div>


			<div class="email-col">
				<h3><a href="javascript:void(0);" id="sort_email">Email</a> <a href="#"><img src="../../images/admin/sort-icon.png" alt="sort icon" /></a></h3>
			</div>

			<div class="status-col">
				<h3><a href="javascript:void(0);" id="sort_status">Status</a> <a href="#"><img src="../../images/admin/sort-icon.png" alt="sort icon" /></a></h3>
			</div>

			<div class="edit-col">

				<h3>Action</h3>
			</div>
		</div>

			<div class="box">

				<div class="box-user-row">
				<ul id="userlist">
					<?php $infoList = $userlist_interface->users->getInfoList();
						if(isset($infoList))
						{
							$i = 0;
							while($i < count($infoList))
							{
								$user_info = $infoList[$i];

					?>
					<li>
						<div class="select-col">
							<input type="checkbox" id="chk_<?php echo $i ?>" name="chk_<?php echo $i ?>"></input>
							<input type="hidden" id="hid_<?php echo $i ?>" name="hid_<?php echo $i ?>" value="<?php echo $user_info->getUserid() ?>"></input>
						</div>

						<div class="username-col">
							<p><a href="userprofile.php?do=edit&who=<?php echo $user_info->getUserid() ?>"><?php echo $user_info->getUsername() ?></a></p>
						</div>

						<div class="created-col">
							<p><?php echo date_format(date_create($user_info->getCreatedat()),"d F y") ?></p>
						</div>


						<div class="email-col">
							<p><?php echo $user_info->getEmail() ?></p>
						</div>

						<div class="status-col">
							<p><?php echo (isset($userlist_interface->commonConstant->user_status[$user_info->getStatus()]))?
								$userlist_interface->commonConstant->user_status[$user_info->getStatus()] : '' ?></p>
						</div>

						<div class="edit-col">
							<ul>
								<li><a href="userprofile.php?do=edit&who=<?php echo $user_info->getUserid() ?>">Edit Profile</a></li>
								<li><a rel="do_suspended" href="userlist.php?do=suspended&who=<?php echo $user_info->getUserid() ?>">Suspend Account</a></li>
							</ul>
						</div>
					</li>

					<?php $i++;
					 	}
					 }
					?>
				</ul>

				<!-- paging -->

				<div class="paging">
					<div class="show-listing">
						<label class="label2" for="show-listing">Show</label>
						<?php echo $userlist_interface->paginator->display_items_per_page() ?>

						<label class="label2" for="show-listing">Jump to page</label>
							<?php echo $userlist_interface->paginator->display_jump_menu() ?>
					</div>

					<div class="paging-number">
						<?php echo $userlist_interface->paginator->display_pages(); ?>
						<ul style="display:none;">

							<li><a href="#">Prev</a></li>
							<li><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">Next</a></li>

						</ul>
					</div>
				</div>

				</div>

			</div>

		</div>

	</div> <!-- end of content section -->

	<script type="text/javascript">
		$(document).ready(function(){
			$("#chkall").click( function() {
				var is_check = false;
				$("ul#userlist li div input[type='checkbox']").each( function() {
        	    	$(this).attr('checked', false);
					if($('#chkall').is(":checked")) { is_check = true; $(this).attr('checked', true);}

            	});

				if(is_check) $("#chkall").attr('checked', true); else $("#chkall").attr('checked', false);

            	if($(this).attr('checked')) $('#suspend_button img').attr('src', '../../images/admin/suspend-button.png')
				else $('#suspend_button img').attr('src', '../../images/admin/suspend-button-inactive.png')
        	});

        	$("ul#userlist li div input[type='checkbox']").click(function() {
        		var is_check = false;
				$("ul#userlist li div input[type='checkbox']").each( function() {
					if(!$(this).is(':checked')) $("#chkall").attr('checked', false);
					if($(this).is(':checked')) is_check = true;
				});

				if(is_check) $('#suspend_button img').attr('src', '../../images/admin/suspend-button.png')
				else $('#suspend_button img').attr('src', '../../images/admin/suspend-button-inactive.png')
			});

			$("#suspend_button").click(function(){
				var dataList = '';
				$("ul#userlist li div input[type='checkbox']").each(function() {
        	    	if($(this).attr('checked'))
        	    	{
        	    		var obj = $('#' + $(this).attr('id').replace('chk_', 'hid_'));
        	    		if(obj) {
        	    			if(dataList == '') dataList = $(obj).attr('value'); else dataList += ',' + $(obj).attr('value');
        	    		}
        	    	}
            	});

				if(dataList != '')
				{
					$.ajax({
						url: "userlist.php?do=multisuspend&params="+dataList,
						success: function(status, status) {
							alert(data);
						},
						error: function(xhr, desc, err) {
								alert(xhr);
								alert("Desc: " + desc + "\nErr:" + err);
						}
					});
				}

            	return false;
			});

			$("#userlist li div ul li a[rel='do_suspended']").click(function(){
				$.ajax({
					url     : $(this).attr('href'),
					success : function(html) {
						alert("success");
						//$('#profile-content').html(html);
					},
					beforeSend: function() {
						//$('#profile-content').html('Loading data...');
					}
				});
				//$(this).parent().addClass('sublinkactive');
				return false;
			});

			$('#sort_username').click(function(){
				obj1 = $('#__EVENTTARGET');
				obj = $('#__EVENTARGUMENT');
				if(obj && obj1) {
					doSubmit('sort_username', (obj.val() == 'asc' && obj1.val() == 'sort_username')? 'desc': 'asc')
				}
			});

			$('#sort_date').click(function(){
				obj1 = $('#__EVENTTARGET');
				obj = $('#__EVENTARGUMENT');
				if(obj && obj1) {
					doSubmit('sort_date', (obj.val() == 'asc' && obj1.val() == 'sort_date')? 'desc': 'asc')
				}
			});

			$('#sort_email').click(function(){
				obj1 = $('#__EVENTTARGET');
				obj = $('#__EVENTARGUMENT');
				if(obj && obj1) {
					doSubmit('sort_email', (obj.val() == 'asc' && obj1.val() == 'sort_email')? 'desc': 'asc')
				}
			});

			$('#sort_status').click(function(){
				obj1 = $('#__EVENTTARGET');
				obj = $('#__EVENTARGUMENT');
				if(obj && obj1) {
					doSubmit('sort_status', (obj.val() == 'asc' && obj1.val() == 'sort_status')? 'desc': 'asc')
				}
			});

			function doSubmit(etarget, eargument)
			{
				obj = $('#__EVENTTARGET'); if(obj) obj.val(etarget);
				obj = $('#__EVENTARGUMENT'); if(obj) obj.val(eargument);
				$('#form1').submit();
			}
		});
	</script>
</form>
<?php include_once('footer.php'); ?>