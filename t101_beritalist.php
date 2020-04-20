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
$t101_berita_list = new t101_berita_list();

// Run the page
$t101_berita_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_berita_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t101_berita_list->isExport()) { ?>
<script>
var ft101_beritalist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft101_beritalist = currentForm = new ew.Form("ft101_beritalist", "list");
	ft101_beritalist.formKeyCountName = '<?php echo $t101_berita_list->FormKeyCountName ?>';
	loadjs.done("ft101_beritalist");
});
var ft101_beritalistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ft101_beritalistsrch = currentSearchForm = new ew.Form("ft101_beritalistsrch");

	// Dynamic selection lists
	// Filters

	ft101_beritalistsrch.filterList = <?php echo $t101_berita_list->getFilterList() ?>;
	loadjs.done("ft101_beritalistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t101_berita_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t101_berita_list->TotalRecords > 0 && $t101_berita_list->ExportOptions->visible()) { ?>
<?php $t101_berita_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t101_berita_list->ImportOptions->visible()) { ?>
<?php $t101_berita_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t101_berita_list->SearchOptions->visible()) { ?>
<?php $t101_berita_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t101_berita_list->FilterOptions->visible()) { ?>
<?php $t101_berita_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t101_berita_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$t101_berita_list->isExport() && !$t101_berita->CurrentAction) { ?>
<form name="ft101_beritalistsrch" id="ft101_beritalistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="ft101_beritalistsrch-search-panel" class="<?php echo $t101_berita_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t101_berita">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $t101_berita_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($t101_berita_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($t101_berita_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $t101_berita_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($t101_berita_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($t101_berita_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($t101_berita_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($t101_berita_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $t101_berita_list->showPageHeader(); ?>
<?php
$t101_berita_list->showMessage();
?>
<?php if ($t101_berita_list->TotalRecords > 0 || $t101_berita->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t101_berita_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t101_berita">
<form name="ft101_beritalist" id="ft101_beritalist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t101_berita">
<div id="gmp_t101_berita" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t101_berita_list->TotalRecords > 0 || $t101_berita_list->isGridEdit()) { ?>
<table id="tbl_t101_beritalist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t101_berita->RowType = ROWTYPE_HEADER;

// Render list options
$t101_berita_list->renderListOptions();

// Render list options (header, left)
$t101_berita_list->ListOptions->render("header", "left");
?>
<?php if ($t101_berita_list->Tanggal->Visible) { // Tanggal ?>
	<?php if ($t101_berita_list->SortUrl($t101_berita_list->Tanggal) == "") { ?>
		<th data-name="Tanggal" class="<?php echo $t101_berita_list->Tanggal->headerCellClass() ?>"><div id="elh_t101_berita_Tanggal" class="t101_berita_Tanggal"><div class="ew-table-header-caption"><?php echo $t101_berita_list->Tanggal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tanggal" class="<?php echo $t101_berita_list->Tanggal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t101_berita_list->SortUrl($t101_berita_list->Tanggal) ?>', 1);"><div id="elh_t101_berita_Tanggal" class="t101_berita_Tanggal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_berita_list->Tanggal->caption() ?></span><span class="ew-table-header-sort"><?php if ($t101_berita_list->Tanggal->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t101_berita_list->Tanggal->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t101_berita_list->Berita->Visible) { // Berita ?>
	<?php if ($t101_berita_list->SortUrl($t101_berita_list->Berita) == "") { ?>
		<th data-name="Berita" class="<?php echo $t101_berita_list->Berita->headerCellClass() ?>"><div id="elh_t101_berita_Berita" class="t101_berita_Berita"><div class="ew-table-header-caption"><?php echo $t101_berita_list->Berita->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Berita" class="<?php echo $t101_berita_list->Berita->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t101_berita_list->SortUrl($t101_berita_list->Berita) ?>', 1);"><div id="elh_t101_berita_Berita" class="t101_berita_Berita">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t101_berita_list->Berita->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t101_berita_list->Berita->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t101_berita_list->Berita->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t101_berita_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t101_berita_list->ExportAll && $t101_berita_list->isExport()) {
	$t101_berita_list->StopRecord = $t101_berita_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t101_berita_list->TotalRecords > $t101_berita_list->StartRecord + $t101_berita_list->DisplayRecords - 1)
		$t101_berita_list->StopRecord = $t101_berita_list->StartRecord + $t101_berita_list->DisplayRecords - 1;
	else
		$t101_berita_list->StopRecord = $t101_berita_list->TotalRecords;
}
$t101_berita_list->RecordCount = $t101_berita_list->StartRecord - 1;
if ($t101_berita_list->Recordset && !$t101_berita_list->Recordset->EOF) {
	$t101_berita_list->Recordset->moveFirst();
	$selectLimit = $t101_berita_list->UseSelectLimit;
	if (!$selectLimit && $t101_berita_list->StartRecord > 1)
		$t101_berita_list->Recordset->move($t101_berita_list->StartRecord - 1);
} elseif (!$t101_berita->AllowAddDeleteRow && $t101_berita_list->StopRecord == 0) {
	$t101_berita_list->StopRecord = $t101_berita->GridAddRowCount;
}

// Initialize aggregate
$t101_berita->RowType = ROWTYPE_AGGREGATEINIT;
$t101_berita->resetAttributes();
$t101_berita_list->renderRow();
while ($t101_berita_list->RecordCount < $t101_berita_list->StopRecord) {
	$t101_berita_list->RecordCount++;
	if ($t101_berita_list->RecordCount >= $t101_berita_list->StartRecord) {
		$t101_berita_list->RowCount++;

		// Set up key count
		$t101_berita_list->KeyCount = $t101_berita_list->RowIndex;

		// Init row class and style
		$t101_berita->resetAttributes();
		$t101_berita->CssClass = "";
		if ($t101_berita_list->isGridAdd()) {
		} else {
			$t101_berita_list->loadRowValues($t101_berita_list->Recordset); // Load row values
		}
		$t101_berita->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t101_berita->RowAttrs->merge(["data-rowindex" => $t101_berita_list->RowCount, "id" => "r" . $t101_berita_list->RowCount . "_t101_berita", "data-rowtype" => $t101_berita->RowType]);

		// Render row
		$t101_berita_list->renderRow();

		// Render list options
		$t101_berita_list->renderListOptions();
?>
	<tr <?php echo $t101_berita->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t101_berita_list->ListOptions->render("body", "left", $t101_berita_list->RowCount);
?>
	<?php if ($t101_berita_list->Tanggal->Visible) { // Tanggal ?>
		<td data-name="Tanggal" <?php echo $t101_berita_list->Tanggal->cellAttributes() ?>>
<span id="el<?php echo $t101_berita_list->RowCount ?>_t101_berita_Tanggal">
<span<?php echo $t101_berita_list->Tanggal->viewAttributes() ?>><?php echo $t101_berita_list->Tanggal->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t101_berita_list->Berita->Visible) { // Berita ?>
		<td data-name="Berita" <?php echo $t101_berita_list->Berita->cellAttributes() ?>>
<span id="el<?php echo $t101_berita_list->RowCount ?>_t101_berita_Berita">
<span<?php echo $t101_berita_list->Berita->viewAttributes() ?>><?php echo $t101_berita_list->Berita->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t101_berita_list->ListOptions->render("body", "right", $t101_berita_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$t101_berita_list->isGridAdd())
		$t101_berita_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$t101_berita->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t101_berita_list->Recordset)
	$t101_berita_list->Recordset->Close();
?>
<?php if (!$t101_berita_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t101_berita_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t101_berita_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t101_berita_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t101_berita_list->TotalRecords == 0 && !$t101_berita->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t101_berita_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t101_berita_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t101_berita_list->isExport()) { ?>
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
$t101_berita_list->terminate();
?>