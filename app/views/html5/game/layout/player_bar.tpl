{assign var="bar_life_width" value=($player->getCharOptions()->getLife()/$player->getCharOptions()->getMaxLife()*100)}
{assign var="bar_mana_width" value=($player->getCharOptions()->getEnergy()/$player->getCharOptions()->getMaxEnergy()*100)}
<div class="player-bar">
    <div class="player progressbar">
        <div class="text upper">жизнь: {$player->getCharOptions()->getLife()} / {$player->getCharOptions()->getMaxLife()}</div>
        <div class="player-wrap-life player-bar-wrap" style="width: {$bar_life_width}%"></div>
    </div>
    <br/>

    <div class="player progressbar">
        {if $player->getCharClass() eq 1}
            {assign var="classWrap" value="rage"}
            {assign var="wrapTitle" value="ярость"}
        {elseif $player->getCharClass() eq 2}
            {assign var="classWrap" value="mana"}
            {assign var="wrapTitle" value="мана"}
        {elseif $player->getCharClass() eq 3}
            {assign var="classWrap" value="energy"}
            {assign var="wrapTitle" value="энергия"}
        {/if}
        <div class="text upper">{$wrapTitle}: {$player->getCharOptions()->getEnergy()} / {$player->getCharOptions()->getMaxEnergy()}</div>
        <div class="player-wrap-{$classWrap} player-bar-wrap" style="width: {$bar_mana_width}%"></div>
    </div>
</div>