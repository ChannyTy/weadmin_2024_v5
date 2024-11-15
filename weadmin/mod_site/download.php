<?php
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("config.php");
			

		$filename = explode(".",$linkPath);
		$file_extension = $filename[count($filename)-1];
		$myDateArray=explode(".",$downloadFile);
		header("Content-type: application/".$file_extension);
		header("Content-Disposition: attachment; filename=".$myDateArray[0].".".$file_extension);
		echo readfile($linkPath);
		
?>
<?php include("../lib/disconnect.php");?>