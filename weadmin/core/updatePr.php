<?	
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");

	if($_REQUEST['execute']=="update"){
		
	 	$permissionID=$_REQUEST["valEditID"];
		
		$update = array();
		$update[]=$core_tb_group."_name  	='".changeQuot($_REQUEST['inputnamegroup'])."'";
		$update[]=$core_tb_group."_lv  	='".$_REQUEST['inputaccess']."'";
		$update[]=$core_tb_group."_crebyid  ='".$_SESSION[$valSiteManage.'core_session_id']."'";
		$update[]=$core_tb_group."_creby  ='".$_SESSION[$valSiteManage.'core_session_name']."'";
		$update[]=$core_tb_group."_lastdate  	=".wewebNow($coreLanguageSQL)."";

		$sql="UPDATE ".$core_tb_group." SET ".implode(",",$update)." WHERE ".$core_tb_group."_id='".$permissionID."' ";
		$Query=wewebQueryDB($coreLanguageSQL,$sql);		

		
		$sql="DELETE FROM ".$core_tb_permission." WHERE ".$core_tb_permission."_perid=".$permissionID." ";
		$Query=wewebQueryDB($coreLanguageSQL,$sql);
		
		$cutTxtPermission=$_POST['PermissionAdmin'];
		$cutTxtPermissionArray=explode(",",$cutTxtPermission);
			for($i=0;$i<count($cutTxtPermissionArray);$i++){
					$txtPermission=explode(":",$cutTxtPermissionArray[$i]);
					
					$insert = array();
					$insert[$core_tb_permission."_perid"] = "'".$permissionID ."'";
					$insert[$core_tb_permission."_menuid"] = "'".$txtPermission[0]."'";
					$insert[$core_tb_permission."_permission"] = "'".$txtPermission[1]."'";
					$sql="INSERT INTO ".$core_tb_permission."(".implode(",",array_keys($insert)).") VALUES (".implode(",",array_values($insert)).")";
					$Query=wewebQueryDB($coreLanguageSQL,$sql);	
						
			}
			
			logs_access('4','Update');

		}	
		?>
<? include("../lib/disconnect.php");?>
<form action="../core/permisManage.php" method="post" name="myFormAction" id="myFormAction">
    <input name="masterkey" type="hidden" id="masterkey" value="<?=$_REQUEST['masterkey']?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?=$_REQUEST['menukeyid']?>" />
    <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?=$_REQUEST['module_pageshow']?>" />
    <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?=$_REQUEST['module_pagesize']?>" />
    <input name="module_orderby" type="hidden" id="module_orderby" value="<?=$_REQUEST['module_orderby']?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?=$_REQUEST['inputSearch']?>" />
    <input name="inputGh" type="hidden" id="inputGh" value="<?=$_REQUEST['inputaccess']?>" />
</form>            
<script language="JavaScript" type="text/javascript"> document.myFormAction.submit(); </script>
