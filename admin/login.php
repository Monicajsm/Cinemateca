<?php
	if (!isset($_SESSION)) {
	  	session_start();
	}  
	require_once 'functions/dbconfig.php';

	if (!isset($_SESSION['login']) || $_SESSION['login'] != $ss) {
		// code...
	}else{
		header("Location: index.php");
		exit();
	}

	$erro = '';

	if (isset($_POST["enviar"]) && $_POST["enviar"] != '') {
		if ($_POST["email"] != '' && $_POST["password"] != '') {
			$email = mysqli_real_escape_string($mysqli, stripslashes($_POST["email"]));
			$password = mysqli_real_escape_string($mysqli, $_POST["password"]);

			$pesquisa = $mysqli->query("SELECT * FROM `administradores` WHERE `email` = '$email' and `password` = MD5('$password')");
			if ($pesquisa->num_rows > 0) {

				$print = $pesquisa->fetch_object();
				$_SESSION['login'] = $ss;
				$_SESSION['id'] = $print->id;
				$_SESSION['nome'] = $print->nome;
				$_SESSION['apelido'] = $print->apelido;
				$_SESSION['email'] = $print->email;

				header("Refresh:2");

				$erro = '<div class="alert alert-success">Login feito com sucesso!</div>';
			}else{
				$erro = '<div class="alert alert-danger">Os dados inseridos não são válidos!</div>';
			}
		}else{
			$erro = '<div class="alert alert-danger">Os campos "Email" e "Password" são obrigatórios!</div>';
		}
	}



?>
<!DOCTYPE html>
<html>
<head>
	<title>Backend - Login</title>
	<meta name="keywords" content="Backend Hugo Vaz">
	<meta name="description" content="Backend Hugo Vaz">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--BOOTSTRAP -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	<!-- STYLE SHEET -->
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<script src="js/jquery-3.6.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<script src="js/scripts.js"></script>
</head>
<body class="login">	

	<div class="fundo">
		<div class="logo-login">
			<img src="img/logo.svg">
			<br>
			<form method="POST" action="">
				<?php echo $erro; ?>
				<div class="bloco">
					<input type="email" name="email" placeholder="email">
				</div>
				<div class="bloco">
					<input type="password" name="password" placeholder="coloque a sua password">
				</div>
				<div class="bloco">
					<input type="submit" name="enviar" value="LOGIN">
				</div>
			</form>
		</div>
	</div>

</body>
</html>