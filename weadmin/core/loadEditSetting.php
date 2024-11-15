<?
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("../core/incLang.php");

$valClassNav = 2;
$valNav1 = $langTxt["nav:home2"];
$valLinkNav1 = "../core/index.php";
$valNav2 = $langTxt["nav:setting"];

$sql = "SELECT
		" . $core_tb_setting . "_id ,
		" . $core_tb_setting . "_lang,
		" . $core_tb_setting . "_type,
		" . $core_tb_setting . "_subject,
		" . $core_tb_setting . "_title  ,
		" . $core_tb_setting . "_titleB ,
        " . $core_tb_setting . "_pic ,
        " . $core_tb_setting . "_header ,
        " . $core_tb_setting . "_bg

		FROM " . $core_tb_setting . " WHERE " . $core_tb_setting . "_id>=1 ";
$query = wewebQueryDB($coreLanguageSQL, $sql);
$row = wewebFetchArrayDB($coreLanguageSQL, $query);
$valId = $row[0];
$valLang = $row[1];
$valType = $row[2];
$valSubject = rechangeQuot($row[3]);
$valTitle = rechangeQuot($row[4]);
$valTitleB = rechangeQuot($row[5]);
$valPicName = $row[6];
$valPic = $core_pathname_crupload . "/" . $row[6];
$valHeaderName = $row[7];
$valHeader = $core_pathname_crupload . "/" . $row[7];
$valBgName = $row[8];
$valBg = $core_pathname_crupload . "/" . $row[8];
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
                  with (document.myForm) {
                     if (isBlank(inputSubject)) {
                        inputSubject.focus();
                        jQuery("#inputSubject").addClass("formInputContantTbAlertY");
                        return false;
                     } else {
                        jQuery("#inputSubject").removeClass("formInputContantTbAlertY");
                     }

                     if (isBlank(inputTitle)) {
                        inputTitle.focus();
                        jQuery("#inputTitle").addClass("formInputContantTbAlertY");
                        return false;
                     } else {
                        jQuery("#inputTitle").removeClass("formInputContantTbAlertY");
                     }

                     if (isBlank(inputTitleB)) {
                        inputTitleB.focus();
                        jQuery("#inputTitleB").addClass("formInputContantTbAlertY");
                        return false;
                     } else {
                        jQuery("#inputTitleB").removeClass("formInputContantTbAlertY");
                     }

                  }

                  updateContactNew('../core/updateSetting.php');
               }

               jQuery(document).ready(function () {

                  jQuery('#myForm').keypress(function (e) {
                     if (e.which == 13) {
                        //e.preventDefault();
                        executeSubmit();
                        return false;
                     }
                  });
               });
            </script>
            </head>

            <body>
               <form action="?" method="get" name="myForm" id="myForm" enctype="multipart/form-data">
                  <input name="execute" type="hidden" id="execute" value="update" />
                  <input name="masterkey" type="hidden" id="masterkey" value="<?= $_REQUEST['masterkey'] ?>" />
                  <input name="menukeyid" type="hidden" id="menukeyid" value="<?= $_REQUEST['menukeyid'] ?>" />
                  <input name="myParentID" type="hidden" id="myParentID" value="<?= $_REQUEST['myParentID'] ?>" />
                  <input name="valEditID" type="hidden" id="valEditID" value="<?= $_REQUEST['valEditID'] ?>" />
                  <input name="inputSearch" type="hidden" id="inputSearch" value="<?= $_REQUEST['inputSearch'] ?>" />
                  <input name="valDelFile" type="hidden" id="valDelFile" value="" />

                  <div class="divRightNav">
                     <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
                        <tr>
                           <td class="divRightNavTb" align="left" id="defTop"><span class="fontContantTbNav"><a href="<?= $valLinkNav1 ?>" target="_self"><?= $valNav1 ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a href="javascript:void(0)" onclick="btnBackPage('../core/setting.php')" target="_self"><?= $valNav2 ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?= $langTxt["st:edit"] ?></span></td>
                           <td class="divRightNavTb" align="right">



                           </td>
                        </tr>
                     </table>
                  </div>
                  <div class="divRightHead">
                     <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center">
                        <tr>
                           <td height="77" align="left"><span class="fontHeadRight"><?= $langTxt["st:edit"] ?></span></td>
                           <td align="left">
                              <table border="0" cellspacing="0" cellpadding="0" align="right">
                                 <tr>
                                    <td align="right">
                                       <div class="btnSave" title="<?= $langTxt["btn:save"] ?>" onclick="executeSubmit();"></div>
                                       <div class="btnBack" title="<?= $langTxt["btn:back"] ?>" onclick="btnBackPage('../core/setting.php')"></div>
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
                              <span class="formFontSubjectTxt"><?= $langTxt["st:title"] ?></span><br />
                              <span class="formFontTileTxt"><?= $langTxt["st:titleDe"] ?></span>
                           </td>
                        </tr>



                        <tr >
                           <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langTxt["st:lang"] ?><span class="fontContantAlert">*</span></td>
                           <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                              <label>
                                 <div class="formDivRadioL"><input name="inputLang" id="inputLang" type="radio" class="formRadioContantTb" <? if ($valLang == "Thai") { ?>checked="checked"<? } ?> value="Thai" /></div>
                                 <div class="formDivRadioR"><?= $langTxt["st:thai"] ?></div>
                              </label>

                              <label>
                                 <div class="formDivRadioL"><input name="inputLang" id="inputLang" type="radio" class="formRadioContantTb"  <? if ($valLang == "Eng") { ?>checked="checked"<? } ?> value="Eng" /></div>
                                 <div class="formDivRadioR"><?= $langTxt["st:eng"] ?></div>
                              </label>
                           </td>
                        </tr>
                        <tr >
                           <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langTxt["st:type"] ?><span class="fontContantAlert">*</span></td>
                           <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                              <label>
                                 <div class="formDivRadioL"><input name="inputType" id="inputType" type="radio" class="formRadioContantTb" <? if ($valType == "1") { ?>checked="checked"<? } ?> value="1" /></div>
                                 <div class="formDivRadioR"><?= $langTxt["st:1"] ?></div>
                              </label>

                              <label>
                                 <div class="formDivRadioL"><input name="inputType" id="inputType" type="radio" class="formRadioContantTb"  <? if ($valType == "2") { ?>checked="checked"<? } ?> value="2" /></div>
                                 <div class="formDivRadioR"><?= $langTxt["st:2"] ?></div>
                              </label>
                           </td>
                        </tr>

                     </table>
                     <br />
                     <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                        <tr>
                           <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                              <span class="formFontSubjectTxt"><?= $langTxt["st:titleLang"] ?></span><br />
                              <span class="formFontTileTxt"><?= $langTxt["st:titleDeLang"] ?></span>
                           </td>
                        </tr>
                        <tr>
                           <td colspan="7" align="right" valign="top">
                              <div id="boxMailContact">
                                 <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
                                    <?
                                    $sql = "SELECT " . $core_tb_lang . "_id," . $core_tb_lang . "_subject FROM " . $core_tb_lang . " ORDER BY " . $core_tb_lang . "_id ASC ";
                                    $query = wewebQueryDB($coreLanguageSQL, $sql);
                                    $numRowCount = wewebNumRowsDB($coreLanguageSQL, $query);
                                    if ($numRowCount >= 1) {
                                       $num_email = 0;
                                       while ($row = wewebFetchArrayDB($coreLanguageSQL, $query)) {
                                          $num_email++;
                                          $valEmailNew = rechangeQuot($row[1]);
                                          $valEmailID = $row[0];
                                          ?>
                                          <tr>
                                             <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= number_format($num_email) ?>.<span class="fontContantAlert"></span></td>
                                             <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                                                <div class="formDivView">
                                                   <a href="javascript:void(0)" onclick="document.myForm.valDelFile.value =<?= $valEmailID ?>;modDelEmail('deleteLang.php','#boxMailContact')"><img src="../img/btn/delete.png" align="absmiddle" title="Delete email" hspace="5" border="0" /></a> <?= $valEmailNew ?>
                                                </div>
                                             </td>
                                          </tr>

                                       <? }
                                    }
                                    ?>
                                 </table>
                              </div>

                              <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
                                 <tr>
                                    <td width="18%" align="right" valign="top" class="formLeftContantTb" style="padding-top:10px;"><?= $langTxt["tit:selectlang"] ?>:<span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                                       <table border="0" cellspacing="0" cellpadding="0">

                                          <tr>
                                             <td><input name="inputEmail" id="inputEmail" type="text" class="formInputContantTbShot" value="<?= $inputEmail ?>" /></td>

                                             <td>
                                                <div class="btnAdd2" title="<?= $langTxt["btn:add"] ?>" onclick="executeAddEmail();"></div>
                                             </td>
                                          </tr>

                                       </table>

                                       <span class="formFontNoteTxt" style="color:#FF0000;display:none;" id="boxAlertEmail"><?= $langMod["ats:email"] ?></span>
                                    </td>
                                 </tr>
                              </table>
                           </td>
                        </tr>
                     </table><br/>

                     <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                        <tr>
                           <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                              <span class="formFontSubjectTxt"><?= $langTxt["st:titleLang"] ?></span><br />
                              <span class="formFontTileTxt"><?= $langTxt["st:titleDeLang"] ?></span>
                           </td>
                        </tr>
                        <tr>
                           <td colspan="7" align="right" valign="top">
                              <div id="boxMailContact2">
                                 <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
                                    <?
                                    $sql = "SELECT " . $core_tb_langgoo . "_id," . $core_tb_langgoo . "_subject FROM " . $core_tb_langgoo . " ORDER BY " . $core_tb_langgoo . "_id ASC ";
                                    $query = wewebQueryDB($coreLanguageSQL, $sql);
                                    $numRowCount = wewebNumRowsDB($coreLanguageSQL, $query);
                                    if ($numRowCount >= 1) {
                                       $num_email = 0;
                                       while ($row = wewebFetchArrayDB($coreLanguageSQL, $query)) {
                                          $num_email++;
                                          $valEmailNew = rechangeQuot($row[1]);
                                          $valEmailID = $row[0];
                                          ?>
                                          <tr>
                                             <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= number_format($num_email) ?>.<span class="fontContantAlert"></span></td>
                                             <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                                                <div class="formDivView">
                                                   <a href="javascript:void(0)" onclick="document.myForm.valDelFile.value =<?= $valEmailID ?>;modDelEmail('deleteLanggoo.php','#boxMailContact2')"><img src="../img/btn/delete.png" align="absmiddle" title="Delete email" hspace="5" border="0" /></a> <?= $valEmailNew ?>
                                                </div>
                                             </td>
                                          </tr>

                                       <? }
                                    }
                                    ?>
                                 </table>
                              </div>

                              <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
                                 <tr>
                                    <td width="18%" align="right" valign="top" class="formLeftContantTb" style="padding-top:10px;"><?= $langTxt["tit:selectlang"] ?>:<span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                                       <table border="0" cellspacing="0" cellpadding="0">

                                          <tr>
                                             <td><input name="inputLanggoo" id="inputLanggoo" type="text" class="formInputContantTbShot" value="" /></td>

                                             <td>
                                                <div class="btnAdd2" title="<?= $langTxt["btn:add"] ?>" onclick="executeAddEmail2();"></div>
                                             </td>
                                          </tr>

                                       </table>

                                       <span class="formFontNoteTxt" style="color:#FF0000;display:none;" id="boxAlertEmail2"><?= $langMod["ats:email"] ?></span>
                                    </td>
                                 </tr>
                              </table>
                           </td>
                        </tr>
                     </table><br/>

                     <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                        <tr>
                           <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                              <span class="formFontSubjectTxt"><?= $langTxt["txt:about"] ?></span><br />
                              <span class="formFontTileTxt"><?= $langTxt["txt:aboutDe"] ?></span>
                           </td>
                        </tr>
                        <tr>
                           <td colspan="7" align="right" valign="top" height="15"></td>
                        </tr>
                        <tr>
                           <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= $langTxt["ab:subject"] ?><span class="fontContantAlert">*</span></td>
                           <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputSubject" id="inputSubject" type="text" class="formInputContantTb" value="<?= $valSubject ?>" /></td>
                        </tr>
                        <tr>
                           <td align="right" valign="top" class="formLeftContantTb"><?= $langTxt["ab:title"] ?><span class="fontContantAlert">*</span></td>
                           <td colspan="6" align="left" valign="top" class="formRightContantTb">
                              <input name="inputTitle" id="inputTitle" type="text" class="formInputContantTb" value="<?= $valTitle ?>" />
                           </td>
                        </tr>
                        <tr>
                           <td align="right" valign="top" class="formLeftContantTb"><?= $langTxt["ab:titleback"] ?><span class="fontContantAlert">*</span></td>
                           <td colspan="6" align="left" valign="top" class="formRightContantTb">
                              <input name="inputTitleB" id="inputTitleB" type="text" class="formInputContantTb" value="<?= $valTitleB ?>" />
                           </td>
                        </tr>

                     </table>
                     <br />
                     <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                        <tr>
                           <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                              <span class="formFontSubjectTxt"><?= $langTxt["txt:pic"] ?></span><br />
                              <span class="formFontTileTxt"><?= $langTxt["txt:picDe"] ?></span>
                           </td>
                        </tr>
                        <tr>
                           <td colspan="7" align="right" valign="top" height="15"></td>
                        </tr>

                        <tr>
                           <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= $langTxt["inp:album"] ?></td>
                           <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                              <div class="file-input-wrapper">
                                 <button class="btn-file-input"><?= $langTxt["us:inputpicselect"] ?></button>
                                 <input type="file" name="fileToUpload" id="fileToUpload" onchange="ajaxFileUpload();" />
                              </div>

                              <span class="formFontNoteTxt"><?= $langTxt["inp:notepic"] ?></span>
                              <div class="clearAll"></div>
                              <div id="boxPicNew" class="formFontTileTxt">
