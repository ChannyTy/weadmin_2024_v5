<?
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/formail/class.phpmailer.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("config.php");


if ($_REQUEST['execute'] == "insert") {
	$sql = "SELECT " . $mod_tb_root . "_subject FROM " . $mod_tb_root . "  WHERE  " . $mod_tb_root . "_subject='" . trim($_REQUEST['inputSubject']) . "'";
	$query = wewebQueryDB($coreLanguageSQL, $sql);
	$count_record = wewebNumRowsDB($coreLanguageSQL, $query);
	//print_pre($count_record);
	if ($count_record >= 1) {
?>
		<script language="JavaScript" type="text/javascript">
			jQuery("#inputSubject").val('');
			jQuery("#inputSubject").focus();
			jQuery("#inputSubject").addClass("formInputContantTbAlertY");
			jQuery("#alert_inputSubject").show();
			jQuery("#alert_inputSubject").html("ไม่สามารถใช้ Key \"<?= trim($_REQUEST['inputSubject']) ?>\" นี้ได้");
		</script>
	<?
	} else {

		$sql = "SELECT MAX(" . $mod_tb_root . "_order) FROM " . $mod_tb_root;
		$Query = wewebQueryDB($coreLanguageSQL, $sql);
		$Row = wewebFetchArrayDB($coreLanguageSQL, $Query);
		$maxOrder = $Row[0] + 1;


		$insert = array();
		$insert[$mod_tb_root . "_subject"] = "'" . changeQuot($_REQUEST['inputSubject']) . "'";
		$insert[$mod_tb_root . "_title"] = "'" . changeQuot($_REQUEST['inputDescription']) . "'";
		$insert[$mod_tb_root . "_display"] = "'" . serialize($_REQUEST['inputLang']) . "'";
		$insert[$mod_tb_root . "_status"] = "'Enable'";
		$insert[$mod_tb_root . "_lastbyid"] = "'" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
		$insert[$mod_tb_root . "_lastby"] = "'" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
		$insert[$mod_tb_root . "_lastdate"] = "NOW()";
		$insert[$mod_tb_root . "_order"] = "'" . $maxOrder . "'";

		$sql = "INSERT INTO " . $mod_tb_root . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
		$Query = wewebQueryDB($coreLanguageSQL, $sql);
	?>
		<script language="JavaScript" type="text/javascript">
			document.myFormAction.submit();
		</script>
<?
		logs_access('3', 'Insert');
	}
}
?>

<? include("../lib/disconnect.php"); ?>
<form action="index.php" method="post" name="myFormAction" id="myFormAction">
	<input name="masterkey" type="hidden" id="masterkey" value="<?= $_REQUEST['masterkey'] ?>" />
	<input name="menukeyid" type="hidden" id="menukeyid" value="<?= $_REQUEST['menukeyid'] ?>" />
	<?php include_once './inc-inputsearch.php'; ?>
</form>