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

	// Se Post estiver definidos
	if(isSet($_POST['enviar']) && $_POST['enviar']!=''){
		// guardar dados em variaveis
		$dia_mes = $_POST['dia_mes'];
		$fk_filme = $_POST['fk_filme'];
		$fk_sala = $_POST['fk_sala'];
	
		
		$target = 'img/';
		$targetBACKEND = '../'.$target;

		if (!is_dir($targetBACKEND)) {
			// CHMOD
			mkdir($targetBACKEND, $chmodDir, true);
		}



		// Validacoes dos dados de Administrador
		if (!empty($dia_mes) && !empty($fk_filme)  && !empty($fk_sala)) {
		
			// Query de insercao
			$inserir = $mysqli->query("INSERT INTO `sabados_emfamilia` (
				`id`,
				`dia_mes`,
				`fk_filme`,
				`fk_sala`
				) VALUES (
				default,
				'$dia_mes',
				'$fk_filme',
				'$fk_sala'
			)");

			if ($inserir) {
				$erro = '<div class="alert alert-success">Sábado inserido com sucesso!</div>';
				header('Refresh:2; url=sabados_emfamilia.php');
			}else{
				$erro = '<div class="alert alert-danger">Houve um erro de conexao a base de dados!</div>';	
			}
						
		}
	}
	

?>
<!DOCTYPE html>
<html>
<head>
	<title>Backend - Novo Sábado</title>
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
		<h1 class="titulo-crm">NOVO SÁBADO</h1>
		<h6 class="descricao-crm">Aqui adicionamos um novo sábado à programação da Cinemateca Júnior.</h6>
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
						DIA_MES<br>
						<input type="text" name="dia_mes" placeholder="SÁBADO">
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
				
				
				

				<div class="col-md-12 lista-btns">
					<input class="btn" type="submit" name="enviar" value="GUARDAR">
				</div>
			</div>
		</form>
</section>


	<?php include('includes/footer.php'); ?>
</body>

</html>