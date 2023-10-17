<?php 

/************ TRATAMENTO DE IMAGEM **********/


	echo "<pre>
	".print_r($_FILES)."
	</pre>";


		$target = 'img/img';
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

				
				if ($_FILES['img']['size'] <= 5000000) {
					
					if (move_uploaded_file($_FILES['img']['tmp_name'], $locfile)) {
						$foto = $target.$nomeFile;
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
			$foto = $fotoAntes;
		}


	//echo $erroIMG;
/************ TRATAMENTO DE IMAGEM **********/



?>


<!--
        <div class="flip-card">
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 nopadding flip-card-inner">
            <div class="flip-card-front banner2" alt="domesticviolence"></div>
            <div class="flip-card-back">
                <a href="" target="_self" class="image-legend"> VIOLÊNCIA DOMÉSTICA (2001) FREDERICK WISEMAN</a>
            </div>
        </div>
        </div>


        <div class="flip-card">
        <div class="col-lg-3 col-md-3 col-sm-12 hidden-xs nopadding flip-card-inner">
            <div class="flip-card-front banner3" alt="gatopretogatobranco"></div>
            <div class="flip-card-back">
                <a href="" target="_self" class="image-legend"> GATO PRETO, GATO BRANCO (1998) EMIR KUSTURICA</a>
            </div>
        </div>
        </div>

        <div class="flip-card">
        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs nopadding flip-card-inner">
            <div class="flip-card-front banner4" alt="oitoemeio"> </div>
            <div class="flip-card-back">
                <a href="" target="_self" class="image-legend"> OITO E MEIO (1963) FEDERICO FELLINI</a>
        </div>
        </div>
        </div>

        <div class="flip-card">
        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs nopadding flip-card-inner">
            <div class="flip-card-front banner5" alt="lacaza"></div>
        <div class="flip-card-back">
            <a href="" target="_self" class="image-legend"> A CAÇA (1966) CARLOS SAURA</a>
        </div>
        </div>
        </div>

        <div class="flip-card">
        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs nopadding flip-card-inner">
            <div class="flip-card-front banner6" alt="super8"></div> 
        <div class="flip-card-back">
            <a href="" target="_self" class="image-legend"> SUPER 8 (2011) STEVEN SPIELBERG</a>
        </div>
        </div>
        </div>

        <div class="flip-card">
        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs nopadding flip-card-inner">
            <div class="flip-card-front banner7" alt="joanbennett"></div>
        <div class="flip-card-back">
              <a href="" target="_self" class="image-legend"> FERAS HUMANAS (1941) FRITZ LANG</a>
        </div>
        </div>
        </div>


        <div class="flip-card">
        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs nopadding flip-card-inner">
            <div class="flip-card-front banner8" alt="cadaverieccelenti"></div> 
        <div class="flip-card-back">
            <a href="" target="_self" class="image-legend"> CADÁVERES ILUSTRES (1976) FRANCESCO ROSI </a>
        </div>
        </div>
        </div>
        
    -->
