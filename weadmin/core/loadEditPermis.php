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
			jQuery("#inputaccess").removeClass("formInputContantTbAlertY"); 
		}
		
		if(isBlank(inputnamegroup)) {
			inputnamegroup.focus();
			jQuery("#inputnamegroup").addClass("formInputContantTbAlertY"); 
			return false; 
		}else{ 
			jQuery("#inputnamegroup").removeClass("formInputContantTbAlertY"); 
		}

	}
	
	updateContactNew('../core/updatePr.php');
	
}


jQuery(document).ready(function(){

  jQuery('#myForm').keypress(function(e) {
    if (e.which == 13) {
		//e.preventDefault();
		executeSubmit();
		return false; 
    }
  });
});


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
    <input name="inputGh" type="hidden" id="inputGh" value="<?=$_REQUEST['inputGh']?>" />
    <input name="PermissionAdmin" type="hidden" id="PermissionAdmin" value="" />
    <input name="Permission" type="hidden" id="Permission" value="" />
					<div class="divRightNav">
                        <table width="96%" border="0" cellspacing="0" cellpadding="0"  align="center" >
                        <tr>
                        <td  class="divRightNavTb" align="left"  id="defTop" ><span class="fontContantTbNav"><a href="<?=$valLinkNav1?>" target="_self"><?=$valNav1?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a  href="javascript:void(0)"  onclick="btnBackPage('../core/permisManage.php')" target="_self"><?=$valNav2?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?=$langTxt["pr:editpermis"]?></span></td>
                        <td  class="divRightNavTb" align="right">
                        

                        
                        </td>
                        </tr>
                        </table>
					</div>
                            <div class="divRightHead">
                                <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
                                  <tr>
                                    <td height="77" align="left"><span class="fontHeadRight"><?=$langTxt["pr:editpermis"]?></span></td>
                                    <td align="left">
                                            <table  border="0" cellspacing="0" cellpadding="0" align="right">
                                                <tr>
                                                    <td align="right">
                                                        <div  class="btnSave" title="<?=$langTxt["btn:save"]?>" onclick="executeSubmit();"></div>
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
        <td colspan="7" align="right"  valign="top"   height="15" ></td>
    </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langTxt["pr:pretype"]?><span class="fontContantAlert">*</span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <select name="inputaccess"  id="inputaccess"class="formSelectContantTb">
        <option value="0"><?=$langTxt["pr:select"]?></option>
        <option value="admin"  <?  if($valLv=="admin"){?> selected="selected" <? }?>><?=$langTxt["pr:select1"]?></option>
        <option value="staff"  <?  if($valLv=="staff"){?> selected="selected" <? }?>><?=$langTxt["pr:select2"]?></option>
    </select></td>
  </tr>
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langTxt["pr:pername"]?><span class="fontContantAlert">*</span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputnamegroup" id="inputnamegroup" type="text"  class="formInputContantTb" value="<?=$valName?>"/></td>
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

    <td width="18%"  class="tbRightTitleTb"  valign="middle"  align="center"><span onclick="checkAllAdmin('AdminR');"  style="cursor:pointer;color:#FFCC00;"  class="fontTitlTbRight" ><?=$langTxt["pr:all"]?></span></td>
    <td width="18%"  class="tbRightTitleTb"  valign="middle"  align="center"><span onclick="checkAllAdmin('AdminRW');"  style="cursor:pointer;color:#00CC00;"  class="fontTitlTbRight"><?=$langTxt["pr:all"]?></span></td>
    <td width="18%"  class="tbRightTitleTbR"  valign="middle"  align="center"><span onclick="checkAllAdmin('AdminNA');"  style="cursor:pointer;color:#FF0000;"  class="fontTitlTbRight"><?=$langTxt["pr:all"]?></span></td>
  </tr>
   <?
	// Admin
	$Field=$core_tb_menu;
  $sqlTopic="SELECT * FROM ".$core_tb_menu." WHERE  ".$core_tb_menu."_parentID = '0' AND ".$core_tb_menu."_status = 'Enable'     ";
  //$sqlTopic = $sqlTopic ."AND ".$core_tb_menu."_typemini != '1'  ";
  
  if(!empty($_REQUEST['inputGh']) && ($_REQUEST['inputGh'] == "minisite")){
    $sqlTopic = $sqlTopic ."AND ".$core_tb_menu."_typemini = '1'  ";
  } else {
    $sqlTopic = $sqlTopic ."AND ".$core_tb_menu."_typemini != '1'  ";
  }
  
  $sqlTopic = $sqlTopic ."  ORDER BY ".$Field."_order  ";
