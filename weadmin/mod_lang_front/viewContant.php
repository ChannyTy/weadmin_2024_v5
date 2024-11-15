<?
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("../core/incLang.php");
include("config.php");
include("incModLang.php");

$valClassNav=2;
$valNav1=$langTxt["nav:home2"];
$valLinkNav1="../core/index.php";
$valLevelPermission= $_SESSION[$valSiteManage."core_session_level"];

$arrLang = $_SESSION[$valSiteManage."core_session_multilang"];

$sqldetail = "SELECT 
".$mod_tb_root.".".$mod_tb_root."_id,
".$mod_tb_root.".".$mod_tb_root."_subject,
".$mod_tb_root.".".$mod_tb_root."_display,
".$mod_tb_root.".".$mod_tb_root."_status,
".$mod_tb_root.".".$mod_tb_root."_title as title,
".$mod_tb_root.".".$mod_tb_root."_lastbyid as lastbyid,
".$mod_tb_root.".".$mod_tb_root."_lastdate as lastdate,
".$mod_tb_root.".".$mod_tb_root."_inputtype as inputtype
FROM ".$mod_tb_root." WHERE ".$mod_tb_root.".".$mod_tb_root."_id = ".$_REQUEST['valEditID']."";
// print_pre($sqldetail);
$Query=wewebQueryDB($coreLanguageSQL,$sqldetail);
$Row=wewebFetchArrayDB($coreLanguageSQL,$Query);
$valKey = rechangeQuot($Row[1]);
$valID = $Row[0];
$valDisplay = unserialize($Row[2]);
$valStatus=$Row[3];
$valLastdate=DateFormat($Row['lastdate']);
$valLastby=$Row['lastbyid'];
$valtitle = rechangeQuot($Row['title']);
$valinputtype = rechangeQuot($Row['inputtype']);



			if($valStatus=="Enable"){
				$valStatusClass=	"fontContantTbEnable";
			}elseif($valStatus=="Home"){
				$valStatusClass=	"fontContantTbHomeSt";
			}else{
				$valStatusClass=	"fontContantTbDisable";
			}
		 	$valPermission= getUserPermissionOnMenu($_SESSION[$valSiteManage."core_session_groupid"],$_REQUEST["menukeyid"]);

			logs_access('3','View');
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
</head>

