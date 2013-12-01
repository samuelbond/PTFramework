<?php
/**
 * @author bond
 * copyright 12/1/13
 */

namespace controller;


use application\basecontroller;

class loginController extends basecontroller{

    public function index(){
        echo "Login";

    }

    public function logout(){
        echo "Logout";
    }

}