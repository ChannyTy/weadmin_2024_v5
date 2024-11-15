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
            $updatemain = array();
            $updatemain[] = $mod_tb_set . "_lastbyid='" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
            $updatemain[] = $mod_tb_set . "_lastby='" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
            $updatemain[] = $mod_tb_set . "_lastdate=NOW()";

            $sql = "UPDATE " . $mod_tb_set . " SET " . implode(",", $updatemain) . " WHERE " . $mod_tb_set . "_id='" . $_POST["valEditID"] . "' ";
            $Query=wewebQueryDB($coreLanguageSQL,$sql);

            $sqlcheck = "SELECT " . $mod_tb_setlang . "_id FROM " . $mod_tb_setlang . " WHERE " . $mod_tb_setlang . "_language = '" . $_REQUEST['inputLt'] . "' AND " . $mod_tb_setlang . "_containid = '" . $_POST["valEditID"] . "'";
            $Querycheck = wewebQueryDB($coreLanguageSQL, $sqlcheck);
            $count_check = wewebNumRowsDB($coreLanguageSQL, $Querycheck);
            if ($count_check > 0) {
                $update=array();
                $update[] = $mod_tb_setlang . "_metatitle='" . changeQuot($_POST['inputTagTitle']) . "'";
                $update[] = $mod_tb_setlang . "_description  	='" . changeQuot($_POST['inputTagDescription']) . "'";
                $update[] = $mod_tb_setlang . "_keywords  	='" . changeQuot($_POST['inputTagKeywords']) . "'";
                $update[] = $mod_tb_setlang . "_subject='" . changeQuot($_POST['inputSubject']) . "'";
                $update[] = $mod_tb_setlang . "_subjectoffice  	='" . changeQuot($_POST['inputOffice']) . "'";
                $update[] = $mod_tb_setlang . "_social  	='" . serialize($_POST['social']) . "'";
                $update[] = $mod_tb_setlang . "_config  	='" . serialize($_POST['info']) . "'"; 
                $update[] = $mod_tb_setlang . "_fac  	='" . serialize($_POST['inputfaction']) . "'";
                $update[] = $mod_tb_setlang . "_addresspic  	='" . $_POST['picname'] . "'";
                $sql = "UPDATE " . $mod_tb_setlang . " SET " . implode(",", $update) . " WHERE " . $mod_tb_setlang . "_containid='" . $_POST["valEditID"] . "' AND  " . $mod_tb_setlang . "_language='" . $_REQUEST['inputLt'] ."'";
                $Query=wewebQueryDB($coreLanguageSQL,$sql);
            }else{
                $insertlang = array();
                $insertlang[$mod_tb_setlang . "_containid"] = "'" . $_POST["valEditID"] . "'";
                $insertlang[$mod_tb_setlang . "_language"] = "'" . $_REQUEST['inputLt'] . "'";
                $insertlang[$mod_tb_setlang . "_masterkey"] = "'" . $_REQUEST["masterkey"] . "'";
                $insertlang[$mod_tb_setlang . "_metatitle"] = "'" . changeQuot($_POST['inputTagTitle']) . "'";
                $insertlang[$mod_tb_setlang . "_description"] = "'" . changeQuot($_POST['inputTagDescription']) . "'";
                $insertlang[$mod_tb_setlang . "_keywords"] = "'" . changeQuot($_POST['inputTagKeywords']) . "'";
                $insertlang[$mod_tb_setlang . "_subject"] = "'" . changeQuot($_POST['inputSubject']) . "'";
                $insertlang[$mod_tb_setlang . "_subjectoffice"] = "'" . changeQuot($_POST['inputOffice']) . "'";
                $insertlang[$mod_tb_setlang . "_social"] = "'" . serialize($_POST['social']) . "'";
                $insertlang[$mod_tb_setlang . "_config"] = "'" . serialize($_POST['info']) . "'";
                $insertlang[$mod_tb_setlang . "_fac"] = "'" . serialize($_POST['inputfaction']) . "'";
                $insertlang[$mod_tb_setlang . "_addresspic"] = "'" . $_POST['picname'] . "'";
                $sqlInsert = "INSERT INTO " . $mod_tb_setlang . "(" . implode(",", array_keys($insertlang)) . ") VALUES (" . implode(",", array_values($insertlang)) . ")";
                $queryInsert = wewebQueryDB($coreLanguageSQL, $sqlInsert);
            }

            logs_access('3', 'Update Group');
            ?>
        <?php } ?>
        <?php include("../lib/disconnect.php"); ?>
        <form action="set.php" method="post" name="myFormAction" id="myFormAction">
            <input name="masterkey" type="hidden" id="masterkey" value="<?php echo  $_REQUEST['masterkey'] ?>" />
            <input name="menukeyid" type="hidden" id="menukeyid" value="<?php echo  $_REQUEST['menukeyid'] ?>" />
            <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php echo  $_REQUEST['module_pageshow'] ?>" />
            <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php echo  $_REQUEST['module_pagesize'] ?>" />
            <input name="module_orderby" type="hidden" id="module_orderby" value="<?php echo  $_REQUEST['module_orderby'] ?>" />
            <input name="inputSearch" type="hidden" id="inputSearch" value="<?php echo  $_REQUEST['inputSearch'] ?>" />
            <input name="inputLang" type="hidden" id="inputLang" value="<?php echo  $_REQUEST['inputLt'] ?>" />
        </form>
        <script language="JavaScript" type="text/javascript"> document.myFormAction.submit();</script>
    </body></html>
