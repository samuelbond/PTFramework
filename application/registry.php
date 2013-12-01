<?php
/**
 * @author bond
 * copyright 12/1/13
 */

namespace application;


class registry {

    private  $variables = array();


    public  function __set($index, $value){
        $this->variables[$index] = $value;
    }

    public function __get($index){
        return $this->variables[$index];
    }

}