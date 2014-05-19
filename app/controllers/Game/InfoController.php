<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 16.05.14 - {16:22}
 */

namespace AmuletOfDragon\Controller\Game;


use Amulet\Controllers\InGameController;
use Amulet\Entity\Player;

class InfoController extends InGameController
{
    const FACTORY_PLAYER = "player";
    public function factoryAction($factory, $id)
    {
        switch($factory){
            case self::FACTORY_PLAYER:
                $this->_player($id);
                break;
            default:
                $this->_unknown();
                break;
        }
    }

    private function _player($id)
    {
        /** @var $player Player */
        $player = $this->_playerService->getRepository()->find($id);
        if(!is_null($player) and (
                $player->getCharOptions()->getLocation() == $this->player->getCharOptions()->getLocation() or
                ($player->getCharOptions()->getTownLocation() == $this->player->getCharOptions()->getTownLocation() and
                    $player->getCharOptions()->getTownLocation() !== null)
            )){
            $this->render('game/info/player', [
                'targetPlayer' => $player
            ]);
        } else {
            $this->render('game/info/unknown', [
                "error_message" => "такого игрока нет рядом с вами"
            ]);
        }
    }
    /**
     * неизвестный тип
     */
    private function _unknown()
    {
        $this->render('game/info/unknown', [
            "error_message" => "информация недоступна"
        ]);
    }
} 