<? if (is_file($valPic)) { ?>
                                    <img src="<?= $valPic ?>" style="float:left;border:#c8c7cc solid 1px;max-width:600px;" />
                                    <div style="width:22px; height:22px;float:left;z-index:1; margin-left:-22px;cursor:pointer;" onclick="delPicUpload('deletePic.php')" title="Delete file"><img src="../img/btn/delete.png" width="22" height="22" border="0" /></div>
                                    <input type="hidden" name="picname" id="picname" value="<?= $valPicName ?>" />
<? } ?>
                              </div>
                           </td>
                        </tr>
                     </table>

                     <br />
                     <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                        <tr>
                           <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                              <span class="formFontSubjectTxt"><?= $langTxt["txt:pic2"] ?></span><br />
                              <span class="formFontTileTxt"><?= $langTxt["txt:pic2De"] ?></span>
                           </td>
                        </tr>
                        <tr>
                           <td colspan="7" align="right" valign="top" height="15"></td>
                        </tr>

                        <tr>
                           <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= $langTxt["inp:album"] ?></td>
                           <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                              <div class="file-input-wrapper">
                                 <button class="btn-file-input"><?= $langTxt["us:inputpicselect"] ?></button>
                                 <input type="file" name="fileToUpload2" id="fileToUpload2" onchange="ajaxFileUpload2();" />
                              </div>

                              <span class="formFontNoteTxt"><?= $langTxt["inp:notepic2"] ?></span>
                              <div class="clearAll"></div>
                              <div id="boxPicNew2" class="formFontTileTxt">
