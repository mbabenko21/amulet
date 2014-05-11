<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 08.05.14 - {13:58}
 */

namespace Amulet\Factory\Config;

/**
 * Class SmartyConfig
 * @package Amulet\Factory\Config
 *
 * @property string templates_dir
 * @property string cache_dir
 * @property string compile_dir
 * @property string config_dir
 */
class SmartyConfig extends AbstractConfig {

    /**
     * @return mixed
     */
    public function getTemplatesDir()
    {
        return $this->templates_dir;
    }

    /**
     * @return mixed
     */
    public function getCacheDir()
    {
        return $this->cache_dir;
    }

    /**
     * @return mixed
     */
    public function getCompileDir()
    {
        return $this->compile_dir;
    }

    /**
     * @return mixed
     */
    public function getConfigDir()
    {
        return $this->config_dir;
    }
}