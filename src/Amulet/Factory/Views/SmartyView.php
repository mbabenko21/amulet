<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 08.05.14 - {14:05}
 */

namespace Amulet\Factory\Views;


use Amulet\App;
use Amulet\Factory\Config\SmartyConfig;
use Amulet\Factory\Config\ViewConfig;
use Amulet\Service\ViewService;

class SmartyView extends \SmartyBC implements ViewService {
    public function __construct()
    {
        parent::__construct();
        /** @var $config SmartyConfig */
        $config = App::init()->configFactory("smarty");
        /** @var ViewConfig $viewConfig */
        $viewConfig = App::init()->configFactory("view");
        $TEMPLATE_DIR = implode(DIRECTORY_SEPARATOR, [$config->getTemplatesDir(), $viewConfig->getType()]);
        $this->setTemplateDir($TEMPLATE_DIR);
        $this->setCompileDir($config->getCompileDir());
        $this->setConfigDir($config->getConfigDir());
        $this->setCacheDir($config->getCacheDir());

        $this->caching = \Smarty::CACHING_OFF;

        $this->_registerAppFunctions();

        $this->assign("system_config", App::init()->configFactory("system"));
    }

    /**
     * @param string $template
     * @param array $data
     * @return void
     */
    public function render($template, array $data = [])
    {
        /** @var ViewConfig $viewConfig */
        $viewConfig = App::init()->configFactory("view");
        $template = implode("", [$template, $viewConfig->getExt()]);
        $views = $this->getTemplateDir();
        $this->assign($data);
        $this->display($template);
    }

    /**
     * @param null|string $template
     * @param array $data
     * @return string
     */
    public function load($template, $data = [])
    {
        /** @var ViewConfig $viewConfig */
        $viewConfig = App::init()->configFactory("view");
        $template = implode("", [$template, $viewConfig->getExt()]);
        return $this->fetch($template, $data);
    }

    /**
     * Функции шаблонизатора
     */
    private function _registerAppFunctions()
    {
        $this->register_function("route", array("Amulet\\Helper\\SmartyHelper", "generateUrl"));
    }
}