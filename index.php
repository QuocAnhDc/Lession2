<?php

require './Core/Database.php';
require './Models/BaseModel.php';
require './Controllers/BaseController.php';
// ucfirts : Viet hoa chu dau trong userController
// lay ten controller tu request parameter
$controllerName = ucfirst($_REQUEST['controller'] . 'Controller');
$actionName = $_REQUEST['action'] ?? 'indexPage';
$id = $_REQUEST['id'] ?? '';



require "./Controllers/${controllerName}.php";
$controllerObject = new $controllerName;
$controllerObject->$actionName($id);
