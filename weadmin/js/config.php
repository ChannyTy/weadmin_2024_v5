<?
error_reporting(0);
date_default_timezone_set('Asia/Bangkok');
ini_set('memory_limit', '128M');
## Core Title  ######################################################
$core_name_title = "ยินดีต้อนรับเข้าสู่ระบบบริการจัดการเว็บไซต์  : บริษัท สยามออเชิร์ดกรุ๊ป จำกัด By Wewebplus";
$fornt_name_title = "บริษัท สยามออเชิร์ดกรุ๊ป จำกัด";
$fornt_name_description = "บริษัท สยามออเชิร์ดกรุ๊ป จำกัด";
$fornt_name_keywords = "บริษัท สยามออเชิร์ดกรุ๊ป จำกัด";
## Core Folder Local  ######################################################
//$core_pathname_folderlocal = "/mindtrips";
//$core_pathname_webservices = "http://xmlusa.58899.net";

$core_pathname_folderlocal = "";
$core_pathname_webservices = "http://test.58899.net";

$core_pathname_serviceuser= "151";
$core_default_typemail="2";

## Core Upload  ######################################################
$core_pathname_upload = "../../upload";
$core_pathname_upload_fornt = "upload";
$core_pathname_mupload = "../core/upload/";
$core_pathname_logs = "../../logs";

## Core Path RSS  ##################################################

$core_fullpath_rss = "http://" . $_SERVER["HTTP_HOST"] . "" . $core_pathname_folderlocal . "/upload";
$core_variable_charset = "UTF-8";
$core_relativepath_rss = "../../rss";

## Core Path Name  ##################################################
$core_full_path = "https://" . $_SERVER["HTTP_HOST"] . "" . $core_pathname_folderlocal;

## Core Path SQL Language ##################################################
$coreLanguageSQL = "mysql";

## Core Table  ######################################################
$core_tb_staff = "sy_stf";
$core_tb_menu = "sy_mnu";
$core_tb_group = "sy_grp";
$core_tb_permission = "sy_mis";
$core_tb_box = "sy_box";
$core_tb_search = "sy_sea";
$core_tb_log = "sy_logs";
$core_tb_sort = "sy_stm";
$core_tb_setting = "sy_stt";
$core_tb_usercar = "md_srd";
$core_tb_service = "md_srs";
$core_tb_user = "sy_usr";

## Other Table  ######################################################
$other_tb_geography = "ot_geo";
$other_tb_province = "ot_pro";
$other_tb_amphur = "ot_amp";
$other_tb_district = "ot_dis";
$other_tb_nation = "ot_nat";

## Core Icon  ######################################################
$core_icon_columnsize = 15;
$core_icon_maxsize = 75;
$core_icon_librarypath = "../img/iconmenu";

## Database Connect #################################################
if ($coreLanguageSQL == "mssql") {
    $core_db_hostname = "localhost";
    $core_db_username = "sa";
    $core_db_password = "P@ssw0rd";
    $core_db_name = "easyandsave";
} else {
    $core_db_hostname = "localhost";
    $core_db_username = "root";
    $core_db_password = "rootkIx90wIj123";
    $core_db_name = "mindtripsWeb";

//    $core_db_hostname = "localhost";
//    $core_db_username = "root";
//    $core_db_password = "love";
//    $core_db_name = "mindtrips";

}
$core_qu_site = "_MT_";

## Core Val Setting #############################################
$toolEditorStyle = "ToolbarAll";
$core_default_pagesize = 15;
$core_default_maxpage = 15;
$core_default_reduce = 10;
$core_sort_number = "DESC";
$core_height_leftmenu = 40;
$core_default_typemail = 1;

## Core Language #############################################
$coreLanguageThai = "Thai";
$coreLanguageEng = "Eng";

## Core Email #############################################
$core_send_email = "info@mindtrips.com";
$core_goto_email = "info@mindtrips.com";
$core_agent_email = "info@mindtrips.com";



