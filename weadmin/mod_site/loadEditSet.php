<?php
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("../core/incLang.php");
include("incModLang.php");
include("config.php");

$valClassNav = 2;
$valNav1 = $langTxt["nav:home2"];
$valLinkNav1 = "../core/index.php";

$arrLang = $_SESSION[$valSiteManage . "core_session_multilang"];

$sql = "SELECT
" . $mod_tb_set . "_id as id,
" . $mod_tb_set . "_credate as credate,
" . $mod_tb_set . "_crebyid as crebyid,
" . $mod_tb_set . "_lastdate as lastdate,
" . $mod_tb_set . "_lastbyid as lastbyid,
" . $mod_tb_setlang . "_description as description,
" . $mod_tb_setlang . "_keywords as keywords,
" . $mod_tb_setlang . "_metatitle as metatitle,
" . $mod_tb_setlang . "_subject as subject,
" . $mod_tb_setlang . "_social as social,
" . $mod_tb_setlang . "_config as config,
" . $mod_tb_setlang . "_addresspic as addresspic,
" . $mod_tb_setlang . "_subjectoffice as subjectoffice,
" . $mod_tb_setlang . "_fac as fac,
" . $mod_tb_setlang . "_title as title

 FROM " . $mod_tb_set . " INNER JOIN " . $mod_tb_setlang . " ON " . $mod_tb_set . "_id = " . $mod_tb_setlang . "_containid
 WHERE " . $mod_tb_set . "_id='" . $_REQUEST["valEditID"] . "'  
 AND " . $mod_tb_set . "_masterkey='" . $_REQUEST["masterkey"] . "' 
 AND " . $mod_tb_setlang . "_id='" . $_REQUEST["valCid"] . "' 
 AND " . $mod_tb_setlang . "_language='" . $_REQUEST["inputLt"] . "'  ";

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
$valTitle = rechangeQuot($Row['title']);
$valTitle = $Row[$mod_tb_setlang . "_title"];
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

$valPermission = getUserPermissionOnMenu($_SESSION[$valSiteManage . "core_session_groupid"], $_POST["menukeyid"]);

