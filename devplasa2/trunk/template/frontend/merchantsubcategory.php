<?php include_once('header.php'); ?>
<?php
include_once('../../apps/frontend/merchantsubcategory.php');
class merchantsubcategory_interface extends merchantsubcategory
{
	public function merchantsubcategory_interface(){
		parent::merchantsubcategory();
	}
}

$merchantsubcategory_interface = new merchantsubcategory_interface();
$merchant_name;
$merchant_id;
$group_id;
$group_name;

?>
<link type="text/css" href="<?php echo $merchantsubcategory_interface->config->live_site.'web/frontend/css/jqModal.css' ?>" ></link>
<script type="text/javascript" src="<?php echo $merchantsubcategory_interface->config->live_site.'web/js/jqModal.js' ?>"; ></script>
<style type="text/css">
.jqmWindow {
    display: none;

    position: fixed;
    top: 17%;
    left: 50%;

    margin-left: -300px;
    width: 600px;

    background-color: #EEE;
    color: #333;
    border: 1px solid black;
    padding: 12px;
}

.jqmOverlay { background-color: #000; }

* html .jqmWindow {
     position: absolute;
     top: expression((document.documentElement.scrollTop || document.body.scrollTop) + Math.round(17 * (document.documentElement.offsetHeight || document.body.clientHeight) / 100) + 'px');
}

</style>

<script type="text/javascript">
	$(document).ready(function(){
		$().ready(function() {
		  $('#dialog_longdesc').jqm();
		});

	});
</script>
<div id="content">
	<div id="content-c">
		<div class="category">
			<?php
			if(isset($merchantsubcategory_interface) && $merchantsubcategory_interface->merchant_detail != null)
			{
			?>
			<?php
			foreach($merchantsubcategory_interface->merchant_detail as $obj)
			{
				$merchant_name = $obj->firstChild->nodeValue;
				$merchant_id = $obj->getAttribute('id');
				$group_id = $obj->getAttribute('group');
				$group_name = $merchantsubcategory_interface->getMerchantgroupName($group_id);
			?>
			<div class="category-title">
				<h4><?php echo $obj->firstChild->nodeValue ?></h4>
			</div>

			<div class="merchant-logo">
				<img src="<?php echo ($obj->firstChild->nextSibling->nextSibling->nextSibling->nodeValue != '')? $obj->firstChild->nextSibling->nextSibling->nextSibling->nodeValue : '../../images/frontend/sample-merchant.gif' ?>" alt="<?php echo ($obj->firstChild->nodeValue != '')? $obj->firstChild->nodeValue : 'Sample Merchant'; ?>" />
			</div>

			<div class="merchant-stat">
				<ul>
					<li><label>Company Name</label><br/ ><?php echo $obj->firstChild->nextSibling->nodeValue ?></li>
					<li><label>Company Reg No:</label><br /><?php echo $obj->firstChild->nextSibling->nextSibling->nodeValue ?></li>
					<li><label>Address:</label><br /><?php echo $obj->firstChild->nextSibling->nextSibling->nextSibling->nextSibling->nodeValue ?></li>
					<li><label>Contact No:</label><br /><?php echo $obj->firstChild->nextSibling->nextSibling->nextSibling->nextSibling->nextSibling->nextSibling->nextSibling->nextSibling->nextSibling->firstChild->nodeValue ?></li>
					<li><label>Email:</label><br /><a href="mailto:<?php echo $obj->firstChild->nextSibling->nextSibling->nextSibling->nextSibling->nextSibling->nextSibling->nextSibling->nextSibling->nextSibling->firstChild->nextSibling->nextSibling->nodeValue ?>"><?php echo $obj->firstChild->nextSibling->nextSibling->nextSibling->nextSibling->nextSibling->nextSibling->nextSibling->nextSibling->nextSibling->firstChild->nextSibling->nextSibling->nodeValue ?></a></li>
					<li><label>About:</label><br />
						<p><?php echo $obj->firstChild->nextSibling->nextSibling->nextSibling->nextSibling->nextSibling->nextSibling->nextSibling->nextSibling->nextSibling->nextSibling->nodeValue ?></p>
						<p><a href="#" class="jqModal">Read more</a></p>
					</li>
				</ul>
			</div>
			<div class="jqmWindow" id="dialog_longdesc">
				<p><?php echo $obj->lastChild->nodeValue ?></p>
			</div>
				<?php } ?>
			<?php } ?>

		<img src="../../images/frontend/category-bottom.gif" alt="category bottom" />
		</div>

		<div class="merchant_detail">
			<div class="merchant_detail-container">
				<div class="breadcrumb">
					<ul>
						<li><a href="index.php"><?php echo (isset($GLOBALS['header_interface']) && isset($GLOBALS['header_interface']->lang))? $GLOBALS['header_interface']->lang->getSinglelanguage('HOME'):'' ?></a></li>
						<li>>&nbsp;&nbsp;<a href="merchantdirectory.php?id=<?php echo $group_id ?>"><?php echo $group_name ?></a></li>
						<li>>&nbsp;&nbsp;<a href="merchantcategory.php?id=<?php echo $merchant_id ?>&groupid=<?php echo $group_id ?>"><?php echo $merchant_name ?></a></li>
						<li>>&nbsp;&nbsp;<a href="merchantsubcategory.php?id=<?php echo $merchant_id ?>&group=<?php echo $group_id ?>&category=<?php echo $_REQUEST['category'] ?>"><?php echo $_REQUEST['category']  ?></a></li>
					</ul>
				</div>

				<div class="product_detail-spaceline"></div>

				<div class="title">
					<h2><?php echo $_REQUEST['category'] ?></h2>
				</div>

				<?php if($merchantsubcategory_interface->subcategory_list != null) { ?>
					<?php foreach($merchantsubcategory_interface->subcategory_list as $value) { ?>
					<div class="productcategory-container">
						<div class="title">
							<h3><?php echo $value ?></h3>
						</div>

						<div class="viewall-link">
							<a href="merchantdetail.php?id=<?php echo $_REQUEST['id'] ?>&group=<?php echo $_REQUEST['group'] ?>&category=<?php echo $_REQUEST['category'] ?>&subcategory=<?php echo $value ?>">See all products(<?php echo $merchantsubcategory_interface->getSubcategoryCount($value) ?>)</a>
						</div>

						<div class="productcategory-container-spacerline"></div>

						<?php $obj = $merchantsubcategory_interface->getProductListbySubCategory($value); if($obj != null) { ?>
						<div class="product_catalogue">
							<ul>
								<?php
								foreach($obj as $subobj)
								{

								?>
								<li>
									<div class="product-container">
										<div class="image" style="text-align:center;display:table-cell; vertical-align:middle;">
											<a href="productdetail.php?id=<?php echo $subobj->firstChild->nodeValue ?>"><img src="<?php echo ($subobj->lastChild->previousSibling->previousSibling->previousSibling->previousSibling->nodeValue != '')? $subobj->lastChild->previousSibling->previousSibling->previousSibling->previousSibling->nodeValue : '../../images/frontend/sample-product.gif' ?>" alt="sample product" /></a>
										</div>
										<div class="title">
											<p><a href="productdetail.php?pid=<?php echo $subobj->firstChild->nodeValue ?>&id=<?php echo $subobj->firstChild->nextSibling->nextSibling->nodeValue ?>"><?php echo $subobj->firstChild->nextSibling->nextSibling->nextSibling->nodeValue ?></a></p>
										</div>
										<div class="price">
											<p><?php echo $subobj->firstChild->nextSibling->nextSibling->nextSibling->nextSibling->nextSibling->nextSibling->nextSibling->nodeValue; ?> <?php echo $subobj->firstChild->nextSibling->nextSibling->nextSibling->nextSibling->nextSibling->nextSibling->nodeValue ?></p>
										</div>
									</div>
								</li>
								<?php } ?>
							</ul>

						</div>
						<?php } ?>
					</div><!-- end of product category container -->
					<?php } ?>
				<?php } ?>


			</div><!-- end of merchant detail container -->

		</div>

	</div>

</div>

<?php include_once('footer.php'); ?>