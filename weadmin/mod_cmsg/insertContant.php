<?php
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("config.php");
$arrLang = $_SESSION[$valSiteManage . "core_session_multilang"];

$core_default_typemail = 1;
if ($_REQUEST['execute'] == "insert") {
   $randomNumber = randomNameUpdate(3);

   if (!is_dir($core_pathname_upload . "/" . $masterkey)) {
      mkdir($core_pathname_upload . "/" . $masterkey, 0777);
   }
   if (!is_dir($mod_path_html)) {
      mkdir($mod_path_html, 0777);
   }

   if (@file_exists($mod_path_html . "/" . $htmlfiledelete)) {
      @unlink($mod_path_html . "/" . $htmlfiledelete);
   }

   if ($_POST['inputHtml'] != "") {
      $filename = $_POST["valEditID"] . "-" . $_SESSION[$valSiteManage . 'core_session_language'] . "-" . $randomNumber . ".html";
      $HTMLToolContent = str_replace("\\\"", "\"", $_POST['inputHtml']);
      $fp = fopen($mod_path_html . "/" . $filename, "w");
      chmod($mod_path_html . "/" . $filename, 0777);
      fwrite($fp, $HTMLToolContent);
      fclose($fp);
   }

   $sql = "SELECT MAX(" . $mod_tb_root . "_order) FROM " . $mod_tb_root;
   $Query = wewebQueryDB($coreLanguageSQL, $sql);
   $Row = wewebFetchArrayDB($coreLanguageSQL, $Query);
   $maxOrder = $Row[0] + 1;

   $insert = array();
   $insert[$mod_tb_root . "_masterkey"] = "'" . $_REQUEST["masterkey"] . "'";
   $insert[$mod_tb_root . "_gid"] = "'" . $_POST["inputGroupID"] . "'";
   $insert[$mod_tb_root . "_sgid"] = "'" . $_POST["inputSubGroupID"] . "'";
   $insert[$mod_tb_root . "_crebyid"] = "'" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
   $insert[$mod_tb_root . "_creby"] = "'" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
   $insert[$mod_tb_root . "_lastbyid"] = "'" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
   $insert[$mod_tb_root . "_lastby"] = "'" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";

   $insert[$mod_tb_root . "_sdate"] = "'" . DateFormatInsert($_REQUEST['sdateInputC']) . "'";
   $insert[$mod_tb_root . "_edate"] = "'" . DateFormatInsert($_REQUEST['edateInputC']) . "'";

   $insert[$mod_tb_root . "_credate"] = "NOW()";

   $insert[$mod_tb_root . "_lastdate"] = "NOW()";
   $insert[$mod_tb_root . "_status"] = "'Disable'";
   $insert[$mod_tb_root . "_order"] = "'" . $maxOrder . "'";
   $sql = "INSERT INTO " . $mod_tb_root . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";

   $Query = wewebQueryDB($coreLanguageSQL, $sql);
   $contantID1 = wewebInsertID($coreLanguageSQL);
   $array_sch = array();
   if ($contantID1 > 0) {
      foreach ($arrLang as $keyLang => $valueLang) {
         if ($valueLang['key'] == $_SESSION[$valSiteManage . 'core_session_language']) {
            $insertLang = array();
            $insertLang[$mod_tb_root_lang . "_cid"] = "'" . $contantID1 . "'";
            $insertLang[$mod_tb_root_lang . "_masterkey"] = "'" . $_REQUEST["masterkey"] . "'";
            $insertLang[$mod_tb_root_lang . "_language"] = "'" . $_SESSION[$valSiteManage . 'core_session_language'] . "'";
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
            $sql2 = "INSERT INTO " . $mod_tb_root_lang . "(" . implode(",", array_keys($insertLang)) . ") VALUES (" . implode(",", array_values($insertLang)) . ")";
            wewebQueryDB($coreLanguageSQL, $sql2);
            $contantID = wewebInsertID($coreLanguageSQL);
            $contantLID = $contantID;
         } else {
            $insertLang = array();
            $insertLang[$mod_tb_root_lang . "_cid"] = "'" . $contantID1 . "'";
            $insertLang[$mod_tb_root_lang . "_masterkey"] = "'" . $_REQUEST["masterkey"] . "'";
            $insertLang[$mod_tb_root_lang . "_language"] = "'" . $valueLang['key'] . "'";
            $insertLang[$mod_tb_root_lang . "_lastbyid"] = "'" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
            $insertLang[$mod_tb_root_lang . "_lastby"] = "'" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
            $insertLang[$mod_tb_root_lang . "_lastdate"] = "NOW()";

            $sqllang = "INSERT INTO " . $mod_tb_root_lang . "(" . implode(",", array_keys($insertLang)) . ") VALUES (" . implode(",", array_values($insertLang)) . ")";
            wewebQueryDB($coreLanguageSQL, $sqllang);
            $contantLID = wewebInsertID($coreLanguageSQL);
         }
         $array_sch[$valueLang['key']] = $contantLID;
      }

      $sql_albumtemp = "SELECT " . $mod_tb_root_albumTemp . "_id," . $mod_tb_root_albumTemp . "_filename," . $mod_tb_root_albumTemp . "_name  FROM " . $mod_tb_root_albumTemp . " WHERE " . $mod_tb_root_albumTemp . "_contantid 	='" . $_REQUEST['valEditID'] . "' ORDER BY " . $mod_tb_root_albumTemp . "_id ASC";
      $query_albumtemp = wewebQueryDB($coreLanguageSQL, $sql_albumtemp);
      $number_albumtemp = wewebNumRowsDB($coreLanguageSQL, $query_albumtemp);
      if ($number_albumtemp >= 1) {
         while ($row_albumtemp = wewebFetchArrayDB($coreLanguageSQL, $query_albumtemp)) {
            $downloadID = $row_albumtemp[0];
            $downloadFile = $row_albumtemp[1];
            $downloadName = $row_albumtemp[2];

            $insert = array();
            $insert[$mod_tb_root_album . "_contantid"] = "'" . $contantID . "'";
            $insert[$mod_tb_root_album . "_filename"] = "'" . $downloadFile . "'";
            $insert[$mod_tb_root_album . "_name"] = "'" . $downloadName . "'";
            $insert[$mod_tb_root_album . "_language"] = "'" . $_REQUEST['inputLt'] . "'";

            $sql = "INSERT INTO " . $mod_tb_root_album . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
            $Query = wewebQueryDB($coreLanguageSQL, $sql);

            $sql_del = "DELETE FROM " . $mod_tb_root_albumTemp . " WHERE   " . $mod_tb_root_albumTemp . "_id='" . $downloadID . "'";
            $Query_del = wewebQueryDB($coreLanguageSQL, $sql_del);
         }
      }


      $sql_filetemp = "SELECT " . $mod_tb_fileTemp . "_id," . $mod_tb_fileTemp . "_filename," . $mod_tb_fileTemp . "_name  FROM " . $mod_tb_fileTemp . " WHERE " . $mod_tb_fileTemp . "_contantid 	='" . $_REQUEST['valEditID'] . "' ORDER BY " . $mod_tb_fileTemp . "_id ASC";
      $query_filetemp = wewebQueryDB($coreLanguageSQL, $sql_filetemp);
      $number_filetemp = wewebNumRowsDB($coreLanguageSQL, $query_filetemp);
      if ($number_filetemp >= 1) {
         while ($row_filetemp = wewebFetchArrayDB($coreLanguageSQL, $query_filetemp)) {
            $downloadID = $row_filetemp[0];
            $downloadFile = $row_filetemp[1];
            $downloadName = $row_filetemp[2];

            $insert = array();
            $insert[$mod_tb_file . "_contantid"] = "'" . $contantID . "'";
            $insert[$mod_tb_file . "_filename"] = "'" . $downloadFile . "'";
            $insert[$mod_tb_file . "_name"] = "'" . $downloadName . "'";
            $insert[$mod_tb_file . "_language"] = "'" . $_REQUEST['inputLt'] . "'";
            $insert[$mod_tb_file . "_credate"] = "NOW()";

            $sql = "INSERT INTO " . $mod_tb_file . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
            $Query = wewebQueryDB($coreLanguageSQL, $sql);

            $sql_del = "DELETE FROM " . $mod_tb_fileTemp . " WHERE   " . $mod_tb_fileTemp . "_id='" . $downloadID . "'";
            $Query_del = wewebQueryDB($coreLanguageSQL, $sql_del);
         }
      }

      logs_access('3', 'Insert');

      ## URL Search ###################################
      $txt_value_to = $contantID;

      $valUrlSearchTH = $mod_url_search_th . "/" . $txt_value_to;

      foreach ($array_sch as $keySch => $valueSch) {
         if ($keySch == $_POST['inputLt']) {
            $insertSch = array();
            $insertSch[$core_tb_search . "_language"] = "'" . $_REQUEST['inputLt'] . "'";
            $insertSch[$core_tb_search . "_gid"] = "'" . $contantID1 . "'";
            $insertSch[$core_tb_search . "_contantid"] = "'" . $valueSch . "'";
            $insertSch[$core_tb_search . "_masterkey"] = "'" . $_POST["masterkey"] . "'";
            $insertSch[$core_tb_search . "_subject"] = "'" . changeQuot($_POST["inputSubject"]) . "'";
            $insertSch[$core_tb_search . "_title"] = "'" . changeQuot($_POST["inputDescription"]) . "'";
            $insertSch[$core_tb_search . "_keyword"] = "'" . addslashes($_POST["inputSubject"]) . " " . addslashes($_POST["inputDescription"]) . " " . htmlspecialchars($_POST['inputHtml']) . "'";
            $insertSch[$core_tb_search . "_url"] = "'" . $valUrlSearchTH . "'";
            $insertSch[$core_tb_search . "_edate"] = "'" . DateFormatInsert($_POST["edateInput"]) . "'";
            $insertSch[$core_tb_search . "_sdate"] = "'" . DateFormatInsert($_POST["sdateInput"]) . "'";
            $insertSch[$core_tb_search . "_status"] = "'Disable'";
            
            $insertSch[$core_tb_search . "_typec"] = "'" . changeQuot($_POST["inputTypeC"]) . "'";
            $insertSch[$core_tb_search . "_picType"] = "'" . changeQuot($_POST["inputTypePic"]) . "'";
            $insertSch[$core_tb_search . "_picDefault"] = "'" . changeQuot($_POST["inputPicD"]) . "'";
            $insertSch[$core_tb_search . "_urlc"] = "'" . changeQuot($_POST["inputurlC"]) . "'";
            $insertSch[$core_tb_search . "_target"] = "'" . changeQuot($_POST["inputmenutarget"]) . "'";

            $sqlSch = "INSERT " . $core_tb_search . " (" . implode(",", array_keys($insertSch)) . ") VALUES (" . implode(",", array_values($insertSch)) . ")";
            $querySch = wewebQueryDB($coreLanguageSQL, $sqlSch);
         }else{
            $insertSch = array();
            $insertSch[$core_tb_search . "_language"] = "'" . $keySch . "'";
            $insertSch[$core_tb_search . "_gid"] = "'" . $contantID1 . "'";
            $insertSch[$core_tb_search . "_contantid"] = "'" . $valueSch . "'";
            $insertSch[$core_tb_search . "_masterkey"] = "'" . $_POST["masterkey"] . "'";
            $insertSch[$core_tb_search . "_url"] = "'" . $valUrlSearchTH . "'";
            $insertSch[$core_tb_search . "_status"] = "'Disable'";
            $insertSch[$core_tb_search . "_pic"] = "'" . $_POST["picname"] . "'";
            $sqlSch = "INSERT " . $core_tb_search . " (" . implode(",", array_keys($insertSch)) . ") VALUES (" . implode(",", array_values($insertSch)) . ")";
            $querySch = wewebQueryDB($coreLanguageSQL, $sqlSch);

         }
      }

   }
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
