<?php

## load modulus ##
require_once _DIR . '/front/libs/adodb5/adodb.inc.php';
// require_once _DIR . '/front/libs/smarty3130/Smarty.class.php';
// require_once _DIR . '/front/libs/smarty3130/SmartyBC.class.php';

require_once _DIR . '/front/libs/smarty4320/Smarty.class.php';
// require_once _DIR . '/front/libs/smarty4320/SmartyBC.class.php';

## adodb start ##
$db = NewADOConnection($coreLanguageSQL);
$db->Connect($_ENV[$_CORE_ENV]['hostname'], $_ENV[$_CORE_ENV]['username'], $_ENV[$_CORE_ENV]['password'], $_ENV[$_CORE_ENV]['name']);


$db->charSet = "SET NAMES " . $core_db_charecter_set['charset'];
$db->Execute("SET character_set_results=" . $core_db_charecter_set['charset']);
$db->Execute("SET collation_connection=" . $core_db_charecter_set['collation']);
$db->Execute("SET NAMES '" . $core_db_charecter_set['charset'] . "'");
//$db->SetFetchMode(ADODB_FETCH_ASSOC);
$db->cacheSecs = 3600 * 12;

## smarty start ##
$smarty = new Smarty;
// $smarty = new SmartyBC();
$smarty->loadPlugin('smarty_compiler_switch');
$smarty->debugging = FALSE;
$smarty->caching = FALSE;
$smarty->setTemplateDir($path_template[$templateweb])->setCompileDir($path_compile)->setCacheDir($path_cache);
