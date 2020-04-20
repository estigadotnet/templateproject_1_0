<?php
namespace PHPMaker2020\templateproject_1_0;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$d101_beranda_dashboard = new d101_beranda_dashboard();

// Run the page
$d101_beranda_dashboard->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$d101_beranda_dashboard->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fdashboard, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "dashboard";
	fdashboard = currentForm = new ew.Form("fdashboard", "dashboard");
	loadjs.done("fdashboard");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<!-- Content Container -->
<div id="ew-report" class="ew-report">
<div class="btn-toolbar ew-toolbar"></div>
<?php $d101_beranda_dashboard->showPageHeader(); ?>
<?php
$d101_beranda_dashboard->showMessage();
?>
<!-- Dashboard Container -->
<div id="ew-dashboard" class="container-fluid ew-dashboard ew-vertical">
<div class="row">
	<div class="col-lg-6 mw-50">
		<div class="card">
			<h3 class="card-header">Berita</h3>
			<div class="card-body">
<?php include_once "r101_beritasmry.php"; ?>
</div>
		</div>
	</div>
	<?php
	if (IsLoggedIn()) {
	?>
	<div class="col-lg-6 mw-50">
		<div class="card">
			<h3 class="card-header">Setting</h3>
			<div class="card-body">
<?php include_once "r202_userssmry.php"; ?>
</div>
		</div>
		<!-- <div class="card">
			<h3 class="card-header">Orders by Category</h3>
			<div class="card-body"></div>
		</div> -->
	</div>
	<?php
	}
	?>
</div>
</div>
<!-- /.ew-dashboard -->
</div>
<!-- /.ew-report -->
<?php
$d101_beranda_dashboard->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$d101_beranda_dashboard->terminate();
?>