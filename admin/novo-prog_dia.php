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

	// Variavel de controlo de erro
	$erro = '';

	// Se Post estiver definido
	if(isSet($_POST['enviar']) && $_POST['enviar']!=''){
		// guardar dados em variaveis
		$hora = $_POST['hora'];
		$fk_filme = $_POST['fk_filme'];
		$fk_sala = $_POST['fk_sala'];
		$fk_ciclo = $_POST['fk_ciclo'];
		$fk_diasemana = $_POST['fk_diasemana'];
	
		$target = 'img/';
		$targetBACKEND = '../'.$target;

		if (!is_dir($targetBACKEND)) {
			// CHMOD
			mkdir($targetBACKEND, $chmodDir, true);
		}


		// Validacoes dos dados de Administrador
		if (!empty($hora) && !empty($fk_filme) && !empty($fk_sala) && !empty($fk_ciclo) && !empty($fk_diasemana)) {
		
			// Query de insercao
			$inserir = $mysqli->query("INSERT INTO `programacao_dia` (
				`id`,
				`hora`,
				`fk_filme`,
				`fk_sala`,
				`fk_ciclo`,
				`fk_diasemana`
				) VALUES (
				default,
				'$hora',
				'$fk_filme',
				'$fk_sala',
				'$fk_ciclo',
				'$fk_diasemana'

			)");
			if ($inserir) {
				$erro = '<div class="alert alert-success">Categoria inserido com sucesso!</div>';
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
	<title>Backend - Nova Programação do Dia</title>
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
		<h1 class="titulo-crm">NOVA PROGRAMAÇÃO DO DIA</h1>
		<h6 class="descricao-crm">Adicionar uma nova linha de Programação do dia.</h6>
	</section>
	<section class="dados-lista">
		<?php 

		if ($erro != '') {
			echo $erro;
		}
	
		?>
		<!-- Form de introdução de dados -->
		<form method="POST" action=""  enctype="multipart/form-data">
			<div class="row-no-padding">
				<div class="col-md-6">
					<label>
						HORA<br>
						<input type="text" name="hora" placeholder="HORA">
					</label>
				</div>
				<div class="col-md-6">
					<label>
						FK_FILME<br>
						<select name="fk_filme">
								<?php 
								echo '<option value-min="1" value-max="50"></option>';

								$pesquisa = $mysqli->query("SELECT * FROM `filmes` WHERE `id`");
								if ($pesquisa->num_rows>0) {
									while ($print = $pesquisa->fetch_object()) {
										echo '<option value="'.$print->id.'">'.$print->titulo.'</option>';
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
								echo '<option value-min="1" value-max="5"></option>';

								$pesquisa = $mysqli->query("SELECT * FROM `salas` WHERE `id`");
								if ($pesquisa->num_rows>0) {
									while ($print = $pesquisa->fetch_object()) {
										echo '<option value="'.$print->id.'">'.$print->nome.'</option>';
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
								echo '<option value-min="1" value-max="10"></option>';

								$pesquisa = $mysqli->query("SELECT * FROM `ciclos` WHERE `id`");
								if ($pesquisa->num_rows>0) {
									while ($print = $pesquisa->fetch_object()) {
										echo '<option value="'.$print->id.'">'.$print->titulo.'</option>';
									}
								}
								?>
							</select>
					</label>
				</div>
				
				<div class="col-md-6">
					<label>
						FK_DIASEMANA<br>
						<select name="fk_diasemana">
								<?php 
								echo '<option value-min="1" value-max="6"></option>';

								$pesquisa = $mysqli->query("SELECT * FROM `dia_semana` WHERE `id`");
								if ($pesquisa->num_rows>0) {
									while ($print = $pesquisa->fetch_object()) {
										echo '<option value="'.$print->id.'">'.$print->dia.'</option>';
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