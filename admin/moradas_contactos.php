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
		<h1 class="titulo-crm">MORADAS E CONTACTOS</h1>
		<h6 class="descricao-crm">Informação sobre moradas e contactos da Cinemateca.</h6>
	</section>
	<section class="lista-btns">
		<a href="novo-moradas_contactos.php" class="btn"><i class="fa fa-plus"></i> ADICIONAR NOVO</a>
	</section>
	<section class="dados-lista">
		<?php 

		if (isSet($_GET['sms'])) {
			$sms = $_GET['sms'];
			echo '<div class="alert alert-info">'.$sms.'</div>';
		}

		?>
		<table class="tabela-dados-lista">
			<thead>
				<tr>
					<th>ID</th>
					<th>MORADA</th>
					<th>TELEFONE</th>
					<th>EMAIL</th>
					<th>MAPA</th>
					<th>TITULO</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$pesquisa = $mysqli->query("SELECT * FROM `moradas_contactos` ORDER BY `id`");
				if ($pesquisa->num_rows>0) {
					while ($print = $pesquisa->fetch_object()) {
						echo '<tr>
							<td>'.$print->id.'</td>
							<td>'.$print->morada.'</td>
							<td>'.$print->telefone.'</td>
							<td>'.$print->email.'</td>
							<td>'.$print->mapa.'</td>
							<td>'.$print->titulo.'</td>
							<td class="accao">
								<a href="editar-moradas_contactos.php?id='.$print->id.'" class="edit">EDITAR</a>
								<a href="controladores/controller-moradas_contactos.php?accao=apagar&id='.$print->id.'" class="del">DELETE</a>
							</td>
							</tr>
						';
					}
				}

				?>
			</tbody>
		</table>	
	</section>


	<?php include('includes/footer.php'); ?>
</body>
</html>