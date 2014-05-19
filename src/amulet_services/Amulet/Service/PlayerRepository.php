<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 12.05.14 - {14:56}
 */

namespace Amulet\Service;


use Amulet\Entity\Player;

interface PlayerRepository {


    /**
     * @param string $title
     * @return Player
     */
    public function findByTitle($title);

    /**
     * @param string $locId
     * @param string $filter
     * @return array
     */
    public function getPlayersByLocId($locId, $filter);
    /**
     * @param $player
     * @param bool $throw
     * @return bool
     */
    public function isPlayer($player, $throw = true);
} 