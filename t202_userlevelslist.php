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
$t202_userlevels_list = new t202_userlevels_list();

// Run the page
$t202_userlevels_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t202_userlevels_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t202_userlevels_list->isExport()) { ?>
<script>
var ft202_userlevelslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft202_userlevelslist = currentForm = new ew.Form("ft202_userlevelslist", "list");
	ft202_userlevelslist.formKeyCountName = '<?php echo $t202_userlevels_list->FormKeyCountName ?>';
	loadjs.done("ft202_userlevelslist");
});
var ft202_userlevelslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ft202_userlevelslistsrch = currentSearchForm = new ew.Form("ft202_userlevelslistsrch");

	// Dynamic selection lists
	// Filters

	ft202_userlevelslistsrch.filterList = <?php echo $t202_userlevels_list->getFilterList() ?>;
	loadjs.done("ft202_userlevelslistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t202_userlevels_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t202_userlevels_list->TotalRecords > 0 && $t202_userlevels_list->ExportOptions->visible()) { ?>
<?php $t202_userlevels_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t202_userlevels_list->ImportOptions->visible()) { ?>
<?php $t202_userlevels_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t202_userlevels_list->SearchOptions->visible()) { ?>
<?php $t202_userlevels_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t202_userlevels_list->FilterOptions->visible()) { ?>
<?php $t202_userlevels_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t202_userlevels_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$t202_userlevels_list->isExport() && !$t202_userlevels->CurrentAction) { ?>
<form name="ft202_userlevelslistsrch" id="ft202_userlevelslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="ft202_userlevelslistsrch-search-panel" class="<?php echo $t202_userlevels_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t202_userlevels">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $t202_userlevels_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($t202_userlevels_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($t202_userlevels_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $t202_userlevels_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($t202_userlevels_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($t202_userlevels_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($t202_userlevels_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($t202_userlevels_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $t202_userlevels_list->showPageHeader(); ?>
<?php
$t202_userlevels_list->showMessage();
?>
<?php if ($t202_userlevels_list->TotalRecords > 0 || $t202_userlevels->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t202_userlevels_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t202_userlevels">
<form name="ft202_userlevelslist" id="ft202_userlevelslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t202_userlevels">
<div id="gmp_t202_userlevels" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t202_userlevels_list->TotalRecords > 0 || $t202_userlevels_list->isGridEdit()) { ?>
<table id="tbl_t202_userlevelslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t202_userlevels->RowType = ROWTYPE_HEADER;

// Render list options
$t202_userlevels_list->renderListOptions();

// Render list options (header, left)
$t202_userlevels_list->ListOptions->render("header", "left");
?>
<?php if ($t202_userlevels_list->userlevelid->Visible) { // userlevelid ?>
	<?php if ($t202_userlevels_list->SortUrl($t202_userlevels_list->userlevelid) == "") { ?>
		<th data-name="userlevelid" class="<?php echo $t202_userlevels_list->userlevelid->headerCellClass() ?>"><div id="elh_t202_userlevels_userlevelid" class="t202_userlevels_userlevelid"><div class="ew-table-header-caption"><?php echo $t202_userlevels_list->userlevelid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="userlevelid" class="<?php echo $t202_userlevels_list->userlevelid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t202_userlevels_list->SortUrl($t202_userlevels_list->userlevelid) ?>', 1);"><div id="elh_t202_userlevels_userlevelid" class="t202_userlevels_userlevelid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t202_userlevels_list->userlevelid->caption() ?></span><span class="ew-table-header-sort"><?php if ($t202_userlevels_list->userlevelid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t202_userlevels_list->userlevelid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t202_userlevels_list->userlevelname->Visible) { // userlevelname ?>
	<?php if ($t202_userlevels_list->SortUrl($t202_userlevels_list->userlevelname) == "") { ?>
		<th data-name="userlevelname" class="<?php echo $t202_userlevels_list->userlevelname->headerCellClass() ?>"><div id="elh_t202_userlevels_userlevelname" class="t202_userlevels_userlevelname"><div class="ew-table-header-caption"><?php echo $t202_userlevels_list->userlevelname->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="userlevelname" class="<?php echo $t202_userlevels_list->userlevelname->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t202_userlevels_list->SortUrl($t202_userlevels_list->userlevelname) ?>', 1);"><div id="elh_t202_userlevels_userlevelname" class="t202_userlevels_userlevelname">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t202_userlevels_list->userlevelname->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t202_userlevels_list->userlevelname->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t202_userlevels_list->userlevelname->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t202_userlevels_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t202_userlevels_list->ExportAll && $t202_userlevels_list->isExport()) {
	$t202_userlevels_list->StopRecord = $t202_userlevels_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t202_userlevels_list->TotalRecords > $t202_userlevels_list->StartRecord + $t202_userlevels_list->DisplayRecords - 1)
		$t202_userlevels_list->StopRecord = $t202_userlevels_list->StartRecord + $t202_userlevels_list->DisplayRecords - 1;
	else
		$t202_userlevels_list->StopRecord = $t202_userlevels_list->TotalRecords;
}
$t202_userlevels_list->RecordCount = $t202_userlevels_list->StartRecord - 1;
if ($t202_userlevels_list->Recordset && !$t202_userlevels_list->Recordset->EOF) {
	$t202_userlevels_list->Recordset->moveFirst();
	$selectLimit = $t202_userlevels_list->UseSelectLimit;
	if (!$selectLimit && $t202_userlevels_list->StartRecord > 1)
		$t202_userlevels_list->Recordset->move($t202_userlevels_list->StartRecord - 1);
} elseif (!$t202_userlevels->AllowAddDeleteRow && $t202_userlevels_list->StopRecord == 0) {
	$t202_userlevels_list->StopRecord = $t202_userlevels->GridAddRowCount;
}

// Initialize aggregate
$t202_userlevels->RowType = ROWTYPE_AGGREGATEINIT;
$t202_userlevels->resetAttributes();
$t202_userlevels_list->renderRow();
while ($t202_userlevels_list->RecordCount < $t202_userlevels_list->StopRecord) {
	$t202_userlevels_list->RecordCount++;
	if ($t202_userlevels_list->RecordCount >= $t202_userlevels_list->StartRecord) {
		$t202_userlevels_list->RowCount++;

		// Set up key count
		$t202_userlevels_list->KeyCount = $t202_userlevels_list->RowIndex;

		// Init row class and style
		$t202_userlevels->resetAttributes();
		$t202_userlevels->CssClass = "";
		if ($t202_userlevels_list->isGridAdd()) {
		} else {
			$t202_userlevels_list->loadRowValues($t202_userlevels_list->Recordset); // Load row values
		}
		$t202_userlevels->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t202_userlevels->RowAttrs->merge(["data-rowindex" => $t202_userlevels_list->RowCount, "id" => "r" . $t202_userlevels_list->RowCount . "_t202_userlevels", "data-rowtype" => $t202_userlevels->RowType]);

		// Render row
		$t202_userlevels_list->renderRow();

		// Render list options
		$t202_userlevels_list->renderListOptions();
?>
	<tr <?php echo $t202_userlevels->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t202_userlevels_list->ListOptions->render("body", "left", $t202_userlevels_list->RowCount);
?>
	<?php if ($t202_userlevels_list->userlevelid->Visible) { // userlevelid ?>
		<td data-name="userlevelid" <?php echo $t202_userlevels_list->userlevelid->cellAttributes() ?>>
<span id="el<?php echo $t202_userlevels_list->RowCount ?>_t202_userlevels_userlevelid">
<span<?php echo $t202_userlevels_list->userlevelid->viewAttributes() ?>><?php echo $t202_userlevels_list->userlevelid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t202_userlevels_list->userlevelname->Visible) { // userlevelname ?>
		<td data-name="userlevelname" <?php echo $t202_userlevels_list->userlevelname->cellAttributes() ?>>
<span id="el<?php echo $t202_userlevels_list->RowCount ?>_t202_userlevels_userlevelname">
<span<?php echo $t202_userlevels_list->userlevelname->viewAttributes() ?>><?php echo $t202_userlevels_list->userlevelname->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t202_userlevels_list->ListOptions->render("body", "right", $t202_userlevels_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$t202_userlevels_list->isGridAdd())
		$t202_userlevels_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$t202_userlevels->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t202_userlevels_list->Recordset)
	$t202_userlevels_list->Recordset->Close();
?>
<?php if (!$t202_userlevels_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t202_userlevels_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t202_userlevels_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t202_userlevels_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t202_userlevels_list->TotalRecords == 0 && !$t202_userlevels->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t202_userlevels_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t202_userlevels_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t202_userlevels_list->isExport()) { ?>
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
$t202_userlevels_list->terminate();
?>