<?php
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("incModLang.php");
include("config.php");

$sql_subgroup = "SELECT 
" . $mod_tb_subgroup . "_id,
" . $mod_tb_subgroup_lang . "_subject  
FROM " . $mod_tb_subgroup . " 
INNER JOIN " . $mod_tb_subgroup_lang . " ON " . $mod_tb_subgroup_lang . "_cid = " . $mod_tb_subgroup . "_id
WHERE " . $mod_tb_subgroup . "_masterkey ='" . $_REQUEST['masterkey'] . "' 
AND " . $mod_tb_subgroup_lang . "_language ='" . $_SESSION[$valSiteManage . 'core_session_language'] . "' 
AND " . $mod_tb_subgroup . "_gid ='" . $_REQUEST['inputGh'] . "' ";
$sql_subgroup = $sql_subgroup . "  ORDER BY " . $mod_tb_subgroup . "_order DESC  ";
?>
<select name="inputGh2" id="inputGh2" class="formSelectSearchStyle" onchange="document.myForm.submit();">
	<option value="0"><?php echo $langMod["tit:selectsg"] ?></option>
	<?php
	$query_subgroup = wewebQueryDB($coreLanguageSQL, $sql_subgroup);
	while ($row_subgroup = wewebFetchArrayDB($coreLanguageSQL, $query_subgroup)) {
		$row_subgroupid = $row_subgroup[0];
		$row_subgroupname = $row_subgroup[1];
		$valNamecShow = $row_subgroupname;
	?>
		<option value="<?php echo $row_subgroupid ?>" <?php if ($_REQUEST['inputGh2'] == $row_subgroupid) { ?> selected="selected" <?php  } ?>><?php echo $valNamecShow ?></option>
	<?php  } ?>

</select>
<?php
include("../lib/disconnect.php");
?>