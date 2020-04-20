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
$t001_sekolah_edit = new t001_sekolah_edit();

// Run the page
$t001_sekolah_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t001_sekolah_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft001_sekolahedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	ft001_sekolahedit = currentForm = new ew.Form("ft001_sekolahedit", "edit");

	// Validate form
	ft001_sekolahedit.validate = function() {
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
			<?php if ($t001_sekolah_edit->Nama->Required) { ?>
				elm = this.getElements("x" + infix + "_Nama");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t001_sekolah_edit->Nama->caption(), $t001_sekolah_edit->Nama->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t001_sekolah_edit->Alamat->Required) { ?>
				elm = this.getElements("x" + infix + "_Alamat");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t001_sekolah_edit->Alamat->caption(), $t001_sekolah_edit->Alamat->RequiredErrorMessage)) ?>");
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
	ft001_sekolahedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft001_sekolahedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft001_sekolahedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t001_sekolah_edit->showPageHeader(); ?>
<?php
$t001_sekolah_edit->showMessage();
?>
<form name="ft001_sekolahedit" id="ft001_sekolahedit" class="<?php echo $t001_sekolah_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t001_sekolah">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$t001_sekolah_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($t001_sekolah_edit->Nama->Visible) { // Nama ?>
	<div id="r_Nama" class="form-group row">
		<label id="elh_t001_sekolah_Nama" for="x_Nama" class="<?php echo $t001_sekolah_edit->LeftColumnClass ?>"><?php echo $t001_sekolah_edit->Nama->caption() ?><?php echo $t001_sekolah_edit->Nama->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t001_sekolah_edit->RightColumnClass ?>"><div <?php echo $t001_sekolah_edit->Nama->cellAttributes() ?>>
<span id="el_t001_sekolah_Nama">
<input type="text" data-table="t001_sekolah" data-field="x_Nama" name="x_Nama" id="x_Nama" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t001_sekolah_edit->Nama->getPlaceHolder()) ?>" value="<?php echo $t001_sekolah_edit->Nama->EditValue ?>"<?php echo $t001_sekolah_edit->Nama->editAttributes() ?>>
</span>
<?php echo $t001_sekolah_edit->Nama->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t001_sekolah_edit->Alamat->Visible) { // Alamat ?>
	<div id="r_Alamat" class="form-group row">
		<label id="elh_t001_sekolah_Alamat" for="x_Alamat" class="<?php echo $t001_sekolah_edit->LeftColumnClass ?>"><?php echo $t001_sekolah_edit->Alamat->caption() ?><?php echo $t001_sekolah_edit->Alamat->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t001_sekolah_edit->RightColumnClass ?>"><div <?php echo $t001_sekolah_edit->Alamat->cellAttributes() ?>>
<span id="el_t001_sekolah_Alamat">
<textarea data-table="t001_sekolah" data-field="x_Alamat" name="x_Alamat" id="x_Alamat" cols="35" rows="4" placeholder="<?php echo HtmlEncode($t001_sekolah_edit->Alamat->getPlaceHolder()) ?>"<?php echo $t001_sekolah_edit->Alamat->editAttributes() ?>><?php echo $t001_sekolah_edit->Alamat->EditValue ?></textarea>
</span>
<?php echo $t001_sekolah_edit->Alamat->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="t001_sekolah" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($t001_sekolah_edit->id->CurrentValue) ?>">
<?php if (!$t001_sekolah_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t001_sekolah_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t001_sekolah_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t001_sekolah_edit->showPageFooter();
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
$t001_sekolah_edit->terminate();
?>