<? if (is_file($valHeader)) { ?>
                                    <img src="<?= $valHeader ?>" style="float:left;border:#c8c7cc solid 1px;max-width:600px;" />
                                    <div style="width:22px; height:22px;float:left;z-index:1; margin-left:-22px;cursor:pointer;" onclick="delPicUploadSite('deletePic2.php', 'boxPicNew2')" title="Delete file"><img src="../img/btn/delete.png" width="22" height="22" border="0" /></div>
                                    <input type="hidden" name="picheader" id="picheader" value="<?= $valHeaderName ?>" />
<? } ?>
                              </div>
                           </td>
                        </tr>
                     </table>
                     <br />
                     <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                        <tr>
                           <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                              <span class="formFontSubjectTxt"><?= $langTxt["txt:pic3"] ?></span><br />
                              <span class="formFontTileTxt"><?= $langTxt["txt:pic3De"] ?></span>
                           </td>
                        </tr>
                        <tr>
                           <td colspan="7" align="right" valign="top" height="15"></td>
                        </tr>

                        <tr>
                           <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= $langTxt["inp:album"] ?></td>
                           <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                              <div class="file-input-wrapper">
                                 <button class="btn-file-input"><?= $langTxt["us:inputpicselect"] ?></button>
                                 <input type="file" name="fileToUpload3" id="fileToUpload3" onchange="ajaxFileUpload3();" />
                              </div>

                              <span class="formFontNoteTxt"><?= $langTxt["inp:notepic3"] ?></span>
                              <div class="clearAll"></div>
                              <div id="boxPicNew3" class="formFontTileTxt">
