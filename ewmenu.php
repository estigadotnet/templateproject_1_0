<?php
namespace PHPMaker2020\templateproject_1_0;

// Menu Language
if ($Language && function_exists(PROJECT_NAMESPACE . "Config") && $Language->LanguageFolder == Config("LANGUAGE_FOLDER")) {
	$MenuRelativePath = "";
	$MenuLanguage = &$Language;
} else { // Compat reports
	$LANGUAGE_FOLDER = "../lang/";
	$MenuRelativePath = "../";
	$MenuLanguage = new Language();
}

// Navbar menu
$topMenu = new Menu("navbar", TRUE, TRUE);
$topMenu->addMenuItem(11, "mi_d101_beranda", $MenuLanguage->MenuPhrase("11", "MenuText"), $MenuRelativePath . "d101_berandadsb.php", -1, "", AllowListMenu('{1AF74738-C327-4FF8-8DF7-23D913E26545}d101_beranda'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(8, "mci_Setup", $MenuLanguage->MenuPhrase("8", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$topMenu->addMenuItem(5, "mi_t001_sekolah", $MenuLanguage->MenuPhrase("5", "MenuText"), $MenuRelativePath . "t001_sekolahlist.php", 8, "", AllowListMenu('{1AF74738-C327-4FF8-8DF7-23D913E26545}t001_sekolah'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(6, "mi_t101_berita", $MenuLanguage->MenuPhrase("6", "MenuText"), $MenuRelativePath . "t101_beritalist.php", -1, "", AllowListMenu('{1AF74738-C327-4FF8-8DF7-23D913E26545}t101_berita'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(7, "mci_Utility", $MenuLanguage->MenuPhrase("7", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$topMenu->addMenuItem(1, "mi_t201_users", $MenuLanguage->MenuPhrase("1", "MenuText"), $MenuRelativePath . "t201_userslist.php", 7, "", AllowListMenu('{1AF74738-C327-4FF8-8DF7-23D913E26545}t201_users'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(2, "mi_t202_userlevels", $MenuLanguage->MenuPhrase("2", "MenuText"), $MenuRelativePath . "t202_userlevelslist.php", 7, "", AllowListMenu('{1AF74738-C327-4FF8-8DF7-23D913E26545}t202_userlevels'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(4, "mi_t204_audittrail", $MenuLanguage->MenuPhrase("4", "MenuText"), $MenuRelativePath . "t204_audittraillist.php", 7, "", AllowListMenu('{1AF74738-C327-4FF8-8DF7-23D913E26545}t204_audittrail'), FALSE, FALSE, "", "", TRUE);
echo $topMenu->toScript();

// Sidebar menu
$sideMenu = new Menu("menu", TRUE, FALSE);
$sideMenu->addMenuItem(11, "mi_d101_beranda", $MenuLanguage->MenuPhrase("11", "MenuText"), $MenuRelativePath . "d101_berandadsb.php", -1, "", AllowListMenu('{1AF74738-C327-4FF8-8DF7-23D913E26545}d101_beranda'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(8, "mci_Setup", $MenuLanguage->MenuPhrase("8", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$sideMenu->addMenuItem(5, "mi_t001_sekolah", $MenuLanguage->MenuPhrase("5", "MenuText"), $MenuRelativePath . "t001_sekolahlist.php", 8, "", AllowListMenu('{1AF74738-C327-4FF8-8DF7-23D913E26545}t001_sekolah'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(6, "mi_t101_berita", $MenuLanguage->MenuPhrase("6", "MenuText"), $MenuRelativePath . "t101_beritalist.php", -1, "", AllowListMenu('{1AF74738-C327-4FF8-8DF7-23D913E26545}t101_berita'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(7, "mci_Utility", $MenuLanguage->MenuPhrase("7", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$sideMenu->addMenuItem(1, "mi_t201_users", $MenuLanguage->MenuPhrase("1", "MenuText"), $MenuRelativePath . "t201_userslist.php", 7, "", AllowListMenu('{1AF74738-C327-4FF8-8DF7-23D913E26545}t201_users'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(2, "mi_t202_userlevels", $MenuLanguage->MenuPhrase("2", "MenuText"), $MenuRelativePath . "t202_userlevelslist.php", 7, "", AllowListMenu('{1AF74738-C327-4FF8-8DF7-23D913E26545}t202_userlevels'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(4, "mi_t204_audittrail", $MenuLanguage->MenuPhrase("4", "MenuText"), $MenuRelativePath . "t204_audittraillist.php", 7, "", AllowListMenu('{1AF74738-C327-4FF8-8DF7-23D913E26545}t204_audittrail'), FALSE, FALSE, "", "", TRUE);
echo $sideMenu->toScript();
?>