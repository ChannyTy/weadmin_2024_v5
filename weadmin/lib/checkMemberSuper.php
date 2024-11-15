<?
if($_SESSION[$valSiteManage."core_session_level"]!="SuperAdmin"){
	header( "Location:../core/index.php"); 	
}
?>