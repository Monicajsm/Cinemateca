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
		$idMC = $_GET['id'];
		$pesquisa = $mysqli->query("SELECT * FROM `moradas_contactos` WHERE `id` = '$idMC'");
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
		$morada = $_POST['morada'];
		$titulo = $_POST['titulo'];
		$idmc = $_POST['idmc'];
		$email = $_POST['email'];
		$telefone = $_POST['telefone'];
		$mapa = $_POST['mapa'];


		
		$target = 'Cinemateca/img/';
		$targetBACKEND = '../'.$target;

		if (!is_dir($targetBACKEND)) {
			// CHMOD
			mkdir($targetBACKEND, $chmodDir, true);
		}

	

		// Validacoes dos dados da tabela
		if (!empty($morada) && !empty($titulo)  && !empty($email)  && !empty($telefone)  && !empty($mapa)) {
		
			// Query de insercao
			$editar = $mysqli->query("UPDATE `moradas_contactos` SET 
			`morada` = '$morada',
			`telefone` = '$telefone',
			`email` = '$email',
			`mapa` = '$mapa',
			`titulo` = '$titulo'
			WHERE
			`id` = '$idMC'
			");

		
			if ($editar) {
				$erro = '<div class="alert alert-success">Moradas e Contactos inseridos com sucesso!</div>';
				header('Refresh:2; url=moradas_contactos.php');
			}else{
				$erro = '<div class="alert alert-danger">Houve um erro de conexao a base de dados!</div>';	
			}
						


		}
	}

	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Backend - Editar Moradas e Contactos</title>
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
		<h1 class="titulo-crm">EDITAR MORADAS E CONTACTOS</h1>
		<h6 class="descricao-crm">Aqui editamos as moradas e contactos da instituição.</h6>
	</section>
	<section class="dados-lista">
		<?php 

		if ($erro != '') {
			echo $erro;
		}
	
		?>
		<!-- Form de introducao de dados -->
		<form method="POST" action=""  enctype="multipart/form-data">
		<input type="hidden" name="idmc" value="<?php echo $idMC; ?>">
	

			<div class="row-no-padding">
				<div class="col-md-6">
					<label>
						TITULO<br>
						<input type="text" name="titulo" placeholder="TITULO" value="<?php echo $print->titulo; ?>">
					</label>
				</div>
				<div class="col-md-6">
					<label>
						MORADA<br>
						<textarea placeholder="MORADA" name="morada" value="<?php echo $print->morada; ?>"></textarea>
					</label>
				</div>
				<div class="col-md-6">
					<label>
						MAPA<br>
						<textarea placeholder="MAPA" name="mapa" value="<?php echo $print->mapa; ?>"></textarea>
					</label>
				</div>
				<div class="col-md-6">
					<label>
						TELEFONE<br>
						<textarea placeholder="TELEFONE" name="telefone" value="<?php echo $print->telefone; ?>"></textarea>
					</label>
				</div>
				<div class="col-md-6">
					<label>
						EMAIL<br>
						<textarea placeholder="EMAIL" name="email" value="<?php echo $print->email; ?>"></textarea>
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