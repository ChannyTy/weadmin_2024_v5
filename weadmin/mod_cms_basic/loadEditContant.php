<?
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("../core/incLang.php");
include("config.php");
include("incModLang.php");

$valClassNav = 2;
$valNav1 = $langTxt["nav:home2"];
$valLinkNav1 = "../core/index.php";
$myRand = randomNameUpdate(2);
$sql = "SELECT   ";
$sql .= "
" . $mod_tb_root . "_id ,
" . $mod_tb_root . "_credate ,
" . $mod_tb_root . "_crebyid,
" . $mod_tb_root . "_status,
" . $mod_tb_root . "_sdate  	 	 ,
" . $mod_tb_root . "_edate  ,
" . $mod_tb_root_lang . "_subject   ,
" . $mod_tb_root_lang . "_htmlfilename   ,
" . $mod_tb_root_lang . "_metatitle  	 	 ,
" . $mod_tb_root_lang . "_description  	 	 ,
" . $mod_tb_root_lang . "_keywords   ,
" . $mod_tb_root_lang . "_id," . $mod_tb_root . "_icon AS icon  ";
$sql .= " FROM " . $mod_tb_root . "
INNER JOIN " . $mod_tb_root_lang . "
ON  " . $mod_tb_root . " ." . $mod_tb_root . "_id = " . $mod_tb_root_lang . "." . $mod_tb_root_lang . "_cid
WHERE " . $mod_tb_root . "_masterkey='" . $_POST["masterkey"] . "' AND  " . $mod_tb_root . "_id 	='" . $_POST["valEditID"] . "' AND " . $mod_tb_root_lang . "_language 	='" . $_REQUEST['inputLt'] . "'";

$Query = wewebQueryDB($coreLanguageSQL, $sql);
$Row = wewebFetchArrayDB($coreLanguageSQL, $Query);
$count_row = wewebNumRowsDB($coreLanguageSQL, $Query);
$valid = $Row[0];
$valcredate = DateFormatInsertRe($Row[1]);
$valcreby = $Row[2];
$valstatus = $Row[3];
if ($Row[4] != "0000-00-00 00:00:00") {
   $valSdate = DateFormatInsertRe($Row[4]);
}
if ($Row[5] != "0000-00-00 00:00:00") {
   $valEdate = DateFormatInsertRe($Row[5]);
}
$valSubject = rechangeQuot($Row[6]);
$valhtml = $mod_path_html . "/" . $Row[7];
$valhtmlname = $Row[7];
$valMetatitle = rechangeQuot($Row[8]);
$valDescription = rechangeQuot($Row[9]);
$valKeywords = rechangeQuot($Row[10]);
$valSGid = $Row[11];
if (!empty($valSGid)) {
   $valcid = $valSGid;
} else {
   $valcid = $myRand;
}

$valPicName = $Row["icon"];
$valPic = $mod_path_pictures . "/" . $Row["icon"];
$valPermission = getUserPermissionOnMenu($_SESSION[$valSiteManage . "core_session_groupid"], $_POST["menukeyid"]);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <meta name="robots" content="noindex, nofollow">
   <meta name="googlebot" content="noindex, nofollow">
   <link href="../css/theme.css" rel="stylesheet" />
   <title><?= $core_name_title ?></title>
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

            var alleditDetail = CKEDITOR.instances.editDetail.getData();
            if (alleditDetail == "") {
               jQuery("#inputEditHTML").addClass("formInputContantTbAlertY");
               window.location.hash = '#inputEditHTML';
               return false;
            } else {
               jQuery("#inputEditHTML").removeClass("formInputContantTbAlertY");
            }
            jQuery('#inputHtml').val(alleditDetail);
         }
         updateContactNew('updateContant.php');
      }

      jQuery(document).ready(function() {
         jQuery('#myForm').keypress(function(e) {
            /* Start  Enter Check CKeditor */
            var focusManager = new CKEDITOR.focusManager(editDetail);
            var checkFocus = CKEDITOR.instances.editDetail.focusManager.hasFocus;
            var checkFocusTitle = jQuery("#inputDescription").is(":focus");

            if (e.which == 13) {
               //e.preventDefault();
               if (!checkFocusTitle) {
                  if (!checkFocus) {
                     executeSubmit();
                     return false;
                  }
               }
            }
            /* End  Enter Check CKeditor */
         });
      });
   </script>
</head>

