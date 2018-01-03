<?php
/* Smarty version 3.1.31, created on 2017-12-30 14:12:29
  from "/Users/jason/projects/reporting/templates/_messages.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a47e51d921bf2_19127512',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f48127d6adb88c079ea56e43f6170b35ed30b74e' => 
    array (
      0 => '/Users/jason/projects/reporting/templates/_messages.tpl',
      1 => 1514660973,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a47e51d921bf2_19127512 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['_errors']->value, '_e', true);
$_smarty_tpl->tpl_vars['_e']->iteration = 0;
$_smarty_tpl->tpl_vars['_e']->index = -1;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['_e']->value) {
$_smarty_tpl->tpl_vars['_e']->iteration++;
$_smarty_tpl->tpl_vars['_e']->index++;
$_smarty_tpl->tpl_vars['_e']->first = !$_smarty_tpl->tpl_vars['_e']->index;
$_smarty_tpl->tpl_vars['_e']->last = $_smarty_tpl->tpl_vars['_e']->iteration == $_smarty_tpl->tpl_vars['_e']->total;
$__foreach__e_1_saved = $_smarty_tpl->tpl_vars['_e'];
?>
  <?php if ($_smarty_tpl->tpl_vars['_e']->first) {?>
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-danger alert-dismissable">
          <h4>Looks like there was a problem...</h4>
  <?php }?>
            <p><?php echo $_smarty_tpl->tpl_vars['_e']->value;?>
</p>
  <?php if ($_smarty_tpl->tpl_vars['_e']->last) {?>
        </div>
      </div>
    </div>
  <?php }
$_smarty_tpl->tpl_vars['_e'] = $__foreach__e_1_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>


<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['_success']->value, '_s', true);
$_smarty_tpl->tpl_vars['_s']->iteration = 0;
$_smarty_tpl->tpl_vars['_s']->index = -1;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['_s']->value) {
$_smarty_tpl->tpl_vars['_s']->iteration++;
$_smarty_tpl->tpl_vars['_s']->index++;
$_smarty_tpl->tpl_vars['_s']->first = !$_smarty_tpl->tpl_vars['_s']->index;
$_smarty_tpl->tpl_vars['_s']->last = $_smarty_tpl->tpl_vars['_s']->iteration == $_smarty_tpl->tpl_vars['_s']->total;
$__foreach__s_2_saved = $_smarty_tpl->tpl_vars['_s'];
?>
  <?php if ($_smarty_tpl->tpl_vars['_s']->first) {?>
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-success alert-dismissable">
  <?php }?>
          <p><?php echo $_smarty_tpl->tpl_vars['_s']->value;?>
</p>
  <?php if ($_smarty_tpl->tpl_vars['_s']->last) {?>
        </div>
      </div>
    </div>
  <?php }
$_smarty_tpl->tpl_vars['_s'] = $__foreach__s_2_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>


<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['_info']->value, '_i', true);
$_smarty_tpl->tpl_vars['_i']->iteration = 0;
$_smarty_tpl->tpl_vars['_i']->index = -1;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['_i']->value) {
$_smarty_tpl->tpl_vars['_i']->iteration++;
$_smarty_tpl->tpl_vars['_i']->index++;
$_smarty_tpl->tpl_vars['_i']->first = !$_smarty_tpl->tpl_vars['_i']->index;
$_smarty_tpl->tpl_vars['_i']->last = $_smarty_tpl->tpl_vars['_i']->iteration == $_smarty_tpl->tpl_vars['_i']->total;
$__foreach__i_3_saved = $_smarty_tpl->tpl_vars['_i'];
?>
  <?php if ($_smarty_tpl->tpl_vars['_i']->first) {?>
  <div class="row">
    <div class="col-md-12">
      <div class="alert alert-info alert-dismissable">
  <?php }?>
        <p><?php echo $_smarty_tpl->tpl_vars['_i']->value;?>
</p>
  <?php if ($_smarty_tpl->tpl_vars['_i']->last) {?>
      </div>
    </div>
  </div>
  <?php }
$_smarty_tpl->tpl_vars['_i'] = $__foreach__i_3_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

<?php }
}