//print_pre($sqlTopic);
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
    <label>
    <div class="formDivRadioL">
    <input name="Admin<?=$topic1[$Field."_id"]?>" id="AdminR<?=$topic1[$Field."_id"]?>" type="radio" class="formRadioContantTb" value="R" onclick="checkInSubAdmin('AdminR',<?=$topic1[$Field."_id"]?>)" /></div>
    <div class="formDivRadioR" style="color:#FFCC00;"><?=$langTxt["pr:read"]?></div>
    </label>
    </div>
    </td>
    <td  class="divRightContantOverTb"  valign="top"  align="center">
    <div  style="width:118px; margin:0 auto; text-align:center;">
    <label>
    <div class="formDivRadioL">
    <input name="Admin<?=$topic1[$Field."_id"]?>"  id="AdminRW<?=$topic1[$Field."_id"]?>" type="radio" class="formRadioContantTb"  value="RW" onclick="checkInSubAdmin('AdminRW',<?=$topic1[$Field."_id"]?>)" /></div>
    <div class="formDivRadioR"  style="color:#00CC00;"><?=$langTxt["pr:manage"]?></div>
    </label>
    </div>
    
    </td>
    
    <td  class="divRightContantOverTbR"  valign="top"  align="center">
  <div  style="width:145px; margin:0 auto; text-align:center;">
    <label>
    <div class="formDivRadioL">
    <input name="Admin<?=$topic1[$Field."_id"]?>" id="AdminNA<?=$topic1[$Field."_id"]?>" type="radio" class="formRadioContantTb" value="NA" onclick="checkInSubAdmin('AdminNA',<?=$topic1[$Field."_id"]?>)" /></div>
    <div class="formDivRadioR" style="color:#FF0000;"><?=$langTxt["pr:noaccess"]?></div>
    </label>
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
    <label>
    <div class="formDivRadioL">
    <input name="Admin<?=$subtopic1[$Field."_id"]?>" id="AdminR<?=$subtopic1[$Field."_id"]?>" type="radio" class="formRadioContantTb" value="R" onclick="checkInSub('R',<?=$subtopic1[$Field."_id"]?>)" /></div>
    <div class="formDivRadioR" style="color:#FFCC00;"><span for="R<?=$subtopic1[$Field."_id"]?>"><?=$langTxt["pr:read"]?></span></div>
    </label>
    </div>
    </td>
    <td  class="divRightContantTb"  valign="top"  align="center">
    <div  style="width:118px; margin:0 auto; text-align:center;">
    <label>
    <div class="formDivRadioL">
    <input name="Admin<?=$subtopic1[$Field."_id"]?>"  id="AdminRW<?=$subtopic1[$Field."_id"]?>" type="radio" class="formRadioContantTb"  value="RW" onclick="checkInSub('RW',<?=$subtopic1[$Field."_id"]?>)" /></div>
    <div class="formDivRadioR"  style="color:#00CC00;"><span for="RW<?=$subtopic[$Field."_id"]?>"><?=$langTxt["pr:manage"]?></span></div>
    </label>
    </div>
    
    </td>
    
    <td  class="divRightContantTbR"  valign="top"  align="center">
  <div  style="width:145px; margin:0 auto; text-align:center;">
    <label>
    <div class="formDivRadioL">
    <input name="Admin<?=$subtopic1[$Field."_id"]?>" id="AdminNA<?=$subtopic1[$Field."_id"]?>" type="radio" class="formRadioContantTb" value="NA" onclick="checkInSub('NA',<?=$subtopic1[$Field."_id"]?>)" /></div>
    <div class="formDivRadioR" style="color:#FF0000;"><span for="NA<?=$subtopic1[$Field."_id"]?>"><?=$langTxt["pr:noaccess"]?></span></div>
    </label>
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
$Prefix="Admin";
$Field=$core_tb_permission;
$sqlPM="SELECT * FROM ".$Field." WHERE ".$Field."_perid=".$_POST["valEditID"]."     " ;
 $QueryPM=wewebQueryDB($coreLanguageSQL,$sqlPM);
  $numPM=wewebNumRowsDB($coreLanguageSQL,$QueryPM);
 if($numPM>=1){
 	echo '<script language="JavaScript">';
 while($pm=wewebFetchArrayDB($coreLanguageSQL,$QueryPM)){
 //	echo 'document.getElementById("'.$Prefix.$pm[$Field."_permission"].$pm[$Field."_menuid"].'").checked=true;';
 echo 'jQuery("#'.$Prefix.$pm[$Field."_permission"].$pm[$Field."_menuid"].'").attr("checked", "checked");';
 }
 	echo '</script>';
 }
 ?>
    <? include("../lib/disconnect.php");?>

</body>
</html>
