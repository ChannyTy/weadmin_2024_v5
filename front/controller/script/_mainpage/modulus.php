<?php
$infoSetting = $mainPage->infoSetting;

#function assign seo & title page
function Seo($title = '', $desc = '', $keyword = '')
{
    global $smarty, $infoSetting;
    $list = array();
    if (!empty($title)) {
        if (!empty($infoSetting->fields['metatitle'])) {
            $list_last = $infoSetting->fields['metatitle'];
        } elseif (!empty($infoSetting->fields['subject'])) {
            $list_last = $infoSetting->fields['subject'];
        } else {
            $list_last = 'Template Website';
        }

        $list['title'] = trim($title) . " - " . $list_last;
    } else {
        if (!empty($infoSetting->fields['metatitle'])) {
            $list['title'] = $infoSetting->fields['metatitle'];
        } elseif (!empty($infoSetting->fields['subject'])) {
            $list['title'] = $infoSetting->fields['subject'];
        } else {
            $list['title'] = 'Template Website';
        }
    }

    if (!empty($desc)) {
        $list['desc'] = trim($desc);
    } else {
        $list['desc'] = $infoSetting->fields['description'];
    }

    if (!empty($keyword)) {
        $list['keyword'] = trim($keyword);
    } else {
        $list['keyword'] = $infoSetting->fields['keywords'];
    }
    $smarty->assign("seo", $list);
}

#### SETTING
$settingWeb = array();
$settingWeb['id'] = $infoSetting->fields['id'];
$settingWeb['masterkey'] = $infoSetting->fields['masterkey'];
$settingWeb['subject'] = $infoSetting->fields['subject'];
$settingWeb['subjectoffice'] = $infoSetting->fields['subjectoffice'];
$settingWeb['description'] = $infoSetting->fields['description'];
$settingWeb['keywords'] = $infoSetting->fields['keywords'];
$settingWeb['metatitle'] = $infoSetting->fields['metatitle'];
$settingWeb['contact'] = unserialize($infoSetting->fields['config']);
$settingWeb['social'] = unserialize($infoSetting->fields['social']);
$settingWeb['addresspic'] = $infoSetting->fields['addresspic'];
// print_pre($settingWeb);
$smarty->assign("settingWeb", $settingWeb);
