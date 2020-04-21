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
$t003_kelas_list = new t003_kelas_list();

// Run the page
$t003_kelas_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t003_kelas_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t003_kelas_list->isExport()) { ?>
<script>
var ft003_kelaslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft003_kelaslist = currentForm = new ew.Form("ft003_kelaslist", "list");
	ft003_kelaslist.formKeyCountName = '<?php echo $t003_kelas_list->FormKeyCountName ?>';
	loadjs.done("ft003_kelaslist");
});
var ft003_kelaslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ft003_kelaslistsrch = currentSearchForm = new ew.Form("ft003_kelaslistsrch");

	// Dynamic selection lists
	// Filters

	ft003_kelaslistsrch.filterList = <?php echo $t003_kelas_list->getFilterList() ?>;
	loadjs.done("ft003_kelaslistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t003_kelas_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t003_kelas_list->TotalRecords > 0 && $t003_kelas_list->ExportOptions->visible()) { ?>
<?php $t003_kelas_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t003_kelas_list->ImportOptions->visible()) { ?>
<?php $t003_kelas_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t003_kelas_list->SearchOptions->visible()) { ?>
<?php $t003_kelas_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t003_kelas_list->FilterOptions->visible()) { ?>
<?php $t003_kelas_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t003_kelas_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$t003_kelas_list->isExport() && !$t003_kelas->CurrentAction) { ?>
<form name="ft003_kelaslistsrch" id="ft003_kelaslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="ft003_kelaslistsrch-search-panel" class="<?php echo $t003_kelas_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t003_kelas">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $t003_kelas_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($t003_kelas_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($t003_kelas_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $t003_kelas_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($t003_kelas_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($t003_kelas_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($t003_kelas_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($t003_kelas_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $t003_kelas_list->showPageHeader(); ?>
<?php
$t003_kelas_list->showMessage();
?>
<?php if ($t003_kelas_list->TotalRecords > 0 || $t003_kelas->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t003_kelas_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t003_kelas">
<form name="ft003_kelaslist" id="ft003_kelaslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t003_kelas">
<div id="gmp_t003_kelas" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t003_kelas_list->TotalRecords > 0 || $t003_kelas_list->isGridEdit()) { ?>
<table id="tbl_t003_kelaslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t003_kelas->RowType = ROWTYPE_HEADER;

// Render list options
$t003_kelas_list->renderListOptions();

// Render list options (header, left)
$t003_kelas_list->ListOptions->render("header", "left");
?>
<?php if ($t003_kelas_list->Kelas->Visible) { // Kelas ?>
	<?php if ($t003_kelas_list->SortUrl($t003_kelas_list->Kelas) == "") { ?>
		<th data-name="Kelas" class="<?php echo $t003_kelas_list->Kelas->headerCellClass() ?>"><div id="elh_t003_kelas_Kelas" class="t003_kelas_Kelas"><div class="ew-table-header-caption"><?php echo $t003_kelas_list->Kelas->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Kelas" class="<?php echo $t003_kelas_list->Kelas->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t003_kelas_list->SortUrl($t003_kelas_list->Kelas) ?>', 1);"><div id="elh_t003_kelas_Kelas" class="t003_kelas_Kelas">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t003_kelas_list->Kelas->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t003_kelas_list->Kelas->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t003_kelas_list->Kelas->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t003_kelas_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t003_kelas_list->ExportAll && $t003_kelas_list->isExport()) {
	$t003_kelas_list->StopRecord = $t003_kelas_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t003_kelas_list->TotalRecords > $t003_kelas_list->StartRecord + $t003_kelas_list->DisplayRecords - 1)
		$t003_kelas_list->StopRecord = $t003_kelas_list->StartRecord + $t003_kelas_list->DisplayRecords - 1;
	else
		$t003_kelas_list->StopRecord = $t003_kelas_list->TotalRecords;
}
$t003_kelas_list->RecordCount = $t003_kelas_list->StartRecord - 1;
if ($t003_kelas_list->Recordset && !$t003_kelas_list->Recordset->EOF) {
	$t003_kelas_list->Recordset->moveFirst();
	$selectLimit = $t003_kelas_list->UseSelectLimit;
	if (!$selectLimit && $t003_kelas_list->StartRecord > 1)
		$t003_kelas_list->Recordset->move($t003_kelas_list->StartRecord - 1);
} elseif (!$t003_kelas->AllowAddDeleteRow && $t003_kelas_list->StopRecord == 0) {
	$t003_kelas_list->StopRecord = $t003_kelas->GridAddRowCount;
}

// Initialize aggregate
$t003_kelas->RowType = ROWTYPE_AGGREGATEINIT;
$t003_kelas->resetAttributes();
$t003_kelas_list->renderRow();
while ($t003_kelas_list->RecordCount < $t003_kelas_list->StopRecord) {
	$t003_kelas_list->RecordCount++;
	if ($t003_kelas_list->RecordCount >= $t003_kelas_list->StartRecord) {
		$t003_kelas_list->RowCount++;

		// Set up key count
		$t003_kelas_list->KeyCount = $t003_kelas_list->RowIndex;

		// Init row class and style
		$t003_kelas->resetAttributes();
		$t003_kelas->CssClass = "";
		if ($t003_kelas_list->isGridAdd()) {
		} else {
			$t003_kelas_list->loadRowValues($t003_kelas_list->Recordset); // Load row values
		}
		$t003_kelas->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t003_kelas->RowAttrs->merge(["data-rowindex" => $t003_kelas_list->RowCount, "id" => "r" . $t003_kelas_list->RowCount . "_t003_kelas", "data-rowtype" => $t003_kelas->RowType]);

		// Render row
		$t003_kelas_list->renderRow();

		// Render list options
		$t003_kelas_list->renderListOptions();
?>
	<tr <?php echo $t003_kelas->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t003_kelas_list->ListOptions->render("body", "left", $t003_kelas_list->RowCount);
?>
	<?php if ($t003_kelas_list->Kelas->Visible) { // Kelas ?>
		<td data-name="Kelas" <?php echo $t003_kelas_list->Kelas->cellAttributes() ?>>
<span id="el<?php echo $t003_kelas_list->RowCount ?>_t003_kelas_Kelas">
<span<?php echo $t003_kelas_list->Kelas->viewAttributes() ?>><?php echo $t003_kelas_list->Kelas->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t003_kelas_list->ListOptions->render("body", "right", $t003_kelas_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$t003_kelas_list->isGridAdd())
		$t003_kelas_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$t003_kelas->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t003_kelas_list->Recordset)
	$t003_kelas_list->Recordset->Close();
?>
<?php if (!$t003_kelas_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t003_kelas_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t003_kelas_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t003_kelas_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t003_kelas_list->TotalRecords == 0 && !$t003_kelas->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t003_kelas_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t003_kelas_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t003_kelas_list->isExport()) { ?>
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
$t003_kelas_list->terminate();
?>