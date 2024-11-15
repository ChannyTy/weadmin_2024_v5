<?
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");

		$userid=trim($_POST['Valueuserid']);
		$username=trim($_POST['Valueusername']);
		
		$sql = "SELECT ".$core_tb_staff."_id   FROM ".$core_tb_staff." WHERE ".$core_tb_staff."_id='".$userid."'  AND ".$core_tb_staff."_username='".$username."'";
		$Query=wewebQueryDB($coreLanguageSQL,$sql);
		$Row=wewebFetchArrayDB($coreLanguageSQL,$Query);
		$number_member=wewebNumRowsDB($coreLanguageSQL,$Query);
		if($number_member<=0){

		$sql_member = "SELECT ".$core_tb_staff."_id   FROM ".$core_tb_staff." WHERE  ".$core_tb_staff."_username='".$username."'";
		$Query_member=wewebQueryDB($coreLanguageSQL,$sql_member);
		$number_memberNew=wewebNumRowsDB($coreLanguageSQL,$Query_member);
			if($number_memberNew>=1){
			
		$sql_name = "SELECT  ".$core_tb_staff."_username  FROM ".$core_tb_staff." WHERE ".$core_tb_staff."_id='".$userid."' ";
		$Query_name=wewebQueryDB($coreLanguageSQL,$sql_name);
		$Row_name=wewebFetchArrayDB($coreLanguageSQL,$Query_name);
           ?>
		<script language="JavaScript" type="text/javascript">
			jQuery("#inputUserName").addClass("formInputContantTbAlertY"); 
			document.myForm.inputUserName.value='<?=$Row_name[0]?>'
			document.myForm.inputUserName.focus();
        </script>
			<? }else{?>
			
		<script language="JavaScript" type="text/javascript">
			jQuery("#inputUserName").removeClass("formInputContantTbAlertY"); 
        </script>
			<? }
		
}else{
?>
		<script language="JavaScript" type="text/javascript">
			jQuery("#inputUserName").removeClass("formInputContantTbAlertY"); 
        </script>
<? }?>
  
    

    
    
	