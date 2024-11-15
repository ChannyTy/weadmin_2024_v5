<?
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("config.php");

for ($i = 1; $i <= $_REQUEST['TotalCheckBoxID']; $i++) {
	$myVar = $_REQUEST['CheckBoxID' . $i];


	if (strlen($myVar) >= 1) {
		$permissionID = $myVar;

		$sql = "SELECT  " . $mod_tb_root . "_icon  FROM " . $mod_tb_root . " WHERE  " . $mod_tb_root . "_id='" . $permissionID . "' ";
		$Query = wewebQueryDB($coreLanguageSQL, $sql);
		$Row = wewebFetchArrayDB($coreLanguageSQL, $Query);
		$deleteicon = $Row[0];
		######################### Delete  In Folder Pic ###############################
		if (file_exists($mod_path_pictures . "/" . $deleteicon)) {
			@unlink($mod_path_pictures . "/" . $deleteicon);
		}
		if (file_exists($mod_path_office . "/" . $deleteicon)) {
			@unlink($mod_path_office . "/" . $deleteicon);
		}
		if (file_exists($mod_path_real . "/" . $deleteicon)) {
			@unlink($mod_path_real . "/" . $deleteicon);
		}

		$sqlRemore = "SELECT  " . $mod_tb_root_lang . "_htmlfilename," . $mod_tb_root_lang . "_id  FROM " . $mod_tb_root_lang . " WHERE  " . $mod_tb_root_lang . "_cid='" . $permissionID . "' ";
		$QueryRemore = wewebQueryDB($coreLanguageSQL, $sqlRemore);
		$numberofrowRemore = wewebNumRowsDB($coreLanguageSQL, $QueryRemore);
		if ($numberofrowRemore >= 1) {
			while ($RowRemore = wewebFetchArrayDB($coreLanguageSQL, $QueryRemore)) {
				$deletepichtml = $RowRemore[0];
				$deleteid = $RowRemore[1];
				$deletepic = $Row[2];
				######################### Delete  In Folder HTML ###############################
				if (file_exists($mod_path_html . "/" . $deletepichtml)) {
					@unlink($mod_path_html . "/" . $deletepichtml);
				}

				######################### Delete  In Folder File ###############################
				$sql = "SELECT " . $mod_tb_file . "_id," . $mod_tb_file . "_filename FROM " . $mod_tb_file . " WHERE " . $mod_tb_file . "_contantid ='" . $deleteid . "'";
				$query_file = wewebQueryDB($coreLanguageSQL, $sql);
				$number_row = wewebNumRowsDB($coreLanguageSQL, $query_file);
				if ($number_row >= 1) {
					while ($row_file = wewebFetchArrayDB($coreLanguageSQL, $query_file)) {
						$downloadID = $row_file[0];
						$deletefilename = $row_file[1];

						if (file_exists($mod_path_file . "/" . $deletefilename)) {
							@unlink($mod_path_file . "/" . $deletefilename);
						}
					}
				}

				$sql = "DELETE FROM " . $mod_tb_file . " WHERE   " . $mod_tb_file . "_contantid='" . $deleteid . "' ";
				wewebQueryDB($coreLanguageSQL, $sql);
			}
		}


		## URL Search ###################################
		$sqlSch = "DELETE FROM " . $core_tb_search . " WHERE   " . $core_tb_search . "_gid='" . $permissionID . "'  AND " . $core_tb_search . "_masterkey='" . $_POST["masterkey"] . "'  ";
		$querySch = wewebQueryDB($coreLanguageSQL, $sqlSch);

		######################### Delete  Contant ###############################
		$sql = "DELETE FROM " . $mod_tb_root_lang . " WHERE " . $mod_tb_root_lang . "_cid=" . $permissionID . " ";
		$Query = wewebQueryDB($coreLanguageSQL, $sql);

		$sql = "DELETE FROM " . $mod_tb_root . " WHERE " . $mod_tb_root . "_id=" . $permissionID . " ";
		$Query = wewebQueryDB($coreLanguageSQL, $sql);
	}
}
logs_access('3', 'Delete');
?>
<? include("../lib/disconnect.php"); ?>
<form action="index.php" method="post" name="myFormAction" id="myFormAction">
	<input name="masterkey" type="hidden" id="masterkey" value="<?= $_REQUEST['masterkey'] ?>" />
	<input name="menukeyid" type="hidden" id="menukeyid" value="<?= $_REQUEST['menukeyid'] ?>" />
	<input name="module_pageshow" type="hidden" id="module_pageshow" value="<?= $_REQUEST['module_pageshow'] ?>" />
	<input name="module_pagesize" type="hidden" id="module_pagesize" value="<?= $_REQUEST['module_pagesize'] ?>" />
	<input name="module_orderby" type="hidden" id="module_orderby" value="<?= $_REQUEST['module_orderby'] ?>" />

	<?php include_once './inc-inputsearch.php'; ?>
</form>
<script language="JavaScript" type="text/javascript">
	document.myFormAction.submit();
</script>