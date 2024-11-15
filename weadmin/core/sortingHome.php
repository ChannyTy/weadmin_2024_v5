<?	
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");

$valSortArray=explode("&listItem[]=","&".$_POST['inputSort']);
$valSortCount= count($valSortArray);
 
	for($i=0;$i<$valSortCount;$i++){
		$valSort =$valSortArray[$i];
		$valOrder = $valSortCount-$i;
		if($valSort>=1){
			$sql = "UPDATE ".$core_tb_sort." SET ".$core_tb_sort."_order = $valOrder WHERE ".$core_tb_sort."_id = $valSort";
			$query=wewebQueryDB($coreLanguageSQL,$sql);
			
			/*
			$insert = array();
			$insert[$core_tb_sort."_order"] = "'".$valOrder."'";
			$insert[$core_tb_sort."_menuID"] = "'".$valSort."'";
			$insert[$core_tb_sort."_memberID"] = "'".$_SESSION[$valSiteManage.'core_session_id']."'";
			$sql="INSERT INTO ".$core_tb_sort."(".implode(",",array_keys($insert)).") VALUES (".implode(",",array_values($insert)).")";
			$Query=wewebQueryDB($coreLanguageSQL,$sql);		
			*/
			
		}
			
	}
 ?>
