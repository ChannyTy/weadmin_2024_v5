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

      $update = array();
      $update[] = $mod_tb_root_group . "_coreid  	='" . changeQuot($_POST['inputGroupID']) . "'";
      $update[] = $mod_tb_root_group . "_lastbyid='" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
      $update[] = $mod_tb_root_group . "_lastby='" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
      $update[] = $mod_tb_root_group . "_col  	='" . changeQuot($_POST['inputColor']) . "'";
      $update[] = $mod_tb_root_group . "_lastdate=NOW()";

      $sql = "UPDATE " . $mod_tb_root_group . " SET " . implode(",", $update) . " WHERE " . $mod_tb_root_group . "_id='" . $_POST["valEditID"] . "' ";
      $Query = wewebQueryDB($coreLanguageSQL, $sql);

      $sqlcheck = "SELECT " . $mod_tb_root_group_lang . "_id FROM " . $mod_tb_root_group_lang . " WHERE " . $mod_tb_root_group_lang . "_language = '" . $_REQUEST['inputLt'] . "' AND " . $mod_tb_root_group_lang . "_cid = '" . $_POST["valEditID"] . "'";
      $Querycheck = wewebQueryDB($coreLanguageSQL, $sqlcheck);
      $count_check = wewebNumRowsDB($coreLanguageSQL, $Querycheck);
      if ($count_check > 0) {
         $result = wewebFetchArrayDB($coreLanguageSQL, $Querycheck);
         $id = $result[$mod_tb_root_group_lang . "_id"];

         $updatelang = array();
         $updatelang[] = $mod_tb_root_group_lang . "_subject='" . changeQuot($_POST['inputSubject']) . "'";
         $updatelang[] = $mod_tb_root_group_lang . "_title  	='" . changeQuot($_POST['inputComment']) . "'";

         $sql = "UPDATE " . $mod_tb_root_group_lang . " SET " . implode(",", $updatelang) . " WHERE " . $mod_tb_root_group_lang . "_id='" . $id . "' ";
         $Query = wewebQueryDB($coreLanguageSQL, $sql);
      } else {
         $insertlang = array();
         $insertlang[$mod_tb_root_group_lang . "_cid"] = "'" . $_POST["valEditID"] . "'";
         $insertlang[$mod_tb_root_group_lang . "_masterkey"] = "'" . $_REQUEST["masterkey"] . "'";
         $insertlang[$mod_tb_root_group_lang . "_subject"] = "'" . changeQuot($_REQUEST['inputSubject']) . "'";
         $insertlang[$mod_tb_root_group_lang . "_language"] = "'" . $_REQUEST['inputLt'] . "'";
         $insertlang[$mod_tb_root_group_lang . "_title"] = "'" . changeQuot($_REQUEST['inputComment']) . "'";
         $sql = "INSERT INTO " . $mod_tb_root_group_lang . "(" . implode(",", array_keys($insertlang)) . ") VALUES (" . implode(",", array_values($insertlang)) . ")";
         $Query = wewebQueryDB($coreLanguageSQL, $sql);
      }

      logs_access('3', 'Update Group');
   ?>
   <?php } ?>
   <?php include("../lib/disconnect.php"); ?>
   <form action="group.php" method="post" name="myFormAction" id="myFormAction">
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