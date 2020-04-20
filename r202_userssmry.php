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
$r202_users_summary = new r202_users_summary();

// Run the page
$r202_users_summary->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$r202_users_summary->Page_Render();
?>
<?php if (!$DashboardReport) { ?>
<?php include_once "header.php"; ?>
<?php } ?>
<?php if (!$r202_users_summary->isExport() && !$r202_users_summary->DrillDown && !$DashboardReport) { ?>
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
<?php if ((!$r202_users_summary->isExport() || $r202_users_summary->isExport("print")) && !$DashboardReport) { ?>
<!-- Content Container -->
<div id="ew-report" class="ew-report container-fluid">
<?php } ?>
<div class="btn-toolbar ew-toolbar">
<?php
if (!$r202_users_summary->DrillDownInPanel) {
	$r202_users_summary->ExportOptions->render("body");
	$r202_users_summary->SearchOptions->render("body");
	$r202_users_summary->FilterOptions->render("body");
}
?>
</div>
<?php $r202_users_summary->showPageHeader(); ?>
<?php
$r202_users_summary->showMessage();
?>
<?php if ((!$r202_users_summary->isExport() || $r202_users_summary->isExport("print")) && !$DashboardReport) { ?>
<div class="row">
<?php } ?>
<?php if ((!$r202_users_summary->isExport() || $r202_users_summary->isExport("print")) && !$DashboardReport) { ?>
<!-- Center Container -->
<div id="ew-center" class="<?php echo $r202_users_summary->CenterContentClass ?>">
<?php } ?>
<!-- Summary report (begin) -->
<div id="report_summary">
<?php if (!$r202_users_summary->isExport() && !$r202_users_summary->DrillDown && !$DashboardReport) { ?>
<?php } ?>
<?php
while ($r202_users_summary->RecordCount < count($r202_users_summary->DetailRecords) && $r202_users_summary->RecordCount < $r202_users_summary->DisplayGroups) {
?>
<?php

	// Show header
	if ($r202_users_summary->ShowHeader) {
?>
<div class="<?php if (!$r202_users_summary->isExport("word") && !$r202_users_summary->isExport("excel")) { ?>card ew-card <?php } ?>ew-grid"<?php echo $r202_users_summary->ReportTableStyle ?>>
<!-- Report grid (begin) -->
<div id="gmp_r202_users" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="<?php echo $r202_users_summary->ReportTableClass ?>">
<thead>
	<!-- Table header -->
	<tr class="ew-table-header">
<?php if ($r202_users_summary->UserLevel->Visible) { ?>
	<?php if ($r202_users_summary->sortUrl($r202_users_summary->UserLevel) == "") { ?>
	<th data-name="UserLevel" class="<?php echo $r202_users_summary->UserLevel->headerCellClass() ?>"><div class="r202_users_UserLevel"><div class="ew-table-header-caption"><?php echo $r202_users_summary->UserLevel->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="UserLevel" class="<?php echo $r202_users_summary->UserLevel->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r202_users_summary->sortUrl($r202_users_summary->UserLevel) ?>', 1);"><div class="r202_users_UserLevel">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r202_users_summary->UserLevel->caption() ?></span><span class="ew-table-header-sort"><?php if ($r202_users_summary->UserLevel->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r202_users_summary->UserLevel->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($r202_users_summary->Username->Visible) { ?>
	<?php if ($r202_users_summary->sortUrl($r202_users_summary->Username) == "") { ?>
	<th data-name="Username" class="<?php echo $r202_users_summary->Username->headerCellClass() ?>"><div class="r202_users_Username"><div class="ew-table-header-caption"><?php echo $r202_users_summary->Username->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="Username" class="<?php echo $r202_users_summary->Username->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r202_users_summary->sortUrl($r202_users_summary->Username) ?>', 1);"><div class="r202_users_Username">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r202_users_summary->Username->caption() ?></span><span class="ew-table-header-sort"><?php if ($r202_users_summary->Username->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r202_users_summary->Username->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($r202_users_summary->sekolah_id->Visible) { ?>
	<?php if ($r202_users_summary->sortUrl($r202_users_summary->sekolah_id) == "") { ?>
	<th data-name="sekolah_id" class="<?php echo $r202_users_summary->sekolah_id->headerCellClass() ?>"><div class="r202_users_sekolah_id"><div class="ew-table-header-caption"><?php echo $r202_users_summary->sekolah_id->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="sekolah_id" class="<?php echo $r202_users_summary->sekolah_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r202_users_summary->sortUrl($r202_users_summary->sekolah_id) ?>', 1);"><div class="r202_users_sekolah_id">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r202_users_summary->sekolah_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($r202_users_summary->sekolah_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r202_users_summary->sekolah_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
	</tr>
</thead>
<tbody>
<?php
		if ($r202_users_summary->TotalGroups == 0)
			break; // Show header only
		$r202_users_summary->ShowHeader = FALSE;
	} // End show header
?>
<?php
	$r202_users_summary->loadRowValues($r202_users_summary->DetailRecords[$r202_users_summary->RecordCount]);
	$r202_users_summary->RecordCount++;
	$r202_users_summary->RecordIndex++;
?>
<?php

		// Render detail row
		$r202_users_summary->resetAttributes();
		$r202_users_summary->RowType = ROWTYPE_DETAIL;
		$r202_users_summary->renderRow();
?>
	<tr<?php echo $r202_users_summary->rowAttributes(); ?>>
<?php if ($r202_users_summary->UserLevel->Visible) { ?>
		<td data-field="UserLevel"<?php echo $r202_users_summary->UserLevel->cellAttributes() ?>>
<span<?php echo $r202_users_summary->UserLevel->viewAttributes() ?>><?php echo $r202_users_summary->UserLevel->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($r202_users_summary->Username->Visible) { ?>
		<td data-field="Username"<?php echo $r202_users_summary->Username->cellAttributes() ?>>
<span<?php echo $r202_users_summary->Username->viewAttributes() ?>><?php echo $r202_users_summary->Username->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($r202_users_summary->sekolah_id->Visible) { ?>
		<td data-field="sekolah_id"<?php echo $r202_users_summary->sekolah_id->cellAttributes() ?>>
<span<?php echo $r202_users_summary->sekolah_id->viewAttributes() ?>><?php echo $r202_users_summary->sekolah_id->getViewValue() ?></span>
</td>
<?php } ?>
	</tr>
<?php
} // End while
?>
<?php if ($r202_users_summary->TotalGroups > 0) { ?>
</tbody>
<tfoot>
</tfoot>
</table>
</div>
<!-- /.ew-grid-middle-panel -->
<!-- Report grid (end) -->
<?php if (!$r202_users_summary->isExport() && !($r202_users_summary->DrillDown && $r202_users_summary->TotalGroups > 0)) { ?>
<!-- Bottom pager -->
<div class="card-footer ew-grid-lower-panel">
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $r202_users_summary->Pager->render() ?>
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
<?php if ((!$r202_users_summary->isExport() || $r202_users_summary->isExport("print")) && !$DashboardReport) { ?>
</div>
<!-- /#ew-center -->
<?php } ?>
<?php if ((!$r202_users_summary->isExport() || $r202_users_summary->isExport("print")) && !$DashboardReport) { ?>
</div>
<!-- /.row -->
<?php } ?>
<?php if ((!$r202_users_summary->isExport() || $r202_users_summary->isExport("print")) && !$DashboardReport) { ?>
</div>
<!-- /.ew-report -->
<?php } ?>
<?php
$r202_users_summary->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$r202_users_summary->isExport() && !$r202_users_summary->DrillDown && !$DashboardReport) { ?>
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
$r202_users_summary->terminate();
?>