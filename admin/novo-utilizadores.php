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
		$nome = $_POST['nome'];
		$apelido = $_POST['apelido'];
		$password = $_POST['password'];
		$password2 = $_POST['password2'];
		$email = $_POST['email'];
		// Variavel para tratamento da imagem
		$img = '';
		
		
		/************ TRATAMENTO DE IMAGEM **********/

		$target = 'img/';
		$targetBACKEND = '../'.$target;

		if (!is_dir($targetBACKEND)) {
			// CHMOD
			mkdir($targetBACKEND, $chmodDir, true);
		}
		$erroIMG = '';

		if (isset($_FILES['img']) && $_FILES['img']['name'] != '') {
			
			$locfile = $targetBACKEND.basename($_FILES['img']['name']);
			$extensao = strtolower(pathinfo($locfile, PATHINFO_EXTENSION));

			if ($extensao == 'png' || $extensao == 'jpg' || $extensao == 'jpeg' || $extensao == 'svg') {
				
				if (file_exists($locfile)) {
					$nomeFile = str_replace('.'.$extensao, '', $_FILES['img']['name']);
					$nomeFile = $nomeFile.'-'.rand(1000,9999);
					$nomeFile = $nomeFile.'.'.$extensao;
				}else{
					$nomeFile = $_FILES['img']['name'];
				}
				$locfile = $targetBACKEND.$nomeFile;

				
				if ($_FILES['img']['size'] <= 500000) {
					
					if (move_uploaded_file($_FILES['img']['tmp_name'], $locfile)) {
						$img = $target.$nomeFile;
					}else{
						$erroIMG = 'Existe um erro de permissoes no servidor.';
					}

				}else{
					$erroIMG = 'O nosso limite de upload é 500000, reduza pf a imagem.';
				}

			}else{
				$erroIMG = 'Extensão nao permitida ('.$extensao.'), apenas aceitamos jpg,jpeg,svg ou png!';
			}
	}else{
		$erroIMG = 'Não existe imagem no sistema';
	}

	echo $erroIMG;
	
	/************ TRATAMENTO DE IMAGEM **********/



	// Validacoes dos dados de Administrador
	if (!empty($nome) && !empty($apelido) && !empty($email) && !empty($password) && !empty($password2)) {
		if ($password == $password2) {
			$pesquisa = $mysqli->query("SELECT * FROM `administradores` WHERE `email`= '$email'");
			if ($pesquisa->num_rows <= 0) {
			// Query de insercao
			$inserir = $mysqli->query("INSERT INTO `administradores` (
				`id`,
				`img`,
				`nome`,
				`apelido`,
				`password`,
				`email`
				) VALUES (
				default,
				'$img',
				'$nome',
				'$apelido',
				MD5('$password'),
				'$email'
			)");
			
			if ($inserir) {
				$erro = '<div class="alert alert-success">Utilizador inserido com sucesso!</div>';
				header('Refresh:2; url=utilizadores.php');
			}else{
				$erro = '<div class="alert alert-danger">Houve um erro de conexao a base de dados!</div>';	
			}
				
	}else{
		$erro = '<div class="alert alert-danger">Esse email já esta a ser usado, em caso de duvida peça nova password!</div>';	
	}
	}else{
	$erro = '<div class="alert alert-danger">As passwords escritas, nao são iguais!</div>';	
	}
	}else{
	$erro = '<div class="alert alert-danger">Todos os campos sao obrigatorios!</div>';	
	}
}


	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Backend - Novo Utilizador</title>
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
		<h1 class="titulo-crm">NOVO UTILIZADOR</h1>
		<h6 class="descricao-crm">Aqui adicionamos um novo utilizador do backoffice.</h6>
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
						NOME<br>
						<input type="text" name="nome" placeholder="NOME">
					</label>
				</div>
				<div class="col-md-6">
					<label>
						APELIDO<br>
						<input type="text" name="apelido" placeholder="APELIDO">
					</label>
				</div>
				<div class="col-md-6">
					<label>
						PASSWORD<br>
						<input type="text" name="password" placeholder="PASSWORD">
					</label>
				</div>
				<div class="col-md-6">
						<label>
							CONFIRMAR PASSWORD<br>
							<input type="text" name="password2" placeholder="Confirmar Password">
						</label>
					</div>
				<div class="col-md-6">
						<label>
							EMAIL<br>
							<input type="email" name="email" placeholder="EMAIL">
						</label>
					</div>
					
				<!----- IMAGEM -------->
				<div class="col-md-12">
					<label>
						IMG<br>
						<input type="file" name="img" placeholder="img">
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