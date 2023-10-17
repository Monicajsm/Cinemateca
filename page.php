<?php  
	require_once 'admin/functions/dbconfig.php';
	
	if (isset($_GET['id']) && $_GET['id'] != '') {
		$id = $_GET['id'];
		$pesquisa = $mysqli->query("SELECT * FROM `noticias` WHERE `id` = '$id'");
		if($pesquisa->num_rows>0){
			$print22 = $pesquisa->fetch_object();
		}else{
			header("Location: 404.php");
			exit();
		}
	}else{
		header("Location: 404.php");
		exit();
	}

	$variavel = $print22->titulo;
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $variavel; ?></title>
	<meta name="keywords" content="Projeto Hugo Vaz">
	<meta name="description" content="Projeto Hugo Vaz">
	<?php include('includes/head.php'); ?>
</head>
<body class="body">	
	<?php include('includes/header.php'); ?>
		<div class="container">
			<div class="row">
				<div class="col-md-12 clTitulo">
					<h1><?php echo $print22->titulo; ?></h1>
				</div>
				<div class="col-md-6 clImagem">
					<img src="<?php echo $print22->foto; ?>">
				</div>
				<div class="col-md-6 clDesc">
					<h3><?php echo $print22->breve; ?></h3>
					<h6><?php echo $print22->data; ?></h6>
				</div>
				<div class="col-md-12 clConteudo">
					<p><?php echo $print22->conteudo; ?></p>
				</div>
			</div>
		</div>
	<?php include('includes/footer.php'); ?>
</body>
</html>