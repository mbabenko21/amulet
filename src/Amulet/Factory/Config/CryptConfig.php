<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 12.05.14 - {15:49}
 */

namespace Amulet\Factory\Config;

/**
 * Class CryptConfig
 * @package Amulet\Factory\Config
 *
 * @property string factory
 * @property string key
 */
class CryptConfig extends AbstractConfig {

    /**
     * @return mixed
     */
    public function getFactory()
    {
        return $this->factory;
    }

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }
}