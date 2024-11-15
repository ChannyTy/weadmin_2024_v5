<?php

class member {

//    public $token;
//    public $login_status;
//    public $actionfail;
//    public $msg;
//    public $codeerror;
//    
    ####
    private $token_timeout;
    private $token_cookie_timeout;
    private $token_action;

    public function __construct() {
        global $token_timeout, $token_cookie_timeout, $token_action;
        $this->token_timeout = $token_timeout;
        $this->token_cookie_timeout = $token_cookie_timeout;
        $this->token_action = $token_action;
    }

    function tokenCreate() {

        $list = array();
        $list['ip'] = getip();
        $list['login_status'] = FALSE;
        $list['actionfail'] = FALSE;
        $list['start'] = date("Y:m:d H:i:s");
        $list['exp'] = $this->generateExp();
        $list['cookie_id'] = $_COOKIE['PHPSESSID'];
        $list['member_info'] = FALSE;
        $list['url'] = _URL;

        return $this->tokenSave($list);
    }

    function tokenUpdate($array) {
    // print_pre($array);
    // die();
        $_SESSION[_URL]['reboot'] = false;
        $tokenList = unserialize(decodeStr($_SESSION[_URL]["token"]));
        if ($tokenList['url'] == _URL) {
            foreach ($tokenList as $key => $value) {

                if (isset($array[$key])) {
                    switch ($key) {
                        case 'actionfail':
                            $tokenList[$key] = $tokenList[$key] + $array[$key];
                            break;

                        default:
                            $tokenList[$key] = $array[$key];
                            break;
                    }
                }
            }

            return $this->tokenSave($tokenList);
        }
    }

    function tokenCheck() {
        // $_SESSION[_URL]['reboot'] = false;
        $tokenList = unserialize(decodeStr($_SESSION[_URL]["token"]));
        $dateNow = strtotime(date("Y:m:d H:i:s"));
        $dateTokenExp = strtotime($tokenList['exp']);

        if ($tokenList['url'] != _URL) {
            $this->tokenClear();
        } else {
            if ($tokenList['actionfail'] >= $this->token_action) {
                $tokenList['login_status'] = FALSE;
                $tokenList['msg'] = "TOKEN BLOCK WAIT " . $this->token_cookie_timeout . " HR.";
                $tokenList['codeerror'] = 1;
            } elseif ($dateTokenExp <= $dateNow) {
                $tokenList['login_status'] = FALSE;
                $tokenList['start'] = date("Y:m:d H:i:s");
                $tokenList['exp'] = $this->generateExp();
                $tokenList['msg'] = "TOKEN EXPIRED";
                $tokenList['codeerror'] = 2;

//        } elseif ($tokenList['cookie_id'] != $_COOKIE['PHPSESSID']) {
//            $tokenList['login_status'] = FALSE;
//            $tokenList['msg'] = "TOKEN NOT USE";
//            $tokenList['codeerror'] = 3;
//            $tokenList['cookie_id'] = $_COOKIE['PHPSESSID'];
//        } else {
            } else {

                $tokenList['exp'] = $this->generateExp();
                $tokenList['msg'] = FALSE;
                $tokenList['codeerror'] = FALSE;

                unset($tokenList['msg']);
                unset($tokenList['codeerror']);
            }

            return $this->tokenSave($tokenList);
        }
    }

    function tokenSave($token) {
        $setToken = encodeStr(serialize($token));
        $_SESSION[_URL]['token'] = $setToken;
        return $_SESSION[_URL]['token'];
    }

    function tokenGetUser() {
        return unserialize(decodeStr($_SESSION[_URL]["token"]));
    }

    function generateExp() {
        $timestamp = strtotime(date("Y:m:d H:i:s")) + 60 * $this->token_timeout;
        $time = date('Y:m:d H:i:s', $timestamp);
        return $time;
    }

    function codeerror() {
        $tokenList = unserialize(decodeStr($_SESSION[_URL]["token"]));
        return $tokenList['codeerror'];
    }

    function login_status() {
        $tokenList = unserialize(decodeStr($_SESSION[_URL]["token"]));
        return $tokenList['login_status'];
    }

    function tokenClear() {
        $_SESSION[_URL]['token'] = "";
        unset($_SESSION[_URL]['token']);
        $_SESSION[_URL]['reboot'] = true;

        setcookie("token", null, time() - ((60 * 60) * $this->token_cookie_timeout));
        setcookie("token", null, time() - ((60 * 60) * $this->token_cookie_timeout), "/");
        unset($_COOKIE['token']);

        if (!empty($_SESSION[_URL]['token']) || !empty($_COOKIE['token'])) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function saveCookie() {
        $setPut = $_SESSION[_URL]['token'];
        $tokenList = unserialize(decodeStr($_SESSION[_URL]["token"]));
        $setToken = setcookie("token", $setPut, time() + ((60 * 60) * $this->token_cookie_timeout), "/", _URL, true);

        if (!empty($tokenList['member_info']['md_mem_email'])) {
            $setEmailLast = setcookie("lastlogin", $tokenList['member_info']['md_mem_email'], time() + (86400 * 30));
        }
    }

    function reloadUser() {
        $_SESSION[_URL]['reboot'] = false;
        $reloadToken = unserialize(decodeStr($_COOKIE['token']));
        if (!empty($reloadToken['member_info']) && !empty($reloadToken['login_status'])) {
            return $this->tokenSave($reloadToken);
        } else {
            $this->tokenCreate();
        }
    }

}
