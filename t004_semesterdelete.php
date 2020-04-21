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
$t004_semester_delete = new t004_semester_delete();

// Run the page
$t004_semester_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t004_semester_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft004_semesterdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ft004_semesterdelete = currentForm = new ew.Form("ft004_semesterdelete", "delete");
	loadjs.done("ft004_semesterdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t004_semester_delete->showPageHeader(); ?>
<?php
$t004_semester_delete->showMessage();
?>
<form name="ft004_semesterdelete" id="ft004_semesterdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t004_semester">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t004_semester_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t004_semester_delete->Semester->Visible) { // Semester ?>
		<th class="<?php echo $t004_semester_delete->Semester->headerCellClass() ?>"><span id="elh_t004_semester_Semester" class="t004_semester_Semester"><?php echo $t004_semester_delete->Semester->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t004_semester_delete->RecordCount = 0;
$i = 0;
while (!$t004_semester_delete->Recordset->EOF) {
	$t004_semester_delete->RecordCount++;
	$t004_semester_delete->RowCount++;

	// Set row properties
	$t004_semester->resetAttributes();
	$t004_semester->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t004_semester_delete->loadRowValues($t004_semester_delete->Recordset);

	// Render row
	$t004_semester_delete->renderRow();
?>
	<tr <?php echo $t004_semester->rowAttributes() ?>>
<?php if ($t004_semester_delete->Semester->Visible) { // Semester ?>
		<td <?php echo $t004_semester_delete->Semester->cellAttributes() ?>>
<span id="el<?php echo $t004_semester_delete->RowCount ?>_t004_semester_Semester" class="t004_semester_Semester">
<span<?php echo $t004_semester_delete->Semester->viewAttributes() ?>><?php echo $t004_semester_delete->Semester->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t004_semester_delete->Recordset->moveNext();
}
$t004_semester_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t004_semester_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t004_semester_delete->showPageFooter();
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
$t004_semester_delete->terminate();
?>