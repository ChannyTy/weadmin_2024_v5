<?php
$path_root = "/weadmin_2024_v5"; #ถ้า root อยู่ public
// $path_root = "/mommy"; #ถ้า root ไม่ได้อยู่ public
define("_http", "http");

if (_http == "http") {
    //$redirect= _http."://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    //header("Location:$redirect");
    //exit();
}

define("_DIR", str_replace("\\", '/', dirname(__FILE__)));
define("_URI", basename($_SERVER["REQUEST_URI"]));
define("_URL", _http . "://" . $_SERVER['HTTP_HOST'] . $path_root . "/");
define("_FullUrl", _http . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
define("_Domain", _http . "://" . $_SERVER['HTTP_HOST']);
define("_URLPagination", _http . "://" . $_SERVER['HTTP_HOST'] . $path_root . "");

require_once _DIR . '/front/libs/config.php'; #load config
require_once _DIR . '/front/libs/setting.php'; #load setting
require_once _DIR . '/front/libs/function.php'; #load function
require_once _DIR . '/front/libs/url.php'; #load url
require_once _DIR . '/front/libs/Mobile_Detect.php'; #load url

##check divice ##
$detectDivice = new Mobile_Detect;

## load modulus ##
require_once _DIR . '/front/controller/modulus/member.php'; #load member status

## member ##
$member = new member;
if (isset($_SESSION[_URL]['token'])) {
    $member->tokenCheck();
} else {
    if (isset($_COOKIE['token']) && !isset($_SESSION[_URL]['reboot'])) {
        $member->reloadUser();
    } else {
        $member->tokenCreate();
    }
}
$memberID = $member->tokenGetUser();
if (!empty($memberID['member_info'])) {
    $smarty->assign("userinfo", $memberID);
}

$member->saveCookie();

$memberLogin = method_exists($member, 'login_status') ? $member->login_status() : 0;

if (!empty($memberLogin)) {
    $smarty->assign("login", true);
} else {
    $smarty->assign("login", false);
}

## call page ##
$url = new url;

$linklang = configlang($url->pagelang[2]);

if (empty($url->segment[0])) {
    header("Location:" . $linklang . "/" . $url_show_default);
    exit();
}

$smarty->assign("ul", $linklang);
$smarty->assign("langon", $url->pagelang[2]);

if (!empty($url->uri['terms'])) {
    header("Location:" . $linklang . "/terms/" . $url->uri['terms']);
    exit();
}

$page = pagepagination($url);
$smarty->assign("page", $page);

## popup ##
if (!empty($_SESSION['alert'])) {
    $smarty->assign("alertpopup", $_SESSION['alert']);
}
if (!empty($_SESSION['alertsubmit'])) {
    $smarty->assign("alertsubmitModal", $_SESSION['alertsubmit']);
}
if (!empty($_SESSION['modalcall'])) {
    $smarty->assign("modalcall", $_SESSION['modalcall']);
}

##  lang ##
$lang = array();
require_once _DIR . '/front/libs/lang/' . $lang_default . '.php'; #load url
if ($lang_default != $url->pagelang[2]) {
    require_once _DIR . '/front/libs/lang/' . $url->pagelang[2] . '.php'; #load url
}


## addon page ##
$loadcate = $url->loadmodulus(array("_mainpage"));
foreach ($loadcate as $loadmodulus) {
    include_once $loadmodulus;
}

## load page ##
$pageload = $url->page();
foreach ($pageload['load'] as $loadpage) {
    include_once $loadpage;
}

# assign active menu
if (empty($menuActive)) {
    $menuActive = "home";
}
$smarty->assign("navactive", $menuActive);
$smarty->assign("lastModify", $lastModify);
$smarty->assign("home", $url_show_default);
$smarty->assign("lang", $lang);
$smarty->assign("assigncss", $listcss);
$smarty->assign("assignjs", $listjs);
$smarty->assign("template", _URL . $path_template[$templateweb][0]);
$smarty->assign("base", _URL);
$smarty->assign("fullurl", _FullUrl);
$smarty->assign("Domain", _Domain);

$smarty->assign("urlPagination", _URLPagination);

####  inc-file
$smarty->assign("incfile", $incfile);

if (!empty($settingPage)) {
    $smarty->display($settingPage['display'] . ".tpl");
}

$db->Close();

#==============================================================##
## page loadder sec ##
// $time = microtime();
// $time = explode(' ', $time);
// $time = $time[1] + $time[0];
// $finish = $time;
// $total_time = round(($finish - $start), 4);
// echo 'Page generated in '.$total_time.' seconds.';
