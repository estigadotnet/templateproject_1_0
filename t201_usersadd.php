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
$t201_users_add = new t201_users_add();

// Run the page
$t201_users_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t201_users_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft201_usersadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	ft201_usersadd = currentForm = new ew.Form("ft201_usersadd", "add");

	// Validate form
	ft201_usersadd.validate = function() {
		if (!this.validateRequired)
			return true; // Ignore validation
		var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
		if ($fobj.find("#confirm").val() == "confirm")
			return true;
		var elm, felm, uelm, addcnt = 0;
		var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
		var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
		var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
		var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
		for (var i = startcnt; i <= rowcnt; i++) {
			var infix = ($k[0]) ? String(i) : "";
			$fobj.data("rowindex", infix);
			<?php if ($t201_users_add->LastName->Required) { ?>
				elm = this.getElements("x" + infix + "_LastName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t201_users_add->LastName->caption(), $t201_users_add->LastName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t201_users_add->FirstName->Required) { ?>
				elm = this.getElements("x" + infix + "_FirstName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t201_users_add->FirstName->caption(), $t201_users_add->FirstName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t201_users_add->Title->Required) { ?>
				elm = this.getElements("x" + infix + "_Title");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t201_users_add->Title->caption(), $t201_users_add->Title->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t201_users_add->TitleOfCourtesy->Required) { ?>
				elm = this.getElements("x" + infix + "_TitleOfCourtesy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t201_users_add->TitleOfCourtesy->caption(), $t201_users_add->TitleOfCourtesy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t201_users_add->BirthDate->Required) { ?>
				elm = this.getElements("x" + infix + "_BirthDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t201_users_add->BirthDate->caption(), $t201_users_add->BirthDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BirthDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t201_users_add->BirthDate->errorMessage()) ?>");
			<?php if ($t201_users_add->HireDate->Required) { ?>
				elm = this.getElements("x" + infix + "_HireDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t201_users_add->HireDate->caption(), $t201_users_add->HireDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_HireDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t201_users_add->HireDate->errorMessage()) ?>");
			<?php if ($t201_users_add->Address->Required) { ?>
				elm = this.getElements("x" + infix + "_Address");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t201_users_add->Address->caption(), $t201_users_add->Address->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t201_users_add->City->Required) { ?>
				elm = this.getElements("x" + infix + "_City");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t201_users_add->City->caption(), $t201_users_add->City->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t201_users_add->Region->Required) { ?>
				elm = this.getElements("x" + infix + "_Region");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t201_users_add->Region->caption(), $t201_users_add->Region->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t201_users_add->PostalCode->Required) { ?>
				elm = this.getElements("x" + infix + "_PostalCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t201_users_add->PostalCode->caption(), $t201_users_add->PostalCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t201_users_add->Country->Required) { ?>
				elm = this.getElements("x" + infix + "_Country");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t201_users_add->Country->caption(), $t201_users_add->Country->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t201_users_add->HomePhone->Required) { ?>
				elm = this.getElements("x" + infix + "_HomePhone");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t201_users_add->HomePhone->caption(), $t201_users_add->HomePhone->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t201_users_add->Extension->Required) { ?>
				elm = this.getElements("x" + infix + "_Extension");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t201_users_add->Extension->caption(), $t201_users_add->Extension->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t201_users_add->_Email->Required) { ?>
				elm = this.getElements("x" + infix + "__Email");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t201_users_add->_Email->caption(), $t201_users_add->_Email->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t201_users_add->Photo->Required) { ?>
				elm = this.getElements("x" + infix + "_Photo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t201_users_add->Photo->caption(), $t201_users_add->Photo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t201_users_add->Notes->Required) { ?>
				elm = this.getElements("x" + infix + "_Notes");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t201_users_add->Notes->caption(), $t201_users_add->Notes->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t201_users_add->ReportsTo->Required) { ?>
				elm = this.getElements("x" + infix + "_ReportsTo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t201_users_add->ReportsTo->caption(), $t201_users_add->ReportsTo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ReportsTo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t201_users_add->ReportsTo->errorMessage()) ?>");
			<?php if ($t201_users_add->Password->Required) { ?>
				elm = this.getElements("x" + infix + "_Password");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t201_users_add->Password->caption(), $t201_users_add->Password->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t201_users_add->UserLevel->Required) { ?>
				elm = this.getElements("x" + infix + "_UserLevel");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t201_users_add->UserLevel->caption(), $t201_users_add->UserLevel->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t201_users_add->Username->Required) { ?>
				elm = this.getElements("x" + infix + "_Username");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t201_users_add->Username->caption(), $t201_users_add->Username->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t201_users_add->Activated->Required) { ?>
				elm = this.getElements("x" + infix + "_Activated[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t201_users_add->Activated->caption(), $t201_users_add->Activated->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t201_users_add->Profile->Required) { ?>
				elm = this.getElements("x" + infix + "_Profile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t201_users_add->Profile->caption(), $t201_users_add->Profile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t201_users_add->sekolah_id->Required) { ?>
				elm = this.getElements("x" + infix + "_sekolah_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t201_users_add->sekolah_id->caption(), $t201_users_add->sekolah_id->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}

		// Process detail forms
		var dfs = $fobj.find("input[name='detailpage']").get();
		for (var i = 0; i < dfs.length; i++) {
			var df = dfs[i], val = df.value;
			if (val && ew.forms[val])
				if (!ew.forms[val].validate())
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	ft201_usersadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft201_usersadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Multi-Page
	ft201_usersadd.multiPage = new ew.MultiPage("ft201_usersadd");

	// Dynamic selection lists
	ft201_usersadd.lists["x_UserLevel"] = <?php echo $t201_users_add->UserLevel->Lookup->toClientList($t201_users_add) ?>;
	ft201_usersadd.lists["x_UserLevel"].options = <?php echo JsonEncode($t201_users_add->UserLevel->lookupOptions()) ?>;
	ft201_usersadd.lists["x_Activated[]"] = <?php echo $t201_users_add->Activated->Lookup->toClientList($t201_users_add) ?>;
	ft201_usersadd.lists["x_Activated[]"].options = <?php echo JsonEncode($t201_users_add->Activated->options(FALSE, TRUE)) ?>;
	ft201_usersadd.lists["x_sekolah_id"] = <?php echo $t201_users_add->sekolah_id->Lookup->toClientList($t201_users_add) ?>;
	ft201_usersadd.lists["x_sekolah_id"].options = <?php echo JsonEncode($t201_users_add->sekolah_id->lookupOptions()) ?>;
	loadjs.done("ft201_usersadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t201_users_add->showPageHeader(); ?>
<?php
$t201_users_add->showMessage();
?>
<form name="ft201_usersadd" id="ft201_usersadd" class="<?php echo $t201_users_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t201_users">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$t201_users_add->IsModal ?>">
<div class="ew-multi-page"><!-- multi-page -->
<div class="ew-nav-tabs" id="t201_users_add"><!-- multi-page tabs -->
	<ul class="<?php echo $t201_users_add->MultiPages->navStyle() ?>">
		<li class="nav-item"><a class="nav-link<?php echo $t201_users_add->MultiPages->pageStyle(1) ?>" href="#tab_t201_users1" data-toggle="tab"><?php echo $t201_users->pageCaption(1) ?></a></li>
		<li class="nav-item"><a class="nav-link<?php echo $t201_users_add->MultiPages->pageStyle(2) ?>" href="#tab_t201_users2" data-toggle="tab"><?php echo $t201_users->pageCaption(2) ?></a></li>
	</ul>
	<div class="tab-content"><!-- multi-page tabs .tab-content -->
		<div class="tab-pane<?php echo $t201_users_add->MultiPages->pageStyle(1) ?>" id="tab_t201_users1"><!-- multi-page .tab-pane -->
<div class="ew-add-div"><!-- page* -->
<?php if ($t201_users_add->UserLevel->Visible) { // UserLevel ?>
	<div id="r_UserLevel" class="form-group row">
		<label id="elh_t201_users_UserLevel" for="x_UserLevel" class="<?php echo $t201_users_add->LeftColumnClass ?>"><?php echo $t201_users_add->UserLevel->caption() ?><?php echo $t201_users_add->UserLevel->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t201_users_add->RightColumnClass ?>"><div <?php echo $t201_users_add->UserLevel->cellAttributes() ?>>
<?php if (!$Security->isAdmin() && $Security->isLoggedIn()) { // Non system admin ?>
<span id="el_t201_users_UserLevel">
<input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t201_users_add->UserLevel->EditValue)) ?>">
</span>
<?php } else { ?>
<span id="el_t201_users_UserLevel">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t201_users" data-field="x_UserLevel" data-page="1" data-value-separator="<?php echo $t201_users_add->UserLevel->displayValueSeparatorAttribute() ?>" id="x_UserLevel" name="x_UserLevel"<?php echo $t201_users_add->UserLevel->editAttributes() ?>>
			<?php echo $t201_users_add->UserLevel->selectOptionListHtml("x_UserLevel") ?>
		</select>
</div>
<?php echo $t201_users_add->UserLevel->Lookup->getParamTag($t201_users_add, "p_x_UserLevel") ?>
</span>
<?php } ?>
<?php echo $t201_users_add->UserLevel->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t201_users_add->Username->Visible) { // Username ?>
	<div id="r_Username" class="form-group row">
		<label id="elh_t201_users_Username" for="x_Username" class="<?php echo $t201_users_add->LeftColumnClass ?>"><?php echo $t201_users_add->Username->caption() ?><?php echo $t201_users_add->Username->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t201_users_add->RightColumnClass ?>"><div <?php echo $t201_users_add->Username->cellAttributes() ?>>
<span id="el_t201_users_Username">
<input type="text" data-table="t201_users" data-field="x_Username" data-page="1" name="x_Username" id="x_Username" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($t201_users_add->Username->getPlaceHolder()) ?>" value="<?php echo $t201_users_add->Username->EditValue ?>"<?php echo $t201_users_add->Username->editAttributes() ?>>
</span>
<?php echo $t201_users_add->Username->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t201_users_add->sekolah_id->Visible) { // sekolah_id ?>
	<div id="r_sekolah_id" class="form-group row">
		<label id="elh_t201_users_sekolah_id" for="x_sekolah_id" class="<?php echo $t201_users_add->LeftColumnClass ?>"><?php echo $t201_users_add->sekolah_id->caption() ?><?php echo $t201_users_add->sekolah_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t201_users_add->RightColumnClass ?>"><div <?php echo $t201_users_add->sekolah_id->cellAttributes() ?>>
<span id="el_t201_users_sekolah_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t201_users" data-field="x_sekolah_id" data-page="1" data-value-separator="<?php echo $t201_users_add->sekolah_id->displayValueSeparatorAttribute() ?>" id="x_sekolah_id" name="x_sekolah_id"<?php echo $t201_users_add->sekolah_id->editAttributes() ?>>
			<?php echo $t201_users_add->sekolah_id->selectOptionListHtml("x_sekolah_id") ?>
		</select>
</div>
<?php echo $t201_users_add->sekolah_id->Lookup->getParamTag($t201_users_add, "p_x_sekolah_id") ?>
</span>
<?php echo $t201_users_add->sekolah_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
		</div><!-- /multi-page .tab-pane -->
		<div class="tab-pane<?php echo $t201_users_add->MultiPages->pageStyle(2) ?>" id="tab_t201_users2"><!-- multi-page .tab-pane -->
<div class="ew-add-div"><!-- page* -->
<?php if ($t201_users_add->LastName->Visible) { // LastName ?>
	<div id="r_LastName" class="form-group row">
		<label id="elh_t201_users_LastName" for="x_LastName" class="<?php echo $t201_users_add->LeftColumnClass ?>"><?php echo $t201_users_add->LastName->caption() ?><?php echo $t201_users_add->LastName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t201_users_add->RightColumnClass ?>"><div <?php echo $t201_users_add->LastName->cellAttributes() ?>>
<span id="el_t201_users_LastName">
<input type="text" data-table="t201_users" data-field="x_LastName" data-page="2" name="x_LastName" id="x_LastName" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($t201_users_add->LastName->getPlaceHolder()) ?>" value="<?php echo $t201_users_add->LastName->EditValue ?>"<?php echo $t201_users_add->LastName->editAttributes() ?>>
</span>
<?php echo $t201_users_add->LastName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t201_users_add->FirstName->Visible) { // FirstName ?>
	<div id="r_FirstName" class="form-group row">
		<label id="elh_t201_users_FirstName" for="x_FirstName" class="<?php echo $t201_users_add->LeftColumnClass ?>"><?php echo $t201_users_add->FirstName->caption() ?><?php echo $t201_users_add->FirstName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t201_users_add->RightColumnClass ?>"><div <?php echo $t201_users_add->FirstName->cellAttributes() ?>>
<span id="el_t201_users_FirstName">
<input type="text" data-table="t201_users" data-field="x_FirstName" data-page="2" name="x_FirstName" id="x_FirstName" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($t201_users_add->FirstName->getPlaceHolder()) ?>" value="<?php echo $t201_users_add->FirstName->EditValue ?>"<?php echo $t201_users_add->FirstName->editAttributes() ?>>
</span>
<?php echo $t201_users_add->FirstName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t201_users_add->Title->Visible) { // Title ?>
	<div id="r_Title" class="form-group row">
		<label id="elh_t201_users_Title" for="x_Title" class="<?php echo $t201_users_add->LeftColumnClass ?>"><?php echo $t201_users_add->Title->caption() ?><?php echo $t201_users_add->Title->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t201_users_add->RightColumnClass ?>"><div <?php echo $t201_users_add->Title->cellAttributes() ?>>
<span id="el_t201_users_Title">
<input type="text" data-table="t201_users" data-field="x_Title" data-page="2" name="x_Title" id="x_Title" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($t201_users_add->Title->getPlaceHolder()) ?>" value="<?php echo $t201_users_add->Title->EditValue ?>"<?php echo $t201_users_add->Title->editAttributes() ?>>
</span>
<?php echo $t201_users_add->Title->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t201_users_add->TitleOfCourtesy->Visible) { // TitleOfCourtesy ?>
	<div id="r_TitleOfCourtesy" class="form-group row">
		<label id="elh_t201_users_TitleOfCourtesy" for="x_TitleOfCourtesy" class="<?php echo $t201_users_add->LeftColumnClass ?>"><?php echo $t201_users_add->TitleOfCourtesy->caption() ?><?php echo $t201_users_add->TitleOfCourtesy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t201_users_add->RightColumnClass ?>"><div <?php echo $t201_users_add->TitleOfCourtesy->cellAttributes() ?>>
<span id="el_t201_users_TitleOfCourtesy">
<input type="text" data-table="t201_users" data-field="x_TitleOfCourtesy" data-page="2" name="x_TitleOfCourtesy" id="x_TitleOfCourtesy" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($t201_users_add->TitleOfCourtesy->getPlaceHolder()) ?>" value="<?php echo $t201_users_add->TitleOfCourtesy->EditValue ?>"<?php echo $t201_users_add->TitleOfCourtesy->editAttributes() ?>>
</span>
<?php echo $t201_users_add->TitleOfCourtesy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t201_users_add->BirthDate->Visible) { // BirthDate ?>
	<div id="r_BirthDate" class="form-group row">
		<label id="elh_t201_users_BirthDate" for="x_BirthDate" class="<?php echo $t201_users_add->LeftColumnClass ?>"><?php echo $t201_users_add->BirthDate->caption() ?><?php echo $t201_users_add->BirthDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t201_users_add->RightColumnClass ?>"><div <?php echo $t201_users_add->BirthDate->cellAttributes() ?>>
<span id="el_t201_users_BirthDate">
<input type="text" data-table="t201_users" data-field="x_BirthDate" data-page="2" name="x_BirthDate" id="x_BirthDate" maxlength="19" placeholder="<?php echo HtmlEncode($t201_users_add->BirthDate->getPlaceHolder()) ?>" value="<?php echo $t201_users_add->BirthDate->EditValue ?>"<?php echo $t201_users_add->BirthDate->editAttributes() ?>>
<?php if (!$t201_users_add->BirthDate->ReadOnly && !$t201_users_add->BirthDate->Disabled && !isset($t201_users_add->BirthDate->EditAttrs["readonly"]) && !isset($t201_users_add->BirthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft201_usersadd", "datetimepicker"], function() {
	ew.createDateTimePicker("ft201_usersadd", "x_BirthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $t201_users_add->BirthDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t201_users_add->HireDate->Visible) { // HireDate ?>
	<div id="r_HireDate" class="form-group row">
		<label id="elh_t201_users_HireDate" for="x_HireDate" class="<?php echo $t201_users_add->LeftColumnClass ?>"><?php echo $t201_users_add->HireDate->caption() ?><?php echo $t201_users_add->HireDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t201_users_add->RightColumnClass ?>"><div <?php echo $t201_users_add->HireDate->cellAttributes() ?>>
<span id="el_t201_users_HireDate">
<input type="text" data-table="t201_users" data-field="x_HireDate" data-page="2" name="x_HireDate" id="x_HireDate" maxlength="19" placeholder="<?php echo HtmlEncode($t201_users_add->HireDate->getPlaceHolder()) ?>" value="<?php echo $t201_users_add->HireDate->EditValue ?>"<?php echo $t201_users_add->HireDate->editAttributes() ?>>
<?php if (!$t201_users_add->HireDate->ReadOnly && !$t201_users_add->HireDate->Disabled && !isset($t201_users_add->HireDate->EditAttrs["readonly"]) && !isset($t201_users_add->HireDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft201_usersadd", "datetimepicker"], function() {
	ew.createDateTimePicker("ft201_usersadd", "x_HireDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $t201_users_add->HireDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t201_users_add->Address->Visible) { // Address ?>
	<div id="r_Address" class="form-group row">
		<label id="elh_t201_users_Address" for="x_Address" class="<?php echo $t201_users_add->LeftColumnClass ?>"><?php echo $t201_users_add->Address->caption() ?><?php echo $t201_users_add->Address->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t201_users_add->RightColumnClass ?>"><div <?php echo $t201_users_add->Address->cellAttributes() ?>>
<span id="el_t201_users_Address">
<input type="text" data-table="t201_users" data-field="x_Address" data-page="2" name="x_Address" id="x_Address" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($t201_users_add->Address->getPlaceHolder()) ?>" value="<?php echo $t201_users_add->Address->EditValue ?>"<?php echo $t201_users_add->Address->editAttributes() ?>>
</span>
<?php echo $t201_users_add->Address->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t201_users_add->City->Visible) { // City ?>
	<div id="r_City" class="form-group row">
		<label id="elh_t201_users_City" for="x_City" class="<?php echo $t201_users_add->LeftColumnClass ?>"><?php echo $t201_users_add->City->caption() ?><?php echo $t201_users_add->City->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t201_users_add->RightColumnClass ?>"><div <?php echo $t201_users_add->City->cellAttributes() ?>>
<span id="el_t201_users_City">
<input type="text" data-table="t201_users" data-field="x_City" data-page="2" name="x_City" id="x_City" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($t201_users_add->City->getPlaceHolder()) ?>" value="<?php echo $t201_users_add->City->EditValue ?>"<?php echo $t201_users_add->City->editAttributes() ?>>
</span>
<?php echo $t201_users_add->City->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t201_users_add->Region->Visible) { // Region ?>
	<div id="r_Region" class="form-group row">
		<label id="elh_t201_users_Region" for="x_Region" class="<?php echo $t201_users_add->LeftColumnClass ?>"><?php echo $t201_users_add->Region->caption() ?><?php echo $t201_users_add->Region->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t201_users_add->RightColumnClass ?>"><div <?php echo $t201_users_add->Region->cellAttributes() ?>>
<span id="el_t201_users_Region">
<input type="text" data-table="t201_users" data-field="x_Region" data-page="2" name="x_Region" id="x_Region" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($t201_users_add->Region->getPlaceHolder()) ?>" value="<?php echo $t201_users_add->Region->EditValue ?>"<?php echo $t201_users_add->Region->editAttributes() ?>>
</span>
<?php echo $t201_users_add->Region->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t201_users_add->PostalCode->Visible) { // PostalCode ?>
	<div id="r_PostalCode" class="form-group row">
		<label id="elh_t201_users_PostalCode" for="x_PostalCode" class="<?php echo $t201_users_add->LeftColumnClass ?>"><?php echo $t201_users_add->PostalCode->caption() ?><?php echo $t201_users_add->PostalCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t201_users_add->RightColumnClass ?>"><div <?php echo $t201_users_add->PostalCode->cellAttributes() ?>>
<span id="el_t201_users_PostalCode">
<input type="text" data-table="t201_users" data-field="x_PostalCode" data-page="2" name="x_PostalCode" id="x_PostalCode" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($t201_users_add->PostalCode->getPlaceHolder()) ?>" value="<?php echo $t201_users_add->PostalCode->EditValue ?>"<?php echo $t201_users_add->PostalCode->editAttributes() ?>>
</span>
<?php echo $t201_users_add->PostalCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t201_users_add->Country->Visible) { // Country ?>
	<div id="r_Country" class="form-group row">
		<label id="elh_t201_users_Country" for="x_Country" class="<?php echo $t201_users_add->LeftColumnClass ?>"><?php echo $t201_users_add->Country->caption() ?><?php echo $t201_users_add->Country->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t201_users_add->RightColumnClass ?>"><div <?php echo $t201_users_add->Country->cellAttributes() ?>>
<span id="el_t201_users_Country">
<input type="text" data-table="t201_users" data-field="x_Country" data-page="2" name="x_Country" id="x_Country" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($t201_users_add->Country->getPlaceHolder()) ?>" value="<?php echo $t201_users_add->Country->EditValue ?>"<?php echo $t201_users_add->Country->editAttributes() ?>>
</span>
<?php echo $t201_users_add->Country->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t201_users_add->HomePhone->Visible) { // HomePhone ?>
	<div id="r_HomePhone" class="form-group row">
		<label id="elh_t201_users_HomePhone" for="x_HomePhone" class="<?php echo $t201_users_add->LeftColumnClass ?>"><?php echo $t201_users_add->HomePhone->caption() ?><?php echo $t201_users_add->HomePhone->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t201_users_add->RightColumnClass ?>"><div <?php echo $t201_users_add->HomePhone->cellAttributes() ?>>
<span id="el_t201_users_HomePhone">
<input type="text" data-table="t201_users" data-field="x_HomePhone" data-page="2" name="x_HomePhone" id="x_HomePhone" size="30" maxlength="24" placeholder="<?php echo HtmlEncode($t201_users_add->HomePhone->getPlaceHolder()) ?>" value="<?php echo $t201_users_add->HomePhone->EditValue ?>"<?php echo $t201_users_add->HomePhone->editAttributes() ?>>
</span>
<?php echo $t201_users_add->HomePhone->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t201_users_add->Extension->Visible) { // Extension ?>
	<div id="r_Extension" class="form-group row">
		<label id="elh_t201_users_Extension" for="x_Extension" class="<?php echo $t201_users_add->LeftColumnClass ?>"><?php echo $t201_users_add->Extension->caption() ?><?php echo $t201_users_add->Extension->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t201_users_add->RightColumnClass ?>"><div <?php echo $t201_users_add->Extension->cellAttributes() ?>>
<span id="el_t201_users_Extension">
<input type="text" data-table="t201_users" data-field="x_Extension" data-page="2" name="x_Extension" id="x_Extension" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($t201_users_add->Extension->getPlaceHolder()) ?>" value="<?php echo $t201_users_add->Extension->EditValue ?>"<?php echo $t201_users_add->Extension->editAttributes() ?>>
</span>
<?php echo $t201_users_add->Extension->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t201_users_add->_Email->Visible) { // Email ?>
	<div id="r__Email" class="form-group row">
		<label id="elh_t201_users__Email" for="x__Email" class="<?php echo $t201_users_add->LeftColumnClass ?>"><?php echo $t201_users_add->_Email->caption() ?><?php echo $t201_users_add->_Email->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t201_users_add->RightColumnClass ?>"><div <?php echo $t201_users_add->_Email->cellAttributes() ?>>
<span id="el_t201_users__Email">
<input type="text" data-table="t201_users" data-field="x__Email" data-page="2" name="x__Email" id="x__Email" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($t201_users_add->_Email->getPlaceHolder()) ?>" value="<?php echo $t201_users_add->_Email->EditValue ?>"<?php echo $t201_users_add->_Email->editAttributes() ?>>
</span>
<?php echo $t201_users_add->_Email->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t201_users_add->Photo->Visible) { // Photo ?>
	<div id="r_Photo" class="form-group row">
		<label id="elh_t201_users_Photo" for="x_Photo" class="<?php echo $t201_users_add->LeftColumnClass ?>"><?php echo $t201_users_add->Photo->caption() ?><?php echo $t201_users_add->Photo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t201_users_add->RightColumnClass ?>"><div <?php echo $t201_users_add->Photo->cellAttributes() ?>>
<span id="el_t201_users_Photo">
<input type="text" data-table="t201_users" data-field="x_Photo" data-page="2" name="x_Photo" id="x_Photo" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($t201_users_add->Photo->getPlaceHolder()) ?>" value="<?php echo $t201_users_add->Photo->EditValue ?>"<?php echo $t201_users_add->Photo->editAttributes() ?>>
</span>
<?php echo $t201_users_add->Photo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t201_users_add->Notes->Visible) { // Notes ?>
	<div id="r_Notes" class="form-group row">
		<label id="elh_t201_users_Notes" for="x_Notes" class="<?php echo $t201_users_add->LeftColumnClass ?>"><?php echo $t201_users_add->Notes->caption() ?><?php echo $t201_users_add->Notes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t201_users_add->RightColumnClass ?>"><div <?php echo $t201_users_add->Notes->cellAttributes() ?>>
<span id="el_t201_users_Notes">
<textarea data-table="t201_users" data-field="x_Notes" data-page="2" name="x_Notes" id="x_Notes" cols="35" rows="4" placeholder="<?php echo HtmlEncode($t201_users_add->Notes->getPlaceHolder()) ?>"<?php echo $t201_users_add->Notes->editAttributes() ?>><?php echo $t201_users_add->Notes->EditValue ?></textarea>
</span>
<?php echo $t201_users_add->Notes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t201_users_add->ReportsTo->Visible) { // ReportsTo ?>
	<div id="r_ReportsTo" class="form-group row">
		<label id="elh_t201_users_ReportsTo" for="x_ReportsTo" class="<?php echo $t201_users_add->LeftColumnClass ?>"><?php echo $t201_users_add->ReportsTo->caption() ?><?php echo $t201_users_add->ReportsTo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t201_users_add->RightColumnClass ?>"><div <?php echo $t201_users_add->ReportsTo->cellAttributes() ?>>
<span id="el_t201_users_ReportsTo">
<input type="text" data-table="t201_users" data-field="x_ReportsTo" data-page="2" name="x_ReportsTo" id="x_ReportsTo" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t201_users_add->ReportsTo->getPlaceHolder()) ?>" value="<?php echo $t201_users_add->ReportsTo->EditValue ?>"<?php echo $t201_users_add->ReportsTo->editAttributes() ?>>
</span>
<?php echo $t201_users_add->ReportsTo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t201_users_add->Password->Visible) { // Password ?>
	<div id="r_Password" class="form-group row">
		<label id="elh_t201_users_Password" for="x_Password" class="<?php echo $t201_users_add->LeftColumnClass ?>"><?php echo $t201_users_add->Password->caption() ?><?php echo $t201_users_add->Password->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t201_users_add->RightColumnClass ?>"><div <?php echo $t201_users_add->Password->cellAttributes() ?>>
<span id="el_t201_users_Password">
<input type="text" data-table="t201_users" data-field="x_Password" data-page="2" name="x_Password" id="x_Password" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t201_users_add->Password->getPlaceHolder()) ?>" value="<?php echo $t201_users_add->Password->EditValue ?>"<?php echo $t201_users_add->Password->editAttributes() ?>>
</span>
<?php echo $t201_users_add->Password->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t201_users_add->Activated->Visible) { // Activated ?>
	<div id="r_Activated" class="form-group row">
		<label id="elh_t201_users_Activated" class="<?php echo $t201_users_add->LeftColumnClass ?>"><?php echo $t201_users_add->Activated->caption() ?><?php echo $t201_users_add->Activated->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t201_users_add->RightColumnClass ?>"><div <?php echo $t201_users_add->Activated->cellAttributes() ?>>
<span id="el_t201_users_Activated">
<?php
$selwrk = ConvertToBool($t201_users_add->Activated->CurrentValue) ? " checked" : "";
?>
<div class="custom-control custom-checkbox d-inline-block">
	<input type="checkbox" class="custom-control-input" data-table="t201_users" data-field="x_Activated" data-page="2" name="x_Activated[]" id="x_Activated[]_803248" value="1"<?php echo $selwrk ?><?php echo $t201_users_add->Activated->editAttributes() ?>>
	<label class="custom-control-label" for="x_Activated[]_803248"></label>
</div>
</span>
<?php echo $t201_users_add->Activated->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t201_users_add->Profile->Visible) { // Profile ?>
	<div id="r_Profile" class="form-group row">
		<label id="elh_t201_users_Profile" for="x_Profile" class="<?php echo $t201_users_add->LeftColumnClass ?>"><?php echo $t201_users_add->Profile->caption() ?><?php echo $t201_users_add->Profile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t201_users_add->RightColumnClass ?>"><div <?php echo $t201_users_add->Profile->cellAttributes() ?>>
<span id="el_t201_users_Profile">
<textarea data-table="t201_users" data-field="x_Profile" data-page="2" name="x_Profile" id="x_Profile" cols="35" rows="4" placeholder="<?php echo HtmlEncode($t201_users_add->Profile->getPlaceHolder()) ?>"<?php echo $t201_users_add->Profile->editAttributes() ?>><?php echo $t201_users_add->Profile->EditValue ?></textarea>
</span>
<?php echo $t201_users_add->Profile->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
		</div><!-- /multi-page .tab-pane -->
	</div><!-- /multi-page tabs .tab-content -->
</div><!-- /multi-page tabs -->
</div><!-- /multi-page -->
<?php if (!$t201_users_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t201_users_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t201_users_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t201_users_add->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$t201_users_add->terminate();
?>