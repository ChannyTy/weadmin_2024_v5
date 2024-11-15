<?php

ob_start();
session_cache_expire(1280);
$cache_expire = session_cache_expire();
@session_start();

$valSiteManage = "dmsc" . "_";

// Convert Variable Array To Variable
foreach( $_GET as $xVarName => $xVarvalue ) {
    ${$xVarName} = $xVarvalue;
}

foreach($_POST as $xVarName => $xVarvalue ) {
    ${$xVarName} = $xVarvalue;
}

foreach( $_SESSION as $xVarName => $xVarvalue ) {
    ${$xVarName} = $xVarvalue;
}

foreach( $_COOKIE as $xVarName => $xVarvalue ) {
    ${$xVarName} = $xVarvalue;
}

foreach( $_FILES as $xVarName => $xVarvalue ) {
    ${$xVarName."_name"} = $xVarvalue['name'];
    ${$xVarName."_type"} = $xVarvalue['type'];
    ${$xVarName."_size"} = $xVarvalue['size'];
    ${$xVarName."_error"} = $xVarvalue['error'];
    ${$xVarName} = $xVarvalue['tmp_name'];
}

// Session Handle Current User Information ------------------
if (!isset($_SESSION[$valSiteManage . 'core_session_id'])) {
    $_SESSION[$valSiteManage . 'core_session_id'] = 0;
}

if (!isset($_SESSION[$valSiteManage . 'core_session_name'])) {
    $_SESSION[$valSiteManage . 'core_session_name'] = "";
}

if (!isset($_SESSION[$valSiteManage . 'core_session_level'])) {
    $_SESSION[$valSiteManage . 'core_session_level'] = "";
}

if (!isset($_SESSION[$valSiteManage . 'core_session_groupid'])) {
    $_SESSION[$valSiteManage . 'core_session_groupid'] = 0;
}

if (!isset($_SESSION[$valSiteManage . 'core_session_permission'])) {
    $_SESSION[$valSiteManage . 'core_session_permission'] = "";
}

if (!isset($_SESSION[$valSiteManage . 'core_session_language'])) {
    $_SESSION[$valSiteManage . 'core_session_language'] = "Thai";
}

if (!isset($_SESSION[$valSiteManage . 'core_session_logout'])) {
    $_SESSION[$valSiteManage . 'core_session_logout'] = "";
}

if (!isset($_SESSION[$valSiteManage . 'core_session_languageT'])) {
    $_SESSION[$valSiteManage . 'core_session_languageT'] = 1;
}

if (!isset($_SESSION[$valSiteManage . 'core_session_usrcar'])) {
    $_SESSION[$valSiteManage . 'core_session_usrcar'] = 0;
}

if (!isset($_SESSION[$valSiteManage . 'core_session_typeproblem'])) {
    $_SESSION[$valSiteManage . 'core_session_typeproblem'] = 0;
}

if (!isset($_SESSION[$valSiteManage . 'core_session_storeid'])) {
    $_SESSION[$valSiteManage . 'core_session_storeid'] = 0;
}
if (!isset($_SESSION[$valSiteManage . 'core_session_multilang'])) {
    $_SESSION[$valSiteManage . 'core_session_multilang']= array();
}

## Core Cketitor #############################################
$_SESSION["myBackOfficeSession"] = "/weadmin_2024_v5/ckeditor/upload/files/id" . $_SESSION[$valSiteManage . 'core_session_id'];
$valFolderCkEditor = "/ckeditor/upload/files/id" . $_SESSION[$valSiteManage . 'core_session_id'];
if (!empty($_SESSION[$valSiteManage . "core_session_id"])) {
    if ($_SESSION[$valSiteManage . "core_session_id"] >= 1) {
        if (!is_dir("../../" . $valFolderCkEditor)) {
            @mkdir("../../" .$valFolderCkEditor, 0777);
        }
    }
}

################## Wewebplus Connect DB ##########################
function wewebConnect($valCoreDB, $valHost, $valUser, $valPass, $valDb) {
################## Set Up Function ###############################
    global $dbConnect, $core_db_name;

    if (!empty($valDb)) {
        $core_db_name = $valDb;
    }

    $dbConnect->Connect($valHost, $valUser, $valPass, $core_db_name);
    $dbConnect->charSet = 'SET NAMES utf8';

    $dbConnect->Execute("SET character_set_results=utf8");
    $dbConnect->Execute("SET collation_connection=utf8_general_ci");
    $dbConnect->Execute("SET NAMES 'utf8'");

    //$dbConnect->SetFetchMode(ADODB_FETCH_ASSOC);
    $dbConnect->cacheSecs = 3600 * 12;

    return $dbConnect;
}

