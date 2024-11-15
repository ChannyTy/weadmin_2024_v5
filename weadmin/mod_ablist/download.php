<?

include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("config.php");


		$filename = explode(".",$linkPath);
		
		$file_extension = $filename[count($filename)-1];
		$myDateArray=explode(".",$downloadFile);

		// header('Content-Description: File Transfer');
		// header("Content-type: application/".$file_extension);
		// header("Content-Disposition: attachment; filename=".$myDateArray[0].".".$file_extension);
		// echo readfile($linkPath);

		header('Content-Description: File Transfer');
        header('Content-Type: application/' . $file_extension);
        header('Content-Disposition: attachment; filename="' . $myDateArray[0] . '.' . $file_extension . '"');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($linkPath));
        ob_clean();
        ob_end_flush();
        $handle = fopen($linkPath, "rb");
        while (!feof($handle)) {
            echo fread($handle, 1000);
        }
?>
<? include("../lib/disconnect.php"); ?>