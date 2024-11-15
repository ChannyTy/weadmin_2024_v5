<?php
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("config.php");

$loaddder = $_POST['Valueloaddder'];
$tablename = $_POST['Valuetablename'];
$statusname = $_POST['Valuestatusname'];
$statusid = $_POST['Valuestatusid'];
$loadderstatus = $_POST['Valueloadderstatus'];
$filestatus = $_POST['Valuefilestatus'];
$ValuePageset = $_POST['ValuePageset'];

if ($statusname == "Enable") {
    $inputstatusname = "Disable";
} else {
    $inputstatusname = "Enable";
}

//print_pre($_POST);

$sql = "UPDATE " . $tablename . " SET "
        . $tablename . "_show_" . $ValuePageset . "= '$inputstatusname'  WHERE " . $tablename . "_id='" . $statusid . "'";
//echo $sql;

$Query = wewebQueryDB($coreLanguageSQL, $sql);

if ($tablename == $mod_tb_root) {
    $sqlSch = "SELECT " . $tablename . "_masterkey  FROM " . $tablename . " WHERE  " . $tablename . "_id='" . $statusid . "' ";
    $querySch = wewebQueryDB($coreLanguageSQL, $sqlSch);
    $rowSch = wewebFetchArrayDB($coreLanguageSQL,$querySch);
    $valMasterkey = $rowSch[0];

    $updateSch=array();
    $updateSch[] = $core_tb_search . "_" . $ValuePageset . "  	='$inputstatusname'";
    $sqlUpdateSch = "UPDATE " . $core_tb_search . " SET " . implode(",", $updateSch) . " WHERE " . $core_tb_search . "_contantid='" . $statusid . "'  AND  " . $core_tb_search . "_masterkey 	='" . $valMasterkey . "'";
    $querylUpdateSch = wewebQueryDB($coreLanguageSQL, $sqlUpdateSch);
}
?>
<?php if ($inputstatusname == "Enable") { ?>
    <a href="javascript:void(0)"  onclick="changeStatusPage('<?php echo  $loaddder ?>', '<?php echo  $tablename ?>', '<?php echo  $inputstatusname ?>', '<?php echo  $statusid ?>', '<?php echo  $loadderstatus ?>', '<?php echo  $filestatus ?>', '<?php echo  $ValuePageset ?>')" ><span class="fontContantTbEnable"><?php echo  $inputstatusname ?></span></a>

<?php } else { ?>
    <a href="javascript:void(0)"  onclick="changeStatusPage('<?php echo  $loaddder ?>', '<?php echo  $tablename ?>', '<?php echo  $inputstatusname ?>', '<?php echo  $statusid ?>', '<?php echo  $loadderstatus ?>', '<?php echo  $filestatus ?>', '<?php echo  $ValuePageset ?>')" ><span class="fontContantTbDisable"><?php echo  $inputstatusname ?></span></a>


<?php } ?>

<img src="../img/loader/ajax-loaderstatus.gif" alt="waiting"  style="display:none;"  id="<?php echo  $loaddder ?>" />
