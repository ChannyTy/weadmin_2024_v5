<?
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/classpic.php");
include("../lib/connect.php");
include("../lib/function.php");
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
	$fileElementName = 'fileToUpload3';
	if(!empty($_FILES['fileToUpload3']['error'])){
		switch($_FILES['fileToUpload3']['error']){

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
	}elseif($_FILES['fileToUpload3']['tmp_name'] == 'none'){
		$error = 'No file was uploaded..';
	}else{
			


		if(!is_dir($core_pathname_crupload)) { mkdir($core_pathname_crupload,0777); }

	
			if(file_exists($core_pathname_crupload."/".$_REQUEST['delpicname'])) {
				@unlink($core_pathname_crupload."/".$_REQUEST['delpicname']);
			}
			

			$inputGallery=$_FILES['fileToUpload3']['tmp_name'];
			$arrfile=$_FILES['fileToUpload3'];
			$ERROR=$_FILES['fileToUpload3']['error'];
			$TIME=time();
			if(!$ERROR) {
			$myRandNew = date('Ymd').time().rand(11,99);
			$filename="pic-bg-".$myRandNew."-".$_REQUEST['myID'];
			
			$p=new pic();
			$p->addpic($arrfile);
			$p->chktypepic(); 
			$ext=$p->ret(); 
			$picname=$filename.".".$ext;
			
			##  Real ################################################################################
			if(copy($inputGallery,$core_pathname_crupload."/".$picname)){
				@chmod($core_pathname_crupload."/".$picname,0777);
			}
			
		$update = array();
		$update[]=$core_tb_setting."_bg  	='".$picname."'";
		$sql="UPDATE ".$core_tb_setting." SET ".implode(",",$update)." WHERE ".$core_tb_setting."_id='".$_REQUEST["myID"]."'  ";
		$Query=wewebQueryDB($coreLanguageSQL,$sql);

		
		$msg .= "<img src=\"".$core_pathname_crupload."/".$picname."\"  style=\"float:left;border:#c8c7cc solid 1px;max-width:600px;\"   />";
		$msg .= "<div style=\"width:22px; height:22px;float:left;z-index:1; margin-left:-22px;cursor:pointer;\" onclick=\"delPicUploadSite(\'deletePic3.php\',\'boxPicNew3\')\"  title=\"Delete file\" ><img src=\"../img/btn/delete.png\" width=\"22\" height=\"22\"  border=\"0\"/></div>";
		$msg .= "<input name=\"picbg\" type=\"hidden\" id=\"picbg\" value=\"$picname\" /> ";

			
			}else{
		$msg .= "<img src=\"../img/btn/del.png\"  />";
			
			}
			
	
	}		
	echo "{";
	
	echo				"error: '" . $error . "',\n";
	echo				"msg: '" . $msg . "'\n";
	echo "}";
include("../lib/disconnect.php");
?>
</body>
</html>