<?php  
	require_once 'admin/functions/dbconfig.php';

?>
<!DOCTYPE html>
<html style="margin-top:0px">
<head>
	<title><?php echo "A Cinemateca" ?></title>
    <link rel="icon" type="logo" href="img/logo.svg">
	<meta name="keywords" content="programacao, filmes, sessoes, ciclos, cinema, horarios, exibicoes">
	<meta name="description" content="Pagina da programacao da Cinemateca Portuguesa, organizada semanalmente, com destaque para ciclos de cinema">
	<meta name="author" content="Monica Marques">
	<?php include('includes/head.php'); ?>
</head>

<body style="margin-top:0px">

<div class="container-fluid">

<?php include('includes/header.php'); ?>

<main>

<div class="row">
    <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <?php
        $pesquisa = $mysqli->query("SELECT * FROM `info_geral` WHERE `id` = 1");
        if ($pesquisa->num_rows > 0) {
            while ($printinfo = $pesquisa->fetch_object()){
            echo    '<h1 class="main-page-title">'.$printinfo->titulo.'</h1>';
            }
        }
        ?>
	</div>
</div>

<!-- MENU SECUNDARIO -->

    <?php

    $pesquisa = $mysqli->query("SELECT * FROM `menus` WHERE `id` = 2 ORDER BY `ordem` ASC");
    while ($print = $pesquisa->fetch_object()){
    $id = $print->id;
    }

	$pesquisa = $mysqli->query("SELECT * FROM `menus` WHERE `fk_menus` = '$id' ORDER BY `ordem` ASC");
	if ($pesquisa->num_rows > 0) {
    
    echo   '<div class="submenu nopadding col-lg-12 col-md-12 col-sm-12 col-xs-12">';

    while($print = $pesquisa->fetch_object()){
        echo    '<div class="inline">
                    <li><a href="'.$print->url.'" target="'.$print->target.'"><h4 class="subtitle">'.$print->titulo.'</h4></a></li>
                </div>';
    }

    echo '</div>';
    }

    ?>
      
<!-- FIM MENU SECUNDARIO -->


<!-- BANNER FILME -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <?php
    $pesquisaBanner = $mysqli->query("SELECT * FROM `banners_paginas` WHERE `id` = 1");
        while ($printBanner = $pesquisaBanner->fetch_object()) {
            echo '<div class="banner_pagina" alt="banner-cinemateca" style="background-image: url('.$printBanner->url.');"></div>';
        }
    ?>
	</div>
</div>
<!-- FIM DO BANNER FILME -->


<!-- INTRO E MORADA -->
<div class="row nopadding sec1" >
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">

        <?php
        $pesquisa = $mysqli->query("SELECT * FROM `moradas_contactos` WHERE `id` = 1");
        if($pesquisa->num_rows>0){
            while ($printinfo = $pesquisa->fetch_object()) {
            echo  
            
            '<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 morada nopadding">
                <h4>'.$printinfo->titulo.'</h4><br>
                <iframe src="'.$printinfo->mapa.'"></iframe>
                <p>'.$printinfo->morada.'</p>
                <p>'.$printinfo->telefone.'</p>
                <a href="mailto:cinemateca@cinemateca.pt">'.$printinfo->email.'</a>
            </div>';
            }
        }
        ?>

        <?php
        $pesquisa = $mysqli->query("SELECT * FROM `info_geral` WHERE `id` = 1");
        if($pesquisa->num_rows>0){
            while ($printinfo = $pesquisa->fetch_object()) {
            echo  
            '<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 nopadding"><br>
                <p>'.$printinfo->conteudo.'</p>
            </div>';
            }
        }
        ?>

    </div>
</div>
<!-- FIM INTRO E MORADA -->


<!-- HISTORIA -->
<div class="row nopadding sec2" >
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">
        <?php
        $pesquisa = $mysqli->query("SELECT * FROM `info_geral` WHERE `id` = 5");
        if ($pesquisa->num_rows > 0) {
            while ($printinfo = $pesquisa->fetch_object()){
            echo    '<h2 class="margin-top-100" id="historia">'.$printinfo->titulo.'</h2>';
            }
        }
        ?>

        <div class="timeline-slider">
  
            <?php
            $ano = 0;
            $pesquisa = $mysqli->query("SELECT * FROM `historia`");
            while($print = $pesquisa->fetch_object()){        
                echo '<div class="slide" data-year="'.$ano.'"><p>'.$print->ano.'</p></div>';
                $ano++;
            }
            ?>

            <!-- PROGRESS BAR  -->
            <div class="progress_timeline" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                <span class="slider_label sr-only-timeline">
                </span> 
            </div> 

        </div>

        <div class=" slider event-slider margin-bottom-100">
            <?php
            $ano = 0;
            $pesquisa = $mysqli->query("SELECT * FROM `historia`");
            while($print = $pesquisa->fetch_object()){        
                echo '<div class="event_text"><p>'.$print->evento.'</p></div>';
                $ano++;
            }
            ?>
        </div>

        
    </div>   
</div>
<!-- FIM HISTORIA --> 



<!-- MISSAO, ACTIVIDADES E VALORES -->

<div class="row sec3">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">

        <?php
        $pesquisa = $mysqli->query("SELECT * FROM `info_geral` WHERE `id` = 6");
        if ($pesquisa->num_rows > 0) {
            while ($printinfo = $pesquisa->fetch_object()){
                echo
                    '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <img src="'.$printinfo->img.'" alt="joao-cesar-monteiro" class="img-responsive margin-bottom-25">
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <h2 style="margin-top:0px" id="missaoactividades">'.$printinfo->titulo.'</h2>
                        <p>'.$printinfo->conteudo.'</p>';

                        $pesquisaValores = $mysqli->query("SELECT * FROM `info_geral` WHERE `id` = 16");
                        if ($pesquisaValores->num_rows > 0) {
                            while ($printValores = $pesquisaValores->fetch_object()){
                            echo
                                '<h3 class="margin-top-50">'.$printValores->titulo.'</h3><br>
                                <p>'.$printValores->conteudo.'</p>';
                            }
                        }  
                echo'</div>';
            }
        }
        ?>
  
    </div>           
</div>
<!--FIM MISSAO, ACTIVIDADES E VALORES  --> 


<!-- EXPOSICOES-->
<div class="row margin-top-100 margin-bottom-100">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        
        <?php
        $pesquisaExposicao = $mysqli->query("SELECT * FROM `info_geral` WHERE `id` = 7");
            if ($pesquisaExposicao->num_rows > 0) {
                while ($printExposicao = $pesquisaExposicao->fetch_object()){
                    $id_seccao = $printExposicao->id;
                    echo 
                    '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 nopadding" id="exposicaotemporaria">
                        <h2 style="margin-top:0px" id="exposicoes">'.$printExposicao->titulo.'</h2>';
                        
                        $pesquisaExpoTemporaria = $mysqli->query("SELECT * FROM `info_geral` WHERE `fk_seccao` = $id_seccao");
                        if ($pesquisaExpoTemporaria->num_rows > 0) {
                            while ($printExpoTemporaria = $pesquisaExpoTemporaria->fetch_object()){
                                echo '<h3>'.$printExpoTemporaria->titulo.'</h3><br>
                                <p class="texto-descritivo margin-bottom-25">'.$printExpoTemporaria->conteudo.'</p>
                                ';
                            }
                        }        
                    echo '</div>';

                    echo 
                    '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 nopadding-right">';

                        $pesquisaExpoTemporaria = $mysqli->query("SELECT * FROM `info_geral` WHERE `fk_seccao` = $id_seccao");
                        if ($pesquisaExpoTemporaria->num_rows > 0) {
                            while ($printExpoTemporaria = $pesquisaExpoTemporaria->fetch_object()){
                                echo '<img src="'.$printExpoTemporaria->img.'">';
                            }
                        }
                    echo '</div>';
                }
            }
        ?>
       
    </div>  
</div> 


<div class="row margin-bottom-50">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        
        <?php
        $pesquisa = $mysqli->query("SELECT * FROM `info_geral` WHERE `id` = 18");
        if($pesquisa->num_rows>0){
            while ($printExpoPermanente = $pesquisa->fetch_object()) {
            echo
            '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 nopadding">
                <img src="'.$printExpoPermanente->img.' " class="margin-top-100">
            </div>

            <h3 class="margin-top-100" id="exposicaopermanente">'.$printExpoPermanente->titulo.'</h3><br>
            '.$printExpoPermanente->conteudo.';
            ';
            }
        }
        ?>
                     
    </div>  
</div> 
<!-- FIM EXPOSICOES --> 



<!-- ORGANIZACAO E GESTAO -->
<div class="row organizacao-gestao sec5" >
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-top-100">

        <?php
        $pesquisa = $mysqli->query("SELECT * FROM `info_geral` WHERE `id` = 8");
        if($pesquisa->num_rows>0){
            while ($printOrganizacao = $pesquisa->fetch_object()) {
            echo
            '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 nopadding">
                <h2 style="margin-top:0px" id="organizacaogestao">'.$printOrganizacao->titulo.'</h2>
                <p>'.$printOrganizacao->conteudo.'</p>
            </div>
            
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 nopadding-right">
                <img src="'.$printOrganizacao->img.'" class="float-right text-space">
            </div>';
            }
        }
        ?>

    </div>
</div>
<!-- FIM ORGANIZACAO E GESTAO -->

<!-- PROCEDIMENTOS CONCURSAIS -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h3 class="margin-top-50 margin-bottom-50">PROCEDIMENTOS CONCURSAIS</h3>
    </div>           
</div>


<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-bottom-50">

        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 nopadding"><br>      
            <h4>DOCUMENTOS PARA TODOS OS PROCEDIMENTOS</h4><br>
            <a href="Cinemateca\junior_2022_2023.pdf" download="" target="_blank" class="link">Formulário - candidatura ao procedimento concursal</a><br> 
            <a href="" download="" target="_blank" class="link">Formulário - exercício do direito de particiapção de interessados</a> 
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 nopadding"><br>       
            <h4>AVISO DE ABERTURA DE PROCEDIMENTO CONCURSAL</h4><br>
            <a href="" download="" target="_blank" class="link">Anúncio de abertura de recrutamento por mobilidade - Técnico superior na área de conservação das colecções de aparelhos e objectos cinematográficos do departmaneto ANIM</a>    
        </div>

    </div>           
</div>
<!-- FIM PROCEDIMENTOS CONCURSAIS -->
        



<?php include('includes/footer.php'); ?>


</body>
</html>