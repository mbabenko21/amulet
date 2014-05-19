{extends file="home.tpl"}

{block name="header_content"}
    <div class="upper">
        Добрый день,
        {if $account->getOptions()->getName() eq ""}
            {$account->getUsername()}
            {else}
            {$account->getOptions()->getName()}
        {/if}
    </div>
{/block}
{block name="content"}
    {include file="layout/player_list.tpl" players=$account->getPlayers()->toArray() cabinet=true}
    <div class="upper">
        <ul>
            {if $account->getPlayers()->count() lt $system_config->getMaxPlayersToAccount()}
                <li><a href="{route id="new_player" params="ext:html"}" class="button button-success">Новый персонаж</a></li>
            {/if}
            <li><a href="{route id="account_settings" params="ext:html"}" class="button">Настройки</a></li>
            <li><a href="{route id="logout"}" class="button button-cancel">Выход</a></li>
        </ul>
    </div>
{/block}