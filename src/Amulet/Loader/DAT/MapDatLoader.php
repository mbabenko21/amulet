<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 14.05.14 - {22:32}
 */

namespace Amulet\Loader\DAT;


use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Config\Loader\FileLoader;

class MapDatLoader extends FileLoader {

    /**
     * Loads a resource.
     *
     * @param mixed $resource The resource
     * @param string $type The resource type
     * @return array
     * @throws \InvalidArgumentException
     */
    public function load($resource, $type = null)
    {
        $path = $this->locator->locate($resource);
        if(!stream_is_local($path)){
            throw new \InvalidArgumentException(
                sprintf(
                    "%s is not local path",
                    $path
                )
            );
        }

        $map = file($path);
        $mp = [];
        foreach($map as $y)
        {
            $x = preg_split("/\t/", $y);
            $mp[] = str_replace("\n","", $x);
        }
        return $mp;
    }

    /**
     * Returns true if this class supports the given resource.
     *
     * @param mixed $resource A resource
     * @param string $type The resource type
     *
     * @return bool    true if this class supports the given resource, false otherwise
     */
    public function supports($resource, $type = null)
    {
        return true;
    }
}