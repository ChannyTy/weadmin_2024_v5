<?php
/* Smarty version 4.3.2, created on 2024-05-06 11:12:52
  from '/var/www/html/front_2024_v5/front/template/default/inc/inc-loadscript.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_663858c4c22808_99630631',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cb7295603fa000984703c807926d8fc9c7feff74' => 
    array (
      0 => '/var/www/html/front_2024_v5/front/template/default/inc/inc-loadscript.tpl',
      1 => 1710213178,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_663858c4c22808_99630631 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="text/javascript">var raf = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;<?php echo '</script'; ?>
>

<?php ob_start();
echo (($tmp = $_smarty_tpl->tpl_vars['assignjs']->value ?? null)===null||$tmp==='' ? null ?? null : $tmp);
$_prefixVariable3 = ob_get_clean();
if ($_prefixVariable3) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['assignjs']->value, 'addAssetScript');
$_smarty_tpl->tpl_vars['addAssetScript']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['addAssetScript']->value) {
$_smarty_tpl->tpl_vars['addAssetScript']->do_else = false;
echo $_smarty_tpl->tpl_vars['addAssetScript']->value;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
}
