<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 08.05.14 - {14:04}
 */

namespace Amulet\Factory;


use Amulet\Helper\StrHelper;

class ViewFactory {
    public static function factory($engine)
    {
        $className = "Amulet\\Factory\\Views\\".ucfirst(StrHelper::classify($engine))."View";
        if(!class_exists($className)){
            throw new \InvalidArgumentException(
                sprintf(
                    "View engine %s not found",
                    $engine
                )
            );
        }
        return new $className();
    }
} 