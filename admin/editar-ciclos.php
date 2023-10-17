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
		$idCiclo = $_GET['id'];
		$pesquisa = $mysqli->query("SELECT * FROM `ciclos` WHERE `id` = '$idCiclo'");
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
		$filmes = $_POST['fk_filmes'];
		$fk_filmes = implode(',', $filmes);
		// Variavel para tratamento da imagem
		$imagem_a_tratar = '';
		$locfile_a_tratar = '';
		$data = $_POST['data'];
		$url = $_POST['url'];
		$target = $_POST['target'];	
		$idciclo = $_POST['idciclo'];	
		
		$imgSubstituir = array();
		// Controlo para ter o nome dos inputs para uso em baixo
		$file_input_names = array("ciclo_1", "ciclo_2", "ciclo_3", "ciclo_4");

		/************ TRATAMENTO DE IMAGEM **********/

		$target = 'Cinemateca/img/';
		$targetBACKEND = '../'.$target;

		if (!is_dir($targetBACKEND)) {
			// CHMOD
			mkdir($targetBACKEND, $chmodDir, true);
		}

		$erroIMG = '';

		$counter = 0;
		foreach ($_FILES as &$input_ImgInfo) {
		$locfile_a_tratar = '';
		if (isset($input_ImgInfo) && $input_ImgInfo['name'] != '') {
			
			// localizacao do ficheiro
			$locfile_a_tratar = $targetBACKEND . basename($input_ImgInfo['name']);

			// Obter extensao do ficheiro
			$extensao = strtolower(pathinfo($locfile_a_tratar, PATHINFO_EXTENSION));
			// validacao da extensao do ficheiro
			if ($extensao == 'png' || $extensao == 'jpg' || $extensao == 'jpeg' || $extensao == 'svg') {
				
				if (file_exists($locfile_a_tratar)) {
					$nomeFile = str_replace('.'.$extensao, '', $input_ImgInfo['name']);
					$nomeFile = $nomeFile.'-'.rand(1000,9999);
					$nomeFile = $nomeFile.'.'.$extensao;
				}else{
					// guardar imagem
					$nomeFile = $input_ImgInfo['name'];
				}
				// path do ficheiro + nome
				$locfile_a_tratar = $targetBACKEND.$nomeFile;

				// Validacao do tamanho do ficheiro (ver em dbconfig a variavel $imgSize)
				if ($input_ImgInfo['size'] > $imgSize) {
					$erroIMG .= '<div class="alert alert-danger"> Imagem (' . $input_ImgInfo['name'] . ') - O nosso limite de upload é ' . $imgSize . 'b, reduza o tamanho da imagem.</div>';	
					}else {
						$imagens_submetidas[$counter] = $target . $nomeFile;
					}
				} else {
					$erroIMG .= '<div class="alert alert-danger"> Imagem (' . $input_ImgInfo['name'] . ') - Extensão não permitida (' . $extensao . '), apenas aceitamos jpg,jpeg,svg ou png!</div>';
				}
			} else {
				$erroIMG = '<div class="alert alert-danger">Não inseriu uma imagem.</div>';
			}
			// aqui adiciono a IMG original guardada num array | o locfile (orignal ou nao) | o nome do input da image
			array_push($imgSubstituir, array('', $locfile_a_tratar, $file_input_names[$counter]));
			$counter++;
		}

		/************ TRATAMENTO DE IMAGEM **********/

		// Validacoes dos dados da tabela
		if (!empty($titulo) && !empty($conteudo) && !empty($data) && !empty($target) && $erroIMG == '') {
		
			// Query de insercao
			$editar = $mysqli->query("UPDATE `ciclos` SET 
				`titulo` = '$titulo',
				`conteudo` = '$conteudo',
				`fk_filmes` = $fk_filmes',
				`img` = 
				'$imagens_submetidas[0]',
				'$imagens_submetidas[1]',
				'$imagens_submetidas[2]',
				'$imagens_submetidas[3]',
				`data` = '$data',
				`url` = '$url',
				`target` = '$target'
			WHERE
			`id` = '$idCiclo'
			");

		
			if ($editar) {
				$erro = '<div class="alert alert-success">Categoria inserido com sucesso!</div>';
				header('Refresh:2; url=ciclos.php');
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
	<title>Backend - Editar Ciclo</title>
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
		<h1 class="titulo-crm">EDITAR CICLO</h1>
		<h6 class="descricao-crm">Aqui editamos um ciclo.</h6>
	</section>
	<section class="dados-lista">
		<?php 

		if ($erro != '') {
			echo $erro;
		}
	
		?>
		<!-- Form de introducao de dados -->
		<form method="POST" action=""  enctype="multipart/form-data">
		<input type="hidden" name="idciclo" value="<?php echo $idCiclo; ?>">
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
						<textarea name="conteudo" placeholder="CONTEUDO"  value="<?php echo $print->conteudo; ?>"></textarea>
					</label>
				</div>
				<div class="col-md-6">
					<label>
						DATA<br>
						<textarea placeholder="DATA" name="data" value="<?php echo $print->data; ?>"></textarea>
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
			
				<div class="col-md-12">
					<label>
						FILMES<br>
						<?php 
						$pesquisaFilme = $mysqli->query("SELECT * FROM `filmes` ORDER BY `id`");
						if ($pesquisaFilme->num_rows>0) {
							while($printFilme = $pesquisaFilme->fetch_object()){
								echo '<label><input type="checkbox" name="fk_filme[]" value="'.$printFilme->id.'"> '.$printFilme->titulo.'</label><br>';
							}
						}					
					 	?>
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