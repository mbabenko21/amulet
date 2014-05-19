<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 19.05.14 - {10:39}
 */

namespace Amulet\Service;


interface AStarService {
    /**
     * @param string $startLoc
     * @param string $endLoc
     * @return AStarService
     */
    public function scan($startLoc, $endLoc);

    /**
     * @return array
     */
    public function getCloseList();

    /**
     * @param string $startLoc
     * @param string $endLoc
     * @return string
     */
    public function getNextLoc($startLoc, $endLoc);
} 