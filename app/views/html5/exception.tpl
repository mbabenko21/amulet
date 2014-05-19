{extends file="home.tpl"}
{block name="header_content"}
    <div class="upper">
        упс, ошибочка
    </div>
{/block}
{block name="content"}
    <div class="upper">
        <h1>Исключение</h1>
        <h3>{$error->getMessage()}</h3>
        <div class="breaker"><hr/></div>
    </div>
    <ul class="list">
        {foreach from=$error->getTrace() item=item}
            <li>
                {$item.class}{$item.type}{$item.function}<br/>
                at <strong>{$item.file} [line: {$item.line}]</strong>
            </li>
        {/foreach}
    </ul>
    <div class="upper">
        <a class="button button-success" href="{route id="home"}">на главную</a>
    </div>
{/block}