<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 08.05.14
 * Time: 12:42
 */

namespace Amulet\Loader\YAML;


use Amulet\Helper\StrHelper;
use Symfony\Component\Config\Loader\FileLoader;
use Symfony\Component\Yaml\Yaml;

class ConfigYamlLoader extends FileLoader {
    /** @var Yaml */
    private $_yamlParser = null;
    /** @var array  */
    protected $configs = [];

    /**
     * Loads a resource.
     *
     * @param mixed $file The resource
     * @param string $type The resource type
     * @return array
     * @throws \InvalidArgumentException
     */
    public function load($file, $type = null)
    {
        $path = $this->locator->locate($file);
        if(!stream_is_local($path)){
            throw new \InvalidArgumentException(
                sprintf(
                    "%s is not local path",
                    $path
                )
            );
        }

        if(is_null($this->_yamlParser))
        {
            $this->_yamlParser = new Yaml();
        }

        $data = $this->_yamlParser->parse(file_get_contents($path));
        $configs = [];
        foreach($data as $key => $value)
        {
            $className = "Amulet\\Factory\\Config\\".ucfirst(StrHelper::classify($key))."Config";
            if(class_exists($className)){
                $configs[$key] = new $className($value);
            }
        }
        $this->configs = $configs;
    }

    /**
     * @param string $id
     * @return object|NULL
     */
    public function get($id)
    {
        return isset($this->configs[$id]) ? $this->configs[$id] : NULL;
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