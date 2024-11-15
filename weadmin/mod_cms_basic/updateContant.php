<?
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("config.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <title>Manage Contant</title>
</head>

<body>
   <?php
   if ($execute == "update") {
      $randomNumber = randomNameUpdate(2);

      if (!is_dir($core_pathname_upload . "/" . $masterkey)) {
         mkdir($core_pathname_upload . "/" . $masterkey, 0777);
      }
      if (!is_dir($mod_path_html)) {
         mkdir($mod_path_html, 0777);
      }


      if (@file_exists($mod_path_html . "/" . $_REQUEST['inputHtmlDel'])) {
         @unlink($mod_path_html . "/" . $_REQUEST['inputHtmlDel']);
      }

      if ($_POST['inputHtml'] != "") {
         $filename = $_POST["valEditID"] . "-" . $_REQUEST['inputLt'] . "-" . $randomNumber . ".html";
         $HTMLToolContent = str_replace("\\\"", "\"", $_POST['inputHtml']);
         $fp = fopen($mod_path_html . "/" . $filename, "w");
         chmod($mod_path_html . "/" . $filename, 0777);
         fwrite($fp, $HTMLToolContent);
         fclose($fp);
      }

      $updatemain = array();
      $updatemain[] = $mod_tb_root . "_lastbyid='" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
      $updatemain[] = $mod_tb_root . "_lastby='" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
      if ($_REQUEST['cdateInput'] != "") {
         $updatemain[] = $mod_tb_root . "_credate  	='" . DateFormatInsertCre($_REQUEST['cdateInput']) . "'";
      } else {
         $updatemain[] = $mod_tb_root . "_credate=NOW()";
      }
      $updatemain[] = $mod_tb_root . "_lastdate=NOW()";
      $updatemain[] = $mod_tb_root . "_sdate  	='" . DateFormatInsert($sdateInput) . "'";
      $updatemain[] = $mod_tb_root . "_edate  	='" . DateFormatInsert($edateInput) . "'";
      $updatemain[] = $mod_tb_root . "_icon='" . changeQuot($_POST['picname']) . "'";

      $sqlmain = "UPDATE " . $mod_tb_root . " SET " . implode(",", $updatemain) . " WHERE " . $mod_tb_root . "_id='" . $_POST["valEditID"] . "' ";
      $Query = wewebQueryDB($coreLanguageSQL, $sqlmain);

      $sqlcheck = "SELECT " . $mod_tb_root_lang . "_id FROM " . $mod_tb_root_lang . " WHERE " . $mod_tb_root_lang . "_language = '" . $_REQUEST['inputLt'] . "' AND " . $mod_tb_root_lang . "_cid = '" . $_POST["valEditID"] . "'";
      $Querycheck = wewebQueryDB($coreLanguageSQL, $sqlcheck);
      $count_check = wewebNumRowsDB($coreLanguageSQL, $Querycheck);
      if ($count_check > 0) {
         $update = array();
         $update[] = $mod_tb_root_lang . "_subject='" . changeQuot($_POST['inputSubject']) . "'";
         $update[] = $mod_tb_root_lang . "_htmlfilename  	='" . $filename . "'";
         $update[] = $mod_tb_root_lang . "_description='" . changeQuot($_POST['inputTagDescription']) . "'";
         $update[] = $mod_tb_root_lang . "_keywords='" . changeQuot($_POST['inputTagKeywords']) . "'";
         $update[] = $mod_tb_root_lang . "_metatitle='" . changeQuot($_POST['inputTagTitle']) . "'";
         $update[] = $mod_tb_root_lang . "_lastbyid='" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
         $update[] = $mod_tb_root_lang . "_lastby='" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
         $update[] = $mod_tb_root_lang . "_lastdate=NOW()";
         $sql = "UPDATE " . $mod_tb_root_lang . " SET " . implode(",", $update) . " WHERE " . $mod_tb_root_lang . "_id='" . $_POST["valCid"] . "' AND " . $mod_tb_root_lang . "_language = '" . $_REQUEST['inputLt'] . "'";
         $Query = wewebQueryDB($coreLanguageSQL, $sql);
         $valCid = $_POST['valCid'];
      } else {
         $insertLang = array();
         $insertLang[$mod_tb_root_lang . "_cid"] = "'" . $_POST["valEditID"] . "'";
         $insertLang[$mod_tb_root_lang . "_masterkey"] = "'" . $_REQUEST["masterkey"] . "'";
         $insertLang[$mod_tb_root_lang . "_language"] = "'" . $_POST['inputLt'] . "'";
         $insertLang[$mod_tb_root_lang . "_subject"] = "'" . changeQuot($_REQUEST['inputSubject']) . "'";
         $insertLang[$mod_tb_root_lang . "_htmlfilename"] = "'" . $filename . "'";
         $insertLang[$mod_tb_root_lang . "_description"] = "'" . changeQuot($_REQUEST['inputTagDescription']) . "'";
         $insertLang[$mod_tb_root_lang . "_keywords"] = "'" . changeQuot($_REQUEST['inputTagKeywords']) . "'";
         $insertLang[$mod_tb_root_lang . "_metatitle"] = "'" . changeQuot($_REQUEST['inputTagTitle']) . "'";
         $insertLang[$mod_tb_root_lang . "_lastbyid"] = "'" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
         $insertLang[$mod_tb_root_lang . "_lastby"] = "'" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
         $insertLang[$mod_tb_root_lang . "_lastdate"] = "NOW()";

         $sqllang = "INSERT INTO " . $mod_tb_root_lang . "(" . implode(",", array_keys($insertLang)) . ") VALUES (" . implode(",", array_values($insertLang)) . ")";
         $Querylang = wewebQueryDB($coreLanguageSQL, $sqllang);
         $valCid = wewebInsertID($coreLanguageSQL);
      }

      logs_access('3', 'Update');
   ?>
   <? } ?>
   <? include("../lib/disconnect.php"); ?>
   <form action="index.php" method="post" name="myFormAction" id="myFormAction">
      <input name="masterkey" type="hidden" id="masterkey" value="<?= $_REQUEST['masterkey'] ?>" />
      <input name="menukeyid" type="hidden" id="menukeyid" value="<?= $_REQUEST['menukeyid'] ?>" />
      <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?= $_REQUEST['module_pageshow'] ?>" />
      <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?= $_REQUEST['module_pagesize'] ?>" />
      <input name="module_orderby" type="hidden" id="module_orderby" value="<?= $_REQUEST['module_orderby'] ?>" />
      <?php include_once './inc-inputsearch.php'; ?>
   </form>
   <script language="JavaScript" type="text/javascript">
      document.myFormAction.submit();
   </script>
</body>

</html>