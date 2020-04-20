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
$t202_userlevels_edit = new t202_userlevels_edit();

// Run the page
$t202_userlevels_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t202_userlevels_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft202_userlevelsedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	ft202_userlevelsedit = currentForm = new ew.Form("ft202_userlevelsedit", "edit");

	// Validate form
	ft202_userlevelsedit.validate = function() {
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
			<?php if ($t202_userlevels_edit->userlevelid->Required) { ?>
				elm = this.getElements("x" + infix + "_userlevelid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t202_userlevels_edit->userlevelid->caption(), $t202_userlevels_edit->userlevelid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_userlevelid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t202_userlevels_edit->userlevelid->errorMessage()) ?>");
			<?php if ($t202_userlevels_edit->userlevelname->Required) { ?>
				elm = this.getElements("x" + infix + "_userlevelname");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t202_userlevels_edit->userlevelname->caption(), $t202_userlevels_edit->userlevelname->RequiredErrorMessage)) ?>");
			<?php } ?>
				var elId = fobj.elements["x" + infix + "_userlevelid"];
				var elName = fobj.elements["x" + infix + "_userlevelname"];
				if (elId && elName) {
					elId.value = $.trim(elId.value);
					elName.value = $.trim(elName.value);
					if (elId && !ew.checkInteger(elId.value))
						return this.onError(elId, ew.language.phrase("UserLevelIDInteger"));
					var level = parseInt(elId.value, 10);
					if (level == 0 && !ew.sameText(elName.value, "Default")) {
						return this.onError(elName, ew.language.phrase("UserLevelDefaultName"));
					} else if (level == -1 && !ew.sameText(elName.value, "Administrator")) {
						return this.onError(elName, ew.language.phrase("UserLevelAdministratorName"));
					} else if (level == -2 && !ew.sameText(elName.value, "Anonymous")) {
						return this.onError(elName, ew.language.phrase("UserLevelAnonymousName"));
					} else if (level < -2) {
						return this.onError(elId, ew.language.phrase("UserLevelIDIncorrect"));
					} else if (level > 0 && ["anonymous", "administrator", "default"].includes(elName.value.toLowerCase())) {
						return this.onError(elName, ew.language.phrase("UserLevelNameIncorrect"));
					}
				}

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
	ft202_userlevelsedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft202_userlevelsedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft202_userlevelsedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t202_userlevels_edit->showPageHeader(); ?>
<?php
$t202_userlevels_edit->showMessage();
?>
<form name="ft202_userlevelsedit" id="ft202_userlevelsedit" class="<?php echo $t202_userlevels_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t202_userlevels">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$t202_userlevels_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($t202_userlevels_edit->userlevelid->Visible) { // userlevelid ?>
	<div id="r_userlevelid" class="form-group row">
		<label id="elh_t202_userlevels_userlevelid" for="x_userlevelid" class="<?php echo $t202_userlevels_edit->LeftColumnClass ?>"><?php echo $t202_userlevels_edit->userlevelid->caption() ?><?php echo $t202_userlevels_edit->userlevelid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t202_userlevels_edit->RightColumnClass ?>"><div <?php echo $t202_userlevels_edit->userlevelid->cellAttributes() ?>>
<input type="text" data-table="t202_userlevels" data-field="x_userlevelid" name="x_userlevelid" id="x_userlevelid" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t202_userlevels_edit->userlevelid->getPlaceHolder()) ?>" value="<?php echo $t202_userlevels_edit->userlevelid->EditValue ?>"<?php echo $t202_userlevels_edit->userlevelid->editAttributes() ?>>
<input type="hidden" data-table="t202_userlevels" data-field="x_userlevelid" name="o_userlevelid" id="o_userlevelid" value="<?php echo HtmlEncode($t202_userlevels_edit->userlevelid->OldValue != null ? $t202_userlevels_edit->userlevelid->OldValue : $t202_userlevels_edit->userlevelid->CurrentValue) ?>">
<?php echo $t202_userlevels_edit->userlevelid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t202_userlevels_edit->userlevelname->Visible) { // userlevelname ?>
	<div id="r_userlevelname" class="form-group row">
		<label id="elh_t202_userlevels_userlevelname" for="x_userlevelname" class="<?php echo $t202_userlevels_edit->LeftColumnClass ?>"><?php echo $t202_userlevels_edit->userlevelname->caption() ?><?php echo $t202_userlevels_edit->userlevelname->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t202_userlevels_edit->RightColumnClass ?>"><div <?php echo $t202_userlevels_edit->userlevelname->cellAttributes() ?>>
<span id="el_t202_userlevels_userlevelname">
<input type="text" data-table="t202_userlevels" data-field="x_userlevelname" name="x_userlevelname" id="x_userlevelname" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($t202_userlevels_edit->userlevelname->getPlaceHolder()) ?>" value="<?php echo $t202_userlevels_edit->userlevelname->EditValue ?>"<?php echo $t202_userlevels_edit->userlevelname->editAttributes() ?>>
</span>
<?php echo $t202_userlevels_edit->userlevelname->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t202_userlevels_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t202_userlevels_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t202_userlevels_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t202_userlevels_edit->showPageFooter();
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
$t202_userlevels_edit->terminate();
?>