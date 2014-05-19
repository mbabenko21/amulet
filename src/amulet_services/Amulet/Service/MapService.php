<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 14.05.14 - {22:25}
 */

namespace Amulet\Service;


interface MapService {
    /**
     * @param $locId
     * @return MapService
     */
    public function loadLoc($locId);

    /**
     * @internal param $locId
     * @return array
     */
    public function getDoors();

    /**
     * @return string
     */
    public function getZoneName();

    /**
     * @param string $locId
     * @return bool
     */
    public function exists($locId);

    /**
     * @return array
     */
    public function getMapData();


} 