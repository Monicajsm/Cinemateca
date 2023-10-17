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
		<h1 class="titulo-crm">SLIDES</h1>
		<h6 class="descricao-crm">Tabela com imagens de slides gerais da Cinemateca.</h6>
	</section>
	<section class="lista-btns">
		<a href="novo-slides.php" class="btn"><i class="fa fa-plus"></i> ADICIONAR NOVO</a>
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
					<th>IMG</th>
					<th>FKGRUPO_SLIDES</th>
					<th>NOME</th>
					<th>INFO</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$pesquisa = $mysqli->query("SELECT * FROM `slides` ORDER BY `id`");
				if ($pesquisa->num_rows>0) {
					while ($print = $pesquisa->fetch_object()) {
						$accoes = '';
						if ($print->id != $_SESSION['id']) {
							$accoes = '<a href="controladores/controller-slides.php?accao=apagar&id='.$print->id.'" class="del">APAGAR</a>';
						}

						echo '<tr>
							<td>'.$print->id.'</td>
							<td>'.$print->img.'</td>
							<td>'.$print->fkgrupo_slides.'</td>
							<td>'.$print->nome.'</td>
							<td>'.$print->info.'</td>			

							<td class="accao">
								<a href="editar-slides.php?id='.$print->id.'" class="edit">EDITAR</a>
								<a href="controladores/controller-slides.php?accao=apagar&id='.$print->id.'" class="del">APAGAR</a>
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