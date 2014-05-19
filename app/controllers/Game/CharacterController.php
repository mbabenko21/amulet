<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 14.05.14 - {17:57}
 */

namespace AmuletOfDragon\Controller\Game;


use Amulet\Controllers\InGameController;

class CharacterController extends InGameController {

    public function mainMenuAction()
    {
        $this->render("game/char/main_menu");
    }
} 