<?php
    $helper = new LinksTexto();
    session_destroy();
?>
<!DOCTYPE html>
<html lang="<?= LANG ?>">
    <head>
        <title>ProjetoBD</title>
        
        <?php include_once(PATH_TELA."estrutura/tag-header.php"); ?>
        
        <link href="<?= PATH_CSS ?>internas.css" rel="stylesheet">

        <script type="text/javascript">
            $(document).ready(function() {
                $(".btn-cadastrar").click(function() {  
                    var formCadastro = $("[name$='formCadastro']").serialize();
                    console.log(formCadastro);
                    jQuery.ajax({
                        type: "POST",
                        url: "<?= BASE_URL ?>cadastro/enviarcadastro",
                        data: formCadastro,
                        success: function (data) {
                        // document.getElementById("innerHTML") = data;
                        console.log(data);
                            if (data != "erro") {
                                $("#modal-contato").modal();
                                setTimeout(function() {
                                    window.location.href = "<?= BASE_URL; ?>home/index";
                                }, 2000);                                 
                            } else {
                                alert('ERRO', data);
                            }
                        }
                    });
                });
            });
        </script>
    </head>

    <body>
        <!-- <div class="result" style="margin: 150px; width: 300px; background: #f1f1f1"> -->

        </div>
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
                        <h2 class="mt-3 mb-3">
                            Cadastro de Clientes.
                        </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <form class="col-lg-12" name="formCadastro" id="formCadastro" method="POST">
                            <div class="row">
                                <div class="col-md-12" id="formulario">
                                    <div class="mb-3">
                                        <label for="nome">Nome Completo</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="nome" id="nome" minlength="5" maxlength="50" placeholder="Nome Completo">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="telefone">Celular</label>
                                            <input type="text" class="form-control" name="telefone" id="telefone" maxlength="15" placeholder="Celular com DDD*">
                                        </div>

                                        <div class="col-md-3 mb-3">
                                        <label for="datanasc">Data de nascimento</label>
                                            <input type="date" class="form-control" name="datanasc" id="datanasc" maxlength="10" placeholder="DD/MM/AAAA" value="">
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <label for="cpf">CPF</label>
                                            <input type="text" class="form-control" name="cpf" id="cpf" maxlength="50" placeholder="Digite o CPF">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                            <label for="rua">Rua</label>
                                            <input type="text" class="form-control" name="rua" id="rua" maxlength="30" placeholder="Digite o bairro">
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <label for="numero">Número</label>
                                            <input type="text" class="form-control" name="numero" id="numero" maxlength="10" placeholder="N°">                                        
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <label for="bairro">Bairro</label>
                                            <input type="text" class="form-control" name="bairro" id="bairro" maxlength="30" placeholder="Digite o bairro">
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <label for="cidade">Cidade</label>
                                            <input type="text" class="form-control" name="cidade" id="cidade" maxlength="50" placeholder="Digite a cidade">
                                        </div>


                                        <div class="col-md-1 mb-3">
                                            <label for="uf">UF</label>
                                            <input type="text" class="form-control" name="uf" id="uf" maxlength="2" placeholder="UF">                                        
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3 mb-3"> 
                                            <label for="estado">Estado</label>
                                            <input type="text" class="form-control" name="estado" id="estado" maxlength="50" placeholder="Digite o estado">
                                        </div>

                                        <div class="col-md-3 mb-3">                                                                    <label for="pais">Pais</label>
                                            <select class="form-control" name="pais" id="pais">                                                
                                                <option>Selecione o País</option>
                                                <option value="BRA">BRA</option>
                                                <option value="ARG">ARG</option>
                                                <option value="CUB">CUB</option>
                                                <option value="CHL">CHL</option>
                                                <option value="COL">COL</option>
                                                <option value="URU">URU</option>
                                                <option value="PRY">PRY</option>
                                                <option value="ECU">ECU</option>
                                            </select>
                                        </div>
                                    </div>

                                    <fieldset class="mb-3">
                                        <legend>Sexo</legend>
                                        <div class="custom-control custom-radio custom-control-inline genero">
                                            <input class="custom-control-input" type="radio" id='m' type="radio" name="sexo" value="M" checked>
                                            <label class="custom-control-label"  for='m'> Masculino</label>
                                        </div>

                                        <div class="custom-control custom-radio custom-control-inline genero">
                                            <input type="radio" id="f" name="sexo" value="F" class="custom-control-input">
                                            <label class="custom-control-label" for="f">Feminino</label>
                                        </div>
                                    </fieldset>

                                    <div class="mb-3">
                                        <label for="email">Email</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="email" id="email" maxlength="50" placeholder="Digite seu email">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="btncadastrar">
                                    <button class="btn btn-primary btn-cadastrar" type="button">CADASTRAR</button>
                                </div>
                            </div>
                        </form>
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
