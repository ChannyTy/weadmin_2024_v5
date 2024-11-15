<?php
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/classpic.php");
include("../lib/connect.php");
include("../lib/function.php");
include("incModLang.php");
include("config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Uuload File</title>
</head>
<body>
<?php 
	$error = "";
	$msg = "";
	$fileElementName = 'inputVideoUpload';
	if(!empty($_FILES['inputVideoUpload']['error'])){
		switch($_FILES['inputVideoUpload']['error']){

			case '1':
				$error = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
				break;
			case '2':
				$error = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
				break;
			case '3':
				$error = 'The uploaded file was only partially uploaded';
				break;
			case '4':
				$error = 'No file was uploaded.';
				break;

			case '6':
				$error = 'Missing a temporary folder';
				break;
			case '7':
				$error = 'Failed to write file to disk';
				break;
			case '8':
				$error = 'File upload stopped by extension';
				break;
			case '999':
			default:
				$error = 'No error code avaiable';
		}
	}elseif($_FILES['inputVideoUpload']['tmp_name'] == 'none'){
		$error = 'No file was uploaded..';
	}else{
			
			if(!is_dir($core_pathname_upload."/".$_REQUEST['masterkey'])) { mkdir($core_pathname_upload."/".$_REQUEST['masterkey'],0777); }
			if(!is_dir($mod_path_vdo)) { mkdir($mod_path_vdo,0777); }  
			
			if(file_exists($mod_path_vdo."/".$_REQUEST['delvdoname'])) {
				@unlink($mod_path_vdo."/".$_REQUEST['delvdoname']);
			}

			$inputFileToUpload=$_FILES['inputVideoUpload']['tmp_name'];
			$inputFileToName=$_FILES['inputVideoUpload']['name'];
			$fileType=explode(".",$inputFileToName);
			$countBtType = count($fileType)-1;
			$fileNameNew=$fileType[0];
			$fileTypeName=$fileType[$countBtType];
			$myNewRand=randomNameUpdate(2);
			$filenamedoc = "vdo-".$_REQUEST['myID']."-$myNewRand.$fileTypeName";
			
			if(copy($inputFileToUpload,$mod_path_vdo."/".$filenamedoc)){
				@chmod($mod_path_vdo."/".$filenamedoc,0777);
			}
			$linkRelativePath = $mod_path_vdo."/".$filenamedoc;
			$imageType = strstr($filenamedoc,'.');														

		 	$msg .= "<a href=\"javascript:void(0)\"  onclick=\" delVideoUpload(\'deleteVideoInsert.php\')\" ><img src=\"../img/btn/delete.png\" align=\"absmiddle\" title=\"Delete file\"  hspace=\"10\"  vspace=\"10\"   border=\"0\" /></a>Video Upload | ".$langMod["file:type"].": ".$imageType."  | ".$langMod["file:size"].": ".get_IconSize($linkRelativePath)."";
		$msg .= "<input name=\"vdoname\" type=\"hidden\" id=\"vdoname\" value=\"$filenamedoc\" /> ";
	
	}		
	echo "{";
	
	echo				"error: '" . $error . "',\n";
	echo				"msg: '" . $msg . "'\n";
	echo "}";
include("../lib/disconnect.php");
?>
</body>
</html>