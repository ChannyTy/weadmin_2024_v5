<?	
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");

	if($_REQUEST['execute']=="update"){
		
	 	$memberID=$_POST['valEditID'];
		
		$update = array();
		$update[]=$core_tb_staff."_username  	='".changeQuot($_REQUEST['inputUserName'])."'";
		$update[]=$core_tb_staff."_password  ='".encodeStr(changeQuot($_REQUEST['inputPassword']))."'";
		$update[]=$core_tb_staff."_prefix  	='".changeQuot($_REQUEST['inputPrefix'])."'";
		$update[]=$core_tb_staff."_gender  	='".changeQuot($_REQUEST['inputGender'])."'";
		$update[]=$core_tb_staff."_fnamethai  	='".changeQuot($_REQUEST['inputfnamethai'])."'";
		$update[]=$core_tb_staff."_lnamethai  	='".changeQuot($_REQUEST['inputlnamethai'])."'";
		$update[]=$core_tb_staff."_fnameeng  	='".changeQuot($_REQUEST['inputfnameeng'])."'";
		$update[]=$core_tb_staff."_lnameeng  	='".changeQuot($_REQUEST['inputlnameeng'])."'";
		$update[]=$core_tb_staff."_email  	='".changeQuot($_REQUEST['inputemail'])."'";
		$update[]=$core_tb_staff."_address  	='".changeQuot($_REQUEST['inputlocation'])."'";
		$update[]=$core_tb_staff."_mobile  	='".changeQuot($_REQUEST['inputmobile'])."'";
		$update[]=$core_tb_staff."_telephone  	='".changeQuot($_REQUEST['inputtelephone'])."'";
		$update[]=$core_tb_staff."_other  	='".changeQuot($_REQUEST['inputother'])."'";
		$update[]=$core_tb_staff."_crebyid  	='".$_SESSION[$valSiteManage.'core_session_id']."'";
		$update[]=$core_tb_staff."_creby  	='".$_SESSION[$valSiteManage.'core_session_name']."'";
		$update[]=$core_tb_staff."_lastdate  	=".wewebNow($coreLanguageSQL)."";

		 $sql="UPDATE ".$core_tb_staff." SET ".implode(",",$update)." WHERE ".$core_tb_staff."_id='".$_REQUEST["valEditID"]."' ";
		$Query=wewebQueryDB($coreLanguageSQL,$sql);		

		 logs_access('2','Update');
		 } 
		 
		 ?>
<? include("../lib/disconnect.php");?>
<form action="../core/userView.php" method="post" name="myFormAction" id="myFormAction">
    <input name="masterkey" type="hidden" id="masterkey" value="<?=$_REQUEST['masterkey']?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?=$_REQUEST['menukeyid']?>" />
    <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?=$_REQUEST['module_pageshow']?>" />
    <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?=$_REQUEST['module_pagesize']?>" />
    <input name="module_orderby" type="hidden" id="module_orderby" value="<?=$_REQUEST['module_orderby']?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?=$_REQUEST['inputSearch']?>" />
    <input name="inputGh" type="hidden" id="inputGh" value="<?=$_REQUEST['inputgroupid']?>" />
</form>            
<script language="JavaScript" type="text/javascript"> document.myFormAction.submit(); </script>
         