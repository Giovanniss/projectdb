<?php
    $helper = new LinksTexto();
?>
<!DOCTYPE html>
<html lang="<?= LANG ?>">
    <head>
        <title>Página não encontrata</title>
        <?php include_once(PATH_TELA."estrutura/tag-header.php"); ?>
    </head>

    <body>
        <!-- ************************************************************************* -->
        <!-- ******** INICIO VERIFICAÇÃO DO JAVASCRIPT HABILITADO/DESABILITADO ******* -->
        <!-- ************************************************************************* -->
        <?php include(PATH_TELA."estrutura/noscript.php"); ?>
        <!-- ************************************************************************* -->
        <!-- *****// FIM DA VERIFICAÇÃO DO JAVASCRIPT HABILITADO/DESABILITADO //****** -->
        <!-- ************************************************************************* -->


        <!-- ************************************************************************* -->
        <!-- ************************** INICIO ÁREA DE MENU ************************** -->
        <!-- ************************************************************************* -->
        <?php include(PATH_TELA."estrutura/cabecalho.php"); ?>
        <!-- ************************************************************************* -->
        <!-- ************************// FIM DA ÁREA DE MENU //************************ -->
        <!-- ************************************************************************* -->


        <!-- ************************************************************************* -->
        <!-- ************************** INICIO AREA DE ERRO ************************** -->
        <!-- ************************************************************************* -->          
        <div class="container-fluid" id="erro404">
            <div class="container">
                <div class="col-lg-12 espaco-topicos-first"></div>
                <section class="row montserrat">
                    <article class="col-lg-12 not-found">
                        <header class="col-12">
                            <h1 class="text-center" style="font-size: 180px;padding-top: 70px;">Ops!</h1>
                        </header>
                        <div class="col-12">
                            <p class="text-center">Página não encontrada!</p>
                            <p class="text-center">O endereço abaixo não foi encontrado</p>
                            <p class="text-center"><b>http://<?= $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] ?></b>.</p>
                            <a href="<?= BASE_URL ?>">
                                <button class="btn btn-default voltar" type="button">
                                    <span><i class="fa fa-reply" aria-hidden="true"></i></span> 
                                    Voltar ao Início
                                </button> 
                            </a>
                        </div>
                    </article>
                </section>
            </div>
        </div>
        <!-- ************************************************************************* -->
        <!-- ************************** FINAL AREA DE ERRO  ************************** -->
        <!-- ************************************************************************* -->


        <!-- ************************************************************************* -->
        <!-- ************************** INICIO ÁREA RODAPÉ *************************** -->
        <!-- ************************************************************************* -->
        <?php include("estrutura/rodape.php"); ?>
        <!-- ************************************************************************* -->
        <!-- ************************// FIM DA ÁREA RADAPÉ //************************* -->
        <!-- ************************************************************************* -->


        <!-- ************************************************************************* -->
        <!-- **************** INICIO IMPORTAÇÕES E FUNÇÕES JAVASCRIPT **************** -->
        <!-- ************************************************************************* -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="<?= PATH_FRAMEWORK ?>bootstrap/js/bootstrap.min.js"></script>
        <!-- ************************************************************************* -->
        <!-- **************// FIM DE IMPORTAÇÕES E FUNÇÕES JAVASCRIPT //************** -->
        <!-- ************************************************************************* -->
    </body>
</html>