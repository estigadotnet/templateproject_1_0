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
$t201_users_delete = new t201_users_delete();

// Run the page
$t201_users_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t201_users_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft201_usersdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ft201_usersdelete = currentForm = new ew.Form("ft201_usersdelete", "delete");
	loadjs.done("ft201_usersdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t201_users_delete->showPageHeader(); ?>
<?php
$t201_users_delete->showMessage();
?>
<form name="ft201_usersdelete" id="ft201_usersdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t201_users">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t201_users_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t201_users_delete->UserLevel->Visible) { // UserLevel ?>
		<th class="<?php echo $t201_users_delete->UserLevel->headerCellClass() ?>"><span id="elh_t201_users_UserLevel" class="t201_users_UserLevel"><?php echo $t201_users_delete->UserLevel->caption() ?></span></th>
<?php } ?>
<?php if ($t201_users_delete->Username->Visible) { // Username ?>
		<th class="<?php echo $t201_users_delete->Username->headerCellClass() ?>"><span id="elh_t201_users_Username" class="t201_users_Username"><?php echo $t201_users_delete->Username->caption() ?></span></th>
<?php } ?>
<?php if ($t201_users_delete->sekolah_id->Visible) { // sekolah_id ?>
		<th class="<?php echo $t201_users_delete->sekolah_id->headerCellClass() ?>"><span id="elh_t201_users_sekolah_id" class="t201_users_sekolah_id"><?php echo $t201_users_delete->sekolah_id->caption() ?></span></th>
<?php } ?>
<?php if ($t201_users_delete->tahunajaran_id->Visible) { // tahunajaran_id ?>
		<th class="<?php echo $t201_users_delete->tahunajaran_id->headerCellClass() ?>"><span id="elh_t201_users_tahunajaran_id" class="t201_users_tahunajaran_id"><?php echo $t201_users_delete->tahunajaran_id->caption() ?></span></th>
<?php } ?>
<?php if ($t201_users_delete->kelas_id->Visible) { // kelas_id ?>
		<th class="<?php echo $t201_users_delete->kelas_id->headerCellClass() ?>"><span id="elh_t201_users_kelas_id" class="t201_users_kelas_id"><?php echo $t201_users_delete->kelas_id->caption() ?></span></th>
<?php } ?>
<?php if ($t201_users_delete->semester_id->Visible) { // semester_id ?>
		<th class="<?php echo $t201_users_delete->semester_id->headerCellClass() ?>"><span id="elh_t201_users_semester_id" class="t201_users_semester_id"><?php echo $t201_users_delete->semester_id->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t201_users_delete->RecordCount = 0;
$i = 0;
while (!$t201_users_delete->Recordset->EOF) {
	$t201_users_delete->RecordCount++;
	$t201_users_delete->RowCount++;

	// Set row properties
	$t201_users->resetAttributes();
	$t201_users->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t201_users_delete->loadRowValues($t201_users_delete->Recordset);

	// Render row
	$t201_users_delete->renderRow();
?>
	<tr <?php echo $t201_users->rowAttributes() ?>>
<?php if ($t201_users_delete->UserLevel->Visible) { // UserLevel ?>
		<td <?php echo $t201_users_delete->UserLevel->cellAttributes() ?>>
<span id="el<?php echo $t201_users_delete->RowCount ?>_t201_users_UserLevel" class="t201_users_UserLevel">
<span<?php echo $t201_users_delete->UserLevel->viewAttributes() ?>><?php echo $t201_users_delete->UserLevel->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t201_users_delete->Username->Visible) { // Username ?>
		<td <?php echo $t201_users_delete->Username->cellAttributes() ?>>
<span id="el<?php echo $t201_users_delete->RowCount ?>_t201_users_Username" class="t201_users_Username">
<span<?php echo $t201_users_delete->Username->viewAttributes() ?>><?php echo $t201_users_delete->Username->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t201_users_delete->sekolah_id->Visible) { // sekolah_id ?>
		<td <?php echo $t201_users_delete->sekolah_id->cellAttributes() ?>>
<span id="el<?php echo $t201_users_delete->RowCount ?>_t201_users_sekolah_id" class="t201_users_sekolah_id">
<span<?php echo $t201_users_delete->sekolah_id->viewAttributes() ?>><?php echo $t201_users_delete->sekolah_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t201_users_delete->tahunajaran_id->Visible) { // tahunajaran_id ?>
		<td <?php echo $t201_users_delete->tahunajaran_id->cellAttributes() ?>>
<span id="el<?php echo $t201_users_delete->RowCount ?>_t201_users_tahunajaran_id" class="t201_users_tahunajaran_id">
<span<?php echo $t201_users_delete->tahunajaran_id->viewAttributes() ?>><?php echo $t201_users_delete->tahunajaran_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t201_users_delete->kelas_id->Visible) { // kelas_id ?>
		<td <?php echo $t201_users_delete->kelas_id->cellAttributes() ?>>
<span id="el<?php echo $t201_users_delete->RowCount ?>_t201_users_kelas_id" class="t201_users_kelas_id">
<span<?php echo $t201_users_delete->kelas_id->viewAttributes() ?>><?php echo $t201_users_delete->kelas_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t201_users_delete->semester_id->Visible) { // semester_id ?>
		<td <?php echo $t201_users_delete->semester_id->cellAttributes() ?>>
<span id="el<?php echo $t201_users_delete->RowCount ?>_t201_users_semester_id" class="t201_users_semester_id">
<span<?php echo $t201_users_delete->semester_id->viewAttributes() ?>><?php echo $t201_users_delete->semester_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t201_users_delete->Recordset->moveNext();
}
$t201_users_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t201_users_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t201_users_delete->showPageFooter();
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
$t201_users_delete->terminate();
?>