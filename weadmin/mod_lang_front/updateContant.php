<?
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("config.php");
$valLevelPermission = $_SESSION[$valSiteManage . "core_session_level"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>Manage Contant</title>
   </head>
   <body>
      <?
      if ($execute == "update") {
         $sql = "SELECT " . $mod_tb_root . "_subject FROM " . $mod_tb_root . "  WHERE  " . $mod_tb_root . "_id>=1 ";
         if (trim($_REQUEST['inputSubject']) != trim($_REQUEST['inputSubjectOld'])) {
            $sql .= " AND (" . $mod_tb_root . "_subject='" . trim($_REQUEST['inputSubject']) . "' AND " . $mod_tb_root . "_subject!='" . trim($_REQUEST['inputSubjectOld']) . "') ";
         } else {
            $sql .= " AND ( " . $mod_tb_root . "_subject='') ";
         }
         $query = wewebQueryDB($coreLanguageSQL, $sql);
         $count_record = wewebNumRowsDB($coreLanguageSQL, $query);
         if ($count_record >= 1) {
            ?>
            <script language="JavaScript" type="text/javascript">
               jQuery("#inputSubject").val('<?= trim($_REQUEST['inputSubjectOld']) ?>');
               jQuery("#inputSubject").focus();
               jQuery("#inputSubject").addClass("formInputContantTbAlertY");
               jQuery("#alert_inputSubject").show();
               jQuery("#alert_inputSubject").html("ไม่สามารถใช้ Key \"<?= trim($_REQUEST['inputSubject']) ?>\" นี้ได้");
            </script>
            <?
         } else {
            $update = array();

            if ($valLevelPermission == "SuperAdmin") {
               $update[] = $mod_tb_root . "_subject='" . changeQuot($_REQUEST['inputSubject']) . "'";
               $update[] = $mod_tb_root . "_inputtype='" . changeQuot($_REQUEST['inputTypeInput']) . "'";
            }
            $update[] = $mod_tb_root . "_title='" . changeQuot($_REQUEST['inputDescription']) . "'";

            if ($_REQUEST['inputTypeInput'] <= 0) {
               $update[] = $mod_tb_root . "_display='" . serialize($_POST["inputLang"]) . "'";
            }

            $update[] = $mod_tb_root . "_lastbyid='" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
            $update[] = $mod_tb_root . "_lastby='" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
            $update[] = $mod_tb_root . "_lastdate=NOW()";

            $sql = "UPDATE " . $mod_tb_root . " SET " . implode(",", $update) . " WHERE " . $mod_tb_root . "_id='" . $_POST["valEditID"] . "' ";
            // print_pre($sql);die;
            $Query = wewebQueryDB($coreLanguageSQL, $sql);
            ?>
            <script language="JavaScript" type="text/javascript">
               document.myFormAction.submit();
            </script>
            <?
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

   </body>
</html>
