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
$t101_berita_view = new t101_berita_view();

// Run the page
$t101_berita_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_berita_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t101_berita_view->isExport()) { ?>
<script>
var ft101_beritaview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ft101_beritaview = currentForm = new ew.Form("ft101_beritaview", "view");
	loadjs.done("ft101_beritaview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t101_berita_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t101_berita_view->ExportOptions->render("body") ?>
<?php $t101_berita_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t101_berita_view->showPageHeader(); ?>
<?php
$t101_berita_view->showMessage();
?>
<form name="ft101_beritaview" id="ft101_beritaview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t101_berita">
<input type="hidden" name="modal" value="<?php echo (int)$t101_berita_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t101_berita_view->Tanggal->Visible) { // Tanggal ?>
	<tr id="r_Tanggal">
		<td class="<?php echo $t101_berita_view->TableLeftColumnClass ?>"><span id="elh_t101_berita_Tanggal"><?php echo $t101_berita_view->Tanggal->caption() ?></span></td>
		<td data-name="Tanggal" <?php echo $t101_berita_view->Tanggal->cellAttributes() ?>>
<span id="el_t101_berita_Tanggal">
<span<?php echo $t101_berita_view->Tanggal->viewAttributes() ?>><?php echo $t101_berita_view->Tanggal->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_berita_view->Berita->Visible) { // Berita ?>
	<tr id="r_Berita">
		<td class="<?php echo $t101_berita_view->TableLeftColumnClass ?>"><span id="elh_t101_berita_Berita"><?php echo $t101_berita_view->Berita->caption() ?></span></td>
		<td data-name="Berita" <?php echo $t101_berita_view->Berita->cellAttributes() ?>>
<span id="el_t101_berita_Berita">
<span<?php echo $t101_berita_view->Berita->viewAttributes() ?>><?php echo $t101_berita_view->Berita->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t101_berita_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t101_berita_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$t101_berita_view->terminate();
?>