<?php  
	require_once 'admin/functions/dbconfig.php';

	if (isset($_GET['id']) && $_GET['id'] != '') {
		$id = $_GET['id'];
		$pesquisa = $mysqli->query("SELECT * FROM `filmes` WHERE `id` = '$id'");
		if($pesquisa->num_rows>0){
			$printfilme = $pesquisa->fetch_object();
		}else{
			header("Location: 404.php");
			exit();
		}
	}else{
		header("Location: 404.php");
		exit();
	}

	$titulo_filme = $printfilme->titulo;

	$idFilme = $printfilme->id;
	$idCiclo=0;
	$mostraSeccaoImagem = 0;

?>

<!DOCTYPE html>
<html style="margin-top:0px">
<head>
	<title><?php echo $titulo_filme ?></title>
	<link rel="icon" type="logo" href="img/logo.svg">
	<meta name="keywords" content="Filme, Sessao, Cinema, Elenco, Duracao, Realizador">
	<meta name="description" content="Pagina dedicada ao filme, organizada com a informacao especifica de cada filme">
	<meta name="author" content="Monica Marques">
	<?php include('includes/head.php'); ?>
</head>

<body style="margin-top:0px">

<div class="container-fluid">

<?php include('includes/header.php'); ?>

<main>

<!-- BREADCRUMBS -->
<div class="row breadcrumbs">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<?php 
	$pesquisa = $mysqli->query("SELECT * FROM `ciclos` WHERE `id`='$printfilme->fk_ciclo'");
	while ($print = $pesquisa->fetch_object()){;
			echo '<a href="ciclo.php?id='.$print->id.'" target="">'.$print->titulo.' ';
		}
	?>
		</a> <img src="img/arrow-after.svg" class="arrow"> <a href="filme.php?id=<?php echo $printfilme->id ?>" target="<?php echo $printfilme->target ?>"><?php echo $printfilme->titulo ?></a>
	</div>
</div>
<!-- FIM DOS BREADCRUMBS -->



<!-- BANNER FILME -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="banner_filme" alt="banner-filme" style="background-image: url(<?php echo $printfilme->url; ?>);"><h1 style="color: #FCFCFE" class="movie-name"><?php echo $printfilme->titulo ?><h1></div>
	</div>
</div>
<!-- FIM DO BANNER FILME -->



<!-- SINOPSE -->
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div>
		<h2>SINOPSE</h2>
		<br>
		<p><?php echo $printfilme->sinopse ?></p>
	</div>
	</div>
</div>
<!-- FIM SINOPSE -->



<!-- IMAGENS DO FILME -->
<div class="row margin-top-50">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<img src="<?php echo $printfilme->img ?>">	
	</div>
</div>

<!--FIM IMAGENS DO FILME -->


<!-- INFO SOBRE O FILME -->
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="detalhes_filme">
			<h2 class="detalhes-header">DETALHES DO FILME</h2>
	
			<div class="row nopadding">

			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 fichatecnica">
				<h4>REALIZADOR</h4><br>
				<p><?php echo $printfilme->realizador ?></p>
			</div>

			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 fichatecnica">
				<h4>ELENCO</h4><br>
				<p><?php echo $printfilme->elenco ?></p>
			</div>

			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 fichatecnica">
				<h4>PAÍS</h4><br>
				<p><?php echo $printfilme->pais ?></p>
			</div>

			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 fichatecnica">
				<h4>TÍTULO ORIGINAL</h4><br>
				<p><?php echo $printfilme->titulo_original ?></p>
			</div>

		</div>

		<div class="row nopadding">

			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 fichatecnica">
				<h4>LEGENDAS</h4><br>
				<p><?php echo $printfilme->legendas ?></p>
			</div>

			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 fichatecnica">
				<h4>LÍNGUA</h4><br>
				<p><?php echo $printfilme->lingua ?></p>
			</div>

			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 fichatecnica">
				<h4>DURAÇÃO</h4><br>
				<p><?php echo $printfilme->duracao ?> min</p>
			</div>

		</div>
	</div>
</div>
<!-- FIM INFO SOBRE O FILME -->



<!-- TRAILER -->
<!--<div class="row nopadding">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-top-50">
		<iframe width="100%" height="500px" src="https://www.youtube.com/embed/Q5elSi_04pM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
	</div>		
</div>
 FIM TRAILER -->





<!-- SESSOES -->
<!-- TABELA PROGRAMACAO -->
<?php include('includes/tabelaprogramacao.php'); ?>




<!--<div class="row nopadding">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h2>SESSÕES</h2>
	</div>
</div>

<div class="margin-top-50 margin-bottom-50">

<div class="row nopadding">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

	<div class="info-filme">

    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 nopadding">
        <h4>02.06  TER</h4>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <h4>15h30</h4>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
       <h4>ESPLANADA</h4>
    </div>

	</div>

	</div>
</div>-->


</div>
<!-- FIM SESSOES -->






<?php include('includes/footer.php'); ?>


</body>
</html>