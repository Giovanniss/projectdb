<?php

    /**
     * Endereço raiz do website
     */
    define('BASE_URL', "http://" . $_SERVER['SERVER_NAME'] . '/db1/site/');

    /**
     * Linguagem padrão das páginas HTML
     */
    define('LANG', 'pt-br');

    /**
     * Codificação padrão dos caracteres da página
     */
    define('CHARSET', 'utf-8');

    /**
     * Endereço do servidor de banco de dados
     */
    define('DB_HOST', '127.0.0.1');

    /**
     * Usuário de acesso ao servidor de banco de dados
     */
    
    define('DB_USER', 'root');
    
    /**
     * Senha do usuário do servidor de banco de dados
     */
    define('DB_PASS', '266621');

    
    /**
     * Nome do banco de dados
     */
    define('DB_NAME', 'projectdb');


    /**
     * Codificação padrão do banco de dados
     */
    define('DB_CHARSET', 'utf8');

    /**
     * Diretório padrão das bibliotecas do sistema
     */
    define('PATH_LIB', 'system/');

    /**
     * Diretório padrão dos controladores
     */
    define('PATH_CONTROLADOR', 'application/controllers/');

    /**
     * Diretório padrão dos modelos
     */
    define('PATH_MODELO', 'application/models/');

    /**
     * Diretório padrão das telas
     */
    define('PATH_TELA', 'application/views/');
    define('PATH_TELA_ESTRUTURA', 'application/views/estrutura/');

    /**
     * Diretórios padrões
     */
    define('PATH_IMG', BASE_URL . 'web-files/imagens/');
    define('PATH_JS', BASE_URL . 'web-files/js/');
    define('PATH_CSS', BASE_URL . 'web-files/css/');
    define('PATH_FRAMEWORK', BASE_URL . 'web-files/framework/');
    define('HELPERS', 'helpers/');   