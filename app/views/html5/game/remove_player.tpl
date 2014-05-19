{extends file="game/cabinet.tpl"}

{block name="content"}
    <h3>
        Вы действительно хотите удалить этого игрока??
    </h3>
    <h3>
        Введите имя игрока <strong>{$removedPlayer->getTitle()}</strong>
    </h3>
    <form action="{route id="cb_remove_char" params="playerId:{$removedPlayer->getId()}"}" method="post" id="remove_player_form">
        <input type="text" name="player_title" placeholder="Имя персонажа" class="field_input"><br/>
        <a href="#" class="button button-cancel" onclick="document.getElementById('remove_player_form').submit(); return false;">удалить</a>
        <a href="{route id="cabinet"}" class="button button-success">в кабинет</a>
    </form>
{/block}