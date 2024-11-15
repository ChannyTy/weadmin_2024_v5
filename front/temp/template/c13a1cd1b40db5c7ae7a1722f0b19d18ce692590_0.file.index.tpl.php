<?php
/* Smarty version 4.3.2, created on 2024-05-06 11:36:26
  from '/var/www/html/weadmin_2024_v5/front/controller/script/home/template/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_66385e4a64fbf6_03937274',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c13a1cd1b40db5c7ae7a1722f0b19d18ce692590' => 
    array (
      0 => '/var/www/html/weadmin_2024_v5/front/controller/script/home/template/index.tpl',
      1 => 1714969972,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66385e4a64fbf6_03937274 (Smarty_Internal_Template $_smarty_tpl) {
?><h1>HOME</h1>

<ul>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['callTopGraphic']->value, 'valuecallTopGraphic', false, 'keycallTopGraphic');
$_smarty_tpl->tpl_vars['valuecallTopGraphic']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['keycallTopGraphic']->value => $_smarty_tpl->tpl_vars['valuecallTopGraphic']->value) {
$_smarty_tpl->tpl_vars['valuecallTopGraphic']->do_else = false;
?>
        <li><?php echo $_smarty_tpl->tpl_vars['valuecallTopGraphic']->value['subject'];?>
</li>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</ul><?php }
}
