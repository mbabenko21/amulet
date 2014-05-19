<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru">
<head>
    <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8"/>
    <meta http-equiv="Cache-Control" content="image/png"/>
    <meta http-equiv="Cache-Control" content="image/jpeg"/>
    <meta http-equiv="Cache-Control" content="image/gif"/>
    <meta http-equiv="Cache-Control" content="image/x-portable-bitmap"/>
    <title>{$system_config->getAppName()}</title>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=PT+Sans:400,700,400italic&amp;subset=latin,cyrillic">
    <link rel="stylesheet" href="/public/css/default.css">
    <link href="favicon.ico" rel="icon" type="image/x-icon" />
</head>
<body>
<div class="container">
    <div class="content">
        {block name="header"}
            {include file="layout/header.tpl"}
        {/block}
        {block name="errors"}
            {include file="layout/errors.tpl"}
        {/block}
        <div class="wraper">
            {block name="content"}
                {include file="layout/login_form.tpl"}
                <div class="breaker">
                    <hr/>
                </div>
                <a href="{route id="registration" params="ext:html"}" class="button">Регистрация</a>
            {/block}
        </div>
        {block name="footer"}
            {include file="layout/footer.tpl"}
        {/block}
    </div>
</div>
</body>
</html>