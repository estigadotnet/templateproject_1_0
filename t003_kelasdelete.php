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
$t003_kelas_delete = new t003_kelas_delete();

// Run the page
$t003_kelas_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t003_kelas_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft003_kelasdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ft003_kelasdelete = currentForm = new ew.Form("ft003_kelasdelete", "delete");
	loadjs.done("ft003_kelasdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t003_kelas_delete->showPageHeader(); ?>
<?php
$t003_kelas_delete->showMessage();
?>
<form name="ft003_kelasdelete" id="ft003_kelasdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t003_kelas">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t003_kelas_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t003_kelas_delete->Kelas->Visible) { // Kelas ?>
		<th class="<?php echo $t003_kelas_delete->Kelas->headerCellClass() ?>"><span id="elh_t003_kelas_Kelas" class="t003_kelas_Kelas"><?php echo $t003_kelas_delete->Kelas->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t003_kelas_delete->RecordCount = 0;
$i = 0;
while (!$t003_kelas_delete->Recordset->EOF) {
	$t003_kelas_delete->RecordCount++;
	$t003_kelas_delete->RowCount++;

	// Set row properties
	$t003_kelas->resetAttributes();
	$t003_kelas->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t003_kelas_delete->loadRowValues($t003_kelas_delete->Recordset);

	// Render row
	$t003_kelas_delete->renderRow();
?>
	<tr <?php echo $t003_kelas->rowAttributes() ?>>
<?php if ($t003_kelas_delete->Kelas->Visible) { // Kelas ?>
		<td <?php echo $t003_kelas_delete->Kelas->cellAttributes() ?>>
<span id="el<?php echo $t003_kelas_delete->RowCount ?>_t003_kelas_Kelas" class="t003_kelas_Kelas">
<span<?php echo $t003_kelas_delete->Kelas->viewAttributes() ?>><?php echo $t003_kelas_delete->Kelas->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t003_kelas_delete->Recordset->moveNext();
}
$t003_kelas_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t003_kelas_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t003_kelas_delete->showPageFooter();
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
$t003_kelas_delete->terminate();
?>