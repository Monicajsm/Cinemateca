
<!-- PROGRAMACAO E SLIDESHOW DOS FILMES-->
<div class="row nopadding">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <!--<h2 style="margin-bottom:0px">PROGRAMACAO</h2>-->

        <div class="filtrar margin-top-50">
            <h3>ESTA SEMANA</h3>
        </div>
        <br>
    </div>

        <!-- 
        
        1) QUERY + SELECT da tabela A (tabela pai)
        1.1) IF verifica se existe informacao para devolver da query
        2) ciclo WHILE para desconstruir a tabela como objecto
        3) guardar numa variavel a informacao especifica que queremos obter daquela tabela
        4) QUERY + SELECT tabela B (tabela filho)
        5) condicao IF para averiguar se existe informacao correspondente
        6) Se existe, desconstruir a tabela
    
    
        -->
        <?php
        //se variavel == 1  quero mostrar imagens
        //se = 0 NAO quero mostrar imagens
        if($mostraSeccaoImagem == 1){

            
            echo ' <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 imgSlideParent">
                     <div class="slider_seg">';

            $pesquisa = $mysqli->query("SELECT * FROM `dia_semana`");
            if ($pesquisa->num_rows > 0) {
                //percorrer cada dia da semana independentemente
                while ($printdia = $pesquisa->fetch_object()) {
                    //para cada dia da semana, vamos buscar programacao dia
                    $idDia_analisar = $printdia->id;
                         
                    //pesquisa da programacao dia
                    $query = "SELECT * FROM `programacao_dia` WHERE `fk_diasemana`=$idDia_analisar ";
                    
                    if($idCiclo != 0){
                        $query = $query . " AND `fk_ciclo` = " . $idCiclo;
                    }        
        
                    $pesquisaProg = $mysqli->query($query);


        
                    //se tivemos programacao para o dia entramos
                    if ($pesquisaProg->num_rows > 0) {
                        while ($printProgDia = $pesquisaProg->fetch_object()) {
                            $pesquisafilme = $mysqli->query("SELECT * FROM `filmes` WHERE `id` = $printProgDia->fk_filme");
                            if ($pesquisafilme->num_rows>0) {
                                $printfilme = $pesquisafilme->fetch_object();
                                //para cada programacao dia (15:30, 19h...) vamos criar cada slide
                                //se for segunda feira, o count = 0 logo ele tem que mostrar os slides
                                //se count!= 0,  porque ja estamos a analisar as informacoees para outros dias da semana
                                // logo esconde
                                // o display none acaba por nao fazer nada porque a logica de JS do Slick Slider sobrepoe-se logo forca o display block (mostrar)
                                echo 
                                '<div class="slide slide-prog-dia content-box" data-dia='.$idDia_analisar.'>
                                    <div class="img-programacao" style="background-image: url('.$printfilme->url.')" alt="">
                                    </div> 
                                        <div class="content-overlay">
                                            <h5><a href="filme.php?id='.$printfilme->id.'" target="_self" style="color:#FCFCFE;">'.$printfilme ->titulo.'</a></h5>
                                        </div>
                                </div>';
                            }
        
                        }    
                    } 
                }
            }
            echo '</div></div>';
        }
        ?>

    

    <!-- DIAS DA SEMANA | MES -->


    <div class="row nopadding">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 diasdasemana">

        <?php
    
        $pesquisa = $mysqli->query("SELECT * FROM `dia_semana`");
        if($pesquisa->num_rows >0){
            while ($printdia = $pesquisa->fetch_object()) { 
                echo 
                '<div class="inline-block nopadding">
                    <h4 data-target="'.$printdia->id.'" class="dia">'.$printdia->dia.', '.$printdia->dia_mes.'</h4>  
                </div>'; 
            }
        }

        ?>
        
        </div>
    </div>   



