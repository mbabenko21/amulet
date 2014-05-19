<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 14.05.14 - {18:27}
 */

namespace Amulet\Controllers;


use Amulet\Controller;

class ExceptionsController extends Controller {
    public function errorAction(\Exception $error)
    {
        $this->render("exception", [
            "error" => $error
        ]);
    }
} 