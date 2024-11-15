<?
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("../core/incLang.php");
include("config.php");
include("incModLang.php");
$arrLang = $_SESSION[$valSiteManage . "core_session_multilang"];

// if (in_array($_REQUEST['masterkey'], $mod_fix_masterkey)) {
//   $arrLangNew = array();
//   foreach ($arrLang as $keyLang => $valueLang) {
//     if ($valueLang['key'] == $_SESSION[$valSiteManage . "core_session_language"]) {
//       $arrLangNew[] = array(
//         'id' => $valueLang['id'],
//         'key' => $valueLang['key'],
//       );
//     }
//   }
//   $arrLang = $arrLangNew;
// }

$langShow = $_POST['inputLang'] ? $_POST['inputLang'] : $_SESSION[$valSiteManage . "core_session_language"]; 

$valClassNav = 2;
$valNav1 = $langTxt["nav:home2"];
$valLinkNav1 = "../core/index.php";
$valNav2 = getNameMenu($_REQUEST["menukeyid"]);

$sql = "SELECT   ";
$sql .= "   " . $mod_tb_root . "_id as id,
" . $mod_tb_root . "_credate as credate,
" . $mod_tb_root . "_crebyid as crebyid,
" . $mod_tb_root . "_status as status,
" . $mod_tb_root . "_sdate as sdate,
" . $mod_tb_root . "_edate as edate,
" . $mod_tb_root_lang . "_lastdate as lastdate,
" . $mod_tb_root_lang . "_lastbyid as lastbyid,
" . $mod_tb_root . "_view as view,
" . $mod_tb_root_lang . "_subject as subject,
" . $mod_tb_root_lang . "_htmlfilename as htmlfilename, 
" . $mod_tb_root_lang . "_metatitle as metatitle,
" . $mod_tb_root_lang . "_description as description, 
" . $mod_tb_root_lang . "_keywords as keyword, 
" . $mod_tb_root_lang . "_id as lid,
" . $mod_tb_root . "_icon as icon";
$sql .= "    FROM " . $mod_tb_root . " INNER JOIN " . $mod_tb_root_lang . " ON " . $mod_tb_root . "_id = " . $mod_tb_root_lang . "_cid
WHERE " . $mod_tb_root . "_masterkey='" . $_REQUEST["masterkey"] . "' AND " . $mod_tb_root_lang . "_language = '" . $langShow . "' ";
$Query = wewebQueryDB($coreLanguageSQL, $sql);
$NumRows = wewebNumRowsDB($coreLanguageSQL, $Query);
if ($NumRows == 0) {
  $sql = "SELECT MAX(" . $mod_tb_root . "_order) FROM " . $mod_tb_root . " WHERE " . $mod_tb_root . "_masterkey = '" . $_REQUEST["masterkey"] . "' ";
  $Query = wewebQueryDB($coreLanguageSQL, $sql);
  $Row = wewebFetchArrayDB($coreLanguageSQL, $Query);
  $maxOrder = $Row[0] + 1;

  $insert = array();
  $insert[$mod_tb_root . "_masterkey"] = "'" . $_REQUEST["masterkey"] . "'";
  $insert[$mod_tb_root . "_crebyid"] = "'" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
  $insert[$mod_tb_root . "_creby"] = "'" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
  $insert[$mod_tb_root . "_lastbyid"] = "'" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
  $insert[$mod_tb_root . "_lastby"] = "'" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
  $insert[$mod_tb_root . "_sdate"] = "'" . DateFormatInsert($_REQUEST['sdateInput']) . "'";
  $insert[$mod_tb_root . "_edate"] = "'" . DateFormatInsert($_REQUEST['edateInput']) . "'";
  $insert[$mod_tb_root . "_icon"] = "'" . $_REQUEST['picname'] . "'";
  $insert[$mod_tb_root . "_credate"] = "NOW()";
  $insert[$mod_tb_root . "_lastdate"] = "NOW()";
  $insert[$mod_tb_root . "_status"] = "'Disable'";
  $insert[$mod_tb_root . "_order"] = "'" . $maxOrder . "'";
  $sql = "INSERT INTO " . $mod_tb_root . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
  $Query = wewebQueryDB($coreLanguageSQL, $sql);
  $contantID1 = wewebInsertID($coreLanguageSQL);

  $insertLang = array();
  $insertLang[$mod_tb_root_lang . "_cid"] = "'" . $contantID1 . "'";
  $insertLang[$mod_tb_root_lang . "_masterkey"] = "'" . $_REQUEST["masterkey"] . "'";
  $insertLang[$mod_tb_root_lang . "_language"] = "'" . $_SESSION[$valSiteManage . 'core_session_language'] . "'";
  $insertLang[$mod_tb_root_lang . "_lastbyid"] = "'" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
  $insertLang[$mod_tb_root_lang . "_lastby"] = "'" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
  $insertLang[$mod_tb_root_lang . "_lastdate"] = "NOW()";

  $sqllang = "INSERT INTO " . $mod_tb_root_lang . "(" . implode(",", array_keys($insertLang)) . ") VALUES (" . implode(",", array_values($insertLang)) . ")";
  $Querylang = wewebQueryDB($coreLanguageSQL, $sqllang);
  $contantLID = wewebInsertID($coreLanguageSQL);
}

