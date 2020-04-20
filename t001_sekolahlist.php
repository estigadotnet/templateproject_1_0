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
$t001_sekolah_list = new t001_sekolah_list();

// Run the page
$t001_sekolah_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t001_sekolah_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t001_sekolah_list->isExport()) { ?>
<script>
var ft001_sekolahlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft001_sekolahlist = currentForm = new ew.Form("ft001_sekolahlist", "list");
	ft001_sekolahlist.formKeyCountName = '<?php echo $t001_sekolah_list->FormKeyCountName ?>';
	loadjs.done("ft001_sekolahlist");
});
var ft001_sekolahlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ft001_sekolahlistsrch = currentSearchForm = new ew.Form("ft001_sekolahlistsrch");

	// Dynamic selection lists
	// Filters

	ft001_sekolahlistsrch.filterList = <?php echo $t001_sekolah_list->getFilterList() ?>;
	loadjs.done("ft001_sekolahlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t001_sekolah_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t001_sekolah_list->TotalRecords > 0 && $t001_sekolah_list->ExportOptions->visible()) { ?>
<?php $t001_sekolah_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t001_sekolah_list->ImportOptions->visible()) { ?>
<?php $t001_sekolah_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t001_sekolah_list->SearchOptions->visible()) { ?>
<?php $t001_sekolah_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t001_sekolah_list->FilterOptions->visible()) { ?>
<?php $t001_sekolah_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t001_sekolah_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$t001_sekolah_list->isExport() && !$t001_sekolah->CurrentAction) { ?>
<form name="ft001_sekolahlistsrch" id="ft001_sekolahlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="ft001_sekolahlistsrch-search-panel" class="<?php echo $t001_sekolah_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t001_sekolah">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $t001_sekolah_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($t001_sekolah_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($t001_sekolah_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $t001_sekolah_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($t001_sekolah_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($t001_sekolah_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($t001_sekolah_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($t001_sekolah_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $t001_sekolah_list->showPageHeader(); ?>
<?php
$t001_sekolah_list->showMessage();
?>
<?php if ($t001_sekolah_list->TotalRecords > 0 || $t001_sekolah->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t001_sekolah_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t001_sekolah">
<form name="ft001_sekolahlist" id="ft001_sekolahlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t001_sekolah">
<div id="gmp_t001_sekolah" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t001_sekolah_list->TotalRecords > 0 || $t001_sekolah_list->isGridEdit()) { ?>
<table id="tbl_t001_sekolahlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t001_sekolah->RowType = ROWTYPE_HEADER;

// Render list options
$t001_sekolah_list->renderListOptions();

// Render list options (header, left)
$t001_sekolah_list->ListOptions->render("header", "left");
?>
<?php if ($t001_sekolah_list->Nama->Visible) { // Nama ?>
	<?php if ($t001_sekolah_list->SortUrl($t001_sekolah_list->Nama) == "") { ?>
		<th data-name="Nama" class="<?php echo $t001_sekolah_list->Nama->headerCellClass() ?>"><div id="elh_t001_sekolah_Nama" class="t001_sekolah_Nama"><div class="ew-table-header-caption"><?php echo $t001_sekolah_list->Nama->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nama" class="<?php echo $t001_sekolah_list->Nama->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t001_sekolah_list->SortUrl($t001_sekolah_list->Nama) ?>', 1);"><div id="elh_t001_sekolah_Nama" class="t001_sekolah_Nama">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t001_sekolah_list->Nama->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t001_sekolah_list->Nama->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t001_sekolah_list->Nama->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t001_sekolah_list->Alamat->Visible) { // Alamat ?>
	<?php if ($t001_sekolah_list->SortUrl($t001_sekolah_list->Alamat) == "") { ?>
		<th data-name="Alamat" class="<?php echo $t001_sekolah_list->Alamat->headerCellClass() ?>"><div id="elh_t001_sekolah_Alamat" class="t001_sekolah_Alamat"><div class="ew-table-header-caption"><?php echo $t001_sekolah_list->Alamat->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Alamat" class="<?php echo $t001_sekolah_list->Alamat->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t001_sekolah_list->SortUrl($t001_sekolah_list->Alamat) ?>', 1);"><div id="elh_t001_sekolah_Alamat" class="t001_sekolah_Alamat">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t001_sekolah_list->Alamat->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t001_sekolah_list->Alamat->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t001_sekolah_list->Alamat->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t001_sekolah_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t001_sekolah_list->ExportAll && $t001_sekolah_list->isExport()) {
	$t001_sekolah_list->StopRecord = $t001_sekolah_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t001_sekolah_list->TotalRecords > $t001_sekolah_list->StartRecord + $t001_sekolah_list->DisplayRecords - 1)
		$t001_sekolah_list->StopRecord = $t001_sekolah_list->StartRecord + $t001_sekolah_list->DisplayRecords - 1;
	else
		$t001_sekolah_list->StopRecord = $t001_sekolah_list->TotalRecords;
}
$t001_sekolah_list->RecordCount = $t001_sekolah_list->StartRecord - 1;
if ($t001_sekolah_list->Recordset && !$t001_sekolah_list->Recordset->EOF) {
	$t001_sekolah_list->Recordset->moveFirst();
	$selectLimit = $t001_sekolah_list->UseSelectLimit;
	if (!$selectLimit && $t001_sekolah_list->StartRecord > 1)
		$t001_sekolah_list->Recordset->move($t001_sekolah_list->StartRecord - 1);
} elseif (!$t001_sekolah->AllowAddDeleteRow && $t001_sekolah_list->StopRecord == 0) {
	$t001_sekolah_list->StopRecord = $t001_sekolah->GridAddRowCount;
}

// Initialize aggregate
$t001_sekolah->RowType = ROWTYPE_AGGREGATEINIT;
$t001_sekolah->resetAttributes();
$t001_sekolah_list->renderRow();
while ($t001_sekolah_list->RecordCount < $t001_sekolah_list->StopRecord) {
	$t001_sekolah_list->RecordCount++;
	if ($t001_sekolah_list->RecordCount >= $t001_sekolah_list->StartRecord) {
		$t001_sekolah_list->RowCount++;

		// Set up key count
		$t001_sekolah_list->KeyCount = $t001_sekolah_list->RowIndex;

		// Init row class and style
		$t001_sekolah->resetAttributes();
		$t001_sekolah->CssClass = "";
		if ($t001_sekolah_list->isGridAdd()) {
		} else {
			$t001_sekolah_list->loadRowValues($t001_sekolah_list->Recordset); // Load row values
		}
		$t001_sekolah->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t001_sekolah->RowAttrs->merge(["data-rowindex" => $t001_sekolah_list->RowCount, "id" => "r" . $t001_sekolah_list->RowCount . "_t001_sekolah", "data-rowtype" => $t001_sekolah->RowType]);

		// Render row
		$t001_sekolah_list->renderRow();

		// Render list options
		$t001_sekolah_list->renderListOptions();
?>
	<tr <?php echo $t001_sekolah->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t001_sekolah_list->ListOptions->render("body", "left", $t001_sekolah_list->RowCount);
?>
	<?php if ($t001_sekolah_list->Nama->Visible) { // Nama ?>
		<td data-name="Nama" <?php echo $t001_sekolah_list->Nama->cellAttributes() ?>>
<span id="el<?php echo $t001_sekolah_list->RowCount ?>_t001_sekolah_Nama">
<span<?php echo $t001_sekolah_list->Nama->viewAttributes() ?>><?php echo $t001_sekolah_list->Nama->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t001_sekolah_list->Alamat->Visible) { // Alamat ?>
		<td data-name="Alamat" <?php echo $t001_sekolah_list->Alamat->cellAttributes() ?>>
<span id="el<?php echo $t001_sekolah_list->RowCount ?>_t001_sekolah_Alamat">
<span<?php echo $t001_sekolah_list->Alamat->viewAttributes() ?>><?php echo $t001_sekolah_list->Alamat->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t001_sekolah_list->ListOptions->render("body", "right", $t001_sekolah_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$t001_sekolah_list->isGridAdd())
		$t001_sekolah_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$t001_sekolah->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t001_sekolah_list->Recordset)
	$t001_sekolah_list->Recordset->Close();
?>
<?php if (!$t001_sekolah_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t001_sekolah_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t001_sekolah_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t001_sekolah_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t001_sekolah_list->TotalRecords == 0 && !$t001_sekolah->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t001_sekolah_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t001_sekolah_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t001_sekolah_list->isExport()) { ?>
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
$t001_sekolah_list->terminate();
?>