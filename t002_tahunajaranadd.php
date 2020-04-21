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
$t002_tahunajaran_add = new t002_tahunajaran_add();

// Run the page
$t002_tahunajaran_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t002_tahunajaran_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft002_tahunajaranadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	ft002_tahunajaranadd = currentForm = new ew.Form("ft002_tahunajaranadd", "add");

	// Validate form
	ft002_tahunajaranadd.validate = function() {
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
			<?php if ($t002_tahunajaran_add->Mulai->Required) { ?>
				elm = this.getElements("x" + infix + "_Mulai");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_tahunajaran_add->Mulai->caption(), $t002_tahunajaran_add->Mulai->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t002_tahunajaran_add->Selesai->Required) { ?>
				elm = this.getElements("x" + infix + "_Selesai");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_tahunajaran_add->Selesai->caption(), $t002_tahunajaran_add->Selesai->RequiredErrorMessage)) ?>");
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
	ft002_tahunajaranadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft002_tahunajaranadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft002_tahunajaranadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t002_tahunajaran_add->showPageHeader(); ?>
<?php
$t002_tahunajaran_add->showMessage();
?>
<form name="ft002_tahunajaranadd" id="ft002_tahunajaranadd" class="<?php echo $t002_tahunajaran_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t002_tahunajaran">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$t002_tahunajaran_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($t002_tahunajaran_add->Mulai->Visible) { // Mulai ?>
	<div id="r_Mulai" class="form-group row">
		<label id="elh_t002_tahunajaran_Mulai" for="x_Mulai" class="<?php echo $t002_tahunajaran_add->LeftColumnClass ?>"><?php echo $t002_tahunajaran_add->Mulai->caption() ?><?php echo $t002_tahunajaran_add->Mulai->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t002_tahunajaran_add->RightColumnClass ?>"><div <?php echo $t002_tahunajaran_add->Mulai->cellAttributes() ?>>
<span id="el_t002_tahunajaran_Mulai">
<input type="text" data-table="t002_tahunajaran" data-field="x_Mulai" name="x_Mulai" id="x_Mulai" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($t002_tahunajaran_add->Mulai->getPlaceHolder()) ?>" value="<?php echo $t002_tahunajaran_add->Mulai->EditValue ?>"<?php echo $t002_tahunajaran_add->Mulai->editAttributes() ?>>
</span>
<?php echo $t002_tahunajaran_add->Mulai->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t002_tahunajaran_add->Selesai->Visible) { // Selesai ?>
	<div id="r_Selesai" class="form-group row">
		<label id="elh_t002_tahunajaran_Selesai" for="x_Selesai" class="<?php echo $t002_tahunajaran_add->LeftColumnClass ?>"><?php echo $t002_tahunajaran_add->Selesai->caption() ?><?php echo $t002_tahunajaran_add->Selesai->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t002_tahunajaran_add->RightColumnClass ?>"><div <?php echo $t002_tahunajaran_add->Selesai->cellAttributes() ?>>
<span id="el_t002_tahunajaran_Selesai">
<input type="text" data-table="t002_tahunajaran" data-field="x_Selesai" name="x_Selesai" id="x_Selesai" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($t002_tahunajaran_add->Selesai->getPlaceHolder()) ?>" value="<?php echo $t002_tahunajaran_add->Selesai->EditValue ?>"<?php echo $t002_tahunajaran_add->Selesai->editAttributes() ?>>
</span>
<?php echo $t002_tahunajaran_add->Selesai->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t002_tahunajaran_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t002_tahunajaran_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t002_tahunajaran_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t002_tahunajaran_add->showPageFooter();
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
$t002_tahunajaran_add->terminate();
?>