<?
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("incModLang.php");
include("config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>Uuload File</title>
   </head>
   <body>
      <?php
      $error = "";
      $msg = "";
      $fileElementName = 'inputFileUpload';
      if (!empty($_FILES['inputFileUpload']['error'])) {
         switch ($_FILES['inputFileUpload']['error']) {

            case '1':
               $error = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
               break;
            case '2':
               $error = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
               break;
            case '3':
               $error = 'The uploaded file was only partially uploaded';
               break;
            case '4':
               $error = 'No file was uploaded.';
               break;

            case '6':
               $error = 'Missing a temporary folder';
               break;
            case '7':
               $error = 'Failed to write file to disk';
               break;
            case '8':
               $error = 'File upload stopped by extension';
               break;
            case '999':
            default:
               $error = 'No error code avaiable';
         }
      } elseif ($_FILES['inputFileUpload']['tmp_name'] == 'none') {
         $error = 'No file was uploaded..';
      } else {

         if (!is_dir($core_pathname_upload . "/" . $_REQUEST['masterkey'])) {
            mkdir($core_pathname_upload . "/" . $_REQUEST['masterkey'], 0777);
         }
         if (!is_dir($mod_path_file)) {
            mkdir($mod_path_file, 0777);
         }

         $inputFileToUpload = $_FILES['inputFileUpload']['tmp_name'];
         $inputFileToName = $_FILES['inputFileUpload']['name'];
         $fileType = explode(".", $inputFileToName);
         $countBtType = count($fileType) - 1;
         $fileNameNew = $fileType[0];
         $fileTypeName = $fileType[$countBtType];
         $myNewRand = randomNameUpdate(2);
         $filenamedoc = "file-" . $_REQUEST['myID'] . "-" . $_REQUEST['langt'] . "-" . $myNewRand . ".$fileTypeName";

         if (copy($inputFileToUpload, $mod_path_file . "/" . $filenamedoc)) {
            @chmod($mod_path_file . "/" . $filenamedoc, 0777);
         }

         $fileNameLast = explode("." . $fileTypeName, $inputFileToName);
         if ($_REQUEST['nametodoc'] == "") {
            // $nameToinput= $fileNameNew;
            $nameToinput = $fileNameLast[0];
         } else {
            $nameToinput = $_REQUEST['nametodoc'];
         }

         $insert = array();
         $insert[$mod_tb_fileTemp . "_contantid"] = "'" . $_REQUEST['myID'] . "'";
         $insert[$mod_tb_fileTemp . "_filename"] = "'" . $filenamedoc . "'";
         $insert[$mod_tb_fileTemp . "_name"] = "'" . $nameToinput . "'";
         $insert[$mod_tb_fileTemp . "_language"] = "'" . $_REQUEST['langt'] . "'";

         $sql = "INSERT INTO " . $mod_tb_fileTemp . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
         $Query = wewebQueryDB($coreLanguageSQL, $sql);

         $sql = "SELECT " . $mod_tb_fileTemp . "_id," . $mod_tb_fileTemp . "_filename," . $mod_tb_fileTemp . "_name," . $mod_tb_fileTemp . "_download FROM " . $mod_tb_fileTemp . " WHERE " . $mod_tb_fileTemp . "_contantid 	='" . $_REQUEST['myID'] . "'   ORDER BY " . $mod_tb_fileTemp . "_id ASC";
         $query_file = wewebQueryDB($coreLanguageSQL, $sql);
         $number_row = wewebNumRowsDB($coreLanguageSQL, $query_file);
         //$msg .= $_REQUEST['myID'];
         if ($number_row >= 1) {
            while ($row_file = wewebFetchArrayDB($coreLanguageSQL, $query_file)) {
               $linkRelativePath = $mod_path_file . "/" . $row_file[1];
               $downloadFile = $row_file[1];
               $downloadID = $row_file[0];
               $downloadName = $row_file[2];
               $countDownload = $row_file[3];
               $imageType = strstr($downloadFile, '.');

               $msg .= "<a href=\"javascript:void(0)\"  onclick=\" document.myForm.valDelFile.value=" . $downloadID . ";delFileUpload(\'deleteFileInsert.php\')\" ><img src=\"../img/btn/delete.png\" align=\"absmiddle\" title=\"Delete file\"  hspace=\"10\"  vspace=\"10\"   border=\"0\" /></a>" . $downloadName . "" . $imageType . " | " . $langMod["file:type"] . ": " . $imageType . "  | " . $langMod["file:size"] . ": " . get_IconSize($linkRelativePath) . " <br/>";
            }
         }
      }
      echo "{";

      echo "error: '" . $error . "',\n";
      echo "msg: '" . $msg . "'\n";
      echo "}";
      include("../lib/disconnect.php");
      ?>
   </body>
</html>
