<?php
    $helper = new LinksTexto();
    // var_dump($view_clientes);
    if (isset($_SESSION['alterar'])){
        var_dump($_SESSION['alterar']);
        unset($_SESSION['alterar']);

    }
?>
<!DOCTYPE html>
<html lang="<?= LANG ?>">
    <head>
        <title>ProjetoBD</title>
        
        <?php include_once(PATH_TELA."estrutura/tag-header.php"); ?>
        
        <link href="<?= PATH_CSS ?>internas.css" rel="stylesheet">

        <script type="text/javascript">
            $(document).ready(function() {    
                $(".btn-edit").click(function() { 
                    var id_user = $(this).attr('data-id');
                    var acao    = $(this).attr('id'); 

                        jQuery.ajax({
                            type: "POST",
                            url: "<?= BASE_URL ?>altera/alterarcliente",
                            data: {acao:acao,id:id_user},
                            success: function (data) {

                                if (data != "erro") {
                                    console.log(data);
                                    
                                    setTimeout(function() {
                                        window.location.href = "<?= BASE_URL; ?>altera/cliente";
                                    }, 2000);             
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
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nome</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Ação</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php if ($view_clientes) { ?>
                            <?php foreach ($view_clientes as $ind => $clientes) { ?>
                                <tr>    
                                    <th scope="row"> <?= $clientes['id'] ?> </th>
                                    <td><?= $clientes['nome'] ?> </td>
                                    <td><?= $clientes['email'] ?> </td>
                                    <td>                 
                                        <button class="tim btn-edit" type="button" id="editar" data-id="<?= $clientes['id'] ?>"> <i class="fas fa-edit"></i> </button> 
                                        | 
                                        <button class="tim btn-del" type="button" id="excluir" data-id="<?= $clientes['id'] ?>"><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } ?>

                        <?php
                        ?>
                            <!-- <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>@fat</td>
                            </tr>
                                            $(".btn-edit").click(function() { 
                        var id_task = $(this).attr('id');
                        alert(id_task);

                    var formCliente = $("[name$='formCliente']").serialize();
                        jQuery.ajax({
                            type: "POST",
                            url: "<?= BASE_URL ?>altera/alterarcliente",
                            data: {formCliente, id: id_task},
                            success: function (data) {
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>@twitter</td>
                            </tr> -->
                        </tbody>
                    </table>

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
