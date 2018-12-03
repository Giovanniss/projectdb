<?php
    $helper = new LinksTexto();
?>
<!DOCTYPE html>
<html lang="<?= LANG ?>">
    <head>
        <title>ProjetoBD</title>
        
        <?php include_once(PATH_TELA."estrutura/tag-header.php"); ?>
        
        <link href="<?= PATH_CSS ?>internas.css" rel="stylesheet">

        <!-- <script type="text/javascript">
            $(document).ready(function() {
                $(".btn-login").click(function() { 
                    if (validaFormLogin()) {
                        var formCarteirinha = $("[name$='formCarteirinha']").serialize();
                        jQuery.ajax({
                            type: "POST",
                            url: "<?= BASE_URL ?>login/envialogin",
                            data: formCarteirinha,
                            success: function (data) {

                                if (data == "ok") {
                                    $("#div_error").css({ "visibility": "hidden"});
                                        $('.loading').delay(50).fadeIn(100);
                                        setTimeout(function() {
                                            window.location.href = "<?= BASE_URL; ?>login"; 
                                    }, 1000);
                                }                            
                                if (data == "erro") {
                                    $('#div_error').html('<b style="font-size:11px;color:red;"> Seu usuário ou senha estão incorretos.</b>'); 
                                    $("#user").css("border","1px solid red");                             
                                    $("#senha").css("border","1px solid red");                            
                                }
                            }
                        });  
                    }              
                });

                $(".btn-sair").click(function() {
                    $("#modal-contato").modal();
                    setTimeout(function() {
                        window.location.href = "<?= BASE_URL; ?>login/logout"; 
                    }, 2000);     
                });
            });
        </script> -->
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
                        <h2>
                            Consultas
                        </h2>
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
