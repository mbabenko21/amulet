{extends file="home.tpl"}

{block "header_content"}
    <div class="upper">
        поз:{$pos.x}/{$pos.y}, {$area.name}
    </div>
{/block}

{block name="content"}
    {include file="game/layout/player_bar.tpl"}
    {if $player->getPlayerOptions()->getLearning() eq 1 }
        <div class="learn">
            {include file="game/docs/begin.tpl"}
            <a href="{route id="game.settings.display_learning" params="option:0"}">отключить</a>
        </div>
    {/if}
    {include "game/layout/journal.tpl"}
    {if isset($map_data.towns[$player->getCharOptions()->getLocation()])}
        {include "game/layout/town.tpl" town=$map_data.towns[$player->getCharOptions()->getLocation()] action="open"}
    {/if}
    <div id="target-goal" class="hidden"></div>
    {*Диалоги*}
    {if isset($map_data.dialogs[$player->getCharOptions()->getLocation()])}
        {include "game/layout/object_list.tpl" objects=$map_data.dialogs[$player->getCharOptions()->getLocation()] uniq_key="dialog"}
        {*<div class="breaker"><hr/></div>*}
    {/if}
    {*Статические предметы*}
    {if isset($map_data.static_objects[$player->getCharOptions()->getLocation()])}
        {include "game/layout/object_list.tpl" objects=$map_data.static_objects[$player->getCharOptions()->getLocation()] uniq_key="obj"}
        {*<div class="breaker">
            <hr/>
        </div>*}
    {/if}
    {*КАРТА*}
    {*{if $player->getPlayerOptions()->getDisplayMap() eq 1}
        <img src="{route id="game.map"}" alt="map"/>
        <div class="upper">
            <a href="{route id="game.settings.display_map" params="option:0"}">скрыть</a>
        </div>
        {else}
        <div class="upper">
            <a href="{route id="game.settings.display_map" params="option:1"}">карта</a>
        </div>
    {/if}*}
    {*игроки*}
    {include "game/layout/player_list.tpl" player_list=$player_list}
    {if isset($doors.nord)}
        <a class="upper button button-black"
           href="{route id="game.move_char" params="locId:{$doors.nord.locId}"}">с &DoubleUpArrow;</a>
        <br/>
    {/if}
    {if isset($doors.west) or isset($doors.east)}
        {if isset($doors.west)}
        <a class="upper button button-black"
           href="{route id="game.move_char" params="locId:{$doors.west.locId}"}">&DoubleLeftArrow; з</a>
        {/if}
        {if isset($doors.east)}
            <a class="upper button button-black"
               href="{route id="game.move_char" params="locId:{$doors.east.locId}"}">в &DoubleRightArrow;</a>
            <br/>
            {else}
            <br/>
        {/if}
    {/if}
    {if isset($doors.south)}
        <a class="upper button button-black"
           href="{route id="game.move_char" params="locId:{$doors.south.locId}"}">ю &DoubleDownArrow;</a>
        <br/>
    {/if}
    {*{foreach from=$doors key=id item=door}
        *}{*{$door.locId} - {$door.name}*}{*
        <a class="button button-black"
           href="{route id="game.move_char" params="locId:{$door.locId}"}">{$door.name} - {$id}</a>
    {/foreach}*}
    <div class="breaker">
        <hr/>
    </div>
    <div class="upper">
        <a class="button button-small button-info" href="{route id="game_main"}">обновить</a>
        <br/>
        <a class="button button-small button-info" href="{route id="game_character_menu"}">меню</a>
    </div>
    {include "game/layout/literal.tpl"}
    {literal}
        <script type="text/javascript">
            <!--
            window.onload = function () {
                var shownJournal = document.getElementById('journal-shown').innerHTML;
                if (shownJournal == '1') {
                    showJournal();
                } else {
                    hideJournal();
                }
                this.event.preventDefault();
                return 1;
            };
            // -->
        </script>
    {/literal}
{/block}