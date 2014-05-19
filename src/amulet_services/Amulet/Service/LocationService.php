<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 16.05.14 - {11:35}
 */

namespace Amulet\Service;


interface LocationService {
    /**
     * @param string $locId
     * @return array
     */
    public function getPlayerListInTravel($locId);

    /**
     * @param $locId
     * @return mixed
     */
    public function getPlayerListInTown($locId);

} 