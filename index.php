<?php
session_start();
define('URLROOT','http://localhost/');

require './Core/Database.php';
require './Models/BaseModel.php';
require './Controllers/BaseController.php';

$controllerName = ucfirst((strtolower($_REQUEST['controller']) ?? 'user') . 'Controller');
$actionName = $_REQUEST['action'] ?? 'index';
$id = $_REQUEST['id'] ?? '';

require "./Controllers/${controllerName}.php";

$controllerObject = new $controllerName;
$controllerObject->$actionName($id);
