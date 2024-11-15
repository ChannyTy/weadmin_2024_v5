<?
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");

for($i=1;$i<=$_REQUEST['TotalCheckBoxID'];$i++) {
 $myVar=$_REQUEST['CheckBoxID'.$i];


	if(strlen($myVar)>=1) {
	$permissionID=$myVar;
		
		
		$sql = "DELETE FROM ".$core_tb_menu." WHERE ".$core_tb_menu."_id='".$permissionID."'";
		$Query=wewebQueryDB($coreLanguageSQL,$sql);
		
		$sql = "DELETE FROM ".$core_tb_menu." WHERE ".$core_tb_menu."_parentid='".$permissionID."'";
		$Query=wewebQueryDB($coreLanguageSQL,$sql);
		
		
		$sql = "DELETE FROM ".$core_tb_sort." WHERE ".$core_tb_sort."_menuID='".$permissionID."'";
		$Query=wewebQueryDB($coreLanguageSQL,$sql);

	}
	
}
	
?>
	<? include("../lib/disconnect.php");?>

<form action="../core/menuManage.php" method="post" name="myFormAction" id="myFormAction">
    <input name="masterkey" type="hidden" id="masterkey" value="<?=$_REQUEST['masterkey']?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?=$_REQUEST['menukeyid']?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?=$_REQUEST['inputSearch']?>" />
</form>            
<script language="JavaScript" type="text/javascript"> document.myFormAction.submit(); </script>