<body>
<form action="?" method="get" name="myForm" id="myForm">
    <input name="execute" type="hidden" id="execute" value="update" />
    <input name="masterkey" type="hidden" id="masterkey" value="<?=$_REQUEST['masterkey']?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?=$_REQUEST['menukeyid']?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?=$_REQUEST['inputSearch']?>" />
    <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?=$_REQUEST['module_pageshow']?>" />
    <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?=$_REQUEST['module_pagesize']?>" />
    <input name="module_orderby" type="hidden" id="module_orderby" value="<?=$_REQUEST['module_orderby']?>" />
    <input name="inputGh" type="hidden" id="inputGh" value="<?=$_REQUEST['inputGh']?>" />
    <input name="valEditID" type="hidden" id="valEditID" value="<?=$_REQUEST['valEditID']?>" />
    <input name="inputLt" type="hidden" id="inputLt" value="<?=$_REQUEST['inputLt']?>" />
    <? if($_REQUEST['viewID']<=0){?>
					<div class="divRightNav">
                        <table width="96%" border="0" cellspacing="0" cellpadding="0"  align="center" >
                        <tr>
                        <td  class="divRightNavTb" align="left"  id="defTop" ><span class="fontContantTbNav"><a href="<?=$valLinkNav1?>" target="_self"><?=$valNav1?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a  href="javascript:void(0)"  onclick="btnBackPage('index.php')" target="_self"><?=$langMod["tit:inpName"]?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?=$langMod["txt:titleview"]?><? if($_SESSION[$valSiteManage.'core_session_languageT']==2 || $_SESSION[$valSiteManage.'core_session_languageT']==3){?>(<?=getSystemLangTxt($_REQUEST['inputLt'],$langTxt["lg:thai"],$langTxt["lg:eng"])?>)<? }?></span></td>
                        <td  class="divRightNavTb" align="right">



                        </td>
                        </tr>
                        </table>
					</div>
                    <? }?>
                            <div class="divRightHead">
                                <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
                                  <tr>
                                    <td height="77" align="left"><span class="fontHeadRight"><?=$langMod["txt:titleview"]?></span></td>
                                    <td align="left">
                                            <table  border="0" cellspacing="0" cellpadding="0" align="right">
                                                <tr>
                                                    <td align="right">
													<? if($_REQUEST['viewID']<=0){?>
                                                    <? if($valPermission=="RW" || $valLevelPermission == "SuperAdmin"){?>
                                                        <div  class="btnEditView" title="<?=$langTxt["btn:edit"]?>" onclick="
                                                        document.myFormHome.valEditID.value=<?=$_REQUEST['valEditID']?>;
                                                        editContactNew('../<?=$mod_fd_root?>/editContant.php')"></div>
                                                     <? }?>
                                                      <div  class="btnBack" title="<?=$langTxt["btn:back"]?>" onclick="btnBackPage('index.php')"></div>
                                                        <? }?>
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
    <span class="formFontSubjectTxt"><?=$langTxt["st:titleLangDisplay"]?></span><br/>
    <span class="formFontTileTxt"><?=$langTxt["st:titleDeLang"]?></span>    </td>
    </tr>
      <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["tit:keylang"]?>:<span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?=$valKey?></div></td>
  </tr>
   <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["tit:title"]?>:<span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?=$valtitle?></div></td>
  </tr>

 <?

					foreach ($arrLang as $key => $value) {
                ?>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= number_format($key+1) ?>. <?=$langMod["tit:subject_lang"]?> (<?=$arrLang[$key]['key']?>) :<span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView">
	<?php if($valinputtype==1){ 
		$valPicName=$valDisplay[$arrLang[$key]['key']];
		$valPic=$mod_path_pictures."/".$valPicName;
		 if(is_file($valPic)){
	?>
     <a href="<?php echo $valPic?>" target="_blank"><img style="float:left;border:#c8c7cc solid 1px;max-width:600px;min-width:60px;" src="<?php echo $valPic?>"/></a>
    <?php } }else{ ?>
	<?=$valDisplay[$arrLang[$key]['key']]?>
    <?php } ?>
    </div>
    </td>
    
    
  </tr>
  <?$i++;}?>
     
   </table>
         
         <br />
<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
    <tr >
    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?=$langTxt["us:titleinfo"]?></span><br/>
    <span class="formFontTileTxt"><?=$langTxt["us:titleinfoDe"]?></span>     </td>
    </tr>
    
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langTxt["us:lastdate"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
     <div class="formDivView"><?=$valLastdate?></div>         </td>
  </tr>
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langTxt["us:creby"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
     <div class="formDivView">
     <?
		if($_SESSION[$valSiteManage.'core_session_language']=="Thai"){
			echo getUserThai($valLastby);
		}else if($_SESSION[$valSiteManage.'core_session_language']=="Eng"){
			echo getUserEng($valLastby);
		}


	?>
	 </div>         </td> 
  </tr>
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langTxt["mg:status"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
     <div class="formDivView">

               <? if($valStatus=="Enable"){?>
                   <span class="<?=$valStatusClass?>"><?=$valStatus?></span>
                <? }else if($valStatus=="Home"){?>
                    <span class="<?=$valStatusClass?>"><?=$valStatus?></span>
                <? }else{?>
                    <span class="<?=$valStatusClass?>"><?=$valStatus?></span>
                <? }?>
     </div>         </td>
  </tr>
   </table>
         <br />     <? if($_REQUEST['viewID']<=0){?>

<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" >

   <tr >
      <td colspan="7" align="right"  valign="top" height="20"></td>
      </tr>
    <tr >
    <td colspan="7" align="right"  valign="middle" class="formEndContantTb"><a href="#defTop" title="<?=$langTxt["btn:gototop"]?>"><?=$langTxt["btn:gototop"]?> <img src="../img/btn/top.png"  align="absmiddle"/></a></td>
    </tr>
    <? }?>
  </table>
  </div>
</form>
<? include("../lib/disconnect.php");?>


</body>
</html>
