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

      $sqllang = "DELETE FROM " . $mod_tb_root_group_lang . " WHERE " . $mod_tb_root_group_lang . "_cid=" . $permissionID . " ";
      $Querylang = wewebQueryDB($coreLanguageSQL, $sqllang);

      $sql = "DELETE FROM " . $mod_tb_root_group . " WHERE " . $mod_tb_root_group . "_id=" . $permissionID . " ";
      $Query = wewebQueryDB($coreLanguageSQL, $sql);
   }
}
logs_access('3', 'Delete Group');
?>
<?php include("../lib/disconnect.php"); ?>
<form action="group.php" method="post" name="myFormAction" id="myFormAction">
   <input name="masterkey" type="hidden" id="masterkey" value="<?php echo $_REQUEST['masterkey'] ?>" />
   <input name="menukeyid" type="hidden" id="menukeyid" value="<?php echo $_REQUEST['menukeyid'] ?>" />
   <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php echo $_REQUEST['module_pageshow'] ?>" />
   <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php echo $_REQUEST['module_pagesize'] ?>" />
   <input name="module_orderby" type="hidden" id="module_orderby" value="<?php echo $_REQUEST['module_orderby'] ?>" />
   <?php include_once './inc-inputsearch.php'; ?>
</form>
<script language="JavaScript" type="text/javascript"> document.myFormAction.submit();</script>
