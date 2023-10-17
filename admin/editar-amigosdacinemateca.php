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
		$idAC = $_GET['id'];
		$pesquisa = $mysqli->query("SELECT * FROM `amigosdacinemateca` WHERE `id` = '$idAC'");
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
		$conteudo = $_POST['conteudo'];
		$titulo = $_POST['titulo'];
		$target = $_POST['target'];
		$url = $_POST['url'];
		$imgAntiga = $_POST['imgAntiga'];
		// Variavel para tratamento da imagem
		$img = '';
		$idac = $_POST['idac'];
		

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

		/************ TRATAMENTO DE IMAGEM **********/

		// Validacoes dos dados da tabela
		if (!empty($titulo) && !empty($conteudo) && !empty($url) && !empty($target) && $erroIMG == '' ) {
		
			// Query de insercao
			$editar = $mysqli->query("UPDATE `amigosdacinemateca` SET 
			`titulo` = '$titulo',
			`conteudo` = '$conteudo',
			`url` = '$url',
			`target` = '$target',
			`img` = '$img'

			WHERE
			`id` = '$idAC'
			");

		
			if ($editar) {
				$erro = '<div class="alert alert-success">Secção inserida com sucesso!</div>';
				header('Refresh:2; url=amigosdacinemateca.php');
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
	<title>Backend - Editar Amigos da Cinemateca</title>
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
		<h1 class="titulo-crm">EDITAR AMIGOS DA CINEMATECA</h1>
		<h6 class="descricao-crm">Aqui editamos a secção Amigos da Cinemateca.</h6>
	</section>
	<section class="dados-lista">
		<?php 

		if ($erro != '') {
			echo $erro;
		}
	
		?>
		<!-- Form de introducao de dados -->
		<form method="POST" action=""  enctype="multipart/form-data">
		<input type="hidden" name="idac" value="<?php echo $idAC; ?>">
		<input type="hidden" name="imgAntiga" value="<?php echo $print->img; ?>">

			<div class="row-no-padding">
				<div class="col-md-6">
					<label>
						TITULO<br>
						<input type="text" name="titulo" placeholder="TITULO" value="<?php echo $print->titulo; ?>">
					</label>
				</div>
				<div class="col-md-6">
					<label>
						CONTEUDO<br>
						<textarea placeholder="CONTEUDO" name="conteudo" value="<?php echo $print->conteudo; ?>"></textarea>
					</label>
				</div>
				<!----- IMAGEM -------->
				<div class="col-md-6">
					<label>
						IMG<br>
						<input type="file" placeholder="IMG" name="img">
					</label>
				</div>
				<div class="col-md-6">
					<label>
					<?php
					if ($print->img != '') {
						echo '<img src="../' . $print->img . '"  style="width:200px;">';
					}
					?>
					</label>
				</div>
				<div class="col-md-6">
						<label>
							URL<br>
							<input type="text" name="url" placeholder="url" value="<?php echo $print->url; ?>">
						</label>
					</div>
					<div class="col-md-6">
						<label>
							TARGET<br>
							<select name="target">
								<option value="_self">SELF</option>
								<option value="_blank">BLANK</option>
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