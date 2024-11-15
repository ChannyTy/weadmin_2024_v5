<?php
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("incModLang.php");
include("config.php");

if (file_exists($mod_path_pictures . "/" . $_REQUEST['picname'])) {
	@unlink($mod_path_pictures . "/" . $_REQUEST['picname']);
}

if (file_exists($mod_path_office . "/" . $_REQUEST['picname'])) {
	@unlink($mod_path_office . "/" . $_REQUEST['picname']);
}

if (file_exists($mod_path_real . "/" . $_REQUEST['picname'])) {
	@unlink($mod_path_real . "/" . $_REQUEST['picname']);
}

$update = array();
$update[] = $mod_tb_root_lang . "_pic  	=''";
$sql = "UPDATE " . $mod_tb_root_lang . " SET " . implode(",", $update) . " WHERE " . $mod_tb_root_lang . "_id='" . $_REQUEST["valCid"] . "'  ";
$Query = wewebQueryDB($coreLanguageSQL, $sql);


include("../lib/disconnect.php");
