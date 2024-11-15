<?

@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");

//$username=trim($_POST['Valueusername']);
$username = trim($_POST['inputUserName']);
$usernameOld = trim($_POST['valUserOld']);

if ($username != $usernameOld) {
    $sql = "SELECT " . $core_tb_staff . "_id   FROM " . $core_tb_staff . " WHERE " . $core_tb_staff . "_username='" . $username . "'";
    $Query = wewebQueryDB($coreLanguageSQL, $sql);
    $number_member = wewebNumRowsDB($coreLanguageSQL, $Query);

    if ($number_member >= 1) {
        ?>
        <script language="JavaScript" type="text/javascript">
            jQuery("#inputUserName").addClass("formInputContantTbAlertY");
            document.myForm.inputUserName.value = ''
            document.myForm.inputUserName.focus();
        </script>
    <? } else { ?>
        <script language="JavaScript" type="text/javascript">
            jQuery("#inputUserName").removeClass("formInputContantTbAlertY");
        </script>
    <? } ?>
<? } else { ?>
    <script language="JavaScript" type="text/javascript">
        jQuery("#inputUserName").removeClass("formInputContantTbAlertY");
    </script>
<? } ?>



