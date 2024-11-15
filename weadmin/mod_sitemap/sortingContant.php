<?php
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("config.php");

$valSortArray = explode("&listItem[]=", "&" . $_POST['inputSort']);
$valSortCount = count($valSortArray);

for ($i = 0; $i < $valSortCount; $i++) {
	$valSort = $valSortArray[$i];
	$valOrder = $valSortCount - $i;
	if ($valSort >= 1) {
		$sql = "UPDATE " . $mod_tb_root . " SET " . $mod_tb_root . "_order = $valOrder WHERE " . $mod_tb_root . "_id = $valSort";
		$query = wewebQueryDB($coreLanguageSQL, $sql);
	}
}

logs_access('3', 'Sort');

// load inc
require_once './inc/function-mod.php';

?>
<?php include("../lib/disconnect.php"); ?>

<form action="index.php" method="post" name="myFormAction" id="myFormAction">
	<input name="masterkey" type="hidden" id="masterkey" value="<?php echo $_REQUEST['masterkey'] ?>" />
	<input name="menukeyid" type="hidden" id="menukeyid" value="<?php echo $_REQUEST['menukeyid'] ?>" />
	<input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php echo $_REQUEST['module_pageshow'] ?>" />
	<input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php echo $_REQUEST['module_pagesize'] ?>" />
	<input name="module_orderby" type="hidden" id="module_orderby" value="<?php echo $_REQUEST['module_orderby'] ?>" />

	<?php include_once './inc-inputsearch.php'; ?>

</form>
<script language="JavaScript" type="text/javascript">
	document.myFormAction.submit();
</script>