<?php  
	require_once 'admin/functions/dbconfig.php';
	
	if (isset($_GET['id']) && $_GET['id'] != '') {
		$idCiclo = $_GET['id'];
		$pesquisa = $mysqli->query("SELECT * FROM `ciclos` WHERE `id` = '$idCiclo'");
		if($pesquisa->num_rows>0){
			$printciclo = $pesquisa->fetch_object();
		}else{
			header("Location: 404.php");
			exit();
		}
	}else{
		header("Location: 404.php");
		exit();
	}

	$variavel = $printciclo->titulo;

	$idCiclo = $printciclo->id;

	$idFilme = 0;
	$mostraSeccaoImagem = 1;



?>

<!DOCTYPE html>
<html style="margin-top:0px">
<head>
	<title><?php echo $variavel ?></title>
	<link rel="icon" type="logo" href="img/logo.svg">
	<meta name="keywords" content="realizadores, ciclos, sessoes, filmes">
	<meta name="description" content="pagina de um ciclo de cinema da cinemateca, organizada em sessoes dos filmes de cada ciclo">
	<meta name="author" content="Monica Marques">
	<?php include('includes/head.php'); ?>
</head>

<body style="margin-top:0px;">

<div class="container-fluid">

<?php include('includes/header.php'); ?>

<main>


<!-- BREADCRUMBS -->
<div class="row breadcrumbs">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<a href="programacao.php" target="_self">PROGRAMACÃO</a> <img src="img/arrow-after.svg" class="arrow"> <a href="ciclo.php?id=<?php echo $printciclo->id ?>" target="_self"><?php echo $printciclo->titulo; ?></a>
	</div>
</div>
<!-- FIM DOS BREADCRUMBS -->


<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h1 style="margin-top:0px"><?php echo $printciclo->titulo; ?></h1>

		<!-- MENU SECUNDARIO -->
		<ul class="nopadding" style="list-style-type:none">
		<?php
		$pesquisa = $mysqli->query("SELECT * FROM `menus` WHERE `id` >= 23 and `id` <= 24 ORDER BY `ordem` ASC");
		while ($print = $pesquisa->fetch_object()){
		$id = $print->id;
		echo '<li style="padding-right: 50px; padding-top:50px;"><a href="'.$print->url.'" target="'.$print->target.'"><h4 class="subtitle">'.$print->titulo.'</h4></a></li>';
		}
		?>
		</ul>
		<!-- FIM MENU SECUNDARIO -->
		
	</div>
</div>

<br><br>

<!-- BANNER -->
<?php include('includes/banner.php'); ?>
<!-- FIM DO BANNER -->

<br><br>

<!-- SINOPSE -->
<div class="sinopse">
	<p><?php echo $printciclo->conteudo; ?></p>
</div>
<!-- FIM DA SINOPSE -->



<!-- TABELA PROGRAMACAO -->

<h2 style="margin-bottom:0px" id="sessoes">SESSÕES</h2>

<?php include('includes/tabelaprogramacao.php'); ?>
<!-- FIM TABELA PROGRAMACAO -->



<?php include('includes/footer.php'); ?>


</body>
</html>




