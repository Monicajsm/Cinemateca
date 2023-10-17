<?php  
	require_once 'admin/functions/dbconfig.php';
	$idCiclo = 0;
	$idFilme = 0;
    $mostraSeccaoImagem = 1;

?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo "Cinemateca Portuguesa" ?></title>
	<link rel="icon" type="logo" href="img/logo.svg">
	<meta name="keywords" content="cinemateca portuguesa, filmes, cinema, cultura, programacao, sessao, museu">
	<meta name="description" content="Redesign do site da Cinemateca Portuguesa, o museu e arquivo do cinema portugues">
	<meta name="author" content="Monica Marques">
	<?php include('includes/head.php'); ?>
</head>

<body>

    
<div id="cookies" class="cookie-box">
    <h5>ESTE SITE UTILIZA COOKIES 🍪 </h5><br><br>
    <p>Armazenamos cookies de forma a recolher informacoes sobre a navegacao do site unicamente para fins estatisticos e de gestao.</p><br>
    <p>Ver <a href="politicadeprivacidade.php" target="_self">Politica de Privacidade</a> </p><br>
    <button class="cookie-button aceitar-cookie">Aceitar</button>
    <button class="cookie-button  rejeitar-cookie">Rejeitar</button>
</div>


<div class="container-fluid">

<h1 class="header-box">CINEMATECA PORTUGUESA</h1>

<?php include('includes/header.php'); ?>


<main>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <?php
            $pesquisaBanner = $mysqli->query("SELECT * FROM `banner_principal`");
                while ($printBanner = $pesquisaBanner->fetch_object()) {
                    echo 
                    '<div class="banner-principal" alt="banner-yvonnerainer" style="background-image: url('.$printBanner->url.');">
                    <h2 style="margin-top:0; padding-top: 50px; padding-left:15px; color:#FCFCFE; text-shadow: -1px 1px 0 #19162D, 1px 1px 0 #19162D, 1px -1px 0 #19162D, -1px -1px 0 #19162D">'.$printBanner->titulo.'<h2>
                    <h2  style="margin-top:0; padding-left:15px; color:#FCFCFE; text-shadow: -1px 1px 0 #19162D, 1px 1px 0 #19162D, 1px -1px 0 #19162D, -1px -1px 0 #19162D">'.$printBanner->data.'<h2>

                    </div>
                    
                    
                    ';
                }
            ?>   
    </div>
</div>



<main>
<!-- NOTICIAS -->
<h2>NOTÍCIAS</h2>
    <?php
    $pesquisaNoticia = $mysqli->query("SELECT * FROM `noticias` WHERE `id`");
    if ($pesquisaNoticia->num_rows > 0) {
        while ($printNoticia = $pesquisaNoticia->fetch_object()) {
            echo 
                '<div class="row noticias margin-bottom-50">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                         <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 nopadding">
                            <div class="noticia-img" alt="apromessa" style="background-image: url('.$printNoticia->img.');"></div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 noticia_texto">
                            <h3 class="noticias-header">'.$printNoticia->titulo.'</h3>
                            <h4 class="subtitle">'.$printNoticia->data.'</h4><br>
                            <p>'.$printNoticia->short_content.'</p><br>
                            <a href="noticia_pagina.php?id='.$printNoticia->id.'" target="'.$printNoticia->target.'"" target="_self"><button class="vermais">VER MAIS</button></a>
                        </div>
                    </div>
                </div>';
        }
    }

    ?>
 

</div>
<!-- FIM DAS NOTICIAS -->



<!-- TABELA PROGRAMACAO -->
<div class="row nopadding">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
        <h2>PROGRAMAÇÃO</h2>
    </div>
</div>

<?php include('includes/tabelaprogramacao.php'); ?>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <a href="programacao.php" target="_self"><button class="vermais">VER PROGRAMAÇÃO</button></a>
    </div>
<!-- FIM TABELA PROGRAMACAO -->



<!-- EXPOSICOES -->

<div class="row nopadding">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
    <?php
        $pesquisaExposicao = $mysqli->query("SELECT * FROM `info_geral` WHERE `id` = 7");
            if ($pesquisaExposicao->num_rows > 0) {
                while ($printExposicao = $pesquisaExposicao->fetch_object()){
                    $id_seccao = $printExposicao->id;
                    echo 
                        '<h2>'.$printExposicao->titulo.'</h2> <br>';
                }
            }
        ?>
                
    </div>
</div>

