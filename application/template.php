<?php
/**
 * @author bond
 * copyright 12/1/13
 */

namespace application;


use exception\invalidpathException;
use exception\templateException;

class template {

    private $registry;
    private $variables = array();
    private $path;

    public function __construct($registry)
    {
        $this->registry = $registry;
    }


    public function setViewPath($path)
    {
        try
        {
        if(!(is_dir($path)))
        {
            throw new invalidpathException("Invalid Path Exception Invalid View Path provided: ");
        }
        $this->path = $path;
        }catch (\Exception $ex)
        {
            echo $ex->getMessage();
            die();
        }
    }


    public function __set($name, $value)
    {
        $this->variables[$name] = $value;
    }

    public function loadView($viewname, $useHeaderAndFooter = false)
    {
        $viewfile = $this->path.$viewname.".php";

        try
        {
            if(!file_exists($viewfile))
            {
                throw new templateException("Template view not found!");
                return false;
            }

            foreach($this->variables as $nameOfVariable => $valueOfVariable)
            {
                $$nameOfVariable = $valueOfVariable;
            }

            if($useHeaderAndFooter) include $this->registry->header;

            include $viewfile;

           if($useHeaderAndFooter) include $this->registry->footer;

        }catch (\Exception $ex)
        {
           echo $ex->getMessage();
        }
    }

}