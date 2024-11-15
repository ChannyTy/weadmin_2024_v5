<?php

## Mod Table ###################################
$mod_tb_root = "md_cms";
$mod_tb_root_lang = "md_cmsl";
$mod_tb_root_group = "md_cmg";
$mod_tb_root_group_lang = "md_cmgl";
$mod_tb_root_subgroup = "md_cmsg";
$mod_tb_root_subgroup_lang = "md_cmsgl";
$mod_tb_root_sylang = 'sy_lang';
$mod_tb_file = "md_cmf";
$mod_tb_fileTemp = "md_cmtp";
$mod_tb_root_album = "md_cma";
$mod_tb_root_albumTemp = "md_cmatp";

$mod_tb_permis = "sy_grp";
$mod_tb_permisGroup = "md_cmsp";
## Mod Folder ###################################
$mod_fd_root = "mod_cmsg";

## Setting Value ###################################
$modTxtShowCase = array("ประเภทการแสดงผล", "แสดงรายละเอียด", "เอกสารดาวน์โหลด", "เชื่อมโยงภายนอก");
$modTxtShowPic = array("ประเภทการแสดงผลรูปภาพ", "เลือกจากระบบ", "อัพโหลด");
$modTxtTarget = array("", "เปิดหน้าต่างเดิม", "เปิดหน้าต่างใหม่");
$modStatus = array("Enable", "Disable");
$modStatusHome = array("Enable", "Disable", "Home");

$modPeriodType = array(
    1 => "ตามช่วงเวลา",
    2 => "ระบุข้อความ"
);

## URL Search ###################################
$mod_url_search_th = "|weweb|";
$mod_url_search_en = "|weweb|";

$mod_url_search_front = "http://edailyreport.dmcr.go.th/milestone/detail/|id|";

## Size Photo ###################################
$sizeWidthPic = "600";
$sizeHeightPic = "600";

$sizeWidthOff = "50";
$sizeHeightOff = "50";

$sizeWidthAlbum = "1080";
$sizeHeightAlbum = "720";

$sizeWidthAlbumOff = "250";
$sizeHeightAlbumOff = "250";

## Mod Path RSS ###################################
$mod_fullpath_pictures = $core_fullpath_rss . "/" . $masterkey . "/pictures";

## Mod Path ###################################

$mod_path_html = $core_pathname_upload . "/" . $masterkey . "/html";
$mod_path_html_fornt = $core_pathname_upload_fornt . "/" . $masterkey . "/html";

$mod_path_file = $core_pathname_upload . "/" . $masterkey . "/file";
$mod_path_file_fornt = $core_pathname_upload_fornt . "/" . $masterkey . "/file";

$mod_path_pictures = $core_pathname_upload . "/" . $masterkey . "/pictures";
$mod_path_pictures_fornt = $core_pathname_upload_fornt . "/" . $masterkey . "/pictures";

$mod_path_office = $core_pathname_upload . "/" . $masterkey . "/office";
$mod_path_office_fornt = $core_pathname_upload_fornt . "/" . $masterkey . "/office";

$mod_path_real = $core_pathname_upload . "/" . $masterkey . "/real";
$mod_path_real_fornt = $core_pathname_upload_fornt . "/" . $masterkey . "/real";

$mod_path_album = $core_pathname_upload . "/" . $masterkey . "/album";
$mod_path_album_fornt = $core_pathname_upload_fornt . "/" . $masterkey . "/album";

$mod_path_vdo = $core_pathname_upload . "/" . $masterkey . "/vdo";
$mod_path_vdo_fornt = $core_pathname_upload_fornt . "/" . $masterkey . "/vdo";

$mod_pathTheme_pictures = $core_pathname_upload . "/" . $masterkeyTheme . "/pictures";
$mod_pathTheme_pictures_fornt = $core_pathname_upload_fornt . "/" . $masterkeyTheme . "/pictures";
$mod_inputseach = array(
    "inputGh"
    , "inputTh"
    , "inputSearch"
);

$mod_distance = array(
    5, 10, 15, 20, 25, 30
);

function match_todog($cid, $gid) {
   global $coreLanguageSQL;

   $sql = "SELECT md_todog_id FROM md_todog WHERE md_todog_cid=$cid AND md_todog_gid=$gid";
   $query = wewebQueryDB($coreLanguageSQL, $sql);
   $numrow = wewebNumRowsDB($coreLanguageSQL, $query);
   if ($numrow > 0) {
      return true;
   }

   return false;
}

function select_radius() {
   global $coreLanguageSQL;

   $sql = "SELECT md_radius_subject FROM md_radius WHERE 1 ORDER BY md_radius_subject ASC";
   $query = wewebQueryDB($coreLanguageSQL, $sql);
   $out = array();
   while ($result = wewebFetchArrayDB($coreLanguageSQL, $query)) {
      $out[] = $result[0];
   }

   return $out;
}

?>
