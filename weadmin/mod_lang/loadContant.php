<?
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../core/incLang.php");
include("incModLang.php");
include("config.php");

$valNav1 = $langTxt["nav:home2"];
$valLinkNav1 = "../core/index.php";
$valNav2 = getNameMenu($_REQUEST["menukeyid"]);
$valLevelPermission = $_SESSION[$valSiteManage . "core_session_level"];
$valPermission = getUserPermissionOnMenu($_SESSION[$valSiteManage . "core_session_groupid"], $_REQUEST["menukeyid"]);

$sql = "SELECT
" . $mod_tb_root . "." . $mod_tb_root . "_id,
" . $mod_tb_root . "." . $mod_tb_root . "_subject,
" . $mod_tb_root . "." . $mod_tb_root . "_display,
" . $mod_tb_root . "." . $mod_tb_root . "_status
FROM " . $mod_tb_root . "";

$querySubjectHead = wewebQueryDB($coreLanguageSQL, $sql);
// $querySubjectHead2=wewebQueryDB($coreLanguageSQL,$sql);
$count_recordHead = wewebNumRowsDB($coreLanguageSQL, $querySubjectHead);
$arrData = array();
if ($count_recordHead >= 1) {
   foreach ($querySubjectHead as $key => $value) {
      $arrData[$value[0]]['id'] = $value[0];
      $arrData[$value[0]]['subject'] = rechangeQuot($value[1]);
      $arrData[$value[0]]['status'] = $value[3];
      $test = unserialize($value[2]);

      if (gettype($test) == 'array') {

         foreach ($test as $key2 => $value2) {
            if (!empty($value2)) {
               $arrData[$value[0]]['list'][] = $value2;
            } else {
               $arrData[$value[0]]['list'][] = "-";
            }
         }

         if (count($arrData[$value[0]]['list']) < $count_recordHead) {
            for ($i = 0; $i < $count_recordHead; $i++) {
               if (empty($arrData[$value[0]]['list'][$i])) {
                  $arrData[$value[0]]['list'][$i] = "-";
               }
            }
         }
      } else {
         for ($i = 0; $i < $count_recordHead; $i++) {
            $arrData[$value[0]]['list'][$i] = "-";
         }
      }
   }
}

// print_pre($arrData);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <meta name="robots" content="noindex, nofollow" />
   <meta name="googlebot" content="noindex, nofollow" />

   <link href="../css/theme.css" rel="stylesheet" />
   <title><?= $core_name_title ?></title>
   <script language="JavaScript" type="text/javascript" src="../js/jquery-1.9.0.js"></script>
   <script language="JavaScript" type="text/javascript" src="../js/jquery.blockUI.js"></script>
   <script language="JavaScript" type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
   <script type="text/javascript" language="javascript">
      function changeRibbon(tablename, statusname, statusid, fileAc) {

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

         var pin = document.getElementById("inputRibbon").value;
         var TYPE = "POST";
         var URL = fileAc;
         var dataSet = {
            Valuetablename: tablename,
            Valuestatusname: pin,
            Valuestatusid: statusid,
            Valuefilestatus: fileAc
         };


         jQuery.ajax({
            type: TYPE,
            url: URL,
            data: dataSet,
            success: function(html) {

               // jQuery("#" + loadderstatus + "").show();
               // jQuery("#" + loadderstatus + "").html(html)
               setTimeout(jQuery.unblockUI, 200);
            }
         });
      }
   </script>
</head>

