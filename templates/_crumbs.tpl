{foreach $_crumbs as $_crumb}
	{if $_crumb@first}
	  <div class="row">
	    <div class="col-md-12">
	      <ol class="breadcrumb">
	{/if}
	{if $_crumb@last}
		<li class="active">{$_crumb.title}</li>
	    </ol>
	  </div>
	</div>
	{else}
		<li><a href="{$_crumb.url}">{$_crumb.title}</a></li>
	{/if}
{/foreach}
