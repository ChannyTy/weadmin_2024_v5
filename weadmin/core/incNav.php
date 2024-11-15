<div class="divRightNav">
<? if($valClassNav==1){?>
    <table width="96%" border="0" cellspacing="0" cellpadding="0"  align="center" >
    <tr>
    <td  class="divRightNavTb" align="left"><span class="fontContantTbNav"><?=$valNav1?></span></td>
    <td  class="divRightNavTb" align="right"><?=DateFormat(date('d-m-Y h:i:s'))?></td>
    </tr>
    </table>
    <? }else{?>
                        <table width="96%" border="0" cellspacing="0" cellpadding="0"  align="center" >
                        <tr>
                        <td  class="divRightNavTb" align="left"><span class="fontContantTbNav"><a href="<?=$valLinkNav1?>" target="_self"><?=$valNav1?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?=$valNav2?></span></td>
                        <td  class="divRightNavTb" align="right">
                        <table  border="0" cellspacing="0" cellpadding="0" align="right">
  <tr>
    <td align="right"><input name="" type="text"  class="inputContantTb"/></td>
    <td align="right"><img src="../img/btn/search.png" align="absmiddle" /></td>
  </tr>
</table>

                        
                        </td>
                        </tr>
                        </table>
    <? }?>
</div>