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
		$idFilme = $_GET['id'];
		$pesquisa = $mysqli->query("SELECT * FROM `filmes` WHERE `id` = '$idFilme'");
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
		$imgAntiga = $_POST['imgAntiga'];

		$idfilme = $_POST['idfilme'];

		
		/************ TRATAMENTO DE IMAGEM **********/

		$target = 'img/';
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
		//echo $erroIMG;
		/************ TRATAMENTO DE IMAGEM **********/


		if (!empty($titulo) && !empty($realizador) && !empty($ano) && !empty($duracao) && !empty($pais) && !empty($erroIMG) && !empty($elenco) 
		&& !empty($legendas) && !empty($titulo_original) && !empty($sinopse) && !empty($lingua) && !empty($url) && !empty($target)
		&& !empty($fk_ciclo)) {
		
			$editar = $mysqli->query("UPDATE `filmes` SET
				`titulo` = '$titulo',
				`realizador` = '$realizador',
				`ano` = '$ano',
				`duracao` = '$duracao',
				`pais` = '$pais',
				`img` = '$img',
				`elenco` = '$elenco',
				`legendas` = '$legendas',
				`titulo_original` = '$titulo_original',
				`sinopse` = '$sinopse',
				`lingua` = '$lingua',
				`url` = '$url',
				`target` = '$target',
				`fk_ciclo` = '$fk_ciclo'
				WHERE
				`id` = '$idFilme'
			");



			if ($editar) {
				$erro = '<div class="alert alert-success">Filme inserido com sucesso!</div>';
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
		<h1 class="titulo-crm">EDITAR FILMES</h1>
		<h6 class="descricao-crm">Aqui editamos os filmes do site.</h6>
	</section>
	<section class="dados-lista">
		<?php 

		if ($erro != '') {
			echo $erro;
		}

		?>
		
		
			<form method="POST" action=""  enctype="multipart/form-data">
				<input type="hidden" name="idfilme" value="<?php echo $idFilme; ?>">
				<input type="hidden" name="imgAntiga" value="<?php echo $print->img; ?>">
				<div class="row-no-padding">
					<div class="col-md-6">
						<label>
							TITULO<br>
							<input type="text" name="titulo" value="<?php echo $print->titulo; ?>">
						</label>
					</div>
					<div class="col-md-6">
						<label>
							REALIZADOR<br>
							<textarea name="realizador"><?php echo $print->realizador; ?></textarea>
						</label>
					</div>
					<div class="col-md-6">
						<label>
							ANO<br>
							<textarea name="ano"><?php echo $print->ano; ?></textarea>
						</label>
					</div>
					<div class="col-md-6">
						<label>
							DURAÇÃO<br>
							<textarea name="duracao"><?php echo $print->duracao; ?></textarea>
						</label>
					</div>
					<div class="col-md-6">
						<label>
							PAÍS<br>
							<textarea name="pais"><?php echo $print->pais; ?></textarea>
						</label>
					</div>
					<div class="col-md-6">
						<label>
							ELENCO<br>
							<textarea  name="elenco"><?php echo $print->elenco; ?></textarea>
						</label>
					</div>
					<div class="col-md-6">
						<label>
							LEGENDAS<br>
							<textarea name="legendas"><?php echo $print->legendas; ?></textarea>
						</label>
					</div>
					<div class="col-md-6">
						<label>
							LÍNGUA<br>
							<textarea name="lingua"><?php echo $print->lingua; ?></textarea>
						</label>
					</div>
					<div class="col-md-6">
						<label>
							SINOPSE<br>
							<textarea name="sinopse"><?php echo $print->sinopse; ?></textarea>
						</label>
					</div>
					<div class="col-md-6">
						<label>
							TÍTULO ORIGINAL<br>
							<textarea name="titulo_original"><?php echo $print->titulo_original; ?></textarea>
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
					<div class="col-md-12">
						<label>
							FK_CICLO<br>
							<select name="fk_ciclo">
								<?php 
								echo '<option value-min="1" value-max="50"></option>';
								$pesquisa = $mysqli->query("SELECT * FROM `ciclos` WHERE `id`");
									if ($pesquisa->num_rows>0) {
										while ($printciclo = $pesquisa->fetch_object()) {
											echo '<option value="'.$printciclo->id.'">'.$printciclo->titulo.'</option>';
										}
									}
								?>
							</select>
						</label>
					</div>


					<div class="col-md-8">
						<label>
							IMG<br>
							<input type="file" name="img" placeholder="img">
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
					<br>
					<br>
					<br>
					<br>

					<div class="col-md-12 lista-btns">
						<input class="btn" type="submit" name="enviar" value="GUARDAR">
					</div>
				</div>
			</form>
	</section>


	<?php include('includes/footer.php'); ?>
</body>
</html>