<?php  
	require_once 'admin/functions/dbconfig.php';

?>
<!DOCTYPE html>
<html style="margin-top:0px">
<head>
	<title><?php echo "Cinemateca Júnior" ?></title>
    <link rel="icon" type="logo" href="img/logo.svg">
	<meta name="keywords" content="Cinemateca Junior, Museu, Pre-cinema, Cinema, Sessoes, Infanto-juvenil">
	<meta name="description" content="pagina dedicada a Cinemateca Junior, com uma programacao destinada a escolas, grupos e familias, possui um museu de pre cinema">
	<meta name="author" content="Monica Marques">
	<?php include('includes/head.php'); ?>
</head>

<body style="margin-top:0px">

<div class="container-fluid">

<?php include('includes/header.php'); ?>

<main>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <?php
        $pesquisa = $mysqli->query("SELECT * FROM `info_geral` WHERE `id` = 3");
        if ($pesquisa->num_rows > 0) {
            while ($printinfo = $pesquisa->fetch_object()) {
            echo
            '<h1 class="main-page-title">'.$printinfo->titulo.'</h1>';
            }
        }
        ?>
	</div>
</div>


<!-- menu secundario -->
<?php

	$pesquisa = $mysqli->query("SELECT * FROM `menus` WHERE `id` = 4 ORDER BY `ordem` ASC");
	while ($print = $pesquisa->fetch_object()){
	$id = $print->id;
	}

    $pesquisa = $mysqli->query("SELECT * FROM `menus` WHERE `fk_menus` = '$id' ORDER BY `ordem` ASC");
	if ($pesquisa->num_rows > 0) {

    echo '<div class="submenu nopadding col-lg-12 col-md-12 col-sm-12 col-xs-12">';

    while($print = $pesquisa->fetch_object()){
		echo    '<div class="inline">
					<li><a href="'.$print->url.'" target="'.$print->target.'"><h4 class="subtitle">'.$print->titulo.'</h4></a></li>
				</div>';
	}

	echo '</div>';
	}

?>
<!-- fim do menu secundario -->


<!-- BANNER FILME -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <?php
    $pesquisaBanner = $mysqli->query("SELECT * FROM `banners_paginas` WHERE `id` = 3");
        while ($printBanner = $pesquisaBanner->fetch_object()) {
            echo '<div class="banner_pagina" alt="banner-cinemateca" style="background-image: url('.$printBanner->url.');"></div>';
        }
    ?>
	</div>
</div>
<!-- FIM DO BANNER FILME -->


<!-- INTRO E MORADA  -->
<div class="row nopadding" >
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">

        <?php
		$pesquisa = $mysqli->query("SELECT * FROM `moradas_contactos` WHERE `id` = 2");
        while ($printinfo = $pesquisa->fetch_object()) {
        echo  
            
        '<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 nopadding morada" id="infogeral">
            <h4>'.$printinfo->titulo.'</h4><br>
            <iframe src="'.$printinfo->mapa.'"></iframe>
            <p>'.$printinfo->morada.'</p>
            <p>'.$printinfo->telefone.'</p>
            <a href="mailto:cinemateca@cinemateca.pt">'.$printinfo->email.'</a>
        </div>';
        }
        ?>

        <?php
            $pesquisa = $mysqli->query("SELECT * FROM `info_geral` WHERE `id` = 3");
            if ($pesquisa->num_rows > 0) {
                while ($printinfo = $pesquisa->fetch_object()) {
                echo
                $printinfo->conteudo;
                }
            }
        ?>
         
    </div>
</div>
<!-- FIM INTRO E MORADA  -->


<!-- GALERIA -->
<div class="row nopadding ">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding margin-top-100 margin-bottom-100">

    <div class="galeria-cinematecajunior">

        <?php
        $pesquisaSlide4 = $mysqli->query("SELECT * FROM `slides` WHERE `fkgrupo_slides` = 4");
        if ($pesquisaSlide4->num_rows > 0) {
            while ($printSlide4 = $pesquisaSlide4->fetch_object()) {
                echo 
                '<div class="slide">
                    <img src="'.$printSlide4->img.'">
                </div>';
            }
        }
        ?>

    </div>

    </div>
</div>
<!-- GALERIA -->



<!--  FAMILIA -->
<div class="row nopadding ">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding margin-bottom-50">
        <?php
            $pesquisa = $mysqli->query("SELECT * FROM `info_geral` WHERE `id` = 9");
            if ($pesquisa->num_rows > 0) {
                while ($printinfo = $pesquisa->fetch_object()) {
                echo
                '<h2 id="familias">'.$printinfo->titulo.'</h2>
                <div class="familia-banner" alt="familia-banner" style="background-image: url('.$printinfo->img.')"></div>
                <p>'.$printinfo->conteudo.'</p>';
                }
            }
        ?>
    </div>
</div>



<div class="row nopadding ">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding margin-bottom-100">
        <h2>SÁBADOS [15h]</h2>
        <div class="slider_cinematecajunior">
            <?php
            $pesquisa = $mysqli->query("SELECT * FROM `sabados_emfamilia`");
            if ($pesquisa->num_rows > 0) {
                while ($printSabado = $pesquisa->fetch_object()) {
                    $pesquisafilme = $mysqli->query("SELECT * FROM `filmes` WHERE `id` = $printSabado->fk_filme");
                    if ($pesquisafilme->num_rows>0) {
                        $printfilme = $pesquisafilme->fetch_object();
                        echo
                        '<div class="slide content-box">
                            <div class="img-programacao" style="background-image: url('.$printfilme->url.')" alt="">
                            </div> 
                                <div class="content-overlay">
                                    <h5><a href="filme.php?id='.$printfilme->id.'" target="_self" style="color:#FCFCFE;">'.$printfilme ->titulo.'</a></h5>
                                </div>
                        </div>';
                    }
                }
            }
            ?>
        </div>
    </div>
