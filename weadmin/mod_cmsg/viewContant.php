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

$sql = "SELECT   ";
$sql .= "   " . $mod_tb_root . "_id as id,
" . $mod_tb_root . "_credate as credate,
" . $mod_tb_root . "_crebyid as crebyid,
" . $mod_tb_root . "_status as status,
" . $mod_tb_root . "_sdate as sdate,
" . $mod_tb_root . "_edate as edate,
" . $mod_tb_root_lang . "_lastdate as lastdate,
" . $mod_tb_root_lang . "_lastbyid as lastbyid,
" . $mod_tb_root_lang . "_pic as pic,
" . $mod_tb_root_lang . "_type as type,
" . $mod_tb_root_lang . "_filevdo as filevdo,
" . $mod_tb_root_lang . "_url as url,
" . $mod_tb_root . "_view as view,
" . $mod_tb_root_lang . "_id as lid,
" . $mod_tb_root_lang . "_subject as subject,
" . $mod_tb_root_lang . "_title as title,
" . $mod_tb_root_lang . "_htmlfilename as htmlfilename,
" . $mod_tb_root_lang . "_metatitle as metatitle,
" . $mod_tb_root_lang . "_description as description,
" . $mod_tb_root_lang . "_keywords as keyword,
" . $mod_tb_root_lang . "_picshow as picshow,
" . $mod_tb_root . "_gid as gid,
" . $mod_tb_root . "_sgid as sgid, 
" . $mod_tb_root_lang . "_typec as typec,
" . $mod_tb_root_lang . "_picType as picType,
" . $mod_tb_root_lang . "_picDefault as picDefault,
" . $mod_tb_root_lang . "_urlc as urlc,
" . $mod_tb_root_lang . "_target as target 
";
$sql .= "    FROM " . $mod_tb_root . " INNER JOIN " . $mod_tb_root_lang . " ON " . $mod_tb_root . "_id = " . $mod_tb_root_lang . "_cid
WHERE " . $mod_tb_root . "_masterkey='" . $_REQUEST["masterkey"] . "'  AND  " . $mod_tb_root . "_id='" . $_REQUEST['valEditID'] . "' AND " . $mod_tb_root_lang . "_language = '" . $_REQUEST['inputLt'] . "' ";

$Query = wewebQueryDB($coreLanguageSQL, $sql);
$Row = wewebFetchArrayDB($coreLanguageSQL, $Query);
$valID = $Row[0];
$valCredate = DateFormat($Row['credate']);
$valCreby = $Row['crebyid'];
$valStatus = $Row['status'];
if ($valStatus == "Enable") {
   $valStatusClass = "fontContantTbEnable";
} elseif ($valStatus == "Home") {
   $valStatusClass = "fontContantTbHomeSt";
} else {
   $valStatusClass = "fontContantTbDisable";
}

if ($Row['sdate'] == "0000-00-00 00:00:00") {
   $valSdate = "-";
} else {
   $valSdate = datetimeFormatReal($Row['sdate']);
}
if ($Row['edate'] == "0000-00-00 00:00:00") {
   $valEdate = "-";
} else {
   $valEdate = datetimeFormatReal($Row['edate']);
}

$valLastdate = DateFormat($Row['lastdate']);
$valLastby = $Row['lastbyid'];
$valPicName = $Row['pic'];
$valPic = $mod_path_pictures . "/" . $Row['pic'];
$valType = $Row['type'];
$valFilevdo = $Row['filevdo'];
$valPathvdo = $mod_path_vdo . "/" . $Row['filevdo'];
$valUrl = rechangeQuot($Row['url']);
$valView = number_format($Row['view']);
$valSubject = rechangeQuot($Row['subject']);
$valTitle = rechangeQuot($Row['title']);
$valHtml = $mod_path_html . "/" . $Row['htmlfilename'];
$valMetatitle = rechangeQuot($Row['metatitle']);
$valDescription = rechangeQuot($Row['description']);
$valKeywords = rechangeQuot($Row['keyword']);
$valPicShow = $Row['picshow'];
$valSGid = $Row['lid'];
$valGid = $Row['gid'];
$valSubGid = $Row['sgid'];

$valTypeC = $Row['typec'] ? $Row['typec'] : 1;
$valpicType = $Row['picType'] ? $Row['picType'] : 1;
$valpicDefault = $Row['picDefault'];
$valUrlC = $Row['urlc'];
$valTarget = $Row['target'];

