<?php

namespace App\Controller;

/**
* Arquivo de controlador
*/
class PrincipalController
{
    /**
     * Controlador indicado na propriedade default do arquivo de rotas
     * @return void
     */
    public function index()
    {
        echo "Essa página é exibida quando uma Rota não é encontrada";
    }
}
