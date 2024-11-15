<?php
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("config.php");
$arrLang = $_SESSION[$valSiteManage . "core_session_multilang"];

if ($_REQUEST['execute'] == "insert") {
   $sql = "SELECT MAX(" . $mod_tb_root . "_order) FROM " . $mod_tb_root;
   $Query = wewebQueryDB($coreLanguageSQL, $sql);
   $Row = wewebFetchArrayDB($coreLanguageSQL, $Query);
   $maxOrder = $Row[0] + 1;

   $insert = array();
   $insert[$mod_tb_root . "_language"] = "'" . $_REQUEST['inputLt'] . "'";
   $insert[$mod_tb_root . "_masterkey"] = "'" . $_REQUEST["masterkey"] . "'";
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
   foreach ($arrLang as $keyLang => $valueLang) {
      if ($valueLang['key'] == $_REQUEST['inputLt']) {
         $insertLang = array();
         $insertLang[$mod_tb_root_lang . "_cid"] = "'" . $contantID . "'";
         $insertLang[$mod_tb_root_lang . "_masterkey"] = "'" . $_REQUEST["masterkey"] . "'";
         $insertLang[$mod_tb_root_lang . "_language"] = "'" . $_REQUEST['inputLt'] . "'";
         $insertLang[$mod_tb_root_lang . "_subject"] = "'" . changeQuot($_REQUEST['inputSubject']) . "'";
         $insertLang[$mod_tb_root_lang . "_url"] = "'" . changeQuot($_REQUEST['inputurl']) . "'";
         $insertLang[$mod_tb_root_lang . "_target"] = "'" . changeQuot($_REQUEST['inputmenutarget']) . "'";
         $insertLang[$mod_tb_root_lang . "_pic"] = "'" . changeQuot($_REQUEST['picname']) . "'";
         $insertLang[$mod_tb_root_lang . "_lastbyid"] = "'" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
         $insertLang[$mod_tb_root_lang . "_lastby"] = "'" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
         $insertLang[$mod_tb_root_lang . "_lastdate"] = "NOW()";

         $sqllang = "INSERT INTO " . $mod_tb_root_lang . "(" . implode(",", array_keys($insertLang)) . ") VALUES (" . implode(",", array_values($insertLang)) . ")";
         $Querylang = wewebQueryDB($coreLanguageSQL, $sqllang);
      } else {
         $insertLang = array();
         $insertLang[$mod_tb_root_lang . "_cid"] = "'" . $contantID . "'";
         $insertLang[$mod_tb_root_lang . "_masterkey"] = "'" . $_REQUEST["masterkey"] . "'";
         $insertLang[$mod_tb_root_lang . "_language"] = "'" . $valueLang['key'] . "'";
         $insertLang[$mod_tb_root_lang . "_lastbyid"] = "'" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
         $insertLang[$mod_tb_root_lang . "_lastby"] = "'" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
         $insertLang[$mod_tb_root_lang . "_lastdate"] = "NOW()";

         $sqllang = "INSERT INTO " . $mod_tb_root_lang . "(" . implode(",", array_keys($insertLang)) . ") VALUES (" . implode(",", array_values($insertLang)) . ")";
         $Querylang = wewebQueryDB($coreLanguageSQL, $sqllang);
      }
   }


   logs_access('3', 'Insert');
}
?>
<?php include("../lib/disconnect.php"); ?>
<form action="index.php" method="post" name="myFormAction" id="myFormAction">
   <input name="masterkey" type="hidden" id="masterkey" value="<?php echo $_REQUEST['masterkey'] ?>" />
   <input name="menukeyid" type="hidden" id="menukeyid" value="<?php echo $_REQUEST['menukeyid'] ?>" />
   <?php include_once './inc-inputsearch.php'; ?>

</form>
<script language="JavaScript" type="text/javascript">
   document.myFormAction.submit();
</script>