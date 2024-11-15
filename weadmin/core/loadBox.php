<?
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("../core/incLang.php");

$valNav1=$langTxt["nav:home2"];
$valLinkNav1="../core/index.php";
$valNav2=$langTxt["home:box"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow">
<meta name="googlebot" content="noindex, nofollow">

<link href="../css/theme.css" rel="stylesheet"/>
<title><?=$core_name_title?></title>
<script language="JavaScript"  type="text/javascript" src="../js/jquery-1.9.0.js"></script>
<script language="JavaScript"  type="text/javascript" src="../js/jquery.blockUI.js"></script>
<script language="JavaScript"  type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
<script type="text/javascript" language="javascript">
	
	
</script>
</head>

<body>
<form action="?" method="post" name="myForm" id="myForm">
<input name="masterkey" type="hidden" id="masterkey" value="<?=$_REQUEST['masterkey']?>" />
<input name="menukeyid" type="hidden" id="menukeyid" value="<?=$_REQUEST['menukeyid']?>" />

					<div class="divRightNav">
                        <table width="96%" border="0" cellspacing="0" cellpadding="0"  align="center" >
                        <tr>
                        <td  class="divRightNavTb" align="left"><span class="fontContantTbNav"><a href="<?=$valLinkNav1?>" target="_self"><?=$valNav1?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?=$valNav2?></span></td>
                        <td  class="divRightNavTb" align="right">
                        <table  border="0" cellspacing="0" cellpadding="0" align="right">
  <tr>
    <td align="right"><input name="inputSearch" type="text"  id="inputSearch" value="<?=trim($_REQUEST['inputSearch'])?>" class="inputContantTb"/></td>
    <td align="right"><input name="searchOk" id="searchOk" onClick="document.myForm.submit();"  type="button" class="btnSearch"  value=" "  /></td>
  </tr>
</table>

                        
                        </td>
                        </tr>
                        </table>
					</div>
                            <div class="divRightHead">
                                <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
                                  <tr>
                                    <td width="93%" height="77" align="left"><span class="fontHeadRight"><?=$valNav2?></span></td>
                                    <td width="7%" align="right"> <div  class="btnBack" title="<?=$langTxt["btn:back"]?>" onclick="window.open('<?=$valLinkNav1?>','_self');"  ></div></td>
                                  </tr>
                                </table>
                            </div>
                             <div class="divRightMain" >
<br />
<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxListwBorder">
   <tr ><td width="2%"  class="divRightTitleTbL"  valign="middle" align="center" >&nbsp;</td>

    <td width="86%" align="left"   valign="middle"  class="divRightTitleTb" ><span class="fontTitlTbRight"><?=$langTxt["mg:subject"]?></span></td>
    <td width="12%"  class="divRightTitleTbR"  valign="middle"  align="center"><span class="fontTitlTbRight"><?=$langTxt["mg:manage"]?></span></td>
  </tr>
  <? 
	 $myParentID=0;
	 $sql = "SELECT * FROM ".$core_tb_menu." WHERE ".$core_tb_menu."_parentid='".$myParentID."' AND ".$core_tb_menu."_moduletype!='Link' ";
	$inputSearch =trim($_REQUEST['inputSearch']); 
if($inputSearch<>"") {
	$sql = $sql."  AND   ( ".$core_tb_menu."_namethai LIKE '%$inputSearch%' OR  ".$core_tb_menu."_nameeng LIKE '%$inputSearch%'   ) ";
}

	$sql = $sql." ORDER BY ".$core_tb_menu."_order ASC ";
	$query=wewebQueryDB($coreLanguageSQL,$sql) ;
	$recordCount=wewebNumRowsDB($coreLanguageSQL,$query);
	$maxOrder =$recordCount;
	if($recordCount>=1) {
		$index=1;
		$valDivTr="divSubOverTb";
		while($row=wewebFetchArrayDB($coreLanguageSQL,$query)) {
		$valID=	$row[$core_tb_menu."_id"];
			if($_SESSION[$valSiteManage.'core_session_language']=="Thai"){
				$valName=rechangeQuot($row[$core_tb_menu."_namethai"]);
			}else if($_SESSION[$valSiteManage.'core_session_language']=="Eng"){
				$valName=rechangeQuot($row[$core_tb_menu."_nameeng"]);
			}
			
		$valType=	$row[$core_tb_menu."_moduletype"];
		$valDateCredate = dateFormatReal($row[$core_tb_menu."_credate"]);
		$valTimeCredate = timeFormatReal($row[$core_tb_menu."_credate"]);
		$valStatus = $row[$core_tb_menu."_status"];
		if($valStatus=="Enable"){
			$valStatusClass=	"fontContantTbEnable";
		}else{
			$valStatusClass=	"fontContantTbDisable";
		}
		
		$valParentType = $row[$core_tb_menu."_moduletype"];
		
			$masterkeyName = $row[$core_tb_menu."_masterkey"];
			$myUserID = $_SESSION[$valSiteManage."core_session_groupid"];
			$myMenuID = $row[$core_tb_menu."_id"];
			 $permissionID = getUserPermissionOnMenu($myUserID,$myMenuID);

		if($valDivTr=="divSubOverTb"){
			$valDivTr=	"divOverTb";
		}else{
			$valDivTr="divSubOverTb";
		}
				if($permissionID!="NA") {	
				
				
	$sqlBox = "SELECT ".$core_tb_sort."_id FROM ".$core_tb_sort."  WHERE  ".$core_tb_sort."_memberID='".$_SESSION[$valSiteManage.'core_session_id']."' AND ".$core_tb_sort."_menuID='".$valID."'  ";
	$queryBox=wewebQueryDB($coreLanguageSQL,$sqlBox);
	 $recordCountBox=wewebNumRowsDB($coreLanguageSQL,$queryBox);
	$rowBox=wewebFetchArrayDB($coreLanguageSQL,$queryBox)	;
	$valBoxID=$rowBox[0];
  ?>
  <tr class="<?=$valDivTr?>" >
     <td  class="divRightContantOverTbL"  valign="top" align="center" >&nbsp;</td>
    <td  class="divRightContantOverTb"   valign="top" align="left" ><?=$valName?></td>
    <td  class="divRightContantOverTbR"  valign="top"  align="center">
    <table  border="0" cellspacing="0" cellpadding="0">
  <tr>

  <td valign="top" align="center" width="30">
  
    <div class="divRightManage" id="divManageBoxAdd<?=$valID?>" title="<?=$langTxt["btn:add"]?>" <? if($recordCountBox>=1){?> style="display:none;"<? }?> onclick="
    addContactBox('../core/insertBox.php',<?=$valID?>,'divManageBoxAdd<?=$valID?>','divManageBoxDel<?=$valID?>')
    ">
    <img src="../img/btn/add2.png"  /><br/>
    <span class="fontContantTbManage"><?=$langTxt["btn:add"]?></span>    </div> 
    
    <div class="divRightManage" id="divManageBoxDel<?=$valID?>"  title="<?=$langTxt["btn:del"]?>" <? if($recordCountBox<=0){?> style="display:none;"<? }?> onClick="
    delContactBox('../core/deleteHome.php',<?=$valBoxID?>,'divManageBoxDel<?=$valID?>','divManageBoxAdd<?=$valID?>')
            ">
     <img src="../img/btn/delete.png"  /><br/>
    <span class="fontContantTbManage"><?=$langTxt["btn:del"]?></span>    </div>
       </td>
  
    
  </tr>
</table>    </td>
  </tr>
  <? }?>

<? 
$index++;
}
	}else{?>
 <tr >
    <td colspan="3" align="center"  valign="middle"  class="divRightContantTbRL" style="padding-top:150px; padding-bottom:150px;" ><?=$langTxt["mg:nodate"]?></td>
    </tr>
<? }?>


</table>
<input name="TotalCheckBoxID" type="hidden" id="TotalCheckBoxID" value="<?=$index-1?>" />
<div class="divRightContantEnd"></div>
                             </div>
                    
</form>
<? include("../lib/disconnect.php");?>
 </body>
</html>
