<div class="player player-side-{$player->getCharSide()}">
    <div class="class-icon">
        <div class="__class{$player->getCharClass()}-icon base{$player->getCharClass()}"></div>
    </div>
    <div class="player-info">
                        <span>
                        {if $cabinet eq true}<a
                                    href="{route id="connect_game" params="playerId:{$player->getId()}"}"> {/if}
                                {*player name*}
                                {include file="layout/player_wrap.tpl"}
                                {if $cabinet eq true} </a>{/if}
                        </span>
        <span class="upper">ур: {$player->getCharOptions()->getLevel()}</span>
        <span class="upper">оп: {$player->getCharOptions()->getExperience()} / {$player->getCharOptions()->getNeedExperience()}</span>
    </div>
    <div class="in-game">
                        <span class="upper">
                             <a class="button button-success"
                                href="{route id="connect_game" params="playerId:{$player->getId()}"}">в игру</a>
                            <a class="button button-cancel"
                               href="{route id="cb_remove_char" params="playerId:{$player->getId()}"}">удалить</a>
                        </span>
    </div>
</div>