<?php
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
			" . $mod_tb_root . "_id as id,
			" . $mod_tb_root . "_credate as credate,
			" . $mod_tb_root . "_crebyid as crebyid,
			" . $mod_tb_root . "_status as status,
			" . $mod_tb_root . "_sdate as sdate,
			" . $mod_tb_root . "_edate as edate,
			" . $mod_tb_root_lang . "_pic as pic,
			" . $mod_tb_root_lang . "_type as type,
			" . $mod_tb_root_lang . "_filevdo as filevdo,
			" . $mod_tb_root_lang . "_url as url,
			" . $mod_tb_root . "_gid as gid,
			" . $mod_tb_root_lang . "_subject as subject,
        " . $mod_tb_root_lang . "_title as title,
         " . $mod_tb_root_lang . "_htmlfilename as htmlfilename,
			" . $mod_tb_root_lang . "_metatitle as metatitle,
			" . $mod_tb_root_lang . "_description as descripttion,
			" . $mod_tb_root_lang . "_keywords as keyword,
			" . $mod_tb_root . "_view as view,
			" . $mod_tb_root_lang . "_picshow as picshow"
   . "," . $mod_tb_root . "_sgid as sgid"
   . "," . $mod_tb_root_lang . "_id as lid"
   . "," . $mod_tb_root_lang . "_typec as typec"
   . "," . $mod_tb_root_lang . "_picType as picType"
   . "," . $mod_tb_root_lang . "_picDefault as picDefault"
   . "," . $mod_tb_root_lang . "_urlc as urlc"
   . "," . $mod_tb_root_lang . "_target as target"
   . " ";

$sql .= " FROM " . $mod_tb_root . " INNER JOIN " . $mod_tb_root_lang . " ON " . $mod_tb_root . "_id = " . $mod_tb_root_lang . "_cid
WHERE " . $mod_tb_root . "_masterkey='" . $_POST["masterkey"] . "' AND  " . $mod_tb_root . "_id 	='" . $_POST["valEditID"] . "' AND " . $mod_tb_root_lang . "_language 	='" . $_REQUEST['inputLt'] . "'";
$Query = wewebQueryDB($coreLanguageSQL, $sql);
$Row = wewebFetchArrayDB($coreLanguageSQL, $Query);
$valid = $Row['id'];
$valcredate = DateFormatInsertRe($Row[1]);
$valS = DateFormatInsertRe($Row['sdate']);

$valHourS = TimeHourFormatInsertRe($Row['sdate']);
// print_pre($valS);
$valMinuteS = TimeMinFormatInsertRe($Row['sdate']);

$valE = DateFormatInsertRe($Row['edate']);
$valHourE = TimeHourFormatInsertRe($Row['edate']);
$valMinuteE = TimeMinFormatInsertRe($Row['edate']);

$valcreby = $Row['crebyid'];
$valstatus = $Row['status'];
if ($Row['sdate'] != "0000-00-00 00:00:00") {
   $valSdate = DateFormatInsertRe($Row['sdate']);
}
if ($Row['edate'] != "0000-00-00 00:00:00") {
   $valEdate = DateFormatInsertRe($Row['edate']);
}
$valPicName = $Row['pic'];
$valPic = $mod_path_pictures . "/" . $Row['pic'];
$valType = $Row['type'];
$valFilevdo = $Row['filevdo'];
$valPathvdo = $mod_path_vdo . "/" . $Row['filevdo'];
$valUrl = $Row['url'];
$valGid = $Row['gid'];

$valSubject = rechangeQuot($Row['subject']);
$valTitle = $Row['title'];
$valhtml = $mod_path_html . "/" . $Row['htmlfilename'];
$valhtmlname = $Row['htmlfilename'];
$valMetatitle = rechangeQuot($Row['metatitle']);
$valDescription = rechangeQuot($Row['descripttion']);
$valKeywords = rechangeQuot($Row['keyword']);
$valview = $Row['view'];
$valPicShow = $Row['picshow'];


$valSubGid = $Row['sgid'];
$valSGid = $Row['lid'];
$valTypeC = $Row['typec'] ? $Row['typec'] : 1;
$valpicType = $Row['picType'] ? $Row['picType'] : 1;
$valpicDefault = $Row['picDefault'];
$valUrlC = $Row['urlc'];
$valTarget = $Row['target'];

if (!empty($valSGid)) {
   $valcid = $valSGid;
} else {
   $valcid = $myRand;
}
$valPermission = getUserPermissionOnMenu($_SESSION[$valSiteManage . "core_session_groupid"], $_POST["menukeyid"]);

