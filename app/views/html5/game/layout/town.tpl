<div class="town">
    <p>
        <strong class="upper">{$town.gates}</strong>
        <br/>
        {if isset($town.welcome) and $town.welcome != ""}
            На воротах написано: {$town.welcome}
        {/if}
    </p>
    <a class="upper non-underscore" href="{route id="game.use.town_gates" params="tid:{$town.id},action:{$action}"}">
        {if $action eq "open"}
            {if isset($town.open_phrase)}
                {$town.open_phrase}
                {else}
                войти в поселение
            {/if}
        {else}
            {if isset($town.close_phrase)}
                {$town.close_phrase}
            {else}
                выйти из поселения
            {/if}
        {/if}
    </a>
</div>