<?php

namespace App;

use App\Request;
use App\Router;

class Dispatcher
{
    private $request;

    public function dispatch()
    {
        $this->request = new Request();

        Router::parse($this->request->url, $this->request);

        $controller = $this->loadController();

        call_user_func_array([$controller, $this->request->action], $this->request->params);
    }

    public function loadController()
    {
        $name = ucfirst($this->request->controller) . "Controller";
        //$file = ROOT . 'Controllers/' . $name . '.php';  
        $file = 'App\\Controllers\\' . $name;
        //require($file);
        $controller = new $file();
        return $controller;
    }
}
