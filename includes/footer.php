</main> <!-- FECHA-SE A TAG MAIN AQUI -->

  <!-- FOOTER -->
<footer id="footer">
    <div class="row nopadding">  
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding"> 
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
   
            <?php
		    $pesquisa = $mysqli->query("SELECT * FROM `amigosdacinemateca`");
                if ($pesquisa->num_rows>0) { ?>
                <?php $print = $pesquisa->fetch_object();
                echo    '<h3 class="socios">'.$print->titulo.'</h3> <br>
                        <p>'.$print->conteudo.'</p> <br>';?>
                        <button class="vermais">VER MAIS</button><br>
                <?php  while ($print = $pesquisa->fetch_object()) {
                echo   '<div class="socialmedia">
                            <a href="'.$print->url.'" target="'.$print->target.'"><img src="'.$print->img.'" class="socialmedia-icon"></a>
                        </div>'; 
                    }
                } 
            ?>
    
            </div>


            <?php
		    $pesquisa = $mysqli->query("SELECT * FROM `moradas_contactos`");
            while ($printinfo = $pesquisa->fetch_object()) {
            echo  
            
            '<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 morada">
                <h4>'.$printinfo->titulo.'</h4><br>
                <iframe src="'.$printinfo->mapa.'"></iframe>
                <p>'.$printinfo->morada.'</p>
                <p>'.$printinfo->telefone.'</p>
                <a href="mailto:cinemateca@cinemateca.pt">'.$printinfo->email.'</a>
            </div>';
            }

            ?>
</div>



</div>

<div class="row footer-plus nopadding">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding"> 
     
        <?php
        $pesquisa = $mysqli->query("SELECT * FROM `footer_row`");
            while ($print = $pesquisa->fetch_object()) {
            echo  
            '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 nopadding"> 
                <a href="'.$print->url.'" target="'.$print->target.'">'.$print->titulo.'</a>
            </div>';
        }

        ?>
    </div>
</div>


</footer>
<!-- FIM DO FOOTER -->

