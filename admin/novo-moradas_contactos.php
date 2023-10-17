<?php
// Existe sessao valida?
if (!isset($_SESSION)) {
	session_start();
}
// permissao a BD
require_once 'functions/dbconfig.php';

// Validar se existe sessao e se esta verificado
if (!isset($_SESSION['login']) || $_SESSION['login'] != $ss) {
	header("Location: logout.php");
	exit();
}

// Variavel de controlo de erro
$erro = '';

// Se Post estiver definido
if (isset($_POST['enviar']) && $_POST['enviar'] != '') {
	// guardar dados em variaveis
	$morada = $_POST['morada'];
	$telefone = $_POST['email'];
	$email = $_POST['email'];
	$mapa = $_POST['mapa'];
	$titulo = $_POST['titulo'];
	

	// Validacoes dos dados de Administrador
	if (!empty($morada) && !empty($telefone) && !empty($email)&& !empty($mapa) && !empty($titulo)  ) {

		
			$inserir = $mysqli->query("INSERT INTO `moradas_contactos` (
				`id`,
				`morada`,
				`telefone`,
				`email`,
				`mapa`,
				`titulo`
				) VALUES (
				default,
				'$morada',
				'$telefone',
				'$email',
				'$mapa',
				'$titulo'
			)");
			if ($inserir) {
				$erro = '<div class="alert alert-success">Morada e Contacto inserido com sucesso!</div>';
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
	<title>Backend Dashboard</title>
	<meta name="keywords" content="Backend Monica Marques">
	<meta name="description" content="Backend Monica Marques">
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
		<h1 class="titulo-crm">NOVO MORADAS E CONTACTOS</h1>
		<h6 class="descricao-crm">Nova informação para a secção Moradas e Contactos.</h6>
	</section>
	<section class="dados-lista">
		<?php 
		// mostrar erros de processamento de dados
		if ($erro != '') {
			echo $erro;
		}
	
		?>

		
			<form method="POST" action=""  enctype="multipart/form-data">
				<div class="row-no-padding">
				<div class="col-md-6">
					<label>
						TITULO<br>
						<input type="text" name="titulo" placeholder="titulo">
					</label>
				</div>
				<div class="col-md-6">
					<label>
						MORADA<br>
						<textarea placeholder="MORADA" name="morada"></textarea>
					</label>
				</div>
				<div class="col-md-6">
					<label>
						TELEFONE<br>
						<input type="text" name="telefone" placeholder="telefone">
					</label>
				</div>
				<div class="col-md-6">
						<label>
							EMAIL<br>
							<input type="text" name="email" placeholder="email">
						</label>
					</div>

					<div class="col-md-12">
						<label>
							MAPA<br>
							<textarea placeholder="MAPA" name="mapa"></textarea>
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