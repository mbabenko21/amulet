<?php

define("ROOT_DIR", __DIR__);
define("DATA_DIR", __DIR__."/data");
define("RES_DIR", __DIR__."/res");
define("APP_DIR", __DIR__."/app");

require ROOT_DIR."/vendor/autoload.php";

\Amulet\App::init()->setLocators(
    [
        "res_locator" => new \Symfony\Component\Config\FileLocator(RES_DIR),
        "data_locator" => new \Symfony\Component\Config\FileLocator(DATA_DIR),
        "entity_locator" => new \Symfony\Component\Config\FileLocator(DATA_DIR."/annotations")
    ]
);

