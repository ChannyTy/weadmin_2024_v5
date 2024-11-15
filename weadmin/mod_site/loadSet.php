<?php
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../core/incLang.php");
include("incModLang.php");
include("config.php");

$arrLang = $_SESSION[$valSiteManage . "core_session_multilang"];
$langShow = $_POST['inputLang'] ? $_POST['inputLang'] : $_SESSION[$valSiteManage . "core_session_language"];

$valClassNav = 2;
$valNav1 = $langTxt["nav:home2"];
$valLinkNav1 = "../core/index.php";

$sqlCheck = "SELECT " . $mod_tb_set . "_id   FROM " . $mod_tb_set . " WHERE " . $mod_tb_set . "_masterkey='" . $_REQUEST["masterkey"] . "'  ";
$queryCheck = wewebQueryDB($coreLanguageSQL, $sqlCheck);
$countNumCheck = wewebNumRowsDB($coreLanguageSQL, $queryCheck);

if ($countNumCheck <= 0) {
    $insert = array();
    $insert[$mod_tb_set . "_language"] = "'" . $_SESSION[$valSiteManage . 'core_session_language'] . "'";
    $insert[$mod_tb_set . "_masterkey"] = "'" . $_REQUEST["masterkey"] . "'";
    $insert[$mod_tb_set . "_crebyid"] = "'" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
    $insert[$mod_tb_set . "_creby"] = "'" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
    $insert[$mod_tb_set . "_lastbyid"] = "'" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
    $insert[$mod_tb_set . "_lastby"] = "'" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
    $insert[$mod_tb_set . "_lastdate"] = "NOW()";
    $insert[$mod_tb_set . "_credate"] = "NOW()";
    $sqlInsert = "INSERT INTO " . $mod_tb_set . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
    $queryInsert = wewebQueryDB($coreLanguageSQL, $sqlInsert);
    $contantID = wewebInsertID($coreLanguageSQL);
}else{
    $contantID = $queryCheck->fields[0];
}
if ($contantID > 0) {
    foreach ($arrLang as $keyLang => $valueLang) {
        $sqlcheck = "SELECT " . $mod_tb_setlang . "_id FROM " . $mod_tb_setlang . " WHERE " . $mod_tb_setlang . "_language = '" . $valueLang['key'] . "' AND " . $mod_tb_setlang . "_containid = '" . $contantID . "'";
        $Querycheck = wewebQueryDB($coreLanguageSQL, $sqlcheck);
        $count_check = wewebNumRowsDB($coreLanguageSQL, $Querycheck);
        if ($count_check == 0) {
            $insertlang = array();
            $insertlang[$mod_tb_setlang . "_containid"] = "'" . $contantID . "'";
            $insertlang[$mod_tb_setlang . "_language"] = "'" . $valueLang['key'] . "'";
            $insertlang[$mod_tb_setlang . "_masterkey"] = "'" . $_REQUEST["masterkey"] . "'";
            $sqlInsert = "INSERT INTO " . $mod_tb_setlang . "(" . implode(",", array_keys($insertlang)) . ") VALUES (" . implode(",", array_values($insertlang)) . ")";
            $queryInsert = wewebQueryDB($coreLanguageSQL, $sqlInsert);
        }
    }
}

$sql = "SELECT
" . $mod_tb_set . "_id as id,
" . $mod_tb_set . "_credate as credate,
" . $mod_tb_set . "_crebyid as crebyid,
" . $mod_tb_set . "_lastdate as lastdate,
" . $mod_tb_set . "_lastbyid as lastbyid,
" . $mod_tb_setlang . "_id as cid,
" . $mod_tb_setlang . "_description as description,
" . $mod_tb_setlang . "_keywords as keywords,
" . $mod_tb_setlang . "_metatitle as metatitle,
" . $mod_tb_setlang . "_subject as subject,
" . $mod_tb_setlang . "_social as social,
" . $mod_tb_setlang . "_config as config,
" . $mod_tb_setlang . "_addresspic as addresspic,
" . $mod_tb_setlang . "_subjectoffice as subjectoffice,
" . $mod_tb_setlang . "_fac as fac,
" . $mod_tb_setlang . "_title as title,
" . $mod_tb_setlang . "_language as language

 FROM " . $mod_tb_set . " 
 LEFT JOIN " . $mod_tb_setlang . " ON " . $mod_tb_set . "_id = " . $mod_tb_setlang . "_containid
 WHERE " . $mod_tb_set . "_masterkey='" . $_REQUEST["masterkey"] . "'  
 AND " . $mod_tb_setlang . "_language='" . $langShow . "'  ";
$Query = wewebQueryDB($coreLanguageSQL, $sql);
$Row = wewebFetchArrayDB($coreLanguageSQL, $Query);

