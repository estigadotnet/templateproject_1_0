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
$t201_users_view = new t201_users_view();

// Run the page
$t201_users_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t201_users_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t201_users_view->isExport()) { ?>
<script>
var ft201_usersview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ft201_usersview = currentForm = new ew.Form("ft201_usersview", "view");
	loadjs.done("ft201_usersview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t201_users_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t201_users_view->ExportOptions->render("body") ?>
<?php $t201_users_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t201_users_view->showPageHeader(); ?>
<?php
$t201_users_view->showMessage();
?>
<form name="ft201_usersview" id="ft201_usersview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t201_users">
<input type="hidden" name="modal" value="<?php echo (int)$t201_users_view->IsModal ?>">
<?php if (!$t201_users_view->isExport()) { ?>
<div class="ew-multi-page">
<div class="ew-nav-tabs" id="t201_users_view"><!-- multi-page tabs -->
	<ul class="<?php echo $t201_users_view->MultiPages->navStyle() ?>">
		<li class="nav-item"><a class="nav-link<?php echo $t201_users_view->MultiPages->pageStyle(1) ?>" href="#tab_t201_users1" data-toggle="tab"><?php echo $t201_users->pageCaption(1) ?></a></li>
		<li class="nav-item"><a class="nav-link<?php echo $t201_users_view->MultiPages->pageStyle(2) ?>" href="#tab_t201_users2" data-toggle="tab"><?php echo $t201_users->pageCaption(2) ?></a></li>
	</ul>
	<div class="tab-content">
<?php } ?>
<?php if (!$t201_users_view->isExport()) { ?>
		<div class="tab-pane<?php echo $t201_users_view->MultiPages->pageStyle(1) ?>" id="tab_t201_users1"><!-- multi-page .tab-pane -->
<?php } ?>
<table class="table table-striped table-sm ew-view-table">
<?php if ($t201_users_view->UserLevel->Visible) { // UserLevel ?>
	<tr id="r_UserLevel">
		<td class="<?php echo $t201_users_view->TableLeftColumnClass ?>"><span id="elh_t201_users_UserLevel"><?php echo $t201_users_view->UserLevel->caption() ?></span></td>
		<td data-name="UserLevel" <?php echo $t201_users_view->UserLevel->cellAttributes() ?>>
<span id="el_t201_users_UserLevel" data-page="1">
<span<?php echo $t201_users_view->UserLevel->viewAttributes() ?>><?php echo $t201_users_view->UserLevel->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t201_users_view->Username->Visible) { // Username ?>
	<tr id="r_Username">
		<td class="<?php echo $t201_users_view->TableLeftColumnClass ?>"><span id="elh_t201_users_Username"><?php echo $t201_users_view->Username->caption() ?></span></td>
		<td data-name="Username" <?php echo $t201_users_view->Username->cellAttributes() ?>>
<span id="el_t201_users_Username" data-page="1">
<span<?php echo $t201_users_view->Username->viewAttributes() ?>><?php echo $t201_users_view->Username->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t201_users_view->sekolah_id->Visible) { // sekolah_id ?>
	<tr id="r_sekolah_id">
		<td class="<?php echo $t201_users_view->TableLeftColumnClass ?>"><span id="elh_t201_users_sekolah_id"><?php echo $t201_users_view->sekolah_id->caption() ?></span></td>
		<td data-name="sekolah_id" <?php echo $t201_users_view->sekolah_id->cellAttributes() ?>>
<span id="el_t201_users_sekolah_id" data-page="1">
<span<?php echo $t201_users_view->sekolah_id->viewAttributes() ?>><?php echo $t201_users_view->sekolah_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t201_users_view->tahunajaran_id->Visible) { // tahunajaran_id ?>
	<tr id="r_tahunajaran_id">
		<td class="<?php echo $t201_users_view->TableLeftColumnClass ?>"><span id="elh_t201_users_tahunajaran_id"><?php echo $t201_users_view->tahunajaran_id->caption() ?></span></td>
		<td data-name="tahunajaran_id" <?php echo $t201_users_view->tahunajaran_id->cellAttributes() ?>>
<span id="el_t201_users_tahunajaran_id" data-page="1">
<span<?php echo $t201_users_view->tahunajaran_id->viewAttributes() ?>><?php echo $t201_users_view->tahunajaran_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t201_users_view->kelas_id->Visible) { // kelas_id ?>
	<tr id="r_kelas_id">
		<td class="<?php echo $t201_users_view->TableLeftColumnClass ?>"><span id="elh_t201_users_kelas_id"><?php echo $t201_users_view->kelas_id->caption() ?></span></td>
		<td data-name="kelas_id" <?php echo $t201_users_view->kelas_id->cellAttributes() ?>>
<span id="el_t201_users_kelas_id" data-page="1">
<span<?php echo $t201_users_view->kelas_id->viewAttributes() ?>><?php echo $t201_users_view->kelas_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t201_users_view->semester_id->Visible) { // semester_id ?>
	<tr id="r_semester_id">
		<td class="<?php echo $t201_users_view->TableLeftColumnClass ?>"><span id="elh_t201_users_semester_id"><?php echo $t201_users_view->semester_id->caption() ?></span></td>
		<td data-name="semester_id" <?php echo $t201_users_view->semester_id->cellAttributes() ?>>
<span id="el_t201_users_semester_id" data-page="1">
<span<?php echo $t201_users_view->semester_id->viewAttributes() ?>><?php echo $t201_users_view->semester_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php if (!$t201_users_view->isExport()) { ?>
		</div>
<?php } ?>
<?php if (!$t201_users_view->isExport()) { ?>
		<div class="tab-pane<?php echo $t201_users_view->MultiPages->pageStyle(2) ?>" id="tab_t201_users2"><!-- multi-page .tab-pane -->
<?php } ?>
<table class="table table-striped table-sm ew-view-table">
<?php if ($t201_users_view->LastName->Visible) { // LastName ?>
	<tr id="r_LastName">
		<td class="<?php echo $t201_users_view->TableLeftColumnClass ?>"><span id="elh_t201_users_LastName"><?php echo $t201_users_view->LastName->caption() ?></span></td>
		<td data-name="LastName" <?php echo $t201_users_view->LastName->cellAttributes() ?>>
<span id="el_t201_users_LastName" data-page="2">
<span<?php echo $t201_users_view->LastName->viewAttributes() ?>><?php echo $t201_users_view->LastName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t201_users_view->FirstName->Visible) { // FirstName ?>
	<tr id="r_FirstName">
		<td class="<?php echo $t201_users_view->TableLeftColumnClass ?>"><span id="elh_t201_users_FirstName"><?php echo $t201_users_view->FirstName->caption() ?></span></td>
		<td data-name="FirstName" <?php echo $t201_users_view->FirstName->cellAttributes() ?>>
<span id="el_t201_users_FirstName" data-page="2">
<span<?php echo $t201_users_view->FirstName->viewAttributes() ?>><?php echo $t201_users_view->FirstName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t201_users_view->Title->Visible) { // Title ?>
	<tr id="r_Title">
		<td class="<?php echo $t201_users_view->TableLeftColumnClass ?>"><span id="elh_t201_users_Title"><?php echo $t201_users_view->Title->caption() ?></span></td>
		<td data-name="Title" <?php echo $t201_users_view->Title->cellAttributes() ?>>
<span id="el_t201_users_Title" data-page="2">
<span<?php echo $t201_users_view->Title->viewAttributes() ?>><?php echo $t201_users_view->Title->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t201_users_view->TitleOfCourtesy->Visible) { // TitleOfCourtesy ?>
	<tr id="r_TitleOfCourtesy">
		<td class="<?php echo $t201_users_view->TableLeftColumnClass ?>"><span id="elh_t201_users_TitleOfCourtesy"><?php echo $t201_users_view->TitleOfCourtesy->caption() ?></span></td>
		<td data-name="TitleOfCourtesy" <?php echo $t201_users_view->TitleOfCourtesy->cellAttributes() ?>>
<span id="el_t201_users_TitleOfCourtesy" data-page="2">
<span<?php echo $t201_users_view->TitleOfCourtesy->viewAttributes() ?>><?php echo $t201_users_view->TitleOfCourtesy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t201_users_view->BirthDate->Visible) { // BirthDate ?>
	<tr id="r_BirthDate">
		<td class="<?php echo $t201_users_view->TableLeftColumnClass ?>"><span id="elh_t201_users_BirthDate"><?php echo $t201_users_view->BirthDate->caption() ?></span></td>
		<td data-name="BirthDate" <?php echo $t201_users_view->BirthDate->cellAttributes() ?>>
<span id="el_t201_users_BirthDate" data-page="2">
<span<?php echo $t201_users_view->BirthDate->viewAttributes() ?>><?php echo $t201_users_view->BirthDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t201_users_view->HireDate->Visible) { // HireDate ?>
	<tr id="r_HireDate">
		<td class="<?php echo $t201_users_view->TableLeftColumnClass ?>"><span id="elh_t201_users_HireDate"><?php echo $t201_users_view->HireDate->caption() ?></span></td>
		<td data-name="HireDate" <?php echo $t201_users_view->HireDate->cellAttributes() ?>>
<span id="el_t201_users_HireDate" data-page="2">
<span<?php echo $t201_users_view->HireDate->viewAttributes() ?>><?php echo $t201_users_view->HireDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t201_users_view->Address->Visible) { // Address ?>
	<tr id="r_Address">
		<td class="<?php echo $t201_users_view->TableLeftColumnClass ?>"><span id="elh_t201_users_Address"><?php echo $t201_users_view->Address->caption() ?></span></td>
		<td data-name="Address" <?php echo $t201_users_view->Address->cellAttributes() ?>>
<span id="el_t201_users_Address" data-page="2">
<span<?php echo $t201_users_view->Address->viewAttributes() ?>><?php echo $t201_users_view->Address->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t201_users_view->City->Visible) { // City ?>
	<tr id="r_City">
		<td class="<?php echo $t201_users_view->TableLeftColumnClass ?>"><span id="elh_t201_users_City"><?php echo $t201_users_view->City->caption() ?></span></td>
		<td data-name="City" <?php echo $t201_users_view->City->cellAttributes() ?>>
<span id="el_t201_users_City" data-page="2">
<span<?php echo $t201_users_view->City->viewAttributes() ?>><?php echo $t201_users_view->City->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t201_users_view->Region->Visible) { // Region ?>
	<tr id="r_Region">
		<td class="<?php echo $t201_users_view->TableLeftColumnClass ?>"><span id="elh_t201_users_Region"><?php echo $t201_users_view->Region->caption() ?></span></td>
		<td data-name="Region" <?php echo $t201_users_view->Region->cellAttributes() ?>>
<span id="el_t201_users_Region" data-page="2">
<span<?php echo $t201_users_view->Region->viewAttributes() ?>><?php echo $t201_users_view->Region->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t201_users_view->PostalCode->Visible) { // PostalCode ?>
	<tr id="r_PostalCode">
		<td class="<?php echo $t201_users_view->TableLeftColumnClass ?>"><span id="elh_t201_users_PostalCode"><?php echo $t201_users_view->PostalCode->caption() ?></span></td>
		<td data-name="PostalCode" <?php echo $t201_users_view->PostalCode->cellAttributes() ?>>
<span id="el_t201_users_PostalCode" data-page="2">
<span<?php echo $t201_users_view->PostalCode->viewAttributes() ?>><?php echo $t201_users_view->PostalCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t201_users_view->Country->Visible) { // Country ?>
	<tr id="r_Country">
		<td class="<?php echo $t201_users_view->TableLeftColumnClass ?>"><span id="elh_t201_users_Country"><?php echo $t201_users_view->Country->caption() ?></span></td>
		<td data-name="Country" <?php echo $t201_users_view->Country->cellAttributes() ?>>
<span id="el_t201_users_Country" data-page="2">
<span<?php echo $t201_users_view->Country->viewAttributes() ?>><?php echo $t201_users_view->Country->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t201_users_view->HomePhone->Visible) { // HomePhone ?>
	<tr id="r_HomePhone">
		<td class="<?php echo $t201_users_view->TableLeftColumnClass ?>"><span id="elh_t201_users_HomePhone"><?php echo $t201_users_view->HomePhone->caption() ?></span></td>
		<td data-name="HomePhone" <?php echo $t201_users_view->HomePhone->cellAttributes() ?>>
<span id="el_t201_users_HomePhone" data-page="2">
<span<?php echo $t201_users_view->HomePhone->viewAttributes() ?>><?php echo $t201_users_view->HomePhone->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t201_users_view->Extension->Visible) { // Extension ?>
	<tr id="r_Extension">
		<td class="<?php echo $t201_users_view->TableLeftColumnClass ?>"><span id="elh_t201_users_Extension"><?php echo $t201_users_view->Extension->caption() ?></span></td>
		<td data-name="Extension" <?php echo $t201_users_view->Extension->cellAttributes() ?>>
<span id="el_t201_users_Extension" data-page="2">
<span<?php echo $t201_users_view->Extension->viewAttributes() ?>><?php echo $t201_users_view->Extension->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t201_users_view->_Email->Visible) { // Email ?>
	<tr id="r__Email">
		<td class="<?php echo $t201_users_view->TableLeftColumnClass ?>"><span id="elh_t201_users__Email"><?php echo $t201_users_view->_Email->caption() ?></span></td>
		<td data-name="_Email" <?php echo $t201_users_view->_Email->cellAttributes() ?>>
<span id="el_t201_users__Email" data-page="2">
<span<?php echo $t201_users_view->_Email->viewAttributes() ?>><?php echo $t201_users_view->_Email->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t201_users_view->Photo->Visible) { // Photo ?>
	<tr id="r_Photo">
		<td class="<?php echo $t201_users_view->TableLeftColumnClass ?>"><span id="elh_t201_users_Photo"><?php echo $t201_users_view->Photo->caption() ?></span></td>
		<td data-name="Photo" <?php echo $t201_users_view->Photo->cellAttributes() ?>>
<span id="el_t201_users_Photo" data-page="2">
<span<?php echo $t201_users_view->Photo->viewAttributes() ?>><?php echo $t201_users_view->Photo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t201_users_view->Notes->Visible) { // Notes ?>
	<tr id="r_Notes">
		<td class="<?php echo $t201_users_view->TableLeftColumnClass ?>"><span id="elh_t201_users_Notes"><?php echo $t201_users_view->Notes->caption() ?></span></td>
		<td data-name="Notes" <?php echo $t201_users_view->Notes->cellAttributes() ?>>
<span id="el_t201_users_Notes" data-page="2">
<span<?php echo $t201_users_view->Notes->viewAttributes() ?>><?php echo $t201_users_view->Notes->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t201_users_view->ReportsTo->Visible) { // ReportsTo ?>
	<tr id="r_ReportsTo">
		<td class="<?php echo $t201_users_view->TableLeftColumnClass ?>"><span id="elh_t201_users_ReportsTo"><?php echo $t201_users_view->ReportsTo->caption() ?></span></td>
		<td data-name="ReportsTo" <?php echo $t201_users_view->ReportsTo->cellAttributes() ?>>
<span id="el_t201_users_ReportsTo" data-page="2">
<span<?php echo $t201_users_view->ReportsTo->viewAttributes() ?>><?php echo $t201_users_view->ReportsTo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t201_users_view->Password->Visible) { // Password ?>
	<tr id="r_Password">
		<td class="<?php echo $t201_users_view->TableLeftColumnClass ?>"><span id="elh_t201_users_Password"><?php echo $t201_users_view->Password->caption() ?></span></td>
		<td data-name="Password" <?php echo $t201_users_view->Password->cellAttributes() ?>>
<span id="el_t201_users_Password" data-page="2">
<span<?php echo $t201_users_view->Password->viewAttributes() ?>><?php echo $t201_users_view->Password->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t201_users_view->Activated->Visible) { // Activated ?>
	<tr id="r_Activated">
		<td class="<?php echo $t201_users_view->TableLeftColumnClass ?>"><span id="elh_t201_users_Activated"><?php echo $t201_users_view->Activated->caption() ?></span></td>
		<td data-name="Activated" <?php echo $t201_users_view->Activated->cellAttributes() ?>>
<span id="el_t201_users_Activated" data-page="2">
<span<?php echo $t201_users_view->Activated->viewAttributes() ?>><div class="custom-control custom-checkbox d-inline-block"><input type="checkbox" id="x_Activated" class="custom-control-input" value="<?php echo $t201_users_view->Activated->getViewValue() ?>" disabled<?php if (ConvertToBool($t201_users_view->Activated->CurrentValue)) { ?> checked<?php } ?>><label class="custom-control-label" for="x_Activated"></label></div></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t201_users_view->Profile->Visible) { // Profile ?>
	<tr id="r_Profile">
		<td class="<?php echo $t201_users_view->TableLeftColumnClass ?>"><span id="elh_t201_users_Profile"><?php echo $t201_users_view->Profile->caption() ?></span></td>
		<td data-name="Profile" <?php echo $t201_users_view->Profile->cellAttributes() ?>>
<span id="el_t201_users_Profile" data-page="2">
<span<?php echo $t201_users_view->Profile->viewAttributes() ?>><?php echo $t201_users_view->Profile->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php if (!$t201_users_view->isExport()) { ?>
		</div>
<?php } ?>
<?php if (!$t201_users_view->isExport()) { ?>
	</div>
</div>
</div>
<?php } ?>
</form>
<?php
$t201_users_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t201_users_view->isExport()) { ?>
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
$t201_users_view->terminate();
?>