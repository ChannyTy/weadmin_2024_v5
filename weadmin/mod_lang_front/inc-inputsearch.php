<?php
foreach ($mod_inputseach AS $input) {
   ?>
   <input name="<?= $input ?>" type="hidden" id="<?= $input ?>" value="<?php echo $_REQUEST["$input"] ?>" />
   <?php
}
?>
