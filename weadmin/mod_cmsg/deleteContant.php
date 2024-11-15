<?php
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("config.php");

for ($i = 1; $i <= $_REQUEST['TotalCheckBoxID']; $i++) {
   $myVar = $_REQUEST['CheckBoxID' . $i];

   if (strlen($myVar) >= 1) {
      $permissionID = $myVar;

      $sql = "SELECT  " . $mod_tb_root_lang . "_htmlfilename," . $mod_tb_root_lang . "_pic," . $mod_tb_root_lang . "_filevdo," . $mod_tb_root_lang . "_id FROM " . $mod_tb_root_lang . " WHERE  " . $mod_tb_root_lang . "_cid='" . $permissionID . "' ";
      $Query = wewebQueryDB($coreLanguageSQL, $sql);
      $NumRows = wewebNumRowsDB($coreLanguageSQL, $Query);
      if ($NumRows > 0) {
         while ($Row = wewebFetchArrayDB($coreLanguageSQL, $Query)) {
            $deletepichtml = $Row[0];
            $deletepic = $Row[1];
            $deletevideo = $Row[2];
            $valid = $Row[3];
            ######################## Delete  In Folder HTML ###############################
            if (file_exists($mod_path_html . "/" . $deletepichtml)) {
               @unlink($mod_path_html . "/" . $deletepichtml);
            }
            if (file_exists($mod_path_html . "/" . $deletepichtmlen)) {
               @unlink($mod_path_html . "/" . $deletepichtmlen);
            }
            if (file_exists($mod_path_html . "/" . $deletepichtmlcn)) {
               @unlink($mod_path_html . "/" . $deletepichtmlcn);
            }
            ######################### Delete  In Folder Pic ###############################
            if (file_exists($mod_path_pictures . "/" . $deletepic)) {
               @unlink($mod_path_pictures . "/" . $deletepic);
            }
            if (file_exists($mod_path_office . "/" . $deletepic)) {
               @unlink($mod_path_office . "/" . $deletepic);
            }
            if (file_exists($mod_path_real . "/" . $deletepic)) {
               @unlink($mod_path_real . "/" . $deletepic);
            }
            ######################### Delete  In Folder Video ###############################
            if (file_exists($mod_path_vdo . "/" . $deletevideo)) {
               @unlink($mod_path_vdo . "/" . $deletevideo);
            }

            ######################### Delete  In Folder File ###############################
            $sql="SELECT ".$mod_tb_file."_id,".$mod_tb_file."_filename FROM ".$mod_tb_file." WHERE ".$mod_tb_file."_contantid ='".$valid."'";
            $query_file=wewebQueryDB($coreLanguageSQL, $sql);
            $number_row=wewebNumRowsDB($coreLanguageSQL,$query_file);
            if($number_row>=1){
               while($row_file=wewebFetchArrayDB($coreLanguageSQL,$query_file)){
               $downloadID = $row_file[0];
               $deletefilename=$row_file[1];
                  if(file_exists($mod_path_file."/".$deletefilename)) {
                     @unlink($mod_path_file."/".$deletefilename);
                  }
               }
            }
            $sql="DELETE FROM ".$mod_tb_file." WHERE   ".$mod_tb_file."_contantid='".$valid."' ";
            wewebQueryDB($coreLanguageSQL, $sql);
            ######################### Delete  In Folder File ###############################
            $sql="SELECT ".$mod_tb_root_album."_id,".$mod_tb_root_album."_filename FROM ".$mod_tb_root_album." WHERE ".$mod_tb_root_album."_contantid ='".$valid."'";
            $query_file=wewebQueryDB($coreLanguageSQL, $sql);
            $number_row=wewebNumRowsDB($coreLanguageSQL,$query_file);
            if($number_row>=1){
            	while($row_file=wewebFetchArrayDB($coreLanguageSQL,$query_file)){
            	$downloadID = $row_file[0];
            	$deletefilename=$row_file[1];
            		if(file_exists($mod_path_album."/".$deletefilename)) {
            			@unlink($mod_path_album."/".$deletefilename);
            		}
            		if(file_exists($mod_path_album."/reB_".$deletefilename)) {
            			@unlink($mod_path_album."/reB_".$deletefilename);
            		}
            		if(file_exists($mod_path_album."/reO_".$deletefilename)) {
            			@unlink($mod_path_album."/reO_".$deletefilename);
            		}
            	}
            }
            $sql="DELETE FROM ".$mod_tb_root_album." WHERE   ".$mod_tb_root_album."_contantid='".$valid."' ";
            wewebQueryDB($coreLanguageSQL, $sql);
         }
      }

      ######################### Delete  Contant ###############################
      $sqllang = "DELETE FROM " . $mod_tb_root_lang . " WHERE " . $mod_tb_root_lang . "_cid=" . $permissionID . " ";
      $Querylang = wewebQueryDB($coreLanguageSQL, $sqllang);

      $sql = "DELETE FROM " . $mod_tb_root . " WHERE " . $mod_tb_root . "_id=" . $permissionID . " ";
      $Query = wewebQueryDB($coreLanguageSQL, $sql);

      ## URL Search ###################################
      $sqlSch = "DELETE FROM " . $core_tb_search . " WHERE   " . $core_tb_search . "_gid='" . $permissionID . "'  AND " . $core_tb_search . "_masterkey='" . $_POST["masterkey"] . "'  ";
      $querySch = wewebQueryDB($coreLanguageSQL, $sqlSch);
   }
}
logs_access('3', 'Delete');
include("../lib/incRss.php");
?>
<?php include("../lib/disconnect.php"); ?>
<form action="index.php" method="post" name="myFormAction" id="myFormAction">
   <input name="masterkey" type="hidden" id="masterkey" value="<?php echo $_REQUEST['masterkey'] ?>" />
   <input name="menukeyid" type="hidden" id="menukeyid" value="<?php echo $_REQUEST['menukeyid'] ?>" />
   <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php echo $_REQUEST['module_pageshow'] ?>" />
   <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php echo $_REQUEST['module_pagesize'] ?>" />
   <input name="module_orderby" type="hidden" id="module_orderby" value="<?php echo $_REQUEST['module_orderby'] ?>" />

   <?php include_once './inc-inputsearch.php'; ?>
</form>
<script language="JavaScript" type="text/javascript">
   document.myFormAction.submit();
</script>