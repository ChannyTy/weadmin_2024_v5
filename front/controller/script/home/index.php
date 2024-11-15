<?php
$menuActive = "home";
$listjs[] = '<script type="text/javascript" src="' . _URL . 'front/controller/script/' . $menuActive . '/js/script.js"></script>';
$HomePage = new HomePage;

switch ($url->segment[1]) {
    default:
        $callTopGraphic  = $HomePage->callTopGraphic($config['tgp']['masterkey']);
        $smarty->assign("callTopGraphic", $callTopGraphic);
        
        /*## Start SEO #####*/
        $seo_desc = "";
        $seo_title = $lang['menu']['home'];
        $seo_keyword = "";
        Seo($seo_title, $seo_desc, $seo_keyword, $seo_pic);
        /*## End SEO #####*/

        $settingPage = array(
            "page" => $menuActive,
            "template" => "index.tpl",
            "display" => "page"
        );
        break;
}
$smarty->assign("menuActive", $menuActive);
$smarty->assign("fileInclude", $settingPage);
