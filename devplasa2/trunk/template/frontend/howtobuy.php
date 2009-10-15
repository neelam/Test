<?php include_once('header.php'); ?>
<?php
include_once('../../apps/frontend/howtobuy.php');
class howtobuy_interface extends howtobuy
{
	public function howtobuy_interface(){
		parent::howtobuy();
	}
}

$howtobuy_interface = new howtobuy_interface();

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
		
		<div class="activation">
			<div class="user-activation">
				<div class="title">
					<h2>How To Buy</h2>					
				</div>
				
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

				<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>

				<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>
																			
			</div><!-- end of user registration -->									
			
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