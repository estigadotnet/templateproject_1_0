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
$t002_tahunajaran_list = new t002_tahunajaran_list();

// Run the page
$t002_tahunajaran_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t002_tahunajaran_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t002_tahunajaran_list->isExport()) { ?>
<script>
var ft002_tahunajaranlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft002_tahunajaranlist = currentForm = new ew.Form("ft002_tahunajaranlist", "list");
	ft002_tahunajaranlist.formKeyCountName = '<?php echo $t002_tahunajaran_list->FormKeyCountName ?>';
	loadjs.done("ft002_tahunajaranlist");
});
var ft002_tahunajaranlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ft002_tahunajaranlistsrch = currentSearchForm = new ew.Form("ft002_tahunajaranlistsrch");

	// Dynamic selection lists
	// Filters

	ft002_tahunajaranlistsrch.filterList = <?php echo $t002_tahunajaran_list->getFilterList() ?>;
	loadjs.done("ft002_tahunajaranlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t002_tahunajaran_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t002_tahunajaran_list->TotalRecords > 0 && $t002_tahunajaran_list->ExportOptions->visible()) { ?>
<?php $t002_tahunajaran_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t002_tahunajaran_list->ImportOptions->visible()) { ?>
<?php $t002_tahunajaran_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t002_tahunajaran_list->SearchOptions->visible()) { ?>
<?php $t002_tahunajaran_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t002_tahunajaran_list->FilterOptions->visible()) { ?>
<?php $t002_tahunajaran_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t002_tahunajaran_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$t002_tahunajaran_list->isExport() && !$t002_tahunajaran->CurrentAction) { ?>
<form name="ft002_tahunajaranlistsrch" id="ft002_tahunajaranlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="ft002_tahunajaranlistsrch-search-panel" class="<?php echo $t002_tahunajaran_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t002_tahunajaran">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $t002_tahunajaran_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($t002_tahunajaran_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($t002_tahunajaran_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $t002_tahunajaran_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($t002_tahunajaran_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($t002_tahunajaran_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($t002_tahunajaran_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($t002_tahunajaran_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $t002_tahunajaran_list->showPageHeader(); ?>
<?php
$t002_tahunajaran_list->showMessage();
?>
<?php if ($t002_tahunajaran_list->TotalRecords > 0 || $t002_tahunajaran->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t002_tahunajaran_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t002_tahunajaran">
<form name="ft002_tahunajaranlist" id="ft002_tahunajaranlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t002_tahunajaran">
<div id="gmp_t002_tahunajaran" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t002_tahunajaran_list->TotalRecords > 0 || $t002_tahunajaran_list->isGridEdit()) { ?>
<table id="tbl_t002_tahunajaranlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t002_tahunajaran->RowType = ROWTYPE_HEADER;

// Render list options
$t002_tahunajaran_list->renderListOptions();

// Render list options (header, left)
$t002_tahunajaran_list->ListOptions->render("header", "left");
?>
<?php if ($t002_tahunajaran_list->Mulai->Visible) { // Mulai ?>
	<?php if ($t002_tahunajaran_list->SortUrl($t002_tahunajaran_list->Mulai) == "") { ?>
		<th data-name="Mulai" class="<?php echo $t002_tahunajaran_list->Mulai->headerCellClass() ?>"><div id="elh_t002_tahunajaran_Mulai" class="t002_tahunajaran_Mulai"><div class="ew-table-header-caption"><?php echo $t002_tahunajaran_list->Mulai->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mulai" class="<?php echo $t002_tahunajaran_list->Mulai->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t002_tahunajaran_list->SortUrl($t002_tahunajaran_list->Mulai) ?>', 1);"><div id="elh_t002_tahunajaran_Mulai" class="t002_tahunajaran_Mulai">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t002_tahunajaran_list->Mulai->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t002_tahunajaran_list->Mulai->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t002_tahunajaran_list->Mulai->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t002_tahunajaran_list->Selesai->Visible) { // Selesai ?>
	<?php if ($t002_tahunajaran_list->SortUrl($t002_tahunajaran_list->Selesai) == "") { ?>
		<th data-name="Selesai" class="<?php echo $t002_tahunajaran_list->Selesai->headerCellClass() ?>"><div id="elh_t002_tahunajaran_Selesai" class="t002_tahunajaran_Selesai"><div class="ew-table-header-caption"><?php echo $t002_tahunajaran_list->Selesai->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Selesai" class="<?php echo $t002_tahunajaran_list->Selesai->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t002_tahunajaran_list->SortUrl($t002_tahunajaran_list->Selesai) ?>', 1);"><div id="elh_t002_tahunajaran_Selesai" class="t002_tahunajaran_Selesai">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t002_tahunajaran_list->Selesai->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t002_tahunajaran_list->Selesai->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t002_tahunajaran_list->Selesai->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t002_tahunajaran_list->TahunAjaran->Visible) { // TahunAjaran ?>
	<?php if ($t002_tahunajaran_list->SortUrl($t002_tahunajaran_list->TahunAjaran) == "") { ?>
		<th data-name="TahunAjaran" class="<?php echo $t002_tahunajaran_list->TahunAjaran->headerCellClass() ?>"><div id="elh_t002_tahunajaran_TahunAjaran" class="t002_tahunajaran_TahunAjaran"><div class="ew-table-header-caption"><?php echo $t002_tahunajaran_list->TahunAjaran->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TahunAjaran" class="<?php echo $t002_tahunajaran_list->TahunAjaran->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t002_tahunajaran_list->SortUrl($t002_tahunajaran_list->TahunAjaran) ?>', 1);"><div id="elh_t002_tahunajaran_TahunAjaran" class="t002_tahunajaran_TahunAjaran">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t002_tahunajaran_list->TahunAjaran->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t002_tahunajaran_list->TahunAjaran->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t002_tahunajaran_list->TahunAjaran->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t002_tahunajaran_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t002_tahunajaran_list->ExportAll && $t002_tahunajaran_list->isExport()) {
	$t002_tahunajaran_list->StopRecord = $t002_tahunajaran_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t002_tahunajaran_list->TotalRecords > $t002_tahunajaran_list->StartRecord + $t002_tahunajaran_list->DisplayRecords - 1)
		$t002_tahunajaran_list->StopRecord = $t002_tahunajaran_list->StartRecord + $t002_tahunajaran_list->DisplayRecords - 1;
	else
		$t002_tahunajaran_list->StopRecord = $t002_tahunajaran_list->TotalRecords;
}
$t002_tahunajaran_list->RecordCount = $t002_tahunajaran_list->StartRecord - 1;
if ($t002_tahunajaran_list->Recordset && !$t002_tahunajaran_list->Recordset->EOF) {
	$t002_tahunajaran_list->Recordset->moveFirst();
	$selectLimit = $t002_tahunajaran_list->UseSelectLimit;
	if (!$selectLimit && $t002_tahunajaran_list->StartRecord > 1)
		$t002_tahunajaran_list->Recordset->move($t002_tahunajaran_list->StartRecord - 1);
} elseif (!$t002_tahunajaran->AllowAddDeleteRow && $t002_tahunajaran_list->StopRecord == 0) {
	$t002_tahunajaran_list->StopRecord = $t002_tahunajaran->GridAddRowCount;
}

// Initialize aggregate
$t002_tahunajaran->RowType = ROWTYPE_AGGREGATEINIT;
$t002_tahunajaran->resetAttributes();
$t002_tahunajaran_list->renderRow();
while ($t002_tahunajaran_list->RecordCount < $t002_tahunajaran_list->StopRecord) {
	$t002_tahunajaran_list->RecordCount++;
	if ($t002_tahunajaran_list->RecordCount >= $t002_tahunajaran_list->StartRecord) {
		$t002_tahunajaran_list->RowCount++;

		// Set up key count
		$t002_tahunajaran_list->KeyCount = $t002_tahunajaran_list->RowIndex;

		// Init row class and style
		$t002_tahunajaran->resetAttributes();
		$t002_tahunajaran->CssClass = "";
		if ($t002_tahunajaran_list->isGridAdd()) {
		} else {
			$t002_tahunajaran_list->loadRowValues($t002_tahunajaran_list->Recordset); // Load row values
		}
		$t002_tahunajaran->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t002_tahunajaran->RowAttrs->merge(["data-rowindex" => $t002_tahunajaran_list->RowCount, "id" => "r" . $t002_tahunajaran_list->RowCount . "_t002_tahunajaran", "data-rowtype" => $t002_tahunajaran->RowType]);

		// Render row
		$t002_tahunajaran_list->renderRow();

		// Render list options
		$t002_tahunajaran_list->renderListOptions();
?>
	<tr <?php echo $t002_tahunajaran->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t002_tahunajaran_list->ListOptions->render("body", "left", $t002_tahunajaran_list->RowCount);
?>
	<?php if ($t002_tahunajaran_list->Mulai->Visible) { // Mulai ?>
		<td data-name="Mulai" <?php echo $t002_tahunajaran_list->Mulai->cellAttributes() ?>>
<span id="el<?php echo $t002_tahunajaran_list->RowCount ?>_t002_tahunajaran_Mulai">
<span<?php echo $t002_tahunajaran_list->Mulai->viewAttributes() ?>><?php echo $t002_tahunajaran_list->Mulai->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t002_tahunajaran_list->Selesai->Visible) { // Selesai ?>
		<td data-name="Selesai" <?php echo $t002_tahunajaran_list->Selesai->cellAttributes() ?>>
<span id="el<?php echo $t002_tahunajaran_list->RowCount ?>_t002_tahunajaran_Selesai">
<span<?php echo $t002_tahunajaran_list->Selesai->viewAttributes() ?>><?php echo $t002_tahunajaran_list->Selesai->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t002_tahunajaran_list->TahunAjaran->Visible) { // TahunAjaran ?>
		<td data-name="TahunAjaran" <?php echo $t002_tahunajaran_list->TahunAjaran->cellAttributes() ?>>
<span id="el<?php echo $t002_tahunajaran_list->RowCount ?>_t002_tahunajaran_TahunAjaran">
<span<?php echo $t002_tahunajaran_list->TahunAjaran->viewAttributes() ?>><?php echo $t002_tahunajaran_list->TahunAjaran->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t002_tahunajaran_list->ListOptions->render("body", "right", $t002_tahunajaran_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$t002_tahunajaran_list->isGridAdd())
		$t002_tahunajaran_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$t002_tahunajaran->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t002_tahunajaran_list->Recordset)
	$t002_tahunajaran_list->Recordset->Close();
?>
<?php if (!$t002_tahunajaran_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t002_tahunajaran_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t002_tahunajaran_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t002_tahunajaran_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t002_tahunajaran_list->TotalRecords == 0 && !$t002_tahunajaran->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t002_tahunajaran_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t002_tahunajaran_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t002_tahunajaran_list->isExport()) { ?>
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
$t002_tahunajaran_list->terminate();
?>