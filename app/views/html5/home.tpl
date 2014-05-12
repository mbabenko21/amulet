<!DOCTYPE html>
<html>
<head>
    <title>{$system_config->getAppName()}</title>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=PT+Sans:400,700,400italic&amp;subset=latin,cyrillic">
    <link rel="stylesheet" href="/public/css/default.css">
</head>
<body>
<div class="container">
    <div class="content">
        {block name="header"}
            {include file="header.tpl"}

        {/block}
        {block name="content"}{/block}
        {block name="footer"}

        {/block}
    </div>
</div>
</body>
</html>