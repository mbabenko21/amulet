<form action="{route id="login" params="ext:html"}" method="post" id="auth_form">
    <input type="text" name="loginForm[username]" placeholder="E-Mail" class="field_input"><br/>
    <input type="password" name="loginForm[password]" placeholder="Пароль" class="field_input"><br/>
    <input id="crem" type="checkbox" name="loginForm[remember]" checked hidden/>
    <label for="crem" class="upper">запомнить</label>
    <br/>
    <a href="#" class="button button-success" onclick="document.getElementById('auth_form').submit(); return false;">Вход</a>
</form>