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
		$valOrder = $valSortCount-$i;
		if($valSort>=1){
			 $sql = "UPDATE ".$core_tb_staff." SET ".$core_tb_staff."_order = $valOrder WHERE ".$core_tb_staff."_id = $valSort";
			$query=wewebQueryDB($coreLanguageSQL,$sql);
		}
			
	}

logs_access('2','Sort');
 ?>
 <? include("../lib/disconnect.php");?>

<form action="../core/userManage.php" method="post" name="myFormAction" id="myFormAction">
    <input name="masterkey" type="hidden" id="masterkey" value="<?=$_REQUEST['masterkey']?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?=$_REQUEST['menukeyid']?>" />
    <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?=$_REQUEST['module_pageshow']?>" />
    <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?=$_REQUEST['module_pagesize']?>" />
    <input name="module_orderby" type="hidden" id="module_orderby" value="<?=$_REQUEST['module_orderby']?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?=$_REQUEST['inputSearch']?>" />
    <input name="inputGh" type="hidden" id="inputGh" value="<?=$_REQUEST['inputGh']?>" />
</form>            
<script language="JavaScript" type="text/javascript"> document.myFormAction.submit(); </script>
