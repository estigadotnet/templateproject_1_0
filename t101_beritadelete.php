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
$t101_berita_delete = new t101_berita_delete();

// Run the page
$t101_berita_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_berita_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft101_beritadelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ft101_beritadelete = currentForm = new ew.Form("ft101_beritadelete", "delete");
	loadjs.done("ft101_beritadelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t101_berita_delete->showPageHeader(); ?>
<?php
$t101_berita_delete->showMessage();
?>
<form name="ft101_beritadelete" id="ft101_beritadelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t101_berita">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t101_berita_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t101_berita_delete->Tanggal->Visible) { // Tanggal ?>
		<th class="<?php echo $t101_berita_delete->Tanggal->headerCellClass() ?>"><span id="elh_t101_berita_Tanggal" class="t101_berita_Tanggal"><?php echo $t101_berita_delete->Tanggal->caption() ?></span></th>
<?php } ?>
<?php if ($t101_berita_delete->Berita->Visible) { // Berita ?>
		<th class="<?php echo $t101_berita_delete->Berita->headerCellClass() ?>"><span id="elh_t101_berita_Berita" class="t101_berita_Berita"><?php echo $t101_berita_delete->Berita->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t101_berita_delete->RecordCount = 0;
$i = 0;
while (!$t101_berita_delete->Recordset->EOF) {
	$t101_berita_delete->RecordCount++;
	$t101_berita_delete->RowCount++;

	// Set row properties
	$t101_berita->resetAttributes();
	$t101_berita->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t101_berita_delete->loadRowValues($t101_berita_delete->Recordset);

	// Render row
	$t101_berita_delete->renderRow();
?>
	<tr <?php echo $t101_berita->rowAttributes() ?>>
<?php if ($t101_berita_delete->Tanggal->Visible) { // Tanggal ?>
		<td <?php echo $t101_berita_delete->Tanggal->cellAttributes() ?>>
<span id="el<?php echo $t101_berita_delete->RowCount ?>_t101_berita_Tanggal" class="t101_berita_Tanggal">
<span<?php echo $t101_berita_delete->Tanggal->viewAttributes() ?>><?php echo $t101_berita_delete->Tanggal->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_berita_delete->Berita->Visible) { // Berita ?>
		<td <?php echo $t101_berita_delete->Berita->cellAttributes() ?>>
<span id="el<?php echo $t101_berita_delete->RowCount ?>_t101_berita_Berita" class="t101_berita_Berita">
<span<?php echo $t101_berita_delete->Berita->viewAttributes() ?>><?php echo $t101_berita_delete->Berita->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t101_berita_delete->Recordset->moveNext();
}
$t101_berita_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t101_berita_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t101_berita_delete->showPageFooter();
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
$t101_berita_delete->terminate();
?>