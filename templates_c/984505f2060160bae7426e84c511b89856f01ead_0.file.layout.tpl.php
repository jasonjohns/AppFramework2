<?php
/* Smarty version 3.1.31, created on 2017-12-30 14:12:29
  from "/Users/jason/projects/reporting/templates/layout.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a47e51d8e6557_55135513',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '984505f2060160bae7426e84c511b89856f01ead' => 
    array (
      0 => '/Users/jason/projects/reporting/templates/layout.tpl',
      1 => 1514661085,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_crumbs.tpl' => 1,
    'file:_messages.tpl' => 1,
    'file:_paginate.tpl' => 1,
    'file:_js.tpl' => 1,
  ),
),false)) {
function content_5a47e51d8e6557_55135513 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $_smarty_tpl->tpl_vars['_app']->value['title'];
echo $_smarty_tpl->tpl_vars['_app']->value['title_separator'];
echo $_smarty_tpl->tpl_vars['_page']->value['title'];?>
</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <div class="page-header">
        <h1>
          <?php echo $_smarty_tpl->tpl_vars['_app']->value['title'];?>

          <small><?php echo $_smarty_tpl->tpl_vars['_page']->value['title'];?>
</small>
        </h1>
      </div>
    <?php $_smarty_tpl->_subTemplateRender("file:_crumbs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <?php $_smarty_tpl->_subTemplateRender("file:_messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['_template']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

      <?php if ($_smarty_tpl->tpl_vars['_needs_pagination']->value) {?>
      <div class="row">
          <div class="col-md-12">
            <?php $_smarty_tpl->_subTemplateRender("file:_paginate.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

          </div>
        </div>
      <?php }?>
    </div><!-- /.container -->
    <?php $_smarty_tpl->_subTemplateRender("file:_js.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  </body>
</html>
<?php }
}
