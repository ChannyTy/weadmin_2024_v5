<?
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("config.php");



$sqlcheck = "SELECT  " . $core_tb_lang . "_subject," . $core_tb_lang . "_display," . $core_tb_lang . "_id FROM " . $core_tb_lang . " WHERE  " . $core_tb_lang . "_id='" . $_POST['valDelFile'] . "'";
$Querycheck = wewebQueryDB($coreLanguageSQL, $sqlcheck);
if (!empty($Querycheck)) {
	$namecheck = $Querycheck->fields[0];
}

$sql = "SELECT  " . $core_tb_lang . "_subject," . $core_tb_lang . "_display," . $core_tb_lang . "_id FROM " . $core_tb_lang . "";

//  WHERE  " . $core_tb_lang . "_cid='" . $permissionID . "'
$Query = wewebQueryDB($coreLanguageSQL, $sql);
$numberofrow = wewebNumRowsDB($coreLanguageSQL, $Query);
$arrData = array();
if ($numberofrow >= 1) {
	foreach ($Query as $key => $value) {
		$arrData[$value[2]]['id'] = $value[2];
		$arrData[$value[2]]['subject'] = rechangeQuot($value[0]);
		$arrData[$value[2]]['list'] = unserialize($value[1]);
		if (gettype($arrData[$value[2]]['list']) == 'array') {
			unset($arrData[$value[2]]['list'][$namecheck]);

			$update = array();
			$update[] = $core_tb_lang . "_display='" . serialize($arrData[$value[2]]['list']) . "'";
			$sql = "UPDATE " . $core_tb_lang . " SET " . implode(",", $update) . " WHERE " . $core_tb_lang . "_id='" . $arrData[$value[2]]['id'] . "' ";
			$Query = wewebQueryDB($coreLanguageSQL, $sql);
		}
	}
}

$sql = "DELETE FROM " . $core_tb_lang . " WHERE  " . $core_tb_lang . "_id 	='" . $_POST['valDelFile'] . "' ";
$Query = wewebQueryDB($coreLanguageSQL, $sql);

?>

<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
	<?
	$sql = "SELECT " . $core_tb_lang . "_subject," . $core_tb_lang . "_id FROM " . $core_tb_lang . " ORDER BY " . $core_tb_lang . "_id ASC ";
	$query = wewebQueryDB($coreLanguageSQL, $sql);
	$numRowCount = wewebNumRowsDB($coreLanguageSQL, $query);
	if ($numRowCount >= 1) {
		$num_email = 0;
		while ($row = wewebFetchArrayDB($coreLanguageSQL, $query)) {
			$num_email++;
			$valEmailNew = rechangeQuot($row[0]);
			$valEmailID = $row[1];
	?>
			<tr>
				<td width="18%" align="right" valign="top" class="formLeftContantTb"><?= number_format($num_email) ?>.<span class="fontContantAlert"></span></td>
				<td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
					<div class="formDivView"><a href="javascript:void(0)" onclick="document.myForm.valDelFile.value=<?= $valEmailID ?>; modDelEmail('deleteLang.php','#boxMailContact')"><img src="../img/btn/delete.png" align="absmiddle" title="Delete email" hspace="5" border="0" /></a> <?= $valEmailNew ?></div>
				</td>
			</tr>

	<? }
	} ?>
</table>
<script language="JavaScript" type="text/javascript">
	document.myForm.inputEmail.value = ''
	document.myForm.inputEmail.focus();
</script>