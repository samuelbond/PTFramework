<?php
/**
 * @author bond
 * copyright 12/1/13
 */

namespace controller;


use application\basecontroller;

class indexController extends basecontroller{

    public function index()
    {
      $this->registry->template->newvar = "yes i am a variable that is alive";
      $this->registry->template->loadview("index");
    }

    public function action2(){
        echo "Yes am second action";
    }
}