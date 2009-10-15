<?php include_once('header.php'); ?>
<?php
include_once('../../apps/frontend/index.php');

class index_interface extends index
{
	public function index_interface(){
		parent::index();
	}
}

$index_interface = new index_interface();
?>
<script type="text/javascript">
	$(document).ready(function(){
		$("ul li div[class='product-container'] div[class='image'] a img").load(function(){
			if($(this).attr('width') > 130) $(this).attr('width', 130);
			if($(this).attr('height') > 130) $(this).attr('height', 130);
		});

		$("ul li div[class='merchant-container'] div[class='chant-logo'] a img").load(function(){
			if($(this).attr('width') > 78) $(this).attr('width', 78);
			if($(this).attr('height') > 78) $(this).attr('height', 78);
		});
	});
</script>

<div id="content">
	<div id="content-c">
		<div class="category">
			<div class="category-title">
				<h4><?php echo (isset($GLOBALS['header_interface']) && isset($GLOBALS['header_interface']->lang))? $GLOBALS['header_interface']->lang->getSinglelanguage('MERCHANT_DIRECTORY'):'' ?></h4>
			</div>
			<?php if($index_interface->merchant_group_list != null) { ?>
			<div class="category-list">
				<ul>
					<?php
						foreach($index_interface->merchant_group_list as $obj)
						{
					?>
					<li><a href="merchantdirectory.php?id=<?php echo $obj->getAttribute('id') ?>"><?php echo $obj->firstChild->nodeValue ?></a></li>
					<?php } ?>
				</ul>
			</div>
			<?php } ?>

		<img src="../../images/frontend/category-bottom.gif" alt="category bottom" />
		</div>

		<div class="product">
			<div class="hot-products">
				<div class="title">
					<h4><?php echo (isset($GLOBALS['header_interface']) && isset($GLOBALS['header_interface']->lang))? $GLOBALS['header_interface']->lang->getSinglelanguage('HOT_PRODUCTS'):'' ?></h4>
				</div>

				<div class="sort">
					<label><?php echo (isset($GLOBALS['header_interface']) && isset($GLOBALS['header_interface']->lang))? $GLOBALS['header_interface']->lang->getSinglelanguage('SORT_BY'):'' ?></label>
					<select>
						<option><?php echo (isset($GLOBALS['header_interface']) && isset($GLOBALS['header_interface']->lang))? $GLOBALS['header_interface']->lang->getSinglelanguage('SELECT_CATEGORY'):'' ?></option>
					</select>
				</div>
				<div class="product-spacerline"></div>
				<?php
					if(isset($index_interface) && $index_interface->hot_product_list != null)
					{
				?>
				<ul>
				<?php
					foreach($index_interface->hot_product_list as $obj)
					{
				?>
				<?php ?>
				<li>
					<div class="product-container">
						<div class="image" style="text-align:center;display:table-cell; vertical-align:middle;">
							<a href="productdetail.php?pid=<?php echo $obj->firstChild->nodeValue ?>&id=<?php echo $obj->firstChild->nextSibling->nextSibling->nodeValue ?>"><img src="<?php echo ($obj->lastChild->previousSibling->previousSibling->previousSibling->previousSibling->nodeValue != '')? $obj->lastChild->previousSibling->previousSibling->previousSibling->previousSibling->nodeValue : '../../images/frontend/sample-product.gif' ?>" alt="sample product" /></a>
						</div>
						<div class="title">
							<p><a href="productdetail.php?pid=<?php echo $obj->firstChild->nodeValue ?>&id=<?php echo $obj->firstChild->nextSibling->nextSibling->nodeValue ?>"><?php echo $obj->firstChild->nextSibling->nextSibling->nextSibling->nodeValue ?></a></p>
						</div>
						<div class="price">
							<p><?php echo $obj->firstChild->nextSibling->nextSibling->nextSibling->nextSibling->nextSibling->nextSibling->nextSibling->nodeValue; ?> <?php echo $obj->firstChild->nextSibling->nextSibling->nextSibling->nextSibling->nextSibling->nextSibling->nodeValue ?></p>
						</div>
					</div>
				</li>
				<?php
						}
				?>
				</ul>
				<?php
					}
				?>
			</div><!-- end of hot products -->

			<div class="featured-products">
				<div class="title">
					<h4><?php echo (isset($GLOBALS['header_interface']) && isset($GLOBALS['header_interface']->lang))? $GLOBALS['header_interface']->lang->getSinglelanguage('FEATURED_PRODUCTS'):'' ?></h4>
				</div>

				<div class="sort">
					<label><?php echo (isset($GLOBALS['header_interface']) && isset($GLOBALS['header_interface']->lang))? $GLOBALS['header_interface']->lang->getSinglelanguage('SORT_BY'):'' ?></label>
					<select>
						<option><?php echo (isset($GLOBALS['header_interface']) && isset($GLOBALS['header_interface']->lang))? $GLOBALS['header_interface']->lang->getSinglelanguage('SELECT_CATEGORY'):'' ?></option>
					</select>
				</div>
				<div class="product-spacerline"></div>

				<?php
					if(isset($index_interface) && $index_interface->feature_product_list != null)
					{
				?>
				<ul>
				<?php
					foreach($index_interface->feature_product_list as $obj)
					{
				?>
				<li>
					<div class="product-container">
						<div class="image" style="text-align:center;display:table-cell; vertical-align:middle;">
							<a href="productdetail.php?pid=<?php echo $obj->firstChild->nodeValue ?>&id=<?php echo $obj->firstChild->nextSibling->nextSibling->nodeValue ?>"><img src="<?php echo ($obj->lastChild->previousSibling->previousSibling->previousSibling->previousSibling->nodeValue != '')? $obj->lastChild->previousSibling->previousSibling->previousSibling->previousSibling->nodeValue : '../../images/frontend/sample-product.gif' ?>" alt="sample product" /></a>
						</div>
						<div class="title">
							<p><a href="productdetail.php?pid=<?php echo $obj->firstChild->nodeValue ?>&id=<?php echo $obj->firstChild->nextSibling->nextSibling->nodeValue ?>"><?php echo $obj->firstChild->nextSibling->nextSibling->nextSibling->nodeValue ?></a></p>
						</div>
						<div class="price">
							<p><?php echo $obj->firstChild->nextSibling->nextSibling->nextSibling->nextSibling->nextSibling->nextSibling->nextSibling->nodeValue; ?> <?php echo $obj->firstChild->nextSibling->nextSibling->nextSibling->nextSibling->nextSibling->nextSibling->nodeValue ?></p>
						</div>
					</div>
				</li>
				<?php
					}
				?>
				</ul>
				<?php
					}
				?>
			</div><!-- end of featured products -->

			<div class="featured-merchant">
				<h4><?php echo (isset($GLOBALS['header_interface']) && isset($GLOBALS['header_interface']->lang))? $GLOBALS['header_interface']->lang->getSinglelanguage('FEATURED_MERCHANTS'):'' ?></h4>
				<?php
					if(isset($index_interface) && $index_interface->feature_merchant_list != null)
					{
				?>
				<ul>
				<?php
					foreach($index_interface->feature_merchant_list as $obj)
					{
				?>
					<li>
						<a title="<?php echo ($obj->nextSibling->previousSibling->firstChild->nodeValue != '')? $obj->nextSibling->previousSibling->firstChild->nodeValue : 'Sample Merchant'; ?>" href="merchantcategory.php?id=<?php echo $obj->getAttribute('id') ?>&group=<?php echo $obj->getAttribute('group') ?>"><img width="78" src="<?php echo ($obj->nextSibling->previousSibling->firstChild->nextSibling->nextSibling->nextSibling->nodeValue  != '')? $obj->nextSibling->previousSibling->firstChild->nextSibling->nextSibling->nextSibling->nodeValue  : '../../images/frontend/sample-merchant.gif' ?>" alt="<?php echo ($obj->nextSibling->previousSibling->firstChild->nodeValue != '')? $obj->nextSibling->previousSibling->firstChild->nodeValue : 'Sample Merchant'; ?>" /></a>
					</li>
				<?php
					}
				?>
				</ul>
				<?php
					}
				?>
			</div> <!-- end of featured merchant -->

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
