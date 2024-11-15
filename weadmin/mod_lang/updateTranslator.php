<?
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("config.php");

$sql = "UPDATE $core_tb_setting SET ".$core_tb_setting."_translator=".$_POST["translator"];
wewebQueryDB($coreLanguageSQL,$sql);
