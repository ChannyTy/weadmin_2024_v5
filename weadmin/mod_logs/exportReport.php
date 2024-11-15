<?php
@include("../lib/session.php");
header("Content-Type: application/vnd.ms-excel");
header('Content-Disposition: attachment; filename="report_log_' . date('Y-m-d') . '.xls"'); #ชื่อไฟล์
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../core/incLang.php");
include("incModLang.php");
include("config.php");

logs_access('3', 'Export');
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
        <table border="1" cellspacing="1" cellpadding="2"  align="left">
            <tbody>
                <tr >
                    <td width="56" height="30" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?= $langMod["tit:no"] ?></td>
                    <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?=$langTxt["mg:subject"]?></td>
                    <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?=$langTxt["us:creby"]?></td>
                    <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle">SESSION ID</td>
                    <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle">IP</td>
                    <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?=$langMod["tit:typeAccess"]?></td>
                    <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?=$langTxt["home:access"]?></td>
                    <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?=$langTxt["home:date"]?></td>
                </tr>

                <?
$sql = str_replaceExport($_POST['sql_export'],"0");
$query=wewebQueryDB($coreLanguageSQL,$sql) ;
$count_record=wewebNumRowsDB($coreLanguageSQL,$query);
$date_print=DateFormat(date("Y-m-d H:i:s"));
			if($count_record>=1){
			$index=$count_record;
			while($row=wewebFetchArrayDB($coreLanguageSQL,$query)) {
                                        $valStatus = $row[0];
										$valSessionId = rechangeQuot($row[1]);
                                        $valSid = rechangeQuot($row[2]);
										if($_SESSION[$valSiteManage.'core_session_language']=="Thai"){
											$valName= getUserThai($valSid);
										}else if($_SESSION[$valSiteManage.'core_session_language']=="Eng"){
											$valName= getUserEng($valSid);
										}
										
										if($valName==""){
											$valName = rechangeQuot($row[4]);
										}
										
										$valIp = rechangeQuot($row[4]);
										
										
                                        $valDateCredate = DateFormat($row[5]);
                                        $valTimeCredate = timeFormatReal($row[5]);
										
										$valActiontype=$row[7];
										$valUrl=$row[8];
										$valMenuid=$row[10];
                                        
										if($valActiontype==1){
											$valSubject=$langTxt["home:login"];
										}else if($valActiontype==2){
											$valSubject=$langTxt["nav:userManage2"];
										}else if($valActiontype==3){
											$valSubject=getNameMenu($valMenuid);
										}else if($valActiontype==4){
											$valSubject=$langTxt["nav:perManage2"];
										}else{
											$valSubject=$valUrl;
										}
		
                        ?>

                        <tr bgcolor="#ffffff">
                            <td height="30" align="center"  valign="middle"><?= $index ?></td>
                            <td align="left"  valign="middle"><strong><?=$valSubject?></strong></td>
                            <td align="center"  valign="middle"><?=$valName?></td>
                            <td align="center"  valign="middle"><?=$valSessionId?></td>
                            <td align="center"  valign="middle"><?=$valIp?></td>
                            <td align="center"  valign="middle"><?=$modTxtTypeAccess[$valActiontype]?></td>
                            <td align="center"  valign="middle"><?=$valStatus?></td>
                            <td align="center"  valign="middle">'<?=$valDateCredate?></td>
                        </tr>

                <?
							$index--;
						} 
						$count_totalrecord= $count_record+1;
						}
				 ?>
            </tbody>
        </table>

<table border="0" cellspacing="1" cellpadding="2"  align="left">
            <tbody>
                <tr >
                    <td width="175" align="right" valign="middle" class="bold">Print date : </td>
                    <td  width="175" align="left" valign="middle"><?= $date_print ?></td>
                </tr>
            </tbody>
        </table>
    </BODY>

</HTML>
