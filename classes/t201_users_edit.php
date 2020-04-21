<?php
namespace PHPMaker2020\templateproject_1_0;

/**
 * Page class
 */
class t201_users_edit extends t201_users
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{1AF74738-C327-4FF8-8DF7-23D913E26545}";

	// Table name
	public $TableName = 't201_users';

	// Page object name
	public $PageObjName = "t201_users_edit";

	// Page headings
	public $Heading = "";
	public $Subheading = "";
	public $PageHeader;
	public $PageFooter;

	// Token
	public $Token = "";
	public $TokenTimeout = 0;
	public $CheckToken;

	// Page heading
	public function pageHeading()
	{
		global $Language;
		if ($this->Heading != "")
			return $this->Heading;
		if (method_exists($this, "tableCaption"))
			return $this->tableCaption();
		return "";
	}

	// Page subheading
	public function pageSubheading()
	{
		global $Language;
		if ($this->Subheading != "")
			return $this->Subheading;
		if ($this->TableName)
			return $Language->phrase($this->PageID);
		return "";
	}

	// Page name
	public function pageName()
	{
		return CurrentPageName();
	}

	// Page URL
	public function pageUrl()
	{
		$url = CurrentPageName() . "?";
		if ($this->UseTokenInUrl)
			$url .= "t=" . $this->TableVar . "&"; // Add page token
		return $url;
	}

	// Messages
	private $_message = "";
	private $_failureMessage = "";
	private $_successMessage = "";
	private $_warningMessage = "";

	// Get message
	public function getMessage()
	{
		return isset($_SESSION[SESSION_MESSAGE]) ? $_SESSION[SESSION_MESSAGE] : $this->_message;
	}

	// Set message
	public function setMessage($v)
	{
		AddMessage($this->_message, $v);
		$_SESSION[SESSION_MESSAGE] = $this->_message;
	}

	// Get failure message
	public function getFailureMessage()
	{
		return isset($_SESSION[SESSION_FAILURE_MESSAGE]) ? $_SESSION[SESSION_FAILURE_MESSAGE] : $this->_failureMessage;
	}

	// Set failure message
	public function setFailureMessage($v)
	{
		AddMessage($this->_failureMessage, $v);
		$_SESSION[SESSION_FAILURE_MESSAGE] = $this->_failureMessage;
	}

	// Get success message
	public function getSuccessMessage()
	{
		return isset($_SESSION[SESSION_SUCCESS_MESSAGE]) ? $_SESSION[SESSION_SUCCESS_MESSAGE] : $this->_successMessage;
	}

	// Set success message
	public function setSuccessMessage($v)
	{
		AddMessage($this->_successMessage, $v);
		$_SESSION[SESSION_SUCCESS_MESSAGE] = $this->_successMessage;
	}

	// Get warning message
	public function getWarningMessage()
	{
		return isset($_SESSION[SESSION_WARNING_MESSAGE]) ? $_SESSION[SESSION_WARNING_MESSAGE] : $this->_warningMessage;
	}

	// Set warning message
	public function setWarningMessage($v)
	{
		AddMessage($this->_warningMessage, $v);
		$_SESSION[SESSION_WARNING_MESSAGE] = $this->_warningMessage;
	}

	// Clear message
	public function clearMessage()
	{
		$this->_message = "";
		$_SESSION[SESSION_MESSAGE] = "";
	}

	// Clear failure message
	public function clearFailureMessage()
	{
		$this->_failureMessage = "";
		$_SESSION[SESSION_FAILURE_MESSAGE] = "";
	}

	// Clear success message
	public function clearSuccessMessage()
	{
		$this->_successMessage = "";
		$_SESSION[SESSION_SUCCESS_MESSAGE] = "";
	}

	// Clear warning message
	public function clearWarningMessage()
	{
		$this->_warningMessage = "";
		$_SESSION[SESSION_WARNING_MESSAGE] = "";
	}

	// Clear messages
	public function clearMessages()
	{
		$this->clearMessage();
		$this->clearFailureMessage();
		$this->clearSuccessMessage();
		$this->clearWarningMessage();
	}

	// Show message
	public function showMessage()
	{
		$hidden = TRUE;
		$html = "";

		// Message
		$message = $this->getMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($message, "");
		if ($message != "") { // Message in Session, display
			if (!$hidden)
				$message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $message;
			$html .= '<div class="alert alert-info alert-dismissible ew-info"><i class="icon fas fa-info"></i>' . $message . '</div>';
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($warningMessage, "warning");
		if ($warningMessage != "") { // Message in Session, display
			if (!$hidden)
				$warningMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $warningMessage;
			$html .= '<div class="alert alert-warning alert-dismissible ew-warning"><i class="icon fas fa-exclamation"></i>' . $warningMessage . '</div>';
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($successMessage, "success");
		if ($successMessage != "") { // Message in Session, display
			if (!$hidden)
				$successMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $successMessage;
			$html .= '<div class="alert alert-success alert-dismissible ew-success"><i class="icon fas fa-check"></i>' . $successMessage . '</div>';
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$errorMessage = $this->getFailureMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($errorMessage, "failure");
		if ($errorMessage != "") { // Message in Session, display
			if (!$hidden)
				$errorMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $errorMessage;
			$html .= '<div class="alert alert-danger alert-dismissible ew-error"><i class="icon fas fa-ban"></i>' . $errorMessage . '</div>';
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		echo '<div class="ew-message-dialog' . (($hidden) ? ' d-none' : "") . '">' . $html . '</div>';
	}

	// Get message as array
	public function getMessages()
	{
		$ar = [];

		// Message
		$message = $this->getMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($message, "");

		if ($message != "") { // Message in Session, display
			$ar["message"] = $message;
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($warningMessage, "warning");

		if ($warningMessage != "") { // Message in Session, display
			$ar["warningMessage"] = $warningMessage;
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($successMessage, "success");

		if ($successMessage != "") { // Message in Session, display
			$ar["successMessage"] = $successMessage;
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$failureMessage = $this->getFailureMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($failureMessage, "failure");

		if ($failureMessage != "") { // Message in Session, display
			$ar["failureMessage"] = $failureMessage;
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		return $ar;
	}

	// Show Page Header
	public function showPageHeader()
	{
		$header = $this->PageHeader;
		$this->Page_DataRendering($header);
		if ($header != "") { // Header exists, display
			echo '<p id="ew-page-header">' . $header . '</p>';
		}
	}

	// Show Page Footer
	public function showPageFooter()
	{
		$footer = $this->PageFooter;
		$this->Page_DataRendered($footer);
		if ($footer != "") { // Footer exists, display
			echo '<p id="ew-page-footer">' . $footer . '</p>';
		}
	}

	// Validate page request
	protected function isPageRequest()
	{
		global $CurrentForm;
		if ($this->UseTokenInUrl) {
			if ($CurrentForm)
				return ($this->TableVar == $CurrentForm->getValue("t"));
			if (Get("t") !== NULL)
				return ($this->TableVar == Get("t"));
		}
		return TRUE;
	}

	// Valid Post
	protected function validPost()
	{
		if (!$this->CheckToken || !IsPost() || IsApi())
			return TRUE;
		if (Post(Config("TOKEN_NAME")) === NULL)
			return FALSE;
		$fn = Config("CHECK_TOKEN_FUNC");
		if (is_callable($fn))
			return $fn(Post(Config("TOKEN_NAME")), $this->TokenTimeout);
		return FALSE;
	}

	// Create Token
	public function createToken()
	{
		global $CurrentToken;
		$fn = Config("CREATE_TOKEN_FUNC"); // Always create token, required by API file/lookup request
		if ($this->Token == "" && is_callable($fn)) // Create token
			$this->Token = $fn();
		$CurrentToken = $this->Token; // Save to global variable
	}

	// Constructor
	public function __construct()
	{
		global $Language, $DashboardReport;
		global $UserTable;

		// Check token
		$this->CheckToken = Config("CHECK_TOKEN");

		// Initialize
		$GLOBALS["Page"] = &$this;
		$this->TokenTimeout = SessionTimeoutTime();

		// Language object
		if (!isset($Language))
			$Language = new Language();

		// Parent constuctor
		parent::__construct();

		// Table object (t201_users)
		if (!isset($GLOBALS["t201_users"]) || get_class($GLOBALS["t201_users"]) == PROJECT_NAMESPACE . "t201_users") {
			$GLOBALS["t201_users"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["t201_users"];
		}

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 't201_users');

		// Start timer
		if (!isset($GLOBALS["DebugTimer"]))
			$GLOBALS["DebugTimer"] = new Timer();

		// Debug message
		LoadDebugMessage();

		// Open connection
		if (!isset($GLOBALS["Conn"]))
			$GLOBALS["Conn"] = $this->getConnection();

		// User table object (t201_users)
		$UserTable = $UserTable ?: new t201_users();
	}

	// Terminate page
	public function terminate($url = "")
	{
		global $ExportFileName, $TempImages, $DashboardReport;

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();

		// Export
		global $t201_users;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($t201_users);
				$doc->Text = @$content;
				if ($this->isExport("email"))
					echo $this->exportEmail($doc->Text);
				else
					$doc->export();
				DeleteTempImages(); // Delete temp images
				exit();
			}
		}
		if (!IsApi())
			$this->Page_Redirecting($url);

		// Close connection
		CloseConnections();

		// Return for API
		if (IsApi()) {
			$res = $url === TRUE;
			if (!$res) // Show error
				WriteJson(array_merge(["success" => FALSE], $this->getMessages()));
			return;
		}

		// Go to URL if specified
		if ($url != "") {
			if (!Config("DEBUG") && ob_get_length())
				ob_end_clean();

			// Handle modal response
			if ($this->IsModal) { // Show as modal
				$row = ["url" => $url, "modal" => "1"];
				$pageName = GetPageName($url);
				if ($pageName != $this->getListUrl()) { // Not List page
					$row["caption"] = $this->getModalCaption($pageName);
					if ($pageName == "t201_usersview.php")
						$row["view"] = "1";
				} else { // List page should not be shown as modal => error
					$row["error"] = $this->getFailureMessage();
					$this->clearFailureMessage();
				}
				WriteJson($row);
			} else {
				SaveDebugMessage();
				AddHeader("Location", $url);
			}
		}
		exit();
	}

	// Get records from recordset
	protected function getRecordsFromRecordset($rs, $current = FALSE)
	{
		$rows = [];
		if (is_object($rs)) { // Recordset
			while ($rs && !$rs->EOF) {
				$this->loadRowValues($rs); // Set up DbValue/CurrentValue
				$row = $this->getRecordFromArray($rs->fields);
				if ($current)
					return $row;
				else
					$rows[] = $row;
				$rs->moveNext();
			}
		} elseif (is_array($rs)) {
			foreach ($rs as $ar) {
				$row = $this->getRecordFromArray($ar);
				if ($current)
					return $row;
				else
					$rows[] = $row;
			}
		}
		return $rows;
	}

	// Get record from array
	protected function getRecordFromArray($ar)
	{
		$row = [];
		if (is_array($ar)) {
			foreach ($ar as $fldname => $val) {
				if (array_key_exists($fldname, $this->fields) && ($this->fields[$fldname]->Visible || $this->fields[$fldname]->IsPrimaryKey)) { // Primary key or Visible
					$fld = &$this->fields[$fldname];
					if ($fld->HtmlTag == "FILE") { // Upload field
						if (EmptyValue($val)) {
							$row[$fldname] = NULL;
						} else {
							if ($fld->DataType == DATATYPE_BLOB) {
								$url = FullUrl(GetApiUrl(Config("API_FILE_ACTION"),
									Config("API_OBJECT_NAME") . "=" . $fld->TableVar . "&" .
									Config("API_FIELD_NAME") . "=" . $fld->Param . "&" .
									Config("API_KEY_NAME") . "=" . rawurlencode($this->getRecordKeyValue($ar)))); //*** need to add this? API may not be in the same folder
								$row[$fldname] = ["mimeType" => ContentType($val), "url" => $url];
							} elseif (!$fld->UploadMultiple || !ContainsString($val, Config("MULTIPLE_UPLOAD_SEPARATOR"))) { // Single file
								$row[$fldname] = ["mimeType" => MimeContentType($val), "url" => FullUrl($fld->hrefPath() . $val)];
							} else { // Multiple files
								$files = explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $val);
								$ar = [];
								foreach ($files as $file) {
									if (!EmptyValue($file))
										$ar[] = ["type" => MimeContentType($file), "url" => FullUrl($fld->hrefPath() . $file)];
								}
								$row[$fldname] = $ar;
							}
						}
					} else {
						$row[$fldname] = $val;
					}
				}
			}
		}
		return $row;
	}

	// Get record key value from array
	protected function getRecordKeyValue($ar)
	{
		$key = "";
		if (is_array($ar)) {
			$key .= @$ar['EmployeeID'];
		}
		return $key;
	}

	/**
	 * Hide fields for add/edit
	 *
	 * @return void
	 */
	protected function hideFieldsForAddEdit()
	{
		if ($this->isAdd() || $this->isCopy() || $this->isGridAdd())
			$this->EmployeeID->Visible = FALSE;
	}

	// Lookup data
	public function lookup()
	{
		global $Language, $Security;
		if (!isset($Language))
			$Language = new Language(Config("LANGUAGE_FOLDER"), Post("language", ""));

		// Set up API request
		if (!$this->setupApiRequest())
			return FALSE;

		// Get lookup object
		$fieldName = Post("field");
		if (!array_key_exists($fieldName, $this->fields))
			return FALSE;
		$lookupField = $this->fields[$fieldName];
		$lookup = $lookupField->Lookup;
		if ($lookup === NULL)
			return FALSE;
		$tbl = $lookup->getTable();
		if (!$Security->allowLookup(Config("PROJECT_ID") . $tbl->TableName)) // Lookup permission
			return FALSE;

		// Get lookup parameters
		$lookupType = Post("ajax", "unknown");
		$pageSize = -1;
		$offset = -1;
		$searchValue = "";
		if (SameText($lookupType, "modal")) {
			$searchValue = Post("sv", "");
			$pageSize = Post("recperpage", 10);
			$offset = Post("start", 0);
		} elseif (SameText($lookupType, "autosuggest")) {
			$searchValue = Param("q", "");
			$pageSize = Param("n", -1);
			$pageSize = is_numeric($pageSize) ? (int)$pageSize : -1;
			if ($pageSize <= 0)
				$pageSize = Config("AUTO_SUGGEST_MAX_ENTRIES");
			$start = Param("start", -1);
			$start = is_numeric($start) ? (int)$start : -1;
			$page = Param("page", -1);
			$page = is_numeric($page) ? (int)$page : -1;
			$offset = $start >= 0 ? $start : ($page > 0 && $pageSize > 0 ? ($page - 1) * $pageSize : 0);
		}
		$userSelect = Decrypt(Post("s", ""));
		$userFilter = Decrypt(Post("f", ""));
		$userOrderBy = Decrypt(Post("o", ""));
		$keys = Post("keys");
		$lookup->LookupType = $lookupType; // Lookup type
		if ($keys !== NULL) { // Selected records from modal
			if (is_array($keys))
				$keys = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $keys);
			$lookup->FilterFields = []; // Skip parent fields if any
			$lookup->FilterValues[] = $keys; // Lookup values
			$pageSize = -1; // Show all records
		} else { // Lookup values
			$lookup->FilterValues[] = Post("v0", Post("lookupValue", ""));
		}
		$cnt = is_array($lookup->FilterFields) ? count($lookup->FilterFields) : 0;
		for ($i = 1; $i <= $cnt; $i++)
			$lookup->FilterValues[] = Post("v" . $i, "");
		$lookup->SearchValue = $searchValue;
		$lookup->PageSize = $pageSize;
		$lookup->Offset = $offset;
		if ($userSelect != "")
			$lookup->UserSelect = $userSelect;
		if ($userFilter != "")
			$lookup->UserFilter = $userFilter;
		if ($userOrderBy != "")
			$lookup->UserOrderBy = $userOrderBy;
		$lookup->toJson($this); // Use settings from current page
	}

	// Set up API request
	public function setupApiRequest()
	{
		global $Security;

		// Check security for API request
		If (ValidApiRequest()) {
			if ($Security->isLoggedIn()) $Security->TablePermission_Loading();
			$Security->loadCurrentUserLevel(Config("PROJECT_ID") . $this->TableName);
			if ($Security->isLoggedIn()) $Security->TablePermission_Loaded();
			$Security->UserID_Loading();
			$Security->loadUserID();
			$Security->UserID_Loaded();
			return TRUE;
		}
		return FALSE;
	}
	public $FormClassName = "ew-horizontal ew-form ew-edit-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;
	public $DbMasterFilter;
	public $DbDetailFilter;
	public $MultiPages; // Multi pages object

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm,
			$FormError, $SkipHeaderFooter;

		// Is modal
		$this->IsModal = (Param("modal") == "1");

		// User profile
		$UserProfile = new UserProfile();

		// Security
		if (!$this->setupApiRequest()) {
			$Security = new AdvancedSecurity();
			if (!$Security->isLoggedIn())
				$Security->autoLogin();
			if ($Security->isLoggedIn())
				$Security->TablePermission_Loading();
			$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName);
			if ($Security->isLoggedIn())
				$Security->TablePermission_Loaded();
			if (!$Security->canEdit()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				if ($Security->canList())
					$this->terminate(GetUrl("t201_userslist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
			if ($Security->isLoggedIn()) {
				$Security->UserID_Loading();
				$Security->loadUserID();
				$Security->UserID_Loaded();
				if (strval($Security->currentUserID()) == "") {
					$this->setFailureMessage(DeniedMessage()); // Set no permission
					$this->terminate(GetUrl("t201_userslist.php"));
					return;
				}
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->EmployeeID->Visible = FALSE;
		$this->LastName->setVisibility();
		$this->FirstName->setVisibility();
		$this->Title->setVisibility();
		$this->TitleOfCourtesy->setVisibility();
		$this->BirthDate->setVisibility();
		$this->HireDate->setVisibility();
		$this->Address->setVisibility();
		$this->City->setVisibility();
		$this->Region->setVisibility();
		$this->PostalCode->setVisibility();
		$this->Country->setVisibility();
		$this->HomePhone->setVisibility();
		$this->Extension->setVisibility();
		$this->_Email->setVisibility();
		$this->Photo->setVisibility();
		$this->Notes->setVisibility();
		$this->ReportsTo->setVisibility();
		$this->Password->setVisibility();
		$this->UserLevel->setVisibility();
		$this->Username->setVisibility();
		$this->Activated->setVisibility();
		$this->Profile->setVisibility();
		$this->sekolah_id->setVisibility();
		$this->tahunajaran_id->setVisibility();
		$this->kelas_id->setVisibility();
		$this->semester_id->setVisibility();
		$this->hideFieldsForAddEdit();

		// Do not use lookup cache
		$this->setUseLookupCache(FALSE);

		// Set up multi page object
		$this->setupMultiPages();

		// Global Page Loading event (in userfn*.php)
		Page_Loading();

		// Page Load event
		$this->Page_Load();

		// Check token
		if (!$this->validPost()) {
			Write($Language->phrase("InvalidPostRequest"));
			$this->terminate();
		}

		// Create Token
		$this->createToken();

		// Set up lookup cache
		$this->setupLookupOptions($this->UserLevel);
		$this->setupLookupOptions($this->sekolah_id);
		$this->setupLookupOptions($this->tahunajaran_id);
		$this->setupLookupOptions($this->kelas_id);
		$this->setupLookupOptions($this->semester_id);

		// Check permission
		if (!$Security->canEdit()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("t201_userslist.php");
			return;
		}

		// Check modal
		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;
		$this->IsMobileOrModal = IsMobile() || $this->IsModal;
		$this->FormClassName = "ew-form ew-edit-form ew-horizontal";
		$loaded = FALSE;
		$postBack = FALSE;

		// Set up current action and primary key
		if (IsApi()) {

			// Load key values
			$loaded = TRUE;
			if (Get("EmployeeID") !== NULL) {
				$this->EmployeeID->setQueryStringValue(Get("EmployeeID"));
				$this->EmployeeID->setOldValue($this->EmployeeID->QueryStringValue);
			} elseif (Key(0) !== NULL) {
				$this->EmployeeID->setQueryStringValue(Key(0));
				$this->EmployeeID->setOldValue($this->EmployeeID->QueryStringValue);
			} elseif (Post("EmployeeID") !== NULL) {
				$this->EmployeeID->setFormValue(Post("EmployeeID"));
				$this->EmployeeID->setOldValue($this->EmployeeID->FormValue);
			} elseif (Route(2) !== NULL) {
				$this->EmployeeID->setQueryStringValue(Route(2));
				$this->EmployeeID->setOldValue($this->EmployeeID->QueryStringValue);
			} else {
				$loaded = FALSE; // Unable to load key
			}

			// Load record
			if ($loaded)
				$loaded = $this->loadRow();
			if (!$loaded) {
				$this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
				$this->terminate();
				return;
			}
			$this->CurrentAction = "update"; // Update record directly
			$postBack = TRUE;
		} else {
			if (Post("action") !== NULL) {
				$this->CurrentAction = Post("action"); // Get action code
				if (!$this->isShow()) // Not reload record, handle as postback
					$postBack = TRUE;

				// Load key from Form
				if ($CurrentForm->hasValue("x_EmployeeID")) {
					$this->EmployeeID->setFormValue($CurrentForm->getValue("x_EmployeeID"));
				}
			} else {
				$this->CurrentAction = "show"; // Default action is display

				// Load key from QueryString / Route
				$loadByQuery = FALSE;
				if (Get("EmployeeID") !== NULL) {
					$this->EmployeeID->setQueryStringValue(Get("EmployeeID"));
					$loadByQuery = TRUE;
				} elseif (Route(2) !== NULL) {
					$this->EmployeeID->setQueryStringValue(Route(2));
					$loadByQuery = TRUE;
				} else {
					$this->EmployeeID->CurrentValue = NULL;
				}
			}

			// Load current record
			$loaded = $this->loadRow();
		}

		// Process form if post back
		if ($postBack) {
			$this->loadFormValues(); // Get form values
		}

		// Validate form if post back
		if ($postBack) {
			if (!$this->validateForm()) {
				$this->setFailureMessage($FormError);
				$this->EventCancelled = TRUE; // Event cancelled
				$this->restoreFormValues();
				if (IsApi()) {
					$this->terminate();
					return;
				} else {
					$this->CurrentAction = ""; // Form error, reset action
				}
			}
		}

		// Perform current action
		switch ($this->CurrentAction) {
			case "show": // Get a record to display
				if (!$loaded) { // Load record based on key
					if ($this->getFailureMessage() == "")
						$this->setFailureMessage($Language->phrase("NoRecord")); // No record found
					$this->terminate("t201_userslist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "t201_userslist.php")
					$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
				$this->SendEmail = TRUE; // Send email on update success
				if ($this->editRow()) { // Update record based on key
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("UpdateSuccess")); // Update success
					if (IsApi()) {
						$this->terminate(TRUE);
						return;
					} else {
						$this->terminate($returnUrl); // Return to caller
					}
				} elseif (IsApi()) { // API request, return
					$this->terminate();
					return;
				} elseif ($this->getFailureMessage() == $Language->phrase("NoRecord")) {
					$this->terminate($returnUrl); // Return to caller
				} else {
					$this->EventCancelled = TRUE; // Event cancelled
					$this->restoreFormValues(); // Restore form values if update failed
				}
		}

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Render the record
		$this->RowType = ROWTYPE_EDIT; // Render as Edit
		$this->resetAttributes();
		$this->renderRow();
	}

	// Get upload files
	protected function getUploadFiles()
	{
		global $CurrentForm, $Language;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'LastName' first before field var 'x_LastName'
		$val = $CurrentForm->hasValue("LastName") ? $CurrentForm->getValue("LastName") : $CurrentForm->getValue("x_LastName");
		if (!$this->LastName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->LastName->Visible = FALSE; // Disable update for API request
			else
				$this->LastName->setFormValue($val);
		}

		// Check field name 'FirstName' first before field var 'x_FirstName'
		$val = $CurrentForm->hasValue("FirstName") ? $CurrentForm->getValue("FirstName") : $CurrentForm->getValue("x_FirstName");
		if (!$this->FirstName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->FirstName->Visible = FALSE; // Disable update for API request
			else
				$this->FirstName->setFormValue($val);
		}

		// Check field name 'Title' first before field var 'x_Title'
		$val = $CurrentForm->hasValue("Title") ? $CurrentForm->getValue("Title") : $CurrentForm->getValue("x_Title");
		if (!$this->Title->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Title->Visible = FALSE; // Disable update for API request
			else
				$this->Title->setFormValue($val);
		}

		// Check field name 'TitleOfCourtesy' first before field var 'x_TitleOfCourtesy'
		$val = $CurrentForm->hasValue("TitleOfCourtesy") ? $CurrentForm->getValue("TitleOfCourtesy") : $CurrentForm->getValue("x_TitleOfCourtesy");
		if (!$this->TitleOfCourtesy->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TitleOfCourtesy->Visible = FALSE; // Disable update for API request
			else
				$this->TitleOfCourtesy->setFormValue($val);
		}

		// Check field name 'BirthDate' first before field var 'x_BirthDate'
		$val = $CurrentForm->hasValue("BirthDate") ? $CurrentForm->getValue("BirthDate") : $CurrentForm->getValue("x_BirthDate");
		if (!$this->BirthDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BirthDate->Visible = FALSE; // Disable update for API request
			else
				$this->BirthDate->setFormValue($val);
			$this->BirthDate->CurrentValue = UnFormatDateTime($this->BirthDate->CurrentValue, 0);
		}

		// Check field name 'HireDate' first before field var 'x_HireDate'
		$val = $CurrentForm->hasValue("HireDate") ? $CurrentForm->getValue("HireDate") : $CurrentForm->getValue("x_HireDate");
		if (!$this->HireDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HireDate->Visible = FALSE; // Disable update for API request
			else
				$this->HireDate->setFormValue($val);
			$this->HireDate->CurrentValue = UnFormatDateTime($this->HireDate->CurrentValue, 0);
		}

		// Check field name 'Address' first before field var 'x_Address'
		$val = $CurrentForm->hasValue("Address") ? $CurrentForm->getValue("Address") : $CurrentForm->getValue("x_Address");
		if (!$this->Address->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Address->Visible = FALSE; // Disable update for API request
			else
				$this->Address->setFormValue($val);
		}

		// Check field name 'City' first before field var 'x_City'
		$val = $CurrentForm->hasValue("City") ? $CurrentForm->getValue("City") : $CurrentForm->getValue("x_City");
		if (!$this->City->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->City->Visible = FALSE; // Disable update for API request
			else
				$this->City->setFormValue($val);
		}

		// Check field name 'Region' first before field var 'x_Region'
		$val = $CurrentForm->hasValue("Region") ? $CurrentForm->getValue("Region") : $CurrentForm->getValue("x_Region");
		if (!$this->Region->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Region->Visible = FALSE; // Disable update for API request
			else
				$this->Region->setFormValue($val);
		}

		// Check field name 'PostalCode' first before field var 'x_PostalCode'
		$val = $CurrentForm->hasValue("PostalCode") ? $CurrentForm->getValue("PostalCode") : $CurrentForm->getValue("x_PostalCode");
		if (!$this->PostalCode->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PostalCode->Visible = FALSE; // Disable update for API request
			else
				$this->PostalCode->setFormValue($val);
		}

		// Check field name 'Country' first before field var 'x_Country'
		$val = $CurrentForm->hasValue("Country") ? $CurrentForm->getValue("Country") : $CurrentForm->getValue("x_Country");
		if (!$this->Country->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Country->Visible = FALSE; // Disable update for API request
			else
				$this->Country->setFormValue($val);
		}

		// Check field name 'HomePhone' first before field var 'x_HomePhone'
		$val = $CurrentForm->hasValue("HomePhone") ? $CurrentForm->getValue("HomePhone") : $CurrentForm->getValue("x_HomePhone");
		if (!$this->HomePhone->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HomePhone->Visible = FALSE; // Disable update for API request
			else
				$this->HomePhone->setFormValue($val);
		}

		// Check field name 'Extension' first before field var 'x_Extension'
		$val = $CurrentForm->hasValue("Extension") ? $CurrentForm->getValue("Extension") : $CurrentForm->getValue("x_Extension");
		if (!$this->Extension->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Extension->Visible = FALSE; // Disable update for API request
			else
				$this->Extension->setFormValue($val);
		}

		// Check field name 'Email' first before field var 'x__Email'
		$val = $CurrentForm->hasValue("Email") ? $CurrentForm->getValue("Email") : $CurrentForm->getValue("x__Email");
		if (!$this->_Email->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->_Email->Visible = FALSE; // Disable update for API request
			else
				$this->_Email->setFormValue($val);
		}

		// Check field name 'Photo' first before field var 'x_Photo'
		$val = $CurrentForm->hasValue("Photo") ? $CurrentForm->getValue("Photo") : $CurrentForm->getValue("x_Photo");
		if (!$this->Photo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Photo->Visible = FALSE; // Disable update for API request
			else
				$this->Photo->setFormValue($val);
		}

		// Check field name 'Notes' first before field var 'x_Notes'
		$val = $CurrentForm->hasValue("Notes") ? $CurrentForm->getValue("Notes") : $CurrentForm->getValue("x_Notes");
		if (!$this->Notes->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Notes->Visible = FALSE; // Disable update for API request
			else
				$this->Notes->setFormValue($val);
		}

		// Check field name 'ReportsTo' first before field var 'x_ReportsTo'
		$val = $CurrentForm->hasValue("ReportsTo") ? $CurrentForm->getValue("ReportsTo") : $CurrentForm->getValue("x_ReportsTo");
		if (!$this->ReportsTo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ReportsTo->Visible = FALSE; // Disable update for API request
			else
				$this->ReportsTo->setFormValue($val);
		}

		// Check field name 'Password' first before field var 'x_Password'
		$val = $CurrentForm->hasValue("Password") ? $CurrentForm->getValue("Password") : $CurrentForm->getValue("x_Password");
		if (!$this->Password->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Password->Visible = FALSE; // Disable update for API request
			else
				if (Config("ENCRYPTED_PASSWORD")) // Encrypted password, use raw value
					$this->Password->setRawFormValue($val);
				else
					$this->Password->setFormValue($val);
		}

		// Check field name 'UserLevel' first before field var 'x_UserLevel'
		$val = $CurrentForm->hasValue("UserLevel") ? $CurrentForm->getValue("UserLevel") : $CurrentForm->getValue("x_UserLevel");
		if (!$this->UserLevel->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->UserLevel->Visible = FALSE; // Disable update for API request
			else
				$this->UserLevel->setFormValue($val);
		}

		// Check field name 'Username' first before field var 'x_Username'
		$val = $CurrentForm->hasValue("Username") ? $CurrentForm->getValue("Username") : $CurrentForm->getValue("x_Username");
		if (!$this->Username->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Username->Visible = FALSE; // Disable update for API request
			else
				$this->Username->setFormValue($val);
		}

		// Check field name 'Activated' first before field var 'x_Activated'
		$val = $CurrentForm->hasValue("Activated") ? $CurrentForm->getValue("Activated") : $CurrentForm->getValue("x_Activated");
		if (!$this->Activated->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Activated->Visible = FALSE; // Disable update for API request
			else
				$this->Activated->setFormValue($val);
		}

		// Check field name 'Profile' first before field var 'x_Profile'
		$val = $CurrentForm->hasValue("Profile") ? $CurrentForm->getValue("Profile") : $CurrentForm->getValue("x_Profile");
		if (!$this->Profile->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Profile->Visible = FALSE; // Disable update for API request
			else
				$this->Profile->setFormValue($val);
		}

		// Check field name 'sekolah_id' first before field var 'x_sekolah_id'
		$val = $CurrentForm->hasValue("sekolah_id") ? $CurrentForm->getValue("sekolah_id") : $CurrentForm->getValue("x_sekolah_id");
		if (!$this->sekolah_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->sekolah_id->Visible = FALSE; // Disable update for API request
			else
				$this->sekolah_id->setFormValue($val);
		}

		// Check field name 'tahunajaran_id' first before field var 'x_tahunajaran_id'
		$val = $CurrentForm->hasValue("tahunajaran_id") ? $CurrentForm->getValue("tahunajaran_id") : $CurrentForm->getValue("x_tahunajaran_id");
		if (!$this->tahunajaran_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->tahunajaran_id->Visible = FALSE; // Disable update for API request
			else
				$this->tahunajaran_id->setFormValue($val);
		}

		// Check field name 'kelas_id' first before field var 'x_kelas_id'
		$val = $CurrentForm->hasValue("kelas_id") ? $CurrentForm->getValue("kelas_id") : $CurrentForm->getValue("x_kelas_id");
		if (!$this->kelas_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->kelas_id->Visible = FALSE; // Disable update for API request
			else
				$this->kelas_id->setFormValue($val);
		}

		// Check field name 'semester_id' first before field var 'x_semester_id'
		$val = $CurrentForm->hasValue("semester_id") ? $CurrentForm->getValue("semester_id") : $CurrentForm->getValue("x_semester_id");
		if (!$this->semester_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->semester_id->Visible = FALSE; // Disable update for API request
			else
				$this->semester_id->setFormValue($val);
		}

		// Check field name 'EmployeeID' first before field var 'x_EmployeeID'
		$val = $CurrentForm->hasValue("EmployeeID") ? $CurrentForm->getValue("EmployeeID") : $CurrentForm->getValue("x_EmployeeID");
		if (!$this->EmployeeID->IsDetailKey)
			$this->EmployeeID->setFormValue($val);
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->EmployeeID->CurrentValue = $this->EmployeeID->FormValue;
		$this->LastName->CurrentValue = $this->LastName->FormValue;
		$this->FirstName->CurrentValue = $this->FirstName->FormValue;
		$this->Title->CurrentValue = $this->Title->FormValue;
		$this->TitleOfCourtesy->CurrentValue = $this->TitleOfCourtesy->FormValue;
		$this->BirthDate->CurrentValue = $this->BirthDate->FormValue;
		$this->BirthDate->CurrentValue = UnFormatDateTime($this->BirthDate->CurrentValue, 0);
		$this->HireDate->CurrentValue = $this->HireDate->FormValue;
		$this->HireDate->CurrentValue = UnFormatDateTime($this->HireDate->CurrentValue, 0);
		$this->Address->CurrentValue = $this->Address->FormValue;
		$this->City->CurrentValue = $this->City->FormValue;
		$this->Region->CurrentValue = $this->Region->FormValue;
		$this->PostalCode->CurrentValue = $this->PostalCode->FormValue;
		$this->Country->CurrentValue = $this->Country->FormValue;
		$this->HomePhone->CurrentValue = $this->HomePhone->FormValue;
		$this->Extension->CurrentValue = $this->Extension->FormValue;
		$this->_Email->CurrentValue = $this->_Email->FormValue;
		$this->Photo->CurrentValue = $this->Photo->FormValue;
		$this->Notes->CurrentValue = $this->Notes->FormValue;
		$this->ReportsTo->CurrentValue = $this->ReportsTo->FormValue;
		$this->Password->CurrentValue = $this->Password->FormValue;
		$this->UserLevel->CurrentValue = $this->UserLevel->FormValue;
		$this->Username->CurrentValue = $this->Username->FormValue;
		$this->Activated->CurrentValue = $this->Activated->FormValue;
		$this->Profile->CurrentValue = $this->Profile->FormValue;
		$this->sekolah_id->CurrentValue = $this->sekolah_id->FormValue;
		$this->tahunajaran_id->CurrentValue = $this->tahunajaran_id->FormValue;
		$this->kelas_id->CurrentValue = $this->kelas_id->FormValue;
		$this->semester_id->CurrentValue = $this->semester_id->FormValue;
	}

	// Load row based on key values
	public function loadRow()
	{
		global $Security, $Language;
		$filter = $this->getRecordFilter();

		// Call Row Selecting event
		$this->Row_Selecting($filter);

		// Load SQL based on filter
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn = $this->getConnection();
		$res = FALSE;
		$rs = LoadRecordset($sql, $conn);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->loadRowValues($rs); // Load row values
			$rs->close();
		}

		// Check if valid User ID
		if ($res) {
			$res = $this->showOptionLink('edit');
			if (!$res) {
				$userIdMsg = DeniedMessage();
				$this->setFailureMessage($userIdMsg);
			}
		}
		return $res;
	}

	// Load row values from recordset
	public function loadRowValues($rs = NULL)
	{
		if ($rs && !$rs->EOF)
			$row = $rs->fields;
		else
			$row = $this->newRow();

		// Call Row Selected event
		$this->Row_Selected($row);
		if (!$rs || $rs->EOF)
			return;
		$this->EmployeeID->setDbValue($row['EmployeeID']);
		$this->LastName->setDbValue($row['LastName']);
		$this->FirstName->setDbValue($row['FirstName']);
		$this->Title->setDbValue($row['Title']);
		$this->TitleOfCourtesy->setDbValue($row['TitleOfCourtesy']);
		$this->BirthDate->setDbValue($row['BirthDate']);
		$this->HireDate->setDbValue($row['HireDate']);
		$this->Address->setDbValue($row['Address']);
		$this->City->setDbValue($row['City']);
		$this->Region->setDbValue($row['Region']);
		$this->PostalCode->setDbValue($row['PostalCode']);
		$this->Country->setDbValue($row['Country']);
		$this->HomePhone->setDbValue($row['HomePhone']);
		$this->Extension->setDbValue($row['Extension']);
		$this->_Email->setDbValue($row['Email']);
		$this->Photo->setDbValue($row['Photo']);
		$this->Notes->setDbValue($row['Notes']);
		$this->ReportsTo->setDbValue($row['ReportsTo']);
		$this->Password->setDbValue($row['Password']);
		$this->UserLevel->setDbValue($row['UserLevel']);
		$this->Username->setDbValue($row['Username']);
		$this->Activated->setDbValue($row['Activated']);
		$this->Profile->setDbValue($row['Profile']);
		$this->sekolah_id->setDbValue($row['sekolah_id']);
		$this->tahunajaran_id->setDbValue($row['tahunajaran_id']);
		$this->kelas_id->setDbValue($row['kelas_id']);
		$this->semester_id->setDbValue($row['semester_id']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['EmployeeID'] = NULL;
		$row['LastName'] = NULL;
		$row['FirstName'] = NULL;
		$row['Title'] = NULL;
		$row['TitleOfCourtesy'] = NULL;
		$row['BirthDate'] = NULL;
		$row['HireDate'] = NULL;
		$row['Address'] = NULL;
		$row['City'] = NULL;
		$row['Region'] = NULL;
		$row['PostalCode'] = NULL;
		$row['Country'] = NULL;
		$row['HomePhone'] = NULL;
		$row['Extension'] = NULL;
		$row['Email'] = NULL;
		$row['Photo'] = NULL;
		$row['Notes'] = NULL;
		$row['ReportsTo'] = NULL;
		$row['Password'] = NULL;
		$row['UserLevel'] = NULL;
		$row['Username'] = NULL;
		$row['Activated'] = NULL;
		$row['Profile'] = NULL;
		$row['sekolah_id'] = NULL;
		$row['tahunajaran_id'] = NULL;
		$row['kelas_id'] = NULL;
		$row['semester_id'] = NULL;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("EmployeeID")) != "")
			$this->EmployeeID->OldValue = $this->getKey("EmployeeID"); // EmployeeID
		else
			$validKey = FALSE;

		// Load old record
		$this->OldRecordset = NULL;
		if ($validKey) {
			$this->CurrentFilter = $this->getRecordFilter();
			$sql = $this->getCurrentSql();
			$conn = $this->getConnection();
			$this->OldRecordset = LoadRecordset($sql, $conn);
		}
		$this->loadRowValues($this->OldRecordset); // Load row values
		return $validKey;
	}

	// Render row values based on field settings
	public function renderRow()
	{
		global $Security, $Language, $CurrentLanguage;

		// Initialize URLs
		// Call Row_Rendering event

		$this->Row_Rendering();

		// Common render codes for all row types
		// EmployeeID
		// LastName
		// FirstName
		// Title
		// TitleOfCourtesy
		// BirthDate
		// HireDate
		// Address
		// City
		// Region
		// PostalCode
		// Country
		// HomePhone
		// Extension
		// Email
		// Photo
		// Notes
		// ReportsTo
		// Password
		// UserLevel
		// Username
		// Activated
		// Profile
		// sekolah_id
		// tahunajaran_id
		// kelas_id
		// semester_id

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// EmployeeID
			$this->EmployeeID->ViewValue = $this->EmployeeID->CurrentValue;
			$this->EmployeeID->ViewCustomAttributes = "";

			// LastName
			$this->LastName->ViewValue = $this->LastName->CurrentValue;
			$this->LastName->ViewCustomAttributes = "";

			// FirstName
			$this->FirstName->ViewValue = $this->FirstName->CurrentValue;
			$this->FirstName->ViewCustomAttributes = "";

			// Title
			$this->Title->ViewValue = $this->Title->CurrentValue;
			$this->Title->ViewCustomAttributes = "";

			// TitleOfCourtesy
			$this->TitleOfCourtesy->ViewValue = $this->TitleOfCourtesy->CurrentValue;
			$this->TitleOfCourtesy->ViewCustomAttributes = "";

			// BirthDate
			$this->BirthDate->ViewValue = $this->BirthDate->CurrentValue;
			$this->BirthDate->ViewValue = FormatDateTime($this->BirthDate->ViewValue, 0);
			$this->BirthDate->ViewCustomAttributes = "";

			// HireDate
			$this->HireDate->ViewValue = $this->HireDate->CurrentValue;
			$this->HireDate->ViewValue = FormatDateTime($this->HireDate->ViewValue, 0);
			$this->HireDate->ViewCustomAttributes = "";

			// Address
			$this->Address->ViewValue = $this->Address->CurrentValue;
			$this->Address->ViewCustomAttributes = "";

			// City
			$this->City->ViewValue = $this->City->CurrentValue;
			$this->City->ViewCustomAttributes = "";

			// Region
			$this->Region->ViewValue = $this->Region->CurrentValue;
			$this->Region->ViewCustomAttributes = "";

			// PostalCode
			$this->PostalCode->ViewValue = $this->PostalCode->CurrentValue;
			$this->PostalCode->ViewCustomAttributes = "";

			// Country
			$this->Country->ViewValue = $this->Country->CurrentValue;
			$this->Country->ViewCustomAttributes = "";

			// HomePhone
			$this->HomePhone->ViewValue = $this->HomePhone->CurrentValue;
			$this->HomePhone->ViewCustomAttributes = "";

			// Extension
			$this->Extension->ViewValue = $this->Extension->CurrentValue;
			$this->Extension->ViewCustomAttributes = "";

			// Email
			$this->_Email->ViewValue = $this->_Email->CurrentValue;
			$this->_Email->ViewCustomAttributes = "";

			// Photo
			$this->Photo->ViewValue = $this->Photo->CurrentValue;
			$this->Photo->ViewCustomAttributes = "";

			// Notes
			$this->Notes->ViewValue = $this->Notes->CurrentValue;
			$this->Notes->ViewCustomAttributes = "";

			// ReportsTo
			$this->ReportsTo->ViewValue = $this->ReportsTo->CurrentValue;
			$this->ReportsTo->ViewValue = FormatNumber($this->ReportsTo->ViewValue, 0, -2, -2, -2);
			$this->ReportsTo->ViewCustomAttributes = "";

			// Password
			$this->Password->ViewValue = $this->Password->CurrentValue;
			$this->Password->ViewCustomAttributes = "";

			// UserLevel
			if ($Security->canAdmin()) { // System admin
				$curVal = strval($this->UserLevel->CurrentValue);
				if ($curVal != "") {
					$this->UserLevel->ViewValue = $this->UserLevel->lookupCacheOption($curVal);
					if ($this->UserLevel->ViewValue === NULL) { // Lookup from database
						$filterWrk = "`userlevelid`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
						$sqlWrk = $this->UserLevel->Lookup->getSql(FALSE, $filterWrk, '', $this);
						$rswrk = Conn()->execute($sqlWrk);
						if ($rswrk && !$rswrk->EOF) { // Lookup values found
							$arwrk = [];
							$arwrk[1] = $rswrk->fields('df');
							$this->UserLevel->ViewValue = $this->UserLevel->displayValue($arwrk);
							$rswrk->Close();
						} else {
							$this->UserLevel->ViewValue = $this->UserLevel->CurrentValue;
						}
					}
				} else {
					$this->UserLevel->ViewValue = NULL;
				}
			} else {
				$this->UserLevel->ViewValue = $Language->phrase("PasswordMask");
			}
			$this->UserLevel->ViewCustomAttributes = "";

			// Username
			$this->Username->ViewValue = $this->Username->CurrentValue;
			$this->Username->ViewCustomAttributes = "";

			// Activated
			if (ConvertToBool($this->Activated->CurrentValue)) {
				$this->Activated->ViewValue = $this->Activated->tagCaption(1) != "" ? $this->Activated->tagCaption(1) : "Y";
			} else {
				$this->Activated->ViewValue = $this->Activated->tagCaption(2) != "" ? $this->Activated->tagCaption(2) : "N";
			}
			$this->Activated->ViewCustomAttributes = "";

			// Profile
			$this->Profile->ViewValue = $this->Profile->CurrentValue;
			$this->Profile->ViewCustomAttributes = "";

			// sekolah_id
			$curVal = strval($this->sekolah_id->CurrentValue);
			if ($curVal != "") {
				$this->sekolah_id->ViewValue = $this->sekolah_id->lookupCacheOption($curVal);
				if ($this->sekolah_id->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->sekolah_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->sekolah_id->ViewValue = $this->sekolah_id->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->sekolah_id->ViewValue = $this->sekolah_id->CurrentValue;
					}
				}
			} else {
				$this->sekolah_id->ViewValue = NULL;
			}
			$this->sekolah_id->ViewCustomAttributes = "";

			// tahunajaran_id
			$curVal = strval($this->tahunajaran_id->CurrentValue);
			if ($curVal != "") {
				$this->tahunajaran_id->ViewValue = $this->tahunajaran_id->lookupCacheOption($curVal);
				if ($this->tahunajaran_id->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->tahunajaran_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->tahunajaran_id->ViewValue = $this->tahunajaran_id->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->tahunajaran_id->ViewValue = $this->tahunajaran_id->CurrentValue;
					}
				}
			} else {
				$this->tahunajaran_id->ViewValue = NULL;
			}
			$this->tahunajaran_id->ViewCustomAttributes = "";

			// kelas_id
			$curVal = strval($this->kelas_id->CurrentValue);
			if ($curVal != "") {
				$this->kelas_id->ViewValue = $this->kelas_id->lookupCacheOption($curVal);
				if ($this->kelas_id->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->kelas_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->kelas_id->ViewValue = $this->kelas_id->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->kelas_id->ViewValue = $this->kelas_id->CurrentValue;
					}
				}
			} else {
				$this->kelas_id->ViewValue = NULL;
			}
			$this->kelas_id->ViewCustomAttributes = "";

			// semester_id
			$curVal = strval($this->semester_id->CurrentValue);
			if ($curVal != "") {
				$this->semester_id->ViewValue = $this->semester_id->lookupCacheOption($curVal);
				if ($this->semester_id->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->semester_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->semester_id->ViewValue = $this->semester_id->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->semester_id->ViewValue = $this->semester_id->CurrentValue;
					}
				}
			} else {
				$this->semester_id->ViewValue = NULL;
			}
			$this->semester_id->ViewCustomAttributes = "";

			// LastName
			$this->LastName->LinkCustomAttributes = "";
			$this->LastName->HrefValue = "";
			$this->LastName->TooltipValue = "";

			// FirstName
			$this->FirstName->LinkCustomAttributes = "";
			$this->FirstName->HrefValue = "";
			$this->FirstName->TooltipValue = "";

			// Title
			$this->Title->LinkCustomAttributes = "";
			$this->Title->HrefValue = "";
			$this->Title->TooltipValue = "";

			// TitleOfCourtesy
			$this->TitleOfCourtesy->LinkCustomAttributes = "";
			$this->TitleOfCourtesy->HrefValue = "";
			$this->TitleOfCourtesy->TooltipValue = "";

			// BirthDate
			$this->BirthDate->LinkCustomAttributes = "";
			$this->BirthDate->HrefValue = "";
			$this->BirthDate->TooltipValue = "";

			// HireDate
			$this->HireDate->LinkCustomAttributes = "";
			$this->HireDate->HrefValue = "";
			$this->HireDate->TooltipValue = "";

			// Address
			$this->Address->LinkCustomAttributes = "";
			$this->Address->HrefValue = "";
			$this->Address->TooltipValue = "";

			// City
			$this->City->LinkCustomAttributes = "";
			$this->City->HrefValue = "";
			$this->City->TooltipValue = "";

			// Region
			$this->Region->LinkCustomAttributes = "";
			$this->Region->HrefValue = "";
			$this->Region->TooltipValue = "";

			// PostalCode
			$this->PostalCode->LinkCustomAttributes = "";
			$this->PostalCode->HrefValue = "";
			$this->PostalCode->TooltipValue = "";

			// Country
			$this->Country->LinkCustomAttributes = "";
			$this->Country->HrefValue = "";
			$this->Country->TooltipValue = "";

			// HomePhone
			$this->HomePhone->LinkCustomAttributes = "";
			$this->HomePhone->HrefValue = "";
			$this->HomePhone->TooltipValue = "";

			// Extension
			$this->Extension->LinkCustomAttributes = "";
			$this->Extension->HrefValue = "";
			$this->Extension->TooltipValue = "";

			// Email
			$this->_Email->LinkCustomAttributes = "";
			$this->_Email->HrefValue = "";
			$this->_Email->TooltipValue = "";

			// Photo
			$this->Photo->LinkCustomAttributes = "";
			$this->Photo->HrefValue = "";
			$this->Photo->TooltipValue = "";

			// Notes
			$this->Notes->LinkCustomAttributes = "";
			$this->Notes->HrefValue = "";
			$this->Notes->TooltipValue = "";

			// ReportsTo
			$this->ReportsTo->LinkCustomAttributes = "";
			$this->ReportsTo->HrefValue = "";
			$this->ReportsTo->TooltipValue = "";

			// Password
			$this->Password->LinkCustomAttributes = "";
			$this->Password->HrefValue = "";
			$this->Password->TooltipValue = "";

			// UserLevel
			$this->UserLevel->LinkCustomAttributes = "";
			$this->UserLevel->HrefValue = "";
			$this->UserLevel->TooltipValue = "";

			// Username
			$this->Username->LinkCustomAttributes = "";
			$this->Username->HrefValue = "";
			$this->Username->TooltipValue = "";

			// Activated
			$this->Activated->LinkCustomAttributes = "";
			$this->Activated->HrefValue = "";
			$this->Activated->TooltipValue = "";

			// Profile
			$this->Profile->LinkCustomAttributes = "";
			$this->Profile->HrefValue = "";
			$this->Profile->TooltipValue = "";

			// sekolah_id
			$this->sekolah_id->LinkCustomAttributes = "";
			$this->sekolah_id->HrefValue = "";
			$this->sekolah_id->TooltipValue = "";

			// tahunajaran_id
			$this->tahunajaran_id->LinkCustomAttributes = "";
			$this->tahunajaran_id->HrefValue = "";
			$this->tahunajaran_id->TooltipValue = "";

			// kelas_id
			$this->kelas_id->LinkCustomAttributes = "";
			$this->kelas_id->HrefValue = "";
			$this->kelas_id->TooltipValue = "";

			// semester_id
			$this->semester_id->LinkCustomAttributes = "";
			$this->semester_id->HrefValue = "";
			$this->semester_id->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// LastName
			$this->LastName->EditAttrs["class"] = "form-control";
			$this->LastName->EditCustomAttributes = "";
			if (!$this->LastName->Raw)
				$this->LastName->CurrentValue = HtmlDecode($this->LastName->CurrentValue);
			$this->LastName->EditValue = HtmlEncode($this->LastName->CurrentValue);
			$this->LastName->PlaceHolder = RemoveHtml($this->LastName->caption());

			// FirstName
			$this->FirstName->EditAttrs["class"] = "form-control";
			$this->FirstName->EditCustomAttributes = "";
			if (!$this->FirstName->Raw)
				$this->FirstName->CurrentValue = HtmlDecode($this->FirstName->CurrentValue);
			$this->FirstName->EditValue = HtmlEncode($this->FirstName->CurrentValue);
			$this->FirstName->PlaceHolder = RemoveHtml($this->FirstName->caption());

			// Title
			$this->Title->EditAttrs["class"] = "form-control";
			$this->Title->EditCustomAttributes = "";
			if (!$this->Title->Raw)
				$this->Title->CurrentValue = HtmlDecode($this->Title->CurrentValue);
			$this->Title->EditValue = HtmlEncode($this->Title->CurrentValue);
			$this->Title->PlaceHolder = RemoveHtml($this->Title->caption());

			// TitleOfCourtesy
			$this->TitleOfCourtesy->EditAttrs["class"] = "form-control";
			$this->TitleOfCourtesy->EditCustomAttributes = "";
			if (!$this->TitleOfCourtesy->Raw)
				$this->TitleOfCourtesy->CurrentValue = HtmlDecode($this->TitleOfCourtesy->CurrentValue);
			$this->TitleOfCourtesy->EditValue = HtmlEncode($this->TitleOfCourtesy->CurrentValue);
			$this->TitleOfCourtesy->PlaceHolder = RemoveHtml($this->TitleOfCourtesy->caption());

			// BirthDate
			$this->BirthDate->EditAttrs["class"] = "form-control";
			$this->BirthDate->EditCustomAttributes = "";
			$this->BirthDate->EditValue = HtmlEncode(FormatDateTime($this->BirthDate->CurrentValue, 8));
			$this->BirthDate->PlaceHolder = RemoveHtml($this->BirthDate->caption());

			// HireDate
			$this->HireDate->EditAttrs["class"] = "form-control";
			$this->HireDate->EditCustomAttributes = "";
			$this->HireDate->EditValue = HtmlEncode(FormatDateTime($this->HireDate->CurrentValue, 8));
			$this->HireDate->PlaceHolder = RemoveHtml($this->HireDate->caption());

			// Address
			$this->Address->EditAttrs["class"] = "form-control";
			$this->Address->EditCustomAttributes = "";
			if (!$this->Address->Raw)
				$this->Address->CurrentValue = HtmlDecode($this->Address->CurrentValue);
			$this->Address->EditValue = HtmlEncode($this->Address->CurrentValue);
			$this->Address->PlaceHolder = RemoveHtml($this->Address->caption());

			// City
			$this->City->EditAttrs["class"] = "form-control";
			$this->City->EditCustomAttributes = "";
			if (!$this->City->Raw)
				$this->City->CurrentValue = HtmlDecode($this->City->CurrentValue);
			$this->City->EditValue = HtmlEncode($this->City->CurrentValue);
			$this->City->PlaceHolder = RemoveHtml($this->City->caption());

			// Region
			$this->Region->EditAttrs["class"] = "form-control";
			$this->Region->EditCustomAttributes = "";
			if (!$this->Region->Raw)
				$this->Region->CurrentValue = HtmlDecode($this->Region->CurrentValue);
			$this->Region->EditValue = HtmlEncode($this->Region->CurrentValue);
			$this->Region->PlaceHolder = RemoveHtml($this->Region->caption());

			// PostalCode
			$this->PostalCode->EditAttrs["class"] = "form-control";
			$this->PostalCode->EditCustomAttributes = "";
			if (!$this->PostalCode->Raw)
				$this->PostalCode->CurrentValue = HtmlDecode($this->PostalCode->CurrentValue);
			$this->PostalCode->EditValue = HtmlEncode($this->PostalCode->CurrentValue);
			$this->PostalCode->PlaceHolder = RemoveHtml($this->PostalCode->caption());

			// Country
			$this->Country->EditAttrs["class"] = "form-control";
			$this->Country->EditCustomAttributes = "";
			if (!$this->Country->Raw)
				$this->Country->CurrentValue = HtmlDecode($this->Country->CurrentValue);
			$this->Country->EditValue = HtmlEncode($this->Country->CurrentValue);
			$this->Country->PlaceHolder = RemoveHtml($this->Country->caption());

			// HomePhone
			$this->HomePhone->EditAttrs["class"] = "form-control";
			$this->HomePhone->EditCustomAttributes = "";
			if (!$this->HomePhone->Raw)
				$this->HomePhone->CurrentValue = HtmlDecode($this->HomePhone->CurrentValue);
			$this->HomePhone->EditValue = HtmlEncode($this->HomePhone->CurrentValue);
			$this->HomePhone->PlaceHolder = RemoveHtml($this->HomePhone->caption());

			// Extension
			$this->Extension->EditAttrs["class"] = "form-control";
			$this->Extension->EditCustomAttributes = "";
			if (!$this->Extension->Raw)
				$this->Extension->CurrentValue = HtmlDecode($this->Extension->CurrentValue);
			$this->Extension->EditValue = HtmlEncode($this->Extension->CurrentValue);
			$this->Extension->PlaceHolder = RemoveHtml($this->Extension->caption());

			// Email
			$this->_Email->EditAttrs["class"] = "form-control";
			$this->_Email->EditCustomAttributes = "";
			if (!$this->_Email->Raw)
				$this->_Email->CurrentValue = HtmlDecode($this->_Email->CurrentValue);
			$this->_Email->EditValue = HtmlEncode($this->_Email->CurrentValue);
			$this->_Email->PlaceHolder = RemoveHtml($this->_Email->caption());

			// Photo
			$this->Photo->EditAttrs["class"] = "form-control";
			$this->Photo->EditCustomAttributes = "";
			if (!$this->Photo->Raw)
				$this->Photo->CurrentValue = HtmlDecode($this->Photo->CurrentValue);
			$this->Photo->EditValue = HtmlEncode($this->Photo->CurrentValue);
			$this->Photo->PlaceHolder = RemoveHtml($this->Photo->caption());

			// Notes
			$this->Notes->EditAttrs["class"] = "form-control";
			$this->Notes->EditCustomAttributes = "";
			$this->Notes->EditValue = HtmlEncode($this->Notes->CurrentValue);
			$this->Notes->PlaceHolder = RemoveHtml($this->Notes->caption());

			// ReportsTo
			$this->ReportsTo->EditAttrs["class"] = "form-control";
			$this->ReportsTo->EditCustomAttributes = "";
			$this->ReportsTo->EditValue = HtmlEncode($this->ReportsTo->CurrentValue);
			$this->ReportsTo->PlaceHolder = RemoveHtml($this->ReportsTo->caption());

			// Password
			$this->Password->EditAttrs["class"] = "form-control";
			$this->Password->EditCustomAttributes = "";
			if (!$this->Password->Raw)
				$this->Password->CurrentValue = HtmlDecode($this->Password->CurrentValue);
			$this->Password->EditValue = HtmlEncode($this->Password->CurrentValue);
			$this->Password->PlaceHolder = RemoveHtml($this->Password->caption());

			// UserLevel
			$this->UserLevel->EditAttrs["class"] = "form-control";
			$this->UserLevel->EditCustomAttributes = "";
			if (!$Security->canAdmin()) { // System admin
				$this->UserLevel->EditValue = $Language->phrase("PasswordMask");
			} else {
				$curVal = trim(strval($this->UserLevel->CurrentValue));
				if ($curVal != "")
					$this->UserLevel->ViewValue = $this->UserLevel->lookupCacheOption($curVal);
				else
					$this->UserLevel->ViewValue = $this->UserLevel->Lookup !== NULL && is_array($this->UserLevel->Lookup->Options) ? $curVal : NULL;
				if ($this->UserLevel->ViewValue !== NULL) { // Load from cache
					$this->UserLevel->EditValue = array_values($this->UserLevel->Lookup->Options);
				} else { // Lookup from database
					if ($curVal == "") {
						$filterWrk = "0=1";
					} else {
						$filterWrk = "`userlevelid`" . SearchString("=", $this->UserLevel->CurrentValue, DATATYPE_NUMBER, "");
					}
					$sqlWrk = $this->UserLevel->Lookup->getSql(TRUE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					$arwrk = $rswrk ? $rswrk->getRows() : [];
					if ($rswrk)
						$rswrk->close();
					$this->UserLevel->EditValue = $arwrk;
				}
			}

			// Username
			$this->Username->EditAttrs["class"] = "form-control";
			$this->Username->EditCustomAttributes = "";
			if (!$this->Username->Raw)
				$this->Username->CurrentValue = HtmlDecode($this->Username->CurrentValue);
			$this->Username->EditValue = HtmlEncode($this->Username->CurrentValue);
			$this->Username->PlaceHolder = RemoveHtml($this->Username->caption());

			// Activated
			$this->Activated->EditCustomAttributes = "";
			$this->Activated->EditValue = $this->Activated->options(FALSE);

			// Profile
			$this->Profile->EditAttrs["class"] = "form-control";
			$this->Profile->EditCustomAttributes = "";
			$this->Profile->EditValue = HtmlEncode($this->Profile->CurrentValue);
			$this->Profile->PlaceHolder = RemoveHtml($this->Profile->caption());

			// sekolah_id
			$this->sekolah_id->EditAttrs["class"] = "form-control";
			$this->sekolah_id->EditCustomAttributes = "";
			$curVal = trim(strval($this->sekolah_id->CurrentValue));
			if ($curVal != "")
				$this->sekolah_id->ViewValue = $this->sekolah_id->lookupCacheOption($curVal);
			else
				$this->sekolah_id->ViewValue = $this->sekolah_id->Lookup !== NULL && is_array($this->sekolah_id->Lookup->Options) ? $curVal : NULL;
			if ($this->sekolah_id->ViewValue !== NULL) { // Load from cache
				$this->sekolah_id->EditValue = array_values($this->sekolah_id->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->sekolah_id->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->sekolah_id->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->sekolah_id->EditValue = $arwrk;
			}

			// tahunajaran_id
			$this->tahunajaran_id->EditAttrs["class"] = "form-control";
			$this->tahunajaran_id->EditCustomAttributes = "";
			$curVal = trim(strval($this->tahunajaran_id->CurrentValue));
			if ($curVal != "")
				$this->tahunajaran_id->ViewValue = $this->tahunajaran_id->lookupCacheOption($curVal);
			else
				$this->tahunajaran_id->ViewValue = $this->tahunajaran_id->Lookup !== NULL && is_array($this->tahunajaran_id->Lookup->Options) ? $curVal : NULL;
			if ($this->tahunajaran_id->ViewValue !== NULL) { // Load from cache
				$this->tahunajaran_id->EditValue = array_values($this->tahunajaran_id->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->tahunajaran_id->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->tahunajaran_id->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->tahunajaran_id->EditValue = $arwrk;
			}

			// kelas_id
			$this->kelas_id->EditAttrs["class"] = "form-control";
			$this->kelas_id->EditCustomAttributes = "";
			$curVal = trim(strval($this->kelas_id->CurrentValue));
			if ($curVal != "")
				$this->kelas_id->ViewValue = $this->kelas_id->lookupCacheOption($curVal);
			else
				$this->kelas_id->ViewValue = $this->kelas_id->Lookup !== NULL && is_array($this->kelas_id->Lookup->Options) ? $curVal : NULL;
			if ($this->kelas_id->ViewValue !== NULL) { // Load from cache
				$this->kelas_id->EditValue = array_values($this->kelas_id->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->kelas_id->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->kelas_id->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->kelas_id->EditValue = $arwrk;
			}

			// semester_id
			$this->semester_id->EditAttrs["class"] = "form-control";
			$this->semester_id->EditCustomAttributes = "";
			$curVal = trim(strval($this->semester_id->CurrentValue));
			if ($curVal != "")
				$this->semester_id->ViewValue = $this->semester_id->lookupCacheOption($curVal);
			else
				$this->semester_id->ViewValue = $this->semester_id->Lookup !== NULL && is_array($this->semester_id->Lookup->Options) ? $curVal : NULL;
			if ($this->semester_id->ViewValue !== NULL) { // Load from cache
				$this->semester_id->EditValue = array_values($this->semester_id->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->semester_id->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->semester_id->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->semester_id->EditValue = $arwrk;
			}

			// Edit refer script
			// LastName

			$this->LastName->LinkCustomAttributes = "";
			$this->LastName->HrefValue = "";

			// FirstName
			$this->FirstName->LinkCustomAttributes = "";
			$this->FirstName->HrefValue = "";

			// Title
			$this->Title->LinkCustomAttributes = "";
			$this->Title->HrefValue = "";

			// TitleOfCourtesy
			$this->TitleOfCourtesy->LinkCustomAttributes = "";
			$this->TitleOfCourtesy->HrefValue = "";

			// BirthDate
			$this->BirthDate->LinkCustomAttributes = "";
			$this->BirthDate->HrefValue = "";

			// HireDate
			$this->HireDate->LinkCustomAttributes = "";
			$this->HireDate->HrefValue = "";

			// Address
			$this->Address->LinkCustomAttributes = "";
			$this->Address->HrefValue = "";

			// City
			$this->City->LinkCustomAttributes = "";
			$this->City->HrefValue = "";

			// Region
			$this->Region->LinkCustomAttributes = "";
			$this->Region->HrefValue = "";

			// PostalCode
			$this->PostalCode->LinkCustomAttributes = "";
			$this->PostalCode->HrefValue = "";

			// Country
			$this->Country->LinkCustomAttributes = "";
			$this->Country->HrefValue = "";

			// HomePhone
			$this->HomePhone->LinkCustomAttributes = "";
			$this->HomePhone->HrefValue = "";

			// Extension
			$this->Extension->LinkCustomAttributes = "";
			$this->Extension->HrefValue = "";

			// Email
			$this->_Email->LinkCustomAttributes = "";
			$this->_Email->HrefValue = "";

			// Photo
			$this->Photo->LinkCustomAttributes = "";
			$this->Photo->HrefValue = "";

			// Notes
			$this->Notes->LinkCustomAttributes = "";
			$this->Notes->HrefValue = "";

			// ReportsTo
			$this->ReportsTo->LinkCustomAttributes = "";
			$this->ReportsTo->HrefValue = "";

			// Password
			$this->Password->LinkCustomAttributes = "";
			$this->Password->HrefValue = "";

			// UserLevel
			$this->UserLevel->LinkCustomAttributes = "";
			$this->UserLevel->HrefValue = "";

			// Username
			$this->Username->LinkCustomAttributes = "";
			$this->Username->HrefValue = "";

			// Activated
			$this->Activated->LinkCustomAttributes = "";
			$this->Activated->HrefValue = "";

			// Profile
			$this->Profile->LinkCustomAttributes = "";
			$this->Profile->HrefValue = "";

			// sekolah_id
			$this->sekolah_id->LinkCustomAttributes = "";
			$this->sekolah_id->HrefValue = "";

			// tahunajaran_id
			$this->tahunajaran_id->LinkCustomAttributes = "";
			$this->tahunajaran_id->HrefValue = "";

			// kelas_id
			$this->kelas_id->LinkCustomAttributes = "";
			$this->kelas_id->HrefValue = "";

			// semester_id
			$this->semester_id->LinkCustomAttributes = "";
			$this->semester_id->HrefValue = "";
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType != ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Validate form
	protected function validateForm()
	{
		global $Language, $FormError;

		// Initialize form error message
		$FormError = "";

		// Check if validation required
		if (!Config("SERVER_VALIDATE"))
			return ($FormError == "");
		if ($this->LastName->Required) {
			if (!$this->LastName->IsDetailKey && $this->LastName->FormValue != NULL && $this->LastName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->LastName->caption(), $this->LastName->RequiredErrorMessage));
			}
		}
		if ($this->FirstName->Required) {
			if (!$this->FirstName->IsDetailKey && $this->FirstName->FormValue != NULL && $this->FirstName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FirstName->caption(), $this->FirstName->RequiredErrorMessage));
			}
		}
		if ($this->Title->Required) {
			if (!$this->Title->IsDetailKey && $this->Title->FormValue != NULL && $this->Title->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Title->caption(), $this->Title->RequiredErrorMessage));
			}
		}
		if ($this->TitleOfCourtesy->Required) {
			if (!$this->TitleOfCourtesy->IsDetailKey && $this->TitleOfCourtesy->FormValue != NULL && $this->TitleOfCourtesy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TitleOfCourtesy->caption(), $this->TitleOfCourtesy->RequiredErrorMessage));
			}
		}
		if ($this->BirthDate->Required) {
			if (!$this->BirthDate->IsDetailKey && $this->BirthDate->FormValue != NULL && $this->BirthDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BirthDate->caption(), $this->BirthDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->BirthDate->FormValue)) {
			AddMessage($FormError, $this->BirthDate->errorMessage());
		}
		if ($this->HireDate->Required) {
			if (!$this->HireDate->IsDetailKey && $this->HireDate->FormValue != NULL && $this->HireDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HireDate->caption(), $this->HireDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->HireDate->FormValue)) {
			AddMessage($FormError, $this->HireDate->errorMessage());
		}
		if ($this->Address->Required) {
			if (!$this->Address->IsDetailKey && $this->Address->FormValue != NULL && $this->Address->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Address->caption(), $this->Address->RequiredErrorMessage));
			}
		}
		if ($this->City->Required) {
			if (!$this->City->IsDetailKey && $this->City->FormValue != NULL && $this->City->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->City->caption(), $this->City->RequiredErrorMessage));
			}
		}
		if ($this->Region->Required) {
			if (!$this->Region->IsDetailKey && $this->Region->FormValue != NULL && $this->Region->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Region->caption(), $this->Region->RequiredErrorMessage));
			}
		}
		if ($this->PostalCode->Required) {
			if (!$this->PostalCode->IsDetailKey && $this->PostalCode->FormValue != NULL && $this->PostalCode->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PostalCode->caption(), $this->PostalCode->RequiredErrorMessage));
			}
		}
		if ($this->Country->Required) {
			if (!$this->Country->IsDetailKey && $this->Country->FormValue != NULL && $this->Country->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Country->caption(), $this->Country->RequiredErrorMessage));
			}
		}
		if ($this->HomePhone->Required) {
			if (!$this->HomePhone->IsDetailKey && $this->HomePhone->FormValue != NULL && $this->HomePhone->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HomePhone->caption(), $this->HomePhone->RequiredErrorMessage));
			}
		}
		if ($this->Extension->Required) {
			if (!$this->Extension->IsDetailKey && $this->Extension->FormValue != NULL && $this->Extension->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Extension->caption(), $this->Extension->RequiredErrorMessage));
			}
		}
		if ($this->_Email->Required) {
			if (!$this->_Email->IsDetailKey && $this->_Email->FormValue != NULL && $this->_Email->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_Email->caption(), $this->_Email->RequiredErrorMessage));
			}
		}
		if ($this->Photo->Required) {
			if (!$this->Photo->IsDetailKey && $this->Photo->FormValue != NULL && $this->Photo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Photo->caption(), $this->Photo->RequiredErrorMessage));
			}
		}
		if ($this->Notes->Required) {
			if (!$this->Notes->IsDetailKey && $this->Notes->FormValue != NULL && $this->Notes->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Notes->caption(), $this->Notes->RequiredErrorMessage));
			}
		}
		if ($this->ReportsTo->Required) {
			if (!$this->ReportsTo->IsDetailKey && $this->ReportsTo->FormValue != NULL && $this->ReportsTo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ReportsTo->caption(), $this->ReportsTo->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->ReportsTo->FormValue)) {
			AddMessage($FormError, $this->ReportsTo->errorMessage());
		}
		if ($this->Password->Required) {
			if (!$this->Password->IsDetailKey && $this->Password->FormValue != NULL && $this->Password->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Password->caption(), $this->Password->RequiredErrorMessage));
			}
		}
		if ($this->UserLevel->Required) {
			if (!$this->UserLevel->IsDetailKey && $this->UserLevel->FormValue != NULL && $this->UserLevel->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->UserLevel->caption(), $this->UserLevel->RequiredErrorMessage));
			}
		}
		if ($this->Username->Required) {
			if (!$this->Username->IsDetailKey && $this->Username->FormValue != NULL && $this->Username->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Username->caption(), $this->Username->RequiredErrorMessage));
			}
		}
		if ($this->Activated->Required) {
			if ($this->Activated->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Activated->caption(), $this->Activated->RequiredErrorMessage));
			}
		}
		if ($this->Profile->Required) {
			if (!$this->Profile->IsDetailKey && $this->Profile->FormValue != NULL && $this->Profile->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Profile->caption(), $this->Profile->RequiredErrorMessage));
			}
		}
		if ($this->sekolah_id->Required) {
			if (!$this->sekolah_id->IsDetailKey && $this->sekolah_id->FormValue != NULL && $this->sekolah_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sekolah_id->caption(), $this->sekolah_id->RequiredErrorMessage));
			}
		}
		if ($this->tahunajaran_id->Required) {
			if (!$this->tahunajaran_id->IsDetailKey && $this->tahunajaran_id->FormValue != NULL && $this->tahunajaran_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->tahunajaran_id->caption(), $this->tahunajaran_id->RequiredErrorMessage));
			}
		}
		if ($this->kelas_id->Required) {
			if (!$this->kelas_id->IsDetailKey && $this->kelas_id->FormValue != NULL && $this->kelas_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->kelas_id->caption(), $this->kelas_id->RequiredErrorMessage));
			}
		}
		if ($this->semester_id->Required) {
			if (!$this->semester_id->IsDetailKey && $this->semester_id->FormValue != NULL && $this->semester_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->semester_id->caption(), $this->semester_id->RequiredErrorMessage));
			}
		}

		// Return validate result
		$validateForm = ($FormError == "");

		// Call Form_CustomValidate event
		$formCustomError = "";
		$validateForm = $validateForm && $this->Form_CustomValidate($formCustomError);
		if ($formCustomError != "") {
			AddMessage($FormError, $formCustomError);
		}
		return $validateForm;
	}

	// Update record based on key values
	protected function editRow()
	{
		global $Security, $Language;
		$oldKeyFilter = $this->getRecordFilter();
		$filter = $this->applyUserIDFilters($oldKeyFilter);
		$conn = $this->getConnection();
		if ($this->Username->CurrentValue != "") { // Check field with unique index
			$filterChk = "(`Username` = '" . AdjustSql($this->Username->CurrentValue, $this->Dbid) . "')";
			$filterChk .= " AND NOT (" . $filter . ")";
			$this->CurrentFilter = $filterChk;
			$sqlChk = $this->getCurrentSql();
			$conn->raiseErrorFn = Config("ERROR_FUNC");
			$rsChk = $conn->Execute($sqlChk);
			$conn->raiseErrorFn = "";
			if ($rsChk === FALSE) {
				return FALSE;
			} elseif (!$rsChk->EOF) {
				$idxErrMsg = str_replace("%f", $this->Username->caption(), $Language->phrase("DupIndex"));
				$idxErrMsg = str_replace("%v", $this->Username->CurrentValue, $idxErrMsg);
				$this->setFailureMessage($idxErrMsg);
				$rsChk->close();
				return FALSE;
			}
			$rsChk->close();
		}
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn->raiseErrorFn = Config("ERROR_FUNC");
		$rs = $conn->execute($sql);
		$conn->raiseErrorFn = "";
		if ($rs === FALSE)
			return FALSE;
		if ($rs->EOF) {
			$this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
			$editRow = FALSE; // Update Failed
		} else {

			// Save old values
			$rsold = &$rs->fields;
			$this->loadDbValues($rsold);
			$rsnew = [];

			// LastName
			$this->LastName->setDbValueDef($rsnew, $this->LastName->CurrentValue, NULL, $this->LastName->ReadOnly);

			// FirstName
			$this->FirstName->setDbValueDef($rsnew, $this->FirstName->CurrentValue, NULL, $this->FirstName->ReadOnly);

			// Title
			$this->Title->setDbValueDef($rsnew, $this->Title->CurrentValue, NULL, $this->Title->ReadOnly);

			// TitleOfCourtesy
			$this->TitleOfCourtesy->setDbValueDef($rsnew, $this->TitleOfCourtesy->CurrentValue, NULL, $this->TitleOfCourtesy->ReadOnly);

			// BirthDate
			$this->BirthDate->setDbValueDef($rsnew, UnFormatDateTime($this->BirthDate->CurrentValue, 0), NULL, $this->BirthDate->ReadOnly);

			// HireDate
			$this->HireDate->setDbValueDef($rsnew, UnFormatDateTime($this->HireDate->CurrentValue, 0), NULL, $this->HireDate->ReadOnly);

			// Address
			$this->Address->setDbValueDef($rsnew, $this->Address->CurrentValue, NULL, $this->Address->ReadOnly);

			// City
			$this->City->setDbValueDef($rsnew, $this->City->CurrentValue, NULL, $this->City->ReadOnly);

			// Region
			$this->Region->setDbValueDef($rsnew, $this->Region->CurrentValue, NULL, $this->Region->ReadOnly);

			// PostalCode
			$this->PostalCode->setDbValueDef($rsnew, $this->PostalCode->CurrentValue, NULL, $this->PostalCode->ReadOnly);

			// Country
			$this->Country->setDbValueDef($rsnew, $this->Country->CurrentValue, NULL, $this->Country->ReadOnly);

			// HomePhone
			$this->HomePhone->setDbValueDef($rsnew, $this->HomePhone->CurrentValue, NULL, $this->HomePhone->ReadOnly);

			// Extension
			$this->Extension->setDbValueDef($rsnew, $this->Extension->CurrentValue, NULL, $this->Extension->ReadOnly);

			// Email
			$this->_Email->setDbValueDef($rsnew, $this->_Email->CurrentValue, NULL, $this->_Email->ReadOnly);

			// Photo
			$this->Photo->setDbValueDef($rsnew, $this->Photo->CurrentValue, NULL, $this->Photo->ReadOnly);

			// Notes
			$this->Notes->setDbValueDef($rsnew, $this->Notes->CurrentValue, NULL, $this->Notes->ReadOnly);

			// ReportsTo
			$this->ReportsTo->setDbValueDef($rsnew, $this->ReportsTo->CurrentValue, NULL, $this->ReportsTo->ReadOnly);

			// Password
			$this->Password->setDbValueDef($rsnew, $this->Password->CurrentValue, "", $this->Password->ReadOnly || Config("ENCRYPTED_PASSWORD") && $rs->fields('Password') == $this->Password->CurrentValue);

			// UserLevel
			
			if ($Security->canAdmin()) { // System admin
				
				$this->UserLevel->setDbValueDef($rsnew, $this->UserLevel->CurrentValue, NULL, $this->UserLevel->ReadOnly);
				
			}
			

			// Username
			$this->Username->setDbValueDef($rsnew, $this->Username->CurrentValue, "", $this->Username->ReadOnly);

			// Activated
			$tmpBool = $this->Activated->CurrentValue;
			if ($tmpBool != "Y" && $tmpBool != "N")
				$tmpBool = !empty($tmpBool) ? "Y" : "N";
			$this->Activated->setDbValueDef($rsnew, $tmpBool, "N", $this->Activated->ReadOnly);

			// Profile
			$this->Profile->setDbValueDef($rsnew, $this->Profile->CurrentValue, NULL, $this->Profile->ReadOnly);

			// sekolah_id
			$this->sekolah_id->setDbValueDef($rsnew, $this->sekolah_id->CurrentValue, NULL, $this->sekolah_id->ReadOnly);

			// tahunajaran_id
			$this->tahunajaran_id->setDbValueDef($rsnew, $this->tahunajaran_id->CurrentValue, NULL, $this->tahunajaran_id->ReadOnly);

			// kelas_id
			$this->kelas_id->setDbValueDef($rsnew, $this->kelas_id->CurrentValue, NULL, $this->kelas_id->ReadOnly);

			// semester_id
			$this->semester_id->setDbValueDef($rsnew, $this->semester_id->CurrentValue, NULL, $this->semester_id->ReadOnly);

			// Call Row Updating event
			$updateRow = $this->Row_Updating($rsold, $rsnew);

			// Check for duplicate key when key changed
			if ($updateRow) {
				$newKeyFilter = $this->getRecordFilter($rsnew);
				if ($newKeyFilter != $oldKeyFilter) {
					$rsChk = $this->loadRs($newKeyFilter);
					if ($rsChk && !$rsChk->EOF) {
						$keyErrMsg = str_replace("%f", $newKeyFilter, $Language->phrase("DupKey"));
						$this->setFailureMessage($keyErrMsg);
						$rsChk->close();
						$updateRow = FALSE;
					}
				}
			}
			if ($updateRow) {
				$conn->raiseErrorFn = Config("ERROR_FUNC");
				if (count($rsnew) > 0)
					$editRow = $this->update($rsnew, "", $rsold);
				else
					$editRow = TRUE; // No field to update
				$conn->raiseErrorFn = "";
				if ($editRow) {
				}
			} else {
				if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {

					// Use the message, do nothing
				} elseif ($this->CancelMessage != "") {
					$this->setFailureMessage($this->CancelMessage);
					$this->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->phrase("UpdateCancelled"));
				}
				$editRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($editRow)
			$this->Row_Updated($rsold, $rsnew);
		$rs->close();

		// Clean upload path if any
		if ($editRow) {
		}

		// Write JSON for API request
		if (IsApi() && $editRow) {
			$row = $this->getRecordsFromRecordset([$rsnew], TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $editRow;
	}

	// Show link optionally based on User ID
	protected function showOptionLink($id = "")
	{
		global $Security;
		if ($Security->isLoggedIn() && !$Security->isAdmin() && !$this->userIDAllow($id))
			return $Security->isValidUserID($this->EmployeeID->CurrentValue);
		return TRUE;
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("t201_userslist.php"), "", $this->TableVar, TRUE);
		$pageId = "edit";
		$Breadcrumb->add("edit", $pageId, $url);
	}

	// Set up multi pages
	protected function setupMultiPages()
	{
		$pages = new SubPages();
		$pages->Style = "tabs";
		$pages->add(0);
		$pages->add(1);
		$pages->add(2);
		$this->MultiPages = $pages;
	}

	// Setup lookup options
	public function setupLookupOptions($fld)
	{
		if ($fld->Lookup !== NULL && $fld->Lookup->Options === NULL) {

			// Get default connection and filter
			$conn = $this->getConnection();
			$lookupFilter = "";

			// No need to check any more
			$fld->Lookup->Options = [];

			// Set up lookup SQL and connection
			switch ($fld->FieldVar) {
				case "x_UserLevel":
					break;
				case "x_Activated":
					break;
				case "x_sekolah_id":
					break;
				case "x_tahunajaran_id":
					break;
				case "x_kelas_id":
					break;
				case "x_semester_id":
					break;
				default:
					$lookupFilter = "";
					break;
			}

			// Always call to Lookup->getSql so that user can setup Lookup->Options in Lookup_Selecting server event
			$sql = $fld->Lookup->getSql(FALSE, "", $lookupFilter, $this);

			// Set up lookup cache
			if ($fld->UseLookupCache && $sql != "" && count($fld->Lookup->Options) == 0) {
				$totalCnt = $this->getRecordCount($sql, $conn);
				if ($totalCnt > $fld->LookupCacheCount) // Total count > cache count, do not cache
					return;
				$rs = $conn->execute($sql);
				$ar = [];
				while ($rs && !$rs->EOF) {
					$row = &$rs->fields;

					// Format the field values
					switch ($fld->FieldVar) {
						case "x_UserLevel":
							break;
						case "x_sekolah_id":
							break;
						case "x_tahunajaran_id":
							break;
						case "x_kelas_id":
							break;
						case "x_semester_id":
							break;
					}
					$ar[strval($row[0])] = $row;
					$rs->moveNext();
				}
				if ($rs)
					$rs->close();
				$fld->Lookup->Options = $ar;
			}
		}
	}

	// Set up starting record parameters
	public function setupStartRecord()
	{
		if ($this->DisplayRecords == 0)
			return;
		if ($this->isPageRequest()) { // Validate request
			$startRec = Get(Config("TABLE_START_REC"));
			$pageNo = Get(Config("TABLE_PAGE_NO"));
			if ($pageNo !== NULL) { // Check for "pageno" parameter first
				if (is_numeric($pageNo)) {
					$this->StartRecord = ($pageNo - 1) * $this->DisplayRecords + 1;
					if ($this->StartRecord <= 0) {
						$this->StartRecord = 1;
					} elseif ($this->StartRecord >= (int)(($this->TotalRecords - 1)/$this->DisplayRecords) * $this->DisplayRecords + 1) {
						$this->StartRecord = (int)(($this->TotalRecords - 1)/$this->DisplayRecords) * $this->DisplayRecords + 1;
					}
					$this->setStartRecordNumber($this->StartRecord);
				}
			} elseif ($startRec !== NULL) { // Check for "start" parameter
				$this->StartRecord = $startRec;
				$this->setStartRecordNumber($this->StartRecord);
			}
		}
		$this->StartRecord = $this->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRecord) || $this->StartRecord == "") { // Avoid invalid start record counter
			$this->StartRecord = 1; // Reset start record counter
			$this->setStartRecordNumber($this->StartRecord);
		} elseif ($this->StartRecord > $this->TotalRecords) { // Avoid starting record > total records
			$this->StartRecord = (int)(($this->TotalRecords - 1)/$this->DisplayRecords) * $this->DisplayRecords + 1; // Point to last page first record
			$this->setStartRecordNumber($this->StartRecord);
		} elseif (($this->StartRecord - 1) % $this->DisplayRecords != 0) {
			$this->StartRecord = (int)(($this->StartRecord - 1)/$this->DisplayRecords) * $this->DisplayRecords + 1; // Point to page boundary
			$this->setStartRecordNumber($this->StartRecord);
		}
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}

	// Page Redirecting event
	function Page_Redirecting(&$url) {

		// Example:
		//$url = "your URL";

	}

	// Message Showing event
	// $type = ''|'success'|'failure'|'warning'
	function Message_Showing(&$msg, $type) {
		if ($type == 'success') {

			//$msg = "your success message";
		} elseif ($type == 'failure') {

			//$msg = "your failure message";
		} elseif ($type == 'warning') {

			//$msg = "your warning message";
		} else {

			//$msg = "your message";
		}
	}

	// Page Render event
	function Page_Render() {

		//echo "Page Render";
	}

	// Page Data Rendering event
	function Page_DataRendering(&$header) {

		// Example:
		//$header = "your header";

	}

	// Page Data Rendered event
	function Page_DataRendered(&$footer) {

		// Example:
		//$footer = "your footer";

	}

	// Form Custom Validate event
	function Form_CustomValidate(&$customError) {

		// Return error message in CustomError
		return TRUE;
	}
} // End class
?>