{extends file="home.tpl"}

{block "header_content"}
    <div class="upper">
        <a href="{route id="game_character_menu"}">{$player->getTitle()}</a>, {$player->getCharOptions()->getLevel()}ур.
        <br/>
        {$map_data.map.name}&nbsp;|&nbsp;{$loc_name}
    </div>
{/block}

{block "content"}
    {include file="game/layout/player_bar.tpl"}
    {if $player->getPlayerOptions()->getLearning() eq 1 }
        <div class="learn">
            {include file="game/docs/begin.tpl"}
            <a href="{route id="game.settings.display_learning" params="option:0"}">отключить</a>
        </div>
    {/if}
    {include "game/layout/journal.tpl"}
    {if isset($map_data.gate)}
        {include "game/layout/town.tpl" town=$town action="close"}
    {/if}
    {*Объекты*}
    {if isset($map_data.map.static_objects[$player->getCharOptions()->getTownLocation()])}
        {include "game/layout/object_list.tpl" objects=$map_data.map.static_objects[$player->getCharOptions()->getTownLocation()] uniq_key="object"}
        {*<div class="breaker"><hr/></div>*}
    {/if}
    {*диалоги*}
    {if isset($map_data.map.dialogs[$player->getCharOptions()->getTownLocation()])}
        {*<div class="breaker"><hr/></div>*}
        {include "game/layout/object_list.tpl" objects=$map_data.map.dialogs[$player->getCharOptions()->getTownLocation()] uniq_key="dialog"}
    {/if}
    {*игроки*}
    {include "game/layout/player_list.tpl" player_list=$player_list}
    {*DOORS*}
    <div class="center">
        <div class="town-doors">
        {foreach from=$doors item=door}
            {*{$door.locId} - {$door.name}*}
            <a class="button button-small button-warning"
               href="{route id="game.town_move_char" params="locId:{$door.locId}"}">{$door.name}</a>
            <br/>
        {/foreach}
        </div>
    </div>
    <div class="breaker">
        <hr/>
    </div>
    <div class="upper">
        <a class="button button-info" href="{route id="game_main"}">обновить</a>
    </div>
    {include "game/layout/literal.tpl"}
{/block}