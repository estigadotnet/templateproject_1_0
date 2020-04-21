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
$t003_kelas_view = new t003_kelas_view();

// Run the page
$t003_kelas_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t003_kelas_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t003_kelas_view->isExport()) { ?>
<script>
var ft003_kelasview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ft003_kelasview = currentForm = new ew.Form("ft003_kelasview", "view");
	loadjs.done("ft003_kelasview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t003_kelas_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t003_kelas_view->ExportOptions->render("body") ?>
<?php $t003_kelas_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t003_kelas_view->showPageHeader(); ?>
<?php
$t003_kelas_view->showMessage();
?>
<form name="ft003_kelasview" id="ft003_kelasview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t003_kelas">
<input type="hidden" name="modal" value="<?php echo (int)$t003_kelas_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t003_kelas_view->Kelas->Visible) { // Kelas ?>
	<tr id="r_Kelas">
		<td class="<?php echo $t003_kelas_view->TableLeftColumnClass ?>"><span id="elh_t003_kelas_Kelas"><?php echo $t003_kelas_view->Kelas->caption() ?></span></td>
		<td data-name="Kelas" <?php echo $t003_kelas_view->Kelas->cellAttributes() ?>>
<span id="el_t003_kelas_Kelas">
<span<?php echo $t003_kelas_view->Kelas->viewAttributes() ?>><?php echo $t003_kelas_view->Kelas->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t003_kelas_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t003_kelas_view->isExport()) { ?>
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
$t003_kelas_view->terminate();
?>