<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 08.05.14 - {13:42}
 */

require __DIR__."/../bootstrap.php";

echo \Amulet\App::init()->configFactory("system")->getVersion();