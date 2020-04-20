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
<?php if ($t201_users_delete->LastName->Visible) { // LastName ?>
		<th class="<?php echo $t201_users_delete->LastName->headerCellClass() ?>"><span id="elh_t201_users_LastName" class="t201_users_LastName"><?php echo $t201_users_delete->LastName->caption() ?></span></th>
<?php } ?>
<?php if ($t201_users_delete->FirstName->Visible) { // FirstName ?>
		<th class="<?php echo $t201_users_delete->FirstName->headerCellClass() ?>"><span id="elh_t201_users_FirstName" class="t201_users_FirstName"><?php echo $t201_users_delete->FirstName->caption() ?></span></th>
<?php } ?>
<?php if ($t201_users_delete->Title->Visible) { // Title ?>
		<th class="<?php echo $t201_users_delete->Title->headerCellClass() ?>"><span id="elh_t201_users_Title" class="t201_users_Title"><?php echo $t201_users_delete->Title->caption() ?></span></th>
<?php } ?>
<?php if ($t201_users_delete->TitleOfCourtesy->Visible) { // TitleOfCourtesy ?>
		<th class="<?php echo $t201_users_delete->TitleOfCourtesy->headerCellClass() ?>"><span id="elh_t201_users_TitleOfCourtesy" class="t201_users_TitleOfCourtesy"><?php echo $t201_users_delete->TitleOfCourtesy->caption() ?></span></th>
<?php } ?>
<?php if ($t201_users_delete->BirthDate->Visible) { // BirthDate ?>
		<th class="<?php echo $t201_users_delete->BirthDate->headerCellClass() ?>"><span id="elh_t201_users_BirthDate" class="t201_users_BirthDate"><?php echo $t201_users_delete->BirthDate->caption() ?></span></th>
<?php } ?>
<?php if ($t201_users_delete->HireDate->Visible) { // HireDate ?>
		<th class="<?php echo $t201_users_delete->HireDate->headerCellClass() ?>"><span id="elh_t201_users_HireDate" class="t201_users_HireDate"><?php echo $t201_users_delete->HireDate->caption() ?></span></th>
<?php } ?>
<?php if ($t201_users_delete->Address->Visible) { // Address ?>
		<th class="<?php echo $t201_users_delete->Address->headerCellClass() ?>"><span id="elh_t201_users_Address" class="t201_users_Address"><?php echo $t201_users_delete->Address->caption() ?></span></th>
<?php } ?>
<?php if ($t201_users_delete->City->Visible) { // City ?>
		<th class="<?php echo $t201_users_delete->City->headerCellClass() ?>"><span id="elh_t201_users_City" class="t201_users_City"><?php echo $t201_users_delete->City->caption() ?></span></th>
<?php } ?>
<?php if ($t201_users_delete->Region->Visible) { // Region ?>
		<th class="<?php echo $t201_users_delete->Region->headerCellClass() ?>"><span id="elh_t201_users_Region" class="t201_users_Region"><?php echo $t201_users_delete->Region->caption() ?></span></th>
<?php } ?>
<?php if ($t201_users_delete->PostalCode->Visible) { // PostalCode ?>
		<th class="<?php echo $t201_users_delete->PostalCode->headerCellClass() ?>"><span id="elh_t201_users_PostalCode" class="t201_users_PostalCode"><?php echo $t201_users_delete->PostalCode->caption() ?></span></th>
<?php } ?>
<?php if ($t201_users_delete->Country->Visible) { // Country ?>
		<th class="<?php echo $t201_users_delete->Country->headerCellClass() ?>"><span id="elh_t201_users_Country" class="t201_users_Country"><?php echo $t201_users_delete->Country->caption() ?></span></th>
<?php } ?>
<?php if ($t201_users_delete->HomePhone->Visible) { // HomePhone ?>
		<th class="<?php echo $t201_users_delete->HomePhone->headerCellClass() ?>"><span id="elh_t201_users_HomePhone" class="t201_users_HomePhone"><?php echo $t201_users_delete->HomePhone->caption() ?></span></th>
<?php } ?>
<?php if ($t201_users_delete->Extension->Visible) { // Extension ?>
		<th class="<?php echo $t201_users_delete->Extension->headerCellClass() ?>"><span id="elh_t201_users_Extension" class="t201_users_Extension"><?php echo $t201_users_delete->Extension->caption() ?></span></th>
<?php } ?>
<?php if ($t201_users_delete->_Email->Visible) { // Email ?>
		<th class="<?php echo $t201_users_delete->_Email->headerCellClass() ?>"><span id="elh_t201_users__Email" class="t201_users__Email"><?php echo $t201_users_delete->_Email->caption() ?></span></th>
<?php } ?>
<?php if ($t201_users_delete->Photo->Visible) { // Photo ?>
		<th class="<?php echo $t201_users_delete->Photo->headerCellClass() ?>"><span id="elh_t201_users_Photo" class="t201_users_Photo"><?php echo $t201_users_delete->Photo->caption() ?></span></th>
<?php } ?>
<?php if ($t201_users_delete->ReportsTo->Visible) { // ReportsTo ?>
		<th class="<?php echo $t201_users_delete->ReportsTo->headerCellClass() ?>"><span id="elh_t201_users_ReportsTo" class="t201_users_ReportsTo"><?php echo $t201_users_delete->ReportsTo->caption() ?></span></th>
<?php } ?>
<?php if ($t201_users_delete->Password->Visible) { // Password ?>
		<th class="<?php echo $t201_users_delete->Password->headerCellClass() ?>"><span id="elh_t201_users_Password" class="t201_users_Password"><?php echo $t201_users_delete->Password->caption() ?></span></th>
<?php } ?>
<?php if ($t201_users_delete->UserLevel->Visible) { // UserLevel ?>
		<th class="<?php echo $t201_users_delete->UserLevel->headerCellClass() ?>"><span id="elh_t201_users_UserLevel" class="t201_users_UserLevel"><?php echo $t201_users_delete->UserLevel->caption() ?></span></th>
<?php } ?>
<?php if ($t201_users_delete->Username->Visible) { // Username ?>
		<th class="<?php echo $t201_users_delete->Username->headerCellClass() ?>"><span id="elh_t201_users_Username" class="t201_users_Username"><?php echo $t201_users_delete->Username->caption() ?></span></th>
<?php } ?>
<?php if ($t201_users_delete->Activated->Visible) { // Activated ?>
		<th class="<?php echo $t201_users_delete->Activated->headerCellClass() ?>"><span id="elh_t201_users_Activated" class="t201_users_Activated"><?php echo $t201_users_delete->Activated->caption() ?></span></th>
<?php } ?>
<?php if ($t201_users_delete->sekolah_id->Visible) { // sekolah_id ?>
		<th class="<?php echo $t201_users_delete->sekolah_id->headerCellClass() ?>"><span id="elh_t201_users_sekolah_id" class="t201_users_sekolah_id"><?php echo $t201_users_delete->sekolah_id->caption() ?></span></th>
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
<?php if ($t201_users_delete->LastName->Visible) { // LastName ?>
		<td <?php echo $t201_users_delete->LastName->cellAttributes() ?>>
<span id="el<?php echo $t201_users_delete->RowCount ?>_t201_users_LastName" class="t201_users_LastName">
<span<?php echo $t201_users_delete->LastName->viewAttributes() ?>><?php echo $t201_users_delete->LastName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t201_users_delete->FirstName->Visible) { // FirstName ?>
		<td <?php echo $t201_users_delete->FirstName->cellAttributes() ?>>
<span id="el<?php echo $t201_users_delete->RowCount ?>_t201_users_FirstName" class="t201_users_FirstName">
<span<?php echo $t201_users_delete->FirstName->viewAttributes() ?>><?php echo $t201_users_delete->FirstName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t201_users_delete->Title->Visible) { // Title ?>
		<td <?php echo $t201_users_delete->Title->cellAttributes() ?>>
<span id="el<?php echo $t201_users_delete->RowCount ?>_t201_users_Title" class="t201_users_Title">
<span<?php echo $t201_users_delete->Title->viewAttributes() ?>><?php echo $t201_users_delete->Title->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t201_users_delete->TitleOfCourtesy->Visible) { // TitleOfCourtesy ?>
		<td <?php echo $t201_users_delete->TitleOfCourtesy->cellAttributes() ?>>
<span id="el<?php echo $t201_users_delete->RowCount ?>_t201_users_TitleOfCourtesy" class="t201_users_TitleOfCourtesy">
<span<?php echo $t201_users_delete->TitleOfCourtesy->viewAttributes() ?>><?php echo $t201_users_delete->TitleOfCourtesy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t201_users_delete->BirthDate->Visible) { // BirthDate ?>
		<td <?php echo $t201_users_delete->BirthDate->cellAttributes() ?>>
<span id="el<?php echo $t201_users_delete->RowCount ?>_t201_users_BirthDate" class="t201_users_BirthDate">
<span<?php echo $t201_users_delete->BirthDate->viewAttributes() ?>><?php echo $t201_users_delete->BirthDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t201_users_delete->HireDate->Visible) { // HireDate ?>
		<td <?php echo $t201_users_delete->HireDate->cellAttributes() ?>>
<span id="el<?php echo $t201_users_delete->RowCount ?>_t201_users_HireDate" class="t201_users_HireDate">
<span<?php echo $t201_users_delete->HireDate->viewAttributes() ?>><?php echo $t201_users_delete->HireDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t201_users_delete->Address->Visible) { // Address ?>
		<td <?php echo $t201_users_delete->Address->cellAttributes() ?>>
<span id="el<?php echo $t201_users_delete->RowCount ?>_t201_users_Address" class="t201_users_Address">
<span<?php echo $t201_users_delete->Address->viewAttributes() ?>><?php echo $t201_users_delete->Address->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t201_users_delete->City->Visible) { // City ?>
		<td <?php echo $t201_users_delete->City->cellAttributes() ?>>
<span id="el<?php echo $t201_users_delete->RowCount ?>_t201_users_City" class="t201_users_City">
<span<?php echo $t201_users_delete->City->viewAttributes() ?>><?php echo $t201_users_delete->City->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t201_users_delete->Region->Visible) { // Region ?>
		<td <?php echo $t201_users_delete->Region->cellAttributes() ?>>
<span id="el<?php echo $t201_users_delete->RowCount ?>_t201_users_Region" class="t201_users_Region">
<span<?php echo $t201_users_delete->Region->viewAttributes() ?>><?php echo $t201_users_delete->Region->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t201_users_delete->PostalCode->Visible) { // PostalCode ?>
		<td <?php echo $t201_users_delete->PostalCode->cellAttributes() ?>>
<span id="el<?php echo $t201_users_delete->RowCount ?>_t201_users_PostalCode" class="t201_users_PostalCode">
<span<?php echo $t201_users_delete->PostalCode->viewAttributes() ?>><?php echo $t201_users_delete->PostalCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t201_users_delete->Country->Visible) { // Country ?>
		<td <?php echo $t201_users_delete->Country->cellAttributes() ?>>
<span id="el<?php echo $t201_users_delete->RowCount ?>_t201_users_Country" class="t201_users_Country">
<span<?php echo $t201_users_delete->Country->viewAttributes() ?>><?php echo $t201_users_delete->Country->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t201_users_delete->HomePhone->Visible) { // HomePhone ?>
		<td <?php echo $t201_users_delete->HomePhone->cellAttributes() ?>>
<span id="el<?php echo $t201_users_delete->RowCount ?>_t201_users_HomePhone" class="t201_users_HomePhone">
<span<?php echo $t201_users_delete->HomePhone->viewAttributes() ?>><?php echo $t201_users_delete->HomePhone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t201_users_delete->Extension->Visible) { // Extension ?>
		<td <?php echo $t201_users_delete->Extension->cellAttributes() ?>>
<span id="el<?php echo $t201_users_delete->RowCount ?>_t201_users_Extension" class="t201_users_Extension">
<span<?php echo $t201_users_delete->Extension->viewAttributes() ?>><?php echo $t201_users_delete->Extension->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t201_users_delete->_Email->Visible) { // Email ?>
		<td <?php echo $t201_users_delete->_Email->cellAttributes() ?>>
<span id="el<?php echo $t201_users_delete->RowCount ?>_t201_users__Email" class="t201_users__Email">
<span<?php echo $t201_users_delete->_Email->viewAttributes() ?>><?php echo $t201_users_delete->_Email->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t201_users_delete->Photo->Visible) { // Photo ?>
		<td <?php echo $t201_users_delete->Photo->cellAttributes() ?>>
<span id="el<?php echo $t201_users_delete->RowCount ?>_t201_users_Photo" class="t201_users_Photo">
<span<?php echo $t201_users_delete->Photo->viewAttributes() ?>><?php echo $t201_users_delete->Photo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t201_users_delete->ReportsTo->Visible) { // ReportsTo ?>
		<td <?php echo $t201_users_delete->ReportsTo->cellAttributes() ?>>
<span id="el<?php echo $t201_users_delete->RowCount ?>_t201_users_ReportsTo" class="t201_users_ReportsTo">
<span<?php echo $t201_users_delete->ReportsTo->viewAttributes() ?>><?php echo $t201_users_delete->ReportsTo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t201_users_delete->Password->Visible) { // Password ?>
		<td <?php echo $t201_users_delete->Password->cellAttributes() ?>>
<span id="el<?php echo $t201_users_delete->RowCount ?>_t201_users_Password" class="t201_users_Password">
<span<?php echo $t201_users_delete->Password->viewAttributes() ?>><?php echo $t201_users_delete->Password->getViewValue() ?></span>
</span>
</td>
<?php } ?>
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
<?php if ($t201_users_delete->Activated->Visible) { // Activated ?>
		<td <?php echo $t201_users_delete->Activated->cellAttributes() ?>>
<span id="el<?php echo $t201_users_delete->RowCount ?>_t201_users_Activated" class="t201_users_Activated">
<span<?php echo $t201_users_delete->Activated->viewAttributes() ?>><div class="custom-control custom-checkbox d-inline-block"><input type="checkbox" id="x_Activated" class="custom-control-input" value="<?php echo $t201_users_delete->Activated->getViewValue() ?>" disabled<?php if (ConvertToBool($t201_users_delete->Activated->CurrentValue)) { ?> checked<?php } ?>><label class="custom-control-label" for="x_Activated"></label></div></span>
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