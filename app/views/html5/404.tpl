{extends file="home.tpl"}
{block name="header_content"}
    <div class="upper">
        упс, ошибочка
    </div>
{/block}
{block name="content"}
    <div class="upper">
        <h1>404</h1>
        <h3>Запрашиваемая страница не существует</h3>
        <a class="button button-success" href="{route id="home"}">на главную</a>
    </div>
{/block}