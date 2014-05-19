<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 14.05.14 - {0:32}
 */

namespace Amulet\Controllers;


use Amulet\Entity\Player;
use Amulet\Service\MapService;
use Amulet\Service\PlayerService;

class InGameController extends AutentificatedController
{
    /** @var  Player */
    protected $player;
    /** @var  MapService */
    protected $mapService;
    /** @var  PlayerService */
    protected $_playerService;

    public function render($template, $data = [])
    {
        $data["player"] = $this->player;
        parent::render($template, $data);
    }

    protected function before()
    {
        parent::before();
        $this->_playerService = $this->get("player_service");
        $this->mapService = $this->get("map_service");
        $player = $this->account->getCurrentPlayer();
        if (!is_null($player)) {
            $this->player = $this->account->getCurrentPlayer();
            $url = $this->request->getPathInfo();
            $match = $this->router->matchRequest($this->request);
            if (substr($match["_route"], 0, 4) != "game") {
                $this->redirect(
                    $this->generateUrl("game_main", ["ext" => "html"])
                );
            }
        } else {
            $url = $this->request->getPathInfo();
            $match = $this->router->matchRequest($this->request);
            $cb = substr($match["_route"], 0, 2);
            $isRedirect = $this->_isRedirect();
            if ($isRedirect === false and $cb != "cb") {
                $this->redirect(
                    $this->generateUrl("cabinet", ["ext" => "html"])
                );
            }
        }
    }

    /**
     * @return bool
     */
    protected function _isRedirect()
    {
        $baseData = ["ext" => "html"];
        $isRedirect = false;
        $url = $this->request->getPathInfo();
        $excludeUrls = [
            $this->generateUrl("cabinet", $baseData),
            $this->generateUrl("account_settings", $baseData),
            $this->generateUrl("new_player", $baseData)
        ];
        foreach ($excludeUrls as $excludeUrl) {
            if ($excludeUrl == $url) {
                $isRedirect = true;
            }
        }
        return $isRedirect;
    }

    public function after()
    {
        parent::after();
        $this->player->getCharOptions()->setLastAction(time());
        $this->_playerService->clearTimers($this->player);
        $this->_playerService->clearJournal($this->player);
        $this->_playerService->commit($this->player);
    }
} 