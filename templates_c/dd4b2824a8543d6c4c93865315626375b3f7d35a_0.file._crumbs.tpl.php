<?php
/* Smarty version 3.1.31, created on 2017-12-30 14:12:29
  from "/Users/jason/projects/reporting/templates/_crumbs.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a47e51d90b862_46810465',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dd4b2824a8543d6c4c93865315626375b3f7d35a' => 
    array (
      0 => '/Users/jason/projects/reporting/templates/_crumbs.tpl',
      1 => 1514660945,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a47e51d90b862_46810465 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['_crumbs']->value, '_crumb', true);
$_smarty_tpl->tpl_vars['_crumb']->iteration = 0;
$_smarty_tpl->tpl_vars['_crumb']->index = -1;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['_crumb']->value) {
$_smarty_tpl->tpl_vars['_crumb']->iteration++;
$_smarty_tpl->tpl_vars['_crumb']->index++;
$_smarty_tpl->tpl_vars['_crumb']->first = !$_smarty_tpl->tpl_vars['_crumb']->index;
$_smarty_tpl->tpl_vars['_crumb']->last = $_smarty_tpl->tpl_vars['_crumb']->iteration == $_smarty_tpl->tpl_vars['_crumb']->total;
$__foreach__crumb_0_saved = $_smarty_tpl->tpl_vars['_crumb'];
?>
	<?php if ($_smarty_tpl->tpl_vars['_crumb']->first) {?>
	  <div class="row">
	    <div class="col-md-12">
	      <ol class="breadcrumb">
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['_crumb']->last) {?>
		<li class="active"><?php echo $_smarty_tpl->tpl_vars['_crumb']->value['title'];?>
</li>
	    </ol>
	  </div>
	</div>
	<?php } else { ?>
		<li><a href="<?php echo $_smarty_tpl->tpl_vars['_crumb']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['_crumb']->value['title'];?>
</a></li>
	<?php }
$_smarty_tpl->tpl_vars['_crumb'] = $__foreach__crumb_0_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

<?php }
}
