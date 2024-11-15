<?
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/classpic.php");
include("../lib/connect.php");
include("../lib/function.php");
include("incModLang.php");
include("config.php");

			if(!is_dir($core_pathname_upload."/".$_REQUEST['masterkey'])) { mkdir($core_pathname_upload."/".$_REQUEST['masterkey'],0777); }
			if(!is_dir($mod_path_album)) { mkdir($mod_path_album,0777); }  
			

			$inputGallery=$_FILES['myfile']['tmp_name'];
			$arrfile=$_FILES['myfile'];
			$ERROR=$_FILES['myfile']['error'];
			$TIME=time();
			$ret = array();
			
			if(!$ERROR) {
			$myNewRand =  randomNameUpdate(2);
			$filename = "pic-".$_REQUEST['myID']."-".$_REQUEST['langt']."-".$myNewRand."";

			$p=new pic();
			$p->addpic($arrfile);
			$p->chktypepic(); 
			$ext=$p->ret(); 
			$picname=$filename.".".$ext;
			
			##  Real ################################################################################
			if(copy($inputGallery,$mod_path_album."/".$picname)){
				@chmod($mod_path_album."/".$picname,0777);
			}
			
			$imgReal = $mod_path_album."/".$picname; // File image location
			
			
			##  Pictures ################################################################################
			$arrImgInfo=getimagesize($imgReal);
			if($arrImgInfo[0]<=($sizeWidthPic+10)){
			
				if(copy($inputGallery,$mod_path_album."/reB_".$picname)){
					@chmod($mod_path_real."/reB_".$picname,0777);
				}
			
			}else{
				$newfilename = $mod_path_album."/reB_".$picname; // New file name for thumb
				$w = $sizeWidthAlbum;
				$h = $sizeHeightAlbum;
				$thumbnail = resize($imgReal, $w, $h, $newfilename);
			}
			

			##  Offilce ################################################################################
			$newfilename = $mod_path_album."/reO_".$picname; // New file name for thumb
			$w = $sizeWidthAlbumOff;
			$h = $sizeHeightAlbumOff;
			$thumbnail = resize($imgReal, $w, $h, $newfilename);

		$insert = array();
		$insert[$mod_tb_root_album."_contantid"] = "'".$_REQUEST['myID']."'";
		$insert[$mod_tb_root_album."_filename"] = "'".$picname."'";
		$insert[$mod_tb_root_album."_language"]="'".$_REQUEST['langt']."'";
		
		$sql="INSERT INTO ".$mod_tb_root_album."(".implode(",",array_keys($insert)).") VALUES (".implode(",",array_values($insert)).")";
		$Query=wewebQueryDB($coreLanguageSQL,$sql);	
		
		}
		
  echo json_encode($ret);

include("../lib/disconnect.php");
?>
