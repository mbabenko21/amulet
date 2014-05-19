<div class="player_list">
    <ul class="list">
        {if count($players) > 0}
            <div class="upper">ваши персонажи</div>
            <div class="breaker">
                <hr/>
            </div>
        {/if}
        {foreach from=$players item=player}
            <li>
                {include file="layout/player_in_cabinet.tpl"}
            </li>
        {/foreach}
    </ul>
</div>