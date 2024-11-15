<?	
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");

		$sql = "SELECT MAX(".$core_tb_sort."_order) FROM ".$core_tb_sort;
		$Query=wewebQueryDB($coreLanguageSQL,$sql);
		$Row=wewebFetchArrayDB($coreLanguageSQL,$Query);
		$maxOrder = $Row[0]+1;

			$insert = array();
			$insert[$core_tb_sort."_order"] = "'".$maxOrder."'";
			$insert[$core_tb_sort."_menuID"] = "'".$_REQUEST["delID"]."'";
			$insert[$core_tb_sort."_memberID"] = "'".$_SESSION[$valSiteManage.'core_session_id']."'";
			$sql="INSERT INTO ".$core_tb_sort."(".implode(",",array_keys($insert)).") VALUES (".implode(",",array_values($insert)).")";
			$Query=wewebQueryDB($coreLanguageSQL,$sql);	
			//$valBoxID=wewebInsertID($coreLanguageSQL);
			$valBoxID = wewebInsertID($coreLanguageSQL,$core_tb_sort,$core_tb_sort."_id");	
?>
<? include("../lib/disconnect.php");?>
<script language="JavaScript"  type="text/javascript">
jQuery("#<?=$_REQUEST['divShow']?>").removeAttr("onClick");
jQuery("#<?=$_REQUEST['divShow']?>").attr("onClick","delContactBox('../core/deleteHome.php',<?=$valBoxID?>,'divManageBoxDel<?=$_REQUEST["delID"]?>','divManageBoxAdd<?=$_REQUEST["delID"]?>');");
</script>