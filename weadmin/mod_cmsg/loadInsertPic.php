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
	$fileElementName = 'fileToUpload';
	if(!empty($_FILES['fileToUpload']['error'])){
		switch($_FILES['fileToUpload']['error']){

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
	}elseif($_FILES['fileToUpload']['tmp_name'] == 'none'){
		$error = 'No file was uploaded..';
	}else{
			


		if(!is_dir($core_pathname_upload."/".$_REQUEST['masterkey'])) { mkdir($core_pathname_upload."/".$_REQUEST['masterkey'],0777); }
		if(!is_dir($mod_path_pictures)) { mkdir($mod_path_pictures,0777); }  
		if(!is_dir($mod_path_office)) { mkdir($mod_path_office,0777); }  
		if(!is_dir($mod_path_real)) { mkdir($mod_path_real,0777); }  

			if(file_exists($mod_path_office."/".$_REQUEST['delpicname'])) {
				@unlink($mod_path_office."/".$_REQUEST['delpicname']);
			}

			if(file_exists($mod_path_real."/".$_REQUEST['delpicname'])) {
				@unlink($mod_path_real."/".$_REQUEST['delpicname']);
			}
			
			if(file_exists($mod_path_pictures."/".$_REQUEST['delpicname'])) {
				@unlink($mod_path_pictures."/".$_REQUEST['delpicname']);
			}

			$inputGallery=$_FILES['fileToUpload']['tmp_name'];
			$arrfile=$_FILES['fileToUpload'];
			$ERROR=$_FILES['fileToUpload']['error'];
			$TIME=time();
			if(!$ERROR) {
			//$filename="pic-".$_REQUEST['myID']."-".randomNameUpdate(2);
			$filename="pic-".$_REQUEST['myID'];
			
			$p=new pic();
			$p->addpic($arrfile);
			$p->chktypepic(); 
			$ext=$p->ret(); 
			$picname=$filename.".".$ext;
			
			##  Real ################################################################################
			if(copy($inputGallery,$mod_path_real."/".$picname)){
				@chmod($mod_path_real."/".$picname,0777);
			}
			
			$imgReal = $mod_path_real."/".$picname; // File image location
			
			##  Pictures ################################################################################
			$arrImgInfo=getimagesize($imgReal);
			if($arrImgInfo[0]<=($sizeWidthPic+10)){
			
				if(copy($inputGallery,$mod_path_pictures."/".$picname)){
					@chmod($mod_path_real."/".$picname,0777);
				}
			
			}else{
			$newfilename = $mod_path_pictures."/".$picname;; // New file name for thumb
			$w = $sizeWidthPic;
			$h = $sizeHeightPic;
			$thumbnail = resize($imgReal, $w, $h, $newfilename);
			}
			
			##  Office ################################################################################
			$newfilename = $mod_path_office."/".$picname;; // New file name for thumb
			$w = $sizeWidthOff;
			$h = $sizeHeightOff;
			$thumbnail = resize($imgReal, $w, $h, $newfilename);
		
		$msg .= "<img src=\"".$mod_path_pictures."/".$picname."\"  style=\"float:left;border:#c8c7cc solid 1px;max-width:600px;\"   />";
		$msg .= "<div style=\"width:22px; height:22px;float:left;z-index:1; margin-left:-22px;cursor:pointer;\" onclick=\"delPicUpload(\'deletePicInsert.php\')\"  title=\"Delete file\" ><img src=\"../img/btn/delete.png\" width=\"22\" height=\"22\"  border=\"0\"/></div>";
		$msg .= "<input name=\"picname\" type=\"hidden\" id=\"picname\" value=\"$picname\" /> ";

			
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