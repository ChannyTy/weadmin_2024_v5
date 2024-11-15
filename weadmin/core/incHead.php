<link href="../css/font-awesome.min.css" rel="stylesheet"/>

<div class="headBackOffice">
  <div class="imgLogo"><a href="../core/index.php"><img src="<?=$core_pathname_crupload?>/<?=$valPicSystem?>" height="38" /></a></div>
    <div class="txtLogoLogin">
            <h1 class="titleInner"><?=$valNameSystem?></h1>
            <h3 class="subtitleInner"><?=$valTitleSystem?></h3>
    </div>
    <div class="divLogin" >


        <!-- j10 -->
        <div class="divLogin-img">
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
            <a href="<?= $valLinkViewUser ?>">
                <div style="width:30px; height:30px;  background:url(<?= $valPicProfileTop ?>) center no-repeat; background-size: cover;background-repeat: no-repeat;   "></div>
            </a>
        </div>
        <div class="divLogin-name">
            <a href="<?= $valLinkViewUser ?>"><?= $_SESSION[$valSiteManage . "core_session_name"] ?></a>
        </div>
        <div class="divLogin-btn">
            <a href="javascript:void(0)"onclick="clickInSubMenuTop()" id="showSubMenuTop" title="<?= $langTxt["menu:topmenu"] ?>">
                <span class="fa fa-bars"></span>
            </a>
        </div>
        <!-- j10 -->

        <!-- <table  border="0" cellspacing="0" cellpadding="0" align="right">
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
        </table> -->

    </div>
</div>
<div class="clearAll"></div>
<div class="menuSub" id="divSubMenuTop">
    <div class="menuSubManage" >
        <ul>
        <? if ($_SESSION[$valSiteManage . "core_session_groupid"] == "11" && $_SESSION[$valSiteManage . "core_session_typeusermini"] == 0) { ?>
            <li><a href="../core/userMiniManage.php" title="<?= $langTxt["nav:userManage2"] ?>"><span class="fa fa-user"></span><?= $langTxt["nav:userManage2"] ?></a></li>
            <? }else{?>
        <? if ($_SESSION[$valSiteManage . "core_session_level"] == "SuperAdmin" || $_SESSION[$valSiteManage . "core_session_level"] == "admin") { ?>
            <li><a href="../core/userManage.php" title="<?= $langTxt["nav:userManage2"] ?>"><span class="fa fa-user"></span><?= $langTxt["nav:userManage2"] ?></a></li>
            <li><a href="../core/permisManage.php"  title="<?= $langTxt["nav:perManage2"] ?>"><span class="fa fa-cog"></span><?= $langTxt["nav:perManage2"] ?></a></li><? } ?>
        <? if ($_SESSION[$valSiteManage . "core_session_level"] == "SuperAdmin") { ?>
           <li><a href="../core/menuManage.php" title="<?= $langTxt["nav:menuManage2"] ?>"><span class="fa fa-list"></span><?= $langTxt["nav:menuManage2"] ?></a></li>
            <li><a href="../core/setting.php" title="<?= $langTxt["nav:setting"] ?>"><span class="fa fa-cogs"></span><?= $langTxt["nav:setting"] ?></a></li><? } ?>
        

            <?php } ?>
            <li><a href="javascript:void(0)"onclick="checkLogoutUser();" title="<?= $langTxt["menu:logout"] ?>"><span class="fa fa-sign-out"></span><?= $langTxt["menu:logout"] ?></a></li>
        </ul>
    </div>
</div>
<div class="clearAll"></div>

<input id="pathTojs" type="hidden" value="<?=$core_pathname_folderlocal;?>">
