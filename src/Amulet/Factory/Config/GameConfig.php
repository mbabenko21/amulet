<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 08.05.14 - {13:33}
 */

namespace Amulet\Factory\Config;

/**
 * Class GameConfig
 * @package Amulet\Factory\Config
 *
 * @property int items_per_page
 * @property int life_per_second
 * @property int mana_per_second
 */
class GameConfig extends AbstractConfig {

    /**
     * @return mixed
     */
    public function getItemsPerPage()
    {
        return $this->items_per_page;
    }

    /**
     * @return mixed
     */
    public function getLifePerSecond()
    {
        return $this->life_per_second;
    }

    /**
     * @return mixed
     */
    public function getManaPerSecond()
    {
        return $this->mana_per_second;
    }
}