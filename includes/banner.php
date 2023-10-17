<!-- BANNER -->
<div class="row" id="filmes">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
       
    <?php

    $listafilmes = explode(',', $printciclo -> fk_filmes);
    foreach($listafilmes as $filmeID) {
        $pesquisafilme = $mysqli->query("SELECT * FROM `filmes` WHERE `id` = '$filmeID'");
        if ($pesquisafilme->num_rows>0) {
        $printfilme = $pesquisafilme->fetch_object();
            echo   '<div class="flip-card">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 nopadding flip-card-inner">
                        <div class="flip-card-front banner" style="background-image: url('.$printfilme->url.')" alt="'.$printfilme->titulo.'"></div>
                        <div class="flip-card-back">
                            <a href="filme.php?id='.$printfilme->id.'" target="_self" class="image-legend">'.$printfilme->titulo.' ('.$printfilme->ano.') '.$printfilme->realizador.'</a>
                        </div>
                    </div>
                </div>';
        }    

    }

    ?>

   </div>
</div>   
<!-- FIM DO BANNER -->

