<?
$valMiniPermissionUser=11;
if($_SESSION[$valSiteManage."core_session_groupid"]!=$valMiniPermissionUser || $_SESSION[$valSiteManage."core_session_typeusermini"]!="0" ){
	header( "Location:../core/index.php"); 	
}
?>