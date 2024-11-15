<?	
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");

	if($_REQUEST['execute']=="insert"){
		
		$sql = "SELECT MAX(".$core_tb_staff."_order) FROM ".$core_tb_staff;
		$Query=wewebQueryDB($coreLanguageSQL,$sql);
		$Row=wewebFetchArrayDB($coreLanguageSQL,$Query);
		$maxOrder = $Row[0]+1;
		
		$insert = array();
		$insert[$core_tb_staff."_groupid"] = "'".changeQuot($_REQUEST['inputgroupid'])."'";
		$insert[$core_tb_staff."_username"] = "'".changeQuot($_REQUEST['inputUserName'])."'";
		$insert[$core_tb_staff."_password"] = "'".encodeStr(changeQuot($_REQUEST['inputPassword']))."'";
		$insert[$core_tb_staff."_prefix"] = "'".changeQuot($_REQUEST['inputPrefix'])."'";
		$insert[$core_tb_staff."_gender"] = "'".changeQuot($_REQUEST['inputGender'])."'";
		$insert[$core_tb_staff."_fnamethai"] = "'".changeQuot($_REQUEST['inputfnamethai'])."'";
		$insert[$core_tb_staff."_lnamethai"] = "'".changeQuot($_REQUEST['inputlnamethai'])."'";
		$insert[$core_tb_staff."_fnameeng"] = "'".changeQuot($_REQUEST['inputfnameeng'])."'";
		$insert[$core_tb_staff."_lnameeng"] = "'".changeQuot($_REQUEST['inputlnameeng'])."'";		

		$insert[$core_tb_staff."_position"] = "'".changeQuot($_REQUEST['inputPosition'])."'";	
		$insert[$core_tb_staff."_usertype"] = "'".changeQuot($_REQUEST['inputTypeUser'])."'";	

		$insert[$core_tb_staff."_email"] = "'".changeQuot($_REQUEST['inputemail'])."'";		
		$insert[$core_tb_staff."_address"] = "'".changeQuot($_REQUEST['inputlocation'])."'";
		$insert[$core_tb_staff."_telephone"] = "'".changeQuot($_REQUEST['inputtelephone'])."'";
		$insert[$core_tb_staff."_mobile"] = "'".changeQuot($_REQUEST['inputmobile'])."'";
		$insert[$core_tb_staff."_other"] = "'".changeQuot($_REQUEST['inputother'])."'";
		$insert[$core_tb_staff."_crebyid"] = "'".$_SESSION[$valSiteManage.'core_session_id']."'";
		$insert[$core_tb_staff."_creby"] = "'".$_SESSION[$valSiteManage.'core_session_name']."'";
		$insert[$core_tb_staff."_credate"] = "".wewebNow($coreLanguageSQL)."";
		$insert[$core_tb_staff."_lastdate"] = "".wewebNow($coreLanguageSQL)."";

		$insert[$core_tb_staff."_unitid"] = "'".changeQuot($_REQUEST['inputFixid'])."'";
		$insert[$core_tb_staff."_unitid_sub"] = "'".changeQuot($_REQUEST['inputFixSubid'])."'";
		
		$insert[$core_tb_staff."_status"] = "'Disable'";
		$insert[$core_tb_staff."_order"] = "'".$maxOrder."'";
		$sql="INSERT INTO ".$core_tb_staff."(".implode(",",array_keys($insert)).") VALUES (".implode(",",array_values($insert)).")";
		$Query=wewebQueryDB($coreLanguageSQL,$sql);	

					
			
		 logs_access('2','Insert');
		 } ?>
<? include("../lib/disconnect.php");?>
<form action="../core/userManage.php" method="post" name="myFormAction" id="myFormAction">
    <input name="masterkey" type="hidden" id="masterkey" value="<?=$_REQUEST['masterkey']?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?=$_REQUEST['menukeyid']?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?=$_REQUEST['inputSearch']?>" />
    <input name="inputGh" type="hidden" id="inputGh" value="<?=$_REQUEST['inputgroupid']?>" />
    <input name="inputUT" type="hidden" id="inputUT" value="<?=$_REQUEST['inputTypeUser']?>" />
</form>            
<script language="JavaScript" type="text/javascript"> document.myFormAction.submit(); </script>