$sql = "SELECT   ";
$sql .= "   " . $mod_tb_root . "_id as id,
" . $mod_tb_root . "_credate as credate,
" . $mod_tb_root . "_crebyid as crebyid,
" . $mod_tb_root . "_status as status,
" . $mod_tb_root . "_sdate as sdate,
" . $mod_tb_root . "_edate as edate,
" . $mod_tb_root_lang . "_lastdate as lastdate,
" . $mod_tb_root_lang . "_lastbyid as lastbyid,
" . $mod_tb_root . "_view as view,
" . $mod_tb_root_lang . "_subject as subject,
" . $mod_tb_root_lang . "_htmlfilename as htmlfilename, 
" . $mod_tb_root_lang . "_metatitle as metatitle,
" . $mod_tb_root_lang . "_description as description, 
" . $mod_tb_root_lang . "_keywords as keyword, 
" . $mod_tb_root_lang . "_id as lid,
" . $mod_tb_root . "_icon as icon";
$sql .= "    FROM " . $mod_tb_root . " INNER JOIN " . $mod_tb_root_lang . " ON " . $mod_tb_root . "_id = " . $mod_tb_root_lang . "_cid
WHERE " . $mod_tb_root . "_masterkey='" . $_REQUEST["masterkey"] . "' AND " . $mod_tb_root_lang . "_language = '" . $langShow . "' ";

$Query = wewebQueryDB($coreLanguageSQL, $sql);
$Row = wewebFetchArrayDB($coreLanguageSQL, $Query);
$valID = $Row[0];
$valCredate = DateFormat($Row[1]);
$valCreby = $Row[2];
$valStatus = $Row[3];
if ($valStatus == "Enable") {
  $valStatusClass =  "fontContantTbEnable";
} elseif ($valStatus == "Home") {
  $valStatusClass =  "fontContantTbHomeSt";
} else {
  $valStatusClass =  "fontContantTbDisable";
}

if ($Row[4] == "0000-00-00 00:00:00") {
  $valSdate = "-";
} else {
  $valSdate = DateFormatReal($Row[4]);
}
if ($Row[5] == "0000-00-00 00:00:00") {
  $valEdate = "-";
} else {
  $valEdate = DateFormatReal($Row[5]);
}

$valLastdate = DateFormat($Row[6]);

$valLastby = $Row[7];

$valView = number_format($Row[8]);
$valSubject = rechangeQuot($Row[9]);
$valHtml = $mod_path_html . "/" . $Row[10];
$valMetatitle = rechangeQuot($Row[11]);
$valDescription = rechangeQuot($Row[12]);
$valKeywords = rechangeQuot($Row[13]);
$valSGid = $Row[14];
$valPicName = $Row['icon'];
$valPic = $mod_path_pictures . "/" . $Row['icon'];

$valPermission = getUserPermissionOnMenu($_SESSION[$valSiteManage . "core_session_groupid"], $_REQUEST["menukeyid"]);

logs_access('3', 'View');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="robots" content="noindex, nofollow">
  <meta name="googlebot" content="noindex, nofollow">
  <link href="../css/theme.css" rel="stylesheet" />

  <title><?= $core_name_title ?></title>
  <link href="../js/jquery.toolbar.css" rel="stylesheet" />
  <script language="JavaScript" type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
  <script language="JavaScript" type="text/javascript" src="../js/jquery.toolbar.js"></script>
  <script language="JavaScript" type="text/javascript" src="../js/scripttoolbarjs.js?v=<?php echo date('YmdHis'); ?>"></script>
</head>

