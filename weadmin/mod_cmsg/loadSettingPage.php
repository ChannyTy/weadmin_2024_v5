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
$valNav2 = $langMod["meu:setPermis"];
$valPermission = getUserPermissionOnMenu($_SESSION[$valSiteManage . "core_session_groupid"], $_REQUEST["menukeyid"]);

//print_pre($_SESSION);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="robots" content="noindex, nofollow"/>
      <meta name="googlebot" content="noindex, nofollow"/>

      <link href="../css/theme.css" rel="stylesheet"/>
      <title><?= $core_name_title ?></title>
      <script language="JavaScript"  type="text/javascript" src="../js/jquery-1.9.0.js"></script>
      <script language="JavaScript"  type="text/javascript" src="../js/jquery.blockUI.js"></script>
      <script language="JavaScript"  type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
      <script language="JavaScript" type="text/javascript">
         function executeSubmit() {


            updateContactNew('updateSetting.php');

         }


         function loadCheckUser() {
            with (document.myForm) {
               var inputValuename = document.myForm.inputUserName.value;
            }
            if (inputValuename != '') {
               checkUsermember(inputValuename);
            }
         }



         jQuery(document).ready(function () {

            jQuery('#myForm').keypress(function (e) {
               /* Start  Enter Check CKeditor */

               if (e.which == 13) {
                  executeSubmit();
                  return false;
               }
               /* End  Enter Check CKeditor */
            });
         });


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
         $module_orderby = $mod_tb_root_subgroup . "_order";
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
            <table width="96%" border="0" cellspacing="0" cellpadding="0"  align="center" >
               <tr>
                  <td  class="divRightNavTb" align="left"><span class="fontContantTbNav"><a href="<?= $valLinkNav1 ?>" target="_self"><?= $valNav1 ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?= $valNav2 ?></span></td>
                  <td  class="divRightNavTb" align="right">

                     <!-- ######### Start Menu Sub Mod ########## -->

                     <?php if ($_SESSION[$valSiteManage . 'core_session_level'] == "admin") { ?>
                        <div class="menuSubMod active">
                           <a  href="setting.php?masterkey=<?= $_REQUEST['masterkey'] ?>&menukeyid=<?= $_REQUEST['menukeyid'] ?>">
                              <?= $langMod["tit:setting"] ?>
                           </a>
                        </div>

                        <div class="menuSubMod">
                           <a  href="subgroup.php?masterkey=<?= $_REQUEST['masterkey'] ?>&menukeyid=<?= $_REQUEST['menukeyid'] ?>">
                              <?= $langMod["meu:contant"] ?>
                           </a>
                        </div>
                     <?php } ?>


                     <!-- ######### End Menu Sub Mod ########## -->
                  </td>
               </tr>
            </table>
         </div>


         <div class="divRightHeadSearch" >

            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top:20px;" align="center">

               <tr>

                  <td   id="boxSelectTest" >
                     <input name="inputSearch" type="text"  id="inputSearch" value="<?= trim($_REQUEST['inputSearch']) ?>" class="formInputSearchI"  placeholder="<?= $langTxt["sch:search"] ?>" /></td>
                  <td style="padding-right:10px;" align="right" width="6%"><input name="searchOk" id="searchOk" onClick="document.myForm.submit();"  type="button" class="btnSearch"  value=" "  /></td>
               </tr>
            </table>

         </div>

         <div class="divRightHead">

            <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
               <tr>
                  <td height="77" align="left"><span class="fontHeadRight"><?= $langMod["tit:setting"] ?></span></td>
                  <td align="left">
                     <table  border="0" cellspacing="0" cellpadding="0" align="right">
                        <tr>
                           <td align="right">
                              <? if ($valPermission == "RW") { ?>
                                 <div  class="btnSave" title="<?= $langTxt["btn:save"] ?>" onclick="executeSubmit();"></div>
                              <? } ?>

                           </td>
                        </tr>
                     </table>
                  </td>
               </tr>
            </table>
         </div>
         <div class="divRightMain" >

            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center"   class="tbBoxListwBorder">
               <tr ><td width="3%"  class="divRightTitleTbL"  valign="middle" align="center" >
                     <input name="CheckBoxAll" type="checkbox"  id="CheckBoxAll"  value="Yes" onClick="Paging_CheckAll(this, 'CheckBoxID', document.myForm.TotalCheckBoxID.value)"   class="formCheckboxHead" />    </td>

                  <td align="left"   valign="middle"  class="divRightTitleTb" ><span class="fontTitlTbRight"><?= $langMod["tit:subjectg"] ?></span></td>

                  <td width="12%"  class="divRightTitleTb"  valign="middle"  align="center"><span class="fontTitlTbRight"><?= $langTxt["us:lastdate"] ?></span></td>

               </tr>
               <?
