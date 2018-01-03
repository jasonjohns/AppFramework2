{foreach $_errors as $_e}
  {if $_e@first}
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-danger alert-dismissable">
          <h4>Looks like there was a problem...</h4>
  {/if}
            <p>{$_e}</p>
  {if $_e@last}
        </div>
      </div>
    </div>
  {/if}
{/foreach}

{foreach $_success as $_s}
  {if $_s@first}
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-success alert-dismissable">
  {/if}
          <p>{$_s}</p>
  {if $_s@last}
        </div>
      </div>
    </div>
  {/if}
{/foreach}

{foreach $_info as $_i}
  {if $_i@first}
  <div class="row">
    <div class="col-md-12">
      <div class="alert alert-info alert-dismissable">
  {/if}
        <p>{$_i}</p>
  {if $_i@last}
      </div>
    </div>
  </div>
  {/if}
{/foreach}
