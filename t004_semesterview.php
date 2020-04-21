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
$t004_semester_view = new t004_semester_view();

// Run the page
$t004_semester_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t004_semester_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t004_semester_view->isExport()) { ?>
<script>
var ft004_semesterview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ft004_semesterview = currentForm = new ew.Form("ft004_semesterview", "view");
	loadjs.done("ft004_semesterview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t004_semester_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t004_semester_view->ExportOptions->render("body") ?>
<?php $t004_semester_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t004_semester_view->showPageHeader(); ?>
<?php
$t004_semester_view->showMessage();
?>
<form name="ft004_semesterview" id="ft004_semesterview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t004_semester">
<input type="hidden" name="modal" value="<?php echo (int)$t004_semester_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t004_semester_view->Semester->Visible) { // Semester ?>
	<tr id="r_Semester">
		<td class="<?php echo $t004_semester_view->TableLeftColumnClass ?>"><span id="elh_t004_semester_Semester"><?php echo $t004_semester_view->Semester->caption() ?></span></td>
		<td data-name="Semester" <?php echo $t004_semester_view->Semester->cellAttributes() ?>>
<span id="el_t004_semester_Semester">
<span<?php echo $t004_semester_view->Semester->viewAttributes() ?>><?php echo $t004_semester_view->Semester->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t004_semester_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t004_semester_view->isExport()) { ?>
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
$t004_semester_view->terminate();
?>