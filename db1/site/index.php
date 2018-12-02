<?php

    require_once 'config.php';
    require_once PATH_LIB . 'sistema.class.php';
    require_once PATH_LIB . 'controlador.class.php';
    require_once PATH_LIB . 'modelo.class.php';

    function __autoload($file) {

         //chamado quando instancio uma classe, estou instanciando no models
         if (file_exists(PATH_MODELO . $file . '.class.php')) {
              require_once (PATH_MODELO . $file . '.class.php');
         } else if (file_exists(HELPERS . $file . '.php')) {
              require_once(HELPERS . $file . '.php');
         } else {
              die("Model ou Helper nao encontrado.");
         }
    }

    $sistema = new Sistema(CHARSET);

    $sistema->executar();

    $sistema->getControlador();
    