<?php
require_once 'model/database.php';
$controller = 'principal';
require_once 'view/header.php';
    require_once 'view/entrada.php';
    require_once 'view/footer.php';
//INICIO DE SESION
session_start();
/*$_SESSION['ID'] = '';
$_SESSION['NOMBRE'] = '';
$_SESSION['TIPO'] = '';*/



// Todo esta lógica hara el papel de un FrontController
if (!isset($_REQUEST['c'])) {
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';    //le manda el controlador
    $controller = new $controller; //instanciamos el controlador
    $controller->Index();    //llamamos al metodo del controlador
} else {
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['c']);
    $accion = isset($_REQUEST['e']) ? $_REQUEST['e'] : 'Index';

    // Instanciamos el controlador
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;

    // Llama la accion
    call_user_func(array($controller, $accion));
}
