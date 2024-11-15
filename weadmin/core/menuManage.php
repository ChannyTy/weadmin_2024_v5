<?
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("../lib/checkMemberSuper.php");
include("../core/incLang.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow">
<meta name="googlebot" content="noindex, nofollow">
<link href="../css/theme.css" rel="stylesheet"/>
<title><?=$core_name_title?></title>
<script language="JavaScript"  type="text/javascript" src="../js/jquery-3.7.0.min.js"></script>
<script language="JavaScript"  type="text/javascript" src="../js/jquery.blockUI.js"></script>
<script language="JavaScript"  type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
<script type="text/javascript">
	jQuery(function() {
		boxContantLoad('../core/loadMenuManage.php');
	});
</script>

</head>
<body>
<div class="allBackOffice">
	<!-- #################### Head ###############  -->
			<? include("../core/incHead.php");?>
	<!-- #################### Main ###############  -->
     <div class="mainBackOffice">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
                <td  class="tbLeftMenu" align="left"  valign="top">
                	<div class="mLeftBackOffice">
                    	<? include("../core/incLeft.php");?>
                    </div>
            </td>
                <td  align="left" class="borderLeft" valign="top">
                <form action="?" method="post" name="myFormHome" id="myFormHome">
                <input name="masterkey" type="hidden" id="masterkey" value="<?=$_REQUEST['masterkey']?>" />
                <input name="menukeyid" type="hidden" id="menukeyid" value="<?=$_REQUEST['menukeyid']?>" />
                <input name="inputSearch" type="hidden" id="inputSearch" value="<?=$_REQUEST['inputSearch']?>" />
                <input name="myParentID" type="hidden" id="myParentID" value="0" />
                <input name="valEditID" type="hidden" id="valEditID" value="" />
                </form>
                	<div class="mRightBackOffice" id="boxContantLoad">
                    			<? include("../core/incWaitting.php")?>
                    </div>
           	</td>
          </tr>
        </table>
    </div>
    <div class="clearAll"></div>
	<!-- #################### Footer ###############  -->
    <? include("../core/incFooter.php");?>
    <? include("../core/incLoderBox.php");?>
</div>
</body>
</html>
