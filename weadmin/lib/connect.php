<?
include 'adodb5/adodb.inc.php';

$dbConnect = NewADOConnection($coreLanguageSQL);
// wewebConnect($coreLanguageSQL, $core_db_hostname, $core_db_username, $core_db_password) or die("Warning !! N0 Connect DataBase");
wewebConnect($coreLanguageSQL, $_ENV[$_CORE_ENV]['hostname'], $_ENV[$_CORE_ENV]['username'], $_ENV[$_CORE_ENV]['password'], $_ENV[$_CORE_ENV]['name']) or die("Warning !! N0 Connect DataBase");

############################################
function getNameSeo($valTable, $valField) {
############################################
    global $coreLanguageSQL;
    global $dbConnect;
    $ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
    $sql_pic = "SELECT " . $valField . "  FROM " . $valTable . " WHERE  1=1";
    $row_pic = $dbConnect->execute($sql_pic);
    $txt_pic_funtion = $row_pic->fields[$valField];
    return $txt_pic_funtion;
}


## Core Title  ######################################################
$fornt_name_keywords =getNameSeo($core_tb_setting,$core_tb_setting."_titleB");
$fornt_name_description =getNameSeo($core_tb_setting,$core_tb_setting."_titleB");
$core_name_title ="ยินดีต้อนรับเข้าสู่ระบบบริการจัดการเว็บไซต์ : " . getNameSeo($core_tb_setting,$core_tb_setting."_titleB");
$valNameSystem = getNameSeo($core_tb_setting,$core_tb_setting."_subject");
$valTitleSystem = getNameSeo($core_tb_setting,$core_tb_setting."_title");
$valPicSystem = getNameSeo($core_tb_setting,$core_tb_setting."_pic");
$valPicHeaderSystem = getNameSeo($core_tb_setting,$core_tb_setting."_header");
$valPicBgSystem = getNameSeo($core_tb_setting,$core_tb_setting."_bg");

?>
