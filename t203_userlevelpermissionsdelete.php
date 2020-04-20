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
$t203_userlevelpermissions_delete = new t203_userlevelpermissions_delete();

// Run the page
$t203_userlevelpermissions_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t203_userlevelpermissions_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft203_userlevelpermissionsdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ft203_userlevelpermissionsdelete = currentForm = new ew.Form("ft203_userlevelpermissionsdelete", "delete");
	loadjs.done("ft203_userlevelpermissionsdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t203_userlevelpermissions_delete->showPageHeader(); ?>
<?php
$t203_userlevelpermissions_delete->showMessage();
?>
<form name="ft203_userlevelpermissionsdelete" id="ft203_userlevelpermissionsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t203_userlevelpermissions">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t203_userlevelpermissions_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t203_userlevelpermissions_delete->userlevelid->Visible) { // userlevelid ?>
		<th class="<?php echo $t203_userlevelpermissions_delete->userlevelid->headerCellClass() ?>"><span id="elh_t203_userlevelpermissions_userlevelid" class="t203_userlevelpermissions_userlevelid"><?php echo $t203_userlevelpermissions_delete->userlevelid->caption() ?></span></th>
<?php } ?>
<?php if ($t203_userlevelpermissions_delete->_tablename->Visible) { // tablename ?>
		<th class="<?php echo $t203_userlevelpermissions_delete->_tablename->headerCellClass() ?>"><span id="elh_t203_userlevelpermissions__tablename" class="t203_userlevelpermissions__tablename"><?php echo $t203_userlevelpermissions_delete->_tablename->caption() ?></span></th>
<?php } ?>
<?php if ($t203_userlevelpermissions_delete->permission->Visible) { // permission ?>
		<th class="<?php echo $t203_userlevelpermissions_delete->permission->headerCellClass() ?>"><span id="elh_t203_userlevelpermissions_permission" class="t203_userlevelpermissions_permission"><?php echo $t203_userlevelpermissions_delete->permission->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t203_userlevelpermissions_delete->RecordCount = 0;
$i = 0;
while (!$t203_userlevelpermissions_delete->Recordset->EOF) {
	$t203_userlevelpermissions_delete->RecordCount++;
	$t203_userlevelpermissions_delete->RowCount++;

	// Set row properties
	$t203_userlevelpermissions->resetAttributes();
	$t203_userlevelpermissions->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t203_userlevelpermissions_delete->loadRowValues($t203_userlevelpermissions_delete->Recordset);

	// Render row
	$t203_userlevelpermissions_delete->renderRow();
?>
	<tr <?php echo $t203_userlevelpermissions->rowAttributes() ?>>
<?php if ($t203_userlevelpermissions_delete->userlevelid->Visible) { // userlevelid ?>
		<td <?php echo $t203_userlevelpermissions_delete->userlevelid->cellAttributes() ?>>
<span id="el<?php echo $t203_userlevelpermissions_delete->RowCount ?>_t203_userlevelpermissions_userlevelid" class="t203_userlevelpermissions_userlevelid">
<span<?php echo $t203_userlevelpermissions_delete->userlevelid->viewAttributes() ?>><?php echo $t203_userlevelpermissions_delete->userlevelid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t203_userlevelpermissions_delete->_tablename->Visible) { // tablename ?>
		<td <?php echo $t203_userlevelpermissions_delete->_tablename->cellAttributes() ?>>
<span id="el<?php echo $t203_userlevelpermissions_delete->RowCount ?>_t203_userlevelpermissions__tablename" class="t203_userlevelpermissions__tablename">
<span<?php echo $t203_userlevelpermissions_delete->_tablename->viewAttributes() ?>><?php echo $t203_userlevelpermissions_delete->_tablename->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t203_userlevelpermissions_delete->permission->Visible) { // permission ?>
		<td <?php echo $t203_userlevelpermissions_delete->permission->cellAttributes() ?>>
<span id="el<?php echo $t203_userlevelpermissions_delete->RowCount ?>_t203_userlevelpermissions_permission" class="t203_userlevelpermissions_permission">
<span<?php echo $t203_userlevelpermissions_delete->permission->viewAttributes() ?>><?php echo $t203_userlevelpermissions_delete->permission->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t203_userlevelpermissions_delete->Recordset->moveNext();
}
$t203_userlevelpermissions_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t203_userlevelpermissions_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t203_userlevelpermissions_delete->showPageFooter();
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
$t203_userlevelpermissions_delete->terminate();
?>