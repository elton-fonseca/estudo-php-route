<?php

return [
    //Chamado com a URL /produtos/listar/param1/param2/param3
    'produtos.listar' => [
        'http-verb'        => 'GET',
        'params'        => ['tamanho', 'valor', 'tipo'],
        'controller'    => 'produtosController',
        'method'        => 'listar'
    ],

    //Chamado com a URL /produto/criar
    'produto.criar' => [
        'http-verb'        => 'POST',
        'params'        => [],
        'controller'    => 'produtosController',
        'method'        => 'create'
    ],

    //Caso qualquer URL que não possua na Rota seja executada
    'default' => [
        'controller'    => 'principalController',
        'method'        => 'index'
    ],



];
