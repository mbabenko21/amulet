{if isset($errors)}
<div class="errors">
    <ul class="errors">
    {foreach from=$errors item=error}
        <li>{$error}</li>
    {/foreach}
    </ul>
</div>
{/if}