// SQL SELECT #########################
               $sql = "SELECT
" . $mod_tb_root_subgroup . "_id," . $mod_tb_root_subgroup_lang . "_subject," . $mod_tb_root_subgroup . "_lastdate," . $mod_tb_root_subgroup . "_status," . $mod_tb_root_subgroup . "_pic

 FROM " . $mod_tb_root_subgroup . " LEFT JOIN " . $mod_tb_root_subgroup_lang . " ON " . $mod_tb_root_subgroup . "." . $mod_tb_root_subgroup . "_id = " . $mod_tb_root_subgroup_lang . "." . $mod_tb_root_subgroup_lang . "_cid";
               $sql = $sql . "  WHERE " . $mod_tb_root_subgroup . "_masterkey ='" . $_REQUEST['masterkey'] . "' AND  " . $mod_tb_root_subgroup_lang . "." . $mod_tb_root_subgroup_lang . "_language = 'Thai'";
               // $sql = $sql . "  WHERE " . $mod_tb_root_subgroup . "_masterkey ='" . $_REQUEST['masterkey'] . "'   ";
               // $sql = $sql . "  AND " . $mod_tb_root_subgroup . "_typeInfo != 1   ";


               if ($_REQUEST["inputSrchStatus"] != '') {
                  $sql = $sql . "  AND    " . $mod_tb_root_subgroup . "_status='" . $_REQUEST["inputSrchStatus"] . "'  ";
               }

               if ($inputSearch != "") {
                  $sql = $sql . "  AND  (
		" . $mod_tb_root_subgroup_lang . "_subject LIKE '%$inputSearch%'  ) ";
               }

//                print_pre($sql);
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

               $sql .= " ORDER BY $module_orderby $module_adesc ";
//               print_pre($sql);
               //  $sql .= " LIMIT $recordstart , $module_pagesize  ";
               $query = wewebQueryDB($coreLanguageSQL, $sql);
               $count_record = wewebNumRowsDB($coreLanguageSQL, $query);

               $index = 1;
               $valDivTr = "divSubOverTb";

// Select permission #########################
               $sqlPermis = "Select
   " . $mod_tb_permis . "." . $mod_tb_permis . "_id as _id,
   " . $mod_tb_permis . "." . $mod_tb_permis . "_name as  _name,
   " . $mod_tb_permis . "." . $mod_tb_permis . "_credate,
   " . $mod_tb_permis . "." . $mod_tb_permis . "_status,
   " . $mod_tb_permis . "." . $mod_tb_permis . "_lv
 From
   " . $mod_tb_permis . "
 Where " . $mod_tb_permis . "." . $mod_tb_permis . "_lv = 'staff'  ORDER BY " . $mod_tb_permis . "." . $mod_tb_permis . "_order DESC  ";
               /*
                 $sqlPermis = "SELECT
                 ".$mod_tb_root_group."_id,
                 ".$mod_tb_root_group."_subject
                 FROM
                 ".$mod_tb_root_group."
                 WHERE
                 ".$mod_tb_root_group."_status != 'Disable' AND ".$mod_tb_root_group."_masterkey = '".$masterkeyAgen."'
                 ";
                */
//                  print_pre($sqlPermis);
               $listadmin = $dbConnect->execute($sqlPermis);

// Select data permission #########################
               $listCheckerPer = "Select
  " . $mod_tb_permisGroup . "." . $mod_tb_permisGroup . "_misid,
  " . $mod_tb_permisGroup . "." . $mod_tb_permisGroup . "_cmgid
From
  " . $mod_tb_permisGroup . "