<body>
   <form action="?" method="get" name="myForm" id="myForm" enctype="multipart/form-data">
      <input name="execute" type="hidden" id="execute" value="update" />
      <input name="masterkey" type="hidden" id="masterkey" value="<?= $_REQUEST['masterkey'] ?>" />
      <input name="menukeyid" type="hidden" id="menukeyid" value="<?= $_REQUEST['menukeyid'] ?>" />
      <input name="inputSearch" type="hidden" id="inputSearch" value="<?= $_REQUEST['inputSearch'] ?>" />
      <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?= $_REQUEST['module_pageshow'] ?>" />
      <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?= $_REQUEST['module_pagesize'] ?>" />
      <input name="module_orderby" type="hidden" id="module_orderby" value="<?= $_REQUEST['module_orderby'] ?>" />


      <input name="valEditID" type="hidden" id="valEditID" value="<?= $_REQUEST['valEditID'] ?>" />
      <input name="inputLt" type="hidden" id="inputLt" value="<?= $_REQUEST['inputLt'] ?>" />

      <input name="valDelFile" type="hidden" id="valDelFile" value="" />
      <input name="valDelAlbum" type="hidden" id="valDelAlbum" value="" />
      <input name="inputHtml" type="hidden" id="inputHtml" value="" />
      <input name="inputHtmlDel" type="hidden" id="inputHtmlDel" value="<?= $valhtmlname ?>" />
      <input name="valCid" type="hidden" id="valCid" value="<?= $valSGid ?>" />
      <input name="valrand" type="hidden" id="valrand" value="<?= $myRand ?>" />

      <?php include_once './inc-inputsearch.php'; ?>
      <div class="divRightNav">
         <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
            <tr>
               <td class="divRightNavTb" align="left" id="defTop"><span class="fontContantTbNav"><a href="<?= $valLinkNav1 ?>" target="_self"><?= $valNav1 ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a href="javascript:void(0)" onclick="btnBackPage('index.php')" target="_self"><?= $langMod["tit:inpName"] ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?= $langMod["txt:titleedit"] ?>(<?= $_REQUEST['inputLt'] ?>)</span></td>
            </tr>
         </table>
      </div>
      <div class="divRightHead">
         <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center">
            <tr>
               <td height="77" align="left"><span class="fontHeadRight"><?= $langMod["txt:titleedit"] ?>(<?= $_REQUEST['inputLt'] ?>)</span></td>
               <td align="left">
                  <table border="0" cellspacing="0" cellpadding="0" align="right">
                     <tr>
                        <td align="right">
                           <? if ($valPermission == "RW") { ?>
                              <div class="btnSave" title="<?= $langTxt["btn:save"] ?>" onclick="executeSubmit();"></div>
                           <? } ?>
                           <div class="btnBack" title="<?= $langTxt["btn:back"] ?>" onclick="btnBackPage('index.php')"></div>
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
                  <span class="formFontSubjectTxt"><?= $langMod["txt:subject"] ?></span><br />
                  <span class="formFontTileTxt"><?= $langMod["txt:subjectDe"] ?></span>
               </td>
            </tr>
            <tr>
               <td colspan="7" align="right" valign="top" height="15"></td>
            </tr>

            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= $langMod["tit:subject"] ?><span class="fontContantAlert">*</span></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputSubject" id="inputSubject" type="text" class="formInputContantTb" value="<?= $valSubject ?>" /></td>
            </tr>
         </table>

         <br style="display: none;"/>
         <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder" style="display: none;">
            <tr>
               <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                  <span class="formFontSubjectTxt"><?php echo $langMod["txt:pic"] ?></span><br />
                  <span class="formFontTileTxt"><?php echo $langMod["txt:picDe"] ?></span>
               </td>
            </tr>
            <tr>
               <td colspan="7" align="right" valign="top" height="15"></td>
            </tr>
            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["inp:album"] ?></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                  <div class="file-input-wrapper">
                     <button class="btn-file-input"><?php echo $langTxt["us:inputpicselect"] ?></button>
                     <input type="file" name="fileToUpload" id="fileToUpload" onchange="ajaxFileUpload();" />
                  </div>

                  <span class="formFontNoteTxt"><?php echo $langMod["inp:notepic"] ?></span>
                  <div class="clearAll"></div>
                  <div id="boxPicNew" class="formFontTileTxt">
                     <?php if (is_file($valPic)) { ?>
                        <img src="<?php echo $valPic ?>" style="float:left;border:#c8c7cc solid 1px;max-width:600px;" />
                        <div style="width:22px; height:22px;float:left;z-index:1; margin-left:-22px;cursor:pointer;" onclick="delPicUpload('deletePic.php')" title="Delete file"><img src="../img/btn/delete.png" width="22" height="22" border="0" /></div>
                        <input type="hidden" name="picname" id="picname" value="<?php echo $valPicName ?>" />
                     <?php } ?>
                  </div>
               </td>
            </tr>
            <tr style="display:none;">
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $modTxtShowPic[0] ?></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                  <label>
                     <div class="formDivRadioL"><input name="inputTypePic" id="inputTypePic" value="1" type="radio" class="formRadioContantTb" <?php if ($valPicShow != 2) { ?> checked="checked" <?php } ?> /></div>
                     <div class="formDivRadioR"><?php echo $modTxtShowPic[1] ?></div>
                  </label>

                  <label>
                     <div class="formDivRadioL"><input name="inputTypePic" id="inputTypePic" value="2" type="radio" class="formRadioContantTb" <?php if ($valPicShow == 2) { ?> checked="checked" <?php } ?> /></div>
                     <div class="formDivRadioR"><?php echo $modTxtShowPic[2] ?></div>
                  </label>
                  </label>
               </td>
            </tr>
         </table>
         <br />

         <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
            <tr>
               <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                  <span class="formFontSubjectTxt"><?= $langMod["txt:title"] ?></span><br />
                  <span class="formFontTileTxt"><?= $langMod["txt:titleDe"] ?></span>
               </td>
            </tr>
            <tr>
               <td colspan="7" align="center" valign="top" class="formRightContantTbEditor">
                  <div id="inputEditHTML">
                     <textarea name="editDetail" id="editDetail">
                                    <?php
                                    if (file_exists($valhtml)) {
                                       if (is_file($valhtml)) {
                                          $fd = @fopen($valhtml, "r");
                                          $contents = @fread($fd, @filesize($valhtml));
                                          @fclose($fd);
                                          echo txtReplaceHTML($contents);
                                       }
                                    }
                                    ?>
                                 </textarea>
                  </div>
               </td>
            </tr>
         </table>
         <br />
         <!-- <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
            <tr>
               <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                  <span class="formFontSubjectTxt"><?= $langMod["txt:seo"] ?></span><br />
                  <span class="formFontTileTxt"><?= $langMod["txt:seoDe"] ?></span>
               </td>
            </tr>
            <tr>
               <td colspan="7" align="right" valign="top" height="15"></td>
            </tr>
            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= $langMod["inp:seotitle"] ?><span class="fontContantAlert"></span></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputTagTitle" id="inputTagTitle" type="text" class="formInputContantTb" value="<?= $valMetatitle ?>" /><br />
                  <span class="formFontNoteTxt"><?= $langMod["inp:seotitlenote"] ?></span>
               </td>
            </tr>
            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= $langMod["inp:seodes"] ?><span class="fontContantAlert"></span></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputTagDescription" id="inputTagDescription" type="text" class="formInputContantTb" value="<?= $valDescription ?>" /><br />
                  <span class="formFontNoteTxt"><?= $langMod["inp:seodesnote"] ?></span>
               </td>
            </tr>
            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= $langMod["inp:seokey"] ?><span class="fontContantAlert"></span></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputTagKeywords" id="inputTagKeywords" type="text" class="formInputContantTb" value="<?= $valKeywords ?>" /><br />
                  <span class="formFontNoteTxt"><?= $langMod["inp:seokeynote"] ?></span>
               </td>
            </tr>
         </table>
         <br /> -->
         <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
            <tr>
               <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                  <span class="formFontSubjectTxt"><?= $langMod["txt:datec"] ?></span><br />
                  <span class="formFontTileTxt"><?= $langMod["txt:datecDe"] ?></span>
               </td>
            </tr>
            <tr>
               <td colspan="7" align="right" valign="top" height="15"></td>
            </tr>

            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= $langTxt["us:credate"] ?><span class="fontContantAlert"></span></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="cdateInput" id="cdateInput" type="text" class="formInputContantTbShot" autocomplete="off" value="<?= $valcredate ?>" /></td>
            </tr>
         </table>
         <br />
         <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
            <tr>
               <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                  <span class="formFontSubjectTxt"><?= $langMod["txt:date"] ?></span><br />
                  <span class="formFontTileTxt"><?= $langMod["txt:dateDe"] ?></span>
               </td>
            </tr>
            <tr>
               <td colspan="7" align="right" valign="top" height="15"></td>
            </tr>

            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= $langMod["tit:sdate"] ?><span class="fontContantAlert"></span></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="sdateInput" id="sdateInput" type="text" class="formInputContantTbShot" autocomplete="off" value="<?= $valSdate ?>" /></td>
            </tr>
            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= $langMod["tit:edate"] ?><span class="fontContantAlert"></span></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="edateInput" id="edateInput" type="text" class="formInputContantTbShot" autocomplete="off" value="<?= $valEdate ?>" /><br />
                  <span class="formFontNoteTxt"><?= $langMod["inp:notedate"] ?></span>
               </td>
            </tr>
         </table>
         <br />
         <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">

            <tr>
               <td colspan="7" align="right" valign="top" height="20"></td>
            </tr>
            <tr>
               <td colspan="7" align="right" valign="middle" class="formEndContantTb"><a href="#defTop" title="<?= $langTxt["btn:gototop"] ?>"><?= $langTxt["btn:gototop"] ?> <img src="../img/btn/top.png" align="absmiddle" /></a></td>
            </tr>
         </table>
      </div>
   </form>
   <script type="text/javascript" src="../../ckeditor/ckeditor.js"></script>
   <script type="text/javascript" language="javascript">
      /*################### Load FCK Editor ######################*/
      jQuery(function() {
         onLoadFCK();
      });
   </script>

   <? if ($_SESSION[$valSiteManage . 'core_session_language'] == "Thai") { ?>
      <script language="JavaScript" type="text/javascript" src="../js/datepickerThai.js"></script>
   <? } else { ?>
      <script language="JavaScript" type="text/javascript" src="../js/datepickerEng.js"></script>
   <? } ?>
   <? include("../lib/disconnect.php"); ?>
</body>
</html>