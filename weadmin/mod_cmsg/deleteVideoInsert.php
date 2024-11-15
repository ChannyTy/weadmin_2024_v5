<?php
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("incModLang.php");
include("config.php");

		
	if(file_exists($mod_path_vdo."/".$_REQUEST['vdoname'])) {
		@unlink($mod_path_vdo."/".$_REQUEST['vdoname']);
	}	
		
			
include("../lib/disconnect.php");
?>