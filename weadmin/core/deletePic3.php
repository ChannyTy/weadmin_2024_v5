<?
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/classpic.php");
include("../lib/connect.php");
include("../lib/function.php");

		
	if(file_exists($core_pathname_crupload."/".$_REQUEST['picbg'])) {
		@unlink($core_pathname_crupload."/".$_REQUEST['picbg']);
	}	


		$update = array();
		$update[]=$core_tb_setting."_bg  	=''";
		$sql="UPDATE ".$core_tb_setting." SET ".implode(",",$update)."  ";
		$Query=wewebQueryDB($coreLanguageSQL,$sql);


			
include("../lib/disconnect.php");
?>