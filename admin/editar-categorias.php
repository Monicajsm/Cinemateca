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
		$idCat = $_GET['id'];
		$pesquisa = $mysqli->query("SELECT * FROM `categorias` WHERE `id` = '$idCat'");
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
		$descricao = $_POST['descricao'];
		$idcat = $_POST['idcat'];
		$fotoAntes = $_POST['fotoAntes'];
		$foto = '';

		
		/************ TRATAMENTO DE IMAGEM **********/

		$target = 'img/categorias/';
		$targetBACKEND = '../'.$target;

		if (!is_dir($targetBACKEND)) {
			// CHMOD
			mkdir($targetBACKEND, $chmodDir, true);
		}

		$erroIMG = '';

		echo "<pre>
		".print_r($_FILES)."
		</pre>";


		if (isset($_FILES['foto']) && $_FILES['foto']['name'] != '') {
			
			$locfile = $targetBACKEND.basename($_FILES['foto']['name']);
			$extensao = strtolower(pathinfo($locfile, PATHINFO_EXTENSION));

			if ($extensao == 'png' || $extensao == 'jpg' || $extensao == 'jpeg' || $extensao == 'svg') {
				
				if (file_exists($locfile)) {
					$nomeFile = str_replace('.'.$extensao, '', $_FILES['foto']['name']);
					$nomeFile = $nomeFile.'-'.rand(1000,9999);
					$nomeFile = $nomeFile.'.'.$extensao;
				}else{
					$nomeFile = $_FILES['foto']['name'];
				}
				$locfile = $targetBACKEND.$nomeFile;

				
				if ($_FILES['foto']['size'] <= 500000) {
					
					if (move_uploaded_file($_FILES['foto']['tmp_name'], $locfile)) {
						$foto = $target.$nomeFile;
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
			$foto = $fotoAntes;
		}

		//echo $erroIMG;
		/************ TRATAMENTO DE IMAGEM **********/


		if (!empty($nome) && !empty($descricao)) {
		
			$actualizar = $mysqli->query("UPDATE `categorias` SET
				`nome` = '$nome',
				`desc` = '$descricao',
				`foto` = '$foto'
				WHERE
				`id` = '$idcat'
			");



			if ($actualizar) {
				$erro = '<div class="alert alert-success">Categoria inserido com sucesso!</div>';
				header('Refresh:2; url=categorias.php');
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
	<title>Backend Dashboard</title>
	<meta name="keywords" content="Backend Hugo Vaz">
	<meta name="description" content="Backend Hugo Vaz">
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
		<h1 class="titulo-crm">EDITAR CATEGORA</h1>
		<h6 class="descricao-crm">Aqui editamos as categorias do site.</h6>
	</section>
	<section class="dados-lista">
		<?php 

		if ($erro != '') {
			echo $erro;
		}

		?>
		
		
			<form method="POST" action=""  enctype="multipart/form-data">
				<input type="hidden" name="idcat" value="<?php echo $idCat; ?>">
				<input type="hidden" name="fotoAntes" value="<?php echo $print->foto; ?>">
				<div class="row-no-padding">
					<div class="col-md-6">
						<label>
							NOME<br>
							<input type="text" name="nome" placeholder="NOME" value="<?php echo $print->nome; ?>">
						</label>
					</div>
					<div class="col-md-6">
						<label>
							DESCRIÇAO<br>
							<textarea placeholder="DESCRIÇÃO" name="descricao"><?php echo $print->desc; ?></textarea>
						</label>
					</div>

					<div class="col-md-8">
						<label>
							FOTO<br>
							<input type="file" name="foto" placeholder="foto">
						</label>
					</div>

					<div class="col-md-4">
						<?php

						if ($print->foto != '') {
							echo '<div class="bgImg" style="width: 200px;"><img src="../'.$print->foto.'"></div>';
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