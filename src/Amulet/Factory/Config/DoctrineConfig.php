<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 11.05.14 - {21:48}
 */

namespace Amulet\Factory\Config;

/**
 * Class DoctrineConfig
 * @package Amulet\Factory\Config
 * @property string factory
 * @property string annotations
 * @property bool is_dev_mode
 * @property string proxy_dir
 * @property string driver
 */
class DoctrineConfig extends AbstractConfig {

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
    public function getAnnotations()
    {
        return $this->annotations;
    }

    /**
     * @param mixed $annotations
     */
    public function setAnnotations($annotations)
    {
        $this->annotations = $annotations;
    }

    /**
     * @return mixed
     */
    public function getIsDevMode()
    {
        return $this->is_dev_mode;
    }

    /**
     * @return mixed
     */
    public function getProxyDir()
    {
        return $this->proxy_dir;
    }

    /**
     * @return mixed
     */
    public function getDriver()
    {
        return $this->driver;
    }
}