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
		$idProgDia = $_GET['id'];
		$pesquisa = $mysqli->query("SELECT * FROM `programacao_dia` WHERE `id` = '$idProgDia'");
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
		$idprog = $_POST['idprog'];	
		$hora = $_POST['hora'];
		$fk_filme = $_POST['fk_filme'];
		$fk_sala = $_POST['fk_sala'];
		$fk_ciclo = $_POST['fk_ciclo'];
		$fk_diasemana = $_POST['fk_diasemana'];


		// Validacoes dos dados da tabela
		if (!empty($hora) && !empty($fk_filme) && !empty($fk_sala) && !empty($fk_ciclo) && !empty($fk_diasemana)) {
		
			// Query de insercao
			$editar = $mysqli->query("UPDATE `programacao_dia` SET 
			`hora` = '$hora',
			`fk_filme` = '$fk_filme',
			`fk_sala` = '$fk_sala',
			`fk_ciclo` = '$fk_ciclo',
			 `fk_diasemana` = '$fk_diasemana'

			WHERE
			`id` = '$idProgDia'
			");

		
			if ($editar) {
				$erro = '<div class="alert alert-success">Programação inserida com sucesso!</div>';
				header('Refresh:2; url=prog_dia.php');
			}else{
				$erro = '<div class="alert alert-danger">Houve um erro de conexao a base de dados!</div>';	
			}

		}else{
			if (!empty($erroIMG)) {
				$erro = '<div class="alert alert-danger">'.$erroIMG.'</div>';	
			}else{
				$erro = '<div class="alert alert-danger">Todos os campos sao obrigatorios!</div>';	
			}
			
		}

						
		}
	



?>
<!DOCTYPE html>
<html>
<head>
	<title>Backend - Editar Programação do Dia</title>
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
		<h1 class="titulo-crm">EDITAR PROGRAMAÇÃO DO DIA</h1>
		<h6 class="descricao-crm">Aqui editamos a programação do dia.</h6>
	</section>
	<section class="dados-lista">
		<?php 

		if ($erro != '') {
			echo $erro;
		}
	
		?>
		<!-- Form de introducao de dados -->
		<form method="POST" action=""  enctype="multipart/form-data">
		<input type="hidden" name="idprog" value="<?php echo $idProgDia; ?>">
		
			<div class="row-no-padding">
			<div class="col-md-6">
					<label>
						HORA<br>
						<input type="text" name="hora" placeholder="HORA" value="<?php echo $print->hora; ?>">
					</label>
				</div>
				<div class="col-md-6">
					<label>
						FK_FILME<br>
						<select name="fk_filme">
						<?php
							$pesquisa = $mysqli->query("SELECT * FROM `filmes`");
							if ($pesquisa->num_rows > 0) {
								while ($printfilme = $pesquisa->fetch_object()) {
									if ($printfilme->id == $print->fk_filme) {
										echo '<option value="' . $printfilme->id . '" selected>'. $printfilme->id . "." . $printfilme->titulo . '</option>';
									} else {
										echo '<option value="' . $printfilme->id . '">'. $printfilme->id . "." . $printfilme->titulo . '</option>';
									}
								}
							}
							?>

						</select>
					</label>
				</div>
				<div class="col-md-6">
					<label>
						FK_SALA<br>
						<select name="fk_sala">
						<?php
							$pesquisa = $mysqli->query("SELECT * FROM `salas`");
							if ($pesquisa->num_rows > 0) {
								while ($printsala = $pesquisa->fetch_object()) {
									if ($printsala->id == $print->fk_sala) {
										echo '<option value="' . $printsala->id . '" selected>'. $printsala->id . "." . $printsala->nome . '</option>';
									} else {
										echo '<option value="' . $printsala->id . '">'. $printsala->id . "." . $printsala->nome . '</option>';
									}
								}
							}
						?>
						</select>
					</label>
				</div>
				<div class="col-md-6">
					<label>
						FK_CICLO<br>
						<select name="fk_ciclo">
						<?php
							$pesquisa = $mysqli->query("SELECT * FROM `ciclos`");
							if ($pesquisa->num_rows > 0) {
								while ($printciclo = $pesquisa->fetch_object()) {
									if ($printciclo->id == $print->fk_ciclo) {
										echo '<option value="' . $printciclo->id . '" selected>'. $printciclo->id . "." . $printciclo->titulo . '</option>';
									} else {
										echo '<option value="' . $printciclo->id . '">'. $printciclo->id . "." . $printciclo->titulo . '</option>';
									}
								}
							}
						?>
							</select>
					</label>
				</div>
				<div class="col-md-6">
					<!--<label>
						FK_SEMANA<br>
						<select name="fk_semana">
						<?php/*
							$pesquisa = $mysqli->query("SELECT * FROM `programacao_semana`");
							if ($pesquisa->num_rows > 0) {
								while ($printsemana = $pesquisa->fetch_object()) {
									if ($printsemana->id == $print->fk_semana) {
										echo '<option value="' . $printsemana->id . '" selected>'. $printsemana->id . "." . $printsemana->semana . '</option>';
									} else {
										echo '<option value="' . $printsemana->id . '">'. $printsemana->id . "." . $printsemana->semana . '</option>';
									}
								}
							}
						*/?>
								
						</select>
					</label>-->
				</div>
				<div class="col-md-6">
					<label>
						FK_DIASEMANA<br>
						<select name="fk_diasemana">
						<?php
							$pesquisa = $mysqli->query("SELECT * FROM `dia_semana`");
							if ($pesquisa->num_rows > 0) {
								while ($printdia= $pesquisa->fetch_object()) {
									if ($printdia->id == $print->fk_diasemana) {
										echo '<option value="' . $printdia->id . '" selected>'. $printdia->id . "." . $printdia->dia . '</option>';
									} else {
										echo '<option value="' . $printdia->id . '">'. $printdia->id . "." . $printdia->dia . '</option>';
									}
								}
							}
						?>
						</select>
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