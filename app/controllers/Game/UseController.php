<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 15.05.14 - {19:45}
 */

namespace AmuletOfDragon\Controller\Game;


use Amulet\Controllers\InGameController;

class UseController extends InGameController
{

    public function useTownGatesAction($action, $townId)
    {
        if ($action == "open") {
            $location = $this->player->getCharOptions()->getLocation();
            $this->mapService->loadLoc($location);
            $mapData = $this->mapService->getMapData();
            if (isset($mapData["towns"][$location]) and $mapData["towns"][$location]["id"] == $townId) {
                $townLocation = implode(".", [$townId, $mapData["towns"][$location]["go_to"]]);
                $this->player->getCharOptions()->setTownLocation($townLocation);
            }
        } elseif($action == "close"){
            $this->player->getCharOptions()->setTownLocation(null);
        }
        $this->redirect($this->generateUrl("home"));
    }

    protected function before()
    {
        parent::before();
    }
} 