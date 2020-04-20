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
$t204_audittrail_view = new t204_audittrail_view();

// Run the page
$t204_audittrail_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t204_audittrail_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t204_audittrail_view->isExport()) { ?>
<script>
var ft204_audittrailview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ft204_audittrailview = currentForm = new ew.Form("ft204_audittrailview", "view");
	loadjs.done("ft204_audittrailview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t204_audittrail_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t204_audittrail_view->ExportOptions->render("body") ?>
<?php $t204_audittrail_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t204_audittrail_view->showPageHeader(); ?>
<?php
$t204_audittrail_view->showMessage();
?>
<form name="ft204_audittrailview" id="ft204_audittrailview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t204_audittrail">
<input type="hidden" name="modal" value="<?php echo (int)$t204_audittrail_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t204_audittrail_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $t204_audittrail_view->TableLeftColumnClass ?>"><span id="elh_t204_audittrail_id"><?php echo $t204_audittrail_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $t204_audittrail_view->id->cellAttributes() ?>>
<span id="el_t204_audittrail_id">
<span<?php echo $t204_audittrail_view->id->viewAttributes() ?>><?php echo $t204_audittrail_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t204_audittrail_view->datetime->Visible) { // datetime ?>
	<tr id="r_datetime">
		<td class="<?php echo $t204_audittrail_view->TableLeftColumnClass ?>"><span id="elh_t204_audittrail_datetime"><?php echo $t204_audittrail_view->datetime->caption() ?></span></td>
		<td data-name="datetime" <?php echo $t204_audittrail_view->datetime->cellAttributes() ?>>
<span id="el_t204_audittrail_datetime">
<span<?php echo $t204_audittrail_view->datetime->viewAttributes() ?>><?php echo $t204_audittrail_view->datetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t204_audittrail_view->script->Visible) { // script ?>
	<tr id="r_script">
		<td class="<?php echo $t204_audittrail_view->TableLeftColumnClass ?>"><span id="elh_t204_audittrail_script"><?php echo $t204_audittrail_view->script->caption() ?></span></td>
		<td data-name="script" <?php echo $t204_audittrail_view->script->cellAttributes() ?>>
<span id="el_t204_audittrail_script">
<span<?php echo $t204_audittrail_view->script->viewAttributes() ?>><?php echo $t204_audittrail_view->script->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t204_audittrail_view->user->Visible) { // user ?>
	<tr id="r_user">
		<td class="<?php echo $t204_audittrail_view->TableLeftColumnClass ?>"><span id="elh_t204_audittrail_user"><?php echo $t204_audittrail_view->user->caption() ?></span></td>
		<td data-name="user" <?php echo $t204_audittrail_view->user->cellAttributes() ?>>
<span id="el_t204_audittrail_user">
<span<?php echo $t204_audittrail_view->user->viewAttributes() ?>><?php echo $t204_audittrail_view->user->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t204_audittrail_view->_action->Visible) { // action ?>
	<tr id="r__action">
		<td class="<?php echo $t204_audittrail_view->TableLeftColumnClass ?>"><span id="elh_t204_audittrail__action"><?php echo $t204_audittrail_view->_action->caption() ?></span></td>
		<td data-name="_action" <?php echo $t204_audittrail_view->_action->cellAttributes() ?>>
<span id="el_t204_audittrail__action">
<span<?php echo $t204_audittrail_view->_action->viewAttributes() ?>><?php echo $t204_audittrail_view->_action->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t204_audittrail_view->_table->Visible) { // table ?>
	<tr id="r__table">
		<td class="<?php echo $t204_audittrail_view->TableLeftColumnClass ?>"><span id="elh_t204_audittrail__table"><?php echo $t204_audittrail_view->_table->caption() ?></span></td>
		<td data-name="_table" <?php echo $t204_audittrail_view->_table->cellAttributes() ?>>
<span id="el_t204_audittrail__table">
<span<?php echo $t204_audittrail_view->_table->viewAttributes() ?>><?php echo $t204_audittrail_view->_table->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t204_audittrail_view->field->Visible) { // field ?>
	<tr id="r_field">
		<td class="<?php echo $t204_audittrail_view->TableLeftColumnClass ?>"><span id="elh_t204_audittrail_field"><?php echo $t204_audittrail_view->field->caption() ?></span></td>
		<td data-name="field" <?php echo $t204_audittrail_view->field->cellAttributes() ?>>
<span id="el_t204_audittrail_field">
<span<?php echo $t204_audittrail_view->field->viewAttributes() ?>><?php echo $t204_audittrail_view->field->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t204_audittrail_view->keyvalue->Visible) { // keyvalue ?>
	<tr id="r_keyvalue">
		<td class="<?php echo $t204_audittrail_view->TableLeftColumnClass ?>"><span id="elh_t204_audittrail_keyvalue"><?php echo $t204_audittrail_view->keyvalue->caption() ?></span></td>
		<td data-name="keyvalue" <?php echo $t204_audittrail_view->keyvalue->cellAttributes() ?>>
<span id="el_t204_audittrail_keyvalue">
<span<?php echo $t204_audittrail_view->keyvalue->viewAttributes() ?>><?php echo $t204_audittrail_view->keyvalue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t204_audittrail_view->oldvalue->Visible) { // oldvalue ?>
	<tr id="r_oldvalue">
		<td class="<?php echo $t204_audittrail_view->TableLeftColumnClass ?>"><span id="elh_t204_audittrail_oldvalue"><?php echo $t204_audittrail_view->oldvalue->caption() ?></span></td>
		<td data-name="oldvalue" <?php echo $t204_audittrail_view->oldvalue->cellAttributes() ?>>
<span id="el_t204_audittrail_oldvalue">
<span<?php echo $t204_audittrail_view->oldvalue->viewAttributes() ?>><?php echo $t204_audittrail_view->oldvalue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t204_audittrail_view->newvalue->Visible) { // newvalue ?>
	<tr id="r_newvalue">
		<td class="<?php echo $t204_audittrail_view->TableLeftColumnClass ?>"><span id="elh_t204_audittrail_newvalue"><?php echo $t204_audittrail_view->newvalue->caption() ?></span></td>
		<td data-name="newvalue" <?php echo $t204_audittrail_view->newvalue->cellAttributes() ?>>
<span id="el_t204_audittrail_newvalue">
<span<?php echo $t204_audittrail_view->newvalue->viewAttributes() ?>><?php echo $t204_audittrail_view->newvalue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t204_audittrail_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t204_audittrail_view->isExport()) { ?>
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
$t204_audittrail_view->terminate();
?>