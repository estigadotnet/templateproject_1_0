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
$t002_tahunajaran_delete = new t002_tahunajaran_delete();

// Run the page
$t002_tahunajaran_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t002_tahunajaran_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft002_tahunajarandelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ft002_tahunajarandelete = currentForm = new ew.Form("ft002_tahunajarandelete", "delete");
	loadjs.done("ft002_tahunajarandelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t002_tahunajaran_delete->showPageHeader(); ?>
<?php
$t002_tahunajaran_delete->showMessage();
?>
<form name="ft002_tahunajarandelete" id="ft002_tahunajarandelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t002_tahunajaran">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t002_tahunajaran_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t002_tahunajaran_delete->Mulai->Visible) { // Mulai ?>
		<th class="<?php echo $t002_tahunajaran_delete->Mulai->headerCellClass() ?>"><span id="elh_t002_tahunajaran_Mulai" class="t002_tahunajaran_Mulai"><?php echo $t002_tahunajaran_delete->Mulai->caption() ?></span></th>
<?php } ?>
<?php if ($t002_tahunajaran_delete->Selesai->Visible) { // Selesai ?>
		<th class="<?php echo $t002_tahunajaran_delete->Selesai->headerCellClass() ?>"><span id="elh_t002_tahunajaran_Selesai" class="t002_tahunajaran_Selesai"><?php echo $t002_tahunajaran_delete->Selesai->caption() ?></span></th>
<?php } ?>
<?php if ($t002_tahunajaran_delete->TahunAjaran->Visible) { // TahunAjaran ?>
		<th class="<?php echo $t002_tahunajaran_delete->TahunAjaran->headerCellClass() ?>"><span id="elh_t002_tahunajaran_TahunAjaran" class="t002_tahunajaran_TahunAjaran"><?php echo $t002_tahunajaran_delete->TahunAjaran->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t002_tahunajaran_delete->RecordCount = 0;
$i = 0;
while (!$t002_tahunajaran_delete->Recordset->EOF) {
	$t002_tahunajaran_delete->RecordCount++;
	$t002_tahunajaran_delete->RowCount++;

	// Set row properties
	$t002_tahunajaran->resetAttributes();
	$t002_tahunajaran->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t002_tahunajaran_delete->loadRowValues($t002_tahunajaran_delete->Recordset);

	// Render row
	$t002_tahunajaran_delete->renderRow();
?>
	<tr <?php echo $t002_tahunajaran->rowAttributes() ?>>
<?php if ($t002_tahunajaran_delete->Mulai->Visible) { // Mulai ?>
		<td <?php echo $t002_tahunajaran_delete->Mulai->cellAttributes() ?>>
<span id="el<?php echo $t002_tahunajaran_delete->RowCount ?>_t002_tahunajaran_Mulai" class="t002_tahunajaran_Mulai">
<span<?php echo $t002_tahunajaran_delete->Mulai->viewAttributes() ?>><?php echo $t002_tahunajaran_delete->Mulai->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t002_tahunajaran_delete->Selesai->Visible) { // Selesai ?>
		<td <?php echo $t002_tahunajaran_delete->Selesai->cellAttributes() ?>>
<span id="el<?php echo $t002_tahunajaran_delete->RowCount ?>_t002_tahunajaran_Selesai" class="t002_tahunajaran_Selesai">
<span<?php echo $t002_tahunajaran_delete->Selesai->viewAttributes() ?>><?php echo $t002_tahunajaran_delete->Selesai->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t002_tahunajaran_delete->TahunAjaran->Visible) { // TahunAjaran ?>
		<td <?php echo $t002_tahunajaran_delete->TahunAjaran->cellAttributes() ?>>
<span id="el<?php echo $t002_tahunajaran_delete->RowCount ?>_t002_tahunajaran_TahunAjaran" class="t002_tahunajaran_TahunAjaran">
<span<?php echo $t002_tahunajaran_delete->TahunAjaran->viewAttributes() ?>><?php echo $t002_tahunajaran_delete->TahunAjaran->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t002_tahunajaran_delete->Recordset->moveNext();
}
$t002_tahunajaran_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t002_tahunajaran_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t002_tahunajaran_delete->showPageFooter();
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
$t002_tahunajaran_delete->terminate();
?>