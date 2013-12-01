<?php
/**
 * @author bond
 * copyright 11/30/13
 */

error_reporting(E_ALL);

$sitepath = realpath(dirname(__FILE__));

define('_SITE_PATH', $sitepath."/");

include 'include/includelist.php';
$registry = new \application\registry();
$model = new \model\databaseutil();
$registry->model = $model::connect();
$registry->router = new \application\router($registry);
$registry->template = new \application\template($registry);
$registry->template->setViewPath($sitepath."/view/");
$route = "";
$route = @$_GET['rt'];
$registry->router->loadController($route, $sitepath."/controller/", $sitepath."/component/");