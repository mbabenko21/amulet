<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 11.05.14 - {21:42}
 */

namespace Amulet\Factory\Config;
use Amulet\Service\ExportableInterface;

/**
 * Class DoctrineConfig
 * @package Amulet\Factory\Config
 *
 * @property string driver
 * @property string user
 * @property string password
 * @property string path
 * @property bool memory
 */
class SqliteConfig extends AbstractConfig implements ExportableInterface {

    /**
     * @return mixed
     */
    public function getDriver()
    {
        return $this->driver;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return mixed
     */
    public function getMemory()
    {
        return $this->memory;
    }

    /**
     * @return array
     */
    public function export()
    {
        return [
            "driver"    => $this->getDriver(),
            "user"      => $this->getUser(),
            "password"  => $this->getPassword(),
            "path"      => $this->getPath(),
            "memory"    => $this->getMemory()
        ];
    }
}