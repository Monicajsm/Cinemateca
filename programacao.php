<?php  
	require_once 'admin/functions/dbconfig.php';
	$idCiclo = 0;
	$idFilme = 0;
    $mostraSeccaoImagem = 1;

?>

<!DOCTYPE html>
<html style="margin-top:0px">
<head>
	<title><?php echo "Programação" ?></title>
	<link rel="icon" type="logo" href="img/logo.svg">
	<meta name="keywords" content="filmes, ciclos, programacao, sessao">
	<meta name="description" content="programacao diaria, semanal e mensal da cinemateca portuguesa, organizada por ciclos">
	<meta name="author" content="Monica Marques">
	<?php include('includes/head.php'); ?>
</head>

<body style="margin-top:0px;">

<div class="container-fluid">

<?php include('includes/header.php'); ?>

<main>

<div class="row" id="programacao">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h1 class="main-page-title">PROGRAMAÇÃO</h1>
	</div>
</div>


<!-- MENU SECUNDARIO -->

	<?php

	$pesquisa = $mysqli->query("SELECT * FROM `menus` WHERE `id` = 3 ORDER BY `ordem` ASC");
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
		



<!-- TABELA PROGRAMACAO -->
<?php include('includes/tabelaprogramacao.php'); ?>
<!-- FIM TABELA PROGRAMACAO -->


<!-- CICLOS -->
<div class="row nopadding" id="ciclos">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" > 
		<h2> CICLOS </h2>
	</div>
</div>

<div class="row nopadding">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
    <div class="slider_ciclos">
    
		<?php
		$pesquisa = $mysqli->query("SELECT * FROM `ciclos` ORDER BY `id`");
		while ($print = $pesquisa->fetch_object()){
			echo '<div class=" silde ciclos">
			<h3 class="slide-title">'.$print->titulo.'</h3>
			<h3 class="subtitle">'.$print->data.'</h3><br>
			<img src="'.$print->img.'" alt="recklessmoment" class="imagem-ciclo">
			<a href="ciclo.php?id='.$print->id.'" target="'.$print->target.'"><button class="vermais">VER CICLO</button></a>
			</div>';
		}
		?>

	<!-- BOTAO PREV NEXT -->    
	<button class="prev-next-ciclos prev-ciclos"> <img src="img/arrow-back.svg" class="arrow"> Anterior </button>
    <button class="prev-next-ciclos next-ciclos"> Próximo <img src="img/arrow-after.svg" class="arrow"> </button> 
    <!-- FIM BOTAO PREV NEXT --> 

	</div> 
</div>
<!-- FIM CICLOS -->


<?php include('includes/footer.php'); ?>


</body>
</html>