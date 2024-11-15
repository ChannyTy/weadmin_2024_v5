<?
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("config.php");

$sql = "SELECT " . $core_tb_langgoo . "_subject FROM " . $core_tb_langgoo . "  WHERE  " . $core_tb_langgoo . "_subject='" . $_REQUEST['inputLanggoo'] . "'";
$query = wewebQueryDB($coreLanguageSQL, $sql);
$count_record = wewebNumRowsDB($coreLanguageSQL, $query);

if ($count_record <= 0) {

   $insert = array();
   $insert[$core_tb_langgoo . "_subject"] = "'" . changeQuot($_REQUEST['inputLanggoo']) . "'";
   $insert[$core_tb_langgoo . "_status"] = "'Disable'";

   $sql = "INSERT INTO " . $core_tb_langgoo . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
   $Query = wewebQueryDB($coreLanguageSQL, $sql);
} else {
   ?>
   <script language="JavaScript" type="text/javascript">
      jQuery("#boxAlertEmail").show();
   </script>
   <?
}
?>

<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
   <?
   $sql = "SELECT " . $core_tb_langgoo . "_subject," . $core_tb_langgoo . "_id FROM " . $core_tb_langgoo . "  ORDER BY " . $core_tb_langgoo . "_id ASC ";
   $query = wewebQueryDB($coreLanguageSQL, $sql);
   $numRowCount = wewebNumRowsDB($coreLanguageSQL, $query);
   if ($numRowCount >= 1) {
      $num_email = 0;
      while ($row = wewebFetchArrayDB($coreLanguageSQL, $query)) {
         $num_email++;
         $valEmailNew = rechangeQuot($row[0]);
         $valEmailID = $row[1];
         ?>
         <tr >
            <td width="18%" align="right"  valign="top"  class="formLeftContantTb"><?= number_format($num_email) ?>.<span class="fontContantAlert"></span></td>
            <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><a href="javascript:void(0)"  onclick="document.myForm.valDelFile.value =<?= $valEmailID ?>; modDelEmail('deleteLanggoo.php','#boxMailContact2')" ><img src="../img/btn/delete.png" align="absmiddle" title="Delete email"  hspace="5"    border="0" /></a> <?= $valEmailNew ?></div></td>
         </tr>

      <? }
   }
   ?>
</table>
<script language="JavaScript" type="text/javascript">
   document.myForm.inputLanggoo.value = '';
   document.myForm.inputLanggoo.focus();
</script>

