<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 15.05.14 - {0:07}
 */

namespace Amulet\Loader\JSON;


use Symfony\Component\Config\Loader\FileLoader;

class MapsJSONDataLoader extends FileLoader {

    /**
     * Loads a resource.
     *
     * @param mixed $resource The resource
     * @param string $type The resource type
     * @throws \InvalidArgumentException
     * @return mixed
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

        return json_decode(file_get_contents($path), true);
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