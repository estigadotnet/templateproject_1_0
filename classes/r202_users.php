<?php namespace PHPMaker2020\templateproject_1_0; ?>
<?php

/**
 * Table class for r202_users
 */
class r202_users extends ReportTable
{
	protected $SqlFrom = "";
	protected $SqlSelect = "";
	protected $SqlSelectList = "";
	protected $SqlWhere = "";
	protected $SqlGroupBy = "";
	protected $SqlHaving = "";
	protected $SqlOrderBy = "";
	public $UseSessionForListSql = TRUE;

	// Column CSS classes
	public $LeftColumnClass = "col-sm-2 col-form-label ew-label";
	public $RightColumnClass = "col-sm-10";
	public $OffsetColumnClass = "col-sm-10 offset-sm-2";
	public $TableLeftColumnClass = "w-col-2";
	public $ShowGroupHeaderAsRow = FALSE;
	public $ShowCompactSummaryFooter = TRUE;

	// Export
	public $ExportDoc;

	// Fields
	public $EmployeeID;
	public $LastName;
	public $FirstName;
	public $Title;
	public $TitleOfCourtesy;
	public $BirthDate;
	public $HireDate;
	public $Address;
	public $City;
	public $Region;
	public $PostalCode;
	public $Country;
	public $HomePhone;
	public $Extension;
	public $_Email;
	public $Photo;
	public $Notes;
	public $ReportsTo;
	public $Password;
	public $UserLevel;
	public $Username;
	public $Activated;
	public $Profile;
	public $sekolah_id;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'r202_users';
		$this->TableName = 'r202_users';
		$this->TableType = 'REPORT';

		// Update Table
		$this->UpdateTable = "`t201_users`";
		$this->ReportSourceTable = 't201_users'; // Report source table
		$this->Dbid = 'DB';
		$this->ExportAll = TRUE;
		$this->ExportPageBreakCount = 0; // Page break per every n record (report only)
		$this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
		$this->ExportPageSize = "a4"; // Page size (PDF only)
		$this->ExportExcelPageOrientation = ""; // Page orientation (PhpSpreadsheet only)
		$this->ExportExcelPageSize = ""; // Page size (PhpSpreadsheet only)
		$this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
		$this->ExportWordColumnWidth = NULL; // Cell width (PHPWord only)
		$this->UserIDAllowSecurity = 0; // User ID Allow

