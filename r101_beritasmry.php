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
$r101_berita_summary = new r101_berita_summary();

// Run the page
$r101_berita_summary->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$r101_berita_summary->Page_Render();
?>
<?php if (!$DashboardReport) { ?>
<?php include_once "header.php"; ?>
<?php } ?>
<?php if (!$r101_berita_summary->isExport() && !$r101_berita_summary->DrillDown && !$DashboardReport) { ?>
<script>
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<a id="top"></a>
<?php if ((!$r101_berita_summary->isExport() || $r101_berita_summary->isExport("print")) && !$DashboardReport) { ?>
<!-- Content Container -->
<div id="ew-report" class="ew-report container-fluid">
<?php } ?>
<div class="btn-toolbar ew-toolbar">
<?php
if (!$r101_berita_summary->DrillDownInPanel) {
	$r101_berita_summary->ExportOptions->render("body");
	$r101_berita_summary->SearchOptions->render("body");
	$r101_berita_summary->FilterOptions->render("body");
}
?>
</div>
<?php $r101_berita_summary->showPageHeader(); ?>
<?php
$r101_berita_summary->showMessage();
?>
<?php if ((!$r101_berita_summary->isExport() || $r101_berita_summary->isExport("print")) && !$DashboardReport) { ?>
<div class="row">
<?php } ?>
<?php if ((!$r101_berita_summary->isExport() || $r101_berita_summary->isExport("print")) && !$DashboardReport) { ?>
<!-- Center Container -->
<div id="ew-center" class="<?php echo $r101_berita_summary->CenterContentClass ?>">
<?php } ?>
<!-- Summary report (begin) -->
<div id="report_summary">
<?php if (!$r101_berita_summary->isExport() && !$r101_berita_summary->DrillDown && !$DashboardReport) { ?>
<?php } ?>
<?php
while ($r101_berita_summary->GroupCount <= count($r101_berita_summary->GroupRecords) && $r101_berita_summary->GroupCount <= $r101_berita_summary->DisplayGroups) {
?>
<?php

	// Show header
	if ($r101_berita_summary->ShowHeader) {
?>
<?php if ($r101_berita_summary->GroupCount > 1) { ?>
</tbody>
</table>
</div>
<!-- /.ew-grid-middle-panel -->
<!-- Report grid (end) -->
<?php if (!$r101_berita_summary->isExport() && !($r101_berita_summary->DrillDown && $r101_berita_summary->TotalGroups > 0)) { ?>
<!-- Bottom pager -->
<div class="card-footer ew-grid-lower-panel">
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $r101_berita_summary->Pager->render() ?>
</form>
<div class="clearfix"></div>
</div>
<?php } ?>
</div>
<!-- /.ew-grid -->
<?php echo $r101_berita_summary->PageBreakContent ?>
<?php } ?>
<div class="<?php if (!$r101_berita_summary->isExport("word") && !$r101_berita_summary->isExport("excel")) { ?>card ew-card <?php } ?>ew-grid"<?php echo $r101_berita_summary->ReportTableStyle ?>>
<!-- Report grid (begin) -->
<div id="gmp_r101_berita" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="<?php echo $r101_berita_summary->ReportTableClass ?>">
<thead>
	<!-- Table header -->
	<tr class="ew-table-header">
<?php if ($r101_berita_summary->Tanggal->Visible) { ?>
	<?php if ($r101_berita_summary->Tanggal->ShowGroupHeaderAsRow) { ?>
	<th data-name="Tanggal">&nbsp;</th>
	<?php } else { ?>
		<?php if ($r101_berita_summary->sortUrl($r101_berita_summary->Tanggal) == "") { ?>
	<th data-name="Tanggal" class="<?php echo $r101_berita_summary->Tanggal->headerCellClass() ?>"><div class="r101_berita_Tanggal"><div class="ew-table-header-caption"><?php echo $r101_berita_summary->Tanggal->caption() ?></div></div></th>
		<?php } else { ?>
	<th data-name="Tanggal" class="<?php echo $r101_berita_summary->Tanggal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r101_berita_summary->sortUrl($r101_berita_summary->Tanggal) ?>', 1);"><div class="r101_berita_Tanggal">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r101_berita_summary->Tanggal->caption() ?></span><span class="ew-table-header-sort"><?php if ($r101_berita_summary->Tanggal->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r101_berita_summary->Tanggal->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
		<?php } ?>
	<?php } ?>
<?php } ?>
<?php if ($r101_berita_summary->Berita->Visible) { ?>
	<?php if ($r101_berita_summary->sortUrl($r101_berita_summary->Berita) == "") { ?>
	<th data-name="Berita" class="<?php echo $r101_berita_summary->Berita->headerCellClass() ?>"><div class="r101_berita_Berita"><div class="ew-table-header-caption"><?php echo $r101_berita_summary->Berita->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="Berita" class="<?php echo $r101_berita_summary->Berita->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r101_berita_summary->sortUrl($r101_berita_summary->Berita) ?>', 1);"><div class="r101_berita_Berita">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r101_berita_summary->Berita->caption() ?></span><span class="ew-table-header-sort"><?php if ($r101_berita_summary->Berita->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r101_berita_summary->Berita->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
	</tr>
</thead>
<tbody>
<?php
		if ($r101_berita_summary->TotalGroups == 0)
			break; // Show header only
		$r101_berita_summary->ShowHeader = FALSE;
	} // End show header
?>
<?php

	// Build detail SQL
	$where = DetailFilterSql($r101_berita_summary->Tanggal, $r101_berita_summary->getSqlFirstGroupField(), $r101_berita_summary->Tanggal->groupValue(), $r101_berita_summary->Dbid);
	if ($r101_berita_summary->PageFirstGroupFilter != "") $r101_berita_summary->PageFirstGroupFilter .= " OR ";
	$r101_berita_summary->PageFirstGroupFilter .= $where;
	if ($r101_berita_summary->Filter != "")
		$where = "($r101_berita_summary->Filter) AND ($where)";
	$sql = BuildReportSql($r101_berita_summary->getSqlSelect(), $r101_berita_summary->getSqlWhere(), $r101_berita_summary->getSqlGroupBy(), $r101_berita_summary->getSqlHaving(), $r101_berita_summary->getSqlOrderBy(), $where, $r101_berita_summary->Sort);
	$rs = $r101_berita_summary->getRecordset($sql);
	$r101_berita_summary->DetailRecords = $rs ? $rs->getRows() : [];
	$r101_berita_summary->DetailRecordCount = count($r101_berita_summary->DetailRecords);
	$r101_berita_summary->setGroupCount($r101_berita_summary->DetailRecordCount, $r101_berita_summary->GroupCount);

	// Load detail records
	$r101_berita_summary->Tanggal->Records = &$r101_berita_summary->DetailRecords;
	$r101_berita_summary->Tanggal->LevelBreak = TRUE; // Set field level break
		$r101_berita_summary->GroupCounter[1] = $r101_berita_summary->GroupCount;
		$r101_berita_summary->Tanggal->getCnt($r101_berita_summary->Tanggal->Records); // Get record count
		$r101_berita_summary->setGroupCount($r101_berita_summary->Tanggal->Count, $r101_berita_summary->GroupCounter[1]);
?>
<?php if ($r101_berita_summary->Tanggal->Visible && $r101_berita_summary->Tanggal->ShowGroupHeaderAsRow) { ?>
<?php

		// Render header row
		$r101_berita_summary->resetAttributes();
		$r101_berita_summary->RowType = ROWTYPE_TOTAL;
		$r101_berita_summary->RowTotalType = ROWTOTAL_GROUP;
		$r101_berita_summary->RowTotalSubType = ROWTOTAL_HEADER;
		$r101_berita_summary->RowGroupLevel = 1;
		$r101_berita_summary->renderRow();
?>
	<tr<?php echo $r101_berita_summary->rowAttributes(); ?>>
<?php if ($r101_berita_summary->Tanggal->Visible) { ?>
		<td data-field="Tanggal"<?php echo $r101_berita_summary->Tanggal->cellAttributes(); ?>><span class="ew-group-toggle icon-collapse"></span></td>
<?php } ?>
		<td data-field="Tanggal" colspan="<?php echo ($Page->GroupColumnCount + $Page->DetailColumnCount - 1) ?>"<?php echo $r101_berita_summary->Tanggal->cellAttributes() ?>>
<?php if ($r101_berita_summary->sortUrl($r101_berita_summary->Tanggal) == "") { ?>
		<span class="ew-summary-caption r101_berita_Tanggal"><span class="ew-table-header-caption"><?php echo $r101_berita_summary->Tanggal->caption() ?></span></span>
<?php } else { ?>
		<span class="ew-table-header-btn ew-pointer ew-summary-caption r101_berita_Tanggal" onclick="ew.sort(event, '<?php echo $r101_berita_summary->sortUrl($r101_berita_summary->Tanggal) ?>', 1);">
			<span class="ew-table-header-caption"><?php echo $r101_berita_summary->Tanggal->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($r101_berita_summary->Tanggal->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r101_berita_summary->Tanggal->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span>
		</span>
<?php } ?>
		<?php echo $Language->phrase("SummaryColon") ?><span<?php echo $r101_berita_summary->Tanggal->viewAttributes() ?>><?php echo $r101_berita_summary->Tanggal->GroupViewValue ?></span>
		<span class="ew-summary-count">(<span class="ew-aggregate-caption"><?php echo $Language->phrase("RptCnt") ?></span><?php echo $Language->phrase("AggregateEqual") ?><span class="ew-aggregate-value"><?php echo FormatNumber($r101_berita_summary->Tanggal->Count, 0); ?></span>)</span>
		</td>
	</tr>
<?php } ?>
<?php
	$r101_berita_summary->RecordCount = 0; // Reset record count
	foreach ($r101_berita_summary->Tanggal->Records as $record) {
		$r101_berita_summary->RecordCount++;
		$r101_berita_summary->RecordIndex++;
		$r101_berita_summary->loadRowValues($record);
?>
<?php

		// Render detail row
		$r101_berita_summary->resetAttributes();
		$r101_berita_summary->RowType = ROWTYPE_DETAIL;
		$r101_berita_summary->renderRow();
?>
	<tr<?php echo $r101_berita_summary->rowAttributes(); ?>>
<?php if ($r101_berita_summary->Tanggal->Visible) { ?>
	<?php if ($r101_berita_summary->Tanggal->ShowGroupHeaderAsRow) { ?>
		<td data-field="Tanggal"<?php echo $r101_berita_summary->Tanggal->cellAttributes(); ?>>&nbsp;</td>
	<?php } else { ?>
		<td data-field="Tanggal"<?php echo $r101_berita_summary->Tanggal->cellAttributes(); ?>><span<?php echo $r101_berita_summary->Tanggal->viewAttributes() ?>><?php echo $r101_berita_summary->Tanggal->GroupViewValue ?></span></td>
	<?php } ?>
<?php } ?>
<?php if ($r101_berita_summary->Berita->Visible) { ?>
		<td data-field="Berita"<?php echo $r101_berita_summary->Berita->cellAttributes() ?>>
<span<?php echo $r101_berita_summary->Berita->viewAttributes() ?>><?php echo $r101_berita_summary->Berita->getViewValue() ?></span>
</td>
<?php } ?>
	</tr>
<?php
	}
?>
<?php

	// Next group
	$r101_berita_summary->loadGroupRowValues();

	// Show header if page break
	if ($r101_berita_summary->isExport())
		$r101_berita_summary->ShowHeader = ($r101_berita_summary->ExportPageBreakCount == 0) ? FALSE : ($r101_berita_summary->GroupCount % $r101_berita_summary->ExportPageBreakCount == 0);

	// Page_Breaking server event
	if ($r101_berita_summary->ShowHeader)
		$r101_berita_summary->Page_Breaking($r101_berita_summary->ShowHeader, $r101_berita_summary->PageBreakContent);
	$r101_berita_summary->GroupCount++;
} // End while
?>
<?php if ($r101_berita_summary->TotalGroups > 0) { ?>
</tbody>
<tfoot>
</tfoot>
</table>
</div>
<!-- /.ew-grid-middle-panel -->
<!-- Report grid (end) -->
<?php if (!$r101_berita_summary->isExport() && !($r101_berita_summary->DrillDown && $r101_berita_summary->TotalGroups > 0)) { ?>
<!-- Bottom pager -->
<div class="card-footer ew-grid-lower-panel">
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $r101_berita_summary->Pager->render() ?>
</form>
<div class="clearfix"></div>
</div>
<?php } ?>
</div>
<!-- /.ew-grid -->
<?php } ?>
</div>
<!-- /#report-summary -->
<!-- Summary report (end) -->
<?php if ((!$r101_berita_summary->isExport() || $r101_berita_summary->isExport("print")) && !$DashboardReport) { ?>
</div>
<!-- /#ew-center -->
<?php } ?>
<?php if ((!$r101_berita_summary->isExport() || $r101_berita_summary->isExport("print")) && !$DashboardReport) { ?>
</div>
<!-- /.row -->
<?php } ?>
<?php if ((!$r101_berita_summary->isExport() || $r101_berita_summary->isExport("print")) && !$DashboardReport) { ?>
</div>
<!-- /.ew-report -->
<?php } ?>
<?php
$r101_berita_summary->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$r101_berita_summary->isExport() && !$r101_berita_summary->DrillDown && !$DashboardReport) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php if (!$DashboardReport) { ?>
<?php include_once "footer.php"; ?>
<?php } ?>
<?php
$r101_berita_summary->terminate();
?>