$valPermission = getUserPermissionOnMenu($_SESSION[$valSiteManage . "core_session_groupid"], $_REQUEST["menukeyid"]);

logs_access('3', 'View');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <meta name="robots" content="noindex, nofollow" />
   <meta name="googlebot" content="noindex, nofollow" />
   <link href="../css/bootstrap.min.css" rel="stylesheet" />
   <link href="../css/theme.css?v=<?php echo date('Ymdhis'); ?>" rel="stylesheet" />
   <link href="../css/table_css.css?v=<?php echo date('Ymdhis'); ?>" rel="stylesheet" />

   <title><?= $core_name_title ?></title>
   <script language="JavaScript" type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
</head>

<body>
   <form action="?" method="get" name="myForm" id="myForm">
      <input name="execute" type="hidden" id="execute" value="update" />
      <input name="masterkey" type="hidden" id="masterkey" value="<?= $_REQUEST['masterkey'] ?>" />
      <input name="menukeyid" type="hidden" id="menukeyid" value="<?= $_REQUEST['menukeyid'] ?>" />
      <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?= $_REQUEST['module_pageshow'] ?>" />
      <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?= $_REQUEST['module_pagesize'] ?>" />
      <input name="module_orderby" type="hidden" id="module_orderby" value="<?= $_REQUEST['module_orderby'] ?>" />

      <input name="valEditID" type="hidden" id="valEditID" value="<?= $_REQUEST['valEditID'] ?>" />
      <input name="inputLt" type="hidden" id="inputLt" value="<?= $_REQUEST['inputLt'] ?>" />

      <?php include_once './inc-inputsearch.php'; ?>

      <? if ($_REQUEST['viewID'] <= 0) { ?>
         <div class="divRightNav">
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
               <tr>
                  <td class="divRightNavTb" align="left" id="defTop"><span class="fontContantTbNav"><a href="<?= $valLinkNav1 ?>" target="_self"><?= $valNav1 ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a href="javascript:void(0)" onclick="btnBackPage('index.php')" target="_self"><?= $langMod["tit:inpName"] ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?= $langMod["txt:titleview"] ?> (<?= $_REQUEST['inputLt'] ?>)</span></td>
                  <td class="divRightNavTb" align="right">
                  </td>
               </tr>
            </table>
         </div>
      <? } ?>
      <div class="divRightHead">
         <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center">
            <tr>
               <td height="77" align="left"><span class="fontHeadRight"><?= $langMod["txt:titleview"] ?>(<?= $_REQUEST['inputLt'] ?>)</span></td>
               <td align="left">
                  <table border="0" cellspacing="0" cellpadding="0" align="right">
                     <tr>
                        <td align="right">
                           <? if ($_REQUEST['viewID'] <= 0) { ?>
                              <? if ($valPermission == "RW") { ?>
                                 <div class="btnEditView" title="<?= $langTxt["btn:edit"] ?>" onclick="
                                                document.myFormHome.valEditID.value =<?= $valID ?>;
                                                editContactNew('../<?= $mod_fd_root ?>/editContant.php')"></div>
                              <? } ?>
                              <div class="btnBack" title="<?= $langTxt["btn:back"] ?>" onclick="btnBackPage('index.php')"></div>
                           <? } ?>
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
                  <span class="formFontSubjectTxt"><?= $langMod["txt:subject"] ?></span><br />
                  <span class="formFontTileTxt"><?= $langMod["txt:subjectDe"] ?></span>
               </td>
            </tr>
            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= $langMod["meu:group"] ?>:<span class="fontContantAlert"></span></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                  <div class="formDivView">
                     <?php
                     $sql_group = "SELECT " . $mod_tb_root_group . "_id," . $mod_tb_root_group_lang . "_subject
                     FROM " . $mod_tb_root_group . "
                     INNER JOIN " . $mod_tb_root_group_lang . " ON " . $mod_tb_root_group . "_id = " . $mod_tb_root_group_lang . "_cid
                     WHERE  " . $mod_tb_root_group . "_masterkey ='" . $_REQUEST["masterkey"] . "' AND " . $mod_tb_root_group_lang . "_language='" . $_REQUEST['inputLt'] . "'  AND " . $mod_tb_root_group . "_id='" . $valGid . "'
                     ORDER BY " . $mod_tb_root_group . "_order DESC ";
                     $query_group = wewebQueryDB($coreLanguageSQL, $sql_group);
                     $row_group = wewebFetchArrayDB($coreLanguageSQL, $query_group);
                     echo $row_groupname = $row_group[1];
                     ?>
                  </div>
               </td>
            </tr>
            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= $langMod["tit:subject"] ?>:<span class="fontContantAlert"></span></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                  <div class="formDivView"><?= $valSubject ?></div>
               </td>
            </tr>
            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= $langMod["tit:title"] ?>:<span class="fontContantAlert"></span></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                  <div class="formDivView"><?= $valTitle ?></div>
               </td>
            </tr>
            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $modTxtShowCase[0] ?>:<span class="fontContantAlert"></span></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                  <div class="formDivView"><?php echo $modTxtShowCase[$valTypeC] ?></div>
               </td>
            </tr>
         </table>
         <br />
         <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
            <tr>
               <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                  <span class="formFontSubjectTxt"><?= $langMod["txt:pic"] ?></span><br />
                  <span class="formFontTileTxt"><?= $langMod["txt:picDe"] ?></span>
               </td>
            </tr>
            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $modTxtShowPic[0] ?>:<span class="fontContantAlert"></span></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                  <div class="formDivView"><?php echo $modTxtShowPic[$valpicType] ?></div>
               </td>
            </tr>
            <tr <?php if ($valpicType == 2) { echo 'style="display:none;"'; } ?>>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><span class="fontContantAlert"></span></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                  <div class="formDivView">
                     <?php
                     $sql_nopic2 = "";
                     $sql_nopic = "SELECT " . $core_tb_nopic . "_id as id
                        ," . $core_tb_nopic . "_masterkey as masterkey
                        ," . $core_tb_nopic . "_subject as subject
                        ," . $core_tb_nopic . "_file as file 
                        FROM " . $core_tb_nopic . " 
                        WHERE " . $core_tb_nopic . "_masterkey = '" . $core_masterkey_nopic . "'
                        AND " . $core_tb_nopic . "_status != 'Disable' ";
                     $sql_nopic2 .= $sql_nopic . " AND " . $core_tb_nopic . "_id = '" . $valpicDefault . "'";
                     $sql_nopic .= " ORDER BY " . $core_tb_nopic . "_order DESC";
                     $sql_nopic2 .= " ORDER BY " . $core_tb_nopic . "_order DESC";
                     $query_nopic2 = wewebQueryDB($coreLanguageSQL, $sql_nopic2);
                     $numRows_nopic = wewebNumRowsDB($coreLanguageSQL, $query_nopic2);
                     if ($numRows_nopic == 1) {
                        $row_nopic = wewebFetchArrayDB($coreLanguageSQL, $query_nopic2);
                        $valPic = $core_pathname_upload . "/" . $row_nopic['masterkey'] . "/office/" . $row_nopic['file'];
                     } else {
                        $query_nopic = wewebQueryDB($coreLanguageSQL, $sql_nopic);
                        $row_nopic = wewebFetchArrayDB($coreLanguageSQL, $query_nopic);
                        $valPic = $core_pathname_upload . "/" . $row_nopic['masterkey'] . "/office/" . $row_nopic['file'];
                     }
                     ?>
                     <img src="<?= $valPic ?>" style="float:left;border:#c8c7cc solid 1px; max-width:600px;" onerror="this.src='<?= "../img/btn/nopic.jpg" ?>'" />
                  </div>
               </td>
            </tr>
            <tr <?php if ($valpicType == 1) { echo 'style="display:none;"'; } ?>>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><span class="fontContantAlert"></span></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                  <div class="formDivView">
                     <img src="<?= $valPic ?>" style="float:left;border:#c8c7cc solid 1px; max-width:600px;" onerror="this.src='<?= "../img/btn/nopic.jpg" ?>'" />
                  </div>
               </td>
            </tr>
         </table>
         <br />
         <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder " <?php if ($valTypeC != 3) { echo 'style="display:none;"'; } ?>>
            <tr>
               <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                  <span class="formFontSubjectTxt"><?php echo $langMod["txt:subject"] ?></span><br />
                  <span class="formFontTileTxt"><?php echo $langMod["txt:subjectDe"] ?></span>
               </td>
            </tr>
            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["tit:linkvdoc"] ?>:<span class="fontContantAlert"></span></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                  <div class="formDivView"><a href="<?php echo $valUrlC ?>" target="_blank"><?php echo $valUrlC ?></a></div>
               </td>
            </tr>
            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["tit:typevdoc"] ?>:<span class="fontContantAlert"></span></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                  <div class="formDivView"><?php echo $modTxtTarget[$valTarget] ?></div>
               </td>
            </tr>
         </table>
         <br <?php if ($valTypeC != 3) { echo 'style="display:none;"'; } ?>/>
         <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder " <?php if ($valTypeC != 1) { echo 'style="display:none;"'; } ?>>
            <tr>
               <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                  <span class="formFontSubjectTxt"><?= $langMod["txt:title"] ?></span><br />
                  <span class="formFontTileTxt"><?= $langMod["txt:titleDe"] ?></span>
               </td>
            </tr>
            <tr>
               <td colspan="7" align="left" valign="top" class="formTileTxt">
                  <div class="viewEditorTileTxt">
                     <?
                     if (file_exists($valHtml)) {
                        $fd = @fopen($valHtml, "r");
                        $contents = @fread($fd, filesize($valHtml));
                        @fclose($fd);
                        echo txtReplaceHTML($contents);
                     }
                     ?>
                  </div>
               </td>
            </tr>
         </table>
         <br <?php if ($valTypeC != 1) { echo 'style="display:none;"'; } ?>/>
         <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder " <?php if ($valTypeC != 1) { echo 'style="display:none;"'; } ?>>
            <tr>
               <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                  <span class="formFontSubjectTxt"><?= $langMod["txt:album"] ?></span><br />
                  <span class="formFontTileTxt"><?= $langMod["txt:albumDe"] ?></span>
               </td>
            </tr>
            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= $langMod["txt:album"] ?>:<span class="fontContantAlert"></span></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                  <div class="formDivView">
                     <?
                     $sql_filetemp = "SELECT  " . $mod_tb_root_album . "_id," . $mod_tb_root_album . "_filename," . $mod_tb_root_album . "_name," . $mod_tb_root_album . "_download  FROM " . $mod_tb_root_album . " WHERE " . $mod_tb_root_album . "_contantid 	='" . $valSGid . "'   AND " . $mod_tb_root_album . "_language ='" . $_REQUEST['inputLt'] . "'    ORDER BY " . $mod_tb_root_album . "_id ASC";
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
                     ?>
                           <? if ($_REQUEST['viewID'] <= 0) { ?>
                              <a rel="viewAlbum" title="" href="<?= $mod_path_album . "/reB_" . $downloadFile ?>">
                                 <img src="<?= $mod_path_album . "/reO_" . $downloadFile ?>" width="50" height="50" style="float:left;border:#c8c7cc solid 1px;margin-bottom:15px;margin-right:15px;" /></a>
                           <? } else { ?>
                              <img src="<?= $mod_path_album . "/reO_" . $downloadFile ?>" width="50" height="50" style="float:left;border:#c8c7cc solid 1px;margin-bottom:15px;margin-right:15px;" />
                           <? } ?>
                        <?
                        }
                     } else {
                        ?>
                        -
                     <? } ?>
                  </div>
               </td>
            </tr>
         </table>
         <br <?php if ($valTypeC != 1) { echo 'style="display:none;"'; } ?>/>
         <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder " <?php if ($valTypeC != 1) { echo 'style="display:none;"'; } ?>>
            <tr>
               <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                  <span class="formFontSubjectTxt"><?= $langMod["txt:video"] ?></span><br />
                  <span class="formFontTileTxt"><?= $langMod["txt:videoDe"] ?></span>
               </td>
            </tr>
            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= $langMod["txt:video"] ?>:<span class="fontContantAlert"></span></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                  <div class="formDivView">
                     <?
                     if ($valType == "file") {
                        if ($valFilevdo != "") {
                           $filename = $valFilevdo;
                           $arrstrfile = explode(".", $valFilevdo);
                           $filetype = strtolower($arrstrfile[sizeof($arrstrfile) - 1]);
                     ?>
                           <div id="areaPlayer" style="z-index:-1999; "></div>
                        <? } else { ?>
                           -
                        <?
                        }
                     } else {
                        if ($valUrl != "") {
                           $myUrlArray = explode("v=", $valUrl);
                           $myUrlCut = $myUrlArray[1];
                           $myUrlCutArray = explode("&", $myUrlCut);
                           $myUrlCutAnd = $myUrlCutArray[0];
                        ?>
                           <iframe width="560" height="315" src="//www.youtube-nocookie.com/embed/<?= $myUrlCutAnd ?>" frameborder="0" allowfullscreen style="z-index:-1999; "></iframe>
                        <? } else { ?>
                           -
                     <?
                        }
                     }
                     ?>

                  </div>
               </td>
            </tr>
         </table>
         <br <?php if ($valTypeC != 1) { echo 'style="display:none;"'; } ?>/>
         <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder " <?php if ($valTypeC == 3) { echo 'style="display:none;"'; } ?>>
            <tr>
               <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                  <span class="formFontSubjectTxt"><?= $langMod["txt:attfile"] ?></span><br />
                  <span class="formFontTileTxt"><?= $langMod["txt:attfileDe"] ?></span>
               </td>
            </tr>
            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= $langMod["txt:attfile"] ?>:<span class="fontContantAlert"></span></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                  <div class="formDivView">
                     <?
                     $sql = "SELECT " . $mod_tb_file . "_id," . $mod_tb_file . "_filename," . $mod_tb_file . "_name," . $mod_tb_file . "_download FROM " . $mod_tb_file . " WHERE " . $mod_tb_file . "_contantid 	='" . $valSGid . "'   AND " . $mod_tb_file . "_language ='" . $_REQUEST['inputLt'] . "'   ORDER BY " . $mod_tb_file . "_id ASC";
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
                     ?>

                           <div style="float:left; width:100%; height:30px; margin-bottom:15px;"><img src="<?= get_Icon($downloadFile) ?>" align="absmiddle" width="30" /><a href="../<?= $mod_fd_root ?>/download.php?linkPath=<?= $linkRelativePath ?>&amp;downloadFile=<?= $downloadFile ?>"><?= $downloadName . "" . $imageType ?></a> | <?= $langMod["file:type"] ?>: <?= $imageType ?> | <?= $langMod["file:size"] ?>: <?= get_IconSize($linkRelativePath) ?> | <?= $langMod["file:download"] ?>: <?= number_format($countDownload) ?></div>
                           <div></div>

                     <?
                        }
                     } else {
                        echo "-";
                     }
                     ?>
                  </div>
               </td>
            </tr>
         </table>
         <br <?php if ($valTypeC == 3) { echo 'style="display:none;"'; } ?>/>
         <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder " <?php if ($valTypeC != 1) { echo 'style="display:none;"'; } ?>>
            <tr>
               <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                  <span class="formFontSubjectTxt"><?= $langMod["txt:seo"] ?></span><br />
                  <span class="formFontTileTxt"><?= $langMod["txt:seoDe"] ?></span>
               </td>
            </tr>
            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= $langMod["inp:seotitle"] ?>:<span class="fontContantAlert"></span></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                  <div class="formDivView"><?= $valMetatitle ?></div>
               </td>
            </tr>
            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= $langMod["inp:seodes"] ?>:<span class="fontContantAlert"></span></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                  <div class="formDivView"><?= $valDescription ?></div>
               </td>
            </tr>
            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= $langMod["inp:seokey"] ?>:<span class="fontContantAlert"></span></td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                  <div class="formDivView"><?= $valKeywords ?></div>
               </td>
            </tr>
         </table>
         <br <?php if ($valTypeC != 1) { echo 'style="display:none;"'; } ?>/>
         <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
            <tr>
               <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                  <span class="formFontSubjectTxt"><?= $langTxt["us:titleinfo"] ?></span><br />
                  <span class="formFontTileTxt"><?= $langTxt["us:titleinfoDe"] ?></span>
               </td>
            </tr>
            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= $langMod["tit:view"] ?>:</td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                  <div class="formDivView"><?= $valView ?></div>
               </td>
            </tr>
            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= $langTxt["us:credate"] ?>:</td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                  <div class="formDivView"><?= $valCredate ?></div>
               </td>
            </tr>
            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= $langTxt["us:creby"] ?>:</td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                  <div class="formDivView">
                     <?
                     if ($_SESSION[$valSiteManage . 'core_session_language'] == "Thai") {
                        echo getUserThai($valCreby);
                     } else if ($_SESSION[$valSiteManage . 'core_session_language'] == "Eng") {
                        echo getUserEng($valCreby);
                     }
                     ?>
                  </div>
               </td>
            </tr>
            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= $langTxt["us:lastdate"] ?>:</td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                  <div class="formDivView"><?= $valLastdate ?></div>
               </td>
            </tr>
            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= $langTxt["us:creby"] ?>:</td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                  <div class="formDivView">
                     <?
                     if ($_SESSION[$valSiteManage . 'core_session_language'] == "Thai") {
                        echo getUserThai($valLastby);
                     } else if ($_SESSION[$valSiteManage . 'core_session_language'] == "Eng") {
                        echo getUserEng($valLastby);
                     }
                     ?>
                  </div>
               </td>
            </tr>
            <tr>
               <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= $langTxt["mg:status"] ?>:</td>
               <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                  <div class="formDivView">

                     <? if ($valStatus == "Enable") { ?>
                        <span class="<?= $valStatusClass ?>"><?= $valStatus ?></span>
                     <? } else if ($valStatus == "Home") { ?>
                        <span class="<?= $valStatusClass ?>"><?= $valStatus ?></span>
                     <? } else { ?>
                        <span class="<?= $valStatusClass ?>"><?= $valStatus ?></span>
                     <? } ?>
                  </div>
               </td>
            </tr>
         </table>
         <br /> <? if ($_REQUEST['viewID'] <= 0) { ?>

            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">

               <tr>
                  <td colspan="7" align="right" valign="top" height="20"></td>
               </tr>
               <tr>
                  <td colspan="7" align="right" valign="middle" class="formEndContantTb"><a href="#defTop" title="<?= $langTxt["btn:gototop"] ?>"><?= $langTxt["btn:gototop"] ?> <img src="../img/btn/top.png" align="absmiddle" /></a></td>
               </tr>
            <? } ?>
            </table>
      </div>
   </form>
   <script src="../js/bootstrap/bootstrap_edition.min.js"></script>
   <? include("../lib/disconnect.php"); ?>
   <? if ($_REQUEST['viewID'] <= 0) { ?>
      <link rel="stylesheet" type="text/css" href="../js/fancybox/jquery.fancybox.css" media="screen" />
      <script language="JavaScript" type="text/javascript" src="../js/fancybox/jquery.fancybox.js"></script>
      <script type="text/javascript">
         jQuery(function() {
            jQuery('a[rel=viewAlbum]').fancybox({
               'padding': 0,
               'transitionIn': 'fade',
               'transitionOut': 'fade',
               'autoSize': false,
            });
         });
      </script>
   <? } ?>

   <script type='text/javascript' src='../<?= $mod_fd_root ?>/swfobject.js'></script>
   <script type='text/javascript' src='../<?= $mod_fd_root ?>/silverlight.js'></script>
   <script type='text/javascript' src='../<?= $mod_fd_root ?>/wmvplayer.js'></script>
   <script type='text/javascript'>
      var filename = "<?= $filename ?>";
      var filetype = "<?= $filetype ?>";
      var cnt = document.getElementById("areaPlayer");
      if (filetype == "flv") {
         var s1 = new SWFObject('../<?= $mod_fd_root ?>/player.swf', 'player', '560', '315', '9');
         s1.addParam('allowfullscreen', 'true');
         s1.addParam('wmode', 'transparent');
         s1.addParam('allowscriptaccess', 'always');
         s1.addParam('flashvars', 'file=<?= $mod_path_vdo ?>/' + filename);
         s1.write('areaPlayer');
      } else /* if(filetype=="wmv")*/ {

         var src = '../<?= $mod_fd_root ?>/wmvplayer.xaml';
         var cfg = "";
         var ply;
         cfg = {
            file: '<?= $mod_path_vdo ?>/' + filename,
            image: '',
            height: '315',
            width: '560',
            autostart: "false",
            windowless: 'true',
            showstop: 'true'
         };
         ply = new jeroenwijering.Player(cnt, src, cfg);
      }

      $(function() {

         $('.tool-items').hide();
      });
   </script>


</body>

</html>