WHERE " . $mod_tb_permisGroup . "_masterkey = '" . $_REQUEST['masterkey'] . "'
  ";
//   print_pre($listCheckerPer);
               // $listPermis = $dbConnect->execute($listCheckerPer);
               $listPermis = wewebQueryDB($coreLanguageSQL, $listCheckerPer);
               $listAllowPer = array();
               foreach ($listPermis as $genlistCheck) {
                  $listAllowPer[$genlistCheck['md_cmsp_cmgid']][$genlistCheck['md_cmsp_misid']] = true;
               }


               // print_pre($listAllowPer);

               if ($count_record > 0) {
                  while ($index < $count_record + 1) {
                     $row = wewebFetchArrayDB($coreLanguageSQL, $query);
                     // print_pre($row);
                     $valID = $row[0];
                     $valName = rechangeQuot($row[1]);
                     $valDateCredate = dateFormatReal($row[2]);
                     $valTimeCredate = timeFormatReal($row[2]);
                     $valStatus = $row[3];
                     $valNameEn = rechangeQuot($row[4]);
                     $valColor = $row[5];
                     $valNameEn = chechNullVal($valNameEn);

                     $valPic = $mod_path_office . "/" . $row[4];
                     if (is_file($valPic)) {
                        $valPic = $valPic;
                     } else {
                        $valPic = "../img/btn/nopic.jpg";
                     }
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
                     <tr class="<?= $valDivTr ?>" >
                        <td   rowspan="2" class="divRightContantOverTbL"  valign="top" align="center"bgcolor="<?= $valColor ?>" >

                        </td>
                        <td  class="divRightContantOverTb"   valign="top" align="left" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>

                                 <td align="left">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                       <tr>
                                          <td width="39" align="left" valign="top">
                                             <div style="width:29px; height:29px;  background:url(<?php echo $valPic ?>) center no-repeat; background-size: cover;background-repeat: no-repeat; border-radius: 50%;  "></div>
                                          </td>
                                          <td align="left" style="padding-left:10px; " valign="top">
                                             <a href="javascript:void(0)" class="btnview" onclick="
                                                   document.myFormHome.valEditID.value = '<?= $valID ?>';
                                                "><?= $valName ?></a>
                                          </td>
                                       </tr>
                                    </table>
                                 </td>

                              </tr>
                           </table>
                        </td>

                        <td  class="divRightContantOverTb"  valign="top"  align="center">
                           <span class="fontContantTbupdate"><?= $valDateCredate ?></span><br/>
                           <span class="fontContantTbTime"><?= $valTimeCredate ?></span>    </td>

                     </tr>
                     <tr  class="<?= $valDivTr ?>"  >
                        <td colspan="3" rowspan="1">
                           <ul class="listper">

                              <li style="width:100%; "><span>สิทธิการเข้าถึงกลุ่มนี้ : </span></li>

                              <?php
                              foreach ($listadmin as $showGpermis) {

                                 // print_pre($valID);

                                 echo "<li style='width:32.2%;'>"; //$listAllowPer[$valID][$showGpermis['sy_grp_id']]
                                 echo '<label style="background-color:#fff;color:#333;"><input type="checkbox" name="permis[' . $valID . '][' . $showGpermis['_id'] . ']"';
                                 if ($listAllowPer[$valID][$showGpermis['_id']] == 1) {
                                    echo "checked";
                                 }
                                 echo '> ' . $showGpermis['_name'] . '</label>';
                                 echo "</li>";
                              }
                              ?>
                           </ul>
                        </td>
                     </tr>

                     <?
                     $index++;
                  }
               } else {
                  ?>
                  <tr >
                     <td colspan="6" align="center"  valign="middle"  class="divRightContantTbRL" style="padding-top:150px; padding-bottom:150px;" ><?= $langTxt["mg:nodate"] ?></td>
                  </tr>
               <? } ?>


            </table>
            <input name="TotalCheckBoxID" type="hidden" id="TotalCheckBoxID" value="<?= $index - 1 ?>" />
            <div class="divRightContantEnd"></div>
         </div>





      </form>
      <? include("../lib/disconnect.php"); ?>

   </body>
</html>
