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
" . $mod_tb_root . "_view as view,
" . $mod_tb_root_lang . "_subject as subject,
" . $mod_tb_root_lang . "_htmlfilename as htmlfilename, 
" . $mod_tb_root_lang . "_metatitle as metatitle,
" . $mod_tb_root_lang . "_description as description, 
" . $mod_tb_root_lang . "_keywords as keyword, 
" . $mod_tb_root_lang . "_id as lid,
" . $mod_tb_root . "_icon as icon";
$sql .= "    FROM " . $mod_tb_root . " INNER JOIN " . $mod_tb_root_lang . " ON " . $mod_tb_root . "_id = " . $mod_tb_root_lang . "_cid
WHERE " . $mod_tb_root . "_masterkey='" . $_REQUEST["masterkey"] . "'  AND  " . $mod_tb_root . "_id='" . $_REQUEST['valEditID'] . "' AND " . $mod_tb_root_lang . "_language = '" . $_REQUEST['inputLt'] . "' ";

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
  <script language="JavaScript" type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
  <?php require_once "../assets/inc/module-js.php"; ?>
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
                                                        document.myFormHome.valEditID.value=<?= $valID ?>;
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
          <td width="18%" align="right" valign="top" class="formLeftContantTb"><?= $langMod["tit:subject"] ?>:<span class="fontContantAlert"></span></td>
          <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
            <div class="formDivView"><?= $valSubject ?></div>
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
              <?
              $fd = @fopen($valHtml, "r");
              $contents = @fread($fd, filesize($valHtml));
              @fclose($fd);
              echo txtReplaceHTML($contents);
              ?>
            </div>
          </td>
        </tr>
      </table>

      <br />
      <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
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

      <br />
      <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
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