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
		// print_pre($i);

		$sql = "SELECT  ".$mod_tb_root."_inputtype as inputtype, ".$mod_tb_root."_display as display FROM ".$mod_tb_root." WHERE  ".$mod_tb_root."_id='".$permissionID."' ";
			$Query=wewebQueryDB($coreLanguageSQL,$sql);
			$Row=wewebFetchArrayDB($coreLanguageSQL,$Query);
			$delinputtype=intval($Row['inputtype']);
			$arrDisplay = unserialize($Row['display']);

			if($delinputtype>=1){
				foreach($arrDisplay as $keyDisplay => $valueDisplay){
					######################### Delete  In Folder Pic ###############################
					$deletepic =$valueDisplay;

					if(file_exists($mod_path_pictures."/".$deletepic)) {
						@unlink($mod_path_pictures."/".$deletepic);
					}

					if(file_exists($mod_path_office."/".$deletepic)) {
						@unlink($mod_path_office."/".$deletepic);
					}

					if(file_exists($mod_path_real."/".$deletepic)) {
						@unlink($mod_path_real."/".$deletepic);
					}

				}
			}
			//print_pre($sql);


		######################### Delete  Contant ###############################
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