## Core Value #############################################
$coreMonthMem = array("-", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
$coreMonthMemEng = array("-", "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
$corePositionBanner = array("", "Home", "Self Drive", "Hotel Booking", "Air Ticket", "Pocket Wifi", "JR Railpass", "Travel Insurance", "Theme Park Tickets", "Transfer Bus", "Package Tour", "Other Services", "News & Promotion","Contact Us","Member");
$coreSortServices = array("", "ราคา", "ระดับ", "ใกล้สถานีรถไฟ", "ใกล้สนามบิน", "ที่จอดรถ");
## Core Theme #############################################
$core_main_theme = array(
    0 => array("color" => "#ec4963","theme"=>"theme.css"),
    1 => array("color" => "#e38e34","theme"=>"theme2.css"),
    2 => array("color" => "#d34395","theme"=>"theme3.css"),
    3 => array("color" => "#bf293f","theme"=>"theme4.css"),
    4 => array("color" => "#03a453","theme"=>"theme5.css"),
    5 => array("color" => "#8f519c","theme"=>"theme6.css"),
    6 => array("color" => "#ec4147","theme"=>"theme7.css"),
    7 => array("color" => "#ed1d25","theme"=>"theme8.css"),
    8 => array("color" => "#93cb5b","theme"=>"theme9.css"),
    9 => array("color" => "#df7d31","theme"=>"theme10.css")
);

## Core path nopic #############################################
$core_nopic_fb = "images/nopic/nopic_fb.jpg";
$core_nopic_tg = "images/nopic/nopic_tg.jpg";
$core_nopic_tr_large = "images/nopic/nopic_tr_large.jpg";
$core_nopic_bn = "images/nopic/nopic_bn.jpg";
$core_nopic_country = "images/nopic/nopic_country.jpg";
$core_nopic_map = "images/nopic/nopic_map.jpg";
$core_nopic_tr = "images/nopic/nopic_tr.jpg";

## Core Value Mail ##############################################
$core_mail_thankyou="ขอขอบพระคุณ ,";
$core_mail_company = "บริษัท สยามออเชิร์ดกรุ๊ป จำกัด";
$core_mail_sentby="This e-mail was sent by:";
$core_mail_address="5/1 นราธิวาสราชนครินทร์ ซอย 10 แขวงทุ่งวัดดอน เขตสาทร กทม 10120 Tel. +662-612-8555";

## Core Price rang ##############################################
$core_price_rang = array(
    1 => array("tmp"=>"ต่ำกว่า 10,000 บาท","min"=>0,"max"=>10000),
    2 => array("tmp"=>"10,001-30,000 บาท","min"=>10001,"max"=>30000),
    3 => array("tmp"=>"30,001-50,000 บาท","min"=>30001,"max"=>50000),
    4 => array("tmp"=>"50,001-100,000 บาท","min"=>50001,"max"=>100000),
    5 => array("tmp"=>"100,001-200,000 บาท","min"=>100001,"max"=>200000),
    6 => array("tmp"=>"200,001-500,000 บาท","min"=>200001,"max"=>500000),
    7 => array("tmp"=>"500,001 บาทขึ้นไป","min"=>500001,"max"=>99999999)
);

## Core Social link #############################################
$core_fb = "https://www.facebook.com/mindtripss";
$core_line = "http://line.me/ti/p/%40ksv3281t";
$core_youtube = "https://www.youtube.com/channel/UCCziJcKc8W5ngcf9xPc8wsg";
$core_instagram = "https://www.instagram.com/siamorchard_group/";
$core_twitter = "https://twitter.com/SiamOrchard?lang=th";
$core_apple = "https://itunes.apple.com/us/app/new-travel-experience/id430813561?mt=8";

## Core Payment UOB #############################################
$corePaymentGatewayURL='http://61.91.120.84/UOBTPGW/Payment/Payment/Payment';
$corePaymentGatewayID='900301001079';
$coreCurrencyCode='764';
$coreHashValue='0JUM9EL2FP5TZ6UXQZQ9EATZJX3D1W2R';
$coreNonsecure='Y';
$coreCampaignCode='';
$coreDefined1='userDefined1';
$coreDefined2='userDefined2';
$coreDefined3='userDefined3';
$coreDefined4='userDefined4';
$coreDefined5='userDefined5';
$coreLaLog='13.716667,100.516670';


?>