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
<?php if ($t201_users_list->sekolah_id->Visible) { // sekolah_id ?>
	<?php if ($t201_users_list->SortUrl($t201_users_list->sekolah_id) == "") { ?>
		<th data-name="sekolah_id" class="<?php echo $t201_users_list->sekolah_id->headerCellClass() ?>"><div id="elh_t201_users_sekolah_id" class="t201_users_sekolah_id"><div class="ew-table-header-caption"><?php echo $t201_users_list->sekolah_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sekolah_id" class="<?php echo $t201_users_list->sekolah_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t201_users_list->SortUrl($t201_users_list->sekolah_id) ?>', 1);"><div id="elh_t201_users_sekolah_id" class="t201_users_sekolah_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t201_users_list->sekolah_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t201_users_list->sekolah_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t201_users_list->sekolah_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t201_users_list->tahunajaran_id->Visible) { // tahunajaran_id ?>
	<?php if ($t201_users_list->SortUrl($t201_users_list->tahunajaran_id) == "") { ?>
		<th data-name="tahunajaran_id" class="<?php echo $t201_users_list->tahunajaran_id->headerCellClass() ?>"><div id="elh_t201_users_tahunajaran_id" class="t201_users_tahunajaran_id"><div class="ew-table-header-caption"><?php echo $t201_users_list->tahunajaran_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tahunajaran_id" class="<?php echo $t201_users_list->tahunajaran_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t201_users_list->SortUrl($t201_users_list->tahunajaran_id) ?>', 1);"><div id="elh_t201_users_tahunajaran_id" class="t201_users_tahunajaran_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t201_users_list->tahunajaran_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t201_users_list->tahunajaran_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t201_users_list->tahunajaran_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t201_users_list->kelas_id->Visible) { // kelas_id ?>
	<?php if ($t201_users_list->SortUrl($t201_users_list->kelas_id) == "") { ?>
		<th data-name="kelas_id" class="<?php echo $t201_users_list->kelas_id->headerCellClass() ?>"><div id="elh_t201_users_kelas_id" class="t201_users_kelas_id"><div class="ew-table-header-caption"><?php echo $t201_users_list->kelas_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="kelas_id" class="<?php echo $t201_users_list->kelas_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t201_users_list->SortUrl($t201_users_list->kelas_id) ?>', 1);"><div id="elh_t201_users_kelas_id" class="t201_users_kelas_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t201_users_list->kelas_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t201_users_list->kelas_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t201_users_list->kelas_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t201_users_list->semester_id->Visible) { // semester_id ?>
	<?php if ($t201_users_list->SortUrl($t201_users_list->semester_id) == "") { ?>
		<th data-name="semester_id" class="<?php echo $t201_users_list->semester_id->headerCellClass() ?>"><div id="elh_t201_users_semester_id" class="t201_users_semester_id"><div class="ew-table-header-caption"><?php echo $t201_users_list->semester_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="semester_id" class="<?php echo $t201_users_list->semester_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t201_users_list->SortUrl($t201_users_list->semester_id) ?>', 1);"><div id="elh_t201_users_semester_id" class="t201_users_semester_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t201_users_list->semester_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t201_users_list->semester_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t201_users_list->semester_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
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
	<?php if ($t201_users_list->sekolah_id->Visible) { // sekolah_id ?>
		<td data-name="sekolah_id" <?php echo $t201_users_list->sekolah_id->cellAttributes() ?>>
<span id="el<?php echo $t201_users_list->RowCount ?>_t201_users_sekolah_id">
<span<?php echo $t201_users_list->sekolah_id->viewAttributes() ?>><?php echo $t201_users_list->sekolah_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t201_users_list->tahunajaran_id->Visible) { // tahunajaran_id ?>
		<td data-name="tahunajaran_id" <?php echo $t201_users_list->tahunajaran_id->cellAttributes() ?>>
<span id="el<?php echo $t201_users_list->RowCount ?>_t201_users_tahunajaran_id">
<span<?php echo $t201_users_list->tahunajaran_id->viewAttributes() ?>><?php echo $t201_users_list->tahunajaran_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t201_users_list->kelas_id->Visible) { // kelas_id ?>
		<td data-name="kelas_id" <?php echo $t201_users_list->kelas_id->cellAttributes() ?>>
<span id="el<?php echo $t201_users_list->RowCount ?>_t201_users_kelas_id">
<span<?php echo $t201_users_list->kelas_id->viewAttributes() ?>><?php echo $t201_users_list->kelas_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t201_users_list->semester_id->Visible) { // semester_id ?>
		<td data-name="semester_id" <?php echo $t201_users_list->semester_id->cellAttributes() ?>>
<span id="el<?php echo $t201_users_list->RowCount ?>_t201_users_semester_id">
<span<?php echo $t201_users_list->semester_id->viewAttributes() ?>><?php echo $t201_users_list->semester_id->getViewValue() ?></span>
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