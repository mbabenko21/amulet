{extends file="game/cabinet.tpl"}

{block name="content"}
    <form action="{route id="new_player" params="ext:html"}" method="post" id="new_player_form">
        <input type="text" name="newPlayer[title]" placeholder="Имя персонажа" class="field_input"><br/>
        <div class="breaker">
            <hr />
        </div>
        <div class="upper">пол</div>
        <input id="cfirst" type="radio" name="newPlayer[sex]" value="1" checked hidden />
        <label for="cfirst" class="upper">Муж</label>
        <br />
        <input id="csecond" type="radio" name="newPlayer[sex]" value="2" />
        <label for="csecond" class="upper">Жен</label>
        <br/><br/>
        <div class="upper">класс</div>
        <input id="c3" type="radio" name="newPlayer[class]" value="1" checked hidden/>
        <label for="c3" class="upper">воин</label>
        <br/>
        <input id="c4" type="radio" name="newPlayer[class]" value="2" />
        <label for="c4" class="upper">маг</label>
        <br/>
        <input id="c5" type="radio" name="newPlayer[class]" value="3" />
        <label for="c5" class="upper">лучник</label>
        <br/><br/>
        <div class="upper">сторона</div>
        <input id="c7" type="radio" name="newPlayer[side]" value="1" checked hidden/>
        <label for="c7" class="upper">свет</label>
        <input id="c8" type="radio" name="newPlayer[side]" value="2" />
        <label for="c8" class="upper">тьма</label>
        <div class="breaker">
            <hr />
        </div>
        <a href="#" class="button button-success" onclick="document.getElementById('new_player_form').submit(); return false;">Создать</a>
        <a href="{route id="cabinet" params="ext:html"}" class="button button-cancel">Кабинет</a>
    </form>
{/block}