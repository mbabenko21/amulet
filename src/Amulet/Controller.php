<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 11.05.14 - {18:32}
 */

namespace Amulet;


use Amulet\Service\ViewService;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpFoundation\Response;

class Controller {
    /** @var  ContainerBuilder */
    protected $container;
    /** @var  ViewService */
    protected $view;
    /** @var  Response */
    protected $response;

    public function __construct()
    {
        $this->before();
    }

    /**
     * @param array $data
     * @return void
     */
    protected function json($data = [])
    {
        $this->response->headers->add(
            [
                "Content-Type" => "application/json"
            ]
        );
        $this->response->setContent(json_encode($data));
        $this->response->send();
    }
    /**
     * @param string $template
     * @param array $data
     * @return void
     */
    protected function render($template, $data = [])
    {
        $this->view->render($template, $data);
    }
    /**
     * @param string $id
     * @return object
     */
    public function get($id)
    {
        return $this->container->get($id);
    }

    protected function before()
    {
        $this->container = App::init()->getContainer();
        $this->view = $this->container->get("view");
        $this->response = new Response();
    }
} 