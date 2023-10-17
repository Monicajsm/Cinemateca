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

	// Variavel de controlo de erro
	$erro = '';
	$erroIMG = '';

	// Se Post estiver definido
	if(isSet($_POST['enviar']) && $_POST['enviar']!=''){
		// guardar dados em variaveis
		$titulo = $_POST['titulo'];
		$realizador = $_POST['realizador'];
		$ano = $_POST['ano'];
		$duracao = $_POST['duracao'];
		$pais = $_POST['pais'];
		$img = '';
		$elenco = $_POST['elenco'];
		$legendas = $_POST['legendas'];
		$titulo_original = $_POST['titulo_original'];
		$sinopse = $_POST['sinopse'];
		$lingua = $_POST['lingua'];
		$url = $_POST['url'];
		$target = $_POST['target'];
		$fk_ciclo = $_POST['fk_ciclo'];

	
	
		/************ TRATAMENTO DE IMAGEM **********/

		$target = 'Cinemateca/img';
		$targetBACKEND = '../'.$target;

		if (!is_dir($targetBACKEND)) {
			// CHMOD
			mkdir($targetBACKEND, $chmodDir, true);
		}

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

		// Validacoes dos dados de Administrador
		if (!empty($titulo) && !empty($realizador) && !empty($ano) && !empty($duracao) && !empty($pais) && !empty($erroIMG) && !empty($elenco) 
		&& !empty($legendas) && !empty($titulo_original) && !empty($sinopse) && !empty($lingua) && !empty($url) && !empty($target)
		&& !empty($fk_ciclo)) {
		
			// Query de insercao
			$inserir = $mysqli->query("INSERT INTO `filmes` (
				`id`,
				`titulo`,
				`realizador`,
				`ano`,
				`duracao`,
				`pais`,
				`img`,
				`elenco`,
				`legendas`,
				`titulo_original`,
				`sinopse`,
				`lingua`,
				`url`,
				`target`,
				`fk_ciclo`
				) VALUES (
				default,
				'$titulo',
				'$realizador', 
				'$ano', 
				'$duracao',
				'$pais',
				'$img',
				'$elenco',
				'$legendas',
				'$titulo_original',
				'$sinopse',
				'$lingua',
				'$url',
				'$target',
				'$fk_ciclo'
			)");

		
if ($inserir) {
	$erro = '<div class="alert alert-success">Categoria inserido com sucesso!</div>';
	header('Refresh:2; url=filmes.php');
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
	<title>Backend - Novo Filme</title>
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
		<h1 class="titulo-crm">NOVO FILME</h1>
		<h6 class="descricao-crm">Aqui adicionamos um novo filme ao site.</h6>
	</section>
	<section class="dados-lista">
		<?php 

		if ($erro != '') {
			echo $erro;
		}
		
		?>
		<!-- Form de introducao de dados -->
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
						REALIZADOR<br>
						<input type="text" name="realizador" placeholder="REALIZADOR">
						
					</label>
				</div>
				<div class="col-md-6">
					<label>
						ANO<br>
						<input type="text" name="ano" placeholder="ANO">
					</label>
				</div>
				<div class="col-md-6">
					<label>
						DURAÇÃO<br>
						<input type="text" name="duracao" placeholder="DURACAO">
					</label>
				</div>
				<div class="col-md-6">
					<label>
						PAÍS<br>
						<input type="text" name="pais" placeholder="PAIS">
					</label>
				</div>
				<!----- IMAGEM -------->
				<div class="col-md-12">
					<label>
						IMG<br>
						<input type="file" name="img" placeholder="img">
					</label>
				</div>
				<div class="col-md-6">
					<label>
						ELENCO<br>
						<input type="text" name="elenco" placeholder="ELENCO">
					</label>
				</div>
				<div class="col-md-6">
					<label>
						LEGENDAS<br>
						<input type="text" name="legendas" placeholder="LEGENDAS">
					</label>
				</div>
				<div class="col-md-6">
					<label>
						TITULO ORIGINAL<br>
						<input type="text" name="titulo_original" placeholder="TITULO ORIGINAL">
					</label>
				</div>
				<div class="col-md-6">
					<label>
						SINOPSE<br>
						<input type="text" name="sinopse" placeholder="SINOPSE">
					</label>
				</div>
				<div class="col-md-6">
					<label>
						LINGUA<br>
						<input type="text" name="lingua" placeholder="LINGUA">
					</label>
				</div>
				<div class="col-md-6">
					<label>
						URL<br>
						<input type="text" name="url" placeholder="URL">
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
							FK_CICLO<br>
							<select name="fk_ciclo">
								<?php 
								echo '<option value-min="1" value-max="50"></option>';
								$pesquisa = $mysqli->query("SELECT * FROM `ciclos` WHERE `id`");
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