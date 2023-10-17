<?php  
	require_once 'admin/functions/dbconfig.php';

?>

<!DOCTYPE html>
<html style="margin-top:0px">
<head>
	<title><?php echo "Programação" ?></title>
    <link rel="icon" type="logo" href="img/logo.svg">
	<meta name="keywords" content="Politica de Privacidade, Condicoes Legais, Copyright, Acessibilidade, Cookies">
	<meta name="description" content="Pagina da Politica de Privacidade do site da Cinemateca Portuguesa">
	<meta name="author" content="Monica Marques">
	<?php include('includes/head.php'); ?>
</head>

<body style="margin-top:0px">

<div class="container-fluid">

<?php include('includes/header.php'); ?>

<main>


<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          
        <?php
        $pesquisa = $mysqli->query("SELECT * FROM `politicadeprivacidade` WHERE `id` = 4 ORDER BY `id` ASC");
	    while($print = $pesquisa->fetch_object()){
        echo '<h1 class="main-page-title">'.$print->titulo.'</h1><br>
              <img src='.$print->img.' class="politicadeprivacidade-banner">';
        }   
        ?>

        <?php 
        $pesquisa = $mysqli->query("SELECT * FROM `politicadeprivacidade` WHERE `id` >= 5 and `id` <= 11 ORDER BY `id` ASC");
	    while($print = $pesquisa->fetch_object()){
            echo "<h4>$print->titulo</h4><br>
                  <p>$print->conteudo</p>
                  <br><br>";
        }      
        ?>

    </div>
</div>

<?php include('includes/footer.php'); ?>
</body>
</html>
