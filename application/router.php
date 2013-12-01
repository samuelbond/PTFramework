<?php
/**
 * @author bond
 * copyright 12/1/13
 */

namespace application;


use exception\invalidpathException;

class router {

    private $registry;
    private $path;
    private $controller;
    private $action;
    private $componentPath;


    public function __construct($registry)
    {
        $this->registry = $registry;
    }

    public function setControllerPath($path)
    {

        if(!(is_dir($path)))
        {
            throw new invalidpathException("Invalid Path Exception\nInvalid Controller Path provided: ");
        }
        $this->path = $path;

    }

    public function setComponentPath($path)
    {

        if(!(is_dir($path)))
        {
            throw new invalidpathException("Invalid Path Exception\nInvalid ComponentPath provided: ");
        }
        $this->componentPath = $path;

    }

    public function loadController($route, $path, $componetpath)
    {
        try
        {
            $this->setControllerPath($path);
        }catch (\Exception $ex)
        {
            echo $ex->getMessage();
            return false;
        }

        $controllerFile = $this->getControllerReady($route);

        if(!is_readable($controllerFile)){
         $controllerFile = $this->path."pagenotfoundController.php";
         $this->controller = "pagenotfound";
        }

        include $controllerFile;

        $controllerClass = '\\controller\\'.$this->controller."Controller";
        $controllerClass = new $controllerClass($this->registry);

        if(!is_callable(array($controllerClass, $this->action)))
        {
            $controllerAction = "index";
        }
        else{
            $controllerAction = $this->action;
        }

        $controllerComponents = "controllerComponents";
        foreach($controllerClass->$controllerComponents() as $component)
        {
            $this->loadComponents($component, $componetpath);
        }

        $controllerClass->$controllerAction();
    }

    public function getControllerReady($route)
    {
        if(!empty($route))
        {
            $routeArray = explode("/", $route);
            $this->controller = $routeArray[0];
            if(isset($routeArray[1]))
            {
                $this->action = $routeArray[1];
            }
        }

        if(empty($this->controller))
        {
            $this->controller = "index";
        }

        if(empty($this->action))
        {
            $this->action = "index";
        }

        return $this->path.$this->controller."Controller.php";
    }

    public function loadComponents($components, $path)
    {
        try
        {
            $this->setComponentPath($path);
        }catch (\Exception $ex)
        {
            echo $ex->getMessage();
            return false;
        }

        $componentFile = $this->componentPath.$components."/".$components.".php";
        try{
        if(!is_readable($componentFile)){
            throw new \Exception("Invalid Component, Component not found");
        }
        }catch (\Exception $ex){
            echo $ex->getMessage();
            return false;
        }

        include $componentFile;


    }
}