<?
include("lib/session.php");

if ($_SESSION[$valSiteManage . "core_session_language"] == "") {
    $_SESSION[$valSiteManage . "core_session_language"] = "Thai";
}

include("lib/config.php");

include("lib/connect.php");
// print_r('xx');die;
$_SESSION[$valSiteManage . "core_session_id"] = 0;
$_SESSION[$valSiteManage . "core_session_name"] = "";
$_SESSION[$valSiteManage . "core_session_level"] = "";
$_SESSION[$valSiteManage . "core_session_language"] = "Thai";
$_SESSION[$valSiteManage . "core_session_groupid"] = 0;
$_SESSION[$valSiteManage . "core_session_permission"] = "";
$_SESSION[$valSiteManage . "core_session_logout"] = "";

include("core/incLang.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <meta name="googlebot" content="noindex, nofollow">
    <link href="css/theme.css" rel="stylesheet" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/bootstrap-theme.min.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />


    <title><?= $core_name_title ?></title>


    <script language="JavaScript" type="text/javascript" src="js/jquery-1.9.0.js"></script>
    <script language="JavaScript" type="text/javascript" src="js/jquery.blockUI.js"></script>
    <script language="JavaScript" type="text/javascript" src="js/scriptCoreWeweb.js"></script>

    <script language="JavaScript" type="text/javascript">
        jQuery(function() {
            jQuery('form#myFormLogin').submit(function() {
                with(document.myFormLogin) {
                    if (inputUser.value == '') {
                        inputUser.focus();
                        return false;
                    }
                    if (inputPass.value == '') {
                        inputPass.focus();
                        return false;
                    }
                }
                checkLoginUser();
                return false;
            });
        });
    </script>

    <style type="text/css">
        @media (max-width: 768px) {
            .loginBack {
                height: auto;
                padding: 40px 15px;
            }

            .new_login .login-form {
                margin-top: 0;
                width: 100%;
                position: relative;
                top: 0;
                transform: translate(0);
            }

            .new_login .login-form .header {
                height: 140px;
                background-size: cover;
            }

            .new_login .login-form .header .brand {
                padding-top: 40px;
            }

            .new_login .login-form .header .brand img {
                width: 160px;
            }

            .new_login .login-form .body .title {
                font-size: 26px;
                margin-bottom: 20px;
            }

            .new_login .login-form .body .title small {
                font-size: 17px;
            }

            .new_login .login-form .body {
                padding: 30px 20px;
            }

            .new_login .footerBackOffice,
            .new_login .footerBackOffice * {
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
            }

            .new_login .footerBackOffice {
                position: relative;
                min-width: inherit;
                padding: 15px 15px;
            }

            .new_login .footerBackOffice>div,
            .new_login .footerBackOffice>div>div {
                display: block;
                width: auto;
                padding: 0;
            }

            .new_login .footerBackOffice .imgLogo {
                margin: 0 0 10px 0;
                text-align: center;
                font-size: 11px;
            }

            .new_login .footerBackOffice .divLogin {
                margin: 0;
                text-align: center;
                font-size: 12px;
            }
        }

        .form-group .show-password {
            position: absolute;
            top: calc(50% - 0.6em);
            right: 15px;
            z-index: 3;
        }

        .show-password .fa::before {
            font-size: 1.2em;
        }

        .show-password #showPassword:checked~.fa::before {
            content: "\f070";
        }
    </style>

</head>

<body class="new_login" style="background: url('../upload/core/<?= $valPicBgSystem ?>') center;background-size: cover;">
    <div class="loginBack">
        <div class="login-form">
            <div class="header" style="background: url('../upload/core/<?= $valPicHeaderSystem ?>') center;">
                <div class="brand">
                    <img src="../upload/core/<?= $valPicSystem ?>" alt="">
                </div>
            </div>
            <div class="body">
                <div class="title">
                    ยินดีต้อนรับเข้าสู่ระบบ
                    <small><?= $valNameSystem ?></small>
                </div>

                <form class="form-default" action="index.php" method="post" name="myFormLogin" id="myFormLogin">
                    <input id="inputUrl" name="inputUrl" type="hidden" value="<?= $uID ?>">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <label class="control-label">ชื่อผู้ใช้</label>
                            </span>
                            <input class="form-control" type="text" name="inputUser" id="inputUser" placeholder="">
                        </div>
                    </div>
                    <div class="form-group" style="position: relative;">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <label class="control-label">รหัสผ่าน</label>
                            </span>
                            <input class="form-control" type="password" name="inputPass" id="inputPass" placeholder="">
                        </div>
                        <div class="show-password">
                            <label for="showPassword" style="cursor:pointer;">
                                <input type="checkbox" id="showPassword" onclick="myShowPassword()" style="display: none;">
                                <span class="fa fa-eye"></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-btn">
                        <input class="btn btn-primary" name="input" type="submit" value="<?= $langTxt["login:btn"] ?>"/>
                    </div>
                </form>

                <div style="display:none;" id="loadAlertLogin">
                    <img src="img/btn/error.png" align="absmiddle" hspace="10" /><?= $langTxt["login:alert"] ?>
                </div>
                <div style="display:none;margin-top: 15px;" id="loadAlertLoginOA">

                </div>
            </div>
        </div>

        <div id="loadCheckComplete"></div>
    </div>

    <div class="footerBackOffice">
        <div>
            <div class="imgLogo"><?= $langTxt["login:footecopy"] ?> <i class="versionsmall"><?php echo 'Current PHP Version: ' . phpversion(); ?></i></div>
            <div class="divLogin"><?= $langTxt["login:footecontact"] ?></div>
        </div>
    </div>
    <div id="tallContent" style="display:none">
        <span style="font-size:18px;">Please waiting..</span>
        <div style="height:10px;"></div>
        <img src="img/loader/login.gif" />
    </div>
    <? wewebDisconnect($coreLanguageSQL); ?>
</body>
<script type="text/javascript">
    function myShowPassword() {
        var x = document.getElementById("inputPass");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

</html>