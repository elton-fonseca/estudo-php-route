<?php

namespace Http;

use Http\Request;

/**
* Classe responsável por verificar se a URL requisitada confere com algum rota
* Então disponibiliza o nome do controlador, método e os parâmetros
*/
class Router
{

    /**
     * @var array
     */
    private $rotas;

    /**
     * @var Http\Request
     */
    private $request;

    /**
     * @var array
     */
    private $rotaDados = false;

    /**
     * Carrega os recursos necessários para a classe
     * @param Http\Request $request 
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->rotas = require "rotas.php";
        $this->request = $request;

        $this->rotaDados = $this->matchRouter();
    }

    /**
     * Verifica se o request confere com alguma rota
     * @return array
     */
    private function matchRouter()
    {
        $requetUrl = $this->request->getUrl();
        $requestParams = $this->request->getParams();

        if (isset($this->rotas[$requetUrl])) {
            $rotaDados = $this->rotas[$requetUrl];

            if (count($requestParams) == count($rotaDados['params'])) {
                return $rotaDados;
            }
        }
        
        return $this->rotas['default'];
    }

    /**
     * Retorna o nome do controlador cadastrado no arquivo de rotas
     * @return string
     */
    public function getController()
    {
        return $this->rotaDados['controller'];
    }

    /**
     * Retorna o nome do método cadastrado no arquivo de rotas
     * @return string
     */
    public function getMethod()
    {
        return $this->rotaDados['method'];
    }

    /**
     * Retorna um array com os parâmetros passados na URL
     * @return array
     */
    public function getParams()
    {
        return $this->request->getParams();
    }
}
