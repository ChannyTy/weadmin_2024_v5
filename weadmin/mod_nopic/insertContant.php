<?
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("config.php");

if ($_REQUEST['execute'] == "insert") {
   $sql = "SELECT MAX(" . $mod_tb_root . "_order) FROM " . $mod_tb_root;
   $Query = wewebQueryDB($coreLanguageSQL, $sql);
   $Row = wewebFetchArrayDB($coreLanguageSQL, $Query);
   $maxOrder = $Row[0] + 1;

   $insert = array();
   $insert[$mod_tb_root . "_language"] = "'" . $_SESSION[$valSiteManage . 'core_session_language'] . "'";
   $insert[$mod_tb_root . "_masterkey"] = "'" . $_REQUEST["masterkey"] . "'";
   $insert[$mod_tb_root . "_subject"] = "'" . changeQuot($_REQUEST['inputSubject']) . "'";
   $insert[$mod_tb_root . "_url"] = "'" . changeQuot($_REQUEST['inputurl']) . "'";
   $insert[$mod_tb_root . "_target"] = "'" . changeQuot($_REQUEST['inputmenutarget']) . "'";
   $insert[$mod_tb_root . "_file"] = "'" . $_POST["picname"] . "'";
   $insert[$mod_tb_root . "_crebyid"] = "'" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
   $insert[$mod_tb_root . "_creby"] = "'" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
   $insert[$mod_tb_root . "_lastbyid"] = "'" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
   $insert[$mod_tb_root . "_lastby"] = "'" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
   $insert[$mod_tb_root . "_sdate"] = "'" . DateFormatInsert($_REQUEST['sdateInput']) . "'";
   $insert[$mod_tb_root . "_edate"] = "'" . DateFormatInsert($_REQUEST['edateInput']) . "'";
   $insert[$mod_tb_root . "_credate"] = "" . wewebNow($coreLanguageSQL) . "";
   $insert[$mod_tb_root . "_lastdate"] = "" . wewebNow($coreLanguageSQL) . "";
   $insert[$mod_tb_root . "_status"] = "'Disable'";
   $insert[$mod_tb_root . "_order"] = "'" . $maxOrder . "'";
   $sql = "INSERT INTO " . $mod_tb_root . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
   $Query = wewebQueryDB($coreLanguageSQL, $sql);
   $contantID = wewebInsertID($coreLanguageSQL);

   //print_pre($sql);
   logs_access('3', 'Insert');
}
?>
<? include("../lib/disconnect.php"); ?>
<form action="index.php" method="post" name="myFormAction" id="myFormAction">
   <input name="masterkey" type="hidden" id="masterkey" value="<?= $_REQUEST['masterkey'] ?>" />
   <input name="menukeyid" type="hidden" id="menukeyid" value="<?= $_REQUEST['menukeyid'] ?>" />
   <?php include_once './inc-inputsearch.php'; ?>
</form>
<script language="JavaScript" type="text/javascript"> document.myFormAction.submit();</script>
