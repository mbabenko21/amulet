<?php
namespace Amulet;

use Amulet\Factory\Config\AbstractConfig;
use Amulet\Factory\ViewFactory;
use Amulet\Helper\StrHelper;
use Amulet\Loader\YAML\ConfigYamlLoader;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Router;

/**
 * Class App
 * @package Amulet
 */
class App
{
    protected static $init = null;
    /** @var ContainerBuilder */
    private $container = null;
    /** @var array  */
    protected $locators = [];

    /**
     * Запуск движка игры
     * @return void
     */
    public function run()
    {
    	$this->setContainer();
        $configLoader = new ConfigYamlLoader($this->locators["res_locator"]);
        $configLoader->load("config.yml");
        $this->container->set("config_loader", $configLoader);
        $view = ViewFactory::factory($configLoader->get("view")->getEngine());
        $this->container->set("view", $view);

        $this->_routing();
    }

    /**
     * [init description]
     * @return App
     */
    public static function init() {
        if (is_null(static::$init)) {
            static::$init = new self();
        }
        return static::$init;
    }

    /**
     * @param $configId
     * @return AbstractConfig
     */
    public function configFactory($configId)
    {
        return $this->get("config_loader")->get($configId);
    }

    /**
     * Gets the value of container.
     *
     * @return ContainerBuilder
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * @param $id
     * @return object
     */
    public function get($id)
    {
        return $this->container->get($id);
    }

    /**
     * Sets the value of container.
     *
     * @internal param mixed $container the container
     *
     * @return self
     */
    private function setContainer()
    {
    	$builder = new ContainerBuilder();
    	$locator = new FileLocator(RES_DIR);
    	$loader = new YamlFileLoader($builder, $locator);
    	$loader->load("services.yml");
        $this->container = $builder;

        return $this;
    }

    private function _routing()
    {
        $locator = $this->locators["res_locator"];
        $loader = new \Symfony\Component\Routing\Loader\YamlFileLoader($locator);
        $router = new Router($loader, "routes.yml");

        $matchRequest = $router->matchRequest(Request::createFromGlobals());
        $controllerData = $matchRequest["_controller"];
        $controller = StrHelper::parseClassAction($controllerData);
        $className = $controller[0];
        $methodName = $controller[1];
        if(class_exists($className)){
            $controller = new $className();
            if(method_exists($controller, $methodName)){
                foreach($matchRequest as $key => $value)
                {
                    if(substr($key, 0, 1) == "_"){
                        unset($matchRequest[$key]);
                    }
                }
                call_user_func_array(
                    [$controller, $methodName],
                    $matchRequest
                );
            }
        }
        return $this;
    }

    /**
     * @param array $locators
     */
    public function setLocators($locators)
    {
        $this->locators = $locators;
    }
}
