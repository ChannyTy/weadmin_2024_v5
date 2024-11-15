<?
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");

if ($_REQUEST['execute'] == "insert") {

   $sql = "SELECT MAX(" . $core_tb_group . "_order) FROM " . $core_tb_group;
   $Query = wewebQueryDB($coreLanguageSQL, $sql);
   $Row = wewebFetchArrayDB($coreLanguageSQL, $Query);
   $maxOrder = $Row[0] + 1;

   $insert = array();
   $insert[$core_tb_group . "_name"] = "'" . changeQuot($_REQUEST['inputnamegroup']) . "'";
   $insert[$core_tb_group . "_lv"] = "'" . changeQuot($_REQUEST['inputaccess']) . "'";
   $insert[$core_tb_group . "_crebyid"] = "'" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
   $insert[$core_tb_group . "_creby"] = "'" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
   $insert[$core_tb_group . "_credate"] = "" . wewebNow($coreLanguageSQL) . "";
   $insert[$core_tb_group . "_lastdate"] = "" . wewebNow($coreLanguageSQL) . "";
   $insert[$core_tb_group . "_status"] = "'Enable'";
   $insert[$core_tb_group . "_order"] = "'" . $maxOrder . "'";
   $sql = "INSERT INTO " . $core_tb_group . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
   $Query = wewebQueryDB($coreLanguageSQL, $sql);
   $permissionID = wewebInsertID($coreLanguageSQL, $core_tb_group, $core_tb_group . "_id");

   $cutTxtPermission = $_POST['PermissionAdmin'];
   $cutTxtPermissionArray = explode(",", $cutTxtPermission);
   for ($i = 0; $i < count($cutTxtPermissionArray); $i++) {
      $txtPermission = explode(":", $cutTxtPermissionArray[$i]);

      $insert = array();
      $insert[$core_tb_permission . "_perid"] = "'" . $permissionID . "'";
      $insert[$core_tb_permission . "_menuid"] = "'" . $txtPermission[0] . "'";
      $insert[$core_tb_permission . "_permission"] = "'" . $txtPermission[1] . "'";
      $sql = "INSERT INTO " . $core_tb_permission . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
      $Query = wewebQueryDB($coreLanguageSQL, $sql);
   }
   logs_access('4', 'Insert');
}
?>
<? include("../lib/disconnect.php"); ?>
<form action="../core/permisManage.php" method="post" name="myFormAction" id="myFormAction">
   <input name="masterkey" type="hidden" id="masterkey" value="<?= $_REQUEST['masterkey'] ?>" />
   <input name="menukeyid" type="hidden" id="menukeyid" value="<?= $_REQUEST['menukeyid'] ?>" />
   <input name="inputSearch" type="hidden" id="inputSearch" value="<?= $_REQUEST['inputSearch'] ?>" />
   <input name="inputGh" type="hidden" id="inputGh" value="<?= $_REQUEST['inputaccess'] ?>" />
</form>
<script language="JavaScript" type="text/javascript"> document.myFormAction.submit();</script>
