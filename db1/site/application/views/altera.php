<?php
    $helper = new LinksTexto();
    // var_dump($view_clientes);
    // if (isset($_SESSION['alterar'])){
        // $endereco = $_SESSION['endereco'];
        // $pessoa   = $_SESSION['pessoa'];
        // unset($_SESSION['alterar']);

?>
<!DOCTYPE html>
<html lang="<?= LANG ?>">
    <head>
        <title>ProjetoBD</title>
        
        <?php include_once(PATH_TELA."estrutura/tag-header.php"); ?>
        
        <link href="<?= PATH_CSS ?>internas.css" rel="stylesheet">

        <script type="text/javascript">
            $(document).ready(function() {
                $("#modal-altera").modal(); 

                $(".btn-cadastrar").click(function() { 
                    var id_user = $(this).attr('data-id');
                    var acao    = $(this).attr('id'); 

                        jQuery.ajax({
                            type: "POST",
                            url: "<?= BASE_URL ?>altera/updatecliente",
                            data: {acao:acao,id:id_user},
                            success: function (data) {

                                if (data != "erro") {
                                    console.log(data);
                                    // $("#modal-altera").modal();
                                    // setTimeout(function() {
                                    //     window.location.href = "<?= BASE_URL; ?>login";
                                    // }, 2000);             
                                    //     $('.loading').delay(50).fadeIn(100);
                                    //     setTimeout(function() {
                                    //         window.location.href = "<?= BASE_URL; ?>login"; 
                                    // }, 1000);
                                }                
                            }
                        });           
                });

                $(".btn-sair").click(function() {
                    $("#modal-contato").modal();
                    setTimeout(function() {
                        window.location.href = "<?= BASE_URL; ?>login/logout"; 
                    }, 2000);     
                });
            });
        </script>
    </head>

    <body>
        <!-- ************************************************************************* -->
        <!-- ******** INICIO VERIFICAÇÃO DO JAVASCRIPT HABILITADO/DESABILITADO ******* -->
        <!-- ************************************************************************* -->
        <?php include(PATH_TELA."estrutura/noscript.php");?>
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
        <section class="container-fluid" id="body-cad-cliente">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="mb-4 mt-3">
                            Alteração de Clientes.
                        </h2>
                    </div>
                        <!-- Modal -->
            <div class="modal fade" id="modal-altera" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Alterar</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                    <form class="col-lg-12" name="formCadastro" id="formCadastro" method="POST">
                            <div class="row">
                                <div class="col-md-12" id="formulario">
                                    <div class="mb-3">
                                        <label for="nome">Nome Completo</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="nome" id="nome" minlength="5" maxlength="50" value="<?= $_SESSION['pessoa'][0]['nome']; ?>">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="email">Email</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" value="<?= $_SESSION['pessoa'][0]['email']; ?>" name="email" id="email" maxlength="50" placeholder="Digite seu email">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="cpf">CPF</label>
                                            <input type="text" class="form-control" value="<?= $_SESSION['pessoa'][0]['CPF']; ?>" name="cpf" id="cpf" maxlength="50" placeholder="Digite o CPF">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="telefone">Celular</label>
                                            <input type="text" class="form-control" name="telefone" value="<?= $_SESSION['pessoa'][0]['telefone']; ?>" id="telefone" maxlength="15" placeholder="Celular com DDD*">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                        <label for="datanasc">Data de nascimento</label>
                                            <input type="date" class="form-control" value="<?= $_SESSION['pessoa'][0]['datanasc']; ?>" name="datanasc" id="datanasc" maxlength="10" placeholder="DD/MM/AAAA">
                                        </div>                        
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5 mb-3">
                                            <label for="rua">Rua</label>
                                            <input type="text" class="form-control" value="<?= $_SESSION['endereco'][0]['rua']; ?>" name="rua" id="rua" maxlength="30" placeholder="Digite a rua">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="numero">Número</label>
                                            <input type="text" class="form-control" value="<?= $_SESSION['endereco'][0]['numero']; ?>" name="numero" id="numero" maxlength="10" placeholder="N°">                                        
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label for="bairro">Bairro</label>
                                            <input type="text" class="form-control" name="bairro" value="<?= $_SESSION['endereco'][0]['bairro']; ?>" id="bairro" maxlength="30" placeholder="Digite o bairro">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5 mb-3">
                                            <label for="cidade">Cidade</label>
                                            <input type="text" class="form-control" value="<?= $_SESSION['endereco'][0]['cidade']; ?>" name="cidade" id="cidade" maxlength="50" placeholder="Digite a cidade">
                                        </div>

                                        <div class="col-md-5 mb-3"> 
                                            <label for="estado">Estado</label>
                                            <input type="text" class="form-control" value="<?= $_SESSION['endereco'][0]['estado']; ?>" name="estado" id="estado" maxlength="50" placeholder="Digite o estado">
                                        </div>

                                        <div class="col-md-2 mb-3">
                                            <label for="uf">UF</label>
                                            <input type="text" class="form-control" value="<?= $_SESSION['endereco'][0]['uf']; ?>" name="uf" id="uf" maxlength="2" placeholder="UF">                                        
                                        </div>
                                    </div>   
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-primary btn-cadastrar">Alterar</button>
                    </div>
                </div>
             </div>
        </div>
        </section>


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
        <!-- Owl Carousel -->
        <link href="<?= PATH_FRAMEWORK ?>owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="<?= PATH_FRAMEWORK ?>owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
        <script src="<?= PATH_FRAMEWORK ?>bootstrap/js/bootstrap.min.js"></script>
        <script src="<?= PATH_FRAMEWORK ?>owlcarousel/owl.carousel.min.js"></script>
        
        <!-- <script src="<?= PATH_JS ?>internas.js"></script> -->
        <!-- ************************************************************************* -->
        <!-- **************// FIM DE IMPORTAÇÕES E FUNÇÕES JAVASCRIPT //************** -->
        <!-- ************************************************************************* -->
    </body>
</html>


        





        