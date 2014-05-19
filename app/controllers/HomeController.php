<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 11.05.14 - {18:32}
 */

namespace AmuletOfDragon\Controller;


use Amulet\Controller;
use Amulet\Controllers\InGameController;

/**
 *
 * Class HomeController
 * @package AmuletOfDragon\Controller
 */
class HomeController extends InGameController {

    public function indexAction()
    {
        $this->render("home");
    }

    public function testAction($id)
    {
        $this->json(["id" => $id]);
    }

} 