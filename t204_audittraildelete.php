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
$t204_audittrail_delete = new t204_audittrail_delete();

// Run the page
$t204_audittrail_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t204_audittrail_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft204_audittraildelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ft204_audittraildelete = currentForm = new ew.Form("ft204_audittraildelete", "delete");
	loadjs.done("ft204_audittraildelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t204_audittrail_delete->showPageHeader(); ?>
<?php
$t204_audittrail_delete->showMessage();
?>
<form name="ft204_audittraildelete" id="ft204_audittraildelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t204_audittrail">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t204_audittrail_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t204_audittrail_delete->id->Visible) { // id ?>
		<th class="<?php echo $t204_audittrail_delete->id->headerCellClass() ?>"><span id="elh_t204_audittrail_id" class="t204_audittrail_id"><?php echo $t204_audittrail_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($t204_audittrail_delete->datetime->Visible) { // datetime ?>
		<th class="<?php echo $t204_audittrail_delete->datetime->headerCellClass() ?>"><span id="elh_t204_audittrail_datetime" class="t204_audittrail_datetime"><?php echo $t204_audittrail_delete->datetime->caption() ?></span></th>
<?php } ?>
<?php if ($t204_audittrail_delete->script->Visible) { // script ?>
		<th class="<?php echo $t204_audittrail_delete->script->headerCellClass() ?>"><span id="elh_t204_audittrail_script" class="t204_audittrail_script"><?php echo $t204_audittrail_delete->script->caption() ?></span></th>
<?php } ?>
<?php if ($t204_audittrail_delete->user->Visible) { // user ?>
		<th class="<?php echo $t204_audittrail_delete->user->headerCellClass() ?>"><span id="elh_t204_audittrail_user" class="t204_audittrail_user"><?php echo $t204_audittrail_delete->user->caption() ?></span></th>
<?php } ?>
<?php if ($t204_audittrail_delete->_action->Visible) { // action ?>
		<th class="<?php echo $t204_audittrail_delete->_action->headerCellClass() ?>"><span id="elh_t204_audittrail__action" class="t204_audittrail__action"><?php echo $t204_audittrail_delete->_action->caption() ?></span></th>
<?php } ?>
<?php if ($t204_audittrail_delete->_table->Visible) { // table ?>
		<th class="<?php echo $t204_audittrail_delete->_table->headerCellClass() ?>"><span id="elh_t204_audittrail__table" class="t204_audittrail__table"><?php echo $t204_audittrail_delete->_table->caption() ?></span></th>
<?php } ?>
<?php if ($t204_audittrail_delete->field->Visible) { // field ?>
		<th class="<?php echo $t204_audittrail_delete->field->headerCellClass() ?>"><span id="elh_t204_audittrail_field" class="t204_audittrail_field"><?php echo $t204_audittrail_delete->field->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t204_audittrail_delete->RecordCount = 0;
$i = 0;
while (!$t204_audittrail_delete->Recordset->EOF) {
	$t204_audittrail_delete->RecordCount++;
	$t204_audittrail_delete->RowCount++;

	// Set row properties
	$t204_audittrail->resetAttributes();
	$t204_audittrail->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t204_audittrail_delete->loadRowValues($t204_audittrail_delete->Recordset);

	// Render row
	$t204_audittrail_delete->renderRow();
?>
	<tr <?php echo $t204_audittrail->rowAttributes() ?>>
<?php if ($t204_audittrail_delete->id->Visible) { // id ?>
		<td <?php echo $t204_audittrail_delete->id->cellAttributes() ?>>
<span id="el<?php echo $t204_audittrail_delete->RowCount ?>_t204_audittrail_id" class="t204_audittrail_id">
<span<?php echo $t204_audittrail_delete->id->viewAttributes() ?>><?php echo $t204_audittrail_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t204_audittrail_delete->datetime->Visible) { // datetime ?>
		<td <?php echo $t204_audittrail_delete->datetime->cellAttributes() ?>>
<span id="el<?php echo $t204_audittrail_delete->RowCount ?>_t204_audittrail_datetime" class="t204_audittrail_datetime">
<span<?php echo $t204_audittrail_delete->datetime->viewAttributes() ?>><?php echo $t204_audittrail_delete->datetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t204_audittrail_delete->script->Visible) { // script ?>
		<td <?php echo $t204_audittrail_delete->script->cellAttributes() ?>>
<span id="el<?php echo $t204_audittrail_delete->RowCount ?>_t204_audittrail_script" class="t204_audittrail_script">
<span<?php echo $t204_audittrail_delete->script->viewAttributes() ?>><?php echo $t204_audittrail_delete->script->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t204_audittrail_delete->user->Visible) { // user ?>
		<td <?php echo $t204_audittrail_delete->user->cellAttributes() ?>>
<span id="el<?php echo $t204_audittrail_delete->RowCount ?>_t204_audittrail_user" class="t204_audittrail_user">
<span<?php echo $t204_audittrail_delete->user->viewAttributes() ?>><?php echo $t204_audittrail_delete->user->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t204_audittrail_delete->_action->Visible) { // action ?>
		<td <?php echo $t204_audittrail_delete->_action->cellAttributes() ?>>
<span id="el<?php echo $t204_audittrail_delete->RowCount ?>_t204_audittrail__action" class="t204_audittrail__action">
<span<?php echo $t204_audittrail_delete->_action->viewAttributes() ?>><?php echo $t204_audittrail_delete->_action->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t204_audittrail_delete->_table->Visible) { // table ?>
		<td <?php echo $t204_audittrail_delete->_table->cellAttributes() ?>>
<span id="el<?php echo $t204_audittrail_delete->RowCount ?>_t204_audittrail__table" class="t204_audittrail__table">
<span<?php echo $t204_audittrail_delete->_table->viewAttributes() ?>><?php echo $t204_audittrail_delete->_table->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t204_audittrail_delete->field->Visible) { // field ?>
		<td <?php echo $t204_audittrail_delete->field->cellAttributes() ?>>
<span id="el<?php echo $t204_audittrail_delete->RowCount ?>_t204_audittrail_field" class="t204_audittrail_field">
<span<?php echo $t204_audittrail_delete->field->viewAttributes() ?>><?php echo $t204_audittrail_delete->field->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t204_audittrail_delete->Recordset->moveNext();
}
$t204_audittrail_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t204_audittrail_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t204_audittrail_delete->showPageFooter();
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
$t204_audittrail_delete->terminate();
?>