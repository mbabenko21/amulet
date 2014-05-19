
<ul class="list">
    {foreach from=$objects key=id item=object}
        <li>
            {if isset($object.on_use)}
                <a
                   href="{route id=$object.on_use.route params=$object.on_use.params}">{$object.name}</a>
            {else}
                <span class="upper bold">{$object.name}</span>
            {/if}
            {if isset($object.sub_name)}
                <span class="object-sub-name">[{$object.sub_name}]</span>
            {/if}
            {if isset($object.info)}
                <a class="object___menu-link bold button button-info button-small" id="object-menu-link-{$uniq_key}{$id}" href="#" onclick="objectInfoInit('{$uniq_key}{$id}');">?</a>
                <div class="object___menu hidden" id="object-menu-{$uniq_key}{$id}" class="hidden" onclick="objectInfoInit('{$uniq_key}{$id}');">{$object.info}</div>
            {/if}
        </li>
    {/foreach}
</ul>
