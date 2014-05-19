<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 13.05.14 - {23:08}
 */

namespace Amulet\Helper;


use Amulet\App;
use Symfony\Component\Routing\Router;

class SmartyHelper {
    public static function generateUrl($args)
    {
        $routeId = $args["id"];
        $params = [];
        if($args["params"])
        {
            $routeParams = explode(",", $args["params"]);
            foreach($routeParams as $parameter)
            {
                $data = explode(":", $parameter);
                $params[$data[0]] = $data[1];
            }
        }
        /** @var $router Router */
        $router = App::init()->get("router");
        $url = $router->generate($routeId, $params, Router::ABSOLUTE_PATH);
        return $url;
    }
} 