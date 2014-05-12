<?php
namespace Amulet;

use Amulet\Factory\Config\AbstractConfig;
use Amulet\Factory\Config\AnnotationsFactory;
use Amulet\Factory\Config\DoctrineConfig;
use Amulet\Factory\ViewFactory;
use Amulet\Helper\StrHelper;
use Amulet\Loader\YAML\ConfigYamlLoader;
use Doctrine\Common\Persistence\Mapping\Driver\FileDriver;
use Doctrine\DBAL\Configuration;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\SimplifiedYamlDriver;
use Doctrine\ORM\Mapping\Driver\YamlDriver;
use Doctrine\ORM\Tools\Setup;
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
     * @param bool $console
     * @return void
     */
    public function run($console = false)
    {
    	$this->setContainer();
        $configLoader = new ConfigYamlLoader($this->locators["res_locator"]);
        $configLoader->load("config.yml");
        $this->container->set("config_loader", $configLoader);
        $view = ViewFactory::factory($configLoader->get("view")->getEngine());
        $this->container->set("view", $view);
        $this->_database();
        if($console == false)
        {
            $this->_routing();
        }
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

    /**
     * Routing
     * @return $this
     */
    private function _routing()
    {
        $locator = $this->locators["res_locator"];
        $loader = new \Symfony\Component\Routing\Loader\YamlFileLoader($locator);
        $router = new Router($loader, "routes.yml");
        $this->container->set("router", $router);
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
     * Database
     * @return $this
     */
    private function _database()
    {
        $configuration = new Configuration();
        /** @var $doctrineConfig DoctrineConfig */
        $doctrineConfig = $this->configFactory("doctrine");
        /** @var $annotations AnnotationsFactory */
        $annotations = $this->configFactory($doctrineConfig->getAnnotations());
        $config = Setup::createAnnotationMetadataConfiguration(
            [$annotations->getDir()],
            $doctrineConfig->getIsDevMode()
       );
        $config->setProxyDir($doctrineConfig->getProxyDir());

        $driverClass = $doctrineConfig->getDriver();
        /** @var $driver FileDriver */
        $driver = new $driverClass(
            $annotations->getDir(),
            $annotations->getExt()
        );

        $config->setMetadataDriverImpl($driver);

        $doctrineFactory = $doctrineConfig->getFactory();
        $conn = $this->configFactory($doctrineFactory)->export();
        $em = EntityManager::create($conn, $config);

        $this->container->set("entity_manager", $em);
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
