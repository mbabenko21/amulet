<?php /* Smarty version Smarty-3.1-DEV, created on 2014-05-11 20:26:41
         compiled from "D:\web\OpenServer\domains\amulet\app\views\html5\home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32313536fa11c01b482-89664807%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a89f1d2a0d4e3e685ae6829302a4e3de958ee159' => 
    array (
      0 => 'D:\\web\\OpenServer\\domains\\amulet\\app\\views\\html5\\home.tpl',
      1 => 1399825570,
      2 => 'file',
    ),
    '68565ad3c5a681db6ee8f2abfcbf2be37bbf85fb' => 
    array (
      0 => 'D:\\web\\OpenServer\\domains\\amulet\\app\\views\\html5\\header.tpl',
      1 => 1399825495,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32313536fa11c01b482-89664807',
  'function' => 
  array (
  ),
  'cache_lifetime' => 3600,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_536fa11c1730d7_39190035',
  'variables' => 
  array (
    'system_config' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_536fa11c1730d7_39190035')) {function content_536fa11c1730d7_39190035($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
    <title><?php echo $_smarty_tpl->tpl_vars['system_config']->value->getAppName();?>
</title>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=PT+Sans:400,700,400italic&amp;subset=latin,cyrillic">
    <link rel="stylesheet" href="/public/css/default.css">
</head>
<body>
<div class="container">
    <div class="content">
        
            <?php /*  Call merged included template "header.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '32313536fa11c01b482-89664807');
content_536fa4c12d40f4_44571234($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "header.tpl" */?>

        
        
        

        
    </div>
</div>
</body>
</html><?php }} ?>
<?php /* Smarty version Smarty-3.1-DEV, created on 2014-05-11 20:26:41
         compiled from "D:\web\OpenServer\domains\amulet\app\views\html5\header.tpl" */ ?>
<?php if ($_valid && !is_callable('content_536fa4c12d40f4_44571234')) {function content_536fa4c12d40f4_44571234($_smarty_tpl) {?><div class="header">
    <h3>
        
            <?php echo $_smarty_tpl->tpl_vars['system_config']->value->getAppName();?>
 <strong>(<?php echo $_smarty_tpl->tpl_vars['system_config']->value->getVersion();?>
)</strong>
        
    </h3>
</div><?php }} ?>