<?php
    $pesquisa = $mysqli->query("SELECT * FROM `dia_semana`");
        if ($pesquisa->num_rows > 0) {
            //percorres cada dia da semana independentemente
            $count = 0;
            while ($printdia = $pesquisa->fetch_object()) {
                //para cada dia da semana, vamos buscar programacao dia
                $idDia_analisar = $printdia->id;

                echo  
                '<div data-dia="'.$idDia_analisar.'" class ="row nopadding tab-prog-dia ';//fechei pq queremos adicionar ou nao uma classe
                //se count diferente de 0 entao adiciona a classe none responsavel por fazer hidden a div
                //s0 NAO colocas na primeira iteracao pq e segunda feira e tu queres que seja visto por default no inicio
                if($count != 0){
                    echo 'none';
                }
                //abri aqui o resto da parte da classe 
                echo '">
                <div class=" info-filme col-lg-12 col-md-12 col-sm-12 col-xs-12">';

                $query = "SELECT * FROM `programacao_dia` WHERE `fk_diasemana`=$idDia_analisar ";
                //condicao caso idciclo definido, filtra por ele. se nao estiver definido nao filtra
                if($idCiclo != 0){
                    $query = $query . " AND `fk_ciclo` = " . $idCiclo;
                } 
                //condicao caso idfilme definido, filtra por ele. se nao estiver definido nao filtra
                if($idFilme != 0){
                    $query = $query . " AND `fk_filme` = " . $idFilme;
                }     

                //pesquisa da programacao dia
                $pesquisaProg = $mysqli->query($query);
                //se tivemos programacao para o dia entramos
                if ($pesquisaProg->num_rows > 0) {
                    while ($printProgDia = $pesquisaProg->fetch_object()) {
                    echo 
                    '<div class="info-filme col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">
                        <div class="inline-block">
                            <h4>'.$printProgDia->hora.'</h4>
                        </div>
                
                        <div class="inline-block nopadding">';
                        
                            $pesquisaTitFilme = $mysqli->query("SELECT * FROM `filmes` WHERE `id`=$printProgDia->fk_filme");
                            //se tivemos programacao para o dia entramos
                            if ($pesquisaTitFilme->num_rows > 0) {
                                while ($printfilme = $pesquisaTitFilme->fetch_object()) {
                                    echo  
                                    '<h4><a href="filme.php?id='.$printfilme->id.'" target="'.$printfilme->target.'">'.$printfilme->titulo.' | </a></h4> 
                                    '; /* <p style="padding-top: 15px;">'.$printfilme->realizador.' | '.$printfilme->ano.' | '.$printfilme->duracao.' min</p>'; */
                                }
                            }
                        
                        echo         
                       
                        '</div> 

                        <div class="inline-block">
                            <h4>';

                            $pesquisaSala = $mysqli->query("SELECT * FROM `salas` WHERE `id`=$printProgDia->fk_sala");
                            //print da sala
                            if ($pesquisaSala->num_rows > 0) {
                                while ($printSala = $pesquisaSala->fetch_object()) {
                                    echo $printSala->nome;
                                }
                            }
                        
                        
                        echo ' | </h4>
                        </div>

                        <div class="inline-block">
                            <h4><a href="filme.php?id=" target="_self">';        
                        
                        $pesquisaCiclo = $mysqli->query("SELECT * FROM `ciclos` WHERE `id`=$printProgDia->fk_ciclo");
                        //se tivemos programacao para o dia entramos
                        if ($pesquisaCiclo->num_rows > 0) {
                            while ($printCiclo = $pesquisaCiclo->fetch_object()) {
                                echo '<h4><a href="ciclo.php?id='.$printCiclo->id.'" target="_self">'.$printCiclo->titulo.'</a></h4>';
                            }
                        }
                        
                        echo ' </a></h4>
                         </div>

                    </div>';
        
                    }
                }
                echo '</div></div>';
                $count++;
            }
        }
    
    ?>
    </div>