// $callGauthen = "Select
// " . $mod_tb_permisGroup . "." . $mod_tb_permisGroup . "_cmgid as idG
// From
// " . $mod_tb_permisGroup . "
// Where
// " . $mod_tb_permisGroup . "." . $mod_tb_permisGroup . "_misid = " . $_SESSION[$valSiteManage . "core_session_groupid"] . "
// AND " . $mod_tb_permisGroup . "." . $mod_tb_permisGroup . "_masterkey = '" . $_REQUEST['masterkey'] . "'";
// $listAuthen = $dbConnect->execute($callGauthen);
// $listGAllow = array();
// foreach ($listAuthen as $key => $value) {
//    $listGAllow[] = $value['idG'];
// }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <meta name="robots" content="noindex, nofollow" />
   <meta name="googlebot" content="noindex, nofollow" />
   <!-- <link href="../css/bootstrap.min.css" rel="stylesheet" /> -->
   <link href="../css/theme.css?v=<?php echo date('Ymdhis'); ?>" rel="stylesheet" />
   <link href="../css/table_css.css?v=<?php echo date('Ymdhis'); ?>" rel="stylesheet" />
   <link href="js/uploadfile.css" rel="stylesheet" />

   <title><?php echo $core_name_title ?></title>
   <link href="../js/select2/css/select2.css" rel="stylesheet" />
   <script language="JavaScript" type="text/javascript" src="../js/select2/js/select2.js"></script>
   <script language="JavaScript" type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
   <script language="JavaScript" type="text/javascript" src="./js/script.js"></script>
   <script language="JavaScript" type="text/javascript">
      function executeSubmit() {
         with(document.myForm) {
            if (inputGroupID.value == 0) {
               inputGroupID.focus();
               jQuery("#inputGroupID").addClass("formInputContantTbAlertY");
               return false;
            } else {
               jQuery("#inputGroupID").removeClass("formInputContantTbAlertY");
            }

            if (isBlank(inputSubject)) {
               inputSubject.focus();
               jQuery("#inputSubject").addClass("formInputContantTbAlertY");
               return false;
            } else {
               jQuery("#inputSubject").removeClass("formInputContantTbAlertY");
            }

            // if (isBlank(inputDescription)) {
            // 	inputDescription.focus();
            // 	jQuery("#inputDescription").addClass("formInputContantTbAlertY");
            // 	return false;
            // } else {
            // 	jQuery("#inputDescription").removeClass("formInputContantTbAlertY");
            // }

            let inputTypeC = document.myForm.inputTypeC.value;
            if (inputTypeC == 1) {
               var alleditDetail = CKEDITOR.instances.editDetail.getData();
               if (alleditDetail == "") {
                  jQuery("#inputEditHTML").addClass("formInputContantTbAlertY");
                  window.location.hash = '#inputEditHTML';
                  return false;
               } else {
                  jQuery("#inputEditHTML").removeClass("formInputContantTbAlertY");
               }
               jQuery('#inputHtml').val(alleditDetail);
            }else if(inputTypeC == 3){
               if (isBlank(inputurlC)) {
                  inputurlC.focus();
                  jQuery("#inputurlC").addClass("formInputContantTbAlertY");
                  return false;
               } else {
                  jQuery("#inputurlC").removeClass("formInputContantTbAlertY");
               }

               if (inputurlC.value == "http://") {
                  inputurlC.focus();
                  jQuery("#inputurlC").addClass("formInputContantTbAlertY");
                  return false;
               } else {
                  jQuery("#inputurlC").removeClass("formInputContantTbAlertY");
               }
            }
         }
         updateContactNew('updateContant.php');
      }


      function loadCheckUser() {
         with(document.myForm) {
            var inputValuename = document.myForm.inputUserName.value;
         }
         if (inputValuename != '') {
            checkUsermember(inputValuename);
         }
      }

      jQuery(document).ready(function() {
         jQuery('#myForm').keypress(function(e) {
            /* Start  Enter Check CKeditor */
            var focusManager = new CKEDITOR.focusManager(editDetail);
            var checkFocus = CKEDITOR.instances.editDetail.focusManager.hasFocus;
            var checkFocusTitle = jQuery("#inputDescription").is(":focus");
            var checkFocusTitle2 = jQuery("#inputDescription2").is(":focus");

            if (e.which == 13) {
               //e.preventDefault();
               if (!checkFocusTitle) {
                  if (!checkFocusTitle2) {
                     if (!checkFocus) {
                        executeSubmit();
                        return false;
                     }
                  }
               }
            }
            /* End  Enter Check CKeditor */
         });
         $('.select2').select2();
      });
   </script>
</head>

