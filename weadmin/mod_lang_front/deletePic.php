<?php
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("incModLang.php");
include("config.php");

	$nameDelPic = 'picname_'.$_REQUEST['valDelPic'];
	if(file_exists($mod_path_pictures."/".$_REQUEST[$nameDelPic])) {
		@unlink($mod_path_pictures."/".$_REQUEST[$nameDelPic]);
	}	
		
	if(file_exists($mod_path_office."/".$_REQUEST[$nameDelPic])) {
		@unlink($mod_path_office."/".$_REQUEST[$nameDelPic]);
	}	

	if(file_exists($mod_path_real."/".$_REQUEST[$nameDelPic])) {
		@unlink($mod_path_real."/".$_REQUEST[$nameDelPic]);
	}	
	
	
	$sqldetail = "SELECT 
	".$mod_tb_root.".".$mod_tb_root."_display 
	FROM ".$mod_tb_root." WHERE ".$mod_tb_root.".".$mod_tb_root."_id = ".$_REQUEST['valEditID']."";
	// print_pre($sqldetail);
	$Query=wewebQueryDB($coreLanguageSQL,$sqldetail);
	$Row=wewebFetchArrayDB($coreLanguageSQL,$Query);
	$arrDisplay = unserialize($Row[0]);		

	foreach($arrDisplay as $keyDisplay => $valueDisplay){
		if ($keyDisplay == $_REQUEST['valDelPic']){
			$arrDisplay[$_REQUEST['valDelPic']] = '';
		} 
	}
	
	$dataDisplayUpdate = serialize($arrDisplay);

		$update = array();
		$update[]=$mod_tb_root."_display  	='".$dataDisplayUpdate."'";
		$sql="UPDATE ".$mod_tb_root." SET ".implode(",",$update)." WHERE ".$mod_tb_root."_id='".$_REQUEST["valEditID"]."'  ";
		$Query=wewebQueryDB($coreLanguageSQL,$sql);
		
		
		

			
include("../lib/disconnect.php");
?>
<script language="JavaScript" type="text/javascript">
	jQuery("#boxPicNew_<?php echo $_REQUEST['valDelPic'];?>").show();
	jQuery("#boxPicNew_<?php echo $_REQUEST['valDelPic'];?>").html('');
</script>
