{extends file="home.tpl"}

{block name="content"}
    <form action="{route id="registration" params="ext:html"}" method="post" id="reg_form">
        <input type="text" name="regForm[username]" placeholder="E-Mail" class="field_input"><br/>
        <input type="password" name="regForm[password]" placeholder="Пароль" class="field_input"><br/>

        <div class="breaker">
            <hr/>
        </div>
        <a href="#" class="button" onclick="document.getElementById('reg_form').submit(); return false;">Регистрация</a>
    </form>
    <a href="/" class="button">На главную</a>
{/block}