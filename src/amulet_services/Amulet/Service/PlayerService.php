<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 12.05.14 - {14:51}
 */

namespace Amulet\Service;


use Amulet\Entity\Player;
use Doctrine\Common\Persistence\ObjectRepository;

interface PlayerService extends Repositoreble {
    const SEX_MALE = "m";
    const SEX_FEMALE = "f";

    const CLASS_WARRIOR = 1;
    const CLASS_RANGER = 3;
    const CLASS_MAGE = 2;
    const CLASS_PRIEST = 4;

    const SIDE_DARK = 1;
    const SIDE_LIGHT = 2;

    const OPTION_ON = 1;
    const OPTION_OFF = 0;

    const IN_TOWN = "town_location";
    const IN_TRAVEL = "location";

    /**
     * @param array $data
     * @return Player
     */
    public function createPlayerFromData(array $data);

    /**
     * Сохранение игрока
     * @param Player $player
     * @return void
     */
    public function commit(Player $player);

    /**
     * @param Player $player
     * @return void
     */
    public function remove(Player $player);

    /**
     * @return PlayerRepository|ObjectRepository
     */
    public function getRepository();

    /**
     * @param \Amulet\Entity\Player $player
     * @param string $timerId
     * @param int $time
     * @return Player
     */
    public function setCoolDown(Player $player, $timerId, $time = 1);

    /**
     * @param \Amulet\Entity\Player $player
     * @param string $timerId
     * @return int
     */
    public function getCoolDown(Player $player, $timerId);

    /**
     * @param \Amulet\Entity\Player $player
     * @return Player
     */
    public function clearTimers(Player $player);

    /**
     * @param Player $player
     * @param string $message
     * @return Player
     */
    public function addMessageToJournal(Player $player, $message);

    /**
     * @param Player $player
     * @return Player
     */
    public function clearJournal(Player $player);

    /**
     * @param Player $player
     * @param int $exp
     * @return Player
     */
    public function addExperience(Player $player, $exp);
} 