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
                <link href="../css/theme.css" rel="stylesheet"/>
                <title><?= $core_name_title ?></title>
                <script language="JavaScript"  type="text/javascript" src="../js/jquery-1.9.0.js"></script>
                <script language="JavaScript"  type="text/javascript" src="../js/jquery.blockUI.js"></script>
                <script language="JavaScript"  type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
                </head>

                <body>

                    <table width="100%" border="0" cellspacing="0" cellpadding="0">

                        <tr>
                            <td valign="top" class="bg_centerhome" align="center"><table width="450"  border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td valign="top">
                                            <table border="0" cellpadding="0" cellspacing="1">
                                                <tr> 
                                                    <td > <table border="0" cellpadding="0" cellspacing="1" class="table_border">
                                                            <form action="/?" method="post" name="myForm" id="myForm">
                                                                <tr align="center"> 
                                                                    <? for ($i = 1; $i <= $core_icon_columnsize; $i++) { ?>
                                                                        <td height="22" class="table_header">&nbsp;</td>
                                                                    <? } ?>
                                                                </tr>
                                                                <?
// Get Files
                                                                $colCount = 0;
                                                                $handle = opendir($core_icon_librarypath);
                                                                while (false !== ($file = readdir($handle))) {
                                                                    if ($file != "." && $file != "..") {
                                                                        if (is_file($core_icon_librarypath . "/" . $file)) {
                                                                            $size = GetImageSize($core_icon_librarypath . "/" . $file);
                                                                            if ($size != NULL) {
                                                                                $ImgWidth = $size[0];
                                                                                $ImgHeight = $size[1];
                                                                                if ($ImgWidth <= $core_icon_maxsize && $ImgHeight <= $core_icon_maxsize) {
                                                                                    if ($colCount == 0) {
                                                                                        ?>
                                                                                        <tr> 
                                                                                            <?
                                                                                        }
                                                                                        if ($myClassName == "table_row1") {
                                                                                            $myClassName = "table_row2";
                                                                                        } else {
                                                                                            $myClassName = "table_row1";
                                                                                        }
                                                                                        $colCount++;
                                                                                        ?>
                                                                                        <td width="30" height="30" align="center" class="<?= $myClassName ?>"><img src="<?= $core_icon_librarypath ?>/<?= $file ?>" onMouseOver="this.style.cursor = 'hand'" onClick="setImageSelected('<?= $core_icon_librarypath . "/" . $file ?>')"></td>
                                                                                    <?
                                                                                    if ($colCount == $core_icon_columnsize) {
                                                                                        $colCount = 0;
                                                                                        ?>
                                                                                        </tr>
                                                                                        <?
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                                closedir($handle);

                                                                if ($colCount < $core_icon_columnsize) {
                                                                    for ($i = $colCount; $i < $core_icon_columnsize; $i++) {
                                                                        if ($myClassName == "mytable_row1") {
                                                                            $myClassName = "mytable_row2";
                                                                        } else {
                                                                            $myClassName = "mytable_row1";
                                                                        }
                                                                        ?>
                                                                    </form>
                                                                    <td width="30" height="30" align="center" class="table_row2">&nbsp;</td>
        <?
    }
}
?>
                                                        </table>                </td>
                                                </tr>
                                            </table>    </td>
                                    </tr>
                                </table></td>
                        </tr>

                        <tr>
                            <td  class="bg_footerbarhome" ></td>
                        </tr>  

                    </table>

                </body>
                </html>
