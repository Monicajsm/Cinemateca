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

	$erro = '';
	$erroIMG = '';

	if(isSet($_POST['enviar']) && $_POST['enviar']!=''){
		$titulo = $_POST['titulo'];
		$ordem = $_POST['ordem'];
		$url = $_POST['url'];
		$target = $_POST['target'];
		$fk_menus = $_POST['fk_menus'];

		/************ TRATAMENTO DE IMAGEM **********/

		$target = 'img/menus/';
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

		if (!empty($titulo) && !empty($ordem) && !empty($url) && !empty($target) && empty($erroIMG) && !empty($fk_menus)) {
			$inserir = $mysqli->query("INSERT INTO `menus` (
				`id`,
				`titulo`,
				`ordem`,
				`url`,
				`target`,
				`img`,
				`fk_menus`
				) VALUES (
				default,
				'$titulo',
				'$ordem',
				'$url',
				'$target',
				'$img',
				'$fk_menus'
			)");

			if ($inserir) {
				$erro = '<div class="alert alert-success">Menu inserido com sucesso!</div>';
				header('Refresh:2; url=menus.php');
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
	<title>Backend Dashboard - Novo Menu</title>
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
		<h1 class="titulo-crm">NOVO MENU</h1>
		<h6 class="descricao-crm">Aqui adicionamos os itens do menu do site.</h6>
	</section>
	<section class="dados-lista">
		<?php 

		if ($erro != '') {
			echo $erro;
		}

		?>
		
		
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
							ORDEM<br>
							<input type="text" name="ordem" placeholder="ordem">
						</label>
					</div>
					<div class="col-md-6">
						<label>
							URL<br>
							<input type="text" name="url" placeholder="url">
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
					<div class="col-md-12">
						<label>
							IMG<br>
							<input type="file" name="img" placeholder="img">
						</label>
					</div>
					<div class="col-md-12">
						<label>
							FK_MENUS<br>
							<select name="fk_menus">
								<?php 
								echo '<option value="9999">SEM PARENT</option>';

								$pesquisa = $mysqli->query("SELECT * FROM `menus` WHERE `fk_menus`='9999' ORDER BY `ordem` ASC");
								if ($pesquisa->num_rows>0) {
									while ($print = $pesquisa->fetch_object()) {
										echo '<option value="'.$print->id.'">'.$print->titulo.'</option>';
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