<body>
   <form action="?" method="get" name="myForm" id="myForm" enctype="multipart/form-data">
      <input name="execute" type="hidden" id="execute" value="update" />
      <input name="masterkey" type="hidden" id="masterkey" value="<?php echo $_REQUEST['masterkey'] ?>" />
      <input name="menukeyid" type="hidden" id="menukeyid" value="<?php echo $_REQUEST['menukeyid'] ?>" />
      <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php echo $_REQUEST['module_pageshow'] ?>" />
      <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php echo $_REQUEST['module_pagesize'] ?>" />
      <input name="module_orderby" type="hidden" id="module_orderby" value="<?php echo $_REQUEST['module_orderby'] ?>" />


      <input name="valEditID" type="hidden" id="valEditID" value="<?php echo $_REQUEST['valEditID'] ?>" />
      <input name="inputLt" type="hidden" id="inputLt" value="<?php echo $_REQUEST['inputLt'] ?>" />

      <input name="valDelFile" type="hidden" id="valDelFile" value="" />
      <input name="valDelAlbum" type="hidden" id="valDelAlbum" value="" />
      <input name="inputHtml" type="hidden" id="inputHtml" value="" />
      <input name="inputHtmlDel" type="hidden" id="inputHtmlDel" value="<?php echo $valhtmlname ?>" />
      <input type="hidden" name="inputTheme" id="inputTheme" value="<?php echo $valTheme ?>" />
      <input name="valCid" type="hidden" id="valCid" value="<?= $valSGid ?>" />
      <input name="valrand" type="hidden" id="valrand" value="<?= $myRand ?>" />

      <?php include_once './inc-inputsearch.php'; ?>

      <div class="divRightNav">
         <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
            <tr>
               <td class="divRightNavTb" align="left" id="defTop"><span class="fontContantTbNav"><a href="<?php echo $valLinkNav1 ?>" target="_self"><?php echo $valNav1 ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a href="javascript:void(0)" onclick="btnBackPage('index.php')" target="_self"><?php echo $langMod["tit:inpName"] ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?php echo $langMod["txt:titleedit"] ?>
                     <?php if ($_SESSION[$valSiteManage . 'core_session_languageT'] == 2 || $_SESSION[$valSiteManage . 'core_session_languageT'] == 3) { ?>(<?php echo $_REQUEST['inputLt']; ?>)<?php } ?>
                  </span></td>
               <td class="divRightNavTb" align="right">



               </td>
            </tr>
         </table>
      </div>
      <div class="divRightHead">
         <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center">
            <tr>
               <td height="77" align="left"><span class="fontHeadRight"><?php echo $langMod["txt:titleedit"] ?>
                     <?php if ($_SESSION[$valSiteManage . 'core_session_languageT'] == 2 || $_SESSION[$valSiteManage . 'core_session_languageT'] == 3) { ?>(<?php echo $_REQUEST['inputLt']; ?>)
                  <?php } ?>
                  </span></td>
               <td align="left">
                  <table border="0" cellspacing="0" cellpadding="0" align="right">
                     <tr>
                        <td align="right">
                           <?php if ($valPermission == "RW") { ?>
                              <div class="btnSave" title="<?php echo $langTxt["btn:save"] ?>" onclick="executeSubmit();"></div>
                           <?php } ?>
                           <div class="btnBack" title="<?php echo $langTxt["btn:back"] ?>" onclick="btnBackPage('index.php')"></div>
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
                  <span class="formFontSubjectTxt"><?php echo $langMod["txt:subject"] ?></span><br />
                  <span class="formFontTileTxt"><?php echo $langMod["txt:subjectDe"] ?></span>
               </td>
            </tr>
            <tr>
               <td colspan="7" align="right" valign="top" height="15"></td>
            </tr>

            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["meu:group"] ?><span class="fontContantAlert">*</span></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                  <select name="inputGroupID" id="inputGroupID" class="formSelectContantTb">
                     <option value="0"><?php echo $langMod["tit:selectg"] ?></option>
                     <?php
                     $sql_group = "SELECT " . $mod_tb_root_group . "_id," . $mod_tb_root_group_lang . "_subject FROM " . $mod_tb_root_group . " INNER JOIN " . $mod_tb_root_group_lang . " ON " . $mod_tb_root_group . "_id = " . $mod_tb_root_group_lang . "_cid WHERE  " . $mod_tb_root_group . "_masterkey ='" . $_REQUEST['masterkey'] . "' AND " . $mod_tb_root_group_lang . "_language='" . $_REQUEST['inputLt'] . "' ORDER BY " . $mod_tb_root_group . "_order DESC ";
                     $query_group = wewebQueryDB($coreLanguageSQL, $sql_group);
                     while ($row_group = wewebFetchArrayDB($coreLanguageSQL, $query_group)) {
                        $row_groupid = $row_group[0];
                        $row_groupname = $row_group[1];
                     ?>
                        <option value="<?php echo $row_groupid ?>" <?php if ($valGid == $row_groupid) { ?> selected="selected" <?php } ?>><?php echo $row_groupname ?>
                        </option>
                     <?php } ?>
                  </select>
               </td>
            </tr>
            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["tit:subject"] ?><span class="fontContantAlert">*</span></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputSubject" id="inputSubject" type="text" class="formInputContantTb" value="<?php echo $valSubject ?>" /></td>
            </tr>
            <tr>
               <td align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["tit:title"] ?><span class="fontContantAlert"></span></td>
               <td colspan="6" align="left" valign="top" class="formRightContantTb">
                  <textarea name="inputDescription" id="inputDescription" cols="45" rows="5" class="formTextareaContantTb"><?php echo $valTitle ?></textarea>
               </td>
            </tr>
            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $modTxtShowCase[0] ?><span class="fontContantAlert">*</span></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                  <label>
                     <div class="formDivRadioL"><input name="inputTypeC" id="inputTypeC" type="radio" class="formRadioContantTb" value="1" <?php if($valTypeC == 1){ echo 'checked="checked"'; } ?> /></div>
                     <div class="formDivRadioR"><?php echo $modTxtShowCase[1] ?></div>
                  </label>

                  <label>
                     <div class="formDivRadioL"><input name="inputTypeC" id="inputTypeC" type="radio" class="formRadioContantTb" value="2" <?php if($valTypeC == 2){ echo 'checked="checked"'; } ?>/></div>
                     <div class="formDivRadioR"><?php echo $modTxtShowCase[2] ?></div>
                  </label>

                  <label>
                     <div class="formDivRadioL"><input name="inputTypeC" id="inputTypeC" type="radio" class="formRadioContantTb" value="3" <?php if($valTypeC == 3){ echo 'checked="checked"'; } ?>/></div>
                     <div class="formDivRadioR"><?php echo $modTxtShowCase[3] ?></div>
                  </label>
               </td>
            </tr>
         </table>
         <br />
         <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
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
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $modTxtShowPic[0] ?></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                  <label>
                     <div class="formDivRadioL"><input name="inputTypePic" id="inputTypePic" value="1" type="radio" class="formRadioContantTb" <?php if($valpicType == 1){ echo 'checked="checked"'; } ?> /></div>
                     <div class="formDivRadioR"><?php echo $modTxtShowPic[1] ?></div>
                  </label>

                  <label>
                     <div class="formDivRadioL"><input name="inputTypePic" id="inputTypePic" value="2" type="radio" class="formRadioContantTb" <?php if($valpicType == 2){ echo 'checked="checked"'; } ?>/></div>
                     <div class="formDivRadioR"><?php echo $modTxtShowPic[2] ?></div>
                  </label>
                  </label>
               </td>
            </tr>
            <tr class="layout_type1 PicDefault" <?php if($valpicType == 2){ echo 'style="display:none;"'; } ?>>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["tit:picdefault"]; ?><span class="fontContantAlert"></span></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                  <ul class="selectLayout">
                        <?php
                        $sql_nopic = "SELECT " . $core_tb_nopic . "_id as id
                        ," . $core_tb_nopic . "_masterkey as masterkey
                        ," . $core_tb_nopic . "_subject as subject
                        ," . $core_tb_nopic . "_file as file 
                        FROM " . $core_tb_nopic . " 
                        WHERE " . $core_tb_nopic . "_masterkey = '" . $core_masterkey_nopic . "'
                        AND " . $core_tb_nopic . "_status != 'Disable'
                        ORDER BY " . $core_tb_nopic . "_order DESC
                        ";
                        $query_nopic = wewebQueryDB($coreLanguageSQL, $sql_nopic);
                        if (empty($valpicDefault)) {
                           $valpicDefault = $query_nopic->fields['id'];
                        }
                        foreach ($query_nopic as $key => $value) {
                           $valPic_layout1 = $core_pathname_upload . "/" . $value['masterkey'] . "/pictures/" . $value['file'];
                        ?>
                           <li>
                              <div class="checkboxLayout">
                                    <input type="radio" name="inputPicD" value="<?php echo $value['id']; ?>" <?php if($valpicDefault == $value['id']){ echo "checked"; } ?>>
                                    <div class="cover">
                                       <img src="<?php echo $valPic_layout1; ?>">
                                    </div>
                                    <div class="layout-title"><?php echo $value['subject']; ?></div>
                              </div>
                           </li>
                        <?php
                        }
                        ?>
                  </ul>
               </td>
            </tr>
            <tr class="PicUpload" <?php if($valpicType == 1){ echo 'style="display:none;"'; } ?>>
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
         </table>
         <br />
         <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder TypeLink" <?php if($valTypeC != 3){ echo "style='display:none;'"; } ?>>
            <tr>
               <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                  <span class="formFontSubjectTxt"><?php echo $langMod["txt:subjectLink"] ?></span><br />
                  <span class="formFontTileTxt"><?php echo $langMod["txt:subjectLinkDe"] ?></span>
               </td>
            </tr>
            <tr>
               <td colspan="7" align="right" valign="top" height="15"></td>
            </tr>
            <tr id="boxInputlink">
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["tit:linkvdoc"] ?><span class="fontContantAlert">*</span></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><textarea name="inputurlC" id="inputurlC" cols="45" rows="5" class="formTextareaContantTb"><?php echo $valUrlC ?></textarea><br />
                  <span class="formFontNoteTxt"><?php echo $langMod["edit:linknote"] ?></span>
               </td>
            </tr>
            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["tit:typevdoc"] ?><span class="fontContantAlert">*</span></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                  <label>
                     <div class="formDivRadioL"><input name="inputmenutarget" id="inputmenutarget" type="radio" class="formRadioContantTb" value="1" <?php if($valTarget == 1){ echo 'checked="checked"'; } ?> /></div>
                     <div class="formDivRadioR"><?php echo $modTxtTarget[1] ?></div>
                  </label>

                  <label>
                     <div class="formDivRadioL"><input name="inputmenutarget" id="inputmenutarget" type="radio" class="formRadioContantTb" value="2" <?php if($valTarget == 2){ echo 'checked="checked"'; } ?>/></div>
                     <div class="formDivRadioR"><?php echo $modTxtTarget[2] ?></div>
                  </label>
                  </label>
               </td>
            </tr>
         </table>
         <br class="TypeLink" <?php if($valTypeC != 3){ echo "style='display:none;'"; } ?>/>
         <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder TypeDetail" <?php if($valTypeC != 1){ echo "style='display:none;'"; } ?>>
            <tr>
               <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                  <span class="formFontSubjectTxt"><?php echo $langMod["txt:title"] ?></span><br />
                  <span class="formFontTileTxt"><?php echo $langMod["txt:titleDe"] ?></span>
               </td>
            </tr>
            <tr>
               <td colspan="7" align="center" valign="top" class="formRightContantTbEditor">
                  <div id="inputEditHTML">
                     <textarea name="editDetail" id="editDetail">
                           <?php
                           if (is_file($valhtml)) {
                              $fd = @fopen($valhtml, "r");
                              $contents = @fread($fd, @filesize($valhtml));
                              @fclose($fd);
                              echo txtReplaceHTML($contents);
                           }
                           ?>
                        </textarea>
                  </div>
               </td>
            </tr>
         </table>
         <br class="TypeDetail" <?php if($valTypeC != 1){ echo "style='display:none;'"; } ?>/>
         <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder TypeDetail" <?php if($valTypeC != 1){ echo "style='display:none;'"; } ?>>
            <tr>
               <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                  <span class="formFontSubjectTxt"><?php echo $langMod["txt:album"] ?></span><br />
                  <span class="formFontTileTxt"><?php echo $langMod["txt:albumDe"] ?></span>
               </td>
            </tr>
            <tr>
               <td colspan="7" align="right" valign="top" height="15"></td>
            </tr>

            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= $langMod["inp:album"] ?></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                  <div id="mulitplefileuploader"><?= $langTxt["us:inputpicselect"] ?></div>

                  <span class="formFontNoteTxt"><?= $langMod["inp:notealbum"] ?></span>
                  <div class="clearAll"></div>
                  <div id="status" class="formFontTileTxt"></div>
                  <div id="boxAlbumNew" class="formFontTileTxt">
                     <?
                     $sql_filetemp = "SELECT  " . $mod_tb_root_album . "_id," . $mod_tb_root_album . "_filename," . $mod_tb_root_album . "_name," . $mod_tb_root_album . "_download  FROM " . $mod_tb_root_album . " WHERE " . $mod_tb_root_album . "_contantid 	='" . $valSGid . "' AND " . $mod_tb_root_album . "_language ='" . $_REQUEST['inputLt'] . "'   ORDER BY " . $mod_tb_root_album . "_id ASC";
                     $query_filetemp = wewebQueryDB($coreLanguageSQL, $sql_filetemp);
                     $number_filetemp = wewebNumRowsDB($coreLanguageSQL, $query_filetemp);
                     if ($number_filetemp >= 1) {
                        $valAlbum = "";
                        while ($row_filetemp = wewebFetchArrayDB($coreLanguageSQL, $query_filetemp)) {
                           $linkRelativePath = $mod_path_album . "/" . $row_filetemp[1];
                           $downloadFile = $row_filetemp[1];
                           $downloadID = $row_filetemp[0];
                           $downloadName = $row_filetemp[2];
                           $countDownload = $row_filetemp[3];
                           $imageType = strstr($downloadFile, '.');

                           $valAlbum .= "<img src=\"" . $mod_path_album . "/reO_" . $downloadFile . "\"  width=\"50\" height=\"50\"   style=\"float:left;border:#c8c7cc solid 1px;margin-top:15px;\"  />";
                           $valAlbum .= "<div style=\"width:15px; height:15px;float:left;z-index:1; margin-left:-15px;cursor:pointer;margin-right:15px;margin-top:15px;\" onclick=\"document.myForm.valDelAlbum.value=" . $downloadID . ";delAlbumUpload('deleteAlbum.php');\"  title=\"Delete file\" ><img src=\"../img/btn/delete.png\" width=\"15\" height=\"15\"  border=\"0\"/></div>";
                        }
                     }
                     echo $valAlbum;
                     ?>
                  </div>
               </td>
            </tr>
         </table>
         <br class="TypeDetail" <?php if($valTypeC != 1){ echo "style='display:none;'"; } ?>/>
         <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder TypeDetail" <?php if($valTypeC != 1){ echo "style='display:none;'"; } ?>>
            <tr>
               <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                  <span class="formFontSubjectTxt"><?php echo $langMod["txt:video"] ?></span><br />
                  <span class="formFontTileTxt"><?php echo $langMod["txt:videoDe"] ?></span>
               </td>
            </tr>
            <tr>
               <td colspan="7" align="right" valign="top" height="15"></td>
            </tr>

            <tr style="display: none;">
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= $langMod["tit:typevdo"] ?></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                  <label>
                     <div class="formDivRadioL"><input name="inputType" id="inputType" value="url" type="radio" class="formRadioContantTb" onclick="jQuery('#boxInputfile').hide();jQuery('#boxInputlink').show();" <? if ($valType == "url" || $valType != "file") { ?> checked="checked" <? } ?> /></div>
                     <div class="formDivRadioR"><?= $langMod["tit:linkvdo"] ?></div>
                  </label>

                  <label>
                     <div class="formDivRadioL"><input name="inputType" id="inputType" value="file" type="radio" class="formRadioContantTb" onclick="jQuery('#boxInputlink').hide();jQuery('#boxInputfile').show();" <? if ($valType == "file") { ?> checked="checked" <? } ?> /></div>
                     <div class="formDivRadioR"><?= $langMod["tit:uploadvdo"] ?></div>
                  </label>
                  </label>
               </td>
            </tr>
            <tr id="boxInputlink" <? if ($valType == "file") { ?> style="display:none;" <? } ?>>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= $langMod["tit:linkvdo"] ?></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><textarea name="inputurl" id="inputurl" cols="45" rows="5" class="formTextareaContantTb"><?= $valUrl ?></textarea><br />
                  <span class="formFontNoteTxt"><?= $langMod["tit:linkvdonote"] ?></span>
               </td>
            </tr>
            <tr id="boxInputfile" <? if ($valType == "url" || $valType != "file") { ?> style="display:none;" <? } ?>>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= $langMod["tit:uploadvdo"] ?></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                  <div class="file-input-wrapper">
                     <button class="btn-file-input"><?= $langTxt["us:inputpicselect"] ?></button>
                     <input type="file" name="inputVideoUpload" id="inputVideoUpload" onchange="ajaxVideoUpload();" />
                  </div>

                  <span class="formFontNoteTxt"><?= $langMod["tit:uploadvdonote"] ?></span>
                  <div class="clearAll"></div>
                  <div id="boxVideoNew" class="formFontTileTxt">
                     <?
                     if (is_file($valPathvdo)) {
                        $linkRelativePath = $valPathvdo;
                        $imageType = strstr($valFilevdo, '.');
                     ?>
                        <a href="javascript:void(0)" onclick=" delVideoUpload('deleteVideo.php')"><img src="../img/btn/delete.png" align="absmiddle" title="Delete file" hspace="10" vspace="10" border="0" /></a>Video Upload | <?= $langMod["file:type"] ?>: <?= $imageType ?> | <?= $langMod["file:size"] ?>: <?= get_IconSize($linkRelativePath) ?>
                        <input type="hidden" name="picname" id="picname" value="<?= $valFilevdo ?>" />
                     <? } ?>
                  </div>
               </td>
            </tr>
         </table>
         <br class="TypeDetail" <?php if($valTypeC != 1){ echo "style='display:none;'"; } ?>/>

         <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder TypeDownload" <?php if($valTypeC == 3){ echo "style='display:none;'"; } ?>>
            <tr>
               <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                  <span class="formFontSubjectTxt"><?= $langMod["txt:attfile"] ?></span><br />
                  <span class="formFontTileTxt"><?= $langMod["txt:attfileDe"] ?></span>
               </td>
            </tr>
            <tr>
               <td colspan="7" align="right" valign="top" height="15"></td>
            </tr>

            <tr style="display:none;">
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= $langMod["inp:chfile"] ?><span class="fontContantAlert"></span></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputFileName" id="inputFileName" type="text" class="formInputContantTb" /></td>
            </tr>
            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= $langMod["inp:sefile"] ?><span class="fontContantAlert"></span></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                  <div class="file-input-wrapper">
                     <button class="btn-file-input"><?= $langTxt["us:inputpicselect"] ?></button>
                     <input type="file" name="inputFileUpload" id="inputFileUpload" onchange="ajaxFileUploadDoc();" />
                  </div>
                  <span class="formFontNoteTxt"><?= $langMod["inp:notefile"] ?></span>
                  <div class="clearAll"></div>
                  <div id="boxFileNew" class="formFontTileTxt">
                     <?
                     $sql = "SELECT " . $mod_tb_file . "_id," . $mod_tb_file . "_filename," . $mod_tb_file . "_name," . $mod_tb_file . "_download FROM " . $mod_tb_file . " WHERE " . $mod_tb_file . "_contantid 	='" . $valSGid . "' AND " . $mod_tb_file . "_language ='" . $_REQUEST['inputLt'] . "' ORDER BY " . $mod_tb_file . "_id ASC";
                     $query_file = wewebQueryDB($coreLanguageSQL, $sql);
                     $number_row = wewebNumRowsDB($coreLanguageSQL, $query_file);
                     if ($number_row >= 1) {
                        $txtFile = "";
                        while ($row_file = wewebFetchArrayDB($coreLanguageSQL, $query_file)) {
                           $linkRelativePath = $mod_path_file . "/" . $row_file[1];
                           $downloadFile = $row_file[1];
                           $downloadID = $row_file[0];
                           $downloadName = $row_file[2];
                           $countDownload = $row_file[3];
                           $imageType = strstr($downloadFile, '.');
                           $txtFile .= "<a href=\"javascript:void(0)\"  onclick=\"document.myForm.valDelFile.value=" . $downloadID . ";delFileUpload('deleteFile.php');\" ><img src=\"../img/btn/delete.png\" align=\"absmiddle\" title=\"Delete file\"  hspace=\"10\"  vspace=\"10\"   border=\"0\" /></a>" . $downloadName . "" . $imageType . " | " . $langMod["file:type"] . ": " . $imageType . "  | " . $langMod["file:size"] . ": " . get_IconSize($linkRelativePath) . "<br/>";
                        }
                     }

                     echo $txtFile;
                     ?>
                  </div>
               </td>
            </tr>
         </table>
         <br class="TypeDownload" <?php if($valTypeC != 2){ echo "style='display:none;'"; } ?>/>
         <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder TypeDetail" <?php if($valTypeC != 1){ echo "style='display:none;'"; } ?>>
            <tr>
               <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                  <span class="formFontSubjectTxt"><?php echo $langMod["txt:seo"] ?></span><br />
                  <span class="formFontTileTxt"><?php echo $langMod["txt:seoDe"] ?></span>
               </td>
            </tr>
            <tr>
               <td colspan="7" align="right" valign="top" height="15"></td>
            </tr>

            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["inp:seotitle"] ?><span class="fontContantAlert"></span></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputTagTitle" id="inputTagTitle" type="text" class="formInputContantTb" value="<?php echo $valMetatitle ?>" /><br />
                  <span class="formFontNoteTxt"><?php echo $langMod["inp:seotitlenote"] ?></span>
               </td>
            </tr>
            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["inp:seodes"] ?><span class="fontContantAlert"></span></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputTagDescription" id="inputTagDescription" type="text" class="formInputContantTb" value="<?php echo $valDescription ?>" /><br />
                  <span class="formFontNoteTxt"><?php echo $langMod["inp:seodesnote"] ?></span>
               </td>
            </tr>
            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["inp:seokey"] ?><span class="fontContantAlert"></span></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputTagKeywords" id="inputTagKeywords" type="text" class="formInputContantTb" value="<?php echo $valKeywords ?>" /><br />
                  <span class="formFontNoteTxt"><?php echo $langMod["inp:seokeynote"] ?></span>
               </td>
            </tr>
         </table>
         <br class="TypeDetail" <?php if($valTypeC != 1){ echo "style='display:none;'"; } ?>/>
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
               <td width="18%" align="right" valign="top" class="formLeftContantTb">วันเริ่มต้น<span class="fontContantAlert"></span></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="sdateInputC" id="sdateInputC" type="text" class="formInputContantTbShot datepick" autocomplete="off" value="<?= $valSdate ?>" /></td>
            </tr>
            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb">วันสิ้นสุด<span class="fontContantAlert"></span></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="edateInputC" id="edateInputC" type="text" class="formInputContantTbShot datepick" autocomplete="off" value="<?= $valEdate ?>" /><br />
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
               <td colspan="7" align="right" valign="middle" class="formEndContantTb"><a href="#defTop" title="<?php echo $langTxt["btn:gototop"] ?>"><?php echo $langTxt["btn:gototop"] ?> <img src="../img/btn/top.png" align="absmiddle" /></a></td>
            </tr>
         </table>
      </div>
   </form>
   <script type="text/javascript" src="../js/ajaxfileupload.js"></script>
   <script type="text/javascript" src="../../ckeditor/ckeditor.js"></script>
   <script type="text/javascript" language="javascript">
      $(document).ready(function() {
         $("#eHourInput").val('<?php echo @$valHourE; ?>');
         $("#eMinInput").val('<?php echo @$valMinuteE; ?>');

         $("#sHourInput").val('<?php echo @$valHourS; ?>');
         $("#sMinInput").val('<?php echo @$valMinuteS; ?>');
      });
   </script>
   <script type="text/javascript" language="javascript">
      /*################################# Upload Pic #######################*/
      function ajaxFileUpload() {
         var valuepicname = jQuery("input#picname").val();

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
            url: 'loadUpdatePic.php?myID=<?= $valSGid ?>&masterkey=<?= $_REQUEST['masterkey'] ?>&langt=<?= $_REQUEST['inputLt'] ?>&delpicname=' + valuepicname + '&menuid=<?= $_REQUEST['menukeyid'] ?>',
            secureuri: false,
            fileElementId: 'fileToUpload',
            dataType: 'json',
            success: function(data, status) {
               if (typeof(data.error) != 'undefined') {

                  if (data.error != '') {
                     alert(data.error);

                  } else {
                     jQuery("#boxPicNew").show();
                     jQuery("#boxPicNew").html(data.msg);
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



      /*################################# Upload Video #######################*/
      function ajaxVideoUpload() {
         var valuevdoname = jQuery("input#vdoname").val();

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
            url: 'loadUpdateVideo.php?myID=<?= $valSGid ?>&masterkey=<?= $_REQUEST['masterkey'] ?>&langt=<?= $_REQUEST['inputLt'] ?>&delvdoname=' + valuevdoname + '&menuid=<?= $_REQUEST['menukeyid'] ?>',
            secureuri: false,
            fileElementId: 'inputVideoUpload',
            dataType: 'json',
            success: function(data, status) {
               if (typeof(data.error) != 'undefined') {

                  if (data.error != '') {
                     alert(data.error);

                  } else {
                     jQuery("#boxVideoNew").show();
                     jQuery("#boxVideoNew").html(data.msg);
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


      /*############################# Upload File ####################################*/
      function ajaxFileUploadDoc() {
         var valuefilename = jQuery("input#inputFileName").val();
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
            url: 'loadUpdateFile.php?myID=<?= $valSGid ?>&masterkey=<?= $_REQUEST['masterkey'] ?>&langt=<?= $_REQUEST['inputLt'] ?>&nametodoc=' + valuefilename + '&menuid=<?= $_REQUEST['menukeyid'] ?>',
            secureuri: true,
            fileElementId: 'inputFileUpload',
            dataType: 'json',
            success: function(data, status) {
               if (typeof(data.error) != 'undefined') {

                  if (data.error != '') {
                     alert(data.error);
                  } else {
                     jQuery("#boxFileNew").show();
                     jQuery("#boxFileNew").html(data.msg);
                     document.myForm.inputFileName.value = "";
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


      /*################### Load FCK Editor ######################*/
      jQuery(function() {
         onLoadFCK();
      });
   </script>

   <script type="text/javascript" src="js/jquery.uploadfile.js"></script>
   <script type="text/javascript" language="javascript">
      jQuery(document).ready(function() {
         var vajSelectFile = 0;
         var valUploadFile = 0;
         var settings = {
            url: "loadUpdateAlbum.php?myID=<?= $valSGid ?>&masterkey=<?= $_REQUEST['masterkey'] ?>&langt=<?= $_REQUEST['inputLt'] ?>&menuid=<?= $_REQUEST['menukeyid'] ?>",
            dragDrop: false,
            fileName: "myfile",
            allowedTypes: "jpg,png,gif",
            returnType: "json",
            onSelect: function(files) {
               vajSelectFile = files.length;
            },

            onSuccess: function(files, data, xhr) {
               valUploadFile = valUploadFile + 1;
               if (vajSelectFile == valUploadFile) {
                  loadShowPhotoUpdate('loadShowAlbumNewUpdate.php', 'boxAlbumNew');
                  //	alert('goooo');
                  valUploadFile = 0;
               }
            },
            showStatusAfterSuccess: false,
            showAbort: false,
            showDone: false,
            showDelete: false,
            deleteCallback: function(data, pd) {
               for (var i = 0; i < data.length; i++) {

                  $.post("delete.php", {
                        op: "delete",
                        name: data[i]
                     },
                     function(resp, textStatus, jqXHR) {

                        //Show Message
                        jQuery("#status").append("<div>File Deleted</div>");
                     });

               }
               pd.statusbar.hide(); //You choice to hide/not.

            }
         }
         var uploadObj = jQuery("#mulitplefileuploader").uploadFile(settings);


      });
   </script>


   <? if ($_SESSION[$valSiteManage . 'core_session_language'] == "Thai") { ?>
      <script language="JavaScript" type="text/javascript" src="../js/datepickerThai.js"></script>
   <? } else { ?>
      <script language="JavaScript" type="text/javascript" src="../js/datepickerEng.js"></script>
   <? } ?>
   <?php include("../lib/disconnect.php"); ?>

</body>

</html>