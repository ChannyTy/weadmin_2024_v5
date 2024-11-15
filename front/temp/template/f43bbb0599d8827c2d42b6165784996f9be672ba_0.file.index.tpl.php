<?php
/* Smarty version 4.3.2, created on 2024-05-06 11:32:53
  from '/var/www/html/front_2024_v5/front/controller/script/home/template/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_66385d757bf127_66387964',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f43bbb0599d8827c2d42b6165784996f9be672ba' => 
    array (
      0 => '/var/www/html/front_2024_v5/front/controller/script/home/template/index.tpl',
      1 => 1714969972,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66385d757bf127_66387964 (Smarty_Internal_Template $_smarty_tpl) {
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
