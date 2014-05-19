{extends file="home.tpl"}
{block name="header_content"}
    <div class="upper">Об игроке</div>
{/block}
{block name="content"}
    {assign var="in_game" value=(($smarty.now-$targetPlayer->getCreateTime())/86400)|ceil}
    {assign var="charClass" value=$targetPlayer->getCharClass()}
    <div class="upper">{$targetPlayer->getTitle()}</div>
    <div class="lower">
        {if $targetPlayer->getSex() eq 1}
        парень
        {else}
        девушка
        {/if},
        в игре {$in_game} дн.
        <br/>

        <div class="upper">
            <span>
            {if $charClass eq 1}
                воин
                {elseif $charClass eq 2}
                маг
                {elseif $charClass eq 3}
                лучник
                {else}
                неизв. класс
            {/if}
            </span>
            <span>, {$targetPlayer->getCharOptions()->getLevel()}ур</span>
            <span>,
                {if $targetPlayer->getCharSide() eq 1}
                    империя рассвета
                {elseif $targetPlayer->getCharSide() eq 2}
                    империя заката
                {/if}
            </span>
        </div>
    </div>
    <div class="small-font">
        cила <span class="red bold">{$targetPlayer->getBaseStats()->getStrenge()}</span>,
        ловкость <span class="red bold">{$targetPlayer->getBaseStats()->getDexterity()}</span>,
        интеллект <span class="red bold">{$targetPlayer->getBaseStats()->getIntellegence()}</span>,
        сноровка <span class="red bold">{$targetPlayer->getBaseStats()->getAgility()}</span>
        <br/>
        живучесть <span class="red bold">{$targetPlayer->getBaseStats()->getHealth()}</span>
        {if $targetPlayer->getCharClass() eq 2}
        , воля <span class="red bold">{$targetPlayer->getBaseStats()->getWill()}</span>
        {/if}
    </div>
    <div class="breaker"><hr/></div>
    <a href="{route id="game_main"}" class="button button-success">в игру</a>
{/block}