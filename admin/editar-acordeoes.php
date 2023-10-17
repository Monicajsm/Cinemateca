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
		$idAcordeao = $_GET['id'];
		$pesquisa = $mysqli->query("SELECT * FROM `acordeoes` WHERE `id` = '$idAcordeao'");
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
	$titulo = $_POST['titulo'];
	$conteudo = $_POST['conteudo'];
	$idacordeao = $_POST['idacordeao'];
	$ordem = $_POST['ordem'];
	$fk_grupo = $_POST['fk_grupo'];
		

		// Validacoes dos dados da tabela
		if (!empty($titulo) && !empty($conteudo) && !empty($ordem) && !empty($fk_grupo)) {
		
			// Query de insercao
			$editar = $mysqli->query("UPDATE `acordeoes` SET 
			`titulo` = '$titulo',
			`conteudo` = '$conteudo',
			`ordem` = '$ordem',
			`fk_grupo` = '$fk_grupo'
			 WHERE
			`id` = '$idAcordeao'
			");

		
			if ($editar) {
				$erro = '<div class="alert alert-success">Acordeao inserido com sucesso!</div>';
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
	<title>Backend - Editar Acordeões</title>
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
		<h1 class="titulo-crm">EDITAR ACORDEÃO</h1>
		<h6 class="descricao-crm">Aqui editamos os acordeões.</h6>
	</section>
	<section class="dados-lista">
		<?php 

		if ($erro != '') {
			echo $erro;
		}
	
		?>
		<!-- Form de introdução de dados -->
		<form method="POST" action=""  enctype="multipart/form-data">
		<input type="hidden" name="idacordeao" value="<?php echo $idAcordeao; ?>">

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
				<div class="col-md-6">
					<label>
						ORDEM<br>
						<input type="text" name="ordem" placeholder="ORDEM" value="<?php echo $print->ordem; ?>">
					</label>
				</div>
				<div class="col-md-6">
					<label>
						FK_GRUPO<br>
						<select name="fk_grupo">
								<?php 
								echo '<option value-min="1" value-max="7"></option>';

								$pesquisa = $mysqli->query("SELECT * FROM `grupos_acordeoes` WHERE `id`");
								if ($pesquisa->num_rows>0) {
									while ($print2 = $pesquisa->fetch_object()) {
										if($print2->id == $print->$fk_grupo){
											echo '<option value="'.$print2->id.'" selected="selected">'.$print2->nome.'</option>';
										} else {
											echo '<option value="'.$print2->id.'">'.$print2->nome.'</option>';
										}

									}
										
								}
										
								
								
								?>
							</select>
					</label>
				</div>
				
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