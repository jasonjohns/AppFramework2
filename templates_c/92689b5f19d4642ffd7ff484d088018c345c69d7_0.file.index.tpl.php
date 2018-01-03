<?php
/* Smarty version 3.1.31, created on 2017-12-31 15:19:56
  from "/Users/jason/projects/reporting/templates/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a49466cb0c7b7_76905455',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '92689b5f19d4642ffd7ff484d088018c345c69d7' => 
    array (
      0 => '/Users/jason/projects/reporting/templates/index.tpl',
      1 => 1514751594,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a49466cb0c7b7_76905455 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_checkbox_list')) require_once '/Users/jason/projects/reporting/lib/helpers/function.checkbox_list.php';
if (!is_callable('smarty_function_radio_list')) require_once '/Users/jason/projects/reporting/lib/helpers/function.radio_list.php';
if (!is_callable('smarty_function_input_field')) require_once '/Users/jason/projects/reporting/lib/helpers/function.input_field.php';
if (!is_callable('smarty_function_textarea')) require_once '/Users/jason/projects/reporting/lib/helpers/function.textarea.php';
if (!is_callable('smarty_function_select')) require_once '/Users/jason/projects/reporting/lib/helpers/function.select.php';
if (!is_callable('smarty_function_checkbox')) require_once '/Users/jason/projects/reporting/lib/helpers/function.checkbox.php';
if (!is_callable('smarty_function_submit')) require_once '/Users/jason/projects/reporting/lib/helpers/function.submit.php';
?>
<h2>Your code goes here.</h2>
<form method="post" action="index.php">
        <?php echo smarty_function_checkbox_list(array('options'=>$_smarty_tpl->tpl_vars['genders']->value,'name'=>"gender3",'inline'=>"false"),$_smarty_tpl);?>

        <?php echo smarty_function_radio_list(array('options'=>$_smarty_tpl->tpl_vars['genders']->value,'name'=>"gender4",'inline'=>true),$_smarty_tpl);?>

        <?php echo smarty_function_input_field(array('name'=>"email",'type'=>"email",'help'=>"a valid email address",'required'=>true),$_smarty_tpl);?>

        <?php echo smarty_function_input_field(array('name'=>"first_name",'type'=>"text",'help'=>"your first name"),$_smarty_tpl);?>

        <?php echo smarty_function_input_field(array('name'=>"last_name",'type'=>"text"),$_smarty_tpl);?>

        <?php echo smarty_function_textarea(array('name'=>"description",'help'=>"some help text",'required'=>true),$_smarty_tpl);?>

        <?php echo smarty_function_select(array('name'=>"gender",'options'=>$_smarty_tpl->tpl_vars['genders']->value,'help'=>"Select your gender",'required'=>true),$_smarty_tpl);?>

        <?php echo smarty_function_checkbox(array('name'=>"accept_terms",'help'=>"whatever"),$_smarty_tpl);?>

        <?php echo smarty_function_submit(array('class'=>"primary"),$_smarty_tpl);?>

</form>
<?php }
}
