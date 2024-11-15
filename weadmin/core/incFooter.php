<!-- <div class="footerBackOffice">
    <div class="imgLogo"><?= $langTxt["login:footecopy"] ?> <i class="versionsmall"><?php echo 'Current PHP Version: ' . phpversion(); ?></i></div>
    <div class="divLogin"><?= $langTxt["login:footecontact"] ?></div>
</div> -->

<script type="text/javascript">
    $(window).scroll(function() {
        if ($(this).scrollTop() > 200){  
            $('.divRightHead').addClass('fixed');
            $('.divRightMain').addClass('tiny');
        }
        else{
            $('.divRightHead').removeClass('fixed');
            $('.divRightMain').removeClass('tiny');
        }
    });
</script>

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