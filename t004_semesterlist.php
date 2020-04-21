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
$t004_semester_list = new t004_semester_list();

// Run the page
$t004_semester_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t004_semester_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t004_semester_list->isExport()) { ?>
<script>
var ft004_semesterlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft004_semesterlist = currentForm = new ew.Form("ft004_semesterlist", "list");
	ft004_semesterlist.formKeyCountName = '<?php echo $t004_semester_list->FormKeyCountName ?>';
	loadjs.done("ft004_semesterlist");
});
var ft004_semesterlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ft004_semesterlistsrch = currentSearchForm = new ew.Form("ft004_semesterlistsrch");

	// Dynamic selection lists
	// Filters

	ft004_semesterlistsrch.filterList = <?php echo $t004_semester_list->getFilterList() ?>;
	loadjs.done("ft004_semesterlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t004_semester_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t004_semester_list->TotalRecords > 0 && $t004_semester_list->ExportOptions->visible()) { ?>
<?php $t004_semester_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t004_semester_list->ImportOptions->visible()) { ?>
<?php $t004_semester_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t004_semester_list->SearchOptions->visible()) { ?>
<?php $t004_semester_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t004_semester_list->FilterOptions->visible()) { ?>
<?php $t004_semester_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t004_semester_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$t004_semester_list->isExport() && !$t004_semester->CurrentAction) { ?>
<form name="ft004_semesterlistsrch" id="ft004_semesterlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="ft004_semesterlistsrch-search-panel" class="<?php echo $t004_semester_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t004_semester">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $t004_semester_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($t004_semester_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($t004_semester_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $t004_semester_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($t004_semester_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($t004_semester_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($t004_semester_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($t004_semester_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $t004_semester_list->showPageHeader(); ?>
<?php
$t004_semester_list->showMessage();
?>
<?php if ($t004_semester_list->TotalRecords > 0 || $t004_semester->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t004_semester_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t004_semester">
<form name="ft004_semesterlist" id="ft004_semesterlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t004_semester">
<div id="gmp_t004_semester" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t004_semester_list->TotalRecords > 0 || $t004_semester_list->isGridEdit()) { ?>
<table id="tbl_t004_semesterlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t004_semester->RowType = ROWTYPE_HEADER;

// Render list options
$t004_semester_list->renderListOptions();

// Render list options (header, left)
$t004_semester_list->ListOptions->render("header", "left");
?>
<?php if ($t004_semester_list->Semester->Visible) { // Semester ?>
	<?php if ($t004_semester_list->SortUrl($t004_semester_list->Semester) == "") { ?>
		<th data-name="Semester" class="<?php echo $t004_semester_list->Semester->headerCellClass() ?>"><div id="elh_t004_semester_Semester" class="t004_semester_Semester"><div class="ew-table-header-caption"><?php echo $t004_semester_list->Semester->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Semester" class="<?php echo $t004_semester_list->Semester->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t004_semester_list->SortUrl($t004_semester_list->Semester) ?>', 1);"><div id="elh_t004_semester_Semester" class="t004_semester_Semester">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t004_semester_list->Semester->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t004_semester_list->Semester->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t004_semester_list->Semester->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t004_semester_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t004_semester_list->ExportAll && $t004_semester_list->isExport()) {
	$t004_semester_list->StopRecord = $t004_semester_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t004_semester_list->TotalRecords > $t004_semester_list->StartRecord + $t004_semester_list->DisplayRecords - 1)
		$t004_semester_list->StopRecord = $t004_semester_list->StartRecord + $t004_semester_list->DisplayRecords - 1;
	else
		$t004_semester_list->StopRecord = $t004_semester_list->TotalRecords;
}
$t004_semester_list->RecordCount = $t004_semester_list->StartRecord - 1;
if ($t004_semester_list->Recordset && !$t004_semester_list->Recordset->EOF) {
	$t004_semester_list->Recordset->moveFirst();
	$selectLimit = $t004_semester_list->UseSelectLimit;
	if (!$selectLimit && $t004_semester_list->StartRecord > 1)
		$t004_semester_list->Recordset->move($t004_semester_list->StartRecord - 1);
} elseif (!$t004_semester->AllowAddDeleteRow && $t004_semester_list->StopRecord == 0) {
	$t004_semester_list->StopRecord = $t004_semester->GridAddRowCount;
}

// Initialize aggregate
$t004_semester->RowType = ROWTYPE_AGGREGATEINIT;
$t004_semester->resetAttributes();
$t004_semester_list->renderRow();
while ($t004_semester_list->RecordCount < $t004_semester_list->StopRecord) {
	$t004_semester_list->RecordCount++;
	if ($t004_semester_list->RecordCount >= $t004_semester_list->StartRecord) {
		$t004_semester_list->RowCount++;

		// Set up key count
		$t004_semester_list->KeyCount = $t004_semester_list->RowIndex;

		// Init row class and style
		$t004_semester->resetAttributes();
		$t004_semester->CssClass = "";
		if ($t004_semester_list->isGridAdd()) {
		} else {
			$t004_semester_list->loadRowValues($t004_semester_list->Recordset); // Load row values
		}
		$t004_semester->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t004_semester->RowAttrs->merge(["data-rowindex" => $t004_semester_list->RowCount, "id" => "r" . $t004_semester_list->RowCount . "_t004_semester", "data-rowtype" => $t004_semester->RowType]);

		// Render row
		$t004_semester_list->renderRow();

		// Render list options
		$t004_semester_list->renderListOptions();
?>
	<tr <?php echo $t004_semester->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t004_semester_list->ListOptions->render("body", "left", $t004_semester_list->RowCount);
?>
	<?php if ($t004_semester_list->Semester->Visible) { // Semester ?>
		<td data-name="Semester" <?php echo $t004_semester_list->Semester->cellAttributes() ?>>
<span id="el<?php echo $t004_semester_list->RowCount ?>_t004_semester_Semester">
<span<?php echo $t004_semester_list->Semester->viewAttributes() ?>><?php echo $t004_semester_list->Semester->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t004_semester_list->ListOptions->render("body", "right", $t004_semester_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$t004_semester_list->isGridAdd())
		$t004_semester_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$t004_semester->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t004_semester_list->Recordset)
	$t004_semester_list->Recordset->Close();
?>
<?php if (!$t004_semester_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t004_semester_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t004_semester_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t004_semester_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t004_semester_list->TotalRecords == 0 && !$t004_semester->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t004_semester_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t004_semester_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t004_semester_list->isExport()) { ?>
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
$t004_semester_list->terminate();
?>