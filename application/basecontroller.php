<?php
/**
 * @author bond
 * copyright 12/1/13
 */

namespace application;


Abstract class basecontroller {

    protected $registry;

    public function __construct($registry)
    {
        $this->registry = $registry;
    }

    abstract public function index();

   abstract public function controllerComponents();


}