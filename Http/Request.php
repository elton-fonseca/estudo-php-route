<?php

namespace Http;

/**
* classe responsável por pegar a URL e separar em partes
*/
class Request
{
    /**
     * @var string
     */
    private $url = '';

    /**
     * @var array
     */
    private $params = [];

    /**
     * Pega a URL digitada, os dois primeiros parâmetros da URL monta param1.param2 e o restante retorna em um array
     * @return void
     */
    public function __construct()
    {
        if (isset($_GET["url"])) {
            $parts = explode('/', $_GET["url"]);

            if (count($parts) > 1) {
                $this->url = sprintf("%s.%s", array_shift($parts), array_shift($parts));
            }

            if (count($parts) > 0) {
                $this->params = $parts;
            }
        }
    }

    /**
     * Retorna as duas primeiras partes da URL no formato param1.param2
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Retorna as depois partes da URL em um array
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }
}
