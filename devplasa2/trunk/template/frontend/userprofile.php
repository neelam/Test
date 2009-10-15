<?php include_once('header.php'); ?>
<?php
include_once('../../apps/frontend/userprofile.php');
class userprofile_interface extends userprofile
{
	public function userprofile_interface(){
		parent::userprofile();
	}
}

$userprofile_interface = new userprofile_interface();

?>

<div id="content">
	<div id="content-c">
		<div class="userprofile">
			<div class="userprofile-title">
				<h4>Dirman Suharno</h4>
			</div>
			
			<div class="userprofile-avatar">
				<img src="../../images/frontend/sample-merchant.gif" alt="sample user profile" />
			</div>
			
			<div class="userprofile-stat">
				<ul>
					<li><label>Location:</label><br />Jakarta, Indonesia</li>
					<li><label>Date of birth:</label><br />February 28th, 1982</li>
					<li><label>Gender:</label><br />Male</li>
					<li><label>Address:</label><br />Vila Dago B21 No. 3</li>
					<li><label>Phone:</label><br />021-5639991</li>
					<li><label>Email:</label><br /><a href="mailto:dirmansuharno@yahoo.com">dirmansuharno@yahoo.com</a></li>
				</ul>
			</div>
			
		<img src="../../images/frontend/category-bottom.gif" alt="category bottom" />
		</div>
		
		<div class="transaction">
			<div class="transaction-history">
				<div class="title">
					<h2>Shopping Cart</h2>					
				</div>

				<div class="shoppingcart">
					<div class="cart-title">
						<div class="col-delete">Delete</div>
						<div class="col-product">Product</div>
						<div class="col-productid">Product ID</div>
						<div class="col-price">Price</div>
						<div class="col-quantity">Quantity</div>
						<div class="col-subtotal">Sub total</div>
					</div>
					
					<div class="cart-content">
						<div class="col-delete"><a href="#"><img src="../../images/frontend/delete-icon.png" alt="delete" /></a></div>
						<div class="col-product">
								<div class="image">
									<a href="#"><img src="../../images/frontend/sample-thumb.gif" alt="sample thumb" /></a>
								</div>
								<div class="desc">
									<a href="#">Product Title</a>
								</div>
						</div>
						<div class="col-productid">XXX-123123</div>
						<div class="col-price">1,200,000</div>
						<div class="col-quantity"><input type="text" class="quantity-inputarea"  value="10" /></div>
						<div class="col-subtotal">12,000,000</div>
					</div>
					
					<div class="cart-content">
						<div class="col-delete"><a href="#"><img src="../../images/frontend/delete-icon.png" alt="delete" /></a></div>
						<div class="col-product">
								<div class="image">
									<a href="#"><img src="../../images/frontend/sample-thumb.gif" alt="sample thumb" /></a>
								</div>
								<div class="desc">
									<a href="#">Product Title</a>
								</div>
						</div>
						<div class="col-productid">XXX-123123</div>
						<div class="col-price">1,200,000</div>
						<div class="col-quantity"><input type="text" class="quantity-inputarea"  value="10" /></div>
						<div class="col-subtotal">12,000,000</div>
					</div>
					
				</div>
				
				<div class="clear"><br /><br /></div>
				<h4>Shipping Address</h4>
				<textarea class="shipping-textarea" rows="5"></textarea>
				
				<div class="shipping-method">
					<ul>
						<li style="padding-top:3px; ">Your shipping method</li>
						<li><input type="radio" /><label>Standard</label></li>
						<li><input type="radio" /><label>Express</label></li>
					</ul>	
				</div>
				
				<div class="clear"><br /><br /></div>
				<div class="payment-method">
					<ul>
						<li><h4>Payment</h4></li>
						<li><input type="radio" /><label>VISA</label></li>
						<li><input type="radio" /><label>MASTERCARD</label></li>
					</ul>
				</div>
				
				
				<div class="clear"><br /></div>
				<div class="payment">
					<ul>
						<li><label>Name on card</label><br />
						<input type="text" class="payment-inputarea" />
						</li>
						<li><label>Card number</label><br />
						<input type="text" class="payment-inputarea" />
						</li>
						<li><label>Expired date</label><br />
						<select class="expired-select "><option>1</option>
						<option>2</option>
						<option>3</option>
						</select>
						
						<select class="expired-select "><option>1990</option>
						<option>1991</option>
						<option>1992</option>
						</select>
						</li>
						<li><label>Security code</label><br />
						<input type="text" class="security-inputarea" />
						</li>						
					</ul>
				</div>

				<div class="totalpayment">
					<ul>
						<li><h3>Total: Rp. 12,000,000</h3></li>
						<li><input type="button" value="CHECK OUT" class="checkout-button" />
					</ul>
				</div>	
				
																							
			</div><!-- end of transaction of history -->									
			
		</div>
		
	</div>
	
	<div class="horizontal-ad-container">
		<a href="merchantdetail.php"><img src="../../images/frontend/sample-horizontal-ad.gif" alt="sample ad" /></a>
	</div>
	
</div>

<?php include_once('footer.php'); ?>