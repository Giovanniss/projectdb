<?php

    /**
     * Controlador padrao do sistema
     */
    class Controlador extends Sistema {
         //direciona a tela do controller especifico 
         public function tela($nome, $vars = null, $estrutura = null) {
              if (is_array($vars) && count($vars) > 0) {
                   extract($vars, EXTR_PREFIX_ALL, 'view');
              }

              if ($estrutura === null) {
                  $arquivo = PATH_TELA . $nome . '.php';
              } else {
                  $arquivo = PATH_TELA_ESTRUTURA . $nome . '.php';
              }               

              // Verifica se o arquivo existe
              if (!file_exists($arquivo)) {
                   die('ERRO: O arquivo de tela informado n&atilde;o existe.');
              }

              $controller = $this->getControlador();
              $action = $this->getAcao();
              
               //var_dump($vars);
              include_once $arquivo; // Arquivo chamado nao funcao
         }

    }
    