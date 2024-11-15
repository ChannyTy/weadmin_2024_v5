<?
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("../lib/checkMemberSA.php");
include("../core/incLang.php");

$valClassNav=2;
$valNav1=$langTxt["nav:home2"];
$valLinkNav1="../core/index.php";
$valNav2=$langTxt["nav:perManage2"];

 		$sql = "SELECT ".$core_tb_group."_id , ".$core_tb_group."_name, ".$core_tb_group."_lv  FROM ".$core_tb_group." WHERE ".$core_tb_group."_id='".$_POST["valEditID"]."'";
			$Query=wewebQueryDB($coreLanguageSQL,$sql);
			$Row=wewebFetchArrayDB($coreLanguageSQL,$Query);
			$valId=$Row[0];
			$valName=$Row[1];
			$valLv=$Row[2];
			
			logs_access('4','View');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow">
<meta name="googlebot" content="noindex, nofollow">

<link href="../css/theme.css" rel="stylesheet"/>

<title><?=$core_name_title?></title>
<script language="JavaScript"  type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
<script language="JavaScript" type="text/javascript">
function executeSubmit() {
		genDataAdmin();
		document.myForm.Permission.value="";

	with(document.myForm) {
		if(inputaccess.value==0) { 
			inputaccess.focus();
			jQuery("#inputaccess").addClass("formInputContantTbAlertY"); 
			return false; 
		}else{ 
			jQuery("#inputaccess").addClass("formInputContantTbAlertN"); 
		}
		
		if(isBlank(inputnamegroup)) {
			inputnamegroup.focus();
			jQuery("#inputnamegroup").addClass("formInputContantTbAlertY"); 
			return false; 
		}else{ 
			jQuery("#inputnamegroup").addClass("formInputContantTbAlertN"); 
		}

	}
	
	updateContactNew('../core/updatePr.php');
	
}

</script>
</head>

