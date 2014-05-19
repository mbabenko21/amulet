{assign var="bar_width" value=($player->getCharOptions()->getLife()/$player->getCharOptions()->getMaxLife()*100)}
<div class="player" id="player-{$player->getId()}"
     onclick="javascript: playerMenuInit({$player->getId()}); return;">
    <span class="player-title">
        <a href="#">{$player->getTitle()}</a>
    </span>
    <div class="player progressbar">
        <div class="player-wrap" style="width: {$bar_width}%"></div>
    </div>
</div>
<div class="upper player-menu hidden" id="player-{$player->getId()}-menu">
        <a class="button button-small button-black"
           href="{route id="game.attack" params="factory:player,id:{$player->getId()}"}">атаковать</a>
        <a class="button button-small button-black"
           href="{route id="game.info" params="factory:player,id:{$player->getId()}"}">инфо</a>
</div>