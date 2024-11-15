<?php
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("incModLang.php");
include("config.php");
		$sql_cat = "SELECT ";
		if($_REQUEST['inputLt']=="Thai"){
			$sql_cat .= "  ".$mod_tb_root_subgroup."_id,".$mod_tb_root_subgroup."_subject";
		}else{
			$sql_cat .= " ".$mod_tb_root_subgroup."_id,".$mod_tb_root_subgroup."_subjecten ";
		}
		$sql_cat .= "  FROM ".$mod_tb_root_subgroup." WHERE  ".$mod_tb_root_subgroup."_status !='Disable'    ";
		$sql_cat = $sql_cat."  AND ".$mod_tb_root_subgroup."_gid ='".$_REQUEST['inputGroupID']."'   ";
	 	 $sql_cat = $sql_cat."  ORDER BY ".$mod_tb_root_subgroup."_order DESC  ";

?>
    <select name="inputSubID"  id="inputSubID"class="formSelectContantTb" >
        <option value="0"><?php echo $langMod["tit:selectsg"]?></option>
              <?php
		$query_cat=wewebQueryDB($coreLanguageSQL,$sql_cat);
		while($row_cat=wewebFetchArrayDB($coreLanguageSQL,$query_cat)) {
		$row_catid=$row_cat[0];
		$valNamecShow=$row_cat[1];
		?>
        <option value="<?php echo $row_catid?>" <?php  if($_REQUEST['inputTh']==$row_catid){ ?> selected="selected" <?php  } ?>><?php echo $valNamecShow?></option>
        <?php  } ?>

    </select>
<?php
include("../lib/disconnect.php");
?>