<body>
   <?
   // Check to set default value #########################
   $module_default_pagesize = $core_default_pagesize;
   $module_default_maxpage = $core_default_maxpage;
   $module_default_reduce = $core_default_reduce;
   $module_default_pageshow = 1;
   $module_sort_number = $core_sort_number;

   if ($_REQUEST['module_pagesize'] == "") {
      $module_pagesize = $module_default_pagesize;
   } else {
      $module_pagesize = $_REQUEST['module_pagesize'];
   }

   if ($_REQUEST['module_pageshow'] == "") {
      $module_pageshow = $module_default_pageshow;
   } else {
      $module_pageshow = $_REQUEST['module_pageshow'];
   }

   if ($_REQUEST['module_adesc'] == "") {
      $module_adesc = $module_sort_number;
   } else {
      $module_adesc = $_REQUEST['module_adesc'];
   }

   if ($_REQUEST['module_orderby'] == "") {
      $module_orderby = $mod_tb_root . "_order";
   } else {
      $module_orderby = $_REQUEST['module_orderby'];
   }

   if ($_REQUEST['inputSearch'] != "") {
      $inputSearch = trim($_REQUEST['inputSearch']);
   } else {
      $inputSearch = $_REQUEST['inputSearch'];
   }
   ?>
   <form action="?" method="post" name="myForm" id="myForm">
      <input name="masterkey" type="hidden" id="masterkey" value="<?= $_REQUEST['masterkey'] ?>" />
      <input name="menukeyid" type="hidden" id="menukeyid" value="<?= $_REQUEST['menukeyid'] ?>" />
      <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?= $module_pageshow ?>" />
      <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?= $module_pagesize ?>" />
      <input name="module_orderby" type="hidden" id="module_orderby" value="<?= $module_orderby ?>" />

      <div class="divRightNav">
         <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
            <tr>
               <td class="divRightNavTb" align="left"><span class="fontContantTbNav"><a href="<?= $valLinkNav1 ?>" target="_self"><?= $valNav1 ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?= $valNav2 ?></span></td>
               <td class="divRightNavTb" align="right">

                  <!-- ######### Start Menu Sub Mod ########## -->
                  <!-- <div class="menuSubMod">
                           <a  href="set.php?masterkey=<?= $_REQUEST['masterkey'] ?>&menukeyid=<?= $_REQUEST['menukeyid'] ?>">
                     <?= $langMod["meu:set"] ?>
                           </a>
                       </div> -->
                  <!-- <div class="menuSubMod">
                         <a  href="group.php?masterkey=<?= $_REQUEST['masterkey'] ?>&menukeyid=<?= $_REQUEST['menukeyid'] ?>">
                     <?= $langMod["meu:group"] ?>
                         </a>
                     </div> -->
                  <!-- <div class="menuSubMod">
                         <a  href="subgroup.php?masterkey=<?= $_REQUEST['masterkey'] ?>&menukeyid=<?= $_REQUEST['menukeyid'] ?>">
                     <?= $langMod["meu:subgroup"] ?>
                         </a>
                     </div> -->
                  <!-- <div class="menuSubMod active">
                         <a  href="index.php?masterkey=<?= $_REQUEST['masterkey'] ?>&menukeyid=<?= $_REQUEST['menukeyid'] ?>">
                     <?= $langMod["meu:contant"] ?>
                         </a>
                     </div> -->
                  <!-- ######### End Menu Sub Mod ########## -->

               </td>
            </tr>

         </table>
      </div>
      <div class="divRightHeadSearch">

         <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top:20px;" align="center">

            <!-- <tr>
 		    <td class="selectSearch2"></td>
                    <td   id="boxSelectTest"  >
                    <input name="inputSearch" type="text"  id="inputSearch" value="<?= trim($_REQUEST['inputSearch']) ?>" class="formInputSearchStyle"  placeholder="<?= $langTxt["sch:search"] ?>" /></td>
                    <td class="bottonSearch" align="right"><input name="searchOk" id="searchOk" onClick="document.myForm.submit();"  type="button" class="btnSearch"  value=" "  /></td>
                    </tr> -->
         </table>

      </div>
      <div class="divRightHead">
         <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center">
            <tr>
               <td height="77" align="left">
                  <span class="fontHeadRight"><?= $valNav2 ?></span>

               </td>
               <td align="left">
                  <?php
                  $sql = "SELECT " . $core_tb_setting . "_translator AS translator FROM " . $core_tb_setting . " WHERE 1 LIMIT 1";
                  $query = wewebQueryDB($coreLanguageSQL, $sql);
                  $result = wewebFetchArrayDB($coreLanguageSQL, $query);

                  $translator = $result["translator"];
                  ?>
                  <table border="0" cellspacing="0" cellpadding="0" align="right">
                     <tr>
                        <td align="right">
                           <?php if ($valPermission == "RW") { ?>
                              <!-- <label>
                                 <input type="radio" class="use-translator" name="use_translator" value="1" style="height: auto;" <?php if ($translator == 1) { ?>checked<?php } ?> /> เปิดการใช้งานภาษาหลัก
                              </label>

                              <label>
                                 <input type="radio" class="use-translator" name="use_translator" value="0" style="height: auto;" <?php if ($translator == 0) { ?>checked<?php } ?> /> ใช้แปลภาษาจาก Google translator
                              </label> -->

                           <?php } ?>
                     </tr>
                  </table>
               </td>
            </tr>
         </table>
      </div>
      <div class="divRightMain">


         <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxListwBorder">
            <tr>
               <td width="1%" class="divRightTitleTbL" valign="middle" align="center">
               </td>
               <td class="divRightTitleTb" valign="middle" align="left"><span class="fontTitlTbRight"><?= $langMod["tit:keylang"] ?></span></td>


               <td width="12%" class="divRightTitleTb" valign="middle" align="center"><span class="fontTitlTbRight"><?= $langTxt["mg:status"] ?></span></td>

               <td width="1%" class="divRightTitleTbR" valign="middle" align="center"></td>
            </tr>
            <?
            $index = 1;
            $valDivTr = "divSubOverTb";
            if (!empty($arrData)) {
               foreach ($arrData as $key => $value) {

                  // $row=wewebFetchArrayDB($coreLanguageSQL,$query);
                  $valID = $value['id'];
                  $valName = rechangeQuot($value['subject']);
                  $valStatus = $value['status'];
                  $valDisplay = $value['list'];

                  if ($valStatus == "Enable") {
                     $valStatusClass = "fontContantTbEnable";
                  } else if ($valStatus == "Home") {
                     $valStatusClass = "fontContantTbHomeSt";
                  } else {
                     $valStatusClass = "fontContantTbDisable";
                  }

                  if ($valDivTr == "divSubOverTb") {
                     $valDivTr = "divOverTb";
                     $valImgCycle = "boxprofile_l.png";
                  } else {
                     $valDivTr = "divSubOverTb";
                     $valImgCycle = "boxprofile_w.png";
                  }
            ?>
                  <tr class="<?= $valDivTr ?>">
                     <td class="divRightContantOverTbL" valign="top" align="center">
                     </td>
                     <td class="divRightContantOverTb" valign="top" align="left">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                           <tr>

                              <td valign="top"><a href="javascript:void(0)" onclick="
                                       document.myFormHome.inputLt.value = 'Thai';
                                       document.myFormHome.valEditID.value =<?= $valID ?>;
                                       viewContactNew('viewContant.php');"><?= $valName ?></a> </td>
                           </tr>
                        </table>
                     </td>





                     <td class="divRightContantOverTb" valign="top" align="center">
                        <? if ($valPermission == "RW" || $valLevelPermission == "SuperAdmin") { ?>
                           <div id="load_status<?= $valID ?>">
                              <? if ($valStatus == "Enable") { ?>

                                 <a href="javascript:void(0)" onclick="changeStatus('load_waiting<?= $valID ?>', '<?= $mod_tb_root ?>', '<?= $valStatus ?>', '<?= $valID ?>', 'load_status<?= $valID ?>', '../<?= $mod_fd_root ?>/statusMg.php')"><span class="<?= $valStatusClass ?>"><?= $valStatus ?></span></a>
                              <? } else if ($valStatus == "Home") { ?>

                                 <a href="javascript:void(0)" onclick="changeStatus('load_waiting<?= $valID ?>', '<?= $mod_tb_root ?>', '<?= $valStatus ?>', '<?= $valID ?>', 'load_status<?= $valID ?>', '../<?= $mod_fd_root ?>/statusMg.php')"><span class="<?= $valStatusClass ?>"><?= $valStatus ?></span></a>
                              <? } else { ?>

                                 <a href="javascript:void(0)" onclick="changeStatus('load_waiting<?= $valID ?>', '<?= $mod_tb_root ?>', '<?= $valStatus ?>', '<?= $valID ?>', 'load_status<?= $valID ?>', '../<?= $mod_fd_root ?>/statusMg.php')"> <span class="<?= $valStatusClass ?>"><?= $valStatus ?></span> </a>

                              <? } ?>

                              <img src="../img/loader/ajax-loaderstatus.gif" alt="waiting" style="display:none;" id="load_waiting<?= $valID ?>" />
                           </div>
                        <? } else { ?>
                           <? if ($valStatus == "Enable") { ?>
                              <span class="<?= $valStatusClass ?>"><?= $valStatus ?></span>
                           <? } else if ($valStatus == "Home") { ?>
                              <span class="<?= $valStatusClass ?>"><?= $valStatus ?></span>
                           <? } else { ?>
                              <span class="<?= $valStatusClass ?>"><?= $valStatus ?></span>
                           <? } ?>

                        <? } ?>
                     </td>






                     <td class="divRightContantOverTbR" valign="top" align="center">
                     </td>
                  </tr>

               <?
                  $index++;
               }
            } else {
               ?>
               <tr>
                  <td colspan="4" align="center" valign="middle" class="divRightContantTbRL" style="padding-top:150px; padding-bottom:150px;"><?= $langTxt["mg:nodate"] ?></td>
               </tr>
            <? } ?>

            <tr>
               <td colspan="7" align="center" valign="middle" class="divRightContantTbRL">
                  <table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">
                     <tr>
                        <td class="divRightNavTb" align="left"><span class="fontContantTbNavPage"><?= $langTxt["pr:All"] ?> <b><?= number_format($count_recordHead) ?></b> <?= $langTxt["pr:record"] ?></span></td>
                        <td class="divRightNavTb" align="right">
                           <table width="100%" border="0" cellpadding="0" cellspacing="0">
                              <!-- <tr>
      <td align="right" style="padding-right:10px;"><span class="fontContantTbNavPage"><?= $langTxt["pr:page"] ?>
                                 <? if ($numberofpage > 1) { ?>
                                                   <select name="toolbarPageShow"  class="formSelectContantPage" onChange="document.myForm.module_pageshow.value=this.value; document.myForm.submit(); ">
                                    <?
                                    if ($numberofpage < $module_default_maxpage) {
                                       // Show page list #########################
                                       for ($i = 1; $i <= $numberofpage; $i++) {
                                          echo "<option value=\"$i\"";
                                          if ($i == $module_pageshow) {
                                             echo " selected";
                                          }
                                          echo ">$i</option>";
                                       }
                                    } else {
                                       // # If total page count greater than default max page  value then reduce page select size #########################
                                       $starti = $module_pageshow - $module_default_reduce;
                                       if ($starti < 1) {
                                          $starti = 1;
                                       }
                                       $endi = $module_pageshow + $module_default_reduce;
                                       if ($endi > $numberofpage) {
                                          $endi = $numberofpage;
                                       }
                                       //#####################
                                       for ($i = $starti; $i <= $endi; $i++) {
                                          echo "<option value=\"$i\"";
                                          if ($i == $module_pageshow) {
                                             echo " selected";
                                          }
                                          echo ">$i</option>";
                                       }
                                    }
                                    ?>
                                                   </select>
                                 <? } else { ?>
                                                    <b><?= $module_pageshow ?></b>
                                 <? } ?>
                                 <?= $langTxt["pr:of"] ?> <b><?= $numberofpage ?></b></span></td>
                                 <? if ($module_pageshow > 1) { ?>
                                                         <td width="21" align="center"> <img src="../img/controlpage/playset_start.gif" width="21" height="21"
                                                         onmouseover="this.src='../img/controlpage/playset_start_active.gif'; this.style.cursor='hand';"
                                                         onmouseout="this.src='../img/controlpage/playset_start.gif';"
                                                         onclick="document.myForm.module_pageshow.value=1; document.myForm.submit();"  style="cursor:pointer;" /></td>
                                 <? } else { ?>
                                                         <td width="21" align="center"><img src="../img/controlpage/playset_start_disable.gif" width="21" height="21" /></td>
                                 <? } ?>
                                 <?
                                 if ($module_pageshow > 1) {
                                    $valPrePage = $module_pageshow - 1;
                                 ?>
                                                         <td width="21" align="center"> <img src="../img/controlpage/playset_backward.gif" width="21" height="21"  style="cursor:pointer;"
                                                         onmouseover="this.src='../img/controlpage/playset_backward_active.gif'; this.style.cursor='hand';"
                                                         onmouseout="this.src='../img/controlpage/playset_backward.gif';"
                                                         onclick="document.myForm.module_pageshow.value='<?= $valPrePage ?>'; document.myForm.submit();" /></td>
                                 <? } else { ?>
                                                         <td width="21" align="center"><img src="../img/controlpage/playset_backward_disable.gif" width="21" height="21" /></td>
                                 <? } ?>
            <td width="21" align="center"> <img src="../img/controlpage/playset_stop.gif" width="21" height="21"   style="cursor:pointer;"
            onmouseover="this.src='../img/controlpage/playset_stop_active.gif'; this.style.cursor='hand';"
            onmouseout="this.src='../img/controlpage/playset_stop.gif';"
            onclick="
            with(document.myForm) {
            module_pageshow.value='';
            module_pagesize.value='';
            module_orderby.value='';
              document.myForm.submit();
            }
            " /></td>
                                 <?
                                 if ($module_pageshow < $numberofpage) {
                                    $valNextPage = $module_pageshow + 1;
                                 ?>
                                                         <td width="21" align="center"> <img src="../img/controlpage/playset_forward.gif" width="21" height="21"   style="cursor:pointer;"
                                                         onmouseover="this.src='../img/controlpage/playset_forward_active.gif'; this.style.cursor='hand';"
                                                         onmouseout="this.src='../img/controlpage/playset_forward.gif';"
                                                         onclick="document.myForm.module_pageshow.value='<?= $valNextPage ?>'; document.myForm.submit();" /></td>
                                 <? } else { ?>
                                                         <td width="10" align="center"><img src="../img/controlpage/playset_forward_disable.gif" width="21" height="21" /></td>
                                 <? } ?>
                                 <? if ($module_pageshow < $numberofpage) { ?>
                                                         <td width="10" align="center"><img src="../img/controlpage/playset_end.gif" width="21" height="21"   style="cursor:pointer;"
                                                         onmouseover="this.src='../img/controlpage/playset_end_active.gif'; this.style.cursor='hand';"
                                                         onmouseout="this.src='../img/controlpage/playset_end.gif';"
                                                         onclick="document.myForm.module_pageshow.value='<?= $numberofpage ?>'; document.myForm.submit();" /></td>
                                 <? } else { ?>
                                                         <td width="10" align="center"><img src="../img/controlpage/playset_end_disable.gif" width="21" height="21" /></td>
                                 <? } ?>
            </tr> -->
                           </table>
                        </td>
                     </tr>
                  </table>
               </td>
            </tr>
         </table>
         <input name="TotalCheckBoxID" type="hidden" id="TotalCheckBoxID" value="<?= $index - 1 ?>" />
         <div class="divRightContantEnd"></div>
         <div class="divRightHeadSearch">
            <!-- <span class="fontContantNoteUrl">
               <?= $langTxt["mini:siteth"] ?> : <a href="<?= loadGetURLByMod($core_full_path, 'th', $mod_fd_frontUrl, "") ?>" target="_blank"><?= loadGetURLByMod($core_full_path, 'th', $mod_fd_frontUrl, "") ?></a><br />

               <?= $langTxt["mini:siteen"] ?> : <a href="<?= loadGetURLByMod($core_full_path, 'en', $mod_fd_frontUrl, "") ?>" target="_blank"><?= loadGetURLByMod($core_full_path, 'en', $mod_fd_frontUrl, "") ?></a>
                </span> -->
         </div>
      </div>

   </form>
   <? include("../lib/disconnect.php"); ?>
   <script>
      $(document).on('change', '.use-translator', function() {
         var translator = $(this).val();

         if (confirm('คุณต้องการเปลี่ยนการแปลภาษา') == true) {
            $.ajax({
               type: 'POST',
               url: "updateTranslator.php",
               data: {
                  translator: translator
               },
               success: function(data) {
                  window.location.reload();
               },
               error: function(jqXHR, textStatus, errorThrown) {
               }
            });
         }
         return false;
      });
   </script>
</body>

</html>