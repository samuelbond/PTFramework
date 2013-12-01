<?php
/**
 * @author bond
 * copyright 12/1/13
 */

namespace controller;


use application\basecontroller;

class pagenotfoundController extends basecontroller {

    public function index(){
        echo "<h1>Error 404</h1><h2>Page not found</h2>";
    }

    public function controllerComponents()
    {
        return null;
    }

    public function showerror()
    {
        echo "<h1>404</h1>";
    }

}