<body>
<form action="?" method="get" name="myForm" id="myForm">
    <input name="execute" type="hidden" id="execute" value="update" />
    <input name="masterkey" type="hidden" id="masterkey" value="<?=$_REQUEST['masterkey']?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?=$_REQUEST['menukeyid']?>" />
    <input name="valEditID" type="hidden" id="valEditID" value="<?=$_REQUEST['valEditID']?>" />
    <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?=$_REQUEST['module_pageshow']?>" />
    <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?=$_REQUEST['module_pagesize']?>" />
    <input name="module_orderby" type="hidden" id="module_orderby" value="<?=$_REQUEST['module_orderby']?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?=$_REQUEST['inputSearch']?>" />
    <input name="PermissionAdmin" type="hidden" id="PermissionAdmin" value="" />
    <input name="Permission" type="hidden" id="Permission" value="" />
					<div class="divRightNav">
                        <table width="96%" border="0" cellspacing="0" cellpadding="0"  align="center" >
                        <tr>
                        <td  class="divRightNavTb" align="left"  id="defTop" ><span class="fontContantTbNav"><a href="<?=$valLinkNav1?>" target="_self"><?=$valNav1?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a  href="javascript:void(0)"  onclick="btnBackPage('../core/permisManage.php')" target="_self"><?=$valNav2?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?=$langTxt["pr:viewpermis"]?></span></td>
                        <td  class="divRightNavTb" align="right">
                        

                        
                        </td>
                        </tr>
                        </table>
					</div>
                            <div class="divRightHead">
                                <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
                                  <tr>
                                    <td height="77" align="left"><span class="fontHeadRight"><?=$langTxt["pr:viewpermis"]?></span></td>
                                    <td align="left">
                                            <table  border="0" cellspacing="0" cellpadding="0" align="right">
                                                <tr>
                                                    <td align="right">
                                                        <div  class="btnEditView" title="<?=$langTxt["btn:edit"]?>" onclick="editContactNew('../core/editPermis.php');"></div>
                                                        <div  class="btnBack" title="<?=$langTxt["btn:back"]?>" onclick="btnBackPage('../core/permisManage.php')"></div>
                                                    </td>
                                                </tr>
                                            </table>
                                    </td>
                                  </tr>
                                </table>
                            </div>
                             <div class="divRightMain" >
    <br />
    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder "> 
  <tr >
    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?=$langTxt["pr:title"]?></span><br/>
    <span class="formFontTileTxt"><?=$langTxt["pr:titleDe"]?></span>    </td>
    </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langTxt["pr:pretype"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <div class="formDivView"><?   if($valLv=="admin"){ echo $langTxt["pr:select1"]; }else if($valLv=="staff"){ echo $langTxt["pr:select2"]; }?></div></td>
  </tr>
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langTxt["pr:pername"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <div class="formDivView"><?=$valName?></div></td>
  </tr>
      </table>
    <br />
    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder "> 

  <tr >
    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?=$langTxt["pr:titlePer"]?></span><br/>
    <span class="formFontTileTxt"><?=$langTxt["pr:titlePerDe"]?></span>    </td>
    </tr>
  
   <tr >
    <td colspan="7" align="left"  valign="top" class="formTileTxt">
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
   <tr ><td align="left"  valign="middle"  class="tbRightTitleTbL" >
       <span class="fontTitlTbRight"><?=$langTxt["mg:subject"]?>
        </span></td>

    <td width="18%"  class="tbRightTitleTb"  valign="middle"  align="center"><span style="color:#FFCC00;"  class="fontTitlTbRight" ><?=$langTxt["pr:all"]?></span></td>
    <td width="18%"  class="tbRightTitleTb"  valign="middle"  align="center"><span style="color:#FFCC00;" class="fontTitlTbRight"><?=$langTxt["pr:all"]?></span></td>
    <td width="18%"  class="tbRightTitleTbR"  valign="middle"  align="center"><span style="color:#FFCC00;"  class="fontTitlTbRight"><?=$langTxt["pr:all"]?></span></td>
  </tr>
   <?
	// Admin
	$Field=$core_tb_menu;
	$sqlTopic="SELECT * FROM ".$core_tb_menu." WHERE  ".$core_tb_menu."_parentID = '0' AND ".$core_tb_menu."_status = 'Enable'     ORDER BY ".$Field."_order";
	$QueryTopic=wewebQueryDB($coreLanguageSQL,$sqlTopic) ;

	if(wewebNumRowsDB($coreLanguageSQL,$QueryTopic)<=0){
	?>
     <tr >
    <td colspan="4" align="center"  valign="middle"  class="divRightContantTbRL" style="padding-top:150px; padding-bottom:150px;" ><?=$langTxt["mg:nodate"]?></td>
    </tr>
    <? }else{
			$topicIndex=0;	
			while($topic1=wewebFetchArrayDB($coreLanguageSQL,$QueryTopic)){
			$dataArrAdmin[$topicIndex][0]=$topic1[$Field."_id"];
			$dataArrAdmin[$topicIndex][1]=$topic1[$Field."_id"];
			
			if($_SESSION[$valSiteManage.'core_session_language']=="Thai"){
				$row_namelv1=$topic1[$Field."_namethai"];
			}else if($_SESSION[$valSiteManage.'core_session_language']=="Eng"){
				$row_namelv1=$topic1[$Field."_nameeng"];
			}
			
			$topicIndex+=1;
			
	?>
 
  <tr class="divOverTb" >
     <td  class="divRightContantOverTbL"  valign="top" align="left"  style="padding-left:15px;">
     <? if($topic1[$Field."_icon"]){?><img src="<?=$topic1[$Field."_icon"]?>" border="0" align="absmiddle"  hspace="10" /><? } else{ ?> - <? } ?><?=$row_namelv1?>
        </td>
    <td  class="divRightContantOverTb"   valign="top" align="center" >
    <div  style="width:125px; margin:0 auto; text-align:center;">
   <div class="formDivRadioR" style="color:#FFCC00;">
   <img src="../img/btn/blank.gif" width="11" height="11" id="R<?=$topic1[$Field."_id"]?>" name="R<?=$topic1[$Field."_id"]?>"   border="0"/>&nbsp;<span><?=$langTxt["pr:read"]?> </span>
   </div>
   </div>
    </td>
    <td  class="divRightContantOverTb"  valign="top"  align="center">
    <div  style="width:118px; margin:0 auto; text-align:center;">
    <div class="formDivRadioR"  style="color:#00CC00;">
    <img src="../img/btn/blank.gif" width="11" height="11" id="RW<?=$topic1[$Field."_id"]?>"   name="RW<?=$topic1[$Field."_id"]?>"  border="0"/>&nbsp;<span><?=$langTxt["pr:manage"]?></span>
    </div>
     </div>
    
    </td>
    
    <td  class="divRightContantOverTbR"  valign="top"  align="center">
  <div  style="width:145px; margin:0 auto; text-align:center;">
  <div class="formDivRadioR"  style="color:#FF0000;">
    <img src="../img/btn/blank.gif" width="11" height="11" id="NA<?=$topic1[$Field."_id"]?>" name="NA<?=$topic1[$Field."_id"]?>"  border="0"/>&nbsp;<span><?=$langTxt["pr:noaccess"]?></span>
    </div>
    </div>   </td>
    
  </tr>
  <?
			$sqlSub="SELECT * FROM ".$core_tb_menu." WHERE   ".$core_tb_menu."_parentID = '".$topic1[$Field."_id"]."'   AND ".$core_tb_menu."_status = 'Enable'    ORDER BY ".$Field."_order";
			$QuerySub=wewebQueryDB($coreLanguageSQL,$sqlSub);
			if(wewebNumRowsDB($coreLanguageSQL,$QuerySub)>=1){
				while($subtopic1=wewebFetchArrayDB($coreLanguageSQL,$QuerySub)){
				$dataArrAdmin[$topicIndex][0]=$subtopic1[$Field."_id"];
				$dataArrAdmin[$topicIndex][1]=$subtopic1[$Field."_id"];
				
				if($_SESSION[$valSiteManage.'core_session_language']=="Thai"){
					$row_namelv2=$subtopic1[$Field."_namethai"];
				}else if($_SESSION[$valSiteManage.'core_session_language']=="Eng"){
					$row_namelv2=$subtopic1[$Field."_nameeng"];
				}
		
					$topicIndex+=1;
			?>
            
            <tr class="divSubOverTb" >
     <td  class="divRightContantTbL"  valign="top" align="left"  style="padding-left:35px;"    >
     <? if($subtopic1[$Field."_icon"]){?><img src="<?=$subtopic1[$Field."_icon"]?>" border="0" align="absmiddle"   hspace="10"/><? } else{ ?> - <? } ?><?=$row_namelv2?>
        </td>
    <td  class="divRightContantTb"   valign="top" align="center" >
    <div  style="width:125px; margin:0 auto; text-align:center;">
    <div class="formDivRadioR" style="color:#FFCC00;">
    <img src="../img/btn/blank.gif" width="11" height="11" id="R<?=$subtopic1[$Field."_id"]?>"  name="R<?=$subtopic1[$Field."_id"]?>" border="0"/>&nbsp;<span><?=$langTxt["pr:read"]?></span>
    </div>
    </div>
    </td>
    <td  class="divRightContantTb"  valign="top"  align="center">
    <div  style="width:118px; margin:0 auto; text-align:center;">
    <div class="formDivRadioR" style="color:#00CC00;">
    <img src="../img/btn/blank.gif" width="11" height="11" id="RW<?=$subtopic1[$Field."_id"]?>"  name="RW<?=$subtopic1[$Field."_id"]?>" border="0"/>&nbsp;<span><?=$langTxt["pr:manage"]?></span>
    </div>
    </div>
    
    </td>
    
    <td  class="divRightContantTbR"  valign="top"  align="center">
  <div  style="width:145px; margin:0 auto; text-align:center;">
  <div class="formDivRadioR" style="color:#FF0000;">
    <img src="../img/btn/blank.gif" width="11" height="11" id="NA<?=$subtopic1[$Field."_id"]?>"  name="NA<?=$subtopic1[$Field."_id"]?>" border="0"/>&nbsp;<span><?=$langTxt["pr:noaccess"]?></span>
    </div>
    </div>   </td>
    
  </tr>
            <?
				}
			} ?>
     <? 
	 
		 }
	 }
	 
	 ?>
  </table>
    </td>
    </tr>
  
    </table>
    <br />
    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" > 
   <tr >
      <td colspan="7" align="right"  valign="top" height="20"></td>
      </tr>
    <tr >
    <td colspan="7" align="right"  valign="middle" class="formEndContantTb"><a href="#defTop"  title="<?=$langTxt["btn:gototop"]?>"><?=$langTxt["btn:gototop"]?> <img src="../img/btn/top.png"  align="absmiddle"/></a></td>
    </tr>
  </table>
  </div>
</form>  
<script language="JavaScript" type="text/javascript">
 		  var	 idArrAdmin=new Array(<?=$topicIndex?>);
		  for(i=0;i<<?=$topicIndex?>;i++){
		  	 idArrAdmin[i]=new Array(2);
		  }
		<?	for($i=0;$i<$topicIndex;$i++){
							echo  "idArrAdmin[".$i."][0]=".$dataArrAdmin[$i][0].";";
							echo  "idArrAdmin[".$i."][1]=".$dataArrAdmin[$i][1].";";
			}			
		?>		
		function  checkAllAdmin(type){
			for(i=0;i<<?=$topicIndex?>;i++){
					document.getElementById(type+idArrAdmin[i][0]).checked=true;
			}
		}
		
		function  checkInSubAdmin(type,topicId){
			for(i=0;i<<?=$topicIndex?>;i++){
					if(idArrAdmin[i][1]==topicId){
						document.getElementById(type+idArrAdmin[i][0]).checked=true;
					}
			}
		}
		
		function genDataAdmin(){
			var genStrAdmin="";
			for(i=0;i<<?=$topicIndex?>;i++){
			
						if(document.getElementById("AdminR"+idArrAdmin[i][0]).checked==true) {
							 genStrAdmin+=idArrAdmin[i][0]+":R"; 
						} else if(document.getElementById("AdminRW"+idArrAdmin[i][0]).checked==true) { 
							genStrAdmin+=idArrAdmin[i][0]+":RW"; 
						}else{
							genStrAdmin+=idArrAdmin[i][0]+":NA"; 
						}
						
						if(i!=<?=$topicIndex-1?>){
							genStrAdmin+=",";
						}
			}
		document.myForm.PermissionAdmin.value=genStrAdmin;
		}		



  </script>   
<? 
 $Field=$core_tb_permission;
 $sqlPM="SELECT * FROM ".$Field." WHERE ".$Field."_perid=".$_POST["valEditID"]." ";
 $QueryPM=wewebQueryDB($coreLanguageSQL,$sqlPM) ;
  $numPM=wewebNumRowsDB($coreLanguageSQL,$QueryPM);
 if($numPM>=1){
 ?>
 <script language="JavaScript">
<?
 while($pm=wewebFetchArrayDB($coreLanguageSQL,$QueryPM)){
 ?>
jQuery("#<?=$pm[$Field."_permission"].$pm[$Field."_menuid"]?>").attr("src","../img/btn/true.gif");
<?
 }
 ?>
</script>
 <?
  }
 ?>
    <? include("../lib/disconnect.php");?>

</body>
</html>
