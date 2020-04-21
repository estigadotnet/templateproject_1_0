<?php
namespace PHPMaker2020\templateproject_1_0;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// Filter for 'Last Month' (example)
function GetLastMonthFilter($FldExpression, $dbid = 0) {
	$today = getdate();
	$lastmonth = mktime(0, 0, 0, $today['mon']-1, 1, $today['year']);
	$val = date("Y|m", $lastmonth);
	$wrk = $FldExpression . " BETWEEN " .
		QuotedValue(DateValue("month", $val, 1, $dbid), DATATYPE_DATE, $dbid) .
		" AND " .
		QuotedValue(DateValue("month", $val, 2, $dbid), DATATYPE_DATE, $dbid);
	return $wrk;
}

// Filter for 'Starts With A' (example)
function GetStartsWithAFilter($FldExpression, $dbid = 0) {
	return $FldExpression . Like("'A%'", $dbid);
}

// Global user functions
// Database Connecting event
function Database_Connecting(&$info) {

	// Example:
	//var_dump($info);
	//if ($info["id"] == "DB" && CurrentUserIP() == "127.0.0.1") { // Testing on local PC
	//	$info["host"] = "locahost";
	//	$info["user"] = "root";
	//	$info["pass"] = "";
	//}

}

// Database Connected event
function Database_Connected(&$conn) {

	// Example:
	//if ($conn->info["id"] == "DB")
	//	$conn->Execute("Your SQL");

}

function MenuItem_Adding($item) {

	//var_dump($item);
	// Return FALSE if menu item not allowed

	if ($item->Text == "Berita") {
		return IsEmptySetting();
	}
	if ($item->Text != "Berita") {
		return IsLoggedIn();
	}
}

function Menu_Rendering($menu) {

	// Change menu items here
}

function Menu_Rendered($menu) {

	// Clean up here
}

// Page Loading event
function Page_Loading() {

	//echo "Page Loading";
}

// Page Rendering event
function Page_Rendering() {

	//echo "Page Rendering";
}

// Page Unloaded event
function Page_Unloaded() {

	//echo "Page Unloaded";
}

// AuditTrail Inserting event
function AuditTrail_Inserting(&$rsnew) {

	//var_dump($rsnew);
	return TRUE;
}

// Personal Data Downloading event
function PersonalData_Downloading(&$row) {

	//echo "PersonalData Downloading";
}

// Personal Data Deleted event
function PersonalData_Deleted($row) {

	//echo "PersonalData Deleted";
}

// untuk check apakah setting sudah terisi
// sekolah_id
// tahunajaran_id
function IsEmptySetting() {
	if (IsLoggedIn()) {
		$q = "select * from t201_users where EmployeeID = ".CurrentUserID()."";
		$row = ExecuteRow($q);
	}

	//echo "username: " . CurrentUserInfo("Username") . "; sekolah_id: " . CurrentUserInfo("sekolah_id") . "; tahunajaran_id: " . CurrentUserInfo("tahunajaran_id") . "<br>";
	//echo "username: " . $row["Username"] . "; sekolah_id: " . $row["sekolah_id"] . "; tahunajaran_id: " . $row["tahunajaran_id"] . "<br>";

	$mShow = false;
	if (IsLoggedIn()
		and !empty($row["sekolah_id"])
		and !empty($row["tahunajaran_id"])
		and !empty($row["kelas_id"])
		and !empty($row["semester_id"])
		) {
		$mShow = true;

		//echo "sekolah_id: " . !empty(CurrentUserInfo("sekolah_id")) . "tahunajaran_id: " . !empty(CurrentUserInfo("tahunajaran_id"));
		//echo "username: " . CurrentUserInfo("Username") . "; sekolah_id: " . CurrentUserInfo("sekolah_id") . "; tahunajaran_id: " . CurrentUserInfo("tahunajaran_id") . "<br>";

	}
	return $mShow;
}
?>