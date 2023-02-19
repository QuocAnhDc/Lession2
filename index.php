<?php

// define('APPROOT',dirname(dirname(__FILE__)));
define('URLROOT','http://localhost/');
require './Core/Database.php';
require './Models/BaseModel.php';
require './Controllers/BaseController.php';
// ucfirts : Viet hoa chu dau trong productController
// strtolower viet thuong con lai
$controllerName = ucfirst((strtolower($_REQUEST['controller']) ?? 'user') . 'Controller');
$actionName = $_REQUEST['action'] ?? 'indexPage';
$id = $_REQUEST['id'] ?? '';


// echo $controllerName;
// if(file_exists(URLROOT.'Controllers/'.$controllerName.'.php')){
    require "./Controllers/${controllerName}.php";
    $controllerObject = new $controllerName;
    $controllerObject->$actionName($id);