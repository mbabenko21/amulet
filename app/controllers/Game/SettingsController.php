<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 15.05.14 - {15:28}
 */

namespace AmuletOfDragon\Controller\Game;


use Amulet\Controllers\InGameController;
use Amulet\Service\PlayerService;

class SettingsController extends InGameController {
    /** @var  string  */
    protected $redirectRoute;
    public function displayMapAction($option, $redirectRoute)
    {
        $this->redirectRoute = $redirectRoute;
        if($option == PlayerService::OPTION_ON){
            $this->player->getPlayerOptions()->setDisplayMap(PlayerService::OPTION_ON);
        } else {
            $this->player->getPlayerOptions()->setDisplayMap(PlayerService::OPTION_OFF);
        }
    }

    public function displayLearningAction($option, $redirectRoute){
        $this->redirectRoute = $redirectRoute;
        if($option == PlayerService::OPTION_ON){
            $this->player->getPlayerOptions()->setLearning(PlayerService::OPTION_ON);
        } else {
            $this->player->getPlayerOptions()->setLearning(PlayerService::OPTION_OFF);
        }
    }

    public function after()
    {
        parent::after();
        $this->redirect($this->generateUrl($this->redirectRoute));
    }
} 