<body>
  <form action="?" method="get" name="myForm" id="myForm">
    <input name="execute" type="hidden" id="execute" value="update" />
    <input name="masterkey" type="hidden" id="masterkey" value="<?= $_REQUEST['masterkey'] ?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?= $_REQUEST['menukeyid'] ?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?= $_REQUEST['inputSearch'] ?>" />
    <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?= $_REQUEST['module_pageshow'] ?>" />
    <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?= $_REQUEST['module_pagesize'] ?>" />
    <input name="module_orderby" type="hidden" id="module_orderby" value="<?= $_REQUEST['module_orderby'] ?>" />
    <input name="inputGh" type="hidden" id="inputGh" value="<?= $_REQUEST['inputGh'] ?>" />
    <input name="valEditID" type="hidden" id="valEditID" value="<?= $_REQUEST['valEditID'] ?>" />
    <input name="inputLt" type="hidden" id="inputLt" value="<?= $_REQUEST['inputLt'] ?>" />
    <? if ($_REQUEST['viewID'] <= 0) { ?>
      <div class="divRightNav">
        <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
          <tr>
            <td class="divRightNavTb" align="left"><span class="fontContantTbNav"><a href="<?= $valLinkNav1 ?>" target="_self"><?= $valNav1 ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?= $valNav2 ?>(<?php echo $langShow; ?>)</span></td>
            <td class="divRightNavTb" align="right">
            </td>
          </tr>
        </table>
      </div>
    <? } ?>
    <div class="divRightHead">
      <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center">
        <tr>
          <td height="77" align="left"><span class="fontHeadRight"><?= $valNav2 ?>(<?php echo $langShow; ?>)</span></td>
          <td align="left">
            <table border="0" cellspacing="0" cellpadding="0" align="right">
              <tr>
                <td align="right">
                  <select name="inputLang" id="inputLang" class="formSelectSearchStyle" onchange="document.myForm.submit();">
                    <?php
                    foreach ($arrLang as $keyLang => $valueLang) {
                    ?>
                      <option value="<?php echo $valueLang['key']; ?>" <?php if($langShow == $valueLang['key']){ echo "selected"; } ?>><?php echo $valueLang['key']; ?></option>
                    <?php } ?>
                  </select>
                </td>
                <td align="right">
                  <? if ($_REQUEST['viewID'] <= 0) { ?>
                    <? if ($valPermission == "RW") { ?>
                      <div class="buttonEdit btnEditView" title="<?= $langTxt["btn:edit"] ?>" onclick="document.myFormHome.valEditID.value='<?= $valID ?>';"></div>
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
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= $langMod["tit:subject"] ?>:<span class="fontContantAlert"></span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <div class="formDivView"><?= $valSubject ?></div>
          </td>
        </tr>
      </table>
      <br style="display: none;" />
      <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder" style="display: none;">
        <tr>
          <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
            <span class="formFontSubjectTxt"><?= $langMod["txt:pic"] ?></span><br />
            <span class="formFontTileTxt"><?= $langMod["txt:picDe"] ?></span>
          </td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><span class="fontContantAlert"></span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <div class="formDivView">
              <img src="<?= $valPic ?>" style="float:left;border:#c8c7cc solid 1px; max-width:600px;" onerror="this.src='<?= "../img/btn/nopic.jpg" ?>'" />
            </div>
          </td>
        </tr>
        <tr style="display:none;">
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= $modTxtShowPic[0] ?>:<span class="fontContantAlert"></span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <div class="formDivView"><?= $modTxtShowPic[$valPicShow] ?></div>
          </td>
        </tr>
      </table>
      <br />
      <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
        <tr>
          <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
            <span class="formFontSubjectTxt"><?= $langMod["txt:title"] ?></span><br />
            <span class="formFontTileTxt"><?= $langMod["txt:titleDe"] ?></span>
          </td>
        </tr>
        <tr>
          <td colspan="7" align="left" valign="top" class="formTileTxt">
            <div class="viewEditorTileTxt">
              <?php
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
      <br />
      <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
        <tr>
          <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
            <span class="formFontSubjectTxt"><?= $langMod["txt:date"] ?></span><br />
            <span class="formFontTileTxt"><?= $langMod["txt:dateDe"] ?></span>
          </td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= $langMod["tit:sdate"] ?>:<span class="fontContantAlert"></span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <div class="formDivView"><?= $valSdate ?></div>
          </td>
        </tr>
        <tr>
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= $langMod["tit:edate"] ?>:<span class="fontContantAlert"></span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <div class="formDivView"><?= $valEdate ?></div>
          </td>
        </tr>
      </table>
      <br />
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
              <? if ($valPermission == "RW") { ?>
                <div id="load_status<?= $valID ?>">
                  <? if ($valStatus == "Enable") { ?>

                      <a href="javascript:void(0)" onclick="changeStatus('load_waiting<?= $valID ?>', '<?= $mod_tb_root ?>', '<?= $valStatus ?>', '<?= $valID ?>', 'load_status<?= $valID ?>', '../<?= $mod_fd_root ?>/statusMgH.php')"><span class="<?= $valStatusClass ?>"><?= $valStatus ?></span></a>
                  <? } else if ($valStatus == "Home") { ?>

                      <a href="javascript:void(0)" onclick="changeStatus('load_waiting<?= $valID ?>', '<?= $mod_tb_root ?>', '<?= $valStatus ?>', '<?= $valID ?>', 'load_status<?= $valID ?>', '../<?= $mod_fd_root ?>/statusMgH.php')"><span class="<?= $valStatusClass ?>"><?= $valStatus ?></span></a>
                  <? } else { ?>

                      <a href="javascript:void(0)" onclick="changeStatus('load_waiting<?= $valID ?>', '<?= $mod_tb_root ?>', '<?= $valStatus ?>', '<?= $valID ?>', 'load_status<?= $valID ?>', '../<?= $mod_fd_root ?>/statusMgH.php')"> <span class="<?= $valStatusClass ?>"><?= $valStatus ?></span> </a>

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
  <? include("../lib/disconnect.php"); ?>

  <div id="toolbar-options" class="hidden">
    <? foreach ($arrLang as $key => $value) {
    ?>
      <a href="javascript:void(0);" class="action_toolbar" onclick="
                           document.myFormHome.inputLt.value = '<?= $value['key'] ?>';
                           editContactNew('editContant.php');"><?= $value['key'] ?></a>
    <? }
    ?>
  </div>
</body>

</html>