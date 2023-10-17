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
		$idUser = $_GET['id'];
		$pesquisa = $mysqli->query("SELECT * FROM `administradores` WHERE `id` = '$idUser'");
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



	$erro = '';
	if(isSet($_POST['enviar']) && $_POST['enviar']!=''){
		$nome = $_POST['nome'];
		$apelido = $_POST['apelido'];
		$password = $_POST['password'];
		$pass2 = $_POST['pass2'];
		$email = $_POST['email'];
		$idutilizador = $_POST['idutilizador'];
		$imgAntiga = $_POST['imgAntiga'];
		// Variavel para tratamento da imagem
		$img = '';


		/************ TRATAMENTO DE IMAGEM **********/

		$target = 'Cinemateca/img/';
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
			$img = $imgAntiga;
		}

		echo $erroIMG;
		/************ TRATAMENTO DE IMAGEM **********/


	// Validacoes dos dados da tabela
		if (!empty($nome) && !empty($apelido) && !empty($password) && !empty($email)) {
			if ($password == $pass2) {
				$pesquisa = $mysqli->query("SELECT * FROM `administradores` WHERE `email`= '$email' and `id` != '$idutilizador'");
				if ($pesquisa->num_rows <= 0) {
		
					$campos = " `nome`='$nome',`apelido`='$apelido',`email`='$email',`img`='$img' ";

					if (!empty($password)) {
						$campos .= " ,password = MD5('$password') "; 
					}

					$inserir = $mysqli->query("UPDATE `administradores` SET ".$campos." WHERE `id` = '$idutilizador'");

					if ($inserir) {
						$erro = '<div class="alert alert-success">Utilizador alterado com sucesso!</div>';
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
	<title>Backend Dashboard</title>
	<meta name="keywords" content="Backend Mónica Marques">
	<meta name="description" content="Backend Mónica Marques">
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
		<h1 class="titulo-crm">EDITAR UTILIZADOR</h1>
		<h6 class="descricao-crm">Aqui editamos os utilizadores do site.</h6>
	</section>
	<section class="dados-lista">
		<?php 

		if ($erro != '') {
			echo $erro;
		}

		?>
		
		
			<form method="POST" action=""  enctype="multipart/form-data">
				<input type="hidden" name="idutilizador" value="<?php echo $idUser; ?>">
				<input type="hidden" name="imgAntiga" value="<?php echo $print->img; ?>">

				<div class="row-no-padding">
					<div class="col-md-6">
						<label>
							NOME<br>
							<input type="text" name="nome" placeholder="Nome" value="<?php echo $print->nome; ?>">
						</label>
					</div>
					<div class="col-md-6">
						<label>
							APELIDO<br>
							<input type="text" name="apelido" placeholder="Apelido" value="<?php echo $print->apelido; ?>">
						</label>
					</div>
					<div class="col-md-6">
						<label>
							PASSWORD<br>
							<input type="text" name="password" placeholder="password">
						</label>
					</div>
					<div class="col-md-6">
						<label>
							CONFIRMAR PASSWORD<br>
							<input type="text" name="pass2" placeholder="Confirmar Password">
						</label>
					</div>
					<div class="col-md-6">
						<label>
							EMAIL<br>
							<input type="email" name="email" placeholder="Email" value="<?php echo $print->email; ?>">
						</label>
					</div>
				
					<div class="col-md-8">
						<label>
							IMG<br>
							<input type="file" name="img" placeholder="img">
						</label>
					</div>

					<div class="col-md-4">
						<?php
							if ($print->img != '') {
								echo '<img src="../' . $print->img . '"  style="width:50px;">';
							}
						?>
					</div>
					<br>
					<br>
					<br>
					<br>
					<div class="col-md-12 lista-btns">
						<input class="btn" type="submit" name="enviar" value="GUARDAR">
					</div>
				</div>
			</form>
	</section>


	<?php include('includes/footer.php'); ?>
</body>
</html>