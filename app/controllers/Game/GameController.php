<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 14.05.14 - {14:41}
 */

namespace AmuletOfDragon\Controller\Game;


use Amulet\Controllers\InGameController;
use Amulet\Service\MapService;
use Amulet\Service\MapServiceImpl;
use Amulet\Service\PlayerService;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManagerStatic;

class GameController extends InGameController
{
    /** @var  MapService */
    protected $townService;

    public function indexAction()
    {
        $inTown = $this->player->getCharOptions()->getTownLocation();
        if (!is_null($inTown)) {
            $this->inTown();
        } else {
            $this->inTravel();
        }
    }

    private function inTown()
    {
        $doors = $this->townService->getDoors();
        $playersList = $this->_playerService->getRepository()->getPlayersByLocId($this->player->getCharOptions()->getTownLocation(), PlayerService::IN_TOWN);
        $mapData = $this->townService->getMapData();
        $this->render("game/town", [
            "doors" => $doors,
            "map_data" => $mapData,
            "town" => $mapData["map"],
            "player_list" => $playersList,
            "loc_name" => $this->townService->getZoneName()
        ]);
    }

    private function inTravel()
    {
        $learning = $this->player->getPlayerOptions()->getLearning();
        $doors = $this->mapService->getDoors();
        $locIdData = $this->mapService->getLocIdData();
        $mapData = $this->mapService->getMapData();
        $data = [];
        if ($learning == PlayerService::OPTION_ON) {
            $learning = $this->view->load("game/docs/" . $this->player->getPlayerOptions()->getLearningAction());
            $data = [
                "learning" => $learning,
            ];
        }
        $data["pos"] = [
            "x" => $locIdData["x"],
            "y" => $locIdData["y"]
        ];
        $data["doors"] = $doors;
        $data["map_data"] = $this->mapService->getMapData();
        $data["player_list"] = $this->_playerService->getRepository()->getPlayersByLocId($this->player->getCharOptions()->getLocation(), PlayerService::IN_TRAVEL);
        $data["area"] = $this->mapService->getArea($this->player->getCharOptions()->getLocation());
        $this->render("game/travel", $data);
    }

    public function mapAction()
    {
        $loc = explode(".", $this->player->getCharOptions()->getLocation());
        $imgname = "http://" . $this->request->server->get("SERVER_NAME") . "/public/img/maps/" . $loc[0] . ".png";
        $this->response->headers->add([
            "Content-Type" => "image/png"
        ]);
        $this->response->sendHeaders();
        $im = @imagecreatefrompng($imgname);
        list($width, $height) = getimagesize($imgname);
        $newwidth = $width * 0.1;
        $newheight = $height * 0.1;
        /* Если не удалось */
        if (!$im) {
            /* Создаем пустое изображение */
            $im = imagecreatetruecolor(150, 30);
            $bgc = imagecolorallocate($im, 255, 255, 255);
            $tc = imagecolorallocate($im, 0, 0, 0);

            imagefilledrectangle($im, 0, 0, 150, 30, $bgc);

            /* Выводим сообщение об ошибке */
            imagestring($im, 1, 5, 5, 'Failed load map ' . $imgname, $tc);
        }
        $playerColor = imagecolorallocate($im, 192, 0, 53);
        $y = $loc[1] * 50;
        $x = $loc[2] * 50;
        imagefilledellipse($im, $x + 25, $y + 25, 50, 50, $playerColor);
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        imagecopyresized($thumb, $im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
        imagepng($thumb);
        imagedestroy($im);
        imagedestroy($thumb);
    }

    public function moveCharAction($locId)
    {
        if ($this->mapService->exists($locId)) {
            $this->player->getPlayerOptions()->setDialogId(null);
            $doors = $this->mapService->getDoors();
            $hasMove = false;
            $doorId = "";
            foreach ($doors as $key => $door) {
                if ($door["locId"] == $locId) {
                    $hasMove = true;
                    switch ($key) {
                        case "nord":
                            $doorId = "на север";
                            break;
                        case "west":
                            $doorId = "на запад";
                            break;
                        case "east":
                            $doorId = "на восток";
                            break;
                        case "south":
                            $doorId = "на юг";
                            break;
                        default:
                            $doorId = $key;
                            break;
                    }
                }
            }
            if ($hasMove === true) {
                $oldPlayerList = $this->_playerService->getRepository()->getPlayersByLocId($this->player->getCharOptions()->getLocation(), PlayerService::IN_TRAVEL);
                foreach ($oldPlayerList as $oldPlayer) {
                    if ($oldPlayer->getId() != $this->player->getId()) {
                        $mess = ["", "ушел", "ушла"];
                        $this->_playerService->addMessageToJournal($oldPlayer,
                            sprintf("%s %s %s", $this->player->getTitle(), $mess[$this->player->getSex()], $doorId)
                        );
                        $this->_playerService->commit($oldPlayer);
                    }
                }
                $this->player->getCharOptions()->setLocation($locId);
                $newPlayerList = $this->_playerService->getRepository()->getPlayersByLocId($this->player->getCharOptions()->getLocation(), PlayerService::IN_TRAVEL);
                foreach ($newPlayerList as $newPlayer) {
                    if ($newPlayer->getId() != $this->player->getId()) {
                        $mess = ["", "пришел", "пришла"];
                        $this->_playerService->addMessageToJournal($newPlayer,
                            sprintf("%s %s", $mess[$this->player->getSex()], $this->player->getTitle())
                        );
                        $this->_playerService->commit($newPlayer);
                    }
                }
            } else {
                $this->_playerService->addMessageToJournal($this->player, "некуда идти");
            }
            //$this->_playerService->addMessageToJournal($this->player, "Тестовое сообщение");
            $this->before();
        }
        //$this->redirect($this->generateUrl("game_main"));
        $this->inTravel();
    }

    public function moveInTownAction($locId)
    {
        if ($this->townService->exists($locId)) {
            $this->player->getCharOptions()->setTownLocation($locId);
            $this->before();
        }
        $this->inTown();
    }

    public function disconnectAction()
    {
        $this->account->setCurrentPlayer(null);
        $this->_accountService->persist($this->account);
        $this->redirect($this->generateUrl("home"));
    }

    protected function before()
    {
        parent::before();
        $this->townService = $this->get("town_service");
        if (is_null($this->player->getCharOptions()->getTownLocation())) {
            $this->mapService->loadLoc($this->player->getCharOptions()->getLocation());
        } else {
            $this->townService->loadLoc($this->player->getCharOptions()->getTownLocation());
        }
    }
} 