<? if (is_file($valBg)) { ?>
                                    <img src="<?= $valBg ?>" style="float:left;border:#c8c7cc solid 1px;max-width:600px;" />
                                    <div style="width:22px; height:22px;float:left;z-index:1; margin-left:-22px;cursor:pointer;" onclick="delPicUploadSite('deletePic3.php', 'boxPicNew3')" title="Delete file"><img src="../img/btn/delete.png" width="22" height="22" border="0" /></div>
                                    <input type="hidden" name="picbg" id="picbg" value="<?= $valBgName ?>" />
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
                           <td colspan="7" align="right" valign="middle" class="formEndContantTb"><a href="#defTop" title="<?= $langTxt["btn:gototop"] ?>"><?= $langTxt["btn:gototop"] ?> <img src="../img/btn/top.png" align="absmiddle" /></a></td>
                        </tr>
                     </table>
                  </div>
               </form>
               <script type="text/javascript" src="../js/ajaxfileupload.js"></script>
               <script type="text/javascript" language="javascript">

                                    function modInsertEmail(fileAc,display) {

                                       jQuery.blockUI({
                                          message: jQuery('#tallContent'),
                                          css: {border: 'none', padding: '35px', backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
                                          }
                                       });


                                       var TYPE = "POST";
                                       var URL = fileAc;

                                       var dataSet = jQuery("#myForm").serialize();

                                       jQuery.ajax({type: TYPE, url: URL, data: dataSet,
                                          success: function (html) {

                                             jQuery(display).show();
                                             jQuery(display).html(html);
                                             setTimeout(jQuery.unblockUI, 200);

                                          }
                                       });
                                    }


                                    function modDelEmail(fileAc,display) {

                                       jQuery.blockUI({
                                          message: jQuery('#tallContent'),
                                          css: {border: 'none', padding: '35px', backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
                                          }
                                       });


                                       var TYPE = "POST";
                                       var URL = fileAc;

                                       var dataSet = jQuery("#myForm").serialize();

                                       jQuery.ajax({type: TYPE, url: URL, data: dataSet,
                                          success: function (html) {

                                             jQuery(display).show();
                                             jQuery(display).html(html);
                                             setTimeout(jQuery.unblockUI, 200);

                                          }
                                       });
                                    }
                                    function executeAddEmail() {
                                       with (document.myForm) {
                                          jQuery("#boxAlertEmail").hide();
                                          if (isBlank(inputEmail)) {
                                             inputEmail.focus();
                                             jQuery("#inputEmail").addClass("formInputContantTbAlertY");
                                             return false;
                                          } else {
                                             jQuery("#inputEmail").removeClass("formInputContantTbAlertY");
                                          }



                                       }
                                       modInsertEmail('insertLang.php',"#boxMailContact");

                                    }

                                    function executeAddEmail2() {
                                       with (document.myForm) {
                                          jQuery("#boxAlertEmail2").hide();
                                          if (isBlank(inputLanggoo)) {
                                             inputLanggoo.focus();
                                             jQuery("#inputLanggoo").addClass("formInputContantTbAlertY");
                                             return false;
                                          } else {
                                             jQuery("#inputLanggoo").removeClass("formInputContantTbAlertY");
                                          }



                                       }
                                       modInsertEmail('insertLanggoo.php','#boxMailContact2');

                                    }

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
                                          url: 'loadUpdatePic.php?myID=<?= $valId ?>&delpicname=' + valuepicname + '',
                                          secureuri: false,
                                          fileElementId: 'fileToUpload',
                                          dataType: 'json',
                                          success: function (data, status) {
                                             if (typeof (data.error) != 'undefined') {

                                                if (data.error != '') {
                                                   alert(data.error);

                                                } else {
                                                   jQuery("#boxPicNew").show();
                                                   jQuery("#boxPicNew").html(data.msg);
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



                                    /*################################# Upload Pic Header#######################*/
                                    function ajaxFileUpload2() {
                                       var valuepicname = jQuery("input#picheader").val();

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
                                          url: 'loadUpdatePic2.php?myID=<?= $valId ?>&delpicname=' + valuepicname + '',
                                          secureuri: false,
                                          fileElementId: 'fileToUpload2',
                                          dataType: 'json',
                                          success: function (data, status) {
                                             if (typeof (data.error) != 'undefined') {

                                                if (data.error != '') {
                                                   alert(data.error);

                                                } else {
                                                   jQuery("#boxPicNew2").show();
                                                   jQuery("#boxPicNew2").html(data.msg);
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
                                    /*################################# Upload Pic BG#######################*/
                                    function ajaxFileUpload3() {
                                       var valuepicname = jQuery("input#picbg").val();

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
                                          url: 'loadUpdatePic3.php?myID=<?= $valId ?>&delpicname=' + valuepicname + '',
                                          secureuri: false,
                                          fileElementId: 'fileToUpload3',
                                          dataType: 'json',
                                          success: function (data, status) {
                                             if (typeof (data.error) != 'undefined') {

                                                if (data.error != '') {
                                                   alert(data.error);

                                                } else {
                                                   jQuery("#boxPicNew3").show();
                                                   jQuery("#boxPicNew3").html(data.msg);
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


<? include("../lib/disconnect.php"); ?>

            </body>

            </html>