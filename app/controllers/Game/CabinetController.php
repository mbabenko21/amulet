<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 14.05.14 - {10:31}
 */

namespace AmuletOfDragon\Controller\Game;


use Amulet\App;
use Amulet\Controllers\InGameController;
use Amulet\Entity\Player;
use Amulet\Exception\PlayerServiceException;
use Amulet\Factory\Config\SystemConfig;
use Amulet\Service\AccountService;
use Amulet\Service\PlayerService;

class CabinetController extends InGameController
{
    /** @var  PlayerService */
    protected $_playerService;
    /** @var  AccountService */
    protected $_accountService;

    public function indexAction($ext)
    {
        $this->render("game/cabinet", [
            "account" => $this->account
        ]);
    }

    public function createPlayerAction($ext)
    {
        $newPlayerData = $this->request->get("newPlayer", []);
        /** @var $systemConfig SystemConfig */
        $systemConfig = App::init()->configFactory("system");
        if (count($newPlayerData) > 0) {
            try {
                $player = $this->_playerService->createPlayerFromData($newPlayerData);
                $this->account->addPlayer($player);
                $this->_accountService->persist($this->account);
                $this->redirect(
                    $this->generateUrl("cabinet", ["ext" => "html"])
                );
            } catch (PlayerServiceException $e) {
                $this->render("game/new_player", [
                    "account" => $this->account,
                    "errors" => [$e->getMessage()]
                ]);
            }
        } else {
            if ($this->account->getPlayers()->count() < $systemConfig->getMaxPlayersToAccount()) {
                $this->render("game/new_player", [
                    "account" => $this->account,
                    "errors" => []
                ]);
            } else {
                $this->redirect(
                    $this->generateUrl("cabinet", ["ext" => "html"])
                );
            }
        }
    }

    public function connectAction($playerId)
    {
        /** @var $player Player */
        $player = $this->_playerService->getRepository()->find($playerId);
        if ($this->_playerService->getRepository()->isPlayer($player, false)) {
            if ($this->account->getId() == $player->getAccount()->getId()) {
                $this->account->setCurrentPlayer($player);
                $this->_accountService->persist($this->account);
            }
        }
        $this->redirect($this->generateUrl("cabinet", ["ext" => "html"]));
    }

    public function removePlayerAction($playerId)
    {
        $playerTitle = $this->request->get("player_title", null);
        /** @var $player Player */
        $player = $this->_playerService->getRepository()->find($playerId);
        if ($this->_playerService->getRepository()->isPlayer($player, false)) {
            if (is_null($playerTitle)) {
                $this->render("game/remove_player", [
                    "removedPlayer" => $player
                ]);
            } elseif ($playerTitle == $player->getTitle()) {
                if ($this->account->getId() == $player->getAccount()->getId()) {
                    $this->_playerService->remove($player);
                }
                $this->redirect($this->generateUrl("cabinet", ["ext" => "html"]));
            } else {
                $this->render("game/remove_player", [
                    "removedPlayer" => $player,
                    "errors" => [
                        "вы ввели неверно имя"
                    ]
                ]);
            }
        } else {
            $this->redirect($this->generateUrl("cabinet", ["ext" => "html"]));
        }
    }

    protected function before()
    {
        parent::before();
        $this->_playerService = $this->get("player_service");
        $this->_accountService = $this->get("account_service");
    }
} 