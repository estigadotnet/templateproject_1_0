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
$t001_sekolah_view = new t001_sekolah_view();

// Run the page
$t001_sekolah_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t001_sekolah_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t001_sekolah_view->isExport()) { ?>
<script>
var ft001_sekolahview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ft001_sekolahview = currentForm = new ew.Form("ft001_sekolahview", "view");
	loadjs.done("ft001_sekolahview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t001_sekolah_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t001_sekolah_view->ExportOptions->render("body") ?>
<?php $t001_sekolah_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t001_sekolah_view->showPageHeader(); ?>
<?php
$t001_sekolah_view->showMessage();
?>
<form name="ft001_sekolahview" id="ft001_sekolahview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t001_sekolah">
<input type="hidden" name="modal" value="<?php echo (int)$t001_sekolah_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t001_sekolah_view->Nama->Visible) { // Nama ?>
	<tr id="r_Nama">
		<td class="<?php echo $t001_sekolah_view->TableLeftColumnClass ?>"><span id="elh_t001_sekolah_Nama"><?php echo $t001_sekolah_view->Nama->caption() ?></span></td>
		<td data-name="Nama" <?php echo $t001_sekolah_view->Nama->cellAttributes() ?>>
<span id="el_t001_sekolah_Nama">
<span<?php echo $t001_sekolah_view->Nama->viewAttributes() ?>><?php echo $t001_sekolah_view->Nama->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t001_sekolah_view->Alamat->Visible) { // Alamat ?>
	<tr id="r_Alamat">
		<td class="<?php echo $t001_sekolah_view->TableLeftColumnClass ?>"><span id="elh_t001_sekolah_Alamat"><?php echo $t001_sekolah_view->Alamat->caption() ?></span></td>
		<td data-name="Alamat" <?php echo $t001_sekolah_view->Alamat->cellAttributes() ?>>
<span id="el_t001_sekolah_Alamat">
<span<?php echo $t001_sekolah_view->Alamat->viewAttributes() ?>><?php echo $t001_sekolah_view->Alamat->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t001_sekolah_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t001_sekolah_view->isExport()) { ?>
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
$t001_sekolah_view->terminate();
?>