<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 14.05.14 - {17:57}
 */

namespace AmuletOfDragon\Controller;


use Amulet\Controller;

class ErrorsController extends Controller {
    public function error404Action()
    {
        $this->render("404");
    }

    public function error403Action()
    {
        $this->render("403");
    }
} 