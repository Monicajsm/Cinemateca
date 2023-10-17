<?php  
	require_once 'admin/functions/dbconfig.php';
?>

<!DOCTYPE html>
<html  style="margin-top:0px">
<head>
	<title><?php echo "Cinemateca Portuguesa" ?></title>
	<link rel="icon" type="logo" href="img/logo.svg">
	<meta name="keywords" content="Noticia, Actualidade, Informacao, Cinema, Personalidades, Filmes">
	<meta name="description" content="Noticias sobre cinema e cultura cinematografica, noticias relacionadas com a Cinemateca">
	<meta name="author" content="Monica Marques">
	<?php include('includes/head.php'); ?>
</head>

<body  style="margin-top:0px">

<?php include('includes/header.php'); ?>


<main>
<div class="row margin-bottom-100">
    <?php
    $pesquisaNoticia = $mysqli->query("SELECT * FROM `noticias` WHERE `id`");
    if ($pesquisaNoticia->num_rows > 0) {
        while ($printNoticia = $pesquisaNoticia->fetch_object()) {
            echo 

            '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="noticia-img" alt="apromessa" style="background-image: url('.$printNoticia->img.'); background-position:center;"></div><br>
                <h1 class="noticias-header">'.$printNoticia->titulo.'</h1>
                <h2 class="subtitle">'.$printNoticia->data.'</h2><br>
             </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">    
                <p>'.$printNoticia->content.'</p><br>
            </div>';
        }
    }
    ?>
    </div>
</div>


<?php include('includes/footer.php'); ?>

</body>
</html>
    