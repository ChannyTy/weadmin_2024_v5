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
$valLevelPermission = $_SESSION[$valSiteManage . "core_session_level"];
$myRand = time() . rand(111, 999);
$valPermission = getUserPermissionOnMenu($_SESSION[$valSiteManage . "core_session_groupid"], $_POST["menukeyid"]);

$arrLang = $_SESSION[$valSiteManage . "core_session_multilang"];
//print_pre($arrLang);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" />
      <meta name="robots" content="noindex, nofollow">
         <meta name="googlebot" content="noindex, nofollow">
            <link href="../css/theme.css" rel="stylesheet"/>
            <link href="js/uploadfile.css" rel="stylesheet"/>

            <title><?= $core_name_title ?></title>

            <script language="JavaScript"  type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
            <script language="JavaScript" type="text/javascript">
               function executeSubmit() {
                  with (document.myForm) {

                     // if(inputGroupID.value==0) {
                     // 	inputGroupID.focus();
                     // 	jQuery("#inputGroupID").addClass("formInputContantTbAlertY");
                     // 	return false;
                     // }else{
                     // 	jQuery("#inputGroupID").removeClass("formInputContantTbAlertY");
                     // }

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


                  insertContactNew('insertContant.php');

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
               // 			}
               // 		}
               //     }
               //  	/* End  Enter Check CKeditor */
               //   });
               // });


            </script>
            </head>

            <body>
               <form action="?" method="get" name="myForm" id="myForm"   enctype="multipart/form-data">
                  <input name="execute" type="hidden" id="execute" value="insert" />
                  <input name="masterkey" type="hidden" id="masterkey" value="<?= $_REQUEST['masterkey'] ?>" />
                  <input name="menukeyid" type="hidden" id="menukeyid" value="<?= $_REQUEST['menukeyid'] ?>" />
                  <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?= $_REQUEST['module_pageshow'] ?>" />
                  <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?= $_REQUEST['module_pagesize'] ?>" />
                  <input name="module_orderby" type="hidden" id="module_orderby" value="<?= $_REQUEST['module_orderby'] ?>" />
                  <input name="inputLt" type="hidden" id="inputLt" value="<?= $_REQUEST['inputLt'] ?>" />

                  <?php include_once './inc-inputsearch.php'; ?>
                  <div class="divRightNav">
                     <table width="96%" border="0" cellspacing="0" cellpadding="0"  align="center" >
                        <tr>
                           <td  class="divRightNavTb" align="left"  id="defTop" ><span class="fontContantTbNav"><a href="<?= $valLinkNav1 ?>" target="_self"><?= $valNav1 ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a  href="javascript:void(0)"  onclick="btnBackPage('index.php')" target="_self"><?= $langMod["tit:inpName"] ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?= $langMod["txt:titleadd"] ?><? if ($_SESSION[$valSiteManage . 'core_session_languageT'] == 2 || $_SESSION[$valSiteManage . 'core_session_languageT'] == 3) { ?>(<?= $langTxt["lg:thai"] ?>)<? } ?></span></td>
                           <td  class="divRightNavTb" align="right">



                           </td>
                        </tr>
                     </table>
                  </div>
                  <div class="divRightHead">
                     <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
                        <tr>
                           <td height="77" align="left"><span class="fontHeadRight"><?= $langMod["txt:titleadd"] ?><? if ($_SESSION[$valSiteManage . 'core_session_languageT'] == 2 || $_SESSION[$valSiteManage . 'core_session_languageT'] == 3) { ?>(<?= $langTxt["lg:thai"] ?>)<? } ?></span></td>
                           <td align="left">
                              <table  border="0" cellspacing="0" cellpadding="0" align="right">
                                 <tr>
                                    <td align="right">
                                       <? if ($valLevelPermission == "SuperAdmin") { ?>
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
                              <span class="formFontSubjectTxt"><?= $langTxt["st:titleLangDisplay"] ?></span><br/>
                              <span class="formInputContantTbAlertYcheck"><?= $langTxt["st:titleDeLang"] ?></span>    </td>
                        </tr>
                        <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>

                        <tr >
                           <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["tit:keylang"] ?><span class="fontContantAlert">*</span></td>
                           <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputSubject" id="inputSubject" type="text"  class="formInputContantTb"/><br />
                              <span class="formInputContantTbAlertYcheck" id="alert_inputSubject" style="display:none;"></span>
                           </td>
                        </tr>
                        <tr >
                           <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["tit:title"] ?><span class="fontContantAlert">*</span></td>
                           <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputDescription" id="inputDescription" type="text"  class="formInputContantTb"/></td>
                        </tr>
                        <?
                        foreach ($arrLang as $key => $value) {
                           ?>
                           <tr>
                              <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= number_format($key + 1) ?>. <?= $langMod["tit:subject_lang"] ?> (<?= $arrLang[$key]['key'] ?>)<span class="fontContantAlert"></span></td>
                              <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">

                                 <input name="inputLang[<?= $arrLang[$key]['key'] ?>]" id="inputLang" type="text" class="formInputContantTbShot" value="" />

                              </td>
                           </tr>

                           <?
                        }
                        ?>


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



               <? include("../lib/disconnect.php"); ?>

            </body>
            </html>
