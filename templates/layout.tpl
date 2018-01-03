<!DOCTYPE html>
<html>
  <head>
    <title>{$_app.title}{$_app.title_separator}{$_page.title}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <div class="page-header">
        <h1>
          {$_app.title}
          <small>{$_page.title}</small>
        </h1>
      </div>
    {include file="_crumbs.tpl"}
    {include file="_messages.tpl"}
    {include file=$_template}
      {if $_needs_pagination}
      <div class="row">
          <div class="col-md-12">
            {include file="_paginate.tpl"}
          </div>
        </div>
      {/if}
    </div><!-- /.container -->
    {include file="_js.tpl"}
  </body>
</html>
