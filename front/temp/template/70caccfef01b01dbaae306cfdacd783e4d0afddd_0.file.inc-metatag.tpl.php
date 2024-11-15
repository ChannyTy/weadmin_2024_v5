<?php
/* Smarty version 4.3.2, created on 2024-05-06 11:12:52
  from '/var/www/html/front_2024_v5/front/template/default/inc/inc-metatag.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_663858c4beb9f8_50053707',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '70caccfef01b01dbaae306cfdacd783e4d0afddd' => 
    array (
      0 => '/var/www/html/front_2024_v5/front/template/default/inc/inc-metatag.tpl',
      1 => 1710213251,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_663858c4beb9f8_50053707 (Smarty_Internal_Template $_smarty_tpl) {
?><base href="<?php echo $_smarty_tpl->tpl_vars['base']->value;?>
">
<title><?php echo (($tmp = $_smarty_tpl->tpl_vars['seo']->value['title'] ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['settingWeb']->value['metatitle'] ?? null : $tmp);?>
</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="keywords" content="<?php echo (($tmp = $_smarty_tpl->tpl_vars['seo']->value['keyword'] ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['settingWeb']->value['keywords'] ?? null : $tmp);?>
">
<meta name="description" content="<?php echo (($tmp = $_smarty_tpl->tpl_vars['seo']->value['desc'] ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['settingWeb']->value['description'] ?? null : $tmp);?>
">
<meta name="author" content="">
<meta name="HandheldFriendly" content="true">
<meta name="format-detection" content="telephone=no">

<?php $_smarty_tpl->_assignInScope('valLinkImgSeo', ((string)$_smarty_tpl->tpl_vars['base']->value).((string)$_smarty_tpl->tpl_vars['template']->value)."/assets/img/static/brand.png");?>
<meta property="og:type" content="website">
<meta property="og:url" content="">
<meta property="og:title" content="<?php echo (($tmp = $_smarty_tpl->tpl_vars['valSeoTitle']->value ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['settingWeb']->value['metatitle'] ?? null : $tmp);?>
">
<meta property="og:description" content="<?php echo (($tmp = $_smarty_tpl->tpl_vars['valSeoDescription']->value ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['settingWeb']->value['description'] ?? null : $tmp);?>
">
<meta property="og:image" content="<?php echo (($tmp = $_smarty_tpl->tpl_vars['valSeoImages']->value ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['valLinkImgSeo']->value ?? null : $tmp);?>
">
<meta property="og:site_name" content="">
<meta property="og:locale" content="">
<meta property="og:locale:alternate" content="">


<?php ob_start();
echo (($tmp = $_smarty_tpl->tpl_vars['assigncss']->value ?? null)===null||$tmp==='' ? null ?? null : $tmp);
$_prefixVariable2 = ob_get_clean();
if ($_prefixVariable2) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['assigncss']->value, 'addAssetCss');
$_smarty_tpl->tpl_vars['addAssetCss']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['addAssetCss']->value) {
$_smarty_tpl->tpl_vars['addAssetCss']->do_else = false;
echo $_smarty_tpl->tpl_vars['addAssetCss']->value;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
}
