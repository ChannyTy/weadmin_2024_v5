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
$arrLang = $_SESSION[$valSiteManage . "core_session_multilang"];

$sqldetail = "SELECT
" . $mod_tb_root . "." . $mod_tb_root . "_id,
" . $mod_tb_root . "." . $mod_tb_root . "_subject,
" . $mod_tb_root . "." . $mod_tb_root . "_display,
" . $mod_tb_root . "." . $mod_tb_root . "_title,
" . $mod_tb_root . "." . $mod_tb_root . "_inputtype  as inputtype
FROM " . $mod_tb_root . " WHERE " . $mod_tb_root . "." . $mod_tb_root . "_id = " . $_REQUEST['valEditID'] . "";
// print_pre($sqldetail);
$Query = wewebQueryDB($coreLanguageSQL, $sqldetail);
$Row = wewebFetchArrayDB($coreLanguageSQL, $Query);
$valKey = rechangeQuot($Row[1]);
$valID = $Row[0];
$valDisplay = unserialize($Row[2]);
$valTitle = rechangeQuot($Row[3]);
$valTypeInputShow = rechangeQuot($Row['inputtype']);

$valLevelPermission = $_SESSION[$valSiteManage . "core_session_level"];

$valPermission = getUserPermissionOnMenu($_SESSION[$valSiteManage . "core_session_groupid"], $_POST["menukeyid"]);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="robots" content="noindex, nofollow">
         <meta name="googlebot" content="noindex, nofollow">
            <link href="../css/theme.css" rel="stylesheet" />
            <link href="js/uploadfile.css" rel="stylesheet" />

            <title><?= $core_name_title ?></title>
            <script language="JavaScript" type="text/javascript" src="../js/scriptCoreWeweb.js?v=<?php echo date('YmdHis'); ?>"></script>
            <script language="JavaScript" type="text/javascript">
               function executeSubmit() {
                  with (document.myForm) {
                     // var dataSet = new FormData($('#myForm')[0]);

                     // if(inputGroupID.value==0) {
                     // 	inputGroupID.focus();
                     // 	jQuery("#inputGroupID").addClass("formInputContantTbAlertY");
                     // 	return false;
                     // }else{
                     // 	jQuery("#inputGroupID").removeClass("formInputContantTbAlertY");
                     // }
<? if ($valLevelPermission == "SuperAdmin") { ?>
                        if (isBlank(inputSubject)) {
                           inputSubject.focus();
                           jQuery("#inputSubject").addClass("formInputContantTbAlertY");
                           return false;
                        } else {
                           jQuery("#inputSubject").removeClass("formInputContantTbAlertY");
                        }
<? } ?>

                     // if(isBlank(inputLang)) {
                     // 	inputLang.focus();
                     // 	jQuery("#inputLang").addClass("formInputContantTbAlertY");
                     // 	return false;
                     // }else{
                     // 	jQuery("#inputLang").removeClass("formInputContantTbAlertY");
                     // }

                     if (isBlank(inputDescription)) {
                        inputDescription.focus();
                        jQuery("#inputDescription").addClass("formInputContantTbAlertY");
                        return false;
                     } else {
                        jQuery("#inputDescription").removeClass("formInputContantTbAlertY");
                     }


                     // var alleditDetail = CKEDITOR.instances.editDetail.getData();
                     // if(alleditDetail=="") {
                     // 		jQuery("#inputEditHTML").addClass("formInputContantTbAlertY");
                     // 		window.location.hash = '#inputEditHTML';
                     // 		return false;
                     // }else{
                     // 		jQuery("#inputEditHTML").removeClass("formInputContantTbAlertY");
                     // }
                     // 	jQuery('#inputHtml').val(alleditDetail);


                  }

                  updateContactNew('updateContant.php');

               }


               function loadCheckUser() {
                  with (document.myForm) {
                     var inputValuename = document.myForm.inputUserName.value;
                  }
                  if (inputValuename != '') {
                     checkUsermember(inputValuename);
                  }
               }



               // jQuery(document).ready(function(){

               //   jQuery('#myForm').keypress(function(e) {
               //     /* Start  Enter Check CKeditor */
               // 	var focusManager = new CKEDITOR.focusManager( editDetail );
               // 	var checkFocus =CKEDITOR.instances.editDetail.focusManager.hasFocus;
               // 	var checkFocusTitle =jQuery("#inputDescription").is(":focus");

               //     if (e.which == 13) {
               // 		//e.preventDefault();
               // 			if(!checkFocusTitle){
               // 				if(!checkFocus){
               // 					executeSubmit();
               // 					return false;
               // 				}
               // 		}
               //     }
               //  	/* End  Enter Check CKeditor */
               //   });
               // });
            </script>
            </head>

            <body>
               <form action="?" method="get" name="myForm" id="myForm" enctype="multipart/form-data">
                  <input name="execute" type="hidden" id="execute" value="update" />
                  <input name="masterkey" type="hidden" id="masterkey" value="<?= $_REQUEST['masterkey'] ?>" />
                  <input name="menukeyid" type="hidden" id="menukeyid" value="<?= $_REQUEST['menukeyid'] ?>" />
                  <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?= $_REQUEST['module_pageshow'] ?>" />
                  <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?= $_REQUEST['module_pagesize'] ?>" />
                  <input name="module_orderby" type="hidden" id="module_orderby" value="<?= $_REQUEST['module_orderby'] ?>" />

                  <input name="valEditID" type="hidden" id="valEditID" value="<?= $_REQUEST['valEditID'] ?>" />
                  <input name="inputLt" type="hidden" id="inputLt" value="<?= $_REQUEST['inputLt'] ?>" />

                  <input name="valDelFile" type="hidden" id="valDelFile" value="" />
                  <input name="valDelAlbum" type="hidden" id="valDelAlbum" value="" />
                  <input name="valDelPic" type="hidden" id="valDelPic" value="" />
                  <input name="inputHtml" type="hidden" id="inputHtml" value="" />
                  <input name="inputHtmlDel" type="hidden" id="inputHtmlDel" value="<?= $valhtmlname ?>" />
                  <input name="inputSubjectOld" type="hidden" id="inputSubjectOld" value="<?= $valKey ?>"/>

                  <?php include_once './inc-inputsearch.php'; ?>
                  <div class="divRightNav">
                     <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
                        <tr>
                           <td class="divRightNavTb" align="left" id="defTop"><span class="fontContantTbNav"><a href="<?= $valLinkNav1 ?>" target="_self"><?= $valNav1 ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a href="javascript:void(0)" onclick="btnBackPage('index.php')" target="_self"><?= $langMod["tit:inpName"] ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?= $langMod["txt:titleedit"] ?><? if ($_SESSION[$valSiteManage . 'core_session_languageT'] == 2 || $_SESSION[$valSiteManage . 'core_session_languageT'] == 3) { ?>(<?= getSystemLangTxt($_REQUEST['inputLt'], $langTxt["lg:thai"], $langTxt["lg:eng"]) ?>)<? } ?></span></td>
                           <td class="divRightNavTb" align="right">



                           </td>
                        </tr>
                     </table>
                  </div>
                  <div class="divRightHead">
                     <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center">
                        <tr>
                           <td height="77" align="left"><span class="fontHeadRight"><?= $langMod["txt:titleedit"] ?></span></td>
                           <td align="left">
                              <table border="0" cellspacing="0" cellpadding="0" align="right">
                                 <tr>
                                    <td align="right">
                                       <? if ($valPermission == "RW" || $valLevelPermission == "SuperAdmin") { ?>
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
                              <span class="formFontSubjectTxt"><?= $langTxt["st:titleLangDisplay"] ?> </span><br />
                              <span class="formFontTileTxt"><?= $langTxt["st:titleDeLang"] ?></span>
                           </td>
                        </tr>
                        <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>
                        <tr >
                           <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["tit:keylang"] ?><span class="fontContantAlert">*</span></td>
                           <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputSubject" id="inputSubject" type="text"  class="formInputContantTb" value="<?= $valKey ?>" <? if ($valLevelPermission != "SuperAdmin") { ?>disabled="disabled" <? } ?>/><br />
                              <span class="formInputContantTbAlertYcheck" id="alert_inputSubject" style="display:none;"></span></td>
                        </tr>
                        <tr >
                           <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["tit:title"] ?><span class="fontContantAlert">*</span></td>
                           <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputDescription" id="inputDescription" type="text"  class="formInputContantTb"  value="<?= $valTitle ?>"/></td>
                        </tr>

                        <tr >
                           <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= $langMod["txt:typeinput"] ?></td>
                           <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                              <label>
                                 <div class="formDivRadioL"><input name="inputTypeInput" id="inputTypeInput" value="0" type="radio" class="formRadioContantTb" <? if ($valTypeInputShow != 1) { ?> checked="checked" <? } ?> onclick="jQuery('.typeinput_1').show();jQuery('.typeinput_2').hide();"  <? if ($valLevelPermission != "SuperAdmin") { ?>disabled="disabled" <? } ?> /></div>
                                 <div class="formDivRadioR"><?= $modTxtTypeInputShow[0] ?></div>
                              </label>

                              <label>
                                 <div class="formDivRadioL"><input name="inputTypeInput" id="inputTypeInput" value="1" type="radio" class="formRadioContantTb" <? if ($valTypeInputShow == 1) { ?> checked="checked" <? } ?>   onclick="jQuery('.typeinput_1').hide();jQuery('.typeinput_2').show();"   <? if ($valLevelPermission != "SuperAdmin") { ?>disabled="disabled" <? } ?>/></div>
                                 <div class="formDivRadioR"><?= $modTxtTypeInputShow[1] ?></div>
                              </label>
                              </label>
                           </td>
                        </tr>

                        <?
                        foreach ($arrLang as $key => $value) {
                           ?>
                           <tr>
                              <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= number_format($key + 1) ?>. <?= $langMod["tit:subject_lang"] ?> (<?= $arrLang[$key]['key'] ?>)<span class="fontContantAlert"></span></td>
                              <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                                 <input name="inputLang[<?= $arrLang[$key]['key'] ?>]" id="inputLang" type="text" class="formInputContantTbShot typeinput_1" value="<?= $valDisplay[$arrLang[$key]['key']] ?>" />
                                 <div class="typeinput_2">
                                    <div class="file-input-wrapper">
                                       <button class="btn-file-input"><?= $langTxt["us:inputpicselect"] ?></button>
                                       <input type="file" name="fileToUpload_<?= $arrLang[$key]['key'] ?>" id="fileToUpload_<?= $arrLang[$key]['key'] ?>" onchange="ajaxFileUpload('<?= $arrLang[$key]['key'] ?>')" />
                                    </div>
                                    <div class="clearAll"></div>
                                    <div id="boxPicNew_<?= $arrLang[$key]['key'] ?>" class="formFontTileTxt" style="margin-top:10px;">
   <?
   $valPicName = $valDisplay[$arrLang[$key]['key']];
   $valPic = $mod_path_pictures . "/" . $valPicName;
   if ($valPic != '') {
      if (is_file($valPic)) {
         ?>
                                             <img src="<?= $valPic ?>" style="float:left;border:#c8c7cc solid 1px;max-width:600px;min-width:60px;" />
                                             <div style="width:22px; height:22px;float:left;z-index:1; margin-left:-22px;cursor:pointer;" onclick="$('#valDelPic').val('<?= $arrLang[$key]['key'] ?>');
                                                   delPicUploadLang('deletePic.php');
                                                   " title="Delete file"><img src="../img/btn/delete.png" width="22" height="22" border="0" /></div>
      <? }
   } ?>
                                    </div>
                                    <input type="hidden" name="picname_<?= $arrLang[$key]['key'] ?>" id="picname_<?= $arrLang[$key]['key'] ?>" value="<?= $valPicName ?>" />
                                 </div>

                              </td>
                           </tr>

                           <?
                           $i++;
                        }
                        ?>
                        <tr>
                           <td colspan="7" align="right" valign="top" height="15"></td>
                        </tr>


            <!-- <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= $langMod["tit:subject"] ?><span class="fontContantAlert">*</span></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputSubject" id="inputSubject" type="text" class="formInputContantTb" value="<?= $valSubject ?>" /></td>
            </tr>
            <tr>
               <td align="right" valign="top" class="formLeftContantTb"><?= $langMod["tit:title"] ?><span class="fontContantAlert"></span></td>
               <td colspan="6" align="left" valign="top" class="formRightContantTb">
                  <textarea name="inputDescription" id="inputDescription" cols="45" rows="5" class="formTextareaContantTb"><?= $valTitle ?></textarea>
               </td>
            </tr> -->

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
<? include("../lib/disconnect.php"); ?>
               <script type="text/javascript" src="../js/ajaxfileupload.js"></script>
               <script language="JavaScript" type="text/javascript">
                                       $(document).ready(function () {
<?php
if ($valTypeInputShow != 1) {
   ?>
                                             jQuery('.typeinput_1').show();
                                             jQuery('.typeinput_2').hide();
   <?php
} else {
   ?>
                                             jQuery('.typeinput_1').hide();
                                             jQuery('.typeinput_2').show();
   <?php
}
?>
                                       });

                                       /*################################# Upload Pic #######################*/
                                       function ajaxFileUpload(typeData) {
                                          var valuepicname = jQuery("input#picname_" + typeData).val();

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
                                             url: 'loadUpdatePic.php?myID=<?php echo $_POST["valEditID"] ?>&masterkey=<?php echo $_REQUEST['masterkey'] ?>&langt=<?php echo $_REQUEST['inputLt'] ?>&delpicname=' + valuepicname + '&menuid=<?php echo $_REQUEST['menukeyid'] ?>&pic_type=' + typeData + '',
                                             secureuri: false,
                                             fileElementId: 'fileToUpload_' + typeData,
                                             dataType: 'json',
                                             success: function (data, status) {
                                                if (typeof (data.error) != 'undefined') {
                                                   if (data.error != '') {
                                                      alert(data.error);
                                                   } else {
                                                      var masterkey_pic = $("#masterkey").val();
                                                      var path_pic = '../../upload/' + masterkey_pic + '/pictures/' + data.picname + '';
                                                      var htmlpic = '<img src="' + path_pic + '" style="float:left;border:#c8c7cc solid 1px;max-width:600px;min-width:60px;" /><div style="width:22px; height:22px;float:left;z-index:1; margin-left:-22px;cursor:pointer;" onclick="$(\'#valDelPic\').val(\'' + typeData + '\');delPicUploadLang(\'deletePic.php\');" title="Delete file"><img src="../img/btn/delete.png" width="22" height="22" border="0" /></div>';
                                                      jQuery("#boxPicNew_" + typeData).html(htmlpic);
                                                      jQuery("#boxPicNew_" + typeData).show();
                                                      jQuery("#picname_" + typeData).val(data.picname);
                                                      setTimeout(jQuery.unblockUI, 200);
                                                   }
                                                }
                                             },
                                             error: function (data, status, e) {
                                                alert(e);
                                             }
                                          })
                                          return false;

                                       }

               </script>

            </body>

            </html>