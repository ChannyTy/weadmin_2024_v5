<?
include("../lib/session.php");
include("../lib/config.php");
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
</head>

<body>

  <table width="100%" border="0" cellspacing="0" cellpadding="0">

    <tr>
      <td valign="top" class="bg_centerhome" align="center">
        <table width="450" height="250" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td valign="top">

              <?

              function formatImageSize($mySize)
              {
                if ($mySize > 1024 * 1024) {
                  return sprintf("%1.2f", $mySize / (1024 * 1024)) . "M";
                } else {
                  return sprintf("%1.2f", $mySize / 1024) . "k";
                }
              }

              function removeEndSlash($myURL)
              {
                if ($myURL[strlen($myURL) - 1] == "/") {
                  return substr($myURL, 0, strlen($myURL) - 1);
                } else {
                  return $myURL;
                }
              }

              function removeEndURL($myURL)
              {
                $myURLArray = explode("/", $myURL);
                $myURL  = $myURLArray[0];
                for ($i = 1; $i < count($myURLArray) - 1; $i++) {
                  $myURL =  $myURL . "/" . $myURLArray[$i];
                }
                return $myURL;
              }

              function getFileOrFolderName($myURL)
              {
                $myURLArray = explode("/", $myURL);
                return $myURLArray[count($myURLArray) - 1];
              }

              function getFileOrFolderNameUpload($myURL)
              {
                $myURLArray = explode("\\", $myURL);
                return $myURLArray[count($myURLArray) - 1];
              }

              ?>
              <table width="100%" height="100%" border="0" cellpadding="2" cellspacing="0">

                <tr>
                  <td align="center" valign="top">
                    <?
                    $ImagePath = "..";
                    if ($CurrentPath == "") {
                      $CurrentPath = $ImagePath;
                    }
                    $CurrentPath = removeEndSlash($CurrentPath);
                    $UpPath = removeEndURL($CurrentPath);
                    ?>
                    <table width="100%" border="0" cellpadding="1" cellspacing="0" id="htmltool_table">
                      <tr>
                        <td height="22" align="center" valign="middle">&nbsp;</td>
                        <td height="22" colspan="2" align="left"><span class="font_style10">
                            <?= $CurrentPath ?>
                          </span></td>
                      </tr>
                      <?
                      if ($CurrentPath != $ImagePath) {
                        $FullPathBaseURL = $FullPath . "/" . substr($CurrentPath, strlen($ImagePath) + 1, strlen($CurrentPath));
                      ?>
                        <tr onMouseOver="this.style.background='#DDDDDD'" onMouseOut="this.style.background=''">
                          <td width="18" height="18" align="center" valign="middle"><img src="../img/iconmenu/1283582620_045.png" width="16" height="16"></td>
                          <td width="638" height="18" align="left"> <a href="?CurrentPath=<?= $UpPath . "/" . $file ?>">..</a></td>
                          <td width="41">&nbsp;</td>
                        </tr>
                        <?
                      } else {
                        $FullPathBaseURL = $FullPath;
                      }

                      // Get Folder
                      $handle = opendir($CurrentPath);
                      while (false !== ($file = readdir($handle))) {
                        if ($file != "." && $file != "..") {
                          if (is_dir($CurrentPath . "/" . $file)) {
                            // Get Files Inside
                            $FileInside = 0;
                            $ImageFileInside = 0;
                            $FileInsideHandle = opendir($CurrentPath . "/" . $file);
                            while (false !== ($FileInsideFile = readdir($FileInsideHandle))) {
                              if ($FileInsideFile != "." && $FileInsideFile != "..") {
                                $FileInside++;
                                if (is_file($CurrentPath . "/" . $file . "/" . $FileInsideFile)) {
                                  //$size=GetImageSize($CurrentPath . "/". $file . "/". $FileInsideFile); 
                                  //if($size!=NULL) {
                                  $ImageFileInside++;
                                  //}
                                }
                              }
                            }
                            closedir($FileInsideHandle);
                        ?>
                            <tr onMouseOver="this.style.background='#DDDDDD'" onMouseOut="this.style.background=''">
                              <td width="18" height="18" align="center" valign="middle">
                                <? if ($FileInside == 0) { ?>
                                  <img src="../img/iconmenu/1283582638_046.png" width="16" height="16">
                                <? } else { ?>
                                  <img src="../img/iconmenu/1283582638_046.png" width="16" height="16">
                                <? } ?>
                              </td>
                              <td height="18" align="left"> <a href="?CurrentPath=<?= $CurrentPath . "/" . $file ?>">
                                  <?= $file ?>
                                </a></td>
                              <td width="41">&nbsp;</td>
                            </tr>
                          <?
                          }
                        }
                      }
                      closedir($handle);

                      // Get Files
                      $handle = opendir($CurrentPath);
                      while (false !== ($file = readdir($handle))) {
                        if ($file != "." && $file != "..") {
                          if (is_file($CurrentPath . "/" . $file)) {
                          ?>
                            <tr onMouseOver="this.style.background='#DDDDDD'" onMouseOut="this.style.background=''">
                              <td width="18" height="18" align="center" valign="middle"> <img src="../img/iconmenu/1283582674_169.png" width="16" height="16"> </td>
                              <td height="18" align="left"> <a href="#" onClick="setPath('<?= $file ?>')">
                                  <?= $file ?>
                                </a></td>
                              <td width="41">
                                <?= formatImageSize(filesize($CurrentPath . "/" . $file)) ?> </td>
                            </tr>
                      <?
                          }
                        }
                      }
                      closedir($handle);
                      ?>
                    </table>
                  </td>
                </tr>
              </table>
              <script language="JavaScript" type="text/JavaScript">
                function setPath(myFile) {
	window.opener.document.myForm.inputlinkpath.value = '<?= $CurrentPath ?>'+'/'+myFile;
	window.close();
}
	  </script>
            </td>
          </tr>
        </table>
      </td>
    </tr>

    <tr>
      <td class="bg_footerbarhome"></td>
    </tr>
    <tr>
      <td align="center" style="padding-top:5px;"></td>
    </tr>
  </table>

</body>

</html>