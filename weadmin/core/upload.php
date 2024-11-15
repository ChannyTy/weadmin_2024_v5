<?
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/classpic.php");

	$error = "";
	$msg = "";
	$fileElementName = 'fileToUpload';
	if(!empty($_FILES[$fileElementName]['error']))
	{
		switch($_FILES[$fileElementName]['error'])
		{

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
	}elseif(empty($_FILES['fileToUpload']['tmp_name']) || $_FILES['fileToUpload']['tmp_name'] == 'none'){
		$error = 'No file was uploaded..';
	}else{
	
		if(!is_dir("../../upload")) { mkdir("../../upload",0777); }
		if(!is_dir("../../upload/core")) { mkdir("../../upload/core",0777); }
		if(!is_dir("../../upload/core/50")) { mkdir("../../upload/core/50",0777); }

	
			if(file_exists("../../upload/core/".$deletepicname)) {
				@unlink("../../upload/core/".$deletepicname);
			}
			
			if(file_exists("../../upload/core/50/".$deletepicname)) {
				@unlink("../../upload/core/50/".$deletepicname);
			}

			$inputGallery = $_FILES["fileToUpload"]["tmp_name"];
			$arrfile = $_FILES["fileToUpload"];
			$myrand = rand(111,999)."".time();
			$filenameimg="pic-$myrand";
			
			$p=new pic();
			$p->addpic($arrfile);
			$p->chktypepic(); 
			$ext=$p->ret(); 
			$picname=$filenameimg.".".$ext;
			
			##  Real ################################################################################
			if(copy($inputGallery,"../../upload/core/".$picname)){
				@chmod("../../upload/core/".$picname,0777);
			}
			
			$imgReal = "../../upload/core/".$picname; // File image location
			
			##  50 ################################################################################
			$newfilename = "../../upload/core/50/".$picname; // New file name for thumb
			$w = 50;
			$h = 50;
			$thumbnail = resize($imgReal, $w, $h, $newfilename);

		$update = array();
		$update[]=$core_tb_staff."_picture  	='".$picname."'";
		$sql="UPDATE ".$core_tb_staff." SET ".implode(",",$update)." WHERE ".$core_tb_staff."_id='".$_REQUEST["valID"]."'  ";
		$Query=wewebQueryDB($coreLanguageSQL,$sql);
		
		$msg .= "<img src=\"../../upload/core/50/".$picname."\"  />";
		$msg .= "<input name=\"picnameProfile\" type=\"hidden\" id=\"picnameProfile\" value=\"$picname\" /> ";

			
	}		
	echo "{";
	
	echo				"error: '" . $error . "',\n";
	echo				"msg: '" . $msg . "'\n";
	echo "}";
?>

