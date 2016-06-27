<?php

namespace App\Error;

/**
*	Classe responsável por exibir erros 
*/
class Error
{
    /**
     * Mostra o erro na tela
     * @param string $message 
     * @return void
     */
    public static function show($message)
    {
        echo $message;
    }
}
