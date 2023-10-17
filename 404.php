<?php  
	require_once 'admin/functions/dbconfig.php';


?>
<!DOCTYPE html>
<html style="margin-top:0px; margin-left:0px;">
<head>
	<title><?php echo "404 Not Found" ?></title>
	<meta name="keywords" content="404 error page not found">
	<meta name="description" content="pagina 404 do site da Cinemateca">
	<meta name="author" content="Monica Marques">
	<?php include('includes/head.php'); ?>
</head>

<body style="margin-top:0px; margin-left:0px;">

<div class="container-fluid">

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <?php
        $pesquisa = $mysqli->query("SELECT * FROM `404_page` WHERE `id`");
        if($pesquisa->num_rows>0){
            while ($print404= $pesquisa->fetch_object()) {
                echo  
                '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="img-404" alt="img-404" style="background-image: url('.$print404->img.');"></div>
                </div>
                
                
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 aviso_404">
                    <h1>'.$print404->titulo.'</h1><br>
                    <p>'.$print404->aviso.'</p>
                </div>';
            }   
        }
        ?>        
    </div>
</div>


</body>
</html>

