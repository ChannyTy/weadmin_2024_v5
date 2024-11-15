<?	
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");

$valSortArray=explode("&listItem[]=","&".$_POST['inputSort']);
 $valSortCount= count($valSortArray);
 
	for($i=0;$i<$valSortCount;$i++){
		$valSort =$valSortArray[$i];
		$valOrder = $i;
		if($valSort>=1){
	$sql = "UPDATE ".$core_tb_menu." SET ".$core_tb_menu."_order = $valOrder WHERE ".$core_tb_menu."_id = $valSort";
	$query=wewebQueryDB($coreLanguageSQL,$sql);
		}
			
	}

 ?>
	<? include("../lib/disconnect.php");?>
<form action="../core/menuManage.php" method="post" name="myFormAction" id="myFormAction">
    <input name="masterkey" type="hidden" id="masterkey" value="<?=$_REQUEST['masterkey']?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?=$_REQUEST['menukeyid']?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?=$_REQUEST['inputSearch']?>" />
</form>            
<script language="JavaScript" type="text/javascript"> document.myFormAction.submit(); </script>
