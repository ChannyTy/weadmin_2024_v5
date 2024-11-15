<?php
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
      $randomNumber = randomNameUpdate(1);

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
         $filename = $_POST["valEditID"] . "-" . $randomNumber . ".html";
         $HTMLToolContent = str_replace("\\\"", "\"", $_POST['inputHtml']);
         $fp = fopen($mod_path_html . "/" . $filename, "w");
         chmod($mod_path_html . "/" . $filename, 0777);
         fwrite($fp, $HTMLToolContent);
         fclose($fp);
      }

      $update = array();
      $update[] = $mod_tb_root . "_gid='" . $_POST["inputGroupID"] . "'";
      $update[] = $mod_tb_root . "_sgid='" . $_POST["inputSubGroupID"] . "'";
      $update[] = $mod_tb_root . "_lastbyid='" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
      $update[] = $mod_tb_root . "_lastby='" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
      $update[] = $mod_tb_root . "_sdate='" . DateFormatInsert($_REQUEST['sdateInputC']) . "'";
      $update[] = $mod_tb_root . "_edate='" . DateFormatInsert($_REQUEST['edateInputC']) . "'";
      $update[] = $mod_tb_root . "_lastdate=NOW()";

      $sql = "UPDATE " . $mod_tb_root . " SET " . implode(",", $update) . " WHERE " . $mod_tb_root . "_id='" . $_POST["valEditID"] . "' ";
      $Query = wewebQueryDB($coreLanguageSQL, $sql);

      $sqlcheck = "SELECT " . $mod_tb_root_lang . "_id FROM " . $mod_tb_root_lang . " WHERE " . $mod_tb_root_lang . "_language = '" . $_REQUEST['inputLt'] . "' AND " . $mod_tb_root_lang . "_cid = '" . $_POST["valEditID"] . "'";
      $Querycheck = wewebQueryDB($coreLanguageSQL, $sqlcheck);
      $count_check = wewebNumRowsDB($coreLanguageSQL, $Querycheck);
      if ($count_check > 0) {
         $update = array();
         $update[] = $mod_tb_root_lang . "_subject='" . changeQuot($_POST['inputSubject']) . "'";
         $update[] = $mod_tb_root_lang . "_title='" . changeQuot($_POST['inputDescription']) . "'";

         if ($_POST['inputTypeC'] == 1) {
            $update[] = $mod_tb_root_lang . "_htmlfilename  	='" . $filename . "'";
         }
         $update[] = $mod_tb_root_lang . "_typec='" . changeQuot($_POST['inputTypeC']) . "'";
         $update[] = $mod_tb_root_lang . "_picType='" . changeQuot($_POST['inputTypePic']) . "'";
         $update[] = $mod_tb_root_lang . "_picDefault='" . changeQuot($_POST['inputPicD']) . "'";
         $update[] = $mod_tb_root_lang . "_urlc='" . changeQuot($_POST['inputurlC']) . "'";
         $update[] = $mod_tb_root_lang . "_target='" . changeQuot($_POST['inputmenutarget']) . "'";

         $update[] = $mod_tb_root_lang . "_type='" . $_POST["inputType"] . "'";
         $update[] = $mod_tb_root_lang . "_filevdo='" . $_POST['vdoname'] . "'";
         $update[] = $mod_tb_root_lang . "_description='" . changeQuot($_POST['inputTagDescription']) . "'";
         $update[] = $mod_tb_root_lang . "_keywords='" . changeQuot($_POST['inputTagKeywords']) . "'";
         $update[] = $mod_tb_root_lang . "_metatitle='" . changeQuot($_POST['inputTagTitle']) . "'";
         $update[] = $mod_tb_root_lang . "_lastbyid='" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
         $update[] = $mod_tb_root_lang . "_lastby='" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
         $update[] = $mod_tb_root_lang . "_lastdate=NOW()";
   
         $update[] = $mod_tb_root_lang . "_url='" . changeQuot($_REQUEST['inputurl']) . "'";
         $sql = "UPDATE " . $mod_tb_root_lang . " SET " . implode(",", $update) . " WHERE " . $mod_tb_root_lang . "_id='" . $_POST["valCid"] . "' AND " . $mod_tb_root_lang . "_language = '" . $_REQUEST['inputLt'] . "'";
         $Query = wewebQueryDB($coreLanguageSQL, $sql);
         $valCid = $_POST['valCid'];
      }else{
         $insertLang = array();
         $insertLang[$mod_tb_root_lang . "_cid"] = "'" . $_POST["valEditID"] . "'";
         $insertLang[$mod_tb_root_lang . "_masterkey"] = "'" . $_REQUEST["masterkey"] . "'";
         $insertLang[$mod_tb_root_lang . "_language"] = "'" . $_POST['inputLt'] . "'";
         $insertLang[$mod_tb_root_lang . "_subject"] = "'" . changeQuot($_REQUEST['inputSubject']) . "'";
         $insertLang[$mod_tb_root_lang . "_title"] = "'" . changeQuot($_REQUEST['inputDescription']) . "'";

         $insertLang[$mod_tb_root_lang . "_typec"] = "'" . changeQuot($_REQUEST['inputTypeC']) . "'";
         $insertLang[$mod_tb_root_lang . "_picType"] = "'" . changeQuot($_REQUEST['inputTypePic']) . "'";
         $insertLang[$mod_tb_root_lang . "_picDefault"] = "'" . changeQuot($_REQUEST['inputPicD']) . "'";
         $insertLang[$mod_tb_root_lang . "_urlc"] = "'" . changeQuot($_REQUEST['inputurlC']) . "'";
         $insertLang[$mod_tb_root_lang . "_target"] = "'" . changeQuot($_REQUEST['inputmenutarget']) . "'";

         $insertLang[$mod_tb_root_lang . "_pic"] = "'" . $_POST["picname"] . "'";
         $insertLang[$mod_tb_root_lang . "_type"] = "'" . $_POST["inputType"] . "'";
         $insertLang[$mod_tb_root_lang . "_url"] = "'" . changeQuot($_REQUEST['inputurl']) . "'";
         $insertLang[$mod_tb_root_lang . "_filevdo"] = "'" . $_POST["vdoname"] . "'";
         $insertLang[$mod_tb_root_lang . "_htmlfilename"] = "'" . $filename . "'";
         $insertLang[$mod_tb_root_lang . "_description"] = "'" . changeQuot($_REQUEST['inputTagDescription']) . "'";
         $insertLang[$mod_tb_root_lang . "_keywords"] = "'" . changeQuot($_REQUEST['inputTagKeywords']) . "'";
         $insertLang[$mod_tb_root_lang . "_metatitle"] = "'" . changeQuot($_REQUEST['inputTagTitle']) . "'";
         $insertLang[$mod_tb_root_lang . "_lastbyid"] = "'" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
         $insertLang[$mod_tb_root_lang . "_lastby"] = "'" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
         $insertLang[$mod_tb_root_lang . "_lastdate"] = "NOW()";
         $sql = "INSERT INTO " . $mod_tb_root_lang . "(" . implode(",", array_keys($insertLang)) . ") VALUES (" . implode(",", array_values($insertLang)) . ")";
         wewebQueryDB($coreLanguageSQL, $sql);
         $valCid = wewebInsertID($coreLanguageSQL);

         ## URL Search ###################################
         $sqlSch = "DELETE FROM " . $core_tb_search . " WHERE   " . $core_tb_search . "_gid='" . $_POST["valEditID"] . "'  
         AND " . $core_tb_search . "_masterkey='" . $_POST["masterkey"] . "' AND " . $core_tb_search . "_language='" . $_POST["inputLt"] . "'  ";
         $querySch = wewebQueryDB($coreLanguageSQL, $sqlSch);
      }


      logs_access('3', 'Update');

      ## URL Search ###################################
      $txt_value_to = $_POST["valEditID"];

      $valUrlSearchTH = $mod_url_search_th . "/" . $txt_value_to;

      // check seach isset
      $sql_sch = "SELECT * 
      FROM " . $core_tb_search . " 
      WHERE " . $core_tb_search . "_gid = '" . $_POST["valEditID"] . "' 
      AND " . $core_tb_search . "_masterkey = '" . $_POST["masterkey"] . "'
      AND " . $core_tb_search . "_contantid = '" . $valCid . "'";
      $QuerySch = wewebQueryDB($coreLanguageSQL, $sql_sch);
      $NumRowSch = wewebNumRowsDB($coreLanguageSQL, $QuerySch);
      if ($NumRowSch > 0) {
         $updateSch = array();
         $updateSch[] = $core_tb_search . "_subject='" . changeQuot($_REQUEST['inputSubject']) . "'";
         $updateSch[] = $core_tb_search . "_title='" . changeQuot($_REQUEST['inputDescription']) . "'";
         $updateSch[] = $core_tb_search . "_keyword='" . addslashes($_POST["inputSubject"]) . " " . addslashes($_POST["inputDescription"]) . " " . htmlspecialchars($_POST['inputHtml']) . "'";
         $updateSch[] = $core_tb_search . "_url='" . $valUrlSearchTH . "'";
         $updateSch[] = $core_tb_search . "_sdate  	='" . DateFormatInsert($_REQUEST['sdateInput']) . "'";
         $updateSch[] = $core_tb_search . "_edate  	='" . DateFormatInsert($_REQUEST['edateInput']) . "'";

         $updateSch[] = $core_tb_search . "_typec='" . changeQuot($_REQUEST['inputTypeC']) . "'";
         $updateSch[] = $core_tb_search . "_picType='" . changeQuot($_REQUEST['inputTypePic']) . "'";
         $updateSch[] = $core_tb_search . "_picDefault='" . changeQuot($_REQUEST['inputPicD']) . "'";
         $updateSch[] = $core_tb_search . "_urlc='" . changeQuot($_REQUEST['inputurlC']) . "'";
         $updateSch[] = $core_tb_search . "_target='" . changeQuot($_REQUEST['inputmenutarget']) . "'";
         
         $sqlSch = "UPDATE " . $core_tb_search . " SET " . implode(",", $updateSch) . " WHERE " . $core_tb_search . "_contantid='" . $valCid . "'  AND " . $core_tb_search . "_masterkey='" . $_POST["masterkey"] . "' ";
         $querySch = wewebQueryDB($coreLanguageSQL, $sqlSch);
      }else{
         // get status
         $sql_lang = "SELECT 
         " . $mod_tb_root . "_status as status,
         " . $mod_tb_root_lang . "_pic as pic
         FROM " . $mod_tb_root . " 
         INNER JOIN " . $mod_tb_root_lang . " ON " . $mod_tb_root_lang . "_cid = " . $mod_tb_root . "_id
         WHERE " . $mod_tb_root . "_id='" . $_POST["valEditID"] . "'
         AND " . $mod_tb_root_lang . "_language = '" . $_POST['inputLt'] . "'
         ";
         $query_root = wewebQueryDB($coreLanguageSQL, $sql_lang);
         $row_root = wewebFetchArrayDB($coreLanguageSQL, $query_root);

         $insertSch = array();
         $insertSch[$core_tb_search . "_language"] = "'" . $_POST['inputLt'] . "'";
         $insertSch[$core_tb_search . "_gid"] = "'" . $_POST["valEditID"] . "'";
         $insertSch[$core_tb_search . "_contantid"] = "'" . $valCid . "'";
         $insertSch[$core_tb_search . "_masterkey"] = "'" . $_POST["masterkey"] . "'";
         $insertSch[$core_tb_search . "_subject"] = "'" . changeQuot($_POST["inputSubject"]) . "'";
         $insertSch[$core_tb_search . "_title"] = "'" . changeQuot($_POST["inputDescription"]) . "'";
         $insertSch[$core_tb_search . "_keyword"] = "'" . addslashes($_POST["inputSubject"]) . " " . addslashes($_POST["inputDescription"]) . " " . htmlspecialchars($_POST['inputHtml']) . "'";
         $insertSch[$core_tb_search . "_url"] = "'" . $valUrlSearchTH . "'";
         $insertSch[$core_tb_search . "_edate"] = "'" . DateFormatInsert($_POST["edateInput"]) . "'";
         $insertSch[$core_tb_search . "_sdate"] = "'" . DateFormatInsert($_POST["sdateInput"]) . "'";
         $insertSch[$core_tb_search . "_status"] = "'" . $row_root['status'] . "'";
         $insertSch[$core_tb_search . "_pic"] = "'" . $row_root['picname'] . "'";
         
         $insertSch[$core_tb_search . "_typec"] = "'" . $_POST["inputTypeC"] . "'";
         $insertSch[$core_tb_search . "_picType"] = "'" . $_POST["inputTypePic"] . "'";
         $insertSch[$core_tb_search . "_picDefault"] = "'" . $_POST["inputPicD"] . "'";
         $insertSch[$core_tb_search . "_urlc"] = "'" . $_POST["inputurlC"] . "'";
         $insertSch[$core_tb_search . "_target"] = "'" . $_POST["inputmenutarget"] . "'";

         $sqlSch = "INSERT " . $core_tb_search . " (" . implode(",", array_keys($insertSch)) . ") VALUES (" . implode(",", array_values($insertSch)) . ")";
         $querySch = wewebQueryDB($coreLanguageSQL, $sqlSch);
      }
   ?>
   <?php } ?>
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
</body>

</html>