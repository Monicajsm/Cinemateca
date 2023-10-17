<?php  
	require_once 'admin/functions/dbconfig.php';

?>

<!DOCTYPE html>
<html style="margin-top:0px">
<head>
	<title><?php echo "Colecções e Arquivos" ?></title>
    <link rel="icon" type="logo" href="img/logo.svg">
	<meta name="keywords" content="Arquivo, Coleccoes, Museu, Espolio, Documentos, Legado, Preservacao, Audiovisual">
	<meta name="description" content="Coleccoes e Arquivos da Cinemateca, as suas colecçoes, objectos, procedimentos, legados e contributo cultural">
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
            $pesquisa = $mysqli->query("SELECT * FROM `info_geral` WHERE `id` = 4");
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

	$pesquisa = $mysqli->query("SELECT * FROM `menus` WHERE `id` = 5 ORDER BY `ordem` ASC");
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
    $pesquisaBanner = $mysqli->query("SELECT * FROM `banners_paginas` WHERE `id` = 2");
        while ($printBanner = $pesquisaBanner->fetch_object()) {
            echo '<div class="banner_pagina" alt="banner-cinemateca" style="background-image: url('.$printBanner->url.');"></div>';
        }
    ?>
	</div>
</div>
<!-- FIM DO BANNER FILME -->


<!-- INTRO  -->
<div class="row ">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding" id="coleccoesarquivos">

        <?php
        $pesquisa = $mysqli->query("SELECT * FROM `info_geral` WHERE `id` = 4");
        if ($pesquisa->num_rows > 0) {
            while ($printinfo = $pesquisa->fetch_object()) {
            echo
            '<p>'.$printinfo->conteudo.'</p> </div>';
            }
        }
        ?>

	</div>
</div>
<!-- FIM INTRO -->


<!-- GALERIA E INFO  -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-bottom-100 margin-top-100">

        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
		    <div class="slider-galeria1">
                <?php
                $pesquisaSlide1 = $mysqli->query("SELECT * FROM `slides` WHERE `fkgrupo_slides` = 1");
                if ($pesquisaSlide1->num_rows > 0) {
                    while ($printSlide1 = $pesquisaSlide1->fetch_object()) {
                        echo 
                        '<div class="slide">
                            <img src="'.$printSlide1->img.'">
                        </div>';
                    }
                }
                ?>        
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 margin-top-50">
            <?php
            //aceder a tabela dos acordeoes
            $pesquisaAcordeao = $mysqli->query("SELECT * FROM `acordeoes` WHERE `fk_grupo` = 2");
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
</div>
<!-- FIM GALERIA E INFO  -->


<!-- SEPARADORES BIBLIOTECA E ARQUIVO FOTOGRAFICO  -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 margin-top-50">

        <?php
        //aceder a tabela dos acordeoes
        $pesquisaAcordeao = $mysqli->query("SELECT * FROM `acordeoes` WHERE `fk_grupo` = 3");
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
           
        
        <div class="slider-galeria2 margin-top-50">
            <?php
            $pesquisaSlide2 = $mysqli->query("SELECT * FROM `slides` WHERE `fkgrupo_slides` = 2");
            if ($pesquisaSlide2->num_rows > 0) {
                while ($printSlide2 = $pesquisaSlide2->fetch_object()) {
                    echo 
                    '<div class="slide">
                        <img src="'.$printSlide2->img.'">
                    </div>';
                }
            }
            ?>
        </div>

        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <?php
            $pesquisa = $mysqli->query("SELECT * FROM `info_geral` WHERE `id` = 13");
            while ($printinfo = $pesquisa->fetch_object()) {
            echo
            '<h2 id="arquivo">'.$printinfo->titulo.'</h2>
            <p>'.$printinfo->conteudo.'</p>
            <img src="'.$printinfo->img.'" alt="costa do castelo" class="costa-do-castelo">';
            }
            ?>
        </div>  

    </div>
</div>
<!-- FIM SEPARADORES BIBLIOTECA E ARQUIVO FOTOGRAFICO  -->



<!-- ARQUIVO FILMICO E VIDEOGRAFICO E SEPARADORES  -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-top-100">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

            <?php
            $pesquisa = $mysqli->query("SELECT * FROM `info_geral` WHERE `id` = 14");
            while ($printinfo = $pesquisa->fetch_object()) {
            echo

            '<h2 id="arquivofilmico">'.$printinfo->titulo.'</h2>
            <p>'.$printinfo->conteudo.'</p>
            <img src="'.$printinfo->img.'" alt="centro de conservacao" class="img-responsive margin-top-50 margin-bottom-50">';
            }
            ?>

        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 margin-top-50">
        
            <?php
            //aceder a tabela dos acordeoes
            $pesquisaAcordeao = $mysqli->query("SELECT * FROM `acordeoes` WHERE `fk_grupo` = 4");
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

            <div class="slider-galeria3 margin-top-50">
                <?php
                $pesquisaSlide3 = $mysqli->query("SELECT * FROM `slides` WHERE `fkgrupo_slides` = 3");
                if ($pesquisaSlide3->num_rows > 0) {
                    while ($printSlide3 = $pesquisaSlide3->fetch_object()) {
                        echo 
                        '<div class="slide">
                            <img src="'.$printSlide3->img.'">
                        </div>';
                    }
                }
                ?>
            </div> 
            
        </div>

    </div>
</div>
<!-- FIM ARQUIVO FILMICO E VIDEOGRAFICO E SEPARADORES   -->




<!-- CINEMATECA DIGITAL  -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-bottom-100">

            <?php
            $pesquisa = $mysqli->query("SELECT * FROM `info_geral` WHERE `id` = 15");
            if ($pesquisa->num_rows > 0) {
                while ($printinfo = $pesquisa->fetch_object()) {
                echo
                '<p>'.$printinfo->conteudo.'</p>';
                }
            }
            ?>
       
    </div>
</div>
<!-- FIM CINEMATECA DIGITAL -->



<?php include('includes/footer.php'); ?>


</body>
</html>
