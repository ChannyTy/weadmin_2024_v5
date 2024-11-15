<?
if($_SESSION[$valSiteManage."core_session_level"]!="SuperAdmin" && $_SESSION[$valSiteManage."core_session_level"]!="admin" ){
	header( "Location:../core/index.php"); 	
}
?>