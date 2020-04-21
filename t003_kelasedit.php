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
$t003_kelas_edit = new t003_kelas_edit();

// Run the page
$t003_kelas_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t003_kelas_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft003_kelasedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	ft003_kelasedit = currentForm = new ew.Form("ft003_kelasedit", "edit");

	// Validate form
	ft003_kelasedit.validate = function() {
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
			<?php if ($t003_kelas_edit->Kelas->Required) { ?>
				elm = this.getElements("x" + infix + "_Kelas");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t003_kelas_edit->Kelas->caption(), $t003_kelas_edit->Kelas->RequiredErrorMessage)) ?>");
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
	ft003_kelasedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft003_kelasedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft003_kelasedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t003_kelas_edit->showPageHeader(); ?>
<?php
$t003_kelas_edit->showMessage();
?>
<form name="ft003_kelasedit" id="ft003_kelasedit" class="<?php echo $t003_kelas_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t003_kelas">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$t003_kelas_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($t003_kelas_edit->Kelas->Visible) { // Kelas ?>
	<div id="r_Kelas" class="form-group row">
		<label id="elh_t003_kelas_Kelas" for="x_Kelas" class="<?php echo $t003_kelas_edit->LeftColumnClass ?>"><?php echo $t003_kelas_edit->Kelas->caption() ?><?php echo $t003_kelas_edit->Kelas->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t003_kelas_edit->RightColumnClass ?>"><div <?php echo $t003_kelas_edit->Kelas->cellAttributes() ?>>
<span id="el_t003_kelas_Kelas">
<input type="text" data-table="t003_kelas" data-field="x_Kelas" name="x_Kelas" id="x_Kelas" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($t003_kelas_edit->Kelas->getPlaceHolder()) ?>" value="<?php echo $t003_kelas_edit->Kelas->EditValue ?>"<?php echo $t003_kelas_edit->Kelas->editAttributes() ?>>
</span>
<?php echo $t003_kelas_edit->Kelas->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="t003_kelas" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($t003_kelas_edit->id->CurrentValue) ?>">
<?php if (!$t003_kelas_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t003_kelas_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t003_kelas_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t003_kelas_edit->showPageFooter();
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
$t003_kelas_edit->terminate();
?>