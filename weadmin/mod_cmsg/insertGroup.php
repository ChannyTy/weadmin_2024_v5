<?php
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("config.php");
$arrLang = $_SESSION[$valSiteManage . "core_session_multilang"];

if ($_REQUEST['execute'] == "insert") {

   $sql = "SELECT MAX(" . $mod_tb_root_group . "_order) FROM " . $mod_tb_root_group;
   $Query = wewebQueryDB($coreLanguageSQL, $sql);
   $Row = wewebFetchArrayDB($coreLanguageSQL, $Query);
   $maxOrder = $Row[0] + 1;

   $insert = array();
   $insert[$mod_tb_root_group . "_masterkey"] = "'" . $_REQUEST["masterkey"] . "'";
   $insert[$mod_tb_root_group . "_crebyid"] = "'" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
   $insert[$mod_tb_root_group . "_creby"] = "'" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
   $insert[$mod_tb_root_group . "_lastbyid"] = "'" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
   $insert[$mod_tb_root_group . "_lastby"] = "'" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
   $insert[$mod_tb_root_group . "_credate"] = "NOW()";
   $insert[$mod_tb_root_group . "_lastdate"] = "NOW()";
   $insert[$mod_tb_root_group . "_status"] = "'Disable'";
   $insert[$mod_tb_root_group . "_order"] = "'" . $maxOrder . "'";

   $sql = "INSERT INTO " . $mod_tb_root_group . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
   $Query = wewebQueryDB($coreLanguageSQL, $sql);
   $contantID = wewebInsertID($coreLanguageSQL);

   if ($contantID > 0) {
      foreach ($arrLang as $keyLang => $valueLang) {
         if ($valueLang['key'] == $_REQUEST['inputLt']) {
            $insertlang = array();
            $insertlang[$mod_tb_root_group_lang . "_cid"] = "'" . $contantID . "'";
            $insertlang[$mod_tb_root_group_lang . "_masterkey"] = "'" . $_REQUEST["masterkey"] . "'";
            $insertlang[$mod_tb_root_group_lang . "_language"] = "'" . $_REQUEST['inputLt'] . "'";
            $insertlang[$mod_tb_root_group_lang . "_subject"] = "'" . changeQuot($_REQUEST['inputSubject']) . "'";
            $insertlang[$mod_tb_root_group_lang . "_title"] = "'" . changeQuot($_REQUEST['inputComment']) . "'";
            $insertlang[$mod_tb_root_group_lang . "_pic"] = "'" . changeQuot($_REQUEST['picname']) . "'";
         
            $sql = "INSERT INTO " . $mod_tb_root_group_lang . "(" . implode(",", array_keys($insertlang)) . ") VALUES (" . implode(",", array_values($insertlang)) . ")";
            $Query = wewebQueryDB($coreLanguageSQL, $sql);
         }else{
            $insertlang = array();
            $insertlang[$mod_tb_root_group_lang . "_cid"] = "'" . $contantID . "'";
            $insertlang[$mod_tb_root_group_lang . "_masterkey"] = "'" . $_REQUEST["masterkey"] . "'";
            $insertlang[$mod_tb_root_group_lang . "_language"] = "'" . $valueLang['key'] . "'";
         
            $sql = "INSERT INTO " . $mod_tb_root_group_lang . "(" . implode(",", array_keys($insertlang)) . ") VALUES (" . implode(",", array_values($insertlang)) . ")";
            $Query = wewebQueryDB($coreLanguageSQL, $sql);
         }
      }
   }

   logs_access('3', 'Insert Group');
}
?>
<?php include("../lib/disconnect.php"); ?>
<form action="group.php" method="post" name="myFormAction" id="myFormAction">
   <input name="masterkey" type="hidden" id="masterkey" value="<?php echo $_REQUEST['masterkey'] ?>" />
   <input name="menukeyid" type="hidden" id="menukeyid" value="<?php echo $_REQUEST['menukeyid'] ?>" />
   <input name="inputSearch" type="hidden" id="inputSearch" value="<?php echo $_REQUEST['inputSearch'] ?>" />
   <input name="inputGh" type="hidden" id="inputGh" value="<?php echo $_REQUEST['inputgroupid'] ?>" />
   <input name="inputgroupID" type="hidden" id="inputgroupID" value="<?php echo $_REQUEST['inputgroupID'] ?>" />

   <?php require_once './inc-inputsearch.php';?>
</form>
<script language="JavaScript" type="text/javascript"> document.myFormAction.submit();</script>
