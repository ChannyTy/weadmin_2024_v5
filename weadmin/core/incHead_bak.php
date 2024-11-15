<div class="headBackOffice">
    <div class="imgLogo"><a href="../core/index.php"><img src="../img/logo/logo.png" /></a></div>
    <div class="txtLogoLogin">
            <h1 class="titleInner"><?=$valNameSystem?></h1>
            <h3 class="subtitleInner"><?=$valTitleSystem?></h3>
    </div>
    <div class="divLogin" >
        <table  border="0" cellspacing="0" cellpadding="0" align="right">
            <tr>
                <td style="padding-right:10px;" >
                    <?
                    $valPicProfileTop = load_picmemberBack($_SESSION[$valSiteManage . "core_session_id"]);
                    if (is_file($valPicProfileTop)) {
                        $valPicProfileTop = $valPicProfileTop;
                    } else {
                        $valPicProfileTop = "../img/btn/nouser.jpg";
                    }

                    if ($_SESSION[$valSiteManage . "core_session_level"] == "SuperAdmin") {
                        $valLinkViewUser = "#";
                    } else {
                        $valLinkViewUser = "../core/userView.php";
                    }
                    ?>
                    <div style="width:29px; height:29px;  background:url(<?= $valPicProfileTop ?>) center no-repeat; border:#ffffff solid 1px;  background-size: cover;background-repeat: no-repeat;   "><a href="<?= $valLinkViewUser ?>"><img src="../img/btn/boxprofile.png" /></a></div></td>
                <td style="padding-right:10px;" ><a href="<?= $valLinkViewUser ?>"><?= $_SESSION[$valSiteManage . "core_session_name"] ?></a></td>
                <td><a href="javascript:void(0)"onclick="clickInSubMenuTop()" id="showSubMenuTop" title="<?= $langTxt["menu:topmenu"] ?>"><img src="../img/btn/submenu.png" /></a></td>
            </tr>
        </table>

    </div>
</div>
<div class="clearAll"></div>
<div class="menuSub" id="divSubMenuTop">
    <div class="menuSubManage" >
        <? if ($_SESSION[$valSiteManage . "core_session_level"] == "SuperAdmin" || $_SESSION[$valSiteManage . "core_session_level"] == "admin") { ?>
            <img src="../img/btn/submenu01.png"  align="absmiddle" style="padding-left:10px;"/> <a href="../core/userManage.php" title="<?= $langTxt["nav:userManage2"] ?>"><?= $langTxt["nav:userManage2"] ?></a> <img src="../img/btn/submenu02.png"  align="absmiddle" style="padding-left:10px;"/> <a href="../core/permisManage.php"  title="<?= $langTxt["nav:perManage2"] ?>"><?= $langTxt["nav:perManage2"] ?></a><? } ?> <? if ($_SESSION[$valSiteManage . "core_session_level"] == "SuperAdmin") { ?><img src="../img/btn/submenu03.png"  align="absmiddle" style="padding-left:10px;"/> <a href="../core/menuManage.php" title="<?= $langTxt["nav:menuManage2"] ?>"><?= $langTxt["nav:menuManage2"] ?></a> <img src="../img/btn/setting.png"  align="absmiddle" style="padding-left:10px;"/> <a href="../core/setting.php" title="<?= $langTxt["nav:setting"] ?>"><?= $langTxt["nav:setting"] ?></a><? } ?> <img src="../img/btn/submenu04.png"  align="absmiddle" style="padding-left:10px;"/> <a href="javascript:void(0)"onclick="checkLogoutUser();" title="<?= $langTxt["menu:logout"] ?>"><?= $langTxt["menu:logout"] ?></a>
    </div>
</div>
<div class="clearAll"></div>

<input id="pathTojs" type="hidden" value="<?=$core_pathname_folderlocal;?>">