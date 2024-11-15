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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="robots" content="noindex, nofollow"/>
      <meta name="googlebot" content="noindex, nofollow"/>
      <link href="../css/theme.css" rel="stylesheet"/>

      <title><?php echo $core_name_title ?></title>
      <script language="JavaScript"  type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
      <script language="JavaScript" type="text/javascript">

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
         <input name="valCid" type="hidden" id="valCid" value="<?= $valSGid ?>" />
         <input name="valrand" type="hidden" id="valrand" value="<?= $myRand ?>" />

         <?php include_once './inc-inputsearch.php'; ?>
         <div class="divRightNav">
            <table width="96%" border="0" cellspacing="0" cellpadding="0"  align="center" >
               <tr>
                  <td  class="divRightNavTb" align="left"  id="defTop" ><span class="fontContantTbNav"><a href="<?php echo $valLinkNav1 ?>" target="_self"><?php echo $valNav1 ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a  href="javascript:void(0)"  onclick="btnBackPage('index.php')" target="_self"><?php echo getNameMenu($_REQUEST["menukeyid"]) ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?php echo $langMod["txt:titleedit"] ?>(<?= $_REQUEST['inputLt'] ?>)</span></td>
                  <td  class="divRightNavTb" align="right">



                  </td>
               </tr>
            </table>
         </div>
         <div class="divRightHead">
            <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
               <tr>
                  <td height="77" align="left"><span class="fontHeadRight"><?php echo $langMod["txt:titleedit"] ?>(<?= $_REQUEST['inputLt'] ?>)</span></td>
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
                                          <a href="javascript:void(0)" onclick="document.myForm.valDelFile.value =<?= $valEmailID ?>;modDelEmail('deleteLanggoo.php', '#boxMailContact2')"><img src="../img/btn/delete.png" align="absmiddle" title="Delete email" hspace="5" border="0" /></a> <?= $valEmailNew ?>
                                       </div>
                                    </td>
                                 </tr>

                                 <?
                              }
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

      <script type="text/javascript" language="javascript">
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
            modInsertEmail('insertLanggoo.php', '#boxMailContact2');

         }

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

      </script>
      <?php if ($_SESSION[$valSiteManage . 'core_session_language'] == "Thai") { ?>
         <script language="JavaScript"  type="text/javascript" src="../js/datepickerThai.js"></script>
      <?php } else { ?>
         <script language="JavaScript"  type="text/javascript" src="../js/datepickerEng.js"></script>
      <?php } ?>
      <?php include("../lib/disconnect.php"); ?>

   </body>
</html>
