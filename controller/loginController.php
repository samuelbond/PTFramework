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
        $usr->setFirstname("Aniko");
        $usr->setLastname("Bond");
        $usr->setAddress("Petofi Ter");
        $usr->setCity("Debrecen");
        $usr->setCountry("Hungary");
        $usr->setEmail("aniko@example.com");
        $usr->setLandline("086566554");
        $usr->setMobile("06755677898");
        $usr->setUserid("QE76BV");

        if($usr->registerNewUser()){
            echo "Your Registration was successful ".$usr->getFirstname();
        }
        else{
            echo "Registration failed";
        }

    }

    public function controllerComponents(){
        return array("usercomponent");
    }

}