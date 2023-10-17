<header id="header">    

<!-- NAVBAR -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    
    <?php 
    echo '<ul class="menu">';

        $pesquisa = $mysqli->query("SELECT * FROM `menus` WHERE `fk_menus` = 9999 ORDER BY `ordem` ASC");
        
        while($print = $pesquisa->fetch_object()){

        echo '<li class="logofixed"><a href="'.$print->url.'" target="'.$print->target.'"><img src="'.$print->img.'"></a></li>';
        
        echo '<li><a href="'.$print->url.'" target="'.$print->target.'" class="navlink">'.$print->titulo.'</a></li>';

        }

        $pesquisa = $mysqli->query("SELECT * FROM `menus` WHERE `id` = 7 ORDER BY `ordem` ASC");
        while($print = $pesquisa->fetch_object()){

        echo '<form class="search" action="action_page.php">
                <input type="text" placeholder="Pesquisar" name="search" class="inputfield">
                <li class="box-right"><img src="'.$print->img.'" class="search-icon"></li>
              </form>';
        }

        echo '<li class="responsive-menu">Menu</li>';

    echo '</ul>';

    ?>
    </div> 
</div>
<!-- FIM DA NAVBAR --> 
</header>



<!--
<li><a href="acinemateca.php"target="_self" class="navlink">A Cinemateca</a></li>
        <li><a href="programacao.php" target="_self" class="navlink">Programação</a></li>
        <li><a href="cinematecajunior.php" target="_self" class="navlink">Cinemateca Júnior</a></li>
        <li><a href="coleccoesearquivos.php" target="_self"  class="navlink">Colecções e Arquivos</a></li>
        <li><a href="#footer" class="navlink">Contactos e Horários</a></li>
        <form class="search" action="action_page.php">
            <input type="text" placeholder="Pesquisar" name="search" class="inputfield">
            <li class="box-right"><img src="img/search.svg" class="search-icon"></li>
        </form>
        <li class="responsive-menu">Menu</li>
    -->