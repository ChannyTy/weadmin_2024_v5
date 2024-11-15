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

$sql = "SELECT  ";
$sql .= "  " . $mod_tb_root . "_id, " . $mod_tb_root . "_lastdate, " . $mod_tb_root . "_creby, " . $mod_tb_root . "_status ,
          " . $mod_tb_root . "_subject  	,    " . $mod_tb_root . "_sdate,    " . $mod_tb_root . "_edate,    " . $mod_tb_root . "_target,
           " . $mod_tb_root . "_file , " . $mod_tb_root . "_url  ";
$sql .= " 	FROM " . $mod_tb_root . " WHERE " . $mod_tb_root . "_masterkey='" . $_POST["masterkey"] . "'
      AND  " . $mod_tb_root . "_id 	='" . $_POST["valEditID"] . "'";
//sprint_pre($sql);
$Query = wewebQueryDB($coreLanguageSQL, $sql);
$Row = wewebFetchArrayDB($coreLanguageSQL, $Query);
$valid = $Row[0];
$valcredate = DateFormat($Row[1]);
$valcreby = $Row[2];
$valstatus = $Row[3];
$valSubject = $Row[4];
if ($Row[5] != "0000-00-00 00:00:00" && $Row[5] != "") {
   $valSdate = DateFormatInsertRe($Row[5]);
}
if ($Row[6] != "0000-00-00 00:00:00" && $Row[6] != "") {
   $valEdate = DateFormatInsertRe($Row[6]);
}
$valTarget = $Row[7];
$valPicName = $Row[8];
$valPic = $mod_path_pictures . "/" . $Row[8];
$valUrl = $Row[9];
$valGid = $Row[10];
$valTid = $Row[11];
$valPermission = getUserPermissionOnMenu($_SESSION[$valSiteManage . "core_session_groupid"], $_POST["menukeyid"]);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="robots" content="noindex, nofollow"/>
      <meta name="googlebot" content="noindex, nofollow"/>
      <link href="../css/theme.css" rel="stylesheet"/>

      <title><?= $core_name_title ?></title>
      <script language="JavaScript"  type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
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

               // if(isBlank(inputurl)) {
               // 	inputurl.focus();
               // 	jQuery("#inputurl").addClass("formInputContantTbAlertY");
               // 	return false;
               // }else{
               // 	jQuery("#inputurl").removeClass("formInputContantTbAlertY");
               // }


               // if(inputurl.value=="http://") {
               // 	inputurl.focus();
               // 	jQuery("#inputurl").addClass("formInputContantTbAlertY");
               // 	return false;
               // }else{
               // 	jQuery("#inputurl").removeClass("formInputContantTbAlertY");
               // }


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

      </script>
   </head>

   <body>
      <form action="?" method="get" name="myForm" id="myForm"  enctype="multipart/form-data">
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
         <input name="inputHtml" type="hidden" id="inputHtml" value="" />
         <input name="inputHtmlDel" type="hidden" id="inputHtmlDel" value="<?= $valhtmlname ?>" />

         <?php include_once './inc-inputsearch.php'; ?>
         <div class="divRightNav">
            <table width="96%" border="0" cellspacing="0" cellpadding="0"  align="center" >
               <tr>
                  <td  class="divRightNavTb" align="left"  id="defTop" ><span class="fontContantTbNav"><a href="<?= $valLinkNav1 ?>" target="_self"><?= $valNav1 ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a  href="javascript:void(0)"  onclick="btnBackPage('index.php')" target="_self"><?= getNameMenu($_REQUEST["menukeyid"]) ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?= $langMod["txt:titleedit"] ?></span></td>
                  <td  class="divRightNavTb" align="right">



                  </td>
               </tr>
            </table>
         </div>
         <div class="divRightHead">
            <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
               <tr>
                  <td height="77" align="left"><span class="fontHeadRight"><?= $langMod["txt:titleedit"] ?></span></td>
                  <td align="left">
                     <table  border="0" cellspacing="0" cellpadding="0" align="right">
                        <tr>
                           <td align="right">
                              <? if ($valPermission == "RW") { ?>
                                 <div  class="btnSave" title="<?= $langTxt["btn:save"] ?>" onclick="executeSubmit();"></div>
                              <? } ?>
                              <div  class="btnBack" title="<?= $langTxt["btn:back"] ?>" onclick="btnBackPage('index.php')"></div>
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
                     <span class="formFontSubjectTxt"><?= $langMod["txt:subject"] ?></span><br/>
                     <span class="formFontTileTxt"><?= $langMod["txt:subjectDe"] ?></span>    </td>
               </tr>

               <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>

               <tr >
                  <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["tit:inpName"] ?><span class="fontContantAlert">*</span></td>
                  <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputSubject" id="inputSubject" type="text"  class="formInputContantTb" value="<?= $valSubject ?>"/></td>
               </tr>
             <!-- <tr id="boxInputlink" >
                 <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["tit:linkvdo"] ?><span class="fontContantAlert">*</span></td>
                 <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><textarea name="inputurl" id="inputurl" cols="45" rows="5" class="formTextareaContantTb"><?= $valUrl ?></textarea><br />
             <span class="formFontNoteTxt"><?= $langMod["edit:linknote"] ?></span></td>
               </tr> -->
                <!--  <tr >
                 <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["tit:typevdo"] ?><span class="fontContantAlert">*</span></td>
                 <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                 <label>
                 <div class="formDivRadioL"><input name="inputmenutarget" id="inputmenutarget" type="radio"  class="formRadioContantTb"  value="1" <? if ($valTarget == 1) { ?> checked="checked" <? } ?> /></div>
                 <div class="formDivRadioR"><?= $modTxtTarget[1] ?></div>
                 </label>

                 <label>
                 <div class="formDivRadioL"><input name="inputmenutarget" id="inputmenutarget"  type="radio"  class="formRadioContantTb"   value="2"  <? if ($valTarget == 2) { ?> checked="checked" <? } ?>  /></div>
                 <div class="formDivRadioR"><?= $modTxtTarget[2] ?></div>
                 </label>
                 </label>    </td>
                   </tr> -->

            </table>
            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
               <tr >
                  <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                     <span class="formFontSubjectTxt"><?= $langMod["txt:pic"] ?></span><br/>
                     <span class="formFontTileTxt"><?= $langMod["txt:picDe"] ?></span>    </td>
               </tr>
               <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>

               <tr >
                  <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["inp:album"] ?></td>
                  <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                     <div class="file-input-wrapper">
                        <button class="btn-file-input"><?= $langTxt["us:inputpicselect"] ?></button>
                        <input type="file" name="fileToUpload" id="fileToUpload" onchange="ajaxFileUpload();"   accept='image/*'/>
                     </div>

                     <span class="formFontNoteTxt"><?= $langMod["inp:notepic"] ?></span>
                     <div class="clearAll"></div>
                     <div id="boxPicNew" class="formFontTileTxt">
                        <? if (is_file($valPic)) { ?>
                           <img src="<?= $valPic ?>"  style="float:left;border:#c8c7cc solid 1px;max-width:650px;"   />
                           <div style="width:22px; height:22px;float:left;z-index:1; margin-left:-22px;cursor:pointer;" onclick="delPicUpload('deletePic.php')"  title="Delete file" ><img src="../img/btn/delete.png" width="22" height="22"  border="0"/></div>
                           <input type="hidden" name="picname" id="picname" value="<?= $valPicName ?>" />
                        <? } ?>
                     </div></td>
               </tr>
            </table>
            <!-- <br /> -->
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder "  style="display:none;">
               <tr >
                  <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                     <span class="formFontSubjectTxt"><?= $langMod["txt:seo"] ?></span><br/>
                     <span class="formFontTileTxt"><?= $langMod["txt:seoDe"] ?></span>    </td>
               </tr>
               <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>

               <tr >
                  <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["tit:sdate"] ?><span class="fontContantAlert"></span></td>
                  <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="sdateInput" id="sdateInput" type="text"  class="formInputContantTbShot" value="<?= $valSdate ?>"/></td>
               </tr>
               <tr >
                  <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["tit:edate"] ?><span class="fontContantAlert"></span></td>
                  <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="edateInput" id="edateInput"  type="text"  class="formInputContantTbShot" value="<?= $valEdate ?>"/><br />
                     <span class="formFontNoteTxt"><?= $langMod["inp:notedate"] ?></span></td>
               </tr>




            </table>
            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" >

               <tr >
                  <td colspan="7" align="right"  valign="top" height="20"></td>
               </tr>
               <tr >
                  <td colspan="7" align="right"  valign="middle" class="formEndContantTb"><a href="#defTop" title="<?= $langTxt["btn:gototop"] ?>"><?= $langTxt["btn:gototop"] ?> <img src="../img/btn/top.png"  align="absmiddle"/></a></td>
               </tr>
            </table>
         </div>
      </form>
      <script type="text/javascript" src="../js/ajaxfileupload.js"></script>
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
                                 url: 'loadUpdatePic.php?myID=<?= $_POST["valEditID"] ?>&masterkey=<?= $_REQUEST['masterkey'] ?>&langt=<?= $_REQUEST['inputLt'] ?>&delpicname=' + valuepicname + '&menuid=<?= $_REQUEST['menukeyid'] ?>',
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
      </script>
      <? if ($_SESSION[$valSiteManage . 'core_session_language'] == "Thai") { ?>
         <script language="JavaScript"  type="text/javascript" src="../js/datepickerThai.js"></script>
      <? } else { ?>
         <script language="JavaScript"  type="text/javascript" src="../js/datepickerEng.js"></script>
      <? } ?>
      <? include("../lib/disconnect.php"); ?>

   </body>
</html>
