<?

include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("config.php");

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// print_pre($_POST);

$sql = "DELETE FROM " . $mod_tb_permisGroup . " where " . $mod_tb_permisGroup . "." . $mod_tb_permisGroup . "_masterkey = '" . $_POST['masterkey'] . "'";
// print_pre($sql);
// die;
$Query = wewebQueryDB($coreLanguageSQL, $sql);

// $dbConnect->execute("ALTER TABLE $mod_tb_permisGroup AUTO_INCREMENT = 1");

foreach ($_POST['permis'] as $idG => $valuePermis) {
   // print_pre($idG);
   // print_pre($valuePermis);
   foreach ($valuePermis as $idMis => $status) {

      $insert[$mod_tb_permisGroup . "_misid"] = "" . $idMis . "";
      $insert[$mod_tb_permisGroup . "_cmgid"] = "" . $idG . "";
      $insert[$mod_tb_permisGroup . "_status"] = "'Enable'";
      $insert[$mod_tb_permisGroup . "_masterkey"] = "'" . $_POST['masterkey'] . "'";

      $sql = "INSERT INTO " . $mod_tb_permisGroup . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
      // print_pre($sql);
      $Query = wewebQueryDB($coreLanguageSQL, $sql);
   }
}