$valID = $Row['id'];
$valCredate = DateFormat($Row['credate']);
$valCreby = $Row['crebyid'];
$valLastdate = DateFormat($Row['lastdate']);
$valLastby = $Row['lastbyid'];
$valDescription = rechangeQuot($Row['description']);
$valKeywords = rechangeQuot($Row['keywords']);
$valMetatitle = rechangeQuot($Row['metatitle']);
$valSubject = $Row['subject'];
$valCID = $Row['cid'];

$valTitle = rechangeQuot($Row['title']);
$ValSocial = unserialize($Row['social']);
$ValConfig = unserialize($Row['config']);
$valSubjectOffice = rechangeQuot($Row['subjectoffice']);
$ValFac2 = unserialize($Row['fac']);

foreach ($ValFac2 as $key => $value4) {
    foreach ($value4 as $keyinner4 => $valueinner4) {
        $ValFac[$keyinner4][$key] = $valueinner4;
    }
}
$valPicName = $Row['addresspic'];
$valPic = $mod_path_pictures . "/" . $Row['addresspic'];

$valPermission = getUserPermissionOnMenu($_SESSION[$valSiteManage . "core_session_groupid"], $_REQUEST["menukeyid"]);
logs_access('3', 'View');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="robots" content="noindex, nofollow" />
    <meta name="googlebot" content="noindex, nofollow" />
    <link href="../css/theme.css" rel="stylesheet" />

    <title><?php echo $core_name_title ?></title>
    <script language="JavaScript" type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
</head>

