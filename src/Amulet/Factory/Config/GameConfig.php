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
 * @property string start_loc
 * @property int journal_message_save_time
 * @property int time_online
 */
class GameConfig extends AbstractConfig {

    /**
     * @return int
     */
    public function getItemsPerPage()
    {
        return $this->items_per_page;
    }

    /**
     * @return int
     */
    public function getLifePerSecond()
    {
        return $this->life_per_second;
    }

    /**
     * @return int
     */
    public function getManaPerSecond()
    {
        return $this->mana_per_second;
    }

    /**
     * @return string
     */
    public function getStartLoc()
    {
        return $this->start_loc;
    }

    /**
     * @return int
     */
    public function getJournalMessageSaveTime()
    {
        return $this->journal_message_save_time;
    }

    /**
     * @return mixed
     */
    public function getTimeOnline()
    {
        return $this->time_online;
    }
}