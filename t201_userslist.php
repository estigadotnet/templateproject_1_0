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
$t201_users_list = new t201_users_list();

// Run the page
$t201_users_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t201_users_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t201_users_list->isExport()) { ?>
<script>
var ft201_userslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft201_userslist = currentForm = new ew.Form("ft201_userslist", "list");
	ft201_userslist.formKeyCountName = '<?php echo $t201_users_list->FormKeyCountName ?>';
	loadjs.done("ft201_userslist");
});
var ft201_userslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ft201_userslistsrch = currentSearchForm = new ew.Form("ft201_userslistsrch");

	// Dynamic selection lists
	// Filters

	ft201_userslistsrch.filterList = <?php echo $t201_users_list->getFilterList() ?>;
	loadjs.done("ft201_userslistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t201_users_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t201_users_list->TotalRecords > 0 && $t201_users_list->ExportOptions->visible()) { ?>
<?php $t201_users_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t201_users_list->ImportOptions->visible()) { ?>
<?php $t201_users_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t201_users_list->SearchOptions->visible()) { ?>
<?php $t201_users_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t201_users_list->FilterOptions->visible()) { ?>
<?php $t201_users_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t201_users_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$t201_users_list->isExport() && !$t201_users->CurrentAction) { ?>
<form name="ft201_userslistsrch" id="ft201_userslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="ft201_userslistsrch-search-panel" class="<?php echo $t201_users_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t201_users">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $t201_users_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($t201_users_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($t201_users_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $t201_users_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($t201_users_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($t201_users_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($t201_users_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($t201_users_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $t201_users_list->showPageHeader(); ?>
<?php
$t201_users_list->showMessage();
?>
<?php if ($t201_users_list->TotalRecords > 0 || $t201_users->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t201_users_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t201_users">
<form name="ft201_userslist" id="ft201_userslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t201_users">
<div id="gmp_t201_users" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t201_users_list->TotalRecords > 0 || $t201_users_list->isGridEdit()) { ?>
<table id="tbl_t201_userslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t201_users->RowType = ROWTYPE_HEADER;

// Render list options
$t201_users_list->renderListOptions();

// Render list options (header, left)
$t201_users_list->ListOptions->render("header", "left");
?>
<?php if ($t201_users_list->LastName->Visible) { // LastName ?>
	<?php if ($t201_users_list->SortUrl($t201_users_list->LastName) == "") { ?>
		<th data-name="LastName" class="<?php echo $t201_users_list->LastName->headerCellClass() ?>"><div id="elh_t201_users_LastName" class="t201_users_LastName"><div class="ew-table-header-caption"><?php echo $t201_users_list->LastName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LastName" class="<?php echo $t201_users_list->LastName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t201_users_list->SortUrl($t201_users_list->LastName) ?>', 1);"><div id="elh_t201_users_LastName" class="t201_users_LastName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t201_users_list->LastName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t201_users_list->LastName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t201_users_list->LastName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t201_users_list->FirstName->Visible) { // FirstName ?>
	<?php if ($t201_users_list->SortUrl($t201_users_list->FirstName) == "") { ?>
		<th data-name="FirstName" class="<?php echo $t201_users_list->FirstName->headerCellClass() ?>"><div id="elh_t201_users_FirstName" class="t201_users_FirstName"><div class="ew-table-header-caption"><?php echo $t201_users_list->FirstName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FirstName" class="<?php echo $t201_users_list->FirstName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t201_users_list->SortUrl($t201_users_list->FirstName) ?>', 1);"><div id="elh_t201_users_FirstName" class="t201_users_FirstName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t201_users_list->FirstName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t201_users_list->FirstName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t201_users_list->FirstName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t201_users_list->Title->Visible) { // Title ?>
	<?php if ($t201_users_list->SortUrl($t201_users_list->Title) == "") { ?>
		<th data-name="Title" class="<?php echo $t201_users_list->Title->headerCellClass() ?>"><div id="elh_t201_users_Title" class="t201_users_Title"><div class="ew-table-header-caption"><?php echo $t201_users_list->Title->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Title" class="<?php echo $t201_users_list->Title->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t201_users_list->SortUrl($t201_users_list->Title) ?>', 1);"><div id="elh_t201_users_Title" class="t201_users_Title">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t201_users_list->Title->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t201_users_list->Title->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t201_users_list->Title->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t201_users_list->TitleOfCourtesy->Visible) { // TitleOfCourtesy ?>
	<?php if ($t201_users_list->SortUrl($t201_users_list->TitleOfCourtesy) == "") { ?>
		<th data-name="TitleOfCourtesy" class="<?php echo $t201_users_list->TitleOfCourtesy->headerCellClass() ?>"><div id="elh_t201_users_TitleOfCourtesy" class="t201_users_TitleOfCourtesy"><div class="ew-table-header-caption"><?php echo $t201_users_list->TitleOfCourtesy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TitleOfCourtesy" class="<?php echo $t201_users_list->TitleOfCourtesy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t201_users_list->SortUrl($t201_users_list->TitleOfCourtesy) ?>', 1);"><div id="elh_t201_users_TitleOfCourtesy" class="t201_users_TitleOfCourtesy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t201_users_list->TitleOfCourtesy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t201_users_list->TitleOfCourtesy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t201_users_list->TitleOfCourtesy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t201_users_list->BirthDate->Visible) { // BirthDate ?>
	<?php if ($t201_users_list->SortUrl($t201_users_list->BirthDate) == "") { ?>
		<th data-name="BirthDate" class="<?php echo $t201_users_list->BirthDate->headerCellClass() ?>"><div id="elh_t201_users_BirthDate" class="t201_users_BirthDate"><div class="ew-table-header-caption"><?php echo $t201_users_list->BirthDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BirthDate" class="<?php echo $t201_users_list->BirthDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t201_users_list->SortUrl($t201_users_list->BirthDate) ?>', 1);"><div id="elh_t201_users_BirthDate" class="t201_users_BirthDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t201_users_list->BirthDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($t201_users_list->BirthDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t201_users_list->BirthDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t201_users_list->HireDate->Visible) { // HireDate ?>
	<?php if ($t201_users_list->SortUrl($t201_users_list->HireDate) == "") { ?>
		<th data-name="HireDate" class="<?php echo $t201_users_list->HireDate->headerCellClass() ?>"><div id="elh_t201_users_HireDate" class="t201_users_HireDate"><div class="ew-table-header-caption"><?php echo $t201_users_list->HireDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HireDate" class="<?php echo $t201_users_list->HireDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t201_users_list->SortUrl($t201_users_list->HireDate) ?>', 1);"><div id="elh_t201_users_HireDate" class="t201_users_HireDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t201_users_list->HireDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($t201_users_list->HireDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t201_users_list->HireDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t201_users_list->Address->Visible) { // Address ?>
	<?php if ($t201_users_list->SortUrl($t201_users_list->Address) == "") { ?>
		<th data-name="Address" class="<?php echo $t201_users_list->Address->headerCellClass() ?>"><div id="elh_t201_users_Address" class="t201_users_Address"><div class="ew-table-header-caption"><?php echo $t201_users_list->Address->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Address" class="<?php echo $t201_users_list->Address->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t201_users_list->SortUrl($t201_users_list->Address) ?>', 1);"><div id="elh_t201_users_Address" class="t201_users_Address">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t201_users_list->Address->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t201_users_list->Address->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t201_users_list->Address->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t201_users_list->City->Visible) { // City ?>
	<?php if ($t201_users_list->SortUrl($t201_users_list->City) == "") { ?>
		<th data-name="City" class="<?php echo $t201_users_list->City->headerCellClass() ?>"><div id="elh_t201_users_City" class="t201_users_City"><div class="ew-table-header-caption"><?php echo $t201_users_list->City->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="City" class="<?php echo $t201_users_list->City->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t201_users_list->SortUrl($t201_users_list->City) ?>', 1);"><div id="elh_t201_users_City" class="t201_users_City">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t201_users_list->City->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t201_users_list->City->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t201_users_list->City->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t201_users_list->Region->Visible) { // Region ?>
	<?php if ($t201_users_list->SortUrl($t201_users_list->Region) == "") { ?>
		<th data-name="Region" class="<?php echo $t201_users_list->Region->headerCellClass() ?>"><div id="elh_t201_users_Region" class="t201_users_Region"><div class="ew-table-header-caption"><?php echo $t201_users_list->Region->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Region" class="<?php echo $t201_users_list->Region->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t201_users_list->SortUrl($t201_users_list->Region) ?>', 1);"><div id="elh_t201_users_Region" class="t201_users_Region">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t201_users_list->Region->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t201_users_list->Region->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t201_users_list->Region->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t201_users_list->PostalCode->Visible) { // PostalCode ?>
	<?php if ($t201_users_list->SortUrl($t201_users_list->PostalCode) == "") { ?>
		<th data-name="PostalCode" class="<?php echo $t201_users_list->PostalCode->headerCellClass() ?>"><div id="elh_t201_users_PostalCode" class="t201_users_PostalCode"><div class="ew-table-header-caption"><?php echo $t201_users_list->PostalCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PostalCode" class="<?php echo $t201_users_list->PostalCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t201_users_list->SortUrl($t201_users_list->PostalCode) ?>', 1);"><div id="elh_t201_users_PostalCode" class="t201_users_PostalCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t201_users_list->PostalCode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t201_users_list->PostalCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t201_users_list->PostalCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t201_users_list->Country->Visible) { // Country ?>
	<?php if ($t201_users_list->SortUrl($t201_users_list->Country) == "") { ?>
		<th data-name="Country" class="<?php echo $t201_users_list->Country->headerCellClass() ?>"><div id="elh_t201_users_Country" class="t201_users_Country"><div class="ew-table-header-caption"><?php echo $t201_users_list->Country->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Country" class="<?php echo $t201_users_list->Country->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t201_users_list->SortUrl($t201_users_list->Country) ?>', 1);"><div id="elh_t201_users_Country" class="t201_users_Country">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t201_users_list->Country->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t201_users_list->Country->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t201_users_list->Country->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t201_users_list->HomePhone->Visible) { // HomePhone ?>
	<?php if ($t201_users_list->SortUrl($t201_users_list->HomePhone) == "") { ?>
		<th data-name="HomePhone" class="<?php echo $t201_users_list->HomePhone->headerCellClass() ?>"><div id="elh_t201_users_HomePhone" class="t201_users_HomePhone"><div class="ew-table-header-caption"><?php echo $t201_users_list->HomePhone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HomePhone" class="<?php echo $t201_users_list->HomePhone->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t201_users_list->SortUrl($t201_users_list->HomePhone) ?>', 1);"><div id="elh_t201_users_HomePhone" class="t201_users_HomePhone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t201_users_list->HomePhone->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t201_users_list->HomePhone->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t201_users_list->HomePhone->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t201_users_list->Extension->Visible) { // Extension ?>
	<?php if ($t201_users_list->SortUrl($t201_users_list->Extension) == "") { ?>
		<th data-name="Extension" class="<?php echo $t201_users_list->Extension->headerCellClass() ?>"><div id="elh_t201_users_Extension" class="t201_users_Extension"><div class="ew-table-header-caption"><?php echo $t201_users_list->Extension->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Extension" class="<?php echo $t201_users_list->Extension->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t201_users_list->SortUrl($t201_users_list->Extension) ?>', 1);"><div id="elh_t201_users_Extension" class="t201_users_Extension">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t201_users_list->Extension->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t201_users_list->Extension->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t201_users_list->Extension->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t201_users_list->_Email->Visible) { // Email ?>
	<?php if ($t201_users_list->SortUrl($t201_users_list->_Email) == "") { ?>
		<th data-name="_Email" class="<?php echo $t201_users_list->_Email->headerCellClass() ?>"><div id="elh_t201_users__Email" class="t201_users__Email"><div class="ew-table-header-caption"><?php echo $t201_users_list->_Email->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_Email" class="<?php echo $t201_users_list->_Email->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t201_users_list->SortUrl($t201_users_list->_Email) ?>', 1);"><div id="elh_t201_users__Email" class="t201_users__Email">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t201_users_list->_Email->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t201_users_list->_Email->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t201_users_list->_Email->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t201_users_list->Photo->Visible) { // Photo ?>
	<?php if ($t201_users_list->SortUrl($t201_users_list->Photo) == "") { ?>
		<th data-name="Photo" class="<?php echo $t201_users_list->Photo->headerCellClass() ?>"><div id="elh_t201_users_Photo" class="t201_users_Photo"><div class="ew-table-header-caption"><?php echo $t201_users_list->Photo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Photo" class="<?php echo $t201_users_list->Photo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t201_users_list->SortUrl($t201_users_list->Photo) ?>', 1);"><div id="elh_t201_users_Photo" class="t201_users_Photo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t201_users_list->Photo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t201_users_list->Photo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t201_users_list->Photo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t201_users_list->ReportsTo->Visible) { // ReportsTo ?>
	<?php if ($t201_users_list->SortUrl($t201_users_list->ReportsTo) == "") { ?>
		<th data-name="ReportsTo" class="<?php echo $t201_users_list->ReportsTo->headerCellClass() ?>"><div id="elh_t201_users_ReportsTo" class="t201_users_ReportsTo"><div class="ew-table-header-caption"><?php echo $t201_users_list->ReportsTo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReportsTo" class="<?php echo $t201_users_list->ReportsTo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t201_users_list->SortUrl($t201_users_list->ReportsTo) ?>', 1);"><div id="elh_t201_users_ReportsTo" class="t201_users_ReportsTo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t201_users_list->ReportsTo->caption() ?></span><span class="ew-table-header-sort"><?php if ($t201_users_list->ReportsTo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t201_users_list->ReportsTo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t201_users_list->Password->Visible) { // Password ?>
	<?php if ($t201_users_list->SortUrl($t201_users_list->Password) == "") { ?>
		<th data-name="Password" class="<?php echo $t201_users_list->Password->headerCellClass() ?>"><div id="elh_t201_users_Password" class="t201_users_Password"><div class="ew-table-header-caption"><?php echo $t201_users_list->Password->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Password" class="<?php echo $t201_users_list->Password->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t201_users_list->SortUrl($t201_users_list->Password) ?>', 1);"><div id="elh_t201_users_Password" class="t201_users_Password">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t201_users_list->Password->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t201_users_list->Password->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t201_users_list->Password->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t201_users_list->UserLevel->Visible) { // UserLevel ?>
	<?php if ($t201_users_list->SortUrl($t201_users_list->UserLevel) == "") { ?>
		<th data-name="UserLevel" class="<?php echo $t201_users_list->UserLevel->headerCellClass() ?>"><div id="elh_t201_users_UserLevel" class="t201_users_UserLevel"><div class="ew-table-header-caption"><?php echo $t201_users_list->UserLevel->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UserLevel" class="<?php echo $t201_users_list->UserLevel->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t201_users_list->SortUrl($t201_users_list->UserLevel) ?>', 1);"><div id="elh_t201_users_UserLevel" class="t201_users_UserLevel">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t201_users_list->UserLevel->caption() ?></span><span class="ew-table-header-sort"><?php if ($t201_users_list->UserLevel->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t201_users_list->UserLevel->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t201_users_list->Username->Visible) { // Username ?>
	<?php if ($t201_users_list->SortUrl($t201_users_list->Username) == "") { ?>
		<th data-name="Username" class="<?php echo $t201_users_list->Username->headerCellClass() ?>"><div id="elh_t201_users_Username" class="t201_users_Username"><div class="ew-table-header-caption"><?php echo $t201_users_list->Username->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Username" class="<?php echo $t201_users_list->Username->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t201_users_list->SortUrl($t201_users_list->Username) ?>', 1);"><div id="elh_t201_users_Username" class="t201_users_Username">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t201_users_list->Username->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t201_users_list->Username->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t201_users_list->Username->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t201_users_list->Activated->Visible) { // Activated ?>
	<?php if ($t201_users_list->SortUrl($t201_users_list->Activated) == "") { ?>
		<th data-name="Activated" class="<?php echo $t201_users_list->Activated->headerCellClass() ?>"><div id="elh_t201_users_Activated" class="t201_users_Activated"><div class="ew-table-header-caption"><?php echo $t201_users_list->Activated->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Activated" class="<?php echo $t201_users_list->Activated->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t201_users_list->SortUrl($t201_users_list->Activated) ?>', 1);"><div id="elh_t201_users_Activated" class="t201_users_Activated">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t201_users_list->Activated->caption() ?></span><span class="ew-table-header-sort"><?php if ($t201_users_list->Activated->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t201_users_list->Activated->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t201_users_list->sekolah_id->Visible) { // sekolah_id ?>
	<?php if ($t201_users_list->SortUrl($t201_users_list->sekolah_id) == "") { ?>
		<th data-name="sekolah_id" class="<?php echo $t201_users_list->sekolah_id->headerCellClass() ?>"><div id="elh_t201_users_sekolah_id" class="t201_users_sekolah_id"><div class="ew-table-header-caption"><?php echo $t201_users_list->sekolah_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sekolah_id" class="<?php echo $t201_users_list->sekolah_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t201_users_list->SortUrl($t201_users_list->sekolah_id) ?>', 1);"><div id="elh_t201_users_sekolah_id" class="t201_users_sekolah_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t201_users_list->sekolah_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t201_users_list->sekolah_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t201_users_list->sekolah_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t201_users_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t201_users_list->ExportAll && $t201_users_list->isExport()) {
	$t201_users_list->StopRecord = $t201_users_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t201_users_list->TotalRecords > $t201_users_list->StartRecord + $t201_users_list->DisplayRecords - 1)
		$t201_users_list->StopRecord = $t201_users_list->StartRecord + $t201_users_list->DisplayRecords - 1;
	else
		$t201_users_list->StopRecord = $t201_users_list->TotalRecords;
}
$t201_users_list->RecordCount = $t201_users_list->StartRecord - 1;
if ($t201_users_list->Recordset && !$t201_users_list->Recordset->EOF) {
	$t201_users_list->Recordset->moveFirst();
	$selectLimit = $t201_users_list->UseSelectLimit;
	if (!$selectLimit && $t201_users_list->StartRecord > 1)
		$t201_users_list->Recordset->move($t201_users_list->StartRecord - 1);
} elseif (!$t201_users->AllowAddDeleteRow && $t201_users_list->StopRecord == 0) {
	$t201_users_list->StopRecord = $t201_users->GridAddRowCount;
}

// Initialize aggregate
$t201_users->RowType = ROWTYPE_AGGREGATEINIT;
$t201_users->resetAttributes();
$t201_users_list->renderRow();
while ($t201_users_list->RecordCount < $t201_users_list->StopRecord) {
	$t201_users_list->RecordCount++;
	if ($t201_users_list->RecordCount >= $t201_users_list->StartRecord) {
		$t201_users_list->RowCount++;

		// Set up key count
		$t201_users_list->KeyCount = $t201_users_list->RowIndex;

		// Init row class and style
		$t201_users->resetAttributes();
		$t201_users->CssClass = "";
		if ($t201_users_list->isGridAdd()) {
		} else {
			$t201_users_list->loadRowValues($t201_users_list->Recordset); // Load row values
		}
		$t201_users->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t201_users->RowAttrs->merge(["data-rowindex" => $t201_users_list->RowCount, "id" => "r" . $t201_users_list->RowCount . "_t201_users", "data-rowtype" => $t201_users->RowType]);

		// Render row
		$t201_users_list->renderRow();

		// Render list options
		$t201_users_list->renderListOptions();
?>
	<tr <?php echo $t201_users->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t201_users_list->ListOptions->render("body", "left", $t201_users_list->RowCount);
?>
	<?php if ($t201_users_list->LastName->Visible) { // LastName ?>
		<td data-name="LastName" <?php echo $t201_users_list->LastName->cellAttributes() ?>>
<span id="el<?php echo $t201_users_list->RowCount ?>_t201_users_LastName">
<span<?php echo $t201_users_list->LastName->viewAttributes() ?>><?php echo $t201_users_list->LastName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t201_users_list->FirstName->Visible) { // FirstName ?>
		<td data-name="FirstName" <?php echo $t201_users_list->FirstName->cellAttributes() ?>>
<span id="el<?php echo $t201_users_list->RowCount ?>_t201_users_FirstName">
<span<?php echo $t201_users_list->FirstName->viewAttributes() ?>><?php echo $t201_users_list->FirstName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t201_users_list->Title->Visible) { // Title ?>
		<td data-name="Title" <?php echo $t201_users_list->Title->cellAttributes() ?>>
<span id="el<?php echo $t201_users_list->RowCount ?>_t201_users_Title">
<span<?php echo $t201_users_list->Title->viewAttributes() ?>><?php echo $t201_users_list->Title->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t201_users_list->TitleOfCourtesy->Visible) { // TitleOfCourtesy ?>
		<td data-name="TitleOfCourtesy" <?php echo $t201_users_list->TitleOfCourtesy->cellAttributes() ?>>
<span id="el<?php echo $t201_users_list->RowCount ?>_t201_users_TitleOfCourtesy">
<span<?php echo $t201_users_list->TitleOfCourtesy->viewAttributes() ?>><?php echo $t201_users_list->TitleOfCourtesy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t201_users_list->BirthDate->Visible) { // BirthDate ?>
		<td data-name="BirthDate" <?php echo $t201_users_list->BirthDate->cellAttributes() ?>>
<span id="el<?php echo $t201_users_list->RowCount ?>_t201_users_BirthDate">
<span<?php echo $t201_users_list->BirthDate->viewAttributes() ?>><?php echo $t201_users_list->BirthDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t201_users_list->HireDate->Visible) { // HireDate ?>
		<td data-name="HireDate" <?php echo $t201_users_list->HireDate->cellAttributes() ?>>
<span id="el<?php echo $t201_users_list->RowCount ?>_t201_users_HireDate">
<span<?php echo $t201_users_list->HireDate->viewAttributes() ?>><?php echo $t201_users_list->HireDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t201_users_list->Address->Visible) { // Address ?>
		<td data-name="Address" <?php echo $t201_users_list->Address->cellAttributes() ?>>
<span id="el<?php echo $t201_users_list->RowCount ?>_t201_users_Address">
<span<?php echo $t201_users_list->Address->viewAttributes() ?>><?php echo $t201_users_list->Address->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t201_users_list->City->Visible) { // City ?>
		<td data-name="City" <?php echo $t201_users_list->City->cellAttributes() ?>>
<span id="el<?php echo $t201_users_list->RowCount ?>_t201_users_City">
<span<?php echo $t201_users_list->City->viewAttributes() ?>><?php echo $t201_users_list->City->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t201_users_list->Region->Visible) { // Region ?>
		<td data-name="Region" <?php echo $t201_users_list->Region->cellAttributes() ?>>
<span id="el<?php echo $t201_users_list->RowCount ?>_t201_users_Region">
<span<?php echo $t201_users_list->Region->viewAttributes() ?>><?php echo $t201_users_list->Region->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t201_users_list->PostalCode->Visible) { // PostalCode ?>
		<td data-name="PostalCode" <?php echo $t201_users_list->PostalCode->cellAttributes() ?>>
<span id="el<?php echo $t201_users_list->RowCount ?>_t201_users_PostalCode">
<span<?php echo $t201_users_list->PostalCode->viewAttributes() ?>><?php echo $t201_users_list->PostalCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t201_users_list->Country->Visible) { // Country ?>
		<td data-name="Country" <?php echo $t201_users_list->Country->cellAttributes() ?>>
<span id="el<?php echo $t201_users_list->RowCount ?>_t201_users_Country">
<span<?php echo $t201_users_list->Country->viewAttributes() ?>><?php echo $t201_users_list->Country->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t201_users_list->HomePhone->Visible) { // HomePhone ?>
		<td data-name="HomePhone" <?php echo $t201_users_list->HomePhone->cellAttributes() ?>>
<span id="el<?php echo $t201_users_list->RowCount ?>_t201_users_HomePhone">
<span<?php echo $t201_users_list->HomePhone->viewAttributes() ?>><?php echo $t201_users_list->HomePhone->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t201_users_list->Extension->Visible) { // Extension ?>
		<td data-name="Extension" <?php echo $t201_users_list->Extension->cellAttributes() ?>>
<span id="el<?php echo $t201_users_list->RowCount ?>_t201_users_Extension">
<span<?php echo $t201_users_list->Extension->viewAttributes() ?>><?php echo $t201_users_list->Extension->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t201_users_list->_Email->Visible) { // Email ?>
		<td data-name="_Email" <?php echo $t201_users_list->_Email->cellAttributes() ?>>
<span id="el<?php echo $t201_users_list->RowCount ?>_t201_users__Email">
<span<?php echo $t201_users_list->_Email->viewAttributes() ?>><?php echo $t201_users_list->_Email->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t201_users_list->Photo->Visible) { // Photo ?>
		<td data-name="Photo" <?php echo $t201_users_list->Photo->cellAttributes() ?>>
<span id="el<?php echo $t201_users_list->RowCount ?>_t201_users_Photo">
<span<?php echo $t201_users_list->Photo->viewAttributes() ?>><?php echo $t201_users_list->Photo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t201_users_list->ReportsTo->Visible) { // ReportsTo ?>
		<td data-name="ReportsTo" <?php echo $t201_users_list->ReportsTo->cellAttributes() ?>>
<span id="el<?php echo $t201_users_list->RowCount ?>_t201_users_ReportsTo">
<span<?php echo $t201_users_list->ReportsTo->viewAttributes() ?>><?php echo $t201_users_list->ReportsTo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t201_users_list->Password->Visible) { // Password ?>
		<td data-name="Password" <?php echo $t201_users_list->Password->cellAttributes() ?>>
<span id="el<?php echo $t201_users_list->RowCount ?>_t201_users_Password">
<span<?php echo $t201_users_list->Password->viewAttributes() ?>><?php echo $t201_users_list->Password->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t201_users_list->UserLevel->Visible) { // UserLevel ?>
		<td data-name="UserLevel" <?php echo $t201_users_list->UserLevel->cellAttributes() ?>>
<span id="el<?php echo $t201_users_list->RowCount ?>_t201_users_UserLevel">
<span<?php echo $t201_users_list->UserLevel->viewAttributes() ?>><?php echo $t201_users_list->UserLevel->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t201_users_list->Username->Visible) { // Username ?>
		<td data-name="Username" <?php echo $t201_users_list->Username->cellAttributes() ?>>
<span id="el<?php echo $t201_users_list->RowCount ?>_t201_users_Username">
<span<?php echo $t201_users_list->Username->viewAttributes() ?>><?php echo $t201_users_list->Username->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t201_users_list->Activated->Visible) { // Activated ?>
		<td data-name="Activated" <?php echo $t201_users_list->Activated->cellAttributes() ?>>
<span id="el<?php echo $t201_users_list->RowCount ?>_t201_users_Activated">
<span<?php echo $t201_users_list->Activated->viewAttributes() ?>><div class="custom-control custom-checkbox d-inline-block"><input type="checkbox" id="x_Activated" class="custom-control-input" value="<?php echo $t201_users_list->Activated->getViewValue() ?>" disabled<?php if (ConvertToBool($t201_users_list->Activated->CurrentValue)) { ?> checked<?php } ?>><label class="custom-control-label" for="x_Activated"></label></div></span>
</span>
</td>
	<?php } ?>
	<?php if ($t201_users_list->sekolah_id->Visible) { // sekolah_id ?>
		<td data-name="sekolah_id" <?php echo $t201_users_list->sekolah_id->cellAttributes() ?>>
<span id="el<?php echo $t201_users_list->RowCount ?>_t201_users_sekolah_id">
<span<?php echo $t201_users_list->sekolah_id->viewAttributes() ?>><?php echo $t201_users_list->sekolah_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t201_users_list->ListOptions->render("body", "right", $t201_users_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$t201_users_list->isGridAdd())
		$t201_users_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$t201_users->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t201_users_list->Recordset)
	$t201_users_list->Recordset->Close();
?>
<?php if (!$t201_users_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t201_users_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t201_users_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t201_users_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t201_users_list->TotalRecords == 0 && !$t201_users->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t201_users_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t201_users_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t201_users_list->isExport()) { ?>
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
$t201_users_list->terminate();
?>