<?php

    /**
     * Metodos relacionados ao sistema em geral
     */
    class Sistema {
         /**
          * Armazena o valor obtido da URL
          * @var String $url
          */
         private $url;
         /**
          * Armazena a URL separada
          * @var Array $explode
          */
         private $explode;

         /**
          * Armazena o nome do controlador
          * @var String $controlador
          */
         private $controlador;

         /**
          * Armazena o nome da acao do controlador
          * @var String $acao
          */
         private $params;
         private $params2;

         /**
          * Armazena os parametros da url
          * @var String $param
          */
         private $acao;


         /**
          * Construtor da classe do sistema
          * @param String $charset - Recebe como parametro a codificacao padrao da pagina
          */
         public function __construct($charset = 'utf-8') {
              $this->iniciar($charset);

              $this->configurar();

              if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                   $this->setParamPost();
              } else {
                   $this->setParams();
              }
         }

         /**
          * Inicializador do sistema
          * Recursos, funcoes e valores padrao que sao utilizados pelo sistema sao inicializados aqui
          */
         private function iniciar($charset) {
              // Define o tipo de documento e a codificacao da pagina
              header('Content-type: text/html; charset=' . $charset);

              // Caso n�o exista, inicia uma sessao no navegador
              if (!isset($_SESSION)) {
                   session_start();
              }
         }

         /**
          * Configura os valores para execu��o do sistema
          */
         private function configurar() {
              $this->params2 = array();

              $this->url = strtolower((isset($_GET['url']) ? $_GET['url'] : 'home/index'));


              // Separa a URL pelas barras
              $this->explode = explode('/', $this->url);

              // Atribui a cada atributo seus valores corretos
              $this->controlador = (isset($this->explode[0]) ? $this->explode[0] : 'home');


              $this->acao = (isset($this->explode[1]) && $this->explode[1] != null ? $this->explode[1] : 'index');
              if ($this->controlador == "noticia") {
                   $this->controlador = "noticias";
                   $this->acao = "exibirnoticia";
                   array_shift($this->explode);
                   $this->params2 = $this->explode;
              }
              if ($this->controlador == "pesquisa" && $this->acao != "alterarpagina") {
                   $this->controlador = "pesquisa";
                   $this->acao = "index";
                   array_shift($this->explode);
                   $this->params2 = $this->explode;
              }
         }

         /**
          * Executa os metodos necessarios para funcionamento do sistema
          */
         public function executar() {
              $arquivo = PATH_CONTROLADOR . ucfirst($this->controlador) . 'Controller.class.php';

              // Caso o arquivo nao exista, para o sistema e emite uma mensagem de erro
              if (!file_exists($arquivo)) {
                   $this->controlador = "erro";
                   $arquivo = PATH_CONTROLADOR . 'ErroController.class.php';

                    //include (PATH_TELA . '404.php');
                    //die();
                    // die('o controlador informado nao existe.');
              }

              require_once $arquivo;
              // Instancia o controlador
              if ($this->controlador != "home") {
                   $this->controlador = $this->controlador . "Controller";
              }

              $app = new $this->controlador();

              // Verifica se o metodo (acao) existe na classe, se nao existir para a execucao e emite uma mensagem de erro
              if (!method_exists($app, $this->acao)) {
                   $this->controlador = "erro";
                   $arquivo = PATH_CONTROLADOR . 'ErroController.class.php';
                   require_once $arquivo;
                   $this->acao = 'index';
                    //die('a acao que voce procura nao existe.');
              }

              $acao = $this->acao;

               // Executa a metodo(acao) informada
               //$app->$acao();
               call_user_func_array(array($app, $acao), array($this->params2));
         }

         public function getControlador() {
              return $this->controlador;
         }

         public function getAcao() {
              return $this->acao;
         }

         private function setParams() {
              unset($this->explode[0], $this->explode[1]);

              if (end($this->explode) == null) {

                   array_pop($this->explode);
              }

              $i = 0;

              if (!empty($this->explode) && count($this->explode) % 2 == 0) {
                   foreach ($this->explode as $val) {
                        if ($i % 2 == 0) {
                             $ind[] = $val;
                        } else {
                             $value[] = $val;
                        }
                        $i++;
                   }
              } else {
                   $ind = array();
                   $value = array();
              }

              if (count($ind) == count($value) && !empty($ind) && !empty($value)) {
                   $this->params = array_combine($ind, $value);
              } else {
                   $this->params = array();
              }
         }

         public function getParam($name = null) {
              if ($name != null) {
                   return $this->params[$name];
              } else {
                   return $this->params;
              }
         }

         public function setParamPost() {
              $values = array();
              foreach ($_POST as $name => $value) {
                   $values[$name] = $value;
              }

              if (!empty($values)) {
                   $this->params = $values;
              } else {
                   $this->params = array();
              }
         }

         public function getParamPost($name = null) {
              if ($name != null) {
                   return $this->params[$name];
              } else {
                   return $this->params;
              }
         }
    }
    