<?
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("../lib/checkMemberSA.php");
include("../core/incLang.php");

$valNav1 = $langTxt["nav:home2"];
$valLinkNav1 = "../core/index.php";
$valNav2 = $langTxt["nav:perManage2"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <meta name="robots" content="noindex, nofollow">
   <meta name="googlebot" content="noindex, nofollow">

   <link href="../css/theme.css" rel="stylesheet" />
   <title><?= $core_name_title ?></title>
   <script language="JavaScript" type="text/javascript" src="../js/jquery-1.9.0.js"></script>
   <script language="JavaScript" type="text/javascript" src="../js/jquery.blockUI.js"></script>
   <script language="JavaScript" type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
   <script type="text/javascript" language="javascript">


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
      $module_orderby = $core_tb_group . "_order";
   } else {
      $module_orderby = $_REQUEST['module_orderby'];
   }

   if ($_REQUEST['inputSearch'] != "") {
      $inputSearch = trim($_REQUEST['inputSearch']);
   } else {
      $inputSearch = $_REQUEST['inputSearch'];
   }

   $sqlSearch = "";

   if ($inputSearch <> "") {
      $sqlSearch = $sqlSearch . "  AND   ( " . $core_tb_group . "_name LIKE '%$inputSearch%'  )   ";
   }

   if ($_REQUEST['inputGh'] == "staff" || $_REQUEST['inputGh'] == "admin") {
      $sqlSearch = $sqlSearch . "  AND    " . $core_tb_group . "_lv='" . $_REQUEST['inputGh'] . "'  ";
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
                  <table border="0" cellspacing="0" cellpadding="0" align="right">
                     <tr>
                        <td>
                           <select name="inputGh" id="inputGh" class="formSelectSearch" onchange="document.myForm.submit();
                                               ">
                              <option value="0"><?= $langTxt["pr:select"] ?></option>
                              <option value="admin" <? if ($_REQUEST['inputGh'] == "admin") { ?>selected="selected" <? } ?>><?= $langTxt["pr:select1"] ?></option>
                              <option value="staff" <? if ($_REQUEST['inputGh'] == "staff") { ?>selected="selected" <? } ?>><?= $langTxt["pr:select2"] ?></option>
                              <?php if ($_SESSION[$valSiteManage . "core_session_groupid"] == 0) { ?>
                                 <option value="minisite" <? if ($_REQUEST['inputGh'] == "minisite") { ?>selected="selected" <? } ?>><?= $langTxt["pr:select3"] ?></option>
                              <?php } ?>
                           </select>
                        </td>
                        <td align="right"><input name="inputSearch" type="text" id="inputSearch" value="<?= trim($_REQUEST['inputSearch']) ?>" class="inputContantTb" /></td>
                        <td align="right"><input name="searchOk" id="searchOk" onClick="document.myForm.submit();" type="button" class="btnSearch" value=" " /></td>
                     </tr>
                  </table>


               </td>
            </tr>
         </table>
      </div>
      <div class="divRightHead">
         <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center">
            <tr>
               <td height="77" align="left"><span class="fontHeadRight"><?= $valNav2 ?></span></td>
               <td align="left">
                  <table border="0" cellspacing="0" cellpadding="0" align="right">
                     <tr>
                        <td align="right">
                           <div class="btnAdd" title="<?= $langTxt["btn:add"] ?>" onclick="addContactNew('../core/addPermis.php');"></div>
                           <div class="btnDel" title="<?= $langTxt["btn:del"] ?>" onclick="
                                             if (Paging_CountChecked('CheckBoxID', document.myForm.TotalCheckBoxID.value) > 0) {
                                                if (confirm('<?= $langTxt["mg:delpermis"] ?>')) {
                                                   delContactNew('../core/deletePermis.php');
                                                }
                                             } else {
                                                alert('<?= $langTxt["mg:selpermis"] ?>');
                                             }
                                             "></div>
                           <div style="display:none;" class="btnSort" title="<?= $langTxt["btn:sortting"] ?>" onclick="sortContactNew('../core/sortPr.php');"></div>
                        </td>
                     </tr>
                  </table>
               </td>
            </tr>
         </table>
      </div>
      <div class="divRightMain">
         <br />
         <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxListwBorder">
            <tr>
               <td width="3%" class="divRightTitleTbL" valign="middle" align="center">
                  <input name="CheckBoxAll" type="checkbox" id="CheckBoxAll" value="Yes" onClick="Paging_CheckAll(this, 'CheckBoxID', document.myForm.TotalCheckBoxID.value)" class="formCheckboxHead" />
               </td>

               <td class="divRightTitleTb" valign="middle" align="left"><span class="fontTitlTbRight"><?= $langTxt["pr:subject"] ?></span></td>
               <td width="12%" class="divRightTitleTb" valign="middle" align="center"><span class="fontTitlTbRight"><?= $langTxt["mg:status"] ?></span></td>
               <td width="12%" class="divRightTitleTb" valign="middle" align="center"><span class="fontTitlTbRight"><?= $langTxt["us:credate"] ?></span></td>
               <td width="12%" class="divRightTitleTbR" valign="middle" align="center"><span class="fontTitlTbRight"><?= $langTxt["mg:manage"] ?></span></td>
            </tr>
            <?
            // Value SQL SELECT #########################
            $sqlSelect = "" . $core_tb_group . "_id," . $core_tb_group . "_name," . $core_tb_group . "_credate," . $core_tb_group . "_status";

            // SQL SELECT #########################
            $sql = "SELECT " . $sqlSelect . "  FROM " . $core_tb_group . "  WHERE " . $core_tb_group . "_id>0  ";
            //$sql = $sql ." AND  " . $core_tb_group . "_typemini !='1' ";

            if (!empty($_REQUEST['inputGh'])) {
               $sql .= " AND " . $core_tb_group . "_lv = '" . $_REQUEST['inputGh'] . "' ";
            }
            //                        if (!empty($_REQUEST['inputGh']) && ($_REQUEST['inputGh'] == "minisite")) {
            //                           $sql = $sql . "AND " . $core_tb_group . "_typemini = '1'  ";
            //                        } else {
            //                           $sql = $sql . "AND " . $core_tb_group . "_typemini != '1'  ";
            //                        }


            $sql = $sql . $sqlSearch;

            $query = wewebQueryDB($coreLanguageSQL, $sql);
            $count_totalrecord = wewebNumRowsDB($coreLanguageSQL, $query);

            // Find max page size #########################
            if ($count_totalrecord > $module_pagesize) {
               $numberofpage = ceil($count_totalrecord / $module_pagesize);
            } else {
               $numberofpage = 1;
            }

            // Recover page show into range #########################
            if ($module_pageshow > $numberofpage) {
               $module_pageshow = $numberofpage;
            }

            // Select only paging range #########################
            $recordstart = ($module_pageshow - 1) * $module_pagesize;

            if ($coreLanguageSQL == "mssql") {
               $module_pagesize = $module_pagesize + $recordstart;
               $recordstart = $recordstart + 1;
            }


            if ($coreLanguageSQL == "mssql") {

               $sql = "SELECT " . $sqlSelect . " FROM (SELECT     RuningCount = ROW_NUMBER() OVER (ORDER BY " . $module_orderby . "  " . $module_adesc . " ),*  FROM   " . $core_tb_group;
               $sql .= "  WHERE " . $core_tb_group . "_id>0";
               $sql .= "   ) AS LogWithRowNumbers  WHERE   (RuningCount BETWEEN " . $recordstart . "  AND " . $module_pagesize . " )";
               $sql .= $sqlSearch;
            } else {
               $sql .= " ORDER BY $module_orderby $module_adesc LIMIT $recordstart , $module_pagesize ";
            }

            $query = wewebQueryDB($coreLanguageSQL, $sql);
            $count_record = wewebNumRowsDB($coreLanguageSQL, $query);
            $index = 1;
            $valDivTr = "divSubOverTb";
            if ($count_record > 0) {
               while ($index < $count_record + 1) {
                  $row = wewebFetchArrayDB($coreLanguageSQL, $query);
                  $valID = $row[0];
                  $valName = $row[1];
                  $valDateCredate = dateFormatReal($row[2]);
                  $valTimeCredate = timeFormatReal($row[2]);
                  $valStatus = $row[3];
                  if ($valStatus == "Enable") {
                     $valStatusClass = "fontContantTbEnable";
                  } else {
                     $valStatusClass = "fontContantTbDisable";
                  }

                  if ($valDivTr == "divSubOverTb") {
                     $valDivTr = "divOverTb";
                  } else {
                     $valDivTr = "divSubOverTb";
                  }
            ?>
                  <tr class="<?= $valDivTr ?>">
                     <td class="divRightContantOverTbL" valign="top" align="center"><input id="CheckBoxID<?= $index ?>" name="CheckBoxID<?= $index ?>" type="checkbox" class="formCheckboxList" onClick="Paging_CheckAllHandle(document.myForm.CheckBoxAll, 'CheckBoxID', document.myForm.TotalCheckBoxID.value)" value="<?= $valID ?>" /> </td>
                     <td class="divRightContantOverTb" valign="top" align="left"><a href="javascript:void(0)" onclick="
                                       document.myFormHome.valEditID.value =<?= $valID ?>;
                                       viewContactNew('../core/viewPermis.php');"><?= $valName ?></a></td>
                     <td class="divRightContantOverTb" valign="top" align="center">
                        <div id="load_status<?= $valID ?>">
                           <? if ($valStatus == "Enable") { ?>

                              <a href="javascript:void(0)" onclick="changeStatus('load_waiting<?= $valID ?>', '<?= $core_tb_group ?>', '<?= $valStatus ?>', '<?= $valID ?>', 'load_status<?= $valID ?>', '../core/statusMg.php')"><span class="<?= $valStatusClass ?>"><?= $valStatus ?></span></a>

                           <? } else { ?>

                              <a href="javascript:void(0)" onclick="changeStatus('load_waiting<?= $valID ?>', '<?= $core_tb_group ?>', '<?= $valStatus ?>', '<?= $valID ?>', 'load_status<?= $valID ?>', '../core/statusMg.php')"> <span class="<?= $valStatusClass ?>"><?= $valStatus ?></span> </a>

                           <? } ?>

                           <img src="../img/loader/ajax-loaderstatus.gif" alt="waiting" style="display:none;" id="load_waiting<?= $valID ?>" />
                        </div>
                     </td>
                     <td class="divRightContantOverTb" valign="top" align="center">
                        <span class="fontContantTbupdate"><?= $valDateCredate ?></span><br />
                        <span class="fontContantTbTime"><?= $valTimeCredate ?></span>
                     </td>
                     <td class="divRightContantOverTbR" valign="top" align="center">
                        <table border="0" cellspacing="0" cellpadding="0">
                           <tr>

                              <td valign="top" align="center" width="40">
                                 <div class="divRightManage" title="<?= $langTxt["btn:edit"] ?>" onclick="
                                                   document.myFormHome.valEditID.value =<?= $valID ?>;
                                                   editContactNew('../core/editPermis.php');">
                                    <img src="../img/btn/edit.png" /><br />
                                    <span class="fontContantTbManage"><?= $langTxt["btn:edit"] ?></span>
                                 </div>
                              </td>
                              <td valign="top" align="center" width="30">
                                 <div class="divRightManage" title="<?= $langTxt["btn:del"] ?>" onClick="
                                                   if (confirm('<?= $langTxt["mg:delpermis"] ?>')) {
                                                      Paging_CheckedThisItem(document.myForm.CheckBoxAll, <?= $index ?>, 'CheckBoxID', document.myForm.TotalCheckBoxID.value);
                                                      delContactNew('../core/deletePermis.php');
                                                   }
                                                  ">
                                    <img src="../img/btn/delete.png" /><br />
                                    <span class="fontContantTbManage"><?= $langTxt["btn:del"] ?></span>
                                 </div>
                              </td>
                           </tr>
                        </table>
                     </td>
                  </tr>

               <?
                  $index++;
               }
            } else {
               ?>
               <tr>
                  <td colspan="5" align="center" valign="middle" class="divRightContantTbRL" style="padding-top:150px; padding-bottom:150px;"><?= $langTxt["mg:nodate"] ?></td>
               </tr>
            <? } ?>

            <tr>
               <td colspan="6" align="center" valign="middle" class="divRightContantTbRL">
                  <table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">
                     <tr>
                        <td class="divRightNavTb" align="left"><span class="fontContantTbNavPage"><?= $langTxt["pr:All"] ?> <b><?= number_format($count_totalrecord) ?></b> <?= $langTxt["pr:record"] ?></span></td>
                        <td class="divRightNavTb" align="right">
                           <table width="100%" border="0" cellpadding="0" cellspacing="0">
                              <tr>
                                 <td align="right" style="padding-right:10px;"><span class="fontContantTbNavPage"><?= $langTxt["pr:page"] ?>
                                       <? if ($numberofpage > 1) { ?>
                                          <select name="toolbarPageShow" class="formSelectContantPage" onChange="document.myForm.module_pageshow.value = this.value;
                                                            document.myForm.submit();
                                                              ">
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
                                    <td width="21" align="center"> <img src="../img/controlpage/playset_start.gif" width="21" height="21" onmouseover="this.src = '../img/controlpage/playset_start_active.gif';
                                                                                          this.style.cursor = 'hand';" onmouseout="this.src = '../img/controlpage/playset_start.gif';" onclick="document.myForm.module_pageshow.value = 1;
                                                                                          document.myForm.submit();" style="cursor:pointer;" /></td>
                                 <? } else { ?>
                                    <td width="21" align="center"><img src="../img/controlpage/playset_start_disable.gif" width="21" height="21" /></td>
                                 <? } ?>
                                 <?
                                 if ($module_pageshow > 1) {
                                    $valPrePage = $module_pageshow - 1;
                                 ?>
                                    <td width="21" align="center"> <img src="../img/controlpage/playset_backward.gif" width="21" height="21" style="cursor:pointer;" onmouseover="this.src = '../img/controlpage/playset_backward_active.gif';
                                                                                          this.style.cursor = 'hand';" onmouseout="this.src = '../img/controlpage/playset_backward.gif';" onclick="document.myForm.module_pageshow.value = '<?= $valPrePage ?>';
                                                                                          document.myForm.submit();" /></td>
                                 <? } else { ?>
                                    <td width="21" align="center"><img src="../img/controlpage/playset_backward_disable.gif" width="21" height="21" /></td>
                                 <? } ?>
                                 <td width="21" align="center"> <img src="../img/controlpage/playset_stop.gif" width="21" height="21" style="cursor:pointer;" onmouseover="this.src = '../img/controlpage/playset_stop_active.gif';
                                                                                       this.style.cursor = 'hand';" onmouseout="this.src = '../img/controlpage/playset_stop.gif';" onclick="
                                                                                       with (document.myForm) {
                                                                                          module_pageshow.value = '';
                                                                                          module_pagesize.value = '';
                                                                                          module_orderby.value = '';
                                                                                          document.myForm.submit();
                                                                                       }
                                                                                 " /></td>
                                 <?
                                 if ($module_pageshow < $numberofpage) {
                                    $valNextPage = $module_pageshow + 1;
                                 ?>
                                    <td width="21" align="center"> <img src="../img/controlpage/playset_forward.gif" width="21" height="21" style="cursor:pointer;" onmouseover="this.src = '../img/controlpage/playset_forward_active.gif';
                                                                                          this.style.cursor = 'hand';" onmouseout="this.src = '../img/controlpage/playset_forward.gif';" onclick="document.myForm.module_pageshow.value = '<?= $valNextPage ?>';
                                                                                          document.myForm.submit();" /></td>
                                 <? } else { ?>
                                    <td width="10" align="center"><img src="../img/controlpage/playset_forward_disable.gif" width="21" height="21" /></td>
                                 <? } ?>
                                 <? if ($module_pageshow < $numberofpage) { ?>
                                    <td width="10" align="center"><img src="../img/controlpage/playset_end.gif" width="21" height="21" style="cursor:pointer;" onmouseover="this.src = '../img/controlpage/playset_end_active.gif';
                                                                                         this.style.cursor = 'hand';" onmouseout="this.src = '../img/controlpage/playset_end.gif';" onclick="document.myForm.module_pageshow.value = '<?= $numberofpage ?>';
                                                                                         document.myForm.submit();" /></td>
                                 <? } else { ?>
                                    <td width="10" align="center"><img src="../img/controlpage/playset_end_disable.gif" width="21" height="21" /></td>
                                 <? } ?>
                              </tr>
                           </table>
                        </td>
                     </tr>
                  </table>
               </td>
            </tr>
         </table>
         <input name="TotalCheckBoxID" type="hidden" id="TotalCheckBoxID" value="<?= $index - 1 ?>" />
         <div class="divRightContantEnd"></div>
      </div>

   </form>
   <? include("../lib/disconnect.php"); ?>

</body>

</html>