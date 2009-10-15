<?php include_once('header.php'); ?>
<?php
include_once('../../apps/admin/dashboard.php');
class dashboard_interface extends dashboard
{
	public function dashboard_interface(){
		parent::dashboard();
	}
}

$dashboard_interface = new dashboard_interface();

?>

	<div id="content">
		<div class="content-l">
			<h2>Right now</h2>
			<div class="box">
				<h3>Today you have 20 new users</h3>
				<p><a href="#">lipsum</a>, <a href="#">lorem</a>, <a href="#">MonkeyKing</a>, <a href="#">Mocha</a>, <a href="#">AnitaIskandar</a>, <a href="#">Luciana</a>, <a href="#">PatiFertpolin</a>, <a href="#">Dirman</a>, <a href="#">ShantyWidya</a>, <a href="#">Astrid</a>, <a href="#">lipsum</a>, <a href="#">lorem</a>, <a href="#">MonkeyKing</a>, <a href="#">Mocha</a>, <a href="#">AnitaIskandar</a>, <a href="#">Luciana</a>, <a href="#">PatiFertpolin</a>, <a href="#">Dirman</a>, <a href="#">ShantyWidya</a>, <a href="#">Astrid</a></p>
				<h3>Total users: <a href="user-management.html">2,043 users</a></h3>
			</div>
		</div>
		<div class="content-r">
			<h2>Stats</h2>
			<div class="box">
				<img src="<?php echo $config->live_site.'images/admin/stats-sample.gif' ?>" alt="stats" />
			</div>
		</div>
	</div> <!-- end of content section -->
</body>

<?php include_once('footer.php'); ?>