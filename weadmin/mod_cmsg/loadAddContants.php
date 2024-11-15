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

// $myRand = time().rand(111,999);
$myRand = randomNameUpdate(2);
$valPermission = getUserPermissionOnMenu($_SESSION[$valSiteManage . "core_session_groupid"], $_POST["menukeyid"]);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" />
      <meta name="robots" content="noindex, nofollow"/>
      <meta name="googlebot" content="noindex, nofollow"/>
      <link href="../css/theme.css" rel="stylesheet"/>
      <link href="js/uploadfile.css" rel="stylesheet"/>

      <title><?php echo $core_name_title ?></title>

      <script language="JavaScript"  type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
      <script language="JavaScript" type="text/javascript">
         function executeSubmit() {
            with (document.myForm) {

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

               if (isBlank(inputDescription)) {
                  inputDescription.focus();
                  jQuery("#inputDescription").addClass("formInputContantTbAlertY");
                  return false;
               } else {
                  jQuery("#inputDescription").removeClass("formInputContantTbAlertY");
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


            insertContactNew('insertContant.php');

         }


         jQuery(document).ready(function () {

            jQuery('#myForm').keypress(function (e) {
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
      <form action="?" method="get" name="myForm" id="myForm"   enctype="multipart/form-data">
         <input name="execute" type="hidden" id="execute" value="insert" />
         <input name="masterkey" type="hidden" id="masterkey" value="<?php echo $_REQUEST['masterkey'] ?>" />
         <input name="menukeyid" type="hidden" id="menukeyid" value="<?php echo $_REQUEST['menukeyid'] ?>" />
         <input name="inputSearch" type="hidden" id="inputSearch" value="<?php echo $_REQUEST['inputSearch'] ?>" />
         <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php echo $_REQUEST['module_pageshow'] ?>" />
         <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php echo $_REQUEST['module_pagesize'] ?>" />
         <input name="module_orderby" type="hidden" id="module_orderby" value="<?php echo $_REQUEST['module_orderby'] ?>" />
         <input name="inputGh" type="hidden" id="inputGh" value="<?php echo $_REQUEST['inputGh'] ?>" />
         <input name="valEditID" type="hidden" id="valEditID" value="<?php echo $myRand ?>" />
         <input name="valDelFile" type="hidden" id="valDelFile" value="" />
         <input name="valDelAlbum" type="hidden" id="valDelAlbum" value="" />
         <input name="inputHtml" type="hidden" id="inputHtml" value="" />
         <input name="inputHtmlDel" type="hidden" id="inputHtmlDel" value="<?php echo $valhtmlname ?>" />
         <input name="inputLt" type="hidden" id="inputLt" value="<?php echo $_REQUEST['inputLt'] ?>" />
         <input name="sdateInputSe" type="hidden" id="sdateInputSe" value="<?php echo $_REQUEST['sdateInput'] ?>" />
         <input name="edateInputSe" type="hidden" id="edateInputSe" value="<?php echo $_REQUEST['edateInput'] ?>" />
         <input name="inputG2" type="hidden" id="inputG2" value="<?php echo $_REQUEST['inputG2'] ?>" />

         <div class="divRightNav">
            <table width="96%" border="0" cellspacing="0" cellpadding="0"  align="center" >
               <tr>
                  <td  class="divRightNavTb" align="left"  id="defTop" ><span class="fontContantTbNav"><a href="<?php echo $valLinkNav1 ?>" target="_self"><?php echo $valNav1 ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a  href="javascript:void(0)"  onclick="btnBackPage('index.php')" target="_self"><?php echo $langMod["tit:inpName"] ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?php echo $langMod["txt:titleadd"] ?><?php if ($_SESSION[$valSiteManage . 'core_session_languageT'] == 2 || $_SESSION[$valSiteManage . 'core_session_languageT'] == 3) { ?>(<?php echo $langTxt["lg:thai"] ?>)<?php } ?></span></td>
                  <td  class="divRightNavTb" align="right">



                  </td>
               </tr>
            </table>
         </div>
         <div class="divRightHead">
            <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
               <tr>
                  <td height="77" align="left"><span class="fontHeadRight"><?php echo $langMod["txt:titleadd"] ?><?php if ($_SESSION[$valSiteManage . 'core_session_languageT'] == 2 || $_SESSION[$valSiteManage . 'core_session_languageT'] == 3) { ?>(<?php echo $langTxt["lg:thai"] ?>)<?php } ?></span></td>
                  <td align="left">
                     <table  border="0" cellspacing="0" cellpadding="0" align="right">
                        <tr>
                           <td align="right">
                              <?php if ($valPermission == "RW") { ?>
                                 <div  class="btnSave" title="<?php echo $langTxt["btn:save"] ?>" onclick="executeSubmit();"></div>
                              <?php } ?>
                              <div  class="btnBack" title="<?php echo $langTxt["btn:back"] ?>" onclick="btnBackPage('index.php')"></div>
                           </td>
                        </tr>
                     </table>
                  </td>
               </tr>
            </table>
         </div>
         <div class="divRightMain" >
            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
               <tr >
                  <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                     <span class="formFontSubjectTxt"><?php echo $langMod["txt:subject"] ?></span><br/>
                     <span class="formFontTileTxt"><?php echo $langMod["txt:subjectDe"] ?></span>    </td>
               </tr>
               <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>

               <tr>
                  <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["tit:selectgn"] ?><span class="fontContantAlert">*</span></td>
                  <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                     <select name="inputGroupID"  id="inputGroupID"class="formSelectContantTb" >
                        <option value="0">เลือกปีงบประมาณ</option>
                        <?php
                        $sql_group = "SELECT ";
                        if ($_REQUEST['inputLt'] == "Thai") {
                           $sql_group .= "  " . $mod_tb_root_group . "_id," . $mod_tb_root_group . "_subject";
                        } else {
                           $sql_group .= " " . $mod_tb_root_group . "_id," . $mod_tb_root_group . "_subjecten ";
                        }

                        $sql_group .= "  FROM " . $mod_tb_root_group . " WHERE  " . $mod_tb_root_group . "_masterkey ='" . $_REQUEST['masterkey'] . "'  AND " . $mod_tb_root_group . "_typeInfo != 1  ORDER BY " . $mod_tb_root_group . "_order DESC ";
                        $query_group = wewebQueryDB($coreLanguageSQL, $sql_group);
                        while ($row_group = wewebFetchArrayDB($coreLanguageSQL, $query_group)) {
                           $row_groupid = $row_group[0];
                           $row_groupname = $row_group[1];
                           ?>
                           <option value="<?php echo $row_groupid ?>" <?php if ($_REQUEST['inputGh'] == $row_groupid) { ?> selected="selected" <?php } ?>><?php echo $row_groupname ?></option>
                        <?php } ?>
                     </select></td>
               </tr>

               <tr >
                  <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["tit:subject"] ?><span class="fontContantAlert">*</span></td>
                  <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputSubject" id="inputSubject" type="text"  class="formInputContantTb"/></td>
               </tr>

               <tr >
                  <td align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["tit:title"] ?><span class="fontContantAlert">*</span></td>
                  <td colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                     <textarea name="inputDescription" id="inputDescription" cols="45" rows="5" class="formTextareaContantTb"></textarea>     </td>
               </tr>
            </table>
            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
               <tr >
                  <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                     <span class="formFontSubjectTxt"><?php echo $langMod["txt:pic"] ?></span><br/>
                     <span class="formFontTileTxt"><?php echo $langMod["txt:picDe"] ?></span>    </td>
               </tr>
               <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>

               <tr >
                  <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["inp:album"] ?></td>
                  <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                     <div class="file-input-wrapper">
                        <button class="btn-file-input"><?php echo $langTxt["us:inputpicselect"] ?></button>
                        <input type="file" name="fileToUpload" id="fileToUpload" onchange="ajaxFileUpload();" />
                     </div>

                     <span class="formFontNoteTxt"><?php echo $langMod["inp:notepic"] ?></span>
                     <div class="clearAll"></div>
                     <div id="boxPicNew" class="formFontTileTxt">
                        <input type="hidden" name="picname" id="picname" />
                     </div></td>
               </tr>
               <tr >
                  <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $modTxtShowPic[0] ?></td>
                  <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                     <label>
                        <div class="formDivRadioL"><input name="inputTypePic" id="inputTypePic" value="1" type="radio"  class="formRadioContantTb"  /></div>
                        <div class="formDivRadioR"><?php echo $modTxtShowPic[1] ?></div>
                     </label>

                     <label>
                        <div class="formDivRadioL"><input name="inputTypePic" id="inputTypePic"  value="2"  type="radio"  class="formRadioContantTb"  checked="checked"  /></div>
                        <div class="formDivRadioR"><?php echo $modTxtShowPic[2] ?></div>
                     </label>
                     </label>    </td>
               </tr>
            </table>
            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
               <tr >
                  <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                     <span class="formFontSubjectTxt"><?php echo $langMod["txt:title"] ?></span><br/>
                     <span class="formFontTileTxt"><?php echo $langMod["txt:titleDe"] ?></span>    </td>
               </tr>
               <tr >
                  <td colspan="7" align="center"  valign="top"  class="formRightContantTbEditor"   >
                     <div id="inputEditHTML" >
                        <textarea name="editDetail" id="editDetail" >
                           <?php
                           if (is_file($valhtml)) {
                              $fd = @fopen($valhtml, "r");
                              $contents = @fread($fd, @filesize($valhtml));
                              @fclose($fd);
                              echo txtReplaceHTML($contents);
                           }
                           ?>
                        </textarea></div>    </td>
               </tr>
            </table>
            <br />


            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
               <tr >
                  <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                     <span class="formFontSubjectTxt"><?php echo $langMod["txt:album"] ?></span><br/>
                     <span class="formFontTileTxt"><?php echo $langMod["txt:albumDe"] ?></span>    </td>
               </tr>
               <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>

               <tr >
                  <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["inp:album"] ?></td>
                  <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                     <div id="mulitplefileuploader" ><?php echo $langTxt["us:inputpicselect"] ?></div>

                     <span class="formFontNoteTxt"><?php echo $langMod["inp:notealbum"] ?></span>
                     <div class="clearAll"></div>
                     <div id="status" class="formFontTileTxt"></div>
                     <div id="boxAlbumNew" class="formFontTileTxt"></div></td>
               </tr>
            </table>



            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
               <tr >
                  <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                     <span class="formFontSubjectTxt"><?php echo $langMod["txt:video"] ?></span><br/>
                     <span class="formFontTileTxt"><?php echo $langMod["txt:videoDe"] ?></span>    </td>
               </tr>
               <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>

               <tr style="">
                  <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["tit:typevdo"] ?></td>
                  <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                     <label>
                        <div class="formDivRadioL"><input name="inputType" id="inputType" value="url" type="radio"  class="formRadioContantTb" checked="checked" onclick="jQuery('#boxInputfile').hide();jQuery('#boxInputlink').show();" /></div>
                        <div class="formDivRadioR"><?php echo $langMod["tit:linkvdo"] ?></div>
                     </label>

                     <label>
                        <div class="formDivRadioL"><input name="inputType" id="inputType"  value="file"  type="radio"  class="formRadioContantTb" onclick="jQuery('#boxInputlink').hide();jQuery('#boxInputfile').show();"  /></div>
                        <div class="formDivRadioR"><?php echo $langMod["tit:uploadvdo"] ?></div>
                     </label>
                     </label>    </td>
               </tr>
               <tr id="boxInputlink" >
                  <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["tit:linkvdo"] ?></td>
                  <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><textarea name="inputurl" id="inputurl" cols="45" rows="5" class="formTextareaContantTb"></textarea><br />
                     <span class="formFontNoteTxt"><?php echo $langMod["tit:linkvdonote"] ?></span></td>
               </tr>
               <tr id="boxInputfile" style="display:none;" >
                  <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["tit:uploadvdo"] ?></td>
                  <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                     <div class="file-input-wrapper">
                        <button class="btn-file-input"><?php echo $langTxt["us:inputpicselect"] ?></button>
                        <input type="file" name="inputVideoUpload" id="inputVideoUpload" onchange="ajaxVideoUpload();" />
                     </div>

                     <span class="formFontNoteTxt"><?php echo $langMod["tit:uploadvdonote"] ?></span>
                     <div class="clearAll"></div>
                     <div id="boxVideoNew" class="formFontTileTxt"></div></td>
               </tr>

            </table>
            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
               <tr >
                  <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                     <span class="formFontSubjectTxt"><?php echo $langMod["txt:attfile"] ?></span><br/>
                     <span class="formFontTileTxt"><?php echo $langMod["txt:attfileDe"] ?></span>    </td>
               </tr>
               <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>

               <tr style="display:show;">
                  <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["inp:chfile"] ?><span class="fontContantAlert"></span></td>
                  <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputFileName" id="inputFileName" type="text"  class="formInputContantTb"/></td>
               </tr>
               <tr >
                  <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["inp:sefile"] ?><span class="fontContantAlert"></span></td>
                  <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                     <div class="file-input-wrapper">
                        <button class="btn-file-input"><?php echo $langTxt["us:inputpicselect"] ?></button>
                        <input type="file" name="inputFileUpload" id="inputFileUpload" onchange="ajaxFileUploadDoc();" />
                     </div>

                     <span class="formFontNoteTxt"><?php echo $langMod["inp:notefile"] ?></span>
                     <div class="clearAll"></div>
                     <div id="boxFileNew" class="formFontTileTxt"></div></td>
               </tr>
            </table>

            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
               <tr >
                  <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                     <span class="formFontSubjectTxt"><?php echo $langMod["txt:seo"] ?></span><br/>
                     <span class="formFontTileTxt"><?php echo $langMod["txt:seoDe"] ?></span>    </td>
               </tr>
               <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>

               <tr >
                  <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["inp:seotitle"] ?><span class="fontContantAlert"></span></td>
                  <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputTagTitle" id="inputTagTitle" type="text"  class="formInputContantTb" value="<?php echo $valmetatitle ?>"/><br />
                     <span class="formFontNoteTxt"><?php echo $langMod["inp:seotitlenote"] ?></span></td>
               </tr>
               <tr >
                  <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["inp:seodes"] ?><span class="fontContantAlert"></span></td>
                  <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputTagDescription" id="inputTagDescription"  type="text"  class="formInputContantTb" value="<?php echo $valdescription ?>"/><br />
                     <span class="formFontNoteTxt"><?php echo $langMod["inp:seodesnote"] ?></span></td>
               </tr>
               <tr >
                  <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["inp:seokey"] ?><span class="fontContantAlert"></span></td>
                  <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputTagKeywords" id="inputTagKeywords"  type="text"  class="formInputContantTb" value="<?php echo $valkeywords ?>"/><br />
                     <span class="formFontNoteTxt"><?php echo $langMod["inp:seokeynote"] ?></span></td>
               </tr>
            </table>
            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
               <tr >
                  <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                     <span class="formFontSubjectTxt"><?php echo $langMod["txt:datec"] ?></span><br/>
                     <span class="formFontTileTxt"><?php echo $langMod["txt:datecDe"] ?></span>    </td>
               </tr>
               <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>

               <tr >
                  <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["us:credate"] ?><span class="fontContantAlert"></span></td>
                  <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="cdateInput" id="cdateInput" type="text"  class="formInputContantTbShot" value="<?php echo $valcredate ?>"/></td>
               </tr>
               <tr >
                  <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["tit:viewconf"] ?><span class="fontContantAlert"></span></td>
                  <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="Inputviewconf" id="Inputviewconf" type="text"  class="formInputContantTbShot" value="0"/></td>
               </tr>

            </table>
            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
               <tr >
                  <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                     <span class="formFontSubjectTxt"><?php echo $langMod["txt:date"] ?></span><br/>
                     <span class="formFontTileTxt"><?php echo $langMod["txt:dateDe"] ?></span>    </td>
               </tr>
               <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>

               <tr >
                  <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["tit:sdate"] ?><span class="fontContantAlert"></span></td>
                  <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="sdateInput" id="sdateInput" type="text"  class="formInputContantTbShot" value="<?php echo $sdateInput ?>"/></td>
               </tr>
               <tr >
                  <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["tit:edate"] ?><span class="fontContantAlert"></span></td>
                  <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="edateInput" id="edateInput"  type="text"  class="formInputContantTbShot" value="<?php echo $edateInput ?>"/><br />
                     <span class="formFontNoteTxt"><?php echo $langMod["inp:notedate"] ?></span></td>
               </tr>



            </table>
            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" >
               <tr >
                  <td colspan="7" align="right"  valign="top" height="20"></td>
               </tr>
               <tr >
                  <td colspan="7" align="right"  valign="middle" class="formEndContantTb"><a href="#defTop" title="<?php echo $langTxt["btn:gototop"] ?>"><?php echo $langTxt["btn:gototop"] ?> <img src="../img/btn/top.png"  align="absmiddle"/></a></td>
               </tr>
            </table>
         </div>
      </form>
      <script type="text/javascript" src="../js/ajaxfileupload.js"></script>
      <script type="text/javascript" src="../../ckeditor/ckeditor.js"></script>
      <script type="text/javascript" language="javascript">
                           /*################################# Upload Pic #######################*/
                           function ajaxFileUpload() {
                              var valuepicname = jQuery("input#picname").val();

                              jQuery.blockUI({
                                 message: jQuery('#tallContent'),
                                 css: {border: 'none', padding: '35px', backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
                                 }
                              });


                              jQuery.ajaxFileUpload({
                                 url: 'loadInsertPic.php?myID=<?php echo $myRand ?>&masterkey=<?php echo $_REQUEST['masterkey'] ?>&langt=<?php echo $_REQUEST['inputLt'] ?>&delpicname=' + valuepicname + '&menuid=<?php echo $_REQUEST['menukeyid'] ?>',
                                 secureuri: false,
                                 fileElementId: 'fileToUpload',
                                 dataType: 'json',
                                 success: function (data, status) {
                                    if (typeof (data.error) != 'undefined')
                                    {

                                       if (data.error != '')
                                       {
                                          alert(data.error);

                                       } else
                                       {
                                          jQuery("#boxPicNew").show();
                                          jQuery("#boxPicNew").html(data.msg);
                                          setTimeout(jQuery.unblockUI, 200);
                                       }
                                    }
                                 },
                                 error: function (data, status, e)
                                 {
                                    alert(e);
                                 }
                              }
                              )
                              return false;

                           }
                           /*############################# Upload Album ################################## */

                           // function ajaxFileUploadAlbum(){
                           // 	 jQuery.blockUI({
                           // 			message: jQuery('#tallContent'),
                           // 			css: { border: 'none',padding: '35px',backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
                           // 			}
                           // 		});
                           //
                           //
                           // 	jQuery.ajaxFileUpload({
                           // 			url:'loadInsertAlbum.php?myID=<?php echo $myRand ?>&masterkey=<?php echo $_REQUEST['masterkey'] ?>&langt=<?php echo $_REQUEST['inputLt'] ?>&menuid=<?php echo $_REQUEST['menukeyid'] ?>',
                           // 			secureuri:true,
                           // 			fileElementId:'inputAlbumUpload',
                           // 			dataType: 'json',
                           // 			success: function (data, status){
                           // 				if(typeof(data.error) != 'undefined'){
                           //
                           // 					if(data.error != ''){
                           // 						alert(data.error);
                           // 					}else{
                           // 						jQuery("#boxAlbumNew").show();
                           // 						jQuery("#boxAlbumNew").html(data.msg);
                           // 						setTimeout(jQuery.unblockUI, 200);
                           // 					}
                           //
                           // 				}
                           // 			},
                           // 			error: function (data, status, e){
                           // 				alert(e);
                           // 			}
                           // 		}
                           // 	)
                           //
                           // 	return false;
                           //
                           // }

                           /*################################# Upload Video #######################*/
                           function ajaxVideoUpload() {
                              var valuevdoname = jQuery("input#vdoname").val();

                              jQuery.blockUI({
                                 message: jQuery('#tallContent'),
                                 css: {border: 'none', padding: '35px', backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
                                 }
                              });


                              jQuery.ajaxFileUpload({
                                 url: 'loadInsertVideo.php?myID=<?php echo $myRand ?>&masterkey=<?php echo $_REQUEST['masterkey'] ?>&langt=<?php echo $_REQUEST['inputLt'] ?>&delvdoname=' + valuevdoname + '&menuid=<?php echo $_REQUEST['menukeyid'] ?>',
                                 secureuri: false,
                                 fileElementId: 'inputVideoUpload',
                                 dataType: 'json',
                                 success: function (data, status) {
                                    if (typeof (data.error) != 'undefined')
                                    {

                                       if (data.error != '')
                                       {
                                          alert(data.error);

                                       } else
                                       {
                                          jQuery("#boxVideoNew").show();
                                          jQuery("#boxVideoNew").html(data.msg);
                                          setTimeout(jQuery.unblockUI, 200);
                                       }
                                    }
                                 },
                                 error: function (data, status, e)
                                 {
                                    alert(e);
                                 }
                              }
                              )
                              return false;

                           }

                           /*############################# Upload File ####################################*/
                           function ajaxFileUploadDoc() {
                              var valuefilename = jQuery("input#inputFileName").val();
                              jQuery.blockUI({
                                 message: jQuery('#tallContent'),
                                 css: {border: 'none', padding: '35px', backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
                                 }
                              });


                              jQuery.ajaxFileUpload({
                                 url: 'loadInsertFile.php?myID=<?php echo $myRand ?>&masterkey=<?php echo $_REQUEST['masterkey'] ?>&langt=<?php echo $_REQUEST['inputLt'] ?>&nametodoc=' + valuefilename + '&menuid=<?php echo $_REQUEST['menukeyid'] ?>',
                                 secureuri: true,
                                 fileElementId: 'inputFileUpload',
                                 dataType: 'json',
                                 success: function (data, status) {
                                    if (typeof (data.error) != 'undefined') {

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
                                 error: function (data, status, e) {
                                    alert(e);
                                 }
                              }
                              )

                              return false;

                           }

                           /*################### Load FCK Editor ######################*/
                           jQuery(function () {
                              onLoadFCK();
                           });




      </script>

      <script type="text/javascript" src="js/jquery.uploadfile.js"></script>
      <script type="text/javascript" language="javascript">
                           jQuery(document).ready(function () {
                              var vajSelectFile = 0;
                              var valUploadFile = 0;
                              var settings = {
                                 url: "loadInsertAlbum.php?myID=<?php echo $myRand ?>&masterkey=<?php echo $_REQUEST['masterkey'] ?>&langt=<?php echo $_REQUEST['inputLt'] ?>&menuid=<?php echo $_REQUEST['menukeyid'] ?>",
                                 dragDrop: false,
                                 fileName: "myfile",
                                 allowedTypes: "jpg,png,gif",
                                 returnType: "json",
                                 onSelect: function (files) {
                                    vajSelectFile = files.length;
                                 },

                                 onSuccess: function (files, data, xhr) {
                                    valUploadFile = valUploadFile + 1;
                                    if (vajSelectFile == valUploadFile) {
                                       loadShowPhotoUpdate('loadShowAlbumNew.php', 'boxAlbumNew');
                                       // alert('goooo');
                                       valUploadFile = 0;
                                    }
                                 },
                                 showStatusAfterSuccess: false,
                                 showAbort: false,
                                 showDone: false,
                                 showDelete: false,
                                 deleteCallback: function (data, pd)
                                 {
                                    for (var i = 0; i < data.length; i++) {

                                       $.post("delete.php", {op: "delete", name: data[i]},
                                               function (resp, textStatus, jqXHR)
                                               {

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


      <?php if ($_SESSION[$valSiteManage . 'core_session_language'] == "Thai") { ?>
         <script language="JavaScript"  type="text/javascript" src="../js/datepickerThai.js"></script>
      <?php } else { ?>
         <script language="JavaScript"  type="text/javascript" src="../js/datepickerEng.js"></script>
      <?php } ?>

      <?php include("../lib/disconnect.php"); ?>

   </body>
</html>