</div>

<div class="row nopadding ">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding margin-bottom-100">
        <?php
        $pesquisa = $mysqli->query("SELECT * FROM `sabados_emfamilia`");
            if ($pesquisa->num_rows > 0) {
                while ($printSabado = $pesquisa->fetch_object()) {
                    $pesquisafilme = $mysqli->query("SELECT * FROM `filmes` WHERE `id` = $printSabado->fk_filme");
                    if ($pesquisafilme->num_rows>0) {
                        $printfilme = $pesquisafilme->fetch_object();
                        echo 

                        '<div class=" info-filme inline-block col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding" style=" margin-bottom:25px;">
                            <h4>'.$printSabado->dia_mes.' <a href="filme.php?id='.$printfilme->id.'" target="'.$printfilme->target.'" style="padding-left:30px; padding-right:30px;">'.$printfilme ->titulo.' </a> | ';  
                            
                            $pesquisaSala = $mysqli->query("SELECT * FROM `salas` WHERE `id`=$printSabado->fk_sala");
                            //print da sala
                            if ($pesquisaSala->num_rows > 0) {
                                while ($printSala = $pesquisaSala->fetch_object()) {
                                    echo $printSala->nome;
                                }
                            }
                    
                       echo '</h4>
                       <p style="padding-left:90px; padding-top: 15px;">'.$printfilme->realizador.' | '.$printfilme->ano.' | '.$printfilme->duracao.' min</p>
                       </div>';
                    }
                }
            }
        ?>
    </div>
</div>
                            
           

<!--  FIM FAMILIA -->



<!--  ESCOLAS E GRUPOS -->
<div class="row nopadding ">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding margin-bottom-100">
    <?php
        $pesquisa = $mysqli->query("SELECT * FROM `info_geral` WHERE `id` = 11");
        if ($pesquisa->num_rows > 0) {
            while ($printinfo = $pesquisa->fetch_object()) {
            echo
            '<h2 id="escolasgrupos">'.$printinfo->titulo.'</h2>
            <div class="escolasgrupos-banner" alt="escolasgrupos"  style="background-image: url('.$printinfo->img.')"></div>
            <p>'.$printinfo->conteudo.'</p><br>';
            }
        }
    ?>

    <?php
        $pesquisa = $mysqli->query("SELECT * FROM `info_geral` WHERE `id` = 20");
        if ($pesquisa->num_rows > 0) {
            while ($printinfo = $pesquisa->fetch_object()) {
            echo
            '<h3 class="margin-top-50">'.$printinfo->titulo.'</h3><br>
            <p>'.$printinfo->conteudo.'</p>';
            }
        }
    ?>      

    <?php
    //aceder a tabela dos acordeoes
        $pesquisaAcordeao = $mysqli->query("SELECT * FROM `acordeoes` WHERE `fk_grupo` = 1");
        if ($pesquisaAcordeao->num_rows > 0) {
            while ($printAcordeao = $pesquisaAcordeao->fetch_object()) {
            $grupo = $printAcordeao->fk_grupo;
                   
            echo 
            '<div class="separador" data-open="false">
                <h4 class="titulo_separador">'.$printAcordeao->titulo.'<img src="img/seta.svg" class="seta"></h4>
                <div class="separador_texto"><p>'.$printAcordeao->conteudo.'</p></div>       
            </div>';  
            }
        }
    ?>

    </div>
</div>
<!--  FIM ESCOLAS E GRUPOS -->



<!--  ESCOLAS E GRUPOS -->
<div class="row nopadding ">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding margin-bottom-50">
        <h2 id="acinematecavaiacasa">A CINEMATECA JÚNIOR VAI A CASA</h2>
    </div>
</div>

<div class="row nopadding ">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding margin-bottom-100">

        <h3>Cinemateca Digital & Cinemateca Júnior</h3><br>
        
        <div class="slider_cinematecas">

            <?php
            $pesquisaSlide5 = $mysqli->query("SELECT * FROM `slides` WHERE `fkgrupo_slides` = 5");
            if ($pesquisaSlide5->num_rows > 0) {
                while ($printSlide5 = $pesquisaSlide5->fetch_object()) {
                    echo 
                    '<div class="slide">
                        <img src="'.$printSlide5->img.'">
                        <h4 class="slide-title">'.$printSlide5->nome.'</h4>
                        <p>'.$printSlide5->info.'</p>
                    </div>';
                }
            }
            ?>

        </div>

        <h3 class="margin-top-100">Oficinas</h3><br>

        <div class="slider_oficinas">
        
            <?php
            $pesquisaSlide6 = $mysqli->query("SELECT * FROM `slides` WHERE `fkgrupo_slides` = 6");
            if ($pesquisaSlide6->num_rows > 0) {
                while ($printSlide6 = $pesquisaSlide6->fetch_object()) {
                    echo 
                    '<div class="slide">
                        <img src="'.$printSlide6->img.'">
                        <h4 class="slide-title">'.$printSlide6->nome.'</h4>
                    </div>';
                }
            }
            ?>

        </div>

    </div>
</div>



<?php include('includes/footer.php'); ?>


</body>
</html>