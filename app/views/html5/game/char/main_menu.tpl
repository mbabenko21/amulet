{extends file="home.tpl"}
{block name="header_content"}
    <div class="upper">{$player->getTitle()}</div>
{/block}
{block name="content"}
    {include "layout/char_links.tpl"}
    <div class="breaker"><hr /></div>

    {include "layout/char_footer.tpl"}
{/block}