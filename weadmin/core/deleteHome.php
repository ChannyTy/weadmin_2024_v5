<?
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");

$sql = "DELETE FROM ".$core_tb_sort." WHERE ".$core_tb_sort."_id='".$_REQUEST["delID"]."'";
$Query=wewebQueryDB($coreLanguageSQL,$sql);	

?>
<? include("../lib/disconnect.php");?>


