<?php include_once('header.php'); ?>
<?php
include_once('../../apps/frontend/merchantdirectory.php');
class merchantdirectory_interface extends merchantdirectory
{
	public function merchantdirectory_interface(){
		parent::merchantdirectory();
	}
}

$merchantdirectory_interface = new merchantdirectory_interface();

?>

<div id="content">
	<div id="content-c">
		<div class="category">
			<div class="category-title">
				<h4>Merchant Directory</h4>
			</div>

			<?php if($merchantdirectory_interface->merchant_group_list != null) { ?>
				<div class="category-list">
					<ul>
						<?php
							foreach($merchantdirectory_interface->merchant_group_list as $obj)
							{
						?>
						<li><a href="merchantdirectory.php?id=<?php echo $obj->getAttribute('id') ?>"><?php echo $obj->firstChild->nodeValue ?></a></li>
						<?php } ?>
					</ul>
				</div>
			<?php } ?>

		<img src="../../images/frontend/category-bottom.gif" alt="category bottom" />
		</div>

		<div class="merchant_directory">
			<div class="merchant_directory-container">
				<div class="title">
					<h2><?php echo (isset($_REQUEST['id']))? $merchantdirectory_interface->getMerchantgroupName($_REQUEST['id']) : 'Merchant Directory' ?></h2>
				</div>

				<div class="merchant_directory-list">
					<?php
						if(isset($merchantdirectory_interface) && $merchantdirectory_interface->merchant_list != null)
						{
					?>
					<ul>
						<?php
							foreach($merchantdirectory_interface->merchant_list as $obj)
							{
								if($merchantdirectory_interface->is_hasProduct($obj->getAttribute('id')))
								{
						?>
							<li>
								<div class="merchant_container">
									<div class="image">
										<a href="<?php echo ($merchantdirectory_interface->NoFeature_OneCategory($obj->getAttribute('id')))?
										"merchantsubcategory.php?id=".$obj->getAttribute("id")."&group=".$obj->getAttribute("group")."&category=".$merchantdirectory_interface->category_name."" :
										"merchantcategory.php?id=".$obj->getAttribute("id")."&groupid=".$obj->getAttribute("group").""; ?> ">
										<img src="<?php echo ($obj->firstChild->nextSibling->nextSibling->nextSibling->nodeValue != '')? $obj->firstChild->nextSibling->nextSibling->nextSibling->nodeValue : '../../images/frontend/sample-merchant.gif' ?>"
										alt="<?php echo ($obj->firstChild->nodeValue != '')? $obj->firstChild->nodeValue : 'Sample Merchant'; ?>" /></a>
									</div>
									<div class="title">
										<p><a href="merchantcategory.php?id=<?php echo $obj->getAttribute('id') ?>&groupid=<?php echo $obj->getAttribute('group') ?>"><?php echo ($obj->firstChild->nodeValue  != '')? $obj->firstChild->nodeValue  : 'Sample Merchant'; ?></a></p>
									</div>
									<?php if(!isset($_REQUEST['id']) && empty($_REQUEST['id'])) { ?>
									<div class="merchantcategory">
										<p><a href="merchantdirectory.php?id=<?php echo $obj->getAttribute('group') ?>"><?php echo $merchantdirectory_interface->getMerchantgroupName($obj->getAttribute('group')) ?></a></p>
									</div>
									<?php } ?>
								</div>
							</li>
						<?php
								}
							}
						?>
					</ul>
					<?php
						}
					?>
					<ul>
						<li>

						</li>
					</ul>
				</div>

			</div>
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