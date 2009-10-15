<?php include_once('header.php'); ?>
<?php
include_once('../../apps/frontend/productdetail.php');
class productdetail_interface extends productdetail
{
	public function productdetail_interface(){
		parent::productdetail();
	}
}

$productdetail_interface = new productdetail_interface();
$merchant_name;
$merchant_id;
$group_id;
$group_name;

?>
<link type="text/css" href="<?php echo $productdetail_interface->config->live_site.'web/frontend/css/jqModal.css' ?>" ></link>
<script type="text/javascript" src="<?php echo $productdetail_interface->config->live_site.'web/js/jqModal.js' ?>"; ></script>
<style type="text/css">
.jqmWindow {
    display: none;

    position: fixed;
    top: 17%;
    left: 50%;

    margin-left: -300px;
    width: 600px;

    background-color: #fff;
    color: #333;
    border: none;
    padding: 12px;

    text-shadow:none;

    -webkit-border-radius: 5px; -moz-border-radius: 5px;
}

.jqmOverlay { background-color: #000; }

* html .jqmWindow {
     position: absolute;
     top: expression((document.documentElement.scrollTop || document.body.scrollTop) + Math.round(17 * (document.documentElement.offsetHeight || document.body.clientHeight) / 100) + 'px');
}

</style>

<script type="text/javascript">
	$(document).ready(function(){
		$("div[class='product_detail-container'] div[class='image'] img").load(function(){
			if($(this).attr('width') > 298) $(this).attr('width', 298);
			if($(this).attr('height') > 298) $(this).attr('height', 298);
		});

		$().ready(function() {
		  $('#dialog_longdesc').jqm();
		});

		$('#imgaddtocart').click(function(){
			obj = $('#__EVENTTARGET_PRODUCT'); if(obj) obj.val("addproduct");
			obj = $('#__EVENTARGUMENT_PRODUCT'); if(obj) obj.val('');
		/*
			$.ajax({
				url     : $(this).attr('href') + '&qty=' + $('#qty').val(),
				dataType: 'text/html',
				complete: function(xml)
				{
					alert(xml.responseText);
				},
				beforeSend: function() {
					//$('#chkusername_show').html('<img src="../../../../images/frontend/frontend/loading_arrow.gif" alt="Loading" /> <span><?php echo (isset($GLOBALS['header_interface']) && isset($GLOBALS['header_interface']->lang))? $GLOBALS['header_interface']->lang->getSinglelanguage('CHECKING_USERNAME'):'' ?></span>');
				}
			});
			return false;
			*/
		});



	});

	function doNum(e)
	{
		var kcode = e.which || event.keyCode;
		if((kcode > 47 && kcode < 58) || kcode == 8 || kcode == 9 || kcode == 12 || kcode == 27 || kcode == 37 ||
		kcode == 39 || kcode == 46)
			return true;
		else { alert('Please enter number.'); return false; }
	}
</script>
<div id="content">
	<div id="content-c">
		<div class="category">
		<?php
				if(isset($productdetail_interface) && $productdetail_interface->merchant_detail != null)
				{
			?>
			<?php
					foreach($productdetail_interface->merchant_detail as $obj)
					{
						$merchant_name = $obj->firstChild->nodeValue;
						$merchant_id = $obj->getAttribute('id');
						$group_id = $obj->getAttribute('group');
						$group_name = $productdetail_interface->getMerchantgroupName($group_id);
			?>
			<div class="category-title">
				<h4><?php echo $obj->firstChild->nodeValue ?></h4>
			</div>

			<div class="merchant-logo">
				<img src="<?php echo ($obj->firstChild->nextSibling->nextSibling->nextSibling->nodeValue != '')? $obj->firstChild->nextSibling->nextSibling->nextSibling->nodeValue : '../../images/frontend/sample-merchant.gif' ?>" alt="<?php echo ($obj->firstChild->nodeValue != '')? $obj->firstChild->nodeValue : 'Sample Merchant'; ?>" />
			</div>

			<div class="merchant-stat">
				<ul>
					<li><label><?php echo (isset($GLOBALS['header_interface']) && isset($GLOBALS['header_interface']->lang))? $GLOBALS['header_interface']->lang->getSinglelanguage('COMPANY_NAME'):'' ?></label><br/ ><?php echo $obj->firstChild->nextSibling->nodeValue ?></li>
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
				<div class="merchant-logo">
					<img src="../../images/frontend/sample-merchant.gif" alt="sample logo" />
				</div>

				<p><?php echo $obj->lastChild->nodeValue ?></p>
			</div>
					<?php } ?>
			<?php } ?>

		<img src="../../images/frontend/category-bottom.gif" alt="category bottom" />
		</div>
		<?php if(isset($productdetail_interface) && $productdetail_interface->product_detail != null) { ?>
		<div class="product_detail">
			<div class="product_detail-container">
				<div class="breadcrumb">
					<ul>
						<li><a href="index.php"><?php echo (isset($GLOBALS['header_interface']) && isset($GLOBALS['header_interface']->lang))? $GLOBALS['header_interface']->lang->getSinglelanguage('HOME'):'' ?></a></li>
						<li>>&nbsp;&nbsp;<a href="merchantdirectory.php?id=<?php echo $group_id ?>"><?php echo $group_name ?></a></li>
						<li>>&nbsp;&nbsp;<a href="merchantcategory.php?id=<?php echo $merchant_id ?>&groupid=<?php echo $group_id ?>"><?php echo $merchant_name ?></a></li>
						<li>>&nbsp;&nbsp;<a href="merchantsubcategory.php?id=<?php echo $merchant_id ?>&group=<?php echo $group_id ?>&category=<?php echo $productdetail_interface->product_detail->item(0)->firstChild->nextSibling->nextSibling->nextSibling->nextSibling->nodeValue ?>"><?php echo $productdetail_interface->product_detail->item(0)->firstChild->nextSibling->nextSibling->nextSibling->nextSibling->nodeValue  ?></a></li>
						<li>>&nbsp;&nbsp;<a href="merchantdetail.php?id=<?php echo $merchant_id ?>&group=<?php echo $group_id ?>&category=<?php echo $productdetail_interface->product_detail->item(0)->firstChild->nextSibling->nextSibling->nextSibling->nextSibling->nodeValue ?>&subcategory=<?php echo $productdetail_interface->product_detail->item(0)->firstChild->nextSibling->nextSibling->nextSibling->nextSibling->nextSibling->nodeValue ?>"><?php echo $productdetail_interface->product_detail->item(0)->firstChild->nextSibling->nextSibling->nextSibling->nextSibling->nextSibling->nodeValue ?></a></li>
					</ul>
				</div>

				<div class="product_detail-spaceline"></div>

				<div class="title">
					<h2><?php echo $productdetail_interface->product_detail->item(0)->firstChild->nextSibling->nextSibling->nextSibling->nodeValue ?></h2>
				</div>

				<div class="image">
					<img src="<?php echo ($productdetail_interface->product_detail->item(0)->lastChild->previousSibling->previousSibling->previousSibling->previousSibling->previousSibling->previousSibling->nodeValue != '')? $productdetail_interface->product_detail->item(0)->lastChild->previousSibling->previousSibling->previousSibling->previousSibling->previousSibling->previousSibling->nodeValue: '../../images/frontend/sample-product-big.gif' ?>" alt="sample" />
					<form name="form1" id="form1" action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="POST">
					<input type="hidden" id="__EVENTTARGET_PRODUCT" name="__EVENTTARGET_PRODUCT" />
					<input type="hidden" id="__EVENTARGUMENT_PRODUCT" name="__EVENTARGUMENT_PRODUCT" />
					<div class="add-to-cart">
						<ul>
							<li style="margin-top:5px;margin-right:10px;">Quantity<input name="qty" id="qty" type="text" class="quantity-inputarea" style="margin-left:10px;" onblur="javascript:if(this.value < 1) this.value=1;" value="1" onkeypress="javascript:return doNum(event);" /></li>
							<li>
								<!--<a href="ajaxHelper.php?for=user&do=ajax_addtocart&id=<?php echo $productdetail_interface->product_detail->item(0)->firstChild->nodeValue ?>&mid=<?php echo $productdetail_interface->product_detail->item(0)->firstChild->nextSibling->nextSibling->nodeValue ?>" id="addtocart">
								<img src="../../images/frontend/addtocart-button.png" alt="add to cart" style="border:none; margin:0;" /></a>-->
								<input type="image" name="imgaddtocart" id="imgaddtocart" src="../../images/frontend/addtocart-button.png" alt="add to cart" style="border:none; margin:0;" />
							</li>
						</ul>
					</div>
					</form>
				</div>

				<div class="desc">

				<ul>
					<li><strong><?php echo (isset($GLOBALS['header_interface']) && isset($GLOBALS['header_interface']->lang))? $GLOBALS['header_interface']->lang->getSinglelanguage('MALL_PRODUCT_CODE'):'' ?></strong> <?php echo $productdetail_interface->product_detail->item(0)->lastChild->previousSibling->previousSibling->previousSibling->previousSibling->previousSibling->previousSibling->previousSibling->previousSibling->previousSibling->nodeValue ?></li>
					<li><strong><?php echo (isset($GLOBALS['header_interface']) && isset($GLOBALS['header_interface']->lang))? $GLOBALS['header_interface']->lang->getSinglelanguage('MERCHANT_PRODUCT_C0DE'):'' ?></strong> <?php echo $productdetail_interface->product_detail->item(0)->lastChild->previousSibling->previousSibling->previousSibling->previousSibling->previousSibling->previousSibling->previousSibling->previousSibling->nodeValue  ?></li>
					<li><strong><?php echo (isset($GLOBALS['header_interface']) && isset($GLOBALS['header_interface']->lang))? $GLOBALS['header_interface']->lang->getSinglelanguage('PRICE'):'' ?></strong> <?php echo $productdetail_interface->product_detail->item(0)->firstChild->nextSibling->nextSibling->nextSibling->nextSibling->nextSibling->nextSibling->nextSibling->nodeValue  ?> <?php echo $productdetail_interface->product_detail->item(0)->firstChild->nextSibling->nextSibling->nextSibling->nextSibling->nextSibling->nextSibling->nodeValue ?></li>
				</ul>

					<p><strong><?php echo (isset($GLOBALS['header_interface']) && isset($GLOBALS['header_interface']->lang))? $GLOBALS['header_interface']->lang->getSinglelanguage('PRODUCT_DESC'):'' ?></strong></p>
					<p><?php echo $productdetail_interface->product_detail->item(0)->lastChild->previousSibling->previousSibling->nodeValue?></p>
				</div>
			</div><!-- end of product detail container -->
		<?php } ?>

		</div>
	</div>
</div>

<?php include_once('footer.php'); ?>