		// EmployeeID
		$this->EmployeeID = new ReportField('r202_users', 'r202_users', 'x_EmployeeID', 'EmployeeID', '`EmployeeID`', '`EmployeeID`', 3, 11, -1, FALSE, '`EmployeeID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->EmployeeID->IsAutoIncrement = TRUE; // Autoincrement field
		$this->EmployeeID->IsPrimaryKey = TRUE; // Primary key field
		$this->EmployeeID->Sortable = TRUE; // Allow sort
		$this->EmployeeID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->EmployeeID->SourceTableVar = 't201_users';
		$this->fields['EmployeeID'] = &$this->EmployeeID;

		// LastName
		$this->LastName = new ReportField('r202_users', 'r202_users', 'x_LastName', 'LastName', '`LastName`', '`LastName`', 200, 20, -1, FALSE, '`LastName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->LastName->Sortable = TRUE; // Allow sort
		$this->LastName->SourceTableVar = 't201_users';
		$this->fields['LastName'] = &$this->LastName;

		// FirstName
		$this->FirstName = new ReportField('r202_users', 'r202_users', 'x_FirstName', 'FirstName', '`FirstName`', '`FirstName`', 200, 10, -1, FALSE, '`FirstName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->FirstName->Sortable = TRUE; // Allow sort
		$this->FirstName->SourceTableVar = 't201_users';
		$this->fields['FirstName'] = &$this->FirstName;

		// Title
		$this->Title = new ReportField('r202_users', 'r202_users', 'x_Title', 'Title', '`Title`', '`Title`', 200, 30, -1, FALSE, '`Title`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Title->Sortable = TRUE; // Allow sort
		$this->Title->SourceTableVar = 't201_users';
		$this->fields['Title'] = &$this->Title;

		// TitleOfCourtesy
		$this->TitleOfCourtesy = new ReportField('r202_users', 'r202_users', 'x_TitleOfCourtesy', 'TitleOfCourtesy', '`TitleOfCourtesy`', '`TitleOfCourtesy`', 200, 25, -1, FALSE, '`TitleOfCourtesy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TitleOfCourtesy->Sortable = TRUE; // Allow sort
		$this->TitleOfCourtesy->SourceTableVar = 't201_users';
		$this->fields['TitleOfCourtesy'] = &$this->TitleOfCourtesy;

		// BirthDate
		$this->BirthDate = new ReportField('r202_users', 'r202_users', 'x_BirthDate', 'BirthDate', '`BirthDate`', CastDateFieldForLike("`BirthDate`", 0, "DB"), 135, 19, 0, FALSE, '`BirthDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BirthDate->Sortable = TRUE; // Allow sort
		$this->BirthDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->BirthDate->SourceTableVar = 't201_users';
		$this->fields['BirthDate'] = &$this->BirthDate;

		// HireDate
		$this->HireDate = new ReportField('r202_users', 'r202_users', 'x_HireDate', 'HireDate', '`HireDate`', CastDateFieldForLike("`HireDate`", 0, "DB"), 135, 19, 0, FALSE, '`HireDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HireDate->Sortable = TRUE; // Allow sort
		$this->HireDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->HireDate->SourceTableVar = 't201_users';
		$this->fields['HireDate'] = &$this->HireDate;

		// Address
		$this->Address = new ReportField('r202_users', 'r202_users', 'x_Address', 'Address', '`Address`', '`Address`', 200, 60, -1, FALSE, '`Address`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Address->Sortable = TRUE; // Allow sort
		$this->Address->SourceTableVar = 't201_users';
		$this->fields['Address'] = &$this->Address;

		// City
		$this->City = new ReportField('r202_users', 'r202_users', 'x_City', 'City', '`City`', '`City`', 200, 15, -1, FALSE, '`City`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->City->Sortable = TRUE; // Allow sort
		$this->City->SourceTableVar = 't201_users';
		$this->fields['City'] = &$this->City;

		// Region
		$this->Region = new ReportField('r202_users', 'r202_users', 'x_Region', 'Region', '`Region`', '`Region`', 200, 15, -1, FALSE, '`Region`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Region->Sortable = TRUE; // Allow sort
		$this->Region->SourceTableVar = 't201_users';
		$this->fields['Region'] = &$this->Region;

		// PostalCode
		$this->PostalCode = new ReportField('r202_users', 'r202_users', 'x_PostalCode', 'PostalCode', '`PostalCode`', '`PostalCode`', 200, 10, -1, FALSE, '`PostalCode`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PostalCode->Sortable = TRUE; // Allow sort
		$this->PostalCode->SourceTableVar = 't201_users';
		$this->fields['PostalCode'] = &$this->PostalCode;

		// Country
		$this->Country = new ReportField('r202_users', 'r202_users', 'x_Country', 'Country', '`Country`', '`Country`', 200, 15, -1, FALSE, '`Country`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Country->Sortable = TRUE; // Allow sort
		$this->Country->SourceTableVar = 't201_users';
		$this->fields['Country'] = &$this->Country;

		// HomePhone
		$this->HomePhone = new ReportField('r202_users', 'r202_users', 'x_HomePhone', 'HomePhone', '`HomePhone`', '`HomePhone`', 200, 24, -1, FALSE, '`HomePhone`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HomePhone->Sortable = TRUE; // Allow sort
		$this->HomePhone->SourceTableVar = 't201_users';
		$this->fields['HomePhone'] = &$this->HomePhone;

		// Extension
		$this->Extension = new ReportField('r202_users', 'r202_users', 'x_Extension', 'Extension', '`Extension`', '`Extension`', 200, 4, -1, FALSE, '`Extension`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Extension->Sortable = TRUE; // Allow sort
		$this->Extension->SourceTableVar = 't201_users';
		$this->fields['Extension'] = &$this->Extension;

		// Email
		$this->_Email = new ReportField('r202_users', 'r202_users', 'x__Email', 'Email', '`Email`', '`Email`', 200, 30, -1, FALSE, '`Email`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_Email->Sortable = TRUE; // Allow sort
		$this->_Email->SourceTableVar = 't201_users';
		$this->fields['Email'] = &$this->_Email;

		// Photo
		$this->Photo = new ReportField('r202_users', 'r202_users', 'x_Photo', 'Photo', '`Photo`', '`Photo`', 200, 255, -1, FALSE, '`Photo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Photo->Sortable = TRUE; // Allow sort
		$this->Photo->SourceTableVar = 't201_users';
		$this->fields['Photo'] = &$this->Photo;

		// Notes
		$this->Notes = new ReportField('r202_users', 'r202_users', 'x_Notes', 'Notes', '`Notes`', '`Notes`', 201, -1, -1, FALSE, '`Notes`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Notes->Sortable = TRUE; // Allow sort
		$this->Notes->SourceTableVar = 't201_users';
		$this->fields['Notes'] = &$this->Notes;

		// ReportsTo
		$this->ReportsTo = new ReportField('r202_users', 'r202_users', 'x_ReportsTo', 'ReportsTo', '`ReportsTo`', '`ReportsTo`', 3, 11, -1, FALSE, '`ReportsTo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ReportsTo->Sortable = TRUE; // Allow sort
		$this->ReportsTo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->ReportsTo->SourceTableVar = 't201_users';
		$this->fields['ReportsTo'] = &$this->ReportsTo;

		// Password
		$this->Password = new ReportField('r202_users', 'r202_users', 'x_Password', 'Password', '`Password`', '`Password`', 200, 50, -1, FALSE, '`Password`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Password->Nullable = FALSE; // NOT NULL field
		$this->Password->Required = TRUE; // Required field
		$this->Password->Sortable = TRUE; // Allow sort
		$this->Password->SourceTableVar = 't201_users';
		$this->fields['Password'] = &$this->Password;

		// UserLevel
		$this->UserLevel = new ReportField('r202_users', 'r202_users', 'x_UserLevel', 'UserLevel', '`UserLevel`', '`UserLevel`', 3, 11, -1, FALSE, '`UserLevel`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->UserLevel->Sortable = TRUE; // Allow sort
		$this->UserLevel->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->UserLevel->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->UserLevel->Lookup = new Lookup('UserLevel', 't202_userlevels', FALSE, 'userlevelid', ["userlevelname","","",""], [], [], [], [], [], [], '', '');
		$this->UserLevel->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->UserLevel->SourceTableVar = 't201_users';
		$this->fields['UserLevel'] = &$this->UserLevel;

		// Username
		$this->Username = new ReportField('r202_users', 'r202_users', 'x_Username', 'Username', '`Username`', '`Username`', 200, 20, -1, FALSE, '`Username`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Username->Nullable = FALSE; // NOT NULL field
		$this->Username->Required = TRUE; // Required field
		$this->Username->Sortable = TRUE; // Allow sort
		$this->Username->SourceTableVar = 't201_users';
		$this->fields['Username'] = &$this->Username;

		// Activated
		$this->Activated = new ReportField('r202_users', 'r202_users', 'x_Activated', 'Activated', '`Activated`', '`Activated`', 202, 1, -1, FALSE, '`Activated`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->Activated->Nullable = FALSE; // NOT NULL field
		$this->Activated->Sortable = TRUE; // Allow sort
		$this->Activated->DataType = DATATYPE_BOOLEAN;
		$this->Activated->TrueValue = "Y";
		$this->Activated->FalseValue = "N";
		$this->Activated->Lookup = new Lookup('Activated', 'r202_users', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Activated->OptionCount = 2;
		$this->Activated->SourceTableVar = 't201_users';
		$this->fields['Activated'] = &$this->Activated;

		// Profile
		$this->Profile = new ReportField('r202_users', 'r202_users', 'x_Profile', 'Profile', '`Profile`', '`Profile`', 201, -1, -1, FALSE, '`Profile`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Profile->Sortable = TRUE; // Allow sort
		$this->Profile->SourceTableVar = 't201_users';
		$this->fields['Profile'] = &$this->Profile;

		// sekolah_id
		$this->sekolah_id = new ReportField('r202_users', 'r202_users', 'x_sekolah_id', 'sekolah_id', '`sekolah_id`', '`sekolah_id`', 3, 11, -1, FALSE, '`sekolah_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->sekolah_id->Sortable = TRUE; // Allow sort
		$this->sekolah_id->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->sekolah_id->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->sekolah_id->Lookup = new Lookup('sekolah_id', 't001_sekolah', FALSE, 'id', ["Nama","","",""], [], [], [], [], [], [], '', '');
		$this->sekolah_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->sekolah_id->SourceTableVar = 't201_users';
		$this->fields['sekolah_id'] = &$this->sekolah_id;
	}

	// Field Visibility
	public function getFieldVisibility($fldParm)
	{
		global $Security;
		return $this->$fldParm->Visible; // Returns original value
	}

	// Single column sort
	protected function updateSort(&$fld)
	{
		if ($this->CurrentOrder == $fld->Name) {
			$sortField = $fld->Expression;
			$lastSort = $fld->getSort();
			if ($this->CurrentOrderType == "ASC" || $this->CurrentOrderType == "DESC") {
				$thisSort = $this->CurrentOrderType;
			} else {
				$thisSort = ($lastSort == "ASC") ? "DESC" : "ASC";
			}
			$fld->setSort($thisSort);
			if ($fld->GroupingFieldId == 0)
				$this->setDetailOrderBy($sortField . " " . $thisSort); // Save to Session
		} else {
			if ($fld->GroupingFieldId == 0) $fld->setSort("");
		}
	}

	// Get Sort SQL
	protected function sortSql()
	{
		$dtlSortSql = $this->getDetailOrderBy(); // Get ORDER BY for detail fields from session
		$argrps = [];
		foreach ($this->fields as $fld) {
			if ($fld->getSort() != "") {
				$fldsql = $fld->Expression;
				if ($fld->GroupingFieldId > 0) {
					if ($fld->GroupSql != "")
						$argrps[$fld->GroupingFieldId] = str_replace("%s", $fldsql, $fld->GroupSql) . " " . $fld->getSort();
					else
						$argrps[$fld->GroupingFieldId] = $fldsql . " " . $fld->getSort();
				}
			}
		}
		$sortSql = "";
		foreach ($argrps as $grp) {
			if ($sortSql != "") $sortSql .= ", ";
			$sortSql .= $grp;
		}
		if ($dtlSortSql != "") {
			if ($sortSql != "") $sortSql .= ", ";
			$sortSql .= $dtlSortSql;
		}
		return $sortSql;
	}

	// Summary properties
	private $_sqlSelectAggregate = "";
	private $_sqlAggregatePrefix = "";
	private $_sqlAggregateSuffix = "";
	private $_sqlSelectCount = "";

	// Select Aggregate
	public function getSqlSelectAggregate()
	{
		return ($this->_sqlSelectAggregate != "") ? $this->_sqlSelectAggregate : "SELECT * FROM " . $this->getSqlFrom();
	}
	public function setSqlSelectAggregate($v)
	{
		$this->_sqlSelectAggregate = $v;
	}

	// Aggregate Prefix
	public function getSqlAggregatePrefix()
	{
		return ($this->_sqlAggregatePrefix != "") ? $this->_sqlAggregatePrefix : "";
	}
	public function setSqlAggregatePrefix($v)
	{
		$this->_sqlAggregatePrefix = $v;
	}

	// Aggregate Suffix
	public function getSqlAggregateSuffix()
	{
		return ($this->_sqlAggregateSuffix != "") ? $this->_sqlAggregateSuffix : "";
	}
	public function setSqlAggregateSuffix($v)
	{
		$this->_sqlAggregateSuffix = $v;
	}

	// Select Count
	public function getSqlSelectCount()
	{
		return ($this->_sqlSelectCount != "") ? $this->_sqlSelectCount : "SELECT COUNT(*) FROM " . $this->getSqlFrom();
	}
	public function setSqlSelectCount($v)
	{
		$this->_sqlSelectCount = $v;
	}

	// Render for lookup
	public function renderLookup()
	{
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`t201_users`";
	}
	public function sqlFrom() // For backward compatibility
	{
		return $this->getSqlFrom();
	}
	public function setSqlFrom($v)
	{
		$this->SqlFrom = $v;
	}
	public function getSqlSelect() // Select
	{
		if ($this->SqlSelect != "")
			return $this->SqlSelect;
		$select = "*";
		return "SELECT " . $select . " FROM " . $this->getSqlFrom();
	}
	public function sqlSelect() // For backward compatibility
	{
		return $this->getSqlSelect();
	}
	public function setSqlSelect($v)
	{
		$this->SqlSelect = $v;
	}
	public function getSqlWhere() // Where
	{
		$where = ($this->SqlWhere != "") ? $this->SqlWhere : "";
		$this->TableFilter = "";
		AddFilter($where, $this->TableFilter);
		return $where;
	}
	public function sqlWhere() // For backward compatibility
	{
		return $this->getSqlWhere();
	}
	public function setSqlWhere($v)
	{
		$this->SqlWhere = $v;
	}
	public function getSqlGroupBy() // Group By
	{
		return ($this->SqlGroupBy != "") ? $this->SqlGroupBy : "";
	}
	public function sqlGroupBy() // For backward compatibility
	{
		return $this->getSqlGroupBy();
	}
	public function setSqlGroupBy($v)
	{
		$this->SqlGroupBy = $v;
	}
	public function getSqlHaving() // Having
	{
		return ($this->SqlHaving != "") ? $this->SqlHaving : "";
	}
	public function sqlHaving() // For backward compatibility
	{
		return $this->getSqlHaving();
	}
	public function setSqlHaving($v)
	{
		$this->SqlHaving = $v;
	}
	public function getSqlOrderBy() // Order By
	{
		return ($this->SqlOrderBy != "") ? $this->SqlOrderBy : "";
	}
	public function sqlOrderBy() // For backward compatibility
	{
		return $this->getSqlOrderBy();
	}
	public function setSqlOrderBy($v)
	{
		$this->SqlOrderBy = $v;
	}

	// Apply User ID filters
	public function applyUserIDFilters($filter)
	{
		global $Security;

		// Add User ID filter
		if ($Security->currentUserID() != "" && !$Security->isAdmin()) { // Non system admin
			$filter = $this->addUserIDFilter($filter);
		}
		return $filter;
	}

	// Check if User ID security allows view all
	public function userIDAllow($id = "")
	{
		$allow = $this->UserIDAllowSecurity;
		switch ($id) {
			case "add":
			case "copy":
			case "gridadd":
			case "register":
			case "addopt":
				return (($allow & 1) == 1);
			case "edit":
			case "gridedit":
			case "update":
			case "changepwd":
			case "forgotpwd":
				return (($allow & 4) == 4);
			case "delete":
				return (($allow & 2) == 2);
			case "view":
				return (($allow & 32) == 32);
			case "search":
				return (($allow & 64) == 64);
			default:
				return (($allow & 8) == 8);
		}
	}

	// Get recordset
	public function getRecordset($sql, $rowcnt = -1, $offset = -1)
	{
		$conn = $this->getConnection();
		$conn->raiseErrorFn = Config("ERROR_FUNC");
		$rs = $conn->selectLimit($sql, $rowcnt, $offset);
		$conn->raiseErrorFn = "";
		return $rs;
	}

	// Get record count
	public function getRecordCount($sql, $c = NULL)
	{
		$cnt = -1;
		$rs = NULL;
		$sql = preg_replace('/\/\*BeginOrderBy\*\/[\s\S]+\/\*EndOrderBy\*\//', "", $sql); // Remove ORDER BY clause (MSSQL)
		$pattern = '/^SELECT\s([\s\S]+)\sFROM\s/i';

		// Skip Custom View / SubQuery / SELECT DISTINCT / ORDER BY
		if (($this->TableType == 'TABLE' || $this->TableType == 'VIEW' || $this->TableType == 'LINKTABLE') &&
			preg_match($pattern, $sql) && !preg_match('/\(\s*(SELECT[^)]+)\)/i', $sql) &&
			!preg_match('/^\s*select\s+distinct\s+/i', $sql) && !preg_match('/\s+order\s+by\s+/i', $sql)) {
			$sqlwrk = "SELECT COUNT(*) FROM " . preg_replace($pattern, "", $sql);
		} else {
			$sqlwrk = "SELECT COUNT(*) FROM (" . $sql . ") COUNT_TABLE";
		}
		$conn = $c ?: $this->getConnection();
		if ($rs = $conn->execute($sqlwrk)) {
			if (!$rs->EOF && $rs->FieldCount() > 0) {
				$cnt = $rs->fields[0];
				$rs->close();
			}
			return (int)$cnt;
		}

		// Unable to get count, get record count directly
		if ($rs = $conn->execute($sql)) {
			$cnt = $rs->RecordCount();
			$rs->close();
			return (int)$cnt;
		}
		return $cnt;
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`EmployeeID` = @EmployeeID@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		if (is_array($row))
			$val = array_key_exists('EmployeeID', $row) ? $row['EmployeeID'] : NULL;
		else
			$val = $this->EmployeeID->OldValue !== NULL ? $this->EmployeeID->OldValue : $this->EmployeeID->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@EmployeeID@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
		return $keyFilter;
	}

	// Return page URL
	public function getReturnUrl()
	{
		$name = PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL");

		// Get referer URL automatically
		if (ServerVar("HTTP_REFERER") != "" && ReferPageName() != CurrentPageName() && ReferPageName() != "login.php") // Referer not same page or login page
			$_SESSION[$name] = ServerVar("HTTP_REFERER"); // Save to Session
		if (@$_SESSION[$name] != "") {
			return $_SESSION[$name];
		} else {
			return "";
		}
	}
	public function setReturnUrl($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL")] = $v;
	}

	// Get modal caption
	public function getModalCaption($pageName)
	{
		global $Language;
		if ($pageName == "")
			return $Language->phrase("View");
		elseif ($pageName == "")
			return $Language->phrase("Edit");
		elseif ($pageName == "")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "?" . $this->getUrlParm($parm);
		else
			$url = "";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("", $this->getUrlParm($parm));
		return $this->addMasterUrl($url);
	}

	// Inline edit URL
	public function getInlineEditUrl()
	{
		$url = $this->keyUrl(CurrentPageName(), $this->getUrlParm("action=edit"));
		return $this->addMasterUrl($url);
	}

	// Copy URL
	public function getCopyUrl($parm = "")
	{
		$url = $this->keyUrl("", $this->getUrlParm($parm));
		return $this->addMasterUrl($url);
	}

	// Inline copy URL
	public function getInlineCopyUrl()
	{
		$url = $this->keyUrl(CurrentPageName(), $this->getUrlParm("action=copy"));
		return $this->addMasterUrl($url);
	}

	// Delete URL
	public function getDeleteUrl()
	{
		return $this->keyUrl("", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "EmployeeID:" . JsonEncode($this->EmployeeID->CurrentValue, "number");
		$json = "{" . $json . "}";
		if ($htmlEncode)
			$json = HtmlEncode($json);
		return $json;
	}

	// Add key value to URL
	public function keyUrl($url, $parm = "")
	{
		$url = $url . "?";
		if ($parm != "")
			$url .= $parm . "&";
		if ($this->EmployeeID->CurrentValue != NULL) {
			$url .= "EmployeeID=" . urlencode($this->EmployeeID->CurrentValue);
		} else {
			return "javascript:ew.alert(ew.language.phrase('InvalidRecord'));";
		}
		return $url;
	}

	// Sort URL
	public function sortUrl(&$fld)
	{
		global $DashboardReport;
		if ($this->CurrentAction || $this->isExport() ||
			$this->DrillDown || $DashboardReport ||
			in_array($fld->Type, [128, 204, 205])) { // Unsortable data type
				return "";
		} elseif ($fld->Sortable) {
			$urlParm = $this->getUrlParm("order=" . urlencode($fld->Name) . "&amp;ordertype=" . $fld->reverseSort());
			return $this->addMasterUrl(CurrentPageName() . "?" . $urlParm);
		} else {
			return "";
		}
	}

	// Get record keys from Post/Get/Session
	public function getRecordKeys()
	{
		$arKeys = [];
		$arKey = [];
		if (Param("key_m") !== NULL) {
			$arKeys = Param("key_m");
			$cnt = count($arKeys);
		} else {
			if (Param("EmployeeID") !== NULL)
				$arKeys[] = Param("EmployeeID");
			elseif (IsApi() && Key(0) !== NULL)
				$arKeys[] = Key(0);
			elseif (IsApi() && Route(2) !== NULL)
				$arKeys[] = Route(2);
			else
				$arKeys = NULL; // Do not setup

			//return $arKeys; // Do not return yet, so the values will also be checked by the following code
		}

		// Check keys
		$ar = [];
		if (is_array($arKeys)) {
			foreach ($arKeys as $key) {
				if (!is_numeric($key))
					continue;
				$ar[] = $key;
			}
		}
		return $ar;
	}

	// Get filter from record keys
	public function getFilterFromRecordKeys($setCurrent = TRUE)
	{
		$arKeys = $this->getRecordKeys();
		$keyFilter = "";
		foreach ($arKeys as $key) {
			if ($keyFilter != "") $keyFilter .= " OR ";
			if ($setCurrent)
				$this->EmployeeID->CurrentValue = $key;
			else
				$this->EmployeeID->OldValue = $key;
			$keyFilter .= "(" . $this->getRecordFilter() . ")";
		}
		return $keyFilter;
	}

	// Load rows based on filter
	public function &loadRs($filter)
	{

		// Set up filter (WHERE Clause)
		$sql = $this->getSql($filter);
		$conn = $this->getConnection();
		$rs = $conn->execute($sql);
		return $rs;
	}

	// Add User ID filter
	public function addUserIDFilter($filter = "")
	{
		global $Security;
		$filterWrk = "";
		$id = (CurrentPageID() == "list") ? $this->CurrentAction : CurrentPageID();
		if (!$this->userIdAllow($id) && !$Security->isAdmin()) {
			$filterWrk = $Security->userIdList();
			if ($filterWrk != "")
				$filterWrk = '`EmployeeID` IN (' . $filterWrk . ')';
		}

		// Call User ID Filtering event
		$this->UserID_Filtering($filterWrk);
		AddFilter($filter, $filterWrk);
		return $filter;
	}

	// User ID subquery
	public function getUserIDSubquery(&$fld, &$masterfld)
	{
		global $UserTable;
		$wrk = "";
		$sql = "SELECT " . $masterfld->Expression . " FROM `t201_users`";
		$filter = $this->addUserIDFilter("");
		if ($filter != "")
			$sql .= " WHERE " . $filter;

		// Use subquery
		if (Config("USE_SUBQUERY_FOR_MASTER_USER_ID")) {
			$wrk = $sql;
		} else {

			// List all values
			if ($rs = Conn($UserTable->Dbid)->execute($sql)) {
				while (!$rs->EOF) {
					if ($wrk != "")
						$wrk .= ",";
					$wrk .= QuotedValue($rs->fields[0], $masterfld->DataType, Config("USER_TABLE_DBID"));
					$rs->moveNext();
				}
				$rs->close();
			}
		}
		if ($wrk != "")
			$wrk = $fld->Expression . " IN (" . $wrk . ")";
		return $wrk;
	}

	// Get file data
	public function getFileData($fldparm, $key, $resize, $width = 0, $height = 0)
	{

		// No binary fields
		return FALSE;
	}

	// Email Sending event
	function Email_Sending($email, &$args) {

		//var_dump($email); var_dump($args); exit();
		return TRUE;
	}

	// Lookup Selecting event
	function Lookup_Selecting($fld, &$filter) {

		//var_dump($fld->Name, $fld->Lookup, $filter); // Uncomment to view the filter
		// Enter your code here

	}

	// Row Rendering event
	function Row_Rendering() {

		// Enter your code here
	}

	// Row Rendered event
	function Row_Rendered() {

		// To view properties of field class, use:
		//var_dump($this-><FieldName>);

	}

	// User ID Filtering event
	function UserID_Filtering(&$filter) {

		// Enter your code here
	}
}
?>