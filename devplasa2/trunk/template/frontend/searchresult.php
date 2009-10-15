<?php include_once('header.php'); ?>
<?php
include_once('../../apps/frontend/searchresult.php');
class searchresult_interface extends searchresult
{
	public function searchresult_interface(){
		parent::searchresult();
	}
}

$searchresult_interface = new searchresult_interface();

?>

<div id="content">

	<div id="content-c">
		<!-- category -->
		<div class="category">
			<div class="category-title">
				<h4>Merchant Directory</h4>
			</div>
			
			<div class="category-list">
				<ul>
                	<?php
						foreach($searchresult_interface->merchant_group_list as $obj)
						{
					?>
					<li><a href="merchantdirectory.php?id=<?php echo $obj->getAttribute('id') ?>"><?php echo $obj->firstChild->nodeValue ?></a></li>
					<?php } ?>
					<!-- <li><a href="merchantdirectory.php">Electrical</a></li>
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
					<li><a href="merchantdirectory.php">Leisure & Hobbies</a></li>		 -->			
				</ul>
			</div>
			<img src="../../images/frontend/category-bottom.gif" alt="category bottom" />
		</div>
		
		<!-- search result -->
		<div class="searchresult">
			<div class="searchresult-container">
				<div class="title">
					<h2>Product Search result</h2>
					<h4>Results 1 - 5 of about 114,000,000 for apple iphone</h4>
				</div>
				
				<div class="product-searchresult">
					<div class="image">
						<a href="productdetail.php"><img src="../../images/frontend/sample-product.gif" alt="sample product" /></a>
					</div>	
					
					<div class="desc">
						<ul>
							<li><h3><a href="productdetail.php">Apple iPhone 3Gs</a></h3></li>
							<li><a href="merchantdetail.php">iBox</a></li>
							<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
							<li style="padding-top:10px; "><strong>Price: Rp. 9,5000,000</strong></li>
						</ul>
					</div>
				</div>
				
				<div class="product-searchresult">
					<div class="image">
						<a href="productdetail.php"><img src="../../images/frontend/sample-product.gif" alt="sample product" /></a>
					</div>	
					
					<div class="desc">
						<ul>
							<li><h3><a href="productdetail.php">Apple iPhone 3Gs</a></h3></li>
							<li><a href="merchantdetail.php">iBox</a></li>
							<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
							<li style="padding-top:10px; "><strong>Price: Rp. 9,5000,000</strong></li>
						</ul>
					</div>
				</div>
				
				<div class="product-searchresult">
					<div class="image">
						<a href="productdetail.php"><img src="../../images/frontend/sample-product.gif" alt="sample product" /></a>
					</div>	
					
					<div class="desc">
						<ul>
							<li><h3><a href="productdetail.php">Apple iPhone 3Gs</a></h3></li>
							<li><a href="merchantdetail.php">iBox</a></li>
							<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
							<li style="padding-top:10px; "><strong>Price: Rp. 9,5000,000</strong></li>
						</ul>
					</div>
				</div>
				
				<div class="product-searchresult">
					<div class="image">
						<a href="productdetail.php"><img src="../../images/frontend/sample-product.gif" alt="sample product" /></a>
					</div>	
					
					<div class="desc">
						<ul>
							<li><h3><a href="productdetail.php">Apple iPhone 3Gs</a></h3></li>
							<li><a href="merchantdetail.php">iBox</a></li>
							<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
							<li style="padding-top:10px; "><strong>Price: Rp. 9,5000,000</strong></li>
						</ul>
					</div>
				</div>
				
				<div class="product-searchresult">
					<div class="image">
						<a href="productdetail.php"><img src="../../images/frontend/sample-product.gif" alt="sample product" /></a>
					</div>	
					
					<div class="desc">
						<ul>
							<li><h3><a href="productdetail.php">Apple iPhone 3Gs</a></h3></li>
							<li><a href="merchantdetail.php">iBox</a></li>
							<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
							<li style="padding-top:10px; "><strong>Price: Rp. 9,5000,000</strong></li>
						</ul>
					</div>
				</div>
				
				<!-- end of product search result -->												
				
			</div>
			
			<div class="clear"><br /><br /></div>
			
			<div class="searchresult-container">
				<div class="title">
					<h2>Merchant Search result</h2>
					<h4>Results 1 - 5 of about 114,000,000 for apple iphone</h4>
				</div>
				
				<div class="merchant-searchresult">
					<div class="image">
						<a href="merchantdetail.php"><img src="../../images/frontend/sample-product.gif" alt="sample product" /></a>
					</div>	
					
					<div class="desc">
						<ul>
							<li><h3><a href="merchantdetail.php">iBox</a></h3></li>							
							<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>							
						</ul>
					</div>
				</div>	
				
				<div class="merchant-searchresult">
					<div class="image">
						<a href="merchantdetail.php"><img src="../../images/frontend/sample-product.gif" alt="sample product" /></a>
					</div>	
					
					<div class="desc">
						<ul>
							<li><h3><a href="merchantdetail.php">iBox</a></h3></li>							
							<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>							
						</ul>
					</div>
				</div>	
				
				<div class="merchant-searchresult">
					<div class="image">
						<a href="merchantdetail.php"><img src="../../images/frontend/sample-product.gif" alt="sample product" /></a>
					</div>	
					
					<div class="desc">
						<ul>
							<li><h3><a href="merchantdetail.php">iBox</a></h3></li>							
							<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>							
						</ul>
					</div>
				</div>	
				
				<div class="merchant-searchresult">
					<div class="image">
						<a href="merchantdetail.php"><img src="../../images/frontend/sample-product.gif" alt="sample product" /></a>
					</div>	
					
					<div class="desc">
						<ul>
							<li><h3><a href="merchantdetail.php">iBox</a></h3></li>							
							<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>							
						</ul>
					</div>
				</div>	
				
				<div class="merchant-searchresult">
					<div class="image">
						<a href="merchantdetail.php"><img src="../../images/frontend/sample-product.gif" alt="sample product" /></a>
					</div>	
					
					<div class="desc">
						<ul>
							<li><h3><a href="merchantdetail.php">iBox</a></h3></li>							
							<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>							
						</ul>
					</div>
				</div>						
				
				<!-- end of merchant search result -->												
				
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
								<a href="merchantdetail.php"><img src="../../images/frontend/sample-ad.gif" alt="sample ad"/></a>
							</div>
							<h4>Title for this ad</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
							<div class="vertical-ad-link">
								<ul>
									<li><img src="../../images/frontend/store-icon.png" alt="store icon" /></li>
									<li><a href="merchantdetail.php">Go to the store</a></li>
								</ul>
							</div>
						</div>
					</li>
					
					<li>
						<div class="vertical-ad-container">
							<div class="vertical-ad-banner">
								<a href="merchantdetail.php"><img src="../../images/frontend/sample-ad.gif" alt="sample ad"/></a>
							</div>
							<h4>Title for this ad</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
							<div class="vertical-ad-link">
								<ul>
									<li><img src="../../images/frontend/store-icon.png" alt="store icon" /></li>
									<li><a href="merchantdetail.php">Go to the store</a></li>
								</ul>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
		
	</div>
	
</div>

<?php include_once('footer.php'); ?>