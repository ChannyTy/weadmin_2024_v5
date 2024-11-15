<?php
@include("../lib/session.php");
include("../lib/checkMemberSA.php");
header("Content-Type: application/vnd.ms-excel");
header('Content-Disposition: attachment; filename="reportLog_'.date('Y-m-d').'.xls"');
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
		include("../core/incLang.php");

		logs_access('1','Export');
?>
<html xmlns:o="urn:schemas-microsoft-com:office:office"

xmlns:x="urn:schemas-microsoft-com:office:excel"

xmlns="http://www.w3.org/TR/REC-html40">


<HEAD>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style type="text/css">
<!--
.bold {font-weight:bold;
}
-->
</style>
</HEAD>
<BODY>
<table border="1" cellspacing="1" cellpadding="2"  align="center">
  <tbody>
    <tr >
      <td width="56" height="30" align="center" bgcolor="#eeeeee" class="bold" valign="middle">ชื่อเมนู</td>
      <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle">การเข้าถึง</td>
      <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle">โดย</td>
      <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle">วันที่</td>
    </tr>
    
    <?
	$date_print =date('Y-m-d');
	$sqlLogs="SELECT ".$core_tb_log."_action, ".$core_tb_log."_sessid, ".$core_tb_log."_sid, ".$core_tb_log."_sname, ".$core_tb_log."_ip, ".$core_tb_log."_time, ".$core_tb_log."_type, ".$core_tb_log."_actiontype 	, ".$core_tb_log."_url, ".$core_tb_log."_key, ".$core_tb_log."_menuid   FROM ".$core_tb_log." WHERE   ".$core_tb_log."_id 	>=1 ORDER BY ".$core_tb_log."_time DESC";
	$queryLogs=wewebQueryDB($coreLanguageSQL,$sqlLogs);
	$countLogs=wewebNumRowsDB($coreLanguageSQL,$queryLogs);
	if($countLogs>=1){
	while($rowLogs=wewebFetchArrayDB($coreLanguageSQL,$queryLogs)) {
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


			?>
    
    <tr bgcolor="#ffffff">
      <td height="30" align="left"  valign="middle"><?=$valNameMenu?></td>
      <td align="left"  valign="middle"><?=$valAction?></td>
      <td align="left" valign="middle"><?=$valNameUser?></td>
      <td align="left" valign="middle"><?=$valTime?></td>
    </tr>
	<? 
                }
     } ?>
    </tbody>
    </table>
<table border="0" cellspacing="1" cellpadding="2"  align="center">
  <tbody>
        <tr >
      <td width="175" align="right" valign="middle" class="bold">Print date : </td>
      <td  width="175" align="left" valign="middle"><?=$date_print?></td>
    </tr>
  </tbody>
</table>
</BODY>

</HTML>
