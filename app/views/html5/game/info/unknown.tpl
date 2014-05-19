{extends file="home.tpl"}
{block name="header_content"}
    <div class="upper">ошибка</div>
{/block}
{block name="content"}
    <h3 class="red upper">{$error_message}</h3>
    <a href="{route id="game_main"}" class="button button-success">в игру</a>
{/block}