$myRand = time() . rand(111, 999);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="robots" content="noindex, nofollow" />
    <meta name="googlebot" content="noindex, nofollow" />
    <link href="../css/theme.css" rel="stylesheet" />

    <title><?php echo  $core_name_title ?></title>
    <script language="JavaScript" type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
    <script language="JavaScript" type="text/javascript">
        function executeSubmit() {
            with(document.myForm) {

                if (isBlank(inputSubject)) {
                    inputSubject.focus();
                    jQuery("#inputSubject").addClass("formInputContantTbAlertY");
                    return false;
                } else {
                    jQuery("#inputSubject").removeClass("formInputContantTbAlertY");
                }


                if (isBlank(inputOffice)) {
                    inputOffice.focus();
                    jQuery("#inputOffice").addClass("formInputContantTbAlertY");
                    return false;
                } else {
                    jQuery("#inputOffice").removeClass("formInputContantTbAlertY");
                }

                if (isBlank(inputTagTitle)) {
                    inputTagTitle.focus();
                    jQuery("#inputTagTitle").addClass("formInputContantTbAlertY");
                    return false;
                } else {
                    jQuery("#inputTagTitle").removeClass("formInputContantTbAlertY");
                }
                if (isBlank(inputTagDescription)) {
                    inputTagDescription.focus();
                    jQuery("#inputTagDescription").addClass("formInputContantTbAlertY");
                    return false;
                } else {
                    jQuery("#inputTagDescription").removeClass("formInputContantTbAlertY");
                }

                if (isBlank(inputTagKeywords)) {
                    inputTagKeywords.focus();
                    jQuery("#inputTagKeywords").addClass("formInputContantTbAlertY");
                    return false;
                } else {
                    jQuery("#inputTagKeywords").removeClass("formInputContantTbAlertY");
                }

                // if (isBlank(socialFb)) {
                //     socialFb.focus();
                //     jQuery("#socialFb").addClass("formInputContantTbAlertY");
                //     return false;
                // } else {
                //     jQuery("#socialFb").removeClass("formInputContantTbAlertY");
                // }

                // if (isBlank(socialLk)) {
                //     socialLk.focus();
                //     jQuery("#socialLk").addClass("formInputContantTbAlertY");
                //     return false;
                // } else {
                //     jQuery("#socialLk").removeClass("formInputContantTbAlertY");
                // }


                // if (isBlank(socialYt)) {
                //     socialYt.focus();
                //     jQuery("#socialYt").addClass("formInputContantTbAlertY");
                //     return false;
                // } else {
                //     jQuery("#socialYt").removeClass("formInputContantTbAlertY");
                // }

                // if (isBlank(socialTw)) {
                //     socialTw.focus();
                //     jQuery("#socialTw").addClass("formInputContantTbAlertY");
                //     return false;
                // } else {
                //     jQuery("#socialTw").removeClass("formInputContantTbAlertY");
                // }

                if (isBlank(infoAddress)) {
                    infoAddress.focus();
                    jQuery("#infoAddress").addClass("formInputContantTbAlertY");
                    return false;
                } else {
                    jQuery("#infoAddress").removeClass("formInputContantTbAlertY");
                }

                if (isBlank(infoTel)) {
                    infoTel.focus();
                    jQuery("#infoTel").addClass("formInputContantTbAlertY");
                    return false;
                } else {
                    jQuery("#infoTel").removeClass("formInputContantTbAlertY");
                }

                if (isBlank(infoFax)) {
                    infoFax.focus();
                    jQuery("#infoFax").addClass("formInputContantTbAlertY");
                    return false;
                } else {
                    jQuery("#infoFax").removeClass("formInputContantTbAlertY");
                }

                if (isBlank(infoEmail)) {
                    infoEmail.focus();
                    jQuery("#infoEmail").addClass("formInputContantTbAlertY");
                    return false;
                } else {
                    jQuery("#infoEmail").removeClass("formInputContantTbAlertY");
                }

                if (isBlank(glati)) {
                    glati.focus();
                    jQuery("#glati").addClass("formInputContantTbAlertY");
                    return false;
                } else {
                    jQuery("#glati").removeClass("formInputContantTbAlertY");
                }

                if (isBlank(glongti)) {
                    glongti.focus();
                    jQuery("#glongti").addClass("formInputContantTbAlertY");
                    return false;
                } else {
                    jQuery("#glongti").removeClass("formInputContantTbAlertY");
                }
            }

            updateContactNew('updateSet.php');

        }
        jQuery(document).ready(function() {

            jQuery('#myForm').keypress(function(e) {
                /* Start  Enter Check CKeditor */
                var checkFocusTitle = jQuery("#infoAddress").is(":focus");
                var checkFocusTitleEn = jQuery("#inputTitleEn").is(":focus");

                if (e.which == 13) {
                    //e.preventDefault();
                    if (!checkFocusTitle) {
                        //										if(!checkFocusTitleEn){
                        executeSubmit();
                        return false;
                    }
                    //										}
                }
                /* End  Enter Check CKeditor */
            });
        });
    </script>
</head>

