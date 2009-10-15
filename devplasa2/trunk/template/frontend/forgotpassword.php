<?php include_once('header.php'); ?>
<?php
include_once('../../apps/frontend/forgotpassword.php');
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
						//required : "<div class='warning-container' style='width:137px;height:40px;'><div class='warning-left' style='float:left;height:40px;'></div><div class='warning-title' style='width:110px;float:left;height:40px;text-align:center;'><?php echo (isset($GLOBALS['header_interface']) && isset($GLOBALS['header_interface']->lang))? $GLOBALS['header_interface']->lang->getSingleError_msg('REQUIRE_EMAIL'):'' ?></div><div class='warning-right' style='float:left;height:40px;'></div></div>",
						required : "<span><?php echo (isset($GLOBALS['header_interface']) && isset($GLOBALS['header_interface']->lang))? $GLOBALS['header_interface']->lang->getSingleError_msg('REQUIRE_EMAIL'):'' ?></span>",
						email : "<span><?php echo (isset($GLOBALS['header_interface']) && isset($GLOBALS['header_interface']->lang))? $GLOBALS['header_interface']->lang->getSingleError_msg('INVALID_EMAIL'):'' ?></span>",
						maxlength : "<span><?php echo (isset($GLOBALS['header_interface']) && isset($GLOBALS['header_interface']->lang))? $GLOBALS['header_interface']->lang->getSingleError_msg('MAX_EMAIL'):'' ?></span>",
					}
				},

				errorPlacement: function(error, element) {
					 error.insertAfter(element);
				}
			});
		});

		$('#btnsubmit').click(function(){
				obj = $('#__EVENTTARGET'); if(obj) obj.val("forgotpassword");
				obj = $('#__EVENTARGUMENT'); if(obj) obj.val('');
		});
	});
</script>

	<div id="content">
	<div id="content-c">
		<div class="category">
			<div class="category-title">
				<h4><?php echo (isset($GLOBALS['header_interface']) && isset($GLOBALS['header_interface']->lang))? $GLOBALS['header_interface']->lang->getSinglelanguage('MERCHANT_DIRECTORY'):'' ?></h4>
			</div>
			<?php if($forgotpassword_interface->merchant_group_list != null) { ?>
				<div class="category-list">
					<ul>
						<?php
							foreach($forgotpassword_interface->merchant_group_list as $obj)
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
					<h4><?php echo (isset($GLOBALS['header_interface']) && isset($GLOBALS['header_interface']->lang))? $GLOBALS['header_interface']->lang->getSinglelanguage('FORGOT_PASSWORD?'):'' ?></h4>
				</div>
				<div class="product-spacerline"></div>
				<form id="form1" name="form1" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
				<input type="hidden" id="__EVENTTARGET" name="__EVENTTARGET" />
				<input type="hidden" id="__EVENTARGUMENT" name="__EVENTARGUMENT" />
				<ul>
					<li>
						<label for="email"><?php echo (isset($GLOBALS['header_interface']) && isset($GLOBALS['header_interface']->lang))? $GLOBALS['header_interface']->lang->getSinglelanguage('FORGOT_PASS_TEXT'):'' ?></label><br />
						<input id="email" name="email" type="text"class="register-inputarea"></input>
					</li>

					<li><input id="btnsubmit" name="btnsubmit" type="submit" value="<?php echo (isset($GLOBALS['header_interface']) && isset($GLOBALS['header_interface']->lang))? $GLOBALS['header_interface']->lang->getSinglelanguage('GET_PASSWORD'):'' ?>" class="signup-button"></input></li>
				</ul>
				</form>
			</div><!-- end of user registration -->

		</div>

		<div class="advertising">
			<div class="title">
				<p><?php echo (isset($GLOBALS['header_interface']) && isset($GLOBALS['header_interface']->lang))? $GLOBALS['header_interface']->lang->getSinglelanguage('ADVERTISING'):'' ?></p>
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
		<a href="merchant-detail.html"><img src="../../images/frontend/sample-horizontal-ad.gif" alt="sample ad" /></a>
	</div>

</div>


<?php include_once('footer.php'); ?>