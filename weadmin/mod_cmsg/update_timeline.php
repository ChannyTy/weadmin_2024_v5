<?php

@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("config.php");

$id = $_POST["id"];
$is_happen = $_POST["is_happen"];

$sql = "UPDATE $mod_tb_timeline SET " . $mod_tb_timeline . "_happen=$is_happen WHERE " . $mod_tb_timeline . "_id=" . $id . " ";
wewebQueryDB($coreLanguageSQL, $sql);

logs_access('3', 'Update timeline');
?>
<?php include("../lib/disconnect.php"); ?>
