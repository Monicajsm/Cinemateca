<?php
	if (!isset($_SESSION)) {
	  	session_start();
	}  
	require_once 'functions/dbconfig.php';

	if (isset($_SESSION['login']) && $_SESSION['login'] == $ss) {
		// code...
	}else{
		header("Location: logout.php");
		exit();
	}

	if (isset($_GET['id']) && $_GET['id'] != '') {
		$idDia = $_GET['id'];
		$pesquisa = $mysqli->query("SELECT * FROM `dia_semana` WHERE `id` = '$idDia'");
		if($pesquisa->num_rows>0){
			$print = $pesquisa->fetch_object();
		}else{
			header("Location: logout.php");
			exit();
		}
	}else{
		header("Location: logout.php");
		exit();
	}

	// Variavel de controlo de erro
	$erro = '';


	// Se Post estiver definido
	if(isSet($_POST['enviar']) && $_POST['enviar']!=''){
		// guardar dados em variaveis
		$dia = $_POST['dia'];
		$dia_mes = $_POST['dia_mes'];
	

		// Validacoes dos dados da tabela
		if (!empty($dia)) {
		
			// Query de insercao
			$editar = $mysqli->query("UPDATE `dia_semana` SET 
			`dia` = '$dia',
			`dia_mes` = '$dia_mes'
	
			WHERE
			`id` = '$idDia'
			");

		
			if ($editar) {
				$erro = '<div class="alert alert-success">Dia inserido com sucesso!</div>';
				header('Refresh:2; url=dia_semana.php');
			}else{
				$erro = '<div class="alert alert-danger">Houve um erro de conexao a base de dados!</div>';	
			}
		}
						
			
	}

	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Backend - Editar Dia da Semana</title>
	<meta name="keywords" content="Backend Mónica Marques">
	<meta name="description" content="Backend Marques">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--BOOTSTRAP -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	<!-- STYLE SHEET -->
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<script src="js/jquery-3.6.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<script src="js/scripts.js"></script>
</head>
<body class="body">	
	<?php include('includes/header.php'); ?>
	
	<section class="cabecalho">
		<h1 class="titulo-crm">EDITAR DIA</h1>
		<h6 class="descricao-crm">Aqui editamos o dia da semana.</h6>
	</section>
	<section class="dados-lista">
		<?php 

		if ($erro != '') {
			echo $erro;
		}
	
		?>
		<!-- Form de introducao de dados -->
		<form method="POST" action=""  enctype="multipart/form-data">
		<input type="hidden" name="dia" value="<?php echo $idDia; ?>">

			<div class="row-no-padding">
				<div class="col-md-6">
					<label>
						DIA<br>
						<input type="text" name="dia" placeholder="DIA" value="<?php echo $print->dia; ?>">
					</label>
				</div>
				<div class="col-md-6">
					<label>
						DIA_MES<br>
						<input type="text" name="dia_mes" placeholder="DIA_MES" value="<?php echo $print->dia_mes; ?>">
					</label>
				</div>
			

				<div class="col-md-12 lista-btns">
					<input class="btn" type="submit" name="enviar" value="GUARDAR">
				</div>
			</div>
		</form>
</section>


	<?php include('includes/footer.php'); ?>
</body>

</html>