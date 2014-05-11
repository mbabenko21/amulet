<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 08.05.14 - {14:03}
 */

namespace Amulet\Factory\Config;

/**
 * Class ViewConfig
 * @package Amulet\Factory\Config
 *
 * @property string engine
 * @property string type
 * @property string ext
 */
class ViewConfig extends AbstractConfig {

    /**
     * @return mixed
     */
    public function getEngine()
    {
        return $this->engine;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getExt()
    {
        return $this->ext;
    }
}