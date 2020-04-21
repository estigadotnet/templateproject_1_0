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
$t002_tahunajaran_view = new t002_tahunajaran_view();

// Run the page
$t002_tahunajaran_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t002_tahunajaran_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t002_tahunajaran_view->isExport()) { ?>
<script>
var ft002_tahunajaranview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ft002_tahunajaranview = currentForm = new ew.Form("ft002_tahunajaranview", "view");
	loadjs.done("ft002_tahunajaranview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t002_tahunajaran_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t002_tahunajaran_view->ExportOptions->render("body") ?>
<?php $t002_tahunajaran_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t002_tahunajaran_view->showPageHeader(); ?>
<?php
$t002_tahunajaran_view->showMessage();
?>
<form name="ft002_tahunajaranview" id="ft002_tahunajaranview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t002_tahunajaran">
<input type="hidden" name="modal" value="<?php echo (int)$t002_tahunajaran_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t002_tahunajaran_view->Mulai->Visible) { // Mulai ?>
	<tr id="r_Mulai">
		<td class="<?php echo $t002_tahunajaran_view->TableLeftColumnClass ?>"><span id="elh_t002_tahunajaran_Mulai"><?php echo $t002_tahunajaran_view->Mulai->caption() ?></span></td>
		<td data-name="Mulai" <?php echo $t002_tahunajaran_view->Mulai->cellAttributes() ?>>
<span id="el_t002_tahunajaran_Mulai">
<span<?php echo $t002_tahunajaran_view->Mulai->viewAttributes() ?>><?php echo $t002_tahunajaran_view->Mulai->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t002_tahunajaran_view->Selesai->Visible) { // Selesai ?>
	<tr id="r_Selesai">
		<td class="<?php echo $t002_tahunajaran_view->TableLeftColumnClass ?>"><span id="elh_t002_tahunajaran_Selesai"><?php echo $t002_tahunajaran_view->Selesai->caption() ?></span></td>
		<td data-name="Selesai" <?php echo $t002_tahunajaran_view->Selesai->cellAttributes() ?>>
<span id="el_t002_tahunajaran_Selesai">
<span<?php echo $t002_tahunajaran_view->Selesai->viewAttributes() ?>><?php echo $t002_tahunajaran_view->Selesai->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t002_tahunajaran_view->TahunAjaran->Visible) { // TahunAjaran ?>
	<tr id="r_TahunAjaran">
		<td class="<?php echo $t002_tahunajaran_view->TableLeftColumnClass ?>"><span id="elh_t002_tahunajaran_TahunAjaran"><?php echo $t002_tahunajaran_view->TahunAjaran->caption() ?></span></td>
		<td data-name="TahunAjaran" <?php echo $t002_tahunajaran_view->TahunAjaran->cellAttributes() ?>>
<span id="el_t002_tahunajaran_TahunAjaran">
<span<?php echo $t002_tahunajaran_view->TahunAjaran->viewAttributes() ?>><?php echo $t002_tahunajaran_view->TahunAjaran->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t002_tahunajaran_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t002_tahunajaran_view->isExport()) { ?>
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
$t002_tahunajaran_view->terminate();
?>