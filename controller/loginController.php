<?php
/**
 * @author bond
 * copyright 12/1/13
 */

namespace controller;


use application\basecontroller;
use usercomponent\usercomponent;

class loginController extends basecontroller{

    public function index(){
        echo "Login";

    }

    public function logout()
    {
        $usr = new usercomponent($this->registry);
        $usr->init();
        $usr->setUserid("QE76BV");
        $usr->getUser();
        $usr->setFirstname("Annik");
        $usr->setLastname("B");


        if($usr->editUser()){
            echo "Your ACCOUUNT was updated successful ".$usr->getFirstname();
        }
        else{
            echo "Updated failed";
        }

    }

    public function controllerComponents(){
        return array("usercomponent");
    }

}