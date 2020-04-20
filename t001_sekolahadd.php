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
$t001_sekolah_add = new t001_sekolah_add();

// Run the page
$t001_sekolah_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t001_sekolah_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft001_sekolahadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	ft001_sekolahadd = currentForm = new ew.Form("ft001_sekolahadd", "add");

	// Validate form
	ft001_sekolahadd.validate = function() {
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
			<?php if ($t001_sekolah_add->Nama->Required) { ?>
				elm = this.getElements("x" + infix + "_Nama");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t001_sekolah_add->Nama->caption(), $t001_sekolah_add->Nama->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t001_sekolah_add->Alamat->Required) { ?>
				elm = this.getElements("x" + infix + "_Alamat");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t001_sekolah_add->Alamat->caption(), $t001_sekolah_add->Alamat->RequiredErrorMessage)) ?>");
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
	ft001_sekolahadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft001_sekolahadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft001_sekolahadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t001_sekolah_add->showPageHeader(); ?>
<?php
$t001_sekolah_add->showMessage();
?>
<form name="ft001_sekolahadd" id="ft001_sekolahadd" class="<?php echo $t001_sekolah_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t001_sekolah">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$t001_sekolah_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($t001_sekolah_add->Nama->Visible) { // Nama ?>
	<div id="r_Nama" class="form-group row">
		<label id="elh_t001_sekolah_Nama" for="x_Nama" class="<?php echo $t001_sekolah_add->LeftColumnClass ?>"><?php echo $t001_sekolah_add->Nama->caption() ?><?php echo $t001_sekolah_add->Nama->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t001_sekolah_add->RightColumnClass ?>"><div <?php echo $t001_sekolah_add->Nama->cellAttributes() ?>>
<span id="el_t001_sekolah_Nama">
<input type="text" data-table="t001_sekolah" data-field="x_Nama" name="x_Nama" id="x_Nama" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t001_sekolah_add->Nama->getPlaceHolder()) ?>" value="<?php echo $t001_sekolah_add->Nama->EditValue ?>"<?php echo $t001_sekolah_add->Nama->editAttributes() ?>>
</span>
<?php echo $t001_sekolah_add->Nama->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t001_sekolah_add->Alamat->Visible) { // Alamat ?>
	<div id="r_Alamat" class="form-group row">
		<label id="elh_t001_sekolah_Alamat" for="x_Alamat" class="<?php echo $t001_sekolah_add->LeftColumnClass ?>"><?php echo $t001_sekolah_add->Alamat->caption() ?><?php echo $t001_sekolah_add->Alamat->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t001_sekolah_add->RightColumnClass ?>"><div <?php echo $t001_sekolah_add->Alamat->cellAttributes() ?>>
<span id="el_t001_sekolah_Alamat">
<textarea data-table="t001_sekolah" data-field="x_Alamat" name="x_Alamat" id="x_Alamat" cols="35" rows="4" placeholder="<?php echo HtmlEncode($t001_sekolah_add->Alamat->getPlaceHolder()) ?>"<?php echo $t001_sekolah_add->Alamat->editAttributes() ?>><?php echo $t001_sekolah_add->Alamat->EditValue ?></textarea>
</span>
<?php echo $t001_sekolah_add->Alamat->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t001_sekolah_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t001_sekolah_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t001_sekolah_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t001_sekolah_add->showPageFooter();
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
$t001_sekolah_add->terminate();
?>