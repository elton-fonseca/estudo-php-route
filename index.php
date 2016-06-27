<?php 

//Inclui o arquivo que possui a classe de autoloader
require_once('Autoloader/Autoloader.php');

//Instancia a classe de autoloader
$autoloader = new Autoloader();

//Registra no php para usar esse autoloader
$autoloader->registrar();

//Cria uma instância da classe Request
$request = new Http\Request();

//Cria uma instancia da classe router passando o request
$router = new Http\Router($request);

//Cria uma instancia da classe dispatch passando router
$dispatch = new Http\Dispatch($router);


 try {
     //Método responsável por carregar o recurso com base na URL
    $dispatch->run();
 } catch (Exception $ex) {
     //Caso algum erro aconteça usamos essa classe para exibir.
    App\Error\Error::show($ex->getMessage());
 }