<body>
    <form action="?" method="get" name="myForm" id="myForm">
        <input name="execute" type="hidden" id="execute" value="update" />
        <input name="masterkey" type="hidden" id="masterkey" value="<?php echo $_REQUEST['masterkey'] ?>" />
        <input name="menukeyid" type="hidden" id="menukeyid" value="<?php echo $_REQUEST['menukeyid'] ?>" />
        <input name="inputSearch" type="hidden" id="inputSearch" value="<?php echo $_REQUEST['inputSearch'] ?>" />
        <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php echo $_REQUEST['module_pageshow'] ?>" />
        <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php echo $_REQUEST['module_pagesize'] ?>" />
        <input name="module_orderby" type="hidden" id="module_orderby" value="<?php echo $_REQUEST['module_orderby'] ?>" />
        <input name="inputGh" type="hidden" id="inputGh" value="<?php echo $_REQUEST['inputGh'] ?>" />
        <input name="valEditID" type="hidden" id="valEditID" value="<?php echo $_REQUEST['valEditID'] ?>" />
        <input name="inputLt" type="hidden" id="inputLt" value="<?= $_REQUEST['inputLt'] ?>" />
        <?php if ($_REQUEST['viewID'] <= 0) { ?>
            <div class="divRightNav">
                <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
                    <tr>
                        <td class="divRightNavTb" align="left" id="defTop"><span class="fontContantTbNav"><a href="<?php echo $valLinkNav1 ?>" target="_self"><?php echo $valNav1 ?></a><img src="../img/btn/navblack.png" align="absmiddle" vspace="5" /> <?php echo getNameMenu($_REQUEST["menukeyid"]) ?>(<?php echo $langShow; ?>)</span></td>
                        <td class="divRightNavTb" align="right">

                        </td>
                    </tr>
                </table>
            </div>
        <?php } ?>
        <div class="divRightHead">
            <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center">
                <tr>
                    <td height="77" align="left"><span class="fontHeadRight"><?php echo getNameMenu($_REQUEST["menukeyid"]) ?>(<?php echo $langShow; ?>)</span></td>
                    <td align="left">
                        <table border="0" cellspacing="0" cellpadding="0" align="right">
                            <tr>
                                <td align="right">
                                    <?php if ($valPermission == "RW" && $_REQUEST['viewID'] <= 0) { ?>

                                        <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="center">
                                                    <table align="center" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td align="right">
                                                                <select name="inputLang" id="inputLang" class="formSelectSearchStyle" onchange="document.myForm.submit();">
                                                                    <?php
                                                                    foreach ($arrLang as $keyLang => $valueLang) {
                                                                    ?>
                                                                        <option value="<?php echo $valueLang['key']; ?>" <?php if ($langShow == $valueLang['key']) {
                                                                                                                                echo "selected";
                                                                                                                            } ?>><?php echo $valueLang['key']; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                            <td align="center">
                                                                <div class="btnEditView" title="<?php echo $langTxt["btn:edit"] ?>" onclick="
                                                                                document.myFormHome.valEditID.value ='<?php echo $valID ?>';
                                                                                document.myFormHome.valCid.value ='<?php echo $valCID ?>';
                                                                                document.myFormHome.inputLt.value ='<?php echo $langShow ?>';
                                                                                editContactNew('../<?php echo $mod_fd_root ?>/editSet.php')"></div>
                                                            </td>
                                                        </tr>
                                                    </table>

                                                </td>
                                            </tr>
                                        </table>

                                    <?php } ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
        <div class="divRightMain">
            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom" style="padding-top:10px;">
                        <span class="formFontSubjectTxt"><?php echo $langMod["txt:about"] ?>
                        </span><br />
                        <span class="formFontTileTxt"><?php echo $langMod["txt:aboutDe"] ?>
                        </span>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["ab:subject"] ?> :<span class="fontContantAlert"></span>
                    </td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valSubject ?></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["txt:titleOffice"] ?> :<span class="fontContantAlert"></span>
                    </td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valSubjectOffice ?></div>
                    </td>
                </tr>
            </table>
            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom" style="padding-top:10px;">
                        <span class="formFontSubjectTxt"><?php echo $langMod["txt:set"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo $langMod["txt:setDe"] ?></span>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["inp:seotitle"] ?> :<span class="fontContantAlert"></span>
                    </td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valMetatitle ?></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["inp:seodes"] ?> :<span class="fontContantAlert"></span>
                    </td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valDescription ?></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["inp:seokey"] ?> :<span class="fontContantAlert"></span>
                    </td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valKeywords ?></div>
                    </td>
                </tr>
            </table>
            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom" style="padding-top:10px;">
                        <span class="formFontSubjectTxt"><?php echo $langMod["txt:setSocial"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo $langMod["txt:setSocialDe"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["info:emailInfo"] ?> :<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $ValSocial[$langMod["social:tel"]]['link'] ?></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["social:fb"] ?> :<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><a href="<?php echo $ValSocial[$langMod["social:fb"]]['link'] ?>" target="_blank"><?php echo $ValSocial[$langMod["social:fb"]]['link'] ?></a></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["social:tw"] ?> :<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><a href="<?php echo $ValSocial[$langMod["social:tw"]]['link'] ?>" target="_blank"><?php echo $ValSocial[$langMod["social:tw"]]['link'] ?></a></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["social:yt"] ?> :<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><a href="<?php echo $ValSocial[$langMod["social:yt"]]['link'] ?>" target="_blank"><?php echo $ValSocial[$langMod["social:yt"]]['link'] ?></a></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["social:li"] ?> :<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><a href="<?php echo $ValSocial[$langMod["social:li"]]['link'] ?>" target="_blank"><?php echo $ValSocial[$langMod["social:li"]]['link'] ?></a></div>
                    </td>
                </tr>
            </table>
            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom" style="padding-top:10px;">
                        <span class="formFontSubjectTxt"><?php echo $langMod["info:title"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo $langMod["info:titlede"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["info:address"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo nl2br($ValConfig['address']) ?></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["info:tel"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $ValConfig['tel'] ?></div>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["info:fax"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $ValConfig['fax'] ?></div>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["info:email"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $ValConfig['email'] ?></div>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["info:googlemap"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                        <div class="formDivView">
                            [ <?php echo $ValConfig['glati'] ?> , <?php echo $ValConfig['glongti'] ?> ] <br/>
                            <iframe width="80%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=<?php echo $ValConfig['glati'] ?>,<?php echo $ValConfig['glongti'] ?>&hl=es;z=20&amp;output=embed"></iframe>
                            <br />
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["info:picaddress"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView">
                            <img src="<?= $valPic ?>" style="float:left;border:#c8c7cc solid 1px; max-width:600px;" onerror="this.src='<?= "../img/btn/nopic.jpg" ?>'" />
                        </div>
                    </td>
                </tr>
            </table>
            <br>

            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo $langTxt["us:titleinfo"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo $langTxt["us:titleinfoDe"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langTxt["us:credate"] ?>:</td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valCredate ?></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langTxt["us:creby"] ?>:</td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView">
                            <?php
                            if ($_SESSION[$valSiteManage . 'core_session_language'] == "Thai") {
                                echo getUserThai($valCreby);
                            } else if ($_SESSION[$valSiteManage . 'core_session_language'] == "Eng") {
                                echo getUserEng($valCreby);
                            }
                            ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langTxt["us:lastdate"] ?>:</td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valLastdate ?></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langTxt["us:creby"] ?>:</td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView">
                            <?php
                            if ($_SESSION[$valSiteManage . 'core_session_language'] == "Thai") {
                                echo getUserThai($valLastby);
                            } else if ($_SESSION[$valSiteManage . 'core_session_language'] == "Eng") {
                                echo getUserEng($valLastby);
                            }
                            ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="top" height="20"></td>
                </tr>
            </table>
            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
                <?php if ($_REQUEST['viewID'] <= 0) { ?>
                    <tr>
                        <td colspan="7" align="right" valign="middle" class="formEndContantTb"><a href="#defTop" title="<?php echo $langTxt["btn:gototop"] ?>"><?php echo $langTxt["btn:gototop"] ?> <img src="../img/btn/top.png" align="absmiddle" /></a></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </form>
    <?php include("../lib/disconnect.php"); ?>
</body>

</html>