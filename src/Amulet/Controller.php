<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 11.05.14 - {18:32}
 */

namespace Amulet;


use Amulet\Factory\Config\SystemConfig;
use Amulet\Service\ViewService;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Router;

class Controller
{
    /** @var  ContainerBuilder */
    protected $container;
    /** @var  ViewService */
    protected $view;
    /** @var  Response */
    protected $response;
    /** @var  Router */
    protected $router;
    /** @var  Request */
    protected $request;

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
     *
     * @param $url
     * @param int $status
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirect($url, $status = 302)
    {
        $response = new RedirectResponse($url, $status);
        return $response->send();
    }

    public function generateUrl($routeId, $parameters = [], $refType = Router::ABSOLUTE_PATH)
    {
        return $this->router->generate($routeId, $parameters, $refType);
    }

    /**
     * @param string $id
     * @return object
     */
    public function get($id)
    {
        return $this->container->get($id);
    }

    public function _exceptionAction(\Exception $e)
    {
        $trace = $e->getTrace();
        /** @var $system SystemConfig */
        $system = App::init()->configFactory("system");
        if ($system->getEnv() == "development") {
            $this->render("exception", ["error" => $e]);
        } else {
            $this->render("404");
        }
    }

    public function after() {}

    protected function before()
    {
        $this->container = App::init()->getContainer();
        $this->view = $this->container->get("view");
        $this->response = new Response();
        $this->router = $this->container->get("router");
        $this->request = Request::createFromGlobals();
        set_exception_handler(array($this, "_exceptionAction"));
    }

    public function __destruct()
    {
        $this->after();
    }
} 