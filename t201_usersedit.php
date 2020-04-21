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
$t201_users_edit = new t201_users_edit();

// Run the page
$t201_users_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t201_users_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft201_usersedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	ft201_usersedit = currentForm = new ew.Form("ft201_usersedit", "edit");

	// Validate form
	ft201_usersedit.validate = function() {
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
			<?php if ($t201_users_edit->LastName->Required) { ?>
				elm = this.getElements("x" + infix + "_LastName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t201_users_edit->LastName->caption(), $t201_users_edit->LastName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t201_users_edit->FirstName->Required) { ?>
				elm = this.getElements("x" + infix + "_FirstName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t201_users_edit->FirstName->caption(), $t201_users_edit->FirstName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t201_users_edit->Title->Required) { ?>
				elm = this.getElements("x" + infix + "_Title");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t201_users_edit->Title->caption(), $t201_users_edit->Title->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t201_users_edit->TitleOfCourtesy->Required) { ?>
				elm = this.getElements("x" + infix + "_TitleOfCourtesy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t201_users_edit->TitleOfCourtesy->caption(), $t201_users_edit->TitleOfCourtesy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t201_users_edit->BirthDate->Required) { ?>
				elm = this.getElements("x" + infix + "_BirthDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t201_users_edit->BirthDate->caption(), $t201_users_edit->BirthDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BirthDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t201_users_edit->BirthDate->errorMessage()) ?>");
			<?php if ($t201_users_edit->HireDate->Required) { ?>
				elm = this.getElements("x" + infix + "_HireDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t201_users_edit->HireDate->caption(), $t201_users_edit->HireDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_HireDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t201_users_edit->HireDate->errorMessage()) ?>");
			<?php if ($t201_users_edit->Address->Required) { ?>
				elm = this.getElements("x" + infix + "_Address");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t201_users_edit->Address->caption(), $t201_users_edit->Address->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t201_users_edit->City->Required) { ?>
				elm = this.getElements("x" + infix + "_City");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t201_users_edit->City->caption(), $t201_users_edit->City->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t201_users_edit->Region->Required) { ?>
				elm = this.getElements("x" + infix + "_Region");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t201_users_edit->Region->caption(), $t201_users_edit->Region->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t201_users_edit->PostalCode->Required) { ?>
				elm = this.getElements("x" + infix + "_PostalCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t201_users_edit->PostalCode->caption(), $t201_users_edit->PostalCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t201_users_edit->Country->Required) { ?>
				elm = this.getElements("x" + infix + "_Country");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t201_users_edit->Country->caption(), $t201_users_edit->Country->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t201_users_edit->HomePhone->Required) { ?>
				elm = this.getElements("x" + infix + "_HomePhone");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t201_users_edit->HomePhone->caption(), $t201_users_edit->HomePhone->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t201_users_edit->Extension->Required) { ?>
				elm = this.getElements("x" + infix + "_Extension");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t201_users_edit->Extension->caption(), $t201_users_edit->Extension->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t201_users_edit->_Email->Required) { ?>
				elm = this.getElements("x" + infix + "__Email");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t201_users_edit->_Email->caption(), $t201_users_edit->_Email->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t201_users_edit->Photo->Required) { ?>
				elm = this.getElements("x" + infix + "_Photo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t201_users_edit->Photo->caption(), $t201_users_edit->Photo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t201_users_edit->Notes->Required) { ?>
				elm = this.getElements("x" + infix + "_Notes");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t201_users_edit->Notes->caption(), $t201_users_edit->Notes->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t201_users_edit->ReportsTo->Required) { ?>
				elm = this.getElements("x" + infix + "_ReportsTo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t201_users_edit->ReportsTo->caption(), $t201_users_edit->ReportsTo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ReportsTo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t201_users_edit->ReportsTo->errorMessage()) ?>");
			<?php if ($t201_users_edit->Password->Required) { ?>
				elm = this.getElements("x" + infix + "_Password");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t201_users_edit->Password->caption(), $t201_users_edit->Password->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t201_users_edit->UserLevel->Required) { ?>
				elm = this.getElements("x" + infix + "_UserLevel");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t201_users_edit->UserLevel->caption(), $t201_users_edit->UserLevel->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t201_users_edit->Username->Required) { ?>
				elm = this.getElements("x" + infix + "_Username");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t201_users_edit->Username->caption(), $t201_users_edit->Username->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t201_users_edit->Activated->Required) { ?>
				elm = this.getElements("x" + infix + "_Activated[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t201_users_edit->Activated->caption(), $t201_users_edit->Activated->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t201_users_edit->Profile->Required) { ?>
				elm = this.getElements("x" + infix + "_Profile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t201_users_edit->Profile->caption(), $t201_users_edit->Profile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t201_users_edit->sekolah_id->Required) { ?>
				elm = this.getElements("x" + infix + "_sekolah_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t201_users_edit->sekolah_id->caption(), $t201_users_edit->sekolah_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t201_users_edit->tahunajaran_id->Required) { ?>
				elm = this.getElements("x" + infix + "_tahunajaran_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t201_users_edit->tahunajaran_id->caption(), $t201_users_edit->tahunajaran_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t201_users_edit->kelas_id->Required) { ?>
				elm = this.getElements("x" + infix + "_kelas_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t201_users_edit->kelas_id->caption(), $t201_users_edit->kelas_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t201_users_edit->semester_id->Required) { ?>
				elm = this.getElements("x" + infix + "_semester_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t201_users_edit->semester_id->caption(), $t201_users_edit->semester_id->RequiredErrorMessage)) ?>");
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
	ft201_usersedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft201_usersedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Multi-Page
	ft201_usersedit.multiPage = new ew.MultiPage("ft201_usersedit");

	// Dynamic selection lists
	ft201_usersedit.lists["x_UserLevel"] = <?php echo $t201_users_edit->UserLevel->Lookup->toClientList($t201_users_edit) ?>;
	ft201_usersedit.lists["x_UserLevel"].options = <?php echo JsonEncode($t201_users_edit->UserLevel->lookupOptions()) ?>;
	ft201_usersedit.lists["x_Activated[]"] = <?php echo $t201_users_edit->Activated->Lookup->toClientList($t201_users_edit) ?>;
	ft201_usersedit.lists["x_Activated[]"].options = <?php echo JsonEncode($t201_users_edit->Activated->options(FALSE, TRUE)) ?>;
	ft201_usersedit.lists["x_sekolah_id"] = <?php echo $t201_users_edit->sekolah_id->Lookup->toClientList($t201_users_edit) ?>;
	ft201_usersedit.lists["x_sekolah_id"].options = <?php echo JsonEncode($t201_users_edit->sekolah_id->lookupOptions()) ?>;
	ft201_usersedit.lists["x_tahunajaran_id"] = <?php echo $t201_users_edit->tahunajaran_id->Lookup->toClientList($t201_users_edit) ?>;
	ft201_usersedit.lists["x_tahunajaran_id"].options = <?php echo JsonEncode($t201_users_edit->tahunajaran_id->lookupOptions()) ?>;
	ft201_usersedit.lists["x_kelas_id"] = <?php echo $t201_users_edit->kelas_id->Lookup->toClientList($t201_users_edit) ?>;
	ft201_usersedit.lists["x_kelas_id"].options = <?php echo JsonEncode($t201_users_edit->kelas_id->lookupOptions()) ?>;
	ft201_usersedit.lists["x_semester_id"] = <?php echo $t201_users_edit->semester_id->Lookup->toClientList($t201_users_edit) ?>;
	ft201_usersedit.lists["x_semester_id"].options = <?php echo JsonEncode($t201_users_edit->semester_id->lookupOptions()) ?>;
	loadjs.done("ft201_usersedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t201_users_edit->showPageHeader(); ?>
<?php
$t201_users_edit->showMessage();
?>
<form name="ft201_usersedit" id="ft201_usersedit" class="<?php echo $t201_users_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t201_users">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$t201_users_edit->IsModal ?>">
<div class="ew-multi-page"><!-- multi-page -->
<div class="ew-nav-tabs" id="t201_users_edit"><!-- multi-page tabs -->
	<ul class="<?php echo $t201_users_edit->MultiPages->navStyle() ?>">
		<li class="nav-item"><a class="nav-link<?php echo $t201_users_edit->MultiPages->pageStyle(1) ?>" href="#tab_t201_users1" data-toggle="tab"><?php echo $t201_users->pageCaption(1) ?></a></li>
		<li class="nav-item"><a class="nav-link<?php echo $t201_users_edit->MultiPages->pageStyle(2) ?>" href="#tab_t201_users2" data-toggle="tab"><?php echo $t201_users->pageCaption(2) ?></a></li>
	</ul>
	<div class="tab-content"><!-- multi-page tabs .tab-content -->
		<div class="tab-pane<?php echo $t201_users_edit->MultiPages->pageStyle(1) ?>" id="tab_t201_users1"><!-- multi-page .tab-pane -->
<div class="ew-edit-div"><!-- page* -->
<?php if ($t201_users_edit->UserLevel->Visible) { // UserLevel ?>
	<div id="r_UserLevel" class="form-group row">
		<label id="elh_t201_users_UserLevel" for="x_UserLevel" class="<?php echo $t201_users_edit->LeftColumnClass ?>"><?php echo $t201_users_edit->UserLevel->caption() ?><?php echo $t201_users_edit->UserLevel->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t201_users_edit->RightColumnClass ?>"><div <?php echo $t201_users_edit->UserLevel->cellAttributes() ?>>
<?php if (!$Security->isAdmin() && $Security->isLoggedIn()) { // Non system admin ?>
<span id="el_t201_users_UserLevel">
<input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t201_users_edit->UserLevel->EditValue)) ?>">
</span>
<?php } else { ?>
<span id="el_t201_users_UserLevel">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t201_users" data-field="x_UserLevel" data-page="1" data-value-separator="<?php echo $t201_users_edit->UserLevel->displayValueSeparatorAttribute() ?>" id="x_UserLevel" name="x_UserLevel"<?php echo $t201_users_edit->UserLevel->editAttributes() ?>>
			<?php echo $t201_users_edit->UserLevel->selectOptionListHtml("x_UserLevel") ?>
		</select>
</div>
<?php echo $t201_users_edit->UserLevel->Lookup->getParamTag($t201_users_edit, "p_x_UserLevel") ?>
</span>
<?php } ?>
<?php echo $t201_users_edit->UserLevel->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t201_users_edit->Username->Visible) { // Username ?>
	<div id="r_Username" class="form-group row">
		<label id="elh_t201_users_Username" for="x_Username" class="<?php echo $t201_users_edit->LeftColumnClass ?>"><?php echo $t201_users_edit->Username->caption() ?><?php echo $t201_users_edit->Username->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t201_users_edit->RightColumnClass ?>"><div <?php echo $t201_users_edit->Username->cellAttributes() ?>>
<span id="el_t201_users_Username">
<input type="text" data-table="t201_users" data-field="x_Username" data-page="1" name="x_Username" id="x_Username" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($t201_users_edit->Username->getPlaceHolder()) ?>" value="<?php echo $t201_users_edit->Username->EditValue ?>"<?php echo $t201_users_edit->Username->editAttributes() ?>>
</span>
<?php echo $t201_users_edit->Username->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t201_users_edit->sekolah_id->Visible) { // sekolah_id ?>
	<div id="r_sekolah_id" class="form-group row">
		<label id="elh_t201_users_sekolah_id" for="x_sekolah_id" class="<?php echo $t201_users_edit->LeftColumnClass ?>"><?php echo $t201_users_edit->sekolah_id->caption() ?><?php echo $t201_users_edit->sekolah_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t201_users_edit->RightColumnClass ?>"><div <?php echo $t201_users_edit->sekolah_id->cellAttributes() ?>>
<span id="el_t201_users_sekolah_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t201_users" data-field="x_sekolah_id" data-page="1" data-value-separator="<?php echo $t201_users_edit->sekolah_id->displayValueSeparatorAttribute() ?>" id="x_sekolah_id" name="x_sekolah_id"<?php echo $t201_users_edit->sekolah_id->editAttributes() ?>>
			<?php echo $t201_users_edit->sekolah_id->selectOptionListHtml("x_sekolah_id") ?>
		</select>
</div>
<?php echo $t201_users_edit->sekolah_id->Lookup->getParamTag($t201_users_edit, "p_x_sekolah_id") ?>
</span>
<?php echo $t201_users_edit->sekolah_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t201_users_edit->tahunajaran_id->Visible) { // tahunajaran_id ?>
	<div id="r_tahunajaran_id" class="form-group row">
		<label id="elh_t201_users_tahunajaran_id" for="x_tahunajaran_id" class="<?php echo $t201_users_edit->LeftColumnClass ?>"><?php echo $t201_users_edit->tahunajaran_id->caption() ?><?php echo $t201_users_edit->tahunajaran_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t201_users_edit->RightColumnClass ?>"><div <?php echo $t201_users_edit->tahunajaran_id->cellAttributes() ?>>
<span id="el_t201_users_tahunajaran_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t201_users" data-field="x_tahunajaran_id" data-page="1" data-value-separator="<?php echo $t201_users_edit->tahunajaran_id->displayValueSeparatorAttribute() ?>" id="x_tahunajaran_id" name="x_tahunajaran_id"<?php echo $t201_users_edit->tahunajaran_id->editAttributes() ?>>
			<?php echo $t201_users_edit->tahunajaran_id->selectOptionListHtml("x_tahunajaran_id") ?>
		</select>
</div>
<?php echo $t201_users_edit->tahunajaran_id->Lookup->getParamTag($t201_users_edit, "p_x_tahunajaran_id") ?>
</span>
<?php echo $t201_users_edit->tahunajaran_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t201_users_edit->kelas_id->Visible) { // kelas_id ?>
	<div id="r_kelas_id" class="form-group row">
		<label id="elh_t201_users_kelas_id" for="x_kelas_id" class="<?php echo $t201_users_edit->LeftColumnClass ?>"><?php echo $t201_users_edit->kelas_id->caption() ?><?php echo $t201_users_edit->kelas_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t201_users_edit->RightColumnClass ?>"><div <?php echo $t201_users_edit->kelas_id->cellAttributes() ?>>
<span id="el_t201_users_kelas_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t201_users" data-field="x_kelas_id" data-page="1" data-value-separator="<?php echo $t201_users_edit->kelas_id->displayValueSeparatorAttribute() ?>" id="x_kelas_id" name="x_kelas_id"<?php echo $t201_users_edit->kelas_id->editAttributes() ?>>
			<?php echo $t201_users_edit->kelas_id->selectOptionListHtml("x_kelas_id") ?>
		</select>
</div>
<?php echo $t201_users_edit->kelas_id->Lookup->getParamTag($t201_users_edit, "p_x_kelas_id") ?>
</span>
<?php echo $t201_users_edit->kelas_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t201_users_edit->semester_id->Visible) { // semester_id ?>
	<div id="r_semester_id" class="form-group row">
		<label id="elh_t201_users_semester_id" for="x_semester_id" class="<?php echo $t201_users_edit->LeftColumnClass ?>"><?php echo $t201_users_edit->semester_id->caption() ?><?php echo $t201_users_edit->semester_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t201_users_edit->RightColumnClass ?>"><div <?php echo $t201_users_edit->semester_id->cellAttributes() ?>>
<span id="el_t201_users_semester_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t201_users" data-field="x_semester_id" data-page="1" data-value-separator="<?php echo $t201_users_edit->semester_id->displayValueSeparatorAttribute() ?>" id="x_semester_id" name="x_semester_id"<?php echo $t201_users_edit->semester_id->editAttributes() ?>>
			<?php echo $t201_users_edit->semester_id->selectOptionListHtml("x_semester_id") ?>
		</select>
</div>
<?php echo $t201_users_edit->semester_id->Lookup->getParamTag($t201_users_edit, "p_x_semester_id") ?>
</span>
<?php echo $t201_users_edit->semester_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
		</div><!-- /multi-page .tab-pane -->
		<div class="tab-pane<?php echo $t201_users_edit->MultiPages->pageStyle(2) ?>" id="tab_t201_users2"><!-- multi-page .tab-pane -->
<div class="ew-edit-div"><!-- page* -->
<?php if ($t201_users_edit->LastName->Visible) { // LastName ?>
	<div id="r_LastName" class="form-group row">
		<label id="elh_t201_users_LastName" for="x_LastName" class="<?php echo $t201_users_edit->LeftColumnClass ?>"><?php echo $t201_users_edit->LastName->caption() ?><?php echo $t201_users_edit->LastName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t201_users_edit->RightColumnClass ?>"><div <?php echo $t201_users_edit->LastName->cellAttributes() ?>>
<span id="el_t201_users_LastName">
<input type="text" data-table="t201_users" data-field="x_LastName" data-page="2" name="x_LastName" id="x_LastName" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($t201_users_edit->LastName->getPlaceHolder()) ?>" value="<?php echo $t201_users_edit->LastName->EditValue ?>"<?php echo $t201_users_edit->LastName->editAttributes() ?>>
</span>
<?php echo $t201_users_edit->LastName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t201_users_edit->FirstName->Visible) { // FirstName ?>
	<div id="r_FirstName" class="form-group row">
		<label id="elh_t201_users_FirstName" for="x_FirstName" class="<?php echo $t201_users_edit->LeftColumnClass ?>"><?php echo $t201_users_edit->FirstName->caption() ?><?php echo $t201_users_edit->FirstName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t201_users_edit->RightColumnClass ?>"><div <?php echo $t201_users_edit->FirstName->cellAttributes() ?>>
<span id="el_t201_users_FirstName">
<input type="text" data-table="t201_users" data-field="x_FirstName" data-page="2" name="x_FirstName" id="x_FirstName" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($t201_users_edit->FirstName->getPlaceHolder()) ?>" value="<?php echo $t201_users_edit->FirstName->EditValue ?>"<?php echo $t201_users_edit->FirstName->editAttributes() ?>>
</span>
<?php echo $t201_users_edit->FirstName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t201_users_edit->Title->Visible) { // Title ?>
	<div id="r_Title" class="form-group row">
		<label id="elh_t201_users_Title" for="x_Title" class="<?php echo $t201_users_edit->LeftColumnClass ?>"><?php echo $t201_users_edit->Title->caption() ?><?php echo $t201_users_edit->Title->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t201_users_edit->RightColumnClass ?>"><div <?php echo $t201_users_edit->Title->cellAttributes() ?>>
<span id="el_t201_users_Title">
<input type="text" data-table="t201_users" data-field="x_Title" data-page="2" name="x_Title" id="x_Title" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($t201_users_edit->Title->getPlaceHolder()) ?>" value="<?php echo $t201_users_edit->Title->EditValue ?>"<?php echo $t201_users_edit->Title->editAttributes() ?>>
</span>
<?php echo $t201_users_edit->Title->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t201_users_edit->TitleOfCourtesy->Visible) { // TitleOfCourtesy ?>
	<div id="r_TitleOfCourtesy" class="form-group row">
		<label id="elh_t201_users_TitleOfCourtesy" for="x_TitleOfCourtesy" class="<?php echo $t201_users_edit->LeftColumnClass ?>"><?php echo $t201_users_edit->TitleOfCourtesy->caption() ?><?php echo $t201_users_edit->TitleOfCourtesy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t201_users_edit->RightColumnClass ?>"><div <?php echo $t201_users_edit->TitleOfCourtesy->cellAttributes() ?>>
<span id="el_t201_users_TitleOfCourtesy">
<input type="text" data-table="t201_users" data-field="x_TitleOfCourtesy" data-page="2" name="x_TitleOfCourtesy" id="x_TitleOfCourtesy" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($t201_users_edit->TitleOfCourtesy->getPlaceHolder()) ?>" value="<?php echo $t201_users_edit->TitleOfCourtesy->EditValue ?>"<?php echo $t201_users_edit->TitleOfCourtesy->editAttributes() ?>>
</span>
<?php echo $t201_users_edit->TitleOfCourtesy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t201_users_edit->BirthDate->Visible) { // BirthDate ?>
	<div id="r_BirthDate" class="form-group row">
		<label id="elh_t201_users_BirthDate" for="x_BirthDate" class="<?php echo $t201_users_edit->LeftColumnClass ?>"><?php echo $t201_users_edit->BirthDate->caption() ?><?php echo $t201_users_edit->BirthDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t201_users_edit->RightColumnClass ?>"><div <?php echo $t201_users_edit->BirthDate->cellAttributes() ?>>
<span id="el_t201_users_BirthDate">
<input type="text" data-table="t201_users" data-field="x_BirthDate" data-page="2" name="x_BirthDate" id="x_BirthDate" maxlength="19" placeholder="<?php echo HtmlEncode($t201_users_edit->BirthDate->getPlaceHolder()) ?>" value="<?php echo $t201_users_edit->BirthDate->EditValue ?>"<?php echo $t201_users_edit->BirthDate->editAttributes() ?>>
<?php if (!$t201_users_edit->BirthDate->ReadOnly && !$t201_users_edit->BirthDate->Disabled && !isset($t201_users_edit->BirthDate->EditAttrs["readonly"]) && !isset($t201_users_edit->BirthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft201_usersedit", "datetimepicker"], function() {
	ew.createDateTimePicker("ft201_usersedit", "x_BirthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $t201_users_edit->BirthDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t201_users_edit->HireDate->Visible) { // HireDate ?>
	<div id="r_HireDate" class="form-group row">
		<label id="elh_t201_users_HireDate" for="x_HireDate" class="<?php echo $t201_users_edit->LeftColumnClass ?>"><?php echo $t201_users_edit->HireDate->caption() ?><?php echo $t201_users_edit->HireDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t201_users_edit->RightColumnClass ?>"><div <?php echo $t201_users_edit->HireDate->cellAttributes() ?>>
<span id="el_t201_users_HireDate">
<input type="text" data-table="t201_users" data-field="x_HireDate" data-page="2" name="x_HireDate" id="x_HireDate" maxlength="19" placeholder="<?php echo HtmlEncode($t201_users_edit->HireDate->getPlaceHolder()) ?>" value="<?php echo $t201_users_edit->HireDate->EditValue ?>"<?php echo $t201_users_edit->HireDate->editAttributes() ?>>
<?php if (!$t201_users_edit->HireDate->ReadOnly && !$t201_users_edit->HireDate->Disabled && !isset($t201_users_edit->HireDate->EditAttrs["readonly"]) && !isset($t201_users_edit->HireDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft201_usersedit", "datetimepicker"], function() {
	ew.createDateTimePicker("ft201_usersedit", "x_HireDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $t201_users_edit->HireDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t201_users_edit->Address->Visible) { // Address ?>
	<div id="r_Address" class="form-group row">
		<label id="elh_t201_users_Address" for="x_Address" class="<?php echo $t201_users_edit->LeftColumnClass ?>"><?php echo $t201_users_edit->Address->caption() ?><?php echo $t201_users_edit->Address->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t201_users_edit->RightColumnClass ?>"><div <?php echo $t201_users_edit->Address->cellAttributes() ?>>
<span id="el_t201_users_Address">
<input type="text" data-table="t201_users" data-field="x_Address" data-page="2" name="x_Address" id="x_Address" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($t201_users_edit->Address->getPlaceHolder()) ?>" value="<?php echo $t201_users_edit->Address->EditValue ?>"<?php echo $t201_users_edit->Address->editAttributes() ?>>
</span>
<?php echo $t201_users_edit->Address->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t201_users_edit->City->Visible) { // City ?>
	<div id="r_City" class="form-group row">
		<label id="elh_t201_users_City" for="x_City" class="<?php echo $t201_users_edit->LeftColumnClass ?>"><?php echo $t201_users_edit->City->caption() ?><?php echo $t201_users_edit->City->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t201_users_edit->RightColumnClass ?>"><div <?php echo $t201_users_edit->City->cellAttributes() ?>>
<span id="el_t201_users_City">
<input type="text" data-table="t201_users" data-field="x_City" data-page="2" name="x_City" id="x_City" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($t201_users_edit->City->getPlaceHolder()) ?>" value="<?php echo $t201_users_edit->City->EditValue ?>"<?php echo $t201_users_edit->City->editAttributes() ?>>
</span>
<?php echo $t201_users_edit->City->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t201_users_edit->Region->Visible) { // Region ?>
	<div id="r_Region" class="form-group row">
		<label id="elh_t201_users_Region" for="x_Region" class="<?php echo $t201_users_edit->LeftColumnClass ?>"><?php echo $t201_users_edit->Region->caption() ?><?php echo $t201_users_edit->Region->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t201_users_edit->RightColumnClass ?>"><div <?php echo $t201_users_edit->Region->cellAttributes() ?>>
<span id="el_t201_users_Region">
<input type="text" data-table="t201_users" data-field="x_Region" data-page="2" name="x_Region" id="x_Region" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($t201_users_edit->Region->getPlaceHolder()) ?>" value="<?php echo $t201_users_edit->Region->EditValue ?>"<?php echo $t201_users_edit->Region->editAttributes() ?>>
</span>
<?php echo $t201_users_edit->Region->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t201_users_edit->PostalCode->Visible) { // PostalCode ?>
	<div id="r_PostalCode" class="form-group row">
		<label id="elh_t201_users_PostalCode" for="x_PostalCode" class="<?php echo $t201_users_edit->LeftColumnClass ?>"><?php echo $t201_users_edit->PostalCode->caption() ?><?php echo $t201_users_edit->PostalCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t201_users_edit->RightColumnClass ?>"><div <?php echo $t201_users_edit->PostalCode->cellAttributes() ?>>
<span id="el_t201_users_PostalCode">
<input type="text" data-table="t201_users" data-field="x_PostalCode" data-page="2" name="x_PostalCode" id="x_PostalCode" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($t201_users_edit->PostalCode->getPlaceHolder()) ?>" value="<?php echo $t201_users_edit->PostalCode->EditValue ?>"<?php echo $t201_users_edit->PostalCode->editAttributes() ?>>
</span>
<?php echo $t201_users_edit->PostalCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t201_users_edit->Country->Visible) { // Country ?>
	<div id="r_Country" class="form-group row">
		<label id="elh_t201_users_Country" for="x_Country" class="<?php echo $t201_users_edit->LeftColumnClass ?>"><?php echo $t201_users_edit->Country->caption() ?><?php echo $t201_users_edit->Country->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t201_users_edit->RightColumnClass ?>"><div <?php echo $t201_users_edit->Country->cellAttributes() ?>>
<span id="el_t201_users_Country">
<input type="text" data-table="t201_users" data-field="x_Country" data-page="2" name="x_Country" id="x_Country" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($t201_users_edit->Country->getPlaceHolder()) ?>" value="<?php echo $t201_users_edit->Country->EditValue ?>"<?php echo $t201_users_edit->Country->editAttributes() ?>>
</span>
<?php echo $t201_users_edit->Country->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t201_users_edit->HomePhone->Visible) { // HomePhone ?>
	<div id="r_HomePhone" class="form-group row">
		<label id="elh_t201_users_HomePhone" for="x_HomePhone" class="<?php echo $t201_users_edit->LeftColumnClass ?>"><?php echo $t201_users_edit->HomePhone->caption() ?><?php echo $t201_users_edit->HomePhone->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t201_users_edit->RightColumnClass ?>"><div <?php echo $t201_users_edit->HomePhone->cellAttributes() ?>>
<span id="el_t201_users_HomePhone">
<input type="text" data-table="t201_users" data-field="x_HomePhone" data-page="2" name="x_HomePhone" id="x_HomePhone" size="30" maxlength="24" placeholder="<?php echo HtmlEncode($t201_users_edit->HomePhone->getPlaceHolder()) ?>" value="<?php echo $t201_users_edit->HomePhone->EditValue ?>"<?php echo $t201_users_edit->HomePhone->editAttributes() ?>>
</span>
<?php echo $t201_users_edit->HomePhone->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t201_users_edit->Extension->Visible) { // Extension ?>
	<div id="r_Extension" class="form-group row">
		<label id="elh_t201_users_Extension" for="x_Extension" class="<?php echo $t201_users_edit->LeftColumnClass ?>"><?php echo $t201_users_edit->Extension->caption() ?><?php echo $t201_users_edit->Extension->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t201_users_edit->RightColumnClass ?>"><div <?php echo $t201_users_edit->Extension->cellAttributes() ?>>
<span id="el_t201_users_Extension">
<input type="text" data-table="t201_users" data-field="x_Extension" data-page="2" name="x_Extension" id="x_Extension" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($t201_users_edit->Extension->getPlaceHolder()) ?>" value="<?php echo $t201_users_edit->Extension->EditValue ?>"<?php echo $t201_users_edit->Extension->editAttributes() ?>>
</span>
<?php echo $t201_users_edit->Extension->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t201_users_edit->_Email->Visible) { // Email ?>
	<div id="r__Email" class="form-group row">
		<label id="elh_t201_users__Email" for="x__Email" class="<?php echo $t201_users_edit->LeftColumnClass ?>"><?php echo $t201_users_edit->_Email->caption() ?><?php echo $t201_users_edit->_Email->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t201_users_edit->RightColumnClass ?>"><div <?php echo $t201_users_edit->_Email->cellAttributes() ?>>
<span id="el_t201_users__Email">
<input type="text" data-table="t201_users" data-field="x__Email" data-page="2" name="x__Email" id="x__Email" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($t201_users_edit->_Email->getPlaceHolder()) ?>" value="<?php echo $t201_users_edit->_Email->EditValue ?>"<?php echo $t201_users_edit->_Email->editAttributes() ?>>
</span>
<?php echo $t201_users_edit->_Email->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t201_users_edit->Photo->Visible) { // Photo ?>
	<div id="r_Photo" class="form-group row">
		<label id="elh_t201_users_Photo" for="x_Photo" class="<?php echo $t201_users_edit->LeftColumnClass ?>"><?php echo $t201_users_edit->Photo->caption() ?><?php echo $t201_users_edit->Photo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t201_users_edit->RightColumnClass ?>"><div <?php echo $t201_users_edit->Photo->cellAttributes() ?>>
<span id="el_t201_users_Photo">
<input type="text" data-table="t201_users" data-field="x_Photo" data-page="2" name="x_Photo" id="x_Photo" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($t201_users_edit->Photo->getPlaceHolder()) ?>" value="<?php echo $t201_users_edit->Photo->EditValue ?>"<?php echo $t201_users_edit->Photo->editAttributes() ?>>
</span>
<?php echo $t201_users_edit->Photo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t201_users_edit->Notes->Visible) { // Notes ?>
	<div id="r_Notes" class="form-group row">
		<label id="elh_t201_users_Notes" for="x_Notes" class="<?php echo $t201_users_edit->LeftColumnClass ?>"><?php echo $t201_users_edit->Notes->caption() ?><?php echo $t201_users_edit->Notes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t201_users_edit->RightColumnClass ?>"><div <?php echo $t201_users_edit->Notes->cellAttributes() ?>>
<span id="el_t201_users_Notes">
<textarea data-table="t201_users" data-field="x_Notes" data-page="2" name="x_Notes" id="x_Notes" cols="35" rows="4" placeholder="<?php echo HtmlEncode($t201_users_edit->Notes->getPlaceHolder()) ?>"<?php echo $t201_users_edit->Notes->editAttributes() ?>><?php echo $t201_users_edit->Notes->EditValue ?></textarea>
</span>
<?php echo $t201_users_edit->Notes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t201_users_edit->ReportsTo->Visible) { // ReportsTo ?>
	<div id="r_ReportsTo" class="form-group row">
		<label id="elh_t201_users_ReportsTo" for="x_ReportsTo" class="<?php echo $t201_users_edit->LeftColumnClass ?>"><?php echo $t201_users_edit->ReportsTo->caption() ?><?php echo $t201_users_edit->ReportsTo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t201_users_edit->RightColumnClass ?>"><div <?php echo $t201_users_edit->ReportsTo->cellAttributes() ?>>
<span id="el_t201_users_ReportsTo">
<input type="text" data-table="t201_users" data-field="x_ReportsTo" data-page="2" name="x_ReportsTo" id="x_ReportsTo" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t201_users_edit->ReportsTo->getPlaceHolder()) ?>" value="<?php echo $t201_users_edit->ReportsTo->EditValue ?>"<?php echo $t201_users_edit->ReportsTo->editAttributes() ?>>
</span>
<?php echo $t201_users_edit->ReportsTo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t201_users_edit->Password->Visible) { // Password ?>
	<div id="r_Password" class="form-group row">
		<label id="elh_t201_users_Password" for="x_Password" class="<?php echo $t201_users_edit->LeftColumnClass ?>"><?php echo $t201_users_edit->Password->caption() ?><?php echo $t201_users_edit->Password->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t201_users_edit->RightColumnClass ?>"><div <?php echo $t201_users_edit->Password->cellAttributes() ?>>
<span id="el_t201_users_Password">
<input type="text" data-table="t201_users" data-field="x_Password" data-page="2" name="x_Password" id="x_Password" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t201_users_edit->Password->getPlaceHolder()) ?>" value="<?php echo $t201_users_edit->Password->EditValue ?>"<?php echo $t201_users_edit->Password->editAttributes() ?>>
</span>
<?php echo $t201_users_edit->Password->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t201_users_edit->Activated->Visible) { // Activated ?>
	<div id="r_Activated" class="form-group row">
		<label id="elh_t201_users_Activated" class="<?php echo $t201_users_edit->LeftColumnClass ?>"><?php echo $t201_users_edit->Activated->caption() ?><?php echo $t201_users_edit->Activated->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t201_users_edit->RightColumnClass ?>"><div <?php echo $t201_users_edit->Activated->cellAttributes() ?>>
<span id="el_t201_users_Activated">
<?php
$selwrk = ConvertToBool($t201_users_edit->Activated->CurrentValue) ? " checked" : "";
?>
<div class="custom-control custom-checkbox d-inline-block">
	<input type="checkbox" class="custom-control-input" data-table="t201_users" data-field="x_Activated" data-page="2" name="x_Activated[]" id="x_Activated[]_793834" value="1"<?php echo $selwrk ?><?php echo $t201_users_edit->Activated->editAttributes() ?>>
	<label class="custom-control-label" for="x_Activated[]_793834"></label>
</div>
</span>
<?php echo $t201_users_edit->Activated->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t201_users_edit->Profile->Visible) { // Profile ?>
	<div id="r_Profile" class="form-group row">
		<label id="elh_t201_users_Profile" for="x_Profile" class="<?php echo $t201_users_edit->LeftColumnClass ?>"><?php echo $t201_users_edit->Profile->caption() ?><?php echo $t201_users_edit->Profile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t201_users_edit->RightColumnClass ?>"><div <?php echo $t201_users_edit->Profile->cellAttributes() ?>>
<span id="el_t201_users_Profile">
<textarea data-table="t201_users" data-field="x_Profile" data-page="2" name="x_Profile" id="x_Profile" cols="35" rows="4" placeholder="<?php echo HtmlEncode($t201_users_edit->Profile->getPlaceHolder()) ?>"<?php echo $t201_users_edit->Profile->editAttributes() ?>><?php echo $t201_users_edit->Profile->EditValue ?></textarea>
</span>
<?php echo $t201_users_edit->Profile->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
		</div><!-- /multi-page .tab-pane -->
	</div><!-- /multi-page tabs .tab-content -->
</div><!-- /multi-page tabs -->
</div><!-- /multi-page -->
	<input type="hidden" data-table="t201_users" data-field="x_EmployeeID" name="x_EmployeeID" id="x_EmployeeID" value="<?php echo HtmlEncode($t201_users_edit->EmployeeID->CurrentValue) ?>">
<?php if (!$t201_users_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t201_users_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t201_users_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t201_users_edit->showPageFooter();
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
$t201_users_edit->terminate();
?>