<?
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("../core/incLang.php");
// Value SQL SELECT #########################
$sqlSelect = "
".$core_tb_log."_action, 
".$core_tb_log."_sessid, 
".$core_tb_log."_sid, 
".$core_tb_log."_sname, 
".$core_tb_log."_ip, 
".$core_tb_log."_time, 
".$core_tb_log."_type, 
".$core_tb_log."_actiontype 	, 
".$core_tb_log."_url, 
".$core_tb_log."_key, 
".$core_tb_log."_menuid
";
if ($_SESSION[$valSiteManage . "core_session_level"] == "SuperAdmin" || $_SESSION[$valSiteManage . "core_session_level"] == "admin") {
	$sqlLogsWhere = " AND ".$core_tb_log."_id 	>=1";
}else if ($_SESSION[$valSiteManage . "core_session_level"] == "staff" && $_SESSION[$valSiteManage . "core_session_groupid"] == "11" && $_SESSION[$valSiteManage . "core_session_typeusermini"] == 0 ){
	$sqlStf="SELECT ".$core_tb_staff."_id  FROM ".$core_tb_staff." WHERE   ".$core_tb_staff."_typeusermini 	='".$_SESSION[$valSiteManage.'core_session_id']."' ";
	$queryStf=wewebQueryDB($coreLanguageSQL,$sqlStf);
	$numStf=wewebNumRowsDB($coreLanguageSQL,$queryStf);
	if($numStf>=1){
		$sqlLogsWhere = " AND (".$core_tb_log."_sid 	='".$_SESSION[$valSiteManage.'core_session_id']."'   ";
		while($rowStf=wewebFetchArrayDB($coreLanguageSQL,$queryStf)){
		$valStfIdUserMini=rechangeQuot($rowStf[0]);
		$sqlLogsWhere .= " OR ".$core_tb_log."_sid 	='".$valStfIdUserMini."'  ";
		}
		$sqlLogsWhere .= ")";
	}else{
		$sqlLogsWhere = " AND ".$core_tb_log."_sid 	='".$_SESSION[$valSiteManage.'core_session_id']."'  ";
	}
}else {
	$sqlLogsWhere = " AND ".$core_tb_log."_sid 	='".$_SESSION[$valSiteManage.'core_session_id']."'  ";
}

	if($coreLanguageSQL=="mssql"){
		$valLimitTop ="TOP (10)";
		$valLimitMysql ="";
	}else{
		$valLimitTop ="";
		$valLimitMysql =" LIMIT 0,10";
	}
	
	$sqlLogs="SELECT ".$valLimitTop." ".$sqlSelect."    FROM ".$core_tb_log." WHERE   1=1  ".$sqlLogsWhere." ORDER BY ".$core_tb_log."_time DESC  ".$valLimitMysql."";
	
	$queryLogs=wewebQueryDB($coreLanguageSQL,$sqlLogs);
	$countLogs=wewebNumRowsDB($coreLanguageSQL,$queryLogs);
	if($countLogs>=1){
	$indexLog=0;
	?>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" >

  
<tr>
    <td  class="divRightTrHomeLog"  style="padding-left:20px;" valign="top"><b><?=$langTxt["mg:subject"]?></b></td>
    <td width="15%" height="30" align="center"  class="divRightTrHomeLog" valign="top"><b><?=$langTxt["home:access"]?></b></td>
    <td width="15%" align="center"  class="divRightTrHomeLog" valign="top"><b><?=$langTxt["us:creby"]?></b></td>
    <td width="23%"  align="center"  class="divRightTrHomeLog" valign="top"><b><?=$langTxt["home:date"]?></b></td>
  </tr>

    <?
	while($rowLogs=wewebFetchArrayDB($coreLanguageSQL,$queryLogs)) {
	$indexLog++;
		$valAction=$rowLogs[0];
		$valSessid=$rowLogs[1];
		$valSid=$rowLogs[2];
		$valSname=$rowLogs[3];
		$valip=$rowLogs[4];
		$valTime=DateFormat($rowLogs[5]);
		$valType=$rowLogs[6];
		$valActiontype=$rowLogs[7];
		
		$valUrl=$rowLogs[8];
		$valKey=$rowLogs[9];
		$valMenuid=$rowLogs[10];

		if($valActiontype==1){
			$valNameMenu=$langTxt["home:login"];
		}else if($valActiontype==2){
			$valNameMenu=$langTxt["nav:userManage2"];
		}else if($valActiontype==3){
			$valNameMenu=getNameMenu($valMenuid);
		}else if($valActiontype==4){
			$valNameMenu=$langTxt["nav:perManage2"];
		}
		
		if($_SESSION[$valSiteManage.'core_session_language']=="Thai"){
			$valNameUser= getUserThai($valSid);
		}else if($_SESSION[$valSiteManage.'core_session_language']=="Eng"){
			$valNameUser= getUserEng($valSid);
		}

	if($indexLog<$countLogs){
		 $valClassTrLog="divRightTrHomeLog";
	}else{
		 $valClassTrLog="";
	}
   ?>
     <tr>
    <td  class="<?=$valClassTrLog?>" style="padding-left:20px;"><?=$valNameMenu?></td>
    <td height="35"  align="center"  class="<?=$valClassTrLog?>"><?=$valAction?></td>
    <td align="center"  class="<?=$valClassTrLog?>"><?=$valNameUser?></td>
    <td align="center"  class="<?=$valClassTrLog?>"><?=$valTime?></td>
  </tr>
   <? }?>
   </table>
   <?  }?>
<? include("../lib/disconnect.php");?>
