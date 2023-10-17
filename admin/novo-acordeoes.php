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
		$titulo = $_POST['titulo'];
		$conteudo = $_POST['conteudo'];
		$ordem = $_POST['ordem'];
		$fk_grupo = $_POST['fk_grupo'];

		

		// Validacoes dos dados de Administrador
		if (!empty($titulo) && !empty($conteudo) && !empty($ordem) && !empty($fk_grupo)) {
		
			// Query de insercao
			$inserir = $mysqli->query("INSERT INTO `acordeoes` (
				`id`,
				`titulo`,
				`conteudo`,
				`ordem`,
				`fk_grupo`
				) VALUES (
				default,
				'$titulo',
				'$conteudo',
				'$ordem',
				'$fk_grupo'
			)");
			
			if ($inserir) {
				$erro = '<div class="alert alert-success">Acordeão inserido com sucesso!</div>';
				header('Refresh:2; url=acordeoes.php');
			}else{
				$erro = '<div class="alert alert-danger">Houve um erro de conexao a base de dados!</div>';	
			}
		}
	}

		
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Backend - Novo Acordeão</title>
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
		<h1 class="titulo-crm">NOVO ACORDEÃO</h1>
		<h6 class="descricao-crm">Adicionar um novo acordeão ao site.</h6>
	</section>
	<section class="dados-lista">
		<?php 

		if ($erro != '') {
			echo $erro;
		}
		?>
		<!-- Form de introducao de dados -->
		<form method="POST" action=""  enctype="multipart/form-data">
			<div class="row-no-padding">
				<div class="col-md-6">
					<label>
						TITULO<br>
						<input type="text" name="titulo" placeholder="TITULO">
					</label>
				</div>
				<div class="col-md-6">
					<label>
						CONTEUDO<br>
						<textarea placeholder="CONTEUDO" name="conteudo"></textarea>
					</label>
				</div>
				<div class="col-md-6">
					<label>
						ORDEM<br>
						<input type="text" name="ordem" placeholder="ORDEM">
					</label>
				</div>
				<div class="col-md-6">
					<label>
						FK_GRUPO<br>
						<select name="fk_grupo">
								<?php 
								echo '<option value-min="1" value-max="10"></option>';

								$pesquisa = $mysqli->query("SELECT * FROM `grupos_acordeoes` WHERE `id`");
								if ($pesquisa->num_rows>0) {
									while ($print = $pesquisa->fetch_object()) {
										echo '<option value="'.$print->id.'">'.$print->nome.'</option>';
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