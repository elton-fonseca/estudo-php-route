<?php

namespace Http;

use Http\Router;
use App\Error\Error;

/**
* Classe responsável por carregar o controlador, método e atributos passados na ação do arquivo rotas.php
*/
class Dispatch
{

    /**
     * @var Http\Router
     */
    private $router;

    /**
     * @var string
     */
    private $controllerNamespace = '\App\Controller\\';
    
    /**
     * Guarda a instancia de route no atributo local
     * @param Http\Router $router 
     * @return void
     */
    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    /**
     * Pega os dados da rota e carrega o recurso necessário
     * @return void
     */
    public function run()
    {
        $controller = $this->controllerNamespace . $this->router->getController();
        $method = $this->router->getMethod();

        if (class_exists($controller)) {
            $controlador = new $controller();

            if (method_exists($controlador, $method)) {
                $controlador->$method();
            } else {
                throw new Exception('O método passado na rota não existe');
            }
        }
    }
}
