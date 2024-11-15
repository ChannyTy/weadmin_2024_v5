<?	
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");

	if($_REQUEST['execute']=="update"){
		
		
		$update = array();
		$update[]=$core_tb_setting."_lang  	='".changeQuot($_REQUEST['inputLang'])."'";
		// $update[]=$core_tb_setting."_lang  	='Thai'";
		$update[]=$core_tb_setting."_type  	='".changeQuot($_REQUEST['inputType'])."'";
		$update[]=$core_tb_setting."_subject  	='".changeQuot($_REQUEST['inputSubject'])."'";
		$update[]=$core_tb_setting."_title  	='".changeQuot($_REQUEST['inputTitle'])."'";
		$update[]=$core_tb_setting."_titleB  	='".changeQuot($_REQUEST['inputTitleB'])."'";
		$update[]=$core_tb_setting."_lastdate  	=".wewebNow($coreLanguageSQL)."";

		$sql="UPDATE ".$core_tb_setting." SET ".implode(",",$update)." WHERE ".$core_tb_setting."_id>=1";
		$Query=wewebQueryDB($coreLanguageSQL,$sql);		
		
		 } ?>
<? include("../lib/disconnect.php");?>
<form action="../core/setting.php" method="post" name="myFormAction" id="myFormAction">
    <input name="masterkey" type="hidden" id="masterkey" value="<?=$_REQUEST['masterkey']?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?=$_REQUEST['menukeyid']?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?=$_REQUEST['inputSearch']?>" />
</form>            
<script language="JavaScript" type="text/javascript"> document.myFormAction.submit(); </script>
