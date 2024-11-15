<?
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");

$loaddder = $_POST['Valueloaddder'];
$tablename = $_POST['Valuetablename'];
$statusname = $_POST['Valuestatusname'];
$statusid = $_POST['Valuestatusid'];
$loadderstatus = $_POST['Valueloadderstatus'];
$filestatus = $_POST['Valuefilestatus'];


if ($statusname == "Show") {
    $inputstatusname = "Disable";
} else if ($statusname == "Disable") {
    $inputstatusname = "Show";
}


$sql = "UPDATE " . $tablename . " SET "
        . $tablename . "_hidden= '$inputstatusname'  WHERE " . $tablename . "_id='" . $statusid . "'";
$Query = wewebQueryDB($coreLanguageSQL, $sql);
?>
<? if ($inputstatusname == "Show") { ?>
    <a href="javascript:void(0)"  onclick="changeStatusShow('<?= $loaddder ?>', '<?= $tablename ?>', '<?= $inputstatusname ?>', '<?= $statusid ?>', '<?= $loadderstatus ?>', '<?= $filestatus ?>')" ><span class="fontContantTbEnable"><?= $inputstatusname ?></span></a>



<? } else { ?>
    <a href="javascript:void(0)"  onclick="changeStatusShow('<?= $loaddder ?>', '<?= $tablename ?>', '<?= $inputstatusname ?>', '<?= $statusid ?>', '<?= $loadderstatus ?>', '<?= $filestatus ?>')" ><span class="fontContantTbDisable"><?= $inputstatusname ?></span></a>


<? } ?>

<img src="../img/loader/ajax-loaderstatus.gif" alt="waiting"  style="display:none;"  id="<?= $loaddder ?>" />
