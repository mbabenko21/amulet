<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 08.05.14
 * Time: 12:51
 */

namespace Amulet\Factory\Config;


use Amulet\Helper\StrHelper;

class AbstractConfig
{
    /** @var array */
    protected $config;

    /**
     * @param array $config
     */
    public function __construct($config = [])
    {
        $this->config = $config;
    }

    public function __get($key)
    {
        return (isset($this->config[$key])) ? StrHelper::replaceKeyWords($this->config[$key]) : NULL;
    }

    public function __set($key, $value)
    {
        $this->config[$key] = $value;
    }

    public function __invoke($key)
    {
        return $this->__get($key);
    }
} 