//################## Wewebplus Select DB ##########################
//
//function wewebSelectDB($valCoreDB, $valDatabaseName) {
//################## Set Up Function ###############################
//    if ($valCoreDB == "mssql") {
//        $valSelectDB = mssql_select_db($valDatabaseName);
//    } else {
//        $valSelectDB = mysql_select_db($valDatabaseName);
//    }
//
//    return $valSelectDB;
//}
################## Wewebplus Query DB ##########################

function wewebQueryDB($valCoreDB, $valSqlQuery) {
################## Set Up Function ###############################
    global $dbConnect;
    $valQueryDB = $dbConnect->execute($valSqlQuery);
    return $valQueryDB;
}

################## Wewebplus Num Rows DB ##########################

function wewebNumRowsDB($valCoreDB, $valQueryDB) {
################## Set Up Function ###############################
    return $valQueryDB->_numOfRows;
}

################## Wewebplus Fetch Array DB ##########################

function wewebFetchArrayDB($valCoreDB, $valQueryDB) {
//################## Set Up Function ###############################
    return $valQueryDB->FetchRow();
}

################## Wewebplus Now DB ##########################

function wewebNow($valCoreDB) {
################## Set Up Function ###############################
    if ($valCoreDB == "mssql") {
        $valNowDB = "GETDATE()";
    } else {
        $valNowDB = "NOW()";
    }
    return $valNowDB;
}

################## Wewebplus Insert Last ID DB ##########################

function wewebInsertID($valCoreDB, $valTable=null, $valTableF=null) {
################## Set Up Function ###############################
global $connectWeweb,$dbConnect;
    if ($valCoreDB == "mssql") {
        $valNowDB = wewebMssqlInsertID($valTable, $valTableF);
    } else {
        $valNowDB =$dbConnect->insert_id();
    }
    return $valNowDB;
}

################## Wewebplus Disconnect DB ##########################

function wewebDisconnect($valCoreDB) {
################## Set Up Function ##################################
global $dbConnect,$valResultDisconnect;
    if ($valCoreDB == "mssql") {
        $valResultDisconnect = mssql_close();
    } else {
        $valResultDisconnect = $dbConnect->close();
    }

    return $valResultDisconnect;
}

################## Wewebplus escape DB ##########################

function wewebEscape($valCoreDB, $valDate) {
################## Set Up Function ##################################
    if ($valCoreDB == "mssql") {
        $valResultEscape = ms_escape_string($valDate);
    } else {
        $valResultEscape = ms_escape_string($valDate);
    }

    return $valResultEscape;
}

###################### Escape SQL  ######################

function ms_escape_string($data) {
###################### Set Up Function ######################
    if (!isset($data) or empty($data))
        return '';
    if (is_numeric($data))
        return $data;

    $non_displayables = array(
        '/%0[0-8bcef]/', // url encoded 00-08, 11, 12, 14, 15
        '/%1[0-9a-f]/', // url encoded 16-31
        '/[\x00-\x08]/', // 00-08
        '/\x0b/', // 11
        '/\x0c/', // 12
        '/[\x0e-\x1f]/'             // 14-31
    );
    foreach ($non_displayables as $regex)
        $data = preg_replace($regex, '', $data);
    $data = str_replace("'", "''", $data);
    return $data;
}

###################### Max ID SQL  ######################

function wewebMssqlInsertID($valTable, $valTableF) {
###################### Set Up Function ######################
global $coreLanguageSQL;
    $sql = "SELECT MAX(" . $valTableF . ") FROM " . $valTable;
    $Query = wewebQueryDB($coreLanguageSQL,$sql);
    list($fileId) = wewebFetchArrayDB($coreLanguageSQL,$Query);
    return $fileId;
}


// ## Core security upload  #############################################
// $core_session_main_url = "https://" . $_SERVER["HTTP_HOST"] . "/weadmin/index.php";

// $redirect_pathname = explode("/", $_SERVER['PHP_SELF']);
// $result_lastpath = $redirect_pathname[count($redirect_pathname) - 2];

// if ($result_lastpath != 'weadmin') {
// 	if($_SESSION[$valSiteManage."core_session_logout"]<=0){
// 		if ($check_login_status != 1) {
// 			echo "<script>window.top.location.href = \"".$core_session_main_url."\";</script>";
// 			die();
// 		}
// 	}
// }

// ## array file not allow
// $core_notfile_type = array('php', 'exe', 'ini');
// foreach($_FILES as $corechkerror_x => $corechkerror_val) {
// $corechk_ext =strtolower(pathinfo($_FILES[$corechkerror_x]["name"], PATHINFO_EXTENSION));
//     if(in_array($corechk_ext, $core_notfile_type)){
// 			echo "<script>window.top.location.href = \"".$core_session_main_url."\";</script>";
//         die();
//     }
// }


?>