<body>
    <form action="?" method="get" name="myForm" id="myForm">
        <input name="execute" type="hidden" id="execute" value="update" />
        <input name="masterkey" type="hidden" id="masterkey" value="<?php echo  $_REQUEST['masterkey'] ?>" />
        <input name="menukeyid" type="hidden" id="menukeyid" value="<?php echo  $_REQUEST['menukeyid'] ?>" />
        <input name="inputSearch" type="hidden" id="inputSearch" value="<?php echo  $_REQUEST['inputSearch'] ?>" />
        <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php echo  $_REQUEST['module_pageshow'] ?>" />
        <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php echo  $_REQUEST['module_pagesize'] ?>" />
        <input name="module_orderby" type="hidden" id="module_orderby" value="<?php echo  $_REQUEST['module_orderby'] ?>" />
        <input name="inputGh" type="hidden" id="inputGh" value="<?php echo  $_REQUEST['inputGh'] ?>" />
        <input name="valEditID" type="hidden" id="valEditID" value="<?php echo  $_REQUEST['valEditID'] ?>" />
        <input name="valDelFile" type="hidden" id="valDelFile" value="" />
        <input name="inputHtml" type="hidden" id="inputHtml" value="" />
        <input name="keyfile" type="hidden" id="keyfile" value="" />
        <input name="inputHtmlDel" type="hidden" id="inputHtmlDel" value="<?php echo  $valhtmlname ?>" />
        <input name="inputLt" type="hidden" id="inputLt" value="<?php echo  $_REQUEST['inputLt'] ?>" />
        <div class="divRightNav">
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr>
                    <td class="divRightNavTb" align="left" id="defTop"><span class="fontContantTbNav"><a href="<?php echo  $valLinkNav1 ?>" target="_self"><?php echo  $valNav1 ?></a> <img src="../img/btn/navblack.png" align="absmiddle" vspace="5" /> <a href="javascript:void(0)" onclick="btnBackPage('set.php')" target="_self"><?php echo  getNameMenu($_REQUEST["menukeyid"]) ?></a> <img src="../img/btn/navblack.png" align="absmiddle" vspace="5" /> <?php echo  $langMod["txt:titleedit"] ?></span></td>
                    <td class="divRightNavTb" align="right"></td>
                </tr>
            </table>
        </div>
        <div class="divRightHead">
            <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center">
                <tr>
                    <td height="77" align="left"><span class="fontHeadRight"><?php echo  $langMod["txt:titleedit"] ?></span></td>
                    <td align="left">
                        <table border="0" cellspacing="0" cellpadding="0" align="right">
                            <tr>
                                <td align="right">
                                    <?php if ($valPermission == "RW") { ?>
                                        <div class="btnSave" title="<?php echo  $langTxt["btn:save"] ?>" onclick="executeSubmit();"></div>
                                    <?php } ?>
                                    <div class="btnBack" title="<?php echo  $langTxt["btn:back"] ?>" onclick="btnBackPage('set.php')"></div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
        <div class="divRightMain">
            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo  $langMod["txt:about"] ?>
                            <!-- (<?php echo  $langTxt["lg:thai"] ?>) -->
                        </span><br />
                        <span class="formFontTileTxt"><?php echo  $langMod["txt:aboutDe"] ?>
                            <!-- (<?php echo  $langTxt["lg:thai"] ?>) -->
                        </span>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="top" height="15"></td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["ab:subject"] ?>
                        <!-- (<?php echo  $langTxt["lg:thai"] ?>) --> <span class="fontContantAlert">*</span>
                    </td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputSubject" id="inputSubject" type="text" class="formInputContantTb" value="<?php echo  $valSubject ?>" /></td>
                </tr>


                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["txt:titleOffice"] ?>
                        <!-- (<?php echo  $langTxt["lg:thai"] ?>) --> <span class="fontContantAlert">*</span>
                    </td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputOffice" id="inputOffice" type="text" class="formInputContantTb" value="<?php echo  $valSubjectOffice ?>" /></td>
                </tr>
            </table>
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder " style="display:none;">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo  $langMod["txt:about"] ?>
                            <!-- (<?php echo  $langTxt["lg:eng"] ?>) -->
                        </span><br />
                        <span class="formFontTileTxt"><?php echo  $langMod["txt:aboutDe"] ?>
                            <!-- (<?php echo  $langTxt["lg:thai"] ?>) -->
                        </span>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="top" height="15"></td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["ab:subject"] ?>
                        <!-- (<?php echo  $langTxt["lg:eng"] ?>) --> <span class="fontContantAlert">*</span>
                    </td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputSubjecten" id="inputSubjecten" type="text" class="formInputContantTb" value="<?php echo  $valSubjecten ?>" /></td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["ab:office"] ?>
                        <!-- (<?php echo  $langTxt["lg:eng"] ?>) --> <span class="fontContantAlert">*</span>
                    </td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputOfficeen" id="inputOfficeen" type="text" class="formInputContantTb" value="<?php echo  $valSubjectOfficeen ?>" /></td>
                </tr>

            </table>
            <!-- ###### START TEXT FRONT WEBSIDE EDIT ###### -->
            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo  $langMod["txt:seo"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo  $langMod["txt:seoDe"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="top" height="15"></td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["inp:seotitle"] ?><span class="fontContantAlert">*</span>
                    </td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputTagTitle" id="inputTagTitle" type="text" class="formInputContantTb" value="<?php echo  $valMetatitle ?>" /><br />
                        <span class="formFontNoteTxt"><?php echo  $langMod["inp:seotitlenote"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["inp:seodes"] ?><span class="fontContantAlert">*</span>
                    </td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputTagDescription" id="inputTagDescription" type="text" class="formInputContantTb" value="<?php echo  $valDescription ?>" /><br />
                        <span class="formFontNoteTxt"><?php echo  $langMod["inp:seodesnote"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["inp:seokey"] ?><span class="fontContantAlert">*</span>
                    </td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputTagKeywords" id="inputTagKeywords" type="text" class="formInputContantTb" value="<?php echo  $valKeywords ?>" /><br />
                        <span class="formFontNoteTxt"><?php echo  $langMod["inp:seokeynote"] ?></span>
                    </td>
                </tr>
            </table>
            <br />
            <!-- add social media by nut -->
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo  $langMod["txt:setSocial"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo  $langMod["txt:setSocialDe"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="top" height="15"></td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["info:emailInfo"]; ?><span class="fontContantAlert"> </span></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb"><input name="social[<?php echo  $langMod["social:tel"] ?>][link]" id="socialIg" type="text" class="formInputContantTb" value="<?php echo  $ValSocial[$langMod["social:tel"]]['link'] ?>" /><br />
                        <span class="formFontNoteTxt"><?php echo  $langMod["info:telde"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["social:fb"] ?> <?php echo  $langMod['social:link']; ?><span class="fontContantAlert"> </span></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb"><input name="social[<?php echo  $langMod["social:fb"] ?>][link]" id="socialFb" type="text" class="formInputContantTb" value="<?php echo  $ValSocial[$langMod["social:fb"]]['link'] ?>" /><br />
                        <span class="formFontNoteTxt"><?php echo  $langMod["social:note"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["social:tw"] ?> <?php echo  $langMod['social:link']; ?><span class="fontContantAlert"> </span></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb"><input name="social[<?php echo $langMod["social:tw"] ?>][link]" id="socialTw" type="text" class="formInputContantTb" value="<?php echo $ValSocial[$langMod["social:tw"]]['link'] ?>" /><br />
                        <span class="formFontNoteTxt"><?php echo  $langMod["social:note"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["social:yt"] ?> <?php echo  $langMod['social:link']; ?><span class="fontContantAlert"> </span></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb"><input name="social[<?php echo $langMod["social:yt"] ?>][link]" id="socialYt" type="text" class="formInputContantTb" value="<?php echo $ValSocial[$langMod["social:yt"]]['link'] ?>" /><br />
                        <span class="formFontNoteTxt"><?php echo  $langMod["social:note"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["social:li"] ?> <?php echo  $langMod['social:link']; ?><span class="fontContantAlert"></span></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb"><input name="social[<?php echo  $langMod["social:li"] ?>][link]" id="socialLi" type="text" class="formInputContantTb" value="<?php echo  $ValSocial[$langMod["social:li"]]['link'] ?>" /><br />
                        <span class="formFontNoteTxt"><?php echo  $langMod["social:note"] ?></span>
                    </td>
                </tr>
            </table>
            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo  $langMod["info:title"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo  $langMod["info:titlede"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="top" height="15"></td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo  $langMod['info:address']; ?>
                        <span class="fontContantAlert">*</span>
                    </td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <textarea name="info[address]" id="infoAddress" cols="45" rows="5" class="formTextareaContantTb"><?php echo  trim($ValConfig['address']) ?></textarea>
                        <br />
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["info:tel"] ?><span class="fontContantAlert">*</span></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <input class="formInputContantTb" name="info[tel]" id="infoTel" value="<?php echo  $ValConfig['tel'] ?>" /><br />
                        <span class="formFontNoteTxt"><?php echo  $langMod["info:telde"] ?></span>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["info:fax"] ?><span class="fontContantAlert">*</span></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <input class="formInputContantTb" name="info[fax]" id="infoFax" value="<?php echo  $ValConfig['fax'] ?>" /> <br />
                        <span class="formFontNoteTxt"><?php echo  $langMod["info:faxde"] ?></span>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["info:email"] ?><span class="fontContantAlert">*</span></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <input class="formInputContantTb" name="info[email]" id="infoEmail" value="<?php echo  $ValConfig['email'] ?>" /> <br />
                        <span class="formFontNoteTxt"><?php echo  $langMod["info:emailde"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo  $langMod['info:latiture'] ?>
                        <span class="fontContantAlert">*</span>
                    </td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <input name="info[glati]" id="glati" value="<?php echo  $ValConfig['glati'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo  $langMod['info:longtiture'] ?><span class="fontContantAlert">*</span>
                    </td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <input name="info[glongti]" id="glongti" value="<?php echo  $ValConfig['glongti'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["info:picaddress"] ?></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="file-input-wrapper">
                            <button class="btn-file-input"><?php echo $langTxt["us:inputpicselect"] ?></button>
                            <input type="file" name="fileToUpload" id="fileToUpload" onchange="ajaxFileUpload_mul('#picname', 'loadInsertPic.php', 'fileToUpload', '#boxPicNew');" />
                        </div>

                        <span class="formFontNoteTxt"><?php echo $langMod["inp:notepic"] ?></span>
                        <div class="clearAll"></div>
                        <div id="boxPicNew" class="formFontTileTxt">
                            <? if (is_file($valPic)) { ?>
                                <img src="<?= $valPic ?>"  style="float:left;border:#c8c7cc solid 1px;max-width:650px;"   />
                                <div style="width:22px; height:22px;float:left;z-index:1; margin-left:-22px;cursor:pointer;" onclick="delPicUpload('deletePic.php')"  title="Delete file" ><img src="../img/btn/delete.png" width="22" height="22"  border="0"/></div>
                                <input type="hidden" name="picname" id="picname" value="<?= $valPicName ?>" />
                            <? } ?>
                        </div>
                    </td>
                </tr>
            </table>
            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr>
                    <td colspan="7" align="right" valign="top" height="20"></td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="middle" class="formEndContantTb"><a href="#defTop" title="<?php echo  $langTxt["btn:gototop"] ?>"><?php echo  $langTxt["btn:gototop"] ?> <img src="../img/btn/top.png" align="absmiddle" /></a></td>
                </tr>
            </table>
        </div>
    </form>
    <?php include("../lib/disconnect.php"); ?>
    <script type="text/javascript" src="../js/ajaxfileupload.js"></script>
    <script type="text/javascript" language="javascript">
        /*################################# Upload multi #######################*/
        function ajaxFileUpload_mul(inputID, filename, eleID, classID, keyID) {
            var valuepicname = jQuery(inputID).val();

            jQuery.blockUI({
                message: jQuery('#tallContent'),
                css: {
                    border: 'none',
                    padding: '35px',
                    backgroundColor: '#000',
                    '-webkit-border-radius': '10px',
                    '-moz-border-radius': '10px',
                    opacity: .9,
                    color: '#fff'
                }
            });

            jQuery.ajaxFileUpload({
                url: filename + '?myID=<?php echo $myRand ?>&masterkey=<?php echo $_REQUEST['masterkey'] ?>&langt=<?php echo $_REQUEST['inputLt'] ?>&delpicname=' + valuepicname + '&menuid=<?php echo $_REQUEST['menukeyid'] ?>',
                secureuri: false,
                fileElementId: eleID,
                dataType: 'json',
                success: function(data, status) {
                    if (typeof(data.error) != 'undefined') {

                        if (data.error != '') {
                            alert(data.error);

                        } else {
                            jQuery(classID).show();
                            jQuery(classID).html(data.msg);
                            setTimeout(jQuery.unblockUI, 200);
                        }
                    }
                },
                error: function(data, status, e) {
                    alert(e);
                }
            })
            return false;
        }
    </script>
</body>

</html>