<?php include_once('header.php'); ?>
<?php
include_once('../../apps/frontend/activation.php');
class activation_interface extends activation
{
	public function activation_interface(){
		parent::activation();
	}
}

$activation_interface = new activation_interface();

?>

<div id="content">
	<div id="content-c">
		<div class="category">
			<div class="category-title">
				<h4>Merchant Directory</h4>
			</div>

			<div class="category-list">
				<ul>
					<li><a href="merchantdirectory.php">Electrical</a></li>
					<li><a href="merchantdirectory.php">Books, Music & Video</a></li>
					<li><a href="merchantdirectory.php">Children & Maternity</a></li>
					<li><a href="merchantdirectory.php">Phones & Accessories</a></li>
					<li><a href="merchantdirectory.php">Fashion & Accessories</a></li>
					<li><a href="merchantdirectory.php">Florist</a></li>
					<li><a href="merchantdirectory.php">IT & Digital</a></li>
					<li><a href="merchantdirectory.php">Food & Beverages</a></li>
					<li><a href="merchantdirectory.php">Health & Beauty Care</a></li>
					<li><a href="merchantdirectory.php">Homes & Gifts</a></li>
					<li><a href="merchantdirectory.php">Jewellery & Timepiece</a></li>
					<li><a href="merchantdirectory.php">Leisure & Hobbies</a></li>
				</ul>
			</div>

		<img src="../../images/frontend/category-bottom.gif" alt="category bottom" />
		</div>
		<?php if(isset($_REQUEST['do']) && !empty($_REQUEST['do']) && $_REQUEST['do'] == 'activate') { ?>

		<div class="activation">
			<div class="user-activation">
				<div class="title">
					<h2>Congratulations, Username</h2>
				</div>

				<p>Your account at plasa.com has been activated</p>
				<p><a href="#">Click here to complete your profile detail</a></p>

			</div><!-- end of user registration -->

		</div>

		<?php } else if(isset($_REQUEST['do']) && !empty($_REQUEST['do']) && $_REQUEST['do'] == 'show_success') {?>
		<div class="activation">
			<div class="user-activation">
				<div class="title">
					<h2><?php echo (isset($GLOBALS['header_interface']) && isset($GLOBALS['header_interface']->lang))? $GLOBALS['header_interface']->lang->getSinglelanguage('REGISTRATION_SUCCESSFUL'):'' ?></h2>
				</div>

				<p><?php echo (isset($GLOBALS['header_interface']) && isset($GLOBALS['header_interface']->lang))? $GLOBALS['header_interface']->lang->getSinglelanguage('REGISTRATION_SUCCESSFUL_TEXT'):'' ?></p>
			</div><!-- end of user registration -->
		</div>

		<?php } ?>
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