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
$t203_userlevelpermissions_view = new t203_userlevelpermissions_view();

// Run the page
$t203_userlevelpermissions_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t203_userlevelpermissions_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t203_userlevelpermissions_view->isExport()) { ?>
<script>
var ft203_userlevelpermissionsview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ft203_userlevelpermissionsview = currentForm = new ew.Form("ft203_userlevelpermissionsview", "view");
	loadjs.done("ft203_userlevelpermissionsview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t203_userlevelpermissions_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t203_userlevelpermissions_view->ExportOptions->render("body") ?>
<?php $t203_userlevelpermissions_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t203_userlevelpermissions_view->showPageHeader(); ?>
<?php
$t203_userlevelpermissions_view->showMessage();
?>
<form name="ft203_userlevelpermissionsview" id="ft203_userlevelpermissionsview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t203_userlevelpermissions">
<input type="hidden" name="modal" value="<?php echo (int)$t203_userlevelpermissions_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t203_userlevelpermissions_view->userlevelid->Visible) { // userlevelid ?>
	<tr id="r_userlevelid">
		<td class="<?php echo $t203_userlevelpermissions_view->TableLeftColumnClass ?>"><span id="elh_t203_userlevelpermissions_userlevelid"><?php echo $t203_userlevelpermissions_view->userlevelid->caption() ?></span></td>
		<td data-name="userlevelid" <?php echo $t203_userlevelpermissions_view->userlevelid->cellAttributes() ?>>
<span id="el_t203_userlevelpermissions_userlevelid">
<span<?php echo $t203_userlevelpermissions_view->userlevelid->viewAttributes() ?>><?php echo $t203_userlevelpermissions_view->userlevelid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t203_userlevelpermissions_view->_tablename->Visible) { // tablename ?>
	<tr id="r__tablename">
		<td class="<?php echo $t203_userlevelpermissions_view->TableLeftColumnClass ?>"><span id="elh_t203_userlevelpermissions__tablename"><?php echo $t203_userlevelpermissions_view->_tablename->caption() ?></span></td>
		<td data-name="_tablename" <?php echo $t203_userlevelpermissions_view->_tablename->cellAttributes() ?>>
<span id="el_t203_userlevelpermissions__tablename">
<span<?php echo $t203_userlevelpermissions_view->_tablename->viewAttributes() ?>><?php echo $t203_userlevelpermissions_view->_tablename->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t203_userlevelpermissions_view->permission->Visible) { // permission ?>
	<tr id="r_permission">
		<td class="<?php echo $t203_userlevelpermissions_view->TableLeftColumnClass ?>"><span id="elh_t203_userlevelpermissions_permission"><?php echo $t203_userlevelpermissions_view->permission->caption() ?></span></td>
		<td data-name="permission" <?php echo $t203_userlevelpermissions_view->permission->cellAttributes() ?>>
<span id="el_t203_userlevelpermissions_permission">
<span<?php echo $t203_userlevelpermissions_view->permission->viewAttributes() ?>><?php echo $t203_userlevelpermissions_view->permission->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t203_userlevelpermissions_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t203_userlevelpermissions_view->isExport()) { ?>
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
$t203_userlevelpermissions_view->terminate();
?>