<div class="row nopadding">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="slider_expo">  
            <div class="slide"> 
                <?php
                    $pesquisaExpoTemporaria = $mysqli->query("SELECT * FROM `info_geral` WHERE `fk_seccao` = $id_seccao");
                    if ($pesquisaExpoTemporaria->num_rows > 0) {
                        while ($printExpoTemporaria = $pesquisaExpoTemporaria->fetch_object()){
                            echo 
                            '<h3 class="slide-title">'.$printExpoTemporaria->titulo.'</h3><br>
                            <img src="'.$printExpoTemporaria->img.'"> <br><br>
                                <a href="acinemateca.php#exposicaotemporaria" target="_self"><button class="vermais">VER MAIS</button></a>
                            
                            ';

                        }
                    }
                ?>     
                <br>
            </div>

            <div class="slide">
            <?php
                $pesquisa = $mysqli->query("SELECT * FROM `info_geral` WHERE `id` = 18");
                if($pesquisa->num_rows>0){
                    while ($printExpoPermanente = $pesquisa->fetch_object()) {
                    echo
                    '<h3  class="slide-title">'.$printExpoPermanente->titulo.'</h3><br>
                    <img src="'.$printExpoPermanente->img.'" class="img-responsive"><br><br>
                    <h3 class="slide-title subtitle"> EXPOSIÇÃO INTERACTIVA DE PRÉ-CINEMA</h3><br>
                    <a href="acinemateca.php#exposicaopermanente" target="_self"><button class="vermais">VER MAIS</button></a>
                    <br>';
                    }
                }
            ?>
            </div>
        </div>

        <!-- BOTAO PREV NEXT -->
        <button class="prev-next prev"> <img src="img/arrow-back.svg" class="arrow"> Anterior </button>
        <button class="prev-next next"> Próximo <img src="img/arrow-after.svg" class="arrow"> </button>
        <!-- FIM BOTAO PREV NEXT --> 

    </div>
</div>

<!-- FIM DAS EXPOSICOES -->




<!-- COLECCOES -->
<div class="row nopadding">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="slider_col">  
            <div class="slide">
            <?php
                $pesquisa = $mysqli->query("SELECT * FROM `info_geral` WHERE `id` = 4");
                if ($pesquisa->num_rows > 0) {
                    while ($printinfo = $pesquisa->fetch_object()) {
                    echo
                        '<h2 class="slide-title">'.$printinfo->titulo.'</h2>';

                        $pesquisaSlide1 = $mysqli->query("SELECT * FROM `slides` WHERE `fkgrupo_slides` = 3 AND `id`=14");
                        if ($pesquisaSlide1->num_rows > 0) {
                            while ($printSlide1 = $pesquisaSlide1->fetch_object()) {
                                echo 
                                '<div class="slide">
                                    <img src="'.$printSlide1->img.'" alt="arquivo da cinemateca"><br><br>
                                    <a href="coleccoesearquivos.php" target="_self"><button class="vermais">VER MAIS</button></a>
                                </div>';
                            }
                        }          
                    
                    }
                }
            ?>
            </div>

            <div class="slide">
                <?php
                $pesquisa = $mysqli->query("SELECT * FROM `info_geral` WHERE `id` = 15");
                if ($pesquisa->num_rows > 0) {
                    while ($printinfo = $pesquisa->fetch_object()) {
                    echo
                        '<h2  class="slide-title">'.$printinfo->titulo.'</h2> <br><br>
                        <img src="'.$printinfo->img.'" alt="arquivo da cinemateca" class="img-responsive"><br><br>
                        <a href="coleccoesearquivos.php#cinematecadigital" target="_self"><button class="vermais">VER MAIS</button></a>
                        
                        ';
                    }
                }
                ?>

            </div>
        </div>

        <!-- BOTAO PREV NEXT -->
            
        <button class="prev-next prev-col"> <img src="img/arrow-back.svg" class="arrow"> Anterior </button>
        <button class="prev-next next-col"> Próximo <img src="img/arrow-after.svg" class="arrow"> </button>
        
        <!-- FIM BOTAO PREV NEXT --> 

    </div>
</div>
<!-- FIM DAS COLECCOES -->




<!-- CINEMATECA JUNIOR -->
<div class="row nopadding">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <?php
            $pesquisa = $mysqli->query("SELECT * FROM `info_geral` WHERE `id` = 3");
            if ($pesquisa->num_rows > 0) {
                while ($printinfo = $pesquisa->fetch_object()) {
                echo
                '<h2>'.$printinfo->titulo.'</h2>
                <div class="img-cinematecajunior"alt="chaplin" style="background-image: url('.$printinfo->img.');"></div>
                <a href="cinematecajunior.php" target="_self"><button class="vermais">VER MAIS</button></a>
                ';
                }
            }
        ?>
    </div>
</div>
<!-- FIM DA CINEMATECA JUNIOR -->
</main>









<?php include('includes/footer.php'); ?>
</body>
</html>
