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
		$idMenu = $_GET['id'];
		$pesquisa = $mysqli->query("SELECT * FROM `menus` WHERE `id` = '$idMenu'");
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
		$titulo = $_POST['titulo'];
		$url = $_POST['url'];
		$ordem = $_POST['ordem'];
		$target = $_POST['target'];
		$fk_menus = $_POST['fk_menus'];
		$idmenu = $_POST['idmenu'];

		if (!empty($titulo) && !empty($url) && !empty($ordem) ) {
			$atualizar = $mysqli->query("UPDATE `menus` SET `titulo` = '$titulo', `url` = '$url', `ordem` = '$ordem', `target` = '$target', `fk_menus` = '$fk_menus' WHERE `id` = '$idmenu'");

			if ($atualizar) {
				$erro = '<div class="alert alert-success">Menu editado com sucesso!</div>';
				header('Refresh:2; url=menus.php');
			}else{
				$erro = '<div class="alert alert-danger">Houve um erro de conexao a base de dados!</div>';	
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
		<h1 class="titulo-crm">EDITAR MENU</h1>
		<h6 class="descricao-crm">Aqui editamos os itens do menu do site.</h6>
	</section>
	<section class="dados-lista">
		<?php 
		if ($erro != '') {
			echo $erro;
		}
		?>
			<form method="POST" action=""  enctype="multipart/form-data">
				<input type="hidden" name="idmenu" value="<?php echo $idMenu; ?>">
				<div class="row-no-padding">
					<div class="col-md-6">
						<label>
							TITULO<br>
							<input type="text" name="titulo" placeholder="TITULO" value="<?php echo $print->titulo; ?>">
						</label>
					</div>
					<div class="col-md-6">
						<label>
							URL<br>
							<input type="text" name="url" placeholder="URL" value="<?php echo $print->url; ?>">
						</label>
					</div>
					<div class="col-md-6">
						<label>
							TARGET<br>
							<select name="target">
								<?php if ($print->target=='_self') { ?>
									<option value="_self" selected="selected">SELF</option>
								    <option value="_blank">BLANK</option>
								<?php } else { ?>
									<option value="_self" >SELF</option>
								    <option value="_blank" selected="selected">BLANK</option>
								<?php } ?>
								
							</select>
						</label>
					</div>
					<div class="col-md-6">
						<label>
							Nº ORDEM<br>
							<input type="text" name="ordem" placeholder="ORDEM" value="<?php echo $print->ordem; ?>">
						</label>
					</div>
					<div class="col-md-6">
						<label>
							FAMILIA<br>
							<select name="fk_menus">
								<?php 
								echo '<option value="9999">SEM PARENT</option>';

								$pesquisa = $mysqli->query("SELECT * FROM `menus` WHERE `fk_menus`='9999' ORDER BY `ordem` ASC");
								if ($pesquisa->num_rows>0) {
									while ($print2 = $pesquisa->fetch_object()) {
										if ($print2->id == $print->fk_menus) {
											echo '<option value="'.$print2->id.'" selected="selected">'.$print2->titulo.'</option>';
										}else{

											echo '<option value="'.$print2->id.'">'.$print2->titulo.'</option>';
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