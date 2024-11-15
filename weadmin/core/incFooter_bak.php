<div class="footerBackOffice">
	<div>
	    <div class="imgLogo"><?= $langTxt["login:footecopy"] ?> <i class="versionsmall"><?php echo 'Current PHP Version: ' . phpversion(); ?></i></div>
	    <div class="divLogin"><?= $langTxt["login:footecontact"] ?></div>
	</div>
</div>

<style>
    .versionsmall {
        color: #616161;
    }
</style>

<div id="loadCheckComplete"></div>
<div class="clearAll"></div>
<? include("../lib/disconnect.php"); ?>