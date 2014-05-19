<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 08.05.14
 * Time: 13:04
 */

namespace Amulet\Factory\Config;

/**
 * Class SystemConfig
 * @package Amulet\Factory\Config
 *
 * @property string app_name
 * @property string author
 * @property string version
 * @property string env
 * @property string cookie_name
 * @property int max_players_to_account
 */
class SystemConfig extends AbstractConfig {

    /**
     * @return mixed
     */
    public function getAppName()
    {
        return $this->app_name;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @return mixed
     */
    public function getEnv()
    {
        return $this->env;
    }

    /**
     * @return mixed
     */
    public function getCookieName()
    {
        return $this->cookie_name;
    }

    /**
     * @return mixed
     */
    public function getMaxPlayersToAccount()
    {
        return $this->max_players_to_account;
    }
}