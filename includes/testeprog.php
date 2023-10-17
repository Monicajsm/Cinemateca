      <?php
   
        $pesquisa = $mysqli->query("SELECT * FROM `programacao_dia`");
		while ($printdia = $pesquisa->fetch_object()) {
            $fk_filme = $printdia->fk_filme;
            $pesquisafilme = $mysqli->query("SELECT * FROM `filmes` WHERE `id` = '$fk_filme'");
            if ($pesquisafilme->num_rows>0) {
                $printfilme = $pesquisafilme->fetch_object();
                echo 
                '<div class="slide content-box">
                    <div class="img-programacao" style="background-image: url('.$printfilme->url.')" alt="">
                    </div> 
                        <div class="content-overlay">
                            <h5><a href="filme.php?id='.$printfilme->id.'" target="_self" style="color:#FCFCFE;">'.$printfilme ->titulo.'</a></h5>
                        </div>
                </div>';
            }
        }
    
        ?>