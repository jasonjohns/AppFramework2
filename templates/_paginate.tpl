{foreach $_pages as $_page}
    {if $_page@first}
        <ul class="pagination">
    {/if}
        <li {if $_page.class neq ''}class="{$_page.class}"{/if}><a href="{$_page.url}">{$_page.title}</a></li>
    {if $_page@last}
        </ul>
    {/if}
{/foreach}
