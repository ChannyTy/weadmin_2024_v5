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

      $sqlRemore = "SELECT  " . $mod_tb_subgroup_lang . "_pic ," . $mod_tb_subgroup_lang . "_id  FROM " . $mod_tb_subgroup_lang . " WHERE  " . $mod_tb_subgroup_lang . "_cid='" . $permissionID . "' ";
      $QueryRemore = wewebQueryDB($coreLanguageSQL, $sqlRemore);
      $numberofrowRemore = wewebNumRowsDB($coreLanguageSQL, $QueryRemore);
      if ($numberofrowRemore >= 1) {
         while ($RowRemore = wewebFetchArrayDB($coreLanguageSQL, $QueryRemore)) {
            $deletepic = $RowRemore[0];
            $deleteid = $RowRemore[1];

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
         }
      }

      ######################### Delete  Contant ###############################
      $sql = "DELETE FROM " . $mod_tb_subgroup_lang . " WHERE " . $mod_tb_subgroup_lang . "_cid=" . $permissionID . " ";
      $Query = wewebQueryDB($coreLanguageSQL, $sql);

      $sql = "DELETE FROM " . $mod_tb_subgroup . " WHERE " . $mod_tb_subgroup . "_id=" . $permissionID . " ";
      $Query = wewebQueryDB($coreLanguageSQL, $sql);
   }
}
logs_access('3', 'Delete Group');

// load inc
require_once './inc/function-mod.php';

?>
<?php include("../lib/disconnect.php"); ?>
<form action="subgroup.php" method="post" name="myFormAction" id="myFormAction">
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