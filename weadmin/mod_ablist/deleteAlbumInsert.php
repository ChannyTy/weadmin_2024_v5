<?
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("incModLang.php");
include("config.php");

		
	$sql_fileNew="SELECT ".$mod_tb_root_albumTemp."_filename  FROM ".$mod_tb_root_albumTemp." WHERE ".$mod_tb_root_albumTemp."_id 	='".$_REQUEST['valDelAlbum']."' ";
	$query_fileNew=wewebQueryDB($coreLanguageSQL,$sql_fileNew);
	$row_fileNew=wewebFetchArrayDB($coreLanguageSQL,$query_fileNew);
	$downloadFile=$row_fileNew[0];
	if(file_exists($mod_path_album."/".$downloadFile)) {
		@unlink($mod_path_album."/".$downloadFile);
	}	
		
	$sql="DELETE FROM ".$mod_tb_root_albumTemp." WHERE   ".$mod_tb_root_albumTemp."_id='".$_REQUEST['valDelAlbum']."' ";
	$Query=wewebQueryDB($coreLanguageSQL,$sql);
	
			
		$sql="SELECT ".$mod_tb_root_albumTemp."_id,".$mod_tb_root_albumTemp."_filename,".$mod_tb_root_albumTemp."_name,".$mod_tb_root_albumTemp."_download FROM ".$mod_tb_root_albumTemp." WHERE ".$mod_tb_root_albumTemp."_contantid 	='".$_REQUEST['valEditID']."'    ORDER BY ".$mod_tb_root_albumTemp."_id ASC";
			$query_file=wewebQueryDB($coreLanguageSQL,$sql);
			$number_row=wewebNumRowsDB($coreLanguageSQL,$query_file);
			if($number_row>=1){
			$txtFile="";
			while($row_file=wewebFetchArrayDB($coreLanguageSQL,$query_file)){
			$linkRelativePath = $mod_path_album."/".$row_file[1];
			$downloadFile = $row_file[1];
			$downloadID = $row_file[0];
			$downloadName = $row_file[2];
			$countDownload= $row_file[3];
			$imageType = strstr($downloadFile,'.');	
																
				$txtFile .= "<img src=\"".$mod_path_album."/reO_".$downloadFile."\"  width=\"50\" height=\"50\"   style=\"float:left;border:#c8c7cc solid 1px;margin-top:15px;\"  />";
				$txtFile .= "<div style=\"width:15px; height:15px;float:left;z-index:1; margin-left:-15px;cursor:pointer;margin-right:15px;margin-top:15px;\" onclick=\"document.myForm.valDelAlbum.value=".$downloadID.";delAlbumUpload('deleteAlbumInsert.php')\"  title=\"Delete file\" ><img src=\"../img/btn/delete.png\" width=\"15\" height=\"15\"  border=\"0\"/></div>";

									
									 }}
			echo $txtFile;
include("../lib/disconnect.php");
			
?>