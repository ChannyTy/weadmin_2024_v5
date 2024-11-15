<?php
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("incModLang.php");
include("config.php");

		
	$sql_fileNew="SELECT ".$mod_tb_file."_filename  FROM ".$mod_tb_file." WHERE ".$mod_tb_file."_id 	='".$_REQUEST['valDelFile']."' ";
	$query_fileNew=wewebQueryDB($coreLanguageSQL,$sql_fileNew);
	$row_fileNew=wewebFetchArrayDB($coreLanguageSQL,$query_fileNew);
	$downloadFile=$row_fileNew[0];
	if(file_exists($mod_path_file."/".$downloadFile)) {
		@unlink($mod_path_file."/".$downloadFile);
	}	
		
	$sql="DELETE FROM ".$mod_tb_file." WHERE   ".$mod_tb_file."_id='".$_REQUEST['valDelFile']."' ";
	$Query=wewebQueryDB($coreLanguageSQL,$sql);
	
			
		$sql="SELECT ".$mod_tb_file."_id,".$mod_tb_file."_filename,".$mod_tb_file."_name,".$mod_tb_file."_download FROM ".$mod_tb_file." WHERE ".$mod_tb_file."_keyfile ='report'";
			$query_file=wewebQueryDB($coreLanguageSQL,$sql);
			$number_row=wewebNumRowsDB($coreLanguageSQL,$query_file);
			if($number_row>=1){
			$txtFile="";
			while($row_file=wewebFetchArrayDB($coreLanguageSQL,$query_file)){
			$linkRelativePath = $mod_path_file."/".$row_file[1];
			$downloadFile = $row_file[1];
			$downloadID = $row_file[0];
			$downloadName = $row_file[2];
			$countDownload= $row_file[3];
			$imageType = strstr($downloadFile,'.');														
			
		 	$txtFile .= "<a href=\"javascript:void(0)\"  onclick=\"document.myForm.valDelFile.value=".$downloadID.";delFileUpload('deleteFile.php');\" ><img src=\"../img/btn/delete.png\" align=\"absmiddle\" title=\"Delete file\"  hspace=\"10\"  vspace=\"10\"   border=\"0\" /></a>".$downloadName."".$imageType." | ".$langMod["file:type"].": ".$imageType."  | ".$langMod["file:size"].": ".get_IconSize($linkRelativePath)."<br/>";
									
									 }}
			echo $txtFile;
include("../lib/disconnect.php");
			
?>