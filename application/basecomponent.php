<?php
/**
 * @author bond
 * copyright 12/1/13
 */

namespace application;


Abstract class basecomponent {

    protected  $registry;

    public function __construct($registry)
    {
        $this->registry = $registry;
    }

    abstract public function init();

    abstract public function __toString();


}