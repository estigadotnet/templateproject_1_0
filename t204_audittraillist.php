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
$t204_audittrail_list = new t204_audittrail_list();

// Run the page
$t204_audittrail_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t204_audittrail_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t204_audittrail_list->isExport()) { ?>
<script>
var ft204_audittraillist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft204_audittraillist = currentForm = new ew.Form("ft204_audittraillist", "list");
	ft204_audittraillist.formKeyCountName = '<?php echo $t204_audittrail_list->FormKeyCountName ?>';
	loadjs.done("ft204_audittraillist");
});
var ft204_audittraillistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ft204_audittraillistsrch = currentSearchForm = new ew.Form("ft204_audittraillistsrch");

	// Dynamic selection lists
	// Filters

	ft204_audittraillistsrch.filterList = <?php echo $t204_audittrail_list->getFilterList() ?>;
	loadjs.done("ft204_audittraillistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t204_audittrail_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t204_audittrail_list->TotalRecords > 0 && $t204_audittrail_list->ExportOptions->visible()) { ?>
<?php $t204_audittrail_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t204_audittrail_list->ImportOptions->visible()) { ?>
<?php $t204_audittrail_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t204_audittrail_list->SearchOptions->visible()) { ?>
<?php $t204_audittrail_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t204_audittrail_list->FilterOptions->visible()) { ?>
<?php $t204_audittrail_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t204_audittrail_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$t204_audittrail_list->isExport() && !$t204_audittrail->CurrentAction) { ?>
<form name="ft204_audittraillistsrch" id="ft204_audittraillistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="ft204_audittraillistsrch-search-panel" class="<?php echo $t204_audittrail_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t204_audittrail">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $t204_audittrail_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($t204_audittrail_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($t204_audittrail_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $t204_audittrail_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($t204_audittrail_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($t204_audittrail_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($t204_audittrail_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($t204_audittrail_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $t204_audittrail_list->showPageHeader(); ?>
<?php
$t204_audittrail_list->showMessage();
?>
<?php if ($t204_audittrail_list->TotalRecords > 0 || $t204_audittrail->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t204_audittrail_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t204_audittrail">
<form name="ft204_audittraillist" id="ft204_audittraillist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t204_audittrail">
<div id="gmp_t204_audittrail" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t204_audittrail_list->TotalRecords > 0 || $t204_audittrail_list->isGridEdit()) { ?>
<table id="tbl_t204_audittraillist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t204_audittrail->RowType = ROWTYPE_HEADER;

// Render list options
$t204_audittrail_list->renderListOptions();

// Render list options (header, left)
$t204_audittrail_list->ListOptions->render("header", "left");
?>
<?php if ($t204_audittrail_list->id->Visible) { // id ?>
	<?php if ($t204_audittrail_list->SortUrl($t204_audittrail_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $t204_audittrail_list->id->headerCellClass() ?>"><div id="elh_t204_audittrail_id" class="t204_audittrail_id"><div class="ew-table-header-caption"><?php echo $t204_audittrail_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $t204_audittrail_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t204_audittrail_list->SortUrl($t204_audittrail_list->id) ?>', 1);"><div id="elh_t204_audittrail_id" class="t204_audittrail_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t204_audittrail_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t204_audittrail_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t204_audittrail_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t204_audittrail_list->datetime->Visible) { // datetime ?>
	<?php if ($t204_audittrail_list->SortUrl($t204_audittrail_list->datetime) == "") { ?>
		<th data-name="datetime" class="<?php echo $t204_audittrail_list->datetime->headerCellClass() ?>"><div id="elh_t204_audittrail_datetime" class="t204_audittrail_datetime"><div class="ew-table-header-caption"><?php echo $t204_audittrail_list->datetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="datetime" class="<?php echo $t204_audittrail_list->datetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t204_audittrail_list->SortUrl($t204_audittrail_list->datetime) ?>', 1);"><div id="elh_t204_audittrail_datetime" class="t204_audittrail_datetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t204_audittrail_list->datetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($t204_audittrail_list->datetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t204_audittrail_list->datetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t204_audittrail_list->script->Visible) { // script ?>
	<?php if ($t204_audittrail_list->SortUrl($t204_audittrail_list->script) == "") { ?>
		<th data-name="script" class="<?php echo $t204_audittrail_list->script->headerCellClass() ?>"><div id="elh_t204_audittrail_script" class="t204_audittrail_script"><div class="ew-table-header-caption"><?php echo $t204_audittrail_list->script->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="script" class="<?php echo $t204_audittrail_list->script->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t204_audittrail_list->SortUrl($t204_audittrail_list->script) ?>', 1);"><div id="elh_t204_audittrail_script" class="t204_audittrail_script">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t204_audittrail_list->script->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t204_audittrail_list->script->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t204_audittrail_list->script->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t204_audittrail_list->user->Visible) { // user ?>
	<?php if ($t204_audittrail_list->SortUrl($t204_audittrail_list->user) == "") { ?>
		<th data-name="user" class="<?php echo $t204_audittrail_list->user->headerCellClass() ?>"><div id="elh_t204_audittrail_user" class="t204_audittrail_user"><div class="ew-table-header-caption"><?php echo $t204_audittrail_list->user->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="user" class="<?php echo $t204_audittrail_list->user->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t204_audittrail_list->SortUrl($t204_audittrail_list->user) ?>', 1);"><div id="elh_t204_audittrail_user" class="t204_audittrail_user">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t204_audittrail_list->user->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t204_audittrail_list->user->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t204_audittrail_list->user->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t204_audittrail_list->_action->Visible) { // action ?>
	<?php if ($t204_audittrail_list->SortUrl($t204_audittrail_list->_action) == "") { ?>
		<th data-name="_action" class="<?php echo $t204_audittrail_list->_action->headerCellClass() ?>"><div id="elh_t204_audittrail__action" class="t204_audittrail__action"><div class="ew-table-header-caption"><?php echo $t204_audittrail_list->_action->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_action" class="<?php echo $t204_audittrail_list->_action->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t204_audittrail_list->SortUrl($t204_audittrail_list->_action) ?>', 1);"><div id="elh_t204_audittrail__action" class="t204_audittrail__action">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t204_audittrail_list->_action->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t204_audittrail_list->_action->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t204_audittrail_list->_action->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t204_audittrail_list->_table->Visible) { // table ?>
	<?php if ($t204_audittrail_list->SortUrl($t204_audittrail_list->_table) == "") { ?>
		<th data-name="_table" class="<?php echo $t204_audittrail_list->_table->headerCellClass() ?>"><div id="elh_t204_audittrail__table" class="t204_audittrail__table"><div class="ew-table-header-caption"><?php echo $t204_audittrail_list->_table->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_table" class="<?php echo $t204_audittrail_list->_table->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t204_audittrail_list->SortUrl($t204_audittrail_list->_table) ?>', 1);"><div id="elh_t204_audittrail__table" class="t204_audittrail__table">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t204_audittrail_list->_table->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t204_audittrail_list->_table->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t204_audittrail_list->_table->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t204_audittrail_list->field->Visible) { // field ?>
	<?php if ($t204_audittrail_list->SortUrl($t204_audittrail_list->field) == "") { ?>
		<th data-name="field" class="<?php echo $t204_audittrail_list->field->headerCellClass() ?>"><div id="elh_t204_audittrail_field" class="t204_audittrail_field"><div class="ew-table-header-caption"><?php echo $t204_audittrail_list->field->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="field" class="<?php echo $t204_audittrail_list->field->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t204_audittrail_list->SortUrl($t204_audittrail_list->field) ?>', 1);"><div id="elh_t204_audittrail_field" class="t204_audittrail_field">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t204_audittrail_list->field->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t204_audittrail_list->field->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t204_audittrail_list->field->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t204_audittrail_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t204_audittrail_list->ExportAll && $t204_audittrail_list->isExport()) {
	$t204_audittrail_list->StopRecord = $t204_audittrail_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t204_audittrail_list->TotalRecords > $t204_audittrail_list->StartRecord + $t204_audittrail_list->DisplayRecords - 1)
		$t204_audittrail_list->StopRecord = $t204_audittrail_list->StartRecord + $t204_audittrail_list->DisplayRecords - 1;
	else
		$t204_audittrail_list->StopRecord = $t204_audittrail_list->TotalRecords;
}
$t204_audittrail_list->RecordCount = $t204_audittrail_list->StartRecord - 1;
if ($t204_audittrail_list->Recordset && !$t204_audittrail_list->Recordset->EOF) {
	$t204_audittrail_list->Recordset->moveFirst();
	$selectLimit = $t204_audittrail_list->UseSelectLimit;
	if (!$selectLimit && $t204_audittrail_list->StartRecord > 1)
		$t204_audittrail_list->Recordset->move($t204_audittrail_list->StartRecord - 1);
} elseif (!$t204_audittrail->AllowAddDeleteRow && $t204_audittrail_list->StopRecord == 0) {
	$t204_audittrail_list->StopRecord = $t204_audittrail->GridAddRowCount;
}

// Initialize aggregate
$t204_audittrail->RowType = ROWTYPE_AGGREGATEINIT;
$t204_audittrail->resetAttributes();
$t204_audittrail_list->renderRow();
while ($t204_audittrail_list->RecordCount < $t204_audittrail_list->StopRecord) {
	$t204_audittrail_list->RecordCount++;
	if ($t204_audittrail_list->RecordCount >= $t204_audittrail_list->StartRecord) {
		$t204_audittrail_list->RowCount++;

		// Set up key count
		$t204_audittrail_list->KeyCount = $t204_audittrail_list->RowIndex;

		// Init row class and style
		$t204_audittrail->resetAttributes();
		$t204_audittrail->CssClass = "";
		if ($t204_audittrail_list->isGridAdd()) {
		} else {
			$t204_audittrail_list->loadRowValues($t204_audittrail_list->Recordset); // Load row values
		}
		$t204_audittrail->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t204_audittrail->RowAttrs->merge(["data-rowindex" => $t204_audittrail_list->RowCount, "id" => "r" . $t204_audittrail_list->RowCount . "_t204_audittrail", "data-rowtype" => $t204_audittrail->RowType]);

		// Render row
		$t204_audittrail_list->renderRow();

		// Render list options
		$t204_audittrail_list->renderListOptions();
?>
	<tr <?php echo $t204_audittrail->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t204_audittrail_list->ListOptions->render("body", "left", $t204_audittrail_list->RowCount);
?>
	<?php if ($t204_audittrail_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $t204_audittrail_list->id->cellAttributes() ?>>
<span id="el<?php echo $t204_audittrail_list->RowCount ?>_t204_audittrail_id">
<span<?php echo $t204_audittrail_list->id->viewAttributes() ?>><?php echo $t204_audittrail_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t204_audittrail_list->datetime->Visible) { // datetime ?>
		<td data-name="datetime" <?php echo $t204_audittrail_list->datetime->cellAttributes() ?>>
<span id="el<?php echo $t204_audittrail_list->RowCount ?>_t204_audittrail_datetime">
<span<?php echo $t204_audittrail_list->datetime->viewAttributes() ?>><?php echo $t204_audittrail_list->datetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t204_audittrail_list->script->Visible) { // script ?>
		<td data-name="script" <?php echo $t204_audittrail_list->script->cellAttributes() ?>>
<span id="el<?php echo $t204_audittrail_list->RowCount ?>_t204_audittrail_script">
<span<?php echo $t204_audittrail_list->script->viewAttributes() ?>><?php echo $t204_audittrail_list->script->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t204_audittrail_list->user->Visible) { // user ?>
		<td data-name="user" <?php echo $t204_audittrail_list->user->cellAttributes() ?>>
<span id="el<?php echo $t204_audittrail_list->RowCount ?>_t204_audittrail_user">
<span<?php echo $t204_audittrail_list->user->viewAttributes() ?>><?php echo $t204_audittrail_list->user->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t204_audittrail_list->_action->Visible) { // action ?>
		<td data-name="_action" <?php echo $t204_audittrail_list->_action->cellAttributes() ?>>
<span id="el<?php echo $t204_audittrail_list->RowCount ?>_t204_audittrail__action">
<span<?php echo $t204_audittrail_list->_action->viewAttributes() ?>><?php echo $t204_audittrail_list->_action->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t204_audittrail_list->_table->Visible) { // table ?>
		<td data-name="_table" <?php echo $t204_audittrail_list->_table->cellAttributes() ?>>
<span id="el<?php echo $t204_audittrail_list->RowCount ?>_t204_audittrail__table">
<span<?php echo $t204_audittrail_list->_table->viewAttributes() ?>><?php echo $t204_audittrail_list->_table->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t204_audittrail_list->field->Visible) { // field ?>
		<td data-name="field" <?php echo $t204_audittrail_list->field->cellAttributes() ?>>
<span id="el<?php echo $t204_audittrail_list->RowCount ?>_t204_audittrail_field">
<span<?php echo $t204_audittrail_list->field->viewAttributes() ?>><?php echo $t204_audittrail_list->field->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t204_audittrail_list->ListOptions->render("body", "right", $t204_audittrail_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$t204_audittrail_list->isGridAdd())
		$t204_audittrail_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$t204_audittrail->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t204_audittrail_list->Recordset)
	$t204_audittrail_list->Recordset->Close();
?>
<?php if (!$t204_audittrail_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t204_audittrail_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t204_audittrail_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t204_audittrail_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t204_audittrail_list->TotalRecords == 0 && !$t204_audittrail->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t204_audittrail_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t204_audittrail_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t204_audittrail_list->isExport()) { ?>
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
$t204_audittrail_list->terminate();
?>