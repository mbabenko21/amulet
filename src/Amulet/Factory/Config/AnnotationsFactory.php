<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 11.05.14 - {22:02}
 */

namespace Amulet\Factory\Config;

/**
 * Class AnnotationsFactory
 * @package Amulet\Factory\Config
 *
 * @property string dir
 * @property string ext
 */
class AnnotationsFactory extends AbstractConfig {

    /**
     * @return mixed
     */
    public function getDir()
    {
        return [$this->dir => "Amulet\\Entity"];
    }

    /**
     * @return mixed
     */
    public function getExt()
    {
        return $this->ext;
    }
}