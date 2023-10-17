-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Jul-2023 às 23:04
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cinemateca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `404_page`
--

CREATE TABLE `404_page` (
  `id` int(25) NOT NULL,
  `img` varchar(255) NOT NULL,
  `aviso` text NOT NULL,
  `titulo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `404_page`
--

INSERT INTO `404_page` (`id`, `img`, `aviso`, `titulo`) VALUES
(1, 'img/404page.jpg', 'The Requested URL Was Not Found on This Server', '404 NOT FOUND');

-- --------------------------------------------------------

--
-- Estrutura da tabela `acordeoes`
--

CREATE TABLE `acordeoes` (
  `id` int(25) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `conteudo` text NOT NULL,
  `ordem` varchar(255) NOT NULL,
  `fk_grupo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `acordeoes`
--

INSERT INTO `acordeoes` (`id`, `titulo`, `conteudo`, `ordem`, `fk_grupo`) VALUES
(1, 'PROGRAMA DE ACTIVIDADES PARA ESCOLAS E GRUPOS', 'Programa Escolas 2022-2023\r\nPrograma Férias de Verão 2023', '1', 1),
(2, 'PLANO NACIONAL DE CINEMA', 'Plano Nacional de Cinema', '2', 1),
(3, 'COFRES E DEPÓSITOS', 'O Departamento ANIM dispõe de espaços climatizados para o melhor acondicionamento dos suportes fílmicos e vídeo da sua colecção. Esses espaços dividem-se em três áreas diferentes, tendo em conta a natureza do suporte.<br> À semelhança de outros museus, a Cinemateca Portuguesa – Museu do Cinema incentiva ao depósito de colecções fílmicas detidas quer por particulares, quer por instituições públicas, de carácter científico ou educacional ou outro, mas também de colecções provenientes do circuito da distribuição comercial de cinema. Na ausência de legislação consagrando o depósito legal das obras fílmicas e sendo missão da Cinemateca a salvaguarda do património fílmico português, em que incluímos tanto filmes portugueses como o cinema exibido em Portugal, o depósito destina-se a assegurar não só a conservação estrita dos suportes fílmicos, como também, no caso de filmes portugueses, a possibilidade de através de operações de preservação assegurar a sua sobrevivência a mais longo prazo.', '3', 2),
(4, 'OFERTAS, LEGADOS E DOACÇÕES', 'Cabe à Direcção da Cinemateca Portuguesa – Museu do Cinema deliberar sobre a aceitação de Ofertas, Legados e Doações de materiais fílmicos, i.e., filmes ou equipamentos de filmar e projectar. Uma minuta do Auto de Doação pode ser consultada na coluna da esquerda.', '4', 2),
(5, 'HORÁRIOS, CONTACTOS E MORADAS', 'Acesso ao arquivo fílmico: acesso@cinemateca.pt tel. 219 689 400', '5', 2),
(6, 'AQUISIÇÕES', 'Para além da compra, as modalidades de aquisição contempladas pelo Centro de Documentação e Informação incluem a permuta (intercâmbio ou troca com outra instituição), doação (entrega de documentos por uma pessoa individual ou colectiva a título gratuito e irrevogável), legado (atribuição de documentos por disposição testamentária), e, mais recentemente, captura (download de documentos em formato electrónico disponibilizados na World Wide Web).<br>Em todos os itens adquiridos é inscrito o respectivo código do processo de aquisição, de acordo com o sistema estabelecido (que inclui os dados relativos à modalidade de aquisição, número identificador da colecção e data da transacção).', '6', 3),
(7, 'LEITURAS E CONSULTA', 'Os serviços de leitura e consulta regem-se pelo Regulamento Geral de Acesso.<br>A Biblioteca e o Arquivo Fotográfico são abertos ao público em geral.\r\nO acesso ao Arquivo Fotográfico para a consulta de originais fotográficos em acervo efectua-se sob marcação prévia com um mínimo de 48 horas de antecedência.', '7', 3),
(8, 'REPRODUÇÕES', 'Os serviços de reprodução do Centro de Documentação e Informação regem-se pelo Regulamento Geral de Reprodução de Documentos. <br><br>\r\n<h5>Serviço de fotocópias / impressão</h5> \r\n<br>\r\nOs utilizadores dispõem de uma fotocopiadora em regime de pré-pagamento e de auto-serviço. Para a sua utilização deverão consultar a tabela de preços em vigor.\r\nCada utilizador pode tirar até 40 fotocópias por dia. A máquina de fotocópia, disponível em regime de auto-serviço, é desligada às 19h15. Os utilizadores dispõem ainda da possibilidade de impressão em papel de toda a informação disponibilizada nos postos informáticos.', '8', 3),
(9, 'HORÁRIOS E CONTACTOS', '<p>2ª a 6ª feira, das 9h30 às 13h00 e das 14h00 às 17h30</p>\r\n\r\n<p>Tel. 219 689 400</p>\r\n\r\n<p>Fax: 219 689 499</p>\r\n\r\n<p>E-mail. acesso@cinemateca.pt</p>', '9', 3),
(10, 'VISIONAMENTOS', 'As colecções de imagens em movimento da Cinemateca podem ser visionadas no âmbito de projectos de investigação universitária ou equivalente, devidamente credenciados. <br>Os pedidos devem ser feitos com, pelo menos, 1 mês de antecedência - previamente à autorização do pedido, o ANIM procederá à pesquisa/verificação das obras disponíveis para consulta, assim como à preparação dos materiais.', '10', 4),
(11, 'CEDÊNCIA DE IMAGENS', 'A Cinemateca pode ceder imagens do seu arquivo mediante condições que dependem do âmbito da sua utilização (produções cinematográficas, audiovisuais, televisão, utilização institucional e museológica, investigação e ensino, publicidade, etc.). Os pedidos devem ser feitos com, pelo menos, 1 mês de antecedência.', '11', 4),
(12, 'PARCERIAS', 'Enquanto museu e arquivo nacional de cinema, a Cinemateca é uma instituição dedicada à salvaguarda e à divulgação museológica do património cinematográfico e não uma distribuidora cultural. Esta condição, reforçada pela conjuntura de transição tecnológica que converteu as colecções analógicas em acervos de renovação cada vez mais difícil, impede-nos de instituir uma prática descentralizadora alargada ou um regular serviço de cedência de cópias.', '12', 4),
(13, 'LABORATÓRIO E EQUIPAMENTOS', '<h5>Laboratório</h5>\r\n<p>A Cinemateca Portuguesa-Museu do Cinema tem no seu Departamento de Arquivo Nacional das Imagens em Movimento um laboratório de restauro fílmico, em actividade desde 1998.</p>\r\n\r\n<p>Criado prioritariamente para viabilizar trabalhos internos de preservação e restauro do cinema português, o laboratório também tem vindo a prestar serviços externos nas mesmas áreas, em particular para instituições estrangeiras congéneres da Cinemateca.</p>\r\n<br>\r\n\r\n<h5>Equipamentos</h5>\r\n\r\nREVELAÇÃO:\r\n\r\n- Preto e branco (16mm/35mm; Pos/Neg) Calder Equipment.\r\n\r\n- Positivo cor ECP (16mm/35mm; soundtrack Cyan/High Magenta) Calder Equipment\r\n\r\nDUPLICAÇÃO:\r\n\r\n- Copiadoras ópticas Debrie-CTM TAI e Seiki\r\n\r\n- Copiadoras step-contact Debrie Tipro (16mm) e ARRI (35mm)\r\n\r\n- Copiadoras contínuas Bell & Howell Model C (16 e 35mm)\r\n\r\n- Copiadoras contínuas wet gate Schmitzer (16 e 35mm) e BHP Panel (16mm e 35mm)\r\n\r\nÁUDIO:\r\n\r\n- Captura e digitalização de som óptico e magnético (Sondor OMA-E)\r\n\r\n- Editing digital (ProTools)\r\n\r\n- Produção de negativo de som óptico (mono, analógico) com equipamento Picot\r\n', '13', 4),
(14, 'DOCUMENTOS', '1. FORMULÁRIO DE ACESSO - Investigação académica\r\n\r\n2. FORMULÁRIO DE ACESSO - Cedência Imagens\r\n\r\n3. Requisição cedência de imagens em movimento - ANIM + Cinemateca Digital\r\n\r\nA_Academic Research_Access Form\r\n\r\nB_Images Assigning_Access Form\r\n\r\nC_Images assigning request - ANIM + Cinemateca Digital', '14', 4),
(15, 'HORÁRIOS, ESPAÇOS E CONTACTOS', '<p>2ª a 6ª feira, das 9h30 às 13h00 e das 14h00 às 17h30</p>\r\n\r\n<p>Tel. 219 689 400</p>\r\n\r\n<p>Fax: 219 689 499</p>\r\n\r\n<p>E-mail. acesso@cinemateca.pt</p>', '15', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `administradores`
--

CREATE TABLE `administradores` (
  `id` int(25) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `apelido` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nivel` int(10) NOT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `administradores`
--

INSERT INTO `administradores` (`id`, `nome`, `apelido`, `email`, `password`, `nivel`, `img`) VALUES
(1, 'Mónica', 'Marques', 'monica@monica.com', 'ff0d813dd5d2f64dd372c6c4b6aed086', 1, 'Cinemateca/img/doraemon-8353.jpg'),
(2, 'Hugo', 'Vaz', 'hugo@hugo.com', 'f1f58e8c06b2a61ce13e0c0aa9473a72', 1, 'Cinemateca/img/supermario.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `amigosdacinemateca`
--

CREATE TABLE `amigosdacinemateca` (
  `id` int(25) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `conteudo` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `target` varchar(50) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `amigosdacinemateca`
--

INSERT INTO `amigosdacinemateca` (`id`, `titulo`, `conteudo`, `url`, `target`, `img`) VALUES
(1, 'AMIGOS DA CINEMATECA', 'O grupo de Amigos da Cinemateca pretende apoiar a Cinemateca Portuguesa-Museu do Cinema, contribuindo para as suas actividades de salvaguarda e difusão do património cinematográfico.', '', '', ''),
(2, '', '', 'https://www.facebook.com/cinematecaportuguesa', 'Cinemateca/img/', 'img/facebook-icon.svg'),
(3, '', '', 'https://www.instagram.com/cinemateca.portuguesa/', '_blank', 'img/instagram-icon.svg'),
(4, '', '', 'https://twitter.com/cinemateca_prog/status/1473470297517006851', '_blank', 'img/twitter-icon.svg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `banners_paginas`
--

CREATE TABLE `banners_paginas` (
  `id` int(25) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `banners_paginas`
--

INSERT INTO `banners_paginas` (`id`, `url`) VALUES
(1, 'img/aniki_bobo.jpg'),
(2, 'img/bobines2.jpg'),
(3, 'img/icemerchants.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `banner_principal`
--

CREATE TABLE `banner_principal` (
  `id` int(25) NOT NULL,
  `url` varchar(255) NOT NULL,
  `target` varchar(50) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `banner_principal`
--

INSERT INTO `banner_principal` (`id`, `url`, `target`, `titulo`, `data`) VALUES
(1, 'img/breakfastattiffanyss.jpg', '_self', 'O GLORIOSO TECHNICOLOR', 'AGOSTO, 2023');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ciclos`
--

CREATE TABLE `ciclos` (
  `id` int(25) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `conteudo` text NOT NULL,
  `fk_filmes` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `target` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `ciclos`
--

INSERT INTO `ciclos` (`id`, `titulo`, `conteudo`, `fk_filmes`, `img`, `data`, `url`, `target`) VALUES
(1, 'TRÊS VEZES JOAN BENNETT', 'Três vezes Joan Bennet? A expressão é de Bernard Eisenschitz (em Fritz Lang au travail), assim referindo um núcleo da ligação cinematográfica da atriz com Fritz Lang que quatro vezes a filmou na década de 1940, excedendo o número de filmes que a associara a Raoul Walsh na anterior década de 1930, e as vezes – duas – que Vincente Minnelli a dirigiu nos anos 1950. WILD GIRL, ME AND MY GAL, BIG BROWN EYES (os Walsh); MAN HUNT e depois WOMAN IN THE WINDOW, SCARLETT STREET, SECRET BEYOND THE DOOR (os Lang), FATHER OF THE BRIDE, FATHER’S LITTLE DIVIDEND (os Minnelli) são filmes representativos do trabalho de Joan Bennett num percurso genericamente organizado em três fases. ', '1, 2, 3, 4, 5, 6, 7', 'img/recklessmoment.jpg', '01.06.2023 - 20.06.2023', 'ciclo.php', '_self'),
(2, 'IN MEMORIAM CARLOS SAURA', 'Com a morte de Carlos Saura a 10 de fevereiro deste ano (no dia seguinte iria receber o prémio Goya de Honor, pelo seu contributo para a História do cinema espanhol) encerrou-se, também, parte de uma cronologia histórica do cinema, não só do país, como da Europa. Um dos mais reconhecidos representantes do Novo Cinema Espanhol, e um dos últimos redutos das novas vagas europeias a persistir à passagem dos anos, Saura faleceu aos 91 anos em Madrid.', '8, 9, 10, 11, 12, 13, 14, 15', 'img/lacaza.jpg', '05.06.2023 - 15.06.2023', 'ciclo.php', '_self'),
(3, 'AS TRAGICOMÉDIAS DE ELDAR CHENGUELAIA', 'Depois dos Ciclos sobre a obra de Otar Iosseliani (em 2006) e da grande retrospetiva sobre o cinema georgiano em colaboração com o Doclisboa (em 2020), a Cinemateca volta a dedicar um programa ao riquíssimo cinema da Geórgia, mais concretamente a um dos cineastas mais amados no seu país (ainda que menos divulgados internacionalmente). Nascido em 1933 e ainda em atividade, Eldar Chenguelaia pertence a uma dinastia de cineastas.', '24, 25, 26, 27, 28', 'img/bluemountains.jpg', '15.06.2023 - 30.06.2023', 'ciclo.php', '_self'),
(4, 'A JUSTIÇA NO CINEMA: OS SINUOSOS CAMINHOS DA INVESTIGAÇÃO CRIMINAL', 'Comemora-se este ano o 35º aniversário do Departamento de Investigação e Acção Penal (DIAP) de Lisboa, órgão do Ministério Público. A Cinemateca associa-se à efeméride organizando um programa sobre a investigação criminal contada pela ficção e pelo documentário, ou entre a ficção e o documentário, em sessões seguidas de conversas com especialistas nessa área.', '16, 17, 18, 19, 20, 21, 22, 23', 'img/10echambre.jpg', '03.06.2023 - 17.06.2023', 'ciclo.php', '_self');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dia_semana`
--

CREATE TABLE `dia_semana` (
  `id` int(25) NOT NULL,
  `dia` varchar(255) NOT NULL,
  `dia_mes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `dia_semana`
--

INSERT INTO `dia_semana` (`id`, `dia`, `dia_mes`) VALUES
(1, 'SEGUNDA-FEIRA', '24.07'),
(2, 'TERÇA-FEIRA', '25.07'),
(3, 'QUARTA-FEIRA', '26.07'),
(4, 'QUINTA-FEIRA', '27.07'),
(5, 'SEXTA-FEIRA', '28.07'),
(6, 'SÁBADO', '29.07');

-- --------------------------------------------------------

--
-- Estrutura da tabela `filmes`
--

CREATE TABLE `filmes` (
  `id` int(25) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `realizador` varchar(255) NOT NULL,
  `ano` int(10) NOT NULL,
  `duracao` int(10) NOT NULL,
  `pais` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `elenco` varchar(255) NOT NULL,
  `legendas` varchar(255) NOT NULL,
  `titulo_original` varchar(255) NOT NULL,
  `sinopse` text NOT NULL,
  `lingua` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `target` varchar(50) NOT NULL,
  `fk_ciclo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `filmes`
--

INSERT INTO `filmes` (`id`, `titulo`, `realizador`, `ano`, `duracao`, `pais`, `img`, `elenco`, `legendas`, `titulo_original`, `sinopse`, `lingua`, `url`, `target`, `fk_ciclo`) VALUES
(1, 'NA TEIA DO DESTINO', 'Max Ophuls', 1949, 82, 'EUA', 'img\\recklessmoment2.jpg', 'Joan Bennett, James Mason, Geraldine Brooks', 'português', 'THE RECKLESS MOMENT', 'Após a morte acidental do amante indesejável de sua filha, Lucia Harper (Joan Bennett) esconde o corpo para proteger sua família. Após um tempo, o parceiro do morto (James Mason) aparece e começa a chantageá-la. O conforto e a segurança de seu mundo está em perigo, logo tudo começa a desmoronar.', 'Inglês', 'img/recklessmoment.jpeg', '_self', '1'),
(2, 'FERAS HUMANAS', 'Fritz Lang', 1941, 105, 'EUA', 'img/manhunt2.jpg', 'Joan Bennett, Walter Pidgeon, George Sanders', 'português', 'MAN HUNT', 'Em 29 de julho de 1939, pouco antes do início da Segunda Guerra Mundial, o famoso caçador inglês Alan Thorndike é preso com um rifle de mira telescópica quando estava na floresta vizinha a residência de Adolf Hitler nas proximidades de Berchtesgaden. Ele é acusado de tentar matar o ditador e os alemães querem que assine a confissão de que agiu a mando do governo britânico para a usarem como pretexto e começar a guerra, mas, mesmo torturado, Thorndike se recusa.', 'Inglês', 'img/manhunt1.jpg', '_self', '1'),
(3, 'A MULHER DESEJADA', 'Jean Renoir', 1946, 71, 'EUA', 'img/thewomanonthebeach1.jpg', 'Joan Bennett, Charles Bickford , Robert Ryan', 'português', 'THE WOMAN ON THE BEACH', 'Ao começo Jean Renoir fizera deste filme uma espécie de prolongamento de \"La Bête Humaine\", no estudo da relação entre o desejo sexual e a pulsão criminosa, com uma forte carga erótica. Mas às primeiras projecções privadas, ficou claro que o público não entendia o objectivo do realizador, que o remontou, surgindo \"The Woman On The Beach\" dentro da linha do \"filme negro\", com mulher \"fatal\" e um herói que vem traumatizado da guerra. Um dos mais insólitos e perturbantes filmes de Renoir.', 'Inglês', 'img/thewomanonthebeach.jpg', '_self', '1'),
(4, 'O SEGREDO DA PORTA FECHADA', 'Fritz Lang', 1949, 91, 'EUA', 'img/secretbehindthedoor.jpg', 'Joan Bennett, Paul Cavanagh, Michael Redgrave', 'português', 'SECRET BEYOND THE DOOR', 'Prestes a se casar com um amigo, a jovem Celia (Joan Bennett) tira férias e viaja para o México. Lá ela conhece o homem dos seus sonhos, Mark (Michael Redgrave), com quem se casa dias depois do primeiro contato. Os dois vão morar juntos na mansão dele, misteriosa e sombria como o dono. Com o passar do tempo ela vai desvendando os segredos do local, mas um quarto especial, sempre trancado, continua intrigando-a.', 'Inglês', 'img/secretbeyondthedoor.jpg', '_self', '1'),
(5, 'ALMAS PERVERSAS', 'Fritz Lang', 1945, 101, 'EUA', 'img\\scarletstreet.jpg', 'Joan Bennett, Dan Duryea, Edward G. Robinson', 'português', 'SCARLET STREET', ' Trata-se da história de um pintor que abandona a mulher e mata a amante num acesso de ciúmes. Em relação à versão de Renoir, Lang abandona a faceta realista para acentuar uma sombria incursão pela culpa e pelo peso do destino, numa atmosfera de filme noir.', 'Inglês', 'img/scarletstreet1.jpg', '_self', '1'),
(6, 'UM RETRATO DE MULHER', 'Fritz Lang', 1944, 99, 'EUA', 'img/thewomaninthewindow.jpg', 'Joan Bennett, Thomas E. Jackson, Edmond Breon', 'português', 'THE WOMAN IN THE WINDOW', 'O professor universitário Richard Wanley tem a chance de conhecer a modelo de uma foto que muito admira. Os dois saem juntos e acabam no apartamento da moça, mas são surpreendidos pelo namorado dela, sendo todos envolvidos em uma tragédia.', 'Inglês', 'img/thewomaninthewindow.jpg', '_self', '1'),
(7, 'NÃO SOMOS ANJOS', 'Michael Curtiz', 1955, 106, 'EUA', 'img/werenoangels.jpg', 'Joan Bennett, Humphrey Bogart, Aldo Ray, Peter Ustinov', 'português', 'WE\'RE NO ANGELS', 'Três condenados escapam da Ilha do Diabo e vão para uma cidade colonial. Inicialmente, eles planejam roubar suprimentos e roupas de uma loja, mas simpatizam com a família do proprietário da loja.', 'inglês', 'img/werenoangels.jpg', '_self', '1'),
(8, 'OS GOLFOS', 'Carlos Saura', 1963, 104, 'EUA', 'img/losgolfos.jpg', 'Manolo Zarzo, Jose Luis Marin,  Óscar Cruz', 'português', 'LOS GOLFOS', 'Um grupo de amigos vive como podem pelas favelas de Madrid. Um deles, chamado John, quer ser um toureiro e, querendo ajudá-lo à fazer sua estreia, seus amigos cometem roubos para cobrir os custos. Quando um deles rouba um motorista de táxi, e morre ao tentar escapar, todo o plano é comprometido.', 'Inglês', 'img/losgolfos.jpg', '_self', '2'),
(9, 'CARMEN', 'Carlos Saura', 1983, 104, 'EUA', 'img/carmen.jpg', 'Antonio Gades, Laura del Sol, Paco de Lucia', 'português', 'CARMEN', 'Uma trupe de dançarinos de flamenco estão ensaiando uma nova apresentação. Antonio, o coreógrafo da equipe se apaixona por Carmen, a bailarina principal - tirando o foco do resultado final.', 'Espanhol', 'img/carmen.jpg', '_self', '2'),
(10, 'CRIA CORVOS', 'Carlos Saura', 1976, 104, 'Espanha', 'img/criacuervos.jpg', 'Ana Torrent, Geraldine Chaplin', 'português', 'CRÍA CUERVOS', 'Último filme de Saura realizado durante o franquismo (foi filmado durante a longa agonia do ditador), CRÍA CUERVOS marca o fim de um importante período na obra do realizador, durante o qual realizou provavelmente os seus melhores filmes. O título faz alusão a um provérbio espanhol: “Cria corvos e eles arrancar-te-ão os olhos”. A ação passa-se num casarão em Madrid, onde vivem três crianças, com o pai viúvo, uma criada e uma tia. Uma delas (Ana Torrent, a protagonista de EL ESPIRITU DE LA COLMENA), fechada num universo de sonho, julga-se responsável pela morte do pai e faz reaparecer a sua mãe morta, com quem mantém uma estranha relação. Mas este filme mórbido e belíssimo acaba com uma nota de otimismo.', 'Espanhol', 'img/criacuervos.jpg', '_self', '2'),
(11, 'FADOS', 'Carlos Saura', 2007, 90, 'EUA', 'img/fados.jpg', 'Chico Buarque de Hollanda, Camané, Carlos do Carmo', 'português', 'FADOS', 'O filme relata a visão do autor sobre o fado e conta com participações de Mariza, Camané, Carlos do Carmo, Carminho, entre outros. O filme recebeu o Prémio Goya para melhor cancão original: \"Fado da saudade\" na interpretação de Carlos do Carmo. Estava ainda nomeado para a categoria de Melhor Documentário.', 'Espanhol', 'img/fados.jpg', '_self', '2'),
(12, 'IDEIA FIXA', 'Carlos Saura', 1967, 97, 'Espanha', 'img/peppermintfrappe.jpg', 'Geraldine Chaplin, José Luis López Vázquez, Alfredo Mayo, Emiliano Redondo', 'português', 'PEPPERMINT FRAPPÉ', 'A história centra-se num homem que fica obcecado com a esposa de um amigo de longa data, acreditando que ela é a misteriosa baterista pela qual se apaixonou uma vez num Festival. O homem começa a perseguir a mulher, sendo afastado por ela de todas as vezes.', 'Espanhol', 'img/peppermintfrappe.jpg', '_self', '2'),
(13, 'EM TRÊS, UM É DEMAIS', 'Carlos Saura', 1968, 95, 'Espanha', 'img/stressestrestres.jpg', 'Geraldine Chaplin, Juan Luis Galiardo', 'português', 'STRESS-ES TRES-TRES', 'Um operário sai de férias para uma casa de praia junto com a esposa e o melhor amigo. Com o passar dos dias, ele começa a achar que os dois começaram um caso amoroso. Ele torna-se cada vez mais paranóico à medida que os carinhos se tornam mais constantes entre eles. Aflito, ele começa a planear a morte do melhor amigo.', 'Espanhol', 'img/stressestrestres.jpg', '_self', '2'),
(14, 'A CAÇA', 'Carlos Saura', 1968, 91, 'Espanha', 'img/lacaza.jpg', 'Alfredo Mayo, Emilio Gutiérrez, Fernando Sánchez', 'português', 'LA CAZA', 'Parábola corajosa de Carlos Saura sobre a Guerra Civil Espanhola. José, Paco e Luís são três veteranos de guerra e amigos que saem para caçar na companhia de Enrique, um jovem de 20 anos, em sua primeira excursão. Eles vão praticar o seu esporte favorito nas terras de José, onde uma importante batalha da Guerra Civil ocorreu não muito tempo atrás. Um filme nervoso e um estudo extremamente simbólico sobre o ódio e a rivalidade, “A Caça” como alegoria da guerra. Clássico do cinema espanhol que a Lume Filmes lança no mercado brasileiro.', 'Espanhol', 'img/lacaza.jpg', '_self', '2'),
(15, 'A PRIMA ANGÉLICA', 'Carlos Saura', 1974, 100, 'Espanha', 'img/laprimangelica.jpg', 'Jose Luis López Vázquez, Lina Canalejas, Fernando Delgado', 'português', 'LA PRIMA ANGÉLICA', 'Luis, morador de Barcelona, um homem solteiro de meia idade viaja para Segovia após a morte da sua mãe para tratar do seu funeral. A sua tia Pilar leva-o para a sua antiga casa, onde morou quando era jovem. Lá, ele encontra com sua prima Angélica, que foi o seu primeiro amor, e hoje mora com o marido e a filha no mesmo lugar. As lembranças ressurgirão à medida que os seus sentimentos pela mulher se confundem com os que tinha antigamente.', 'Espanhol', 'img/laprimangelica.jpg', '_self', '2'),
(16, 'DOMESTIC VIOLENCE', 'Frederick Wiseman', 2001, 196, 'EUA', 'img/domesticviolence.jpg', 'Documentário', 'português', 'DOMESTIC VIOLENCE', 'Após um retrato quase poético sobre toda uma localidade, BELFAST, MAINE, Frederick Wiseman regressou ao coração do seu cinema, acrescentando mais um tomo à sua épica história da América “escrita” a partir de uma observação atenta da vida das instituições. O tema é a violência doméstica e como esta é encarada num centro de apoio a mulheres abusadas no estado da Florida – na estrondosa segunda parte, Wiseman concentra atenções na atividade de um tribunal que lida com processos do género.', 'Inglês', 'img/domesticviolence.jpg', '_self', '4'),
(17, 'DÉLITS FLAGRANTS', 'Raymond Depardon', 1994, 108, 'França', 'img/delits-flagrants1.png', 'Documentário', 'português', 'DÉLITS FLAGRANTS', 'Na linha do trabalho de Raymond Depardon de filmar as grandes instituições, DÉLITS FLAGRANTS mostra-nos, com uma liberdade e um rigor muito assinaláveis, o funcionamento do sistema que rege a fase da investigação das pessoas presas em Paris em “flagrante delito”. Trabalho desenvolvido durante anos só para a obtenção de autorização excecional para filmar ali, nos gabinetes da 8ª secção do Palais de Justice em Paris, sendo que Depardon obteve ainda anuência de dezenas de detidos para serem filmados durante o interrogatório mas somente 14 deles chegaram à montagem final. “Nenhum dos réus parece saber que já estão julgados e que o tribunal vai apenas avalizar o que já foi decidido.', 'Francês', 'img/delits-flagrants1.png', '_self', '4'),
(18, '10E CHAMBRE – INSTANTS D’AUDIENCE', 'Raymond Depardon', 2004, 102, 'França', 'img/10echambre.jpg', '10E CHAMBRE – INSTANTS D’AUDIENCE', 'português', 'Documentário', 'Na linha do trabalho de Raymond Depardon de filmar as grandes instituições, DÉLITS FLAGRANTS mostra-nos, com uma liberdade e um rigor muito assinaláveis, o funcionamento do sistema que rege a fase da investigação das pessoas presas em Paris em “flagrante delito”. Trabalho desenvolvido durante anos só para a obtenção de autorização excecional para filmar ali, nos gabinetes da 8ª secção do Palais de Justice em Paris, sendo que Depardon obteve ainda anuência de dezenas de detidos para serem filmados durante o interrogatório mas somente 14 deles chegaram à montagem final. “Nenhum dos réus parece saber que já estão julgados e que o tribunal vai apenas avalizar o que já foi decidido.', 'Francês', 'img/10echambre.jpg', '_self', '4'),
(19, 'MATAR OU NÃO MATAR', 'Errol Morris', 1988, 101, 'EUA', 'img/thethinblueline2.jpg', 'Documentário', 'português', 'THE THIN BLUE LINE', 'Um dos filmes que primeiro atraíram a atenção sobre Errol Morris, THE THIN BLUE LINE resultou de um conjunto de entrevistas gravadas com um homem condenado à morte, considerado culpado de assassínio. O estilo elaborado de Morris, que procede a reconstituições da cena do crime, contrasta com a secura dos segmentos de entrevista propriamente dita. Um filme poderosíssimo – sobre a pena de morte e sobre o sistema judicial americano – e extraordinariamente polémico – a sua mistura entre um certo cinema verista e o mais virtuoso aparato ficcional levou a que a Academia dos Oscares recusasse a sua nomeação para o Oscar de Melhor Documentário. A exibir em cópia digital.', 'Inglês', 'img/thethinblueline2.jpg', '_self', '4'),
(20, 'CADÁVERES INCÓMODOS', 'Francesco Rosi', 1976, 120, 'Itália, França', 'img/cadaverieccelenti.png', 'Lino Ventura, Tino Carraro, Alain Cuny, Max von Sydow', 'português', 'CADAVERI ECCELLENTI', 'Thriller político sobre um detetive, encarnado pelo inconfundível Lino Ventura, a braços com o caso dos homicídios misteriosos de juízes do Supremo Tribunal. Quanto mais a investigação avança, mais gravosos se afiguram os seus contornos políticos. Filmado com a secura que celebrizou outros filmes de Rosi, como SALVATORE GIULIANO, foi comparado com THE CONVERSATION de Francis Ford Coppola, por nos fazer sentir o terror de alguém que é ultrapassado – e posto em xeque – pela gravidade dos factos que tem em mãos. Nota de destaque para a qualidade do elenco de secundários (com uma participação memorável de Max von Sydow) e ainda para a sumptuosa fotografia de Pasqualino De Santis (MORTE A VENEZIA). Primeira apresentação na Cinemateca.', 'Italiano', 'img/cadaverieccelenti.png', '_self', '4'),
(21, 'O VIGILANTE', 'Francis Ford Coppola', 1974, 113, 'EUA', 'img/theconversation.jpg', 'Gene Hackman, John Cazale, Allen Garfield, Cindy Williams', 'português', 'THE CONVERSATION', 'Filmado depois da famosa saga THE GODFATHER, Coppola regressou, como faria várias vezes na sua carreira, a um registo intimista. Desta vez, chamou Gene Hackman para interpretar o papel de um homem recluso e agente privado de segurança que descobre, na enigmática gravação de uma conversa entre um casal nas ruas de São Francisco, uma misteriosa pista de assassinato que tentará resolver com o seu obsessivo conhecimento técnico. Estreado poucos meses antes da demissão de Richard Nixon (cujo equipamento de gravação, no escândalo Watergate, é o mesmo usado pela personagem de Hackman), THE CONVERSATION tornou-se num dos filmes mais significativos da chamada Nova Hollywood, agraciado com a Palma de Ouro do Festival de Cannes em 1974.', 'Inglês', 'img/theconversation.jpg', '_self', '4'),
(22, 'LABIRINTO DE MENTIRAS', 'Giulio Ricciarelli', 2014, 118, 'Alemanha', 'img/labirintomentiras.jpg', 'André Szymanski, Alexander Fehling, Friederike Becht', 'português', 'IM LABYRINTH DES SCHWEIGENS', 'Realizador e actor ítalo-alemão, Giulio Ricciarelli assina uma obra inquietante sobre o calvário de um jovem advogado apostado em reabrir, no ano de 1958, o processo histórico que condenou vários SS no Tribunal de Nuremberga para aprofundar o envolvimento do Estado alemão no encobrimento dos múltiplos crimes cometidos em Auschwitz. Quando todos querem olhar para a frente e esquecer o passado, soergue-se um advogado para acabar de contar uma história de impensável horror. Baseado numa história real. Primeira apresentação na Cinemateca.', 'Alemão', 'img/labirintomentiras.jpg', '_self', '4'),
(23, 'CAMARATE', 'Luís Filipe Rocha', 2000, 143, 'Portugal', 'img/camarate.png', 'Maria João Luís, Virgílio Castelo, Filipe Ferrer', 'português', 'CAMARATE', 'Obra sóbria assinada por Luís Filipe Rocha sobre “o JFK português”: o caso Camarate, cujos contornos permanecem ainda hoje por esclarecer em pleno. Terá sido um acidente ou, antes, um atentado a vitimar mortalmente o Primeiro-Ministro português Francisco Sá Carneiro, no dia 4 de dezembro de 1980? Filipe Rocha ficcionaliza alguns aspetos do processo através da história de Luísa, uma juíza a quem cabe a decisão de levar ou não o caso a julgamento. Interpretação notável de Maria João Luís num filme que relançou entre nós o debate sobre um dos processos mais badalados na História da justiça portuguesa. Primeira apresentação na Cinemateca.', 'Português', 'img/camarate.png', '_self', '4'),
(24, 'AS MONTANHAS AZUIS OU UMA HISTÓRIA INACREDITÁVEL', 'Eldar Chenguelaia', 1983, 95, 'URSS', 'img/bluemountains.jpg', 'Ramaz Giorgobiani, Vasil Kakhniashvili, Taimuraz Chirgadze', 'português', 'TSIPERI MTEBI ANIJ SAUJEBERELI AMBAVI', 'AS MONTANHAS AZUIS narra a história de uma frustração perpétua no interior do sistema burocrático soviético. Um jovem escritor tenta publicar um livro e leva o manuscrito a uma editora. Mas o tempo passa e nenhum membro da editora parece ter tempo para ler o manuscrito, em parte porque estão às voltas com trabalhos anexos que nada têm a ver com a edição de livros e tomam-lhes muito tempo. ', 'Georgiano', 'img/bluemountains.jpg', '_self', '3'),
(25, 'A CARAVANA BRANCA', 'Eldar Chenguelaia', 1963, 93, 'URSS', 'img/thewhitecaravan.jpg', 'Spartak Bagashvilli, Ariadna Chenguelaia, Imedo Kakhiari', 'português', 'TETRI KARAVANI', 'A ação tem lugar numa áspera paisagem invernal, onde um grupo de pastores se desloca com os seus rebanhos, filmados de modo quase documental. O filme é um périplo, com os protagonistas em constante deslocação. Um dos homens, no entanto, recusa-se a continuar a ser pastor e decide mudar-se para uma grande cidade. Dá o primeiro passo nessa direção, mas as forças da tradição são mais fortes. O filme foi apresentado no Festival de Cannes.', 'Georgiano', 'img/thewhitecaravan.jpg', '_self', '3'),
(26, 'MIQELA', 'Eldar Chenguelaia', 1964, 45, 'URSS', 'img/mikela.jpg', 'Grigol Tkabladze, Zinaida Kverenchiladze, Mikheil Khvita', 'português', 'MIKELA', 'A personagem titular é um velho camponês evitado por todos os seus vizinhos, devido à morte dos seus dois filhos, o que fez dele um homem “maldito”. O velho vive com uma nora e os dois netos e é um homem ao mesmo tempo religioso e supersticioso. Quando o seu neto adolescente cai enfermo, o homem decide desmontar a sua casa e deslocá-la para outro sítio, para escapar à maldição, instalando o rapaz numa cabana anexa à casa.', 'Georgiano', 'img/mikela.jpg', '_self', '3'),
(27, 'UMA EXPOSIÇÃO INSÓLITA', 'Eldar Chenguelaia', 1968, 93, 'URSS', 'img/exposicaoinsolita.jpg', 'Guran Lortkipanidze, Valentina Telichkina, Vasili Chkhaidze', 'português', 'ARACHVEULEBRIVI GAMOPENA', 'Uma história agridoce, ao mesmo tempo melancólica e satírica. Um escultor recém-formado recebe como prenda do seu professor um bloco de mármore, com o qual sonha fazer uma obra-prima. Mas na prosaica realidade do dia-a-dia o homem tem apenas encomendas de bustos de pessoas da terra e de esculturas para ornamentar túmulos. Entretanto, recusa-se a tocar no bloco de mármore, pois ainda ambiciona esculpir uma obra-prima. Todo o filme é percorrido pelo humor (há impagáveis sequências na frente de guerra, nas passagens iniciais), que tempera a amargura que está no cerne da história narrada.', 'Georgiano', 'img/exposicaoinsolita.jpg', '_self', '3'),
(28, 'EXCÊNTRICOS', 'Eldar Chenguelaia', 1974, 79, 'URSS', 'img/eccentrics1.jpg', 'Vasili Chkhaidze, Dato Jgentni, Ariadne Chenguelaia', 'português', 'SHEREKILEBI', 'Uma fábula que é uma história de aprendizagem e afasta-se quase por completo da narrativa linear, embora tudo se passe num mundo muito real, a Geórgia soviética dos anos 70. Depois da morte do seu pai, um rapaz deixa a aldeia natal e ruma para uma cidade, onde se apaixona por uma mulher casada, porém cercada por vários admiradores. Ele ajuda-a a livrar-se de um pretende inoportuno, mas este vinga-se fazendo prender o rapaz, que conhecerá na cadeia um indivíduo excêntrico, obcecado pela ideia de construir uma máquina capaz de voar. O equilíbrio entre imaginação e rigor que caracteriza o cinema de Eldar Chenguelaia tem aqui um dos seus melhores exemplos.', 'Georgiano', 'img/eccentrics1.jpg', '_self', '3'),
(29, 'E.T - O EXTRATERRESTRE', 'Steven Spielberg', 1982, 120, 'EUA', 'null', 'Henry Thomas, Drew Barrymore, Dee Wallace', 'português', 'E.T. The Extra-Terrestrial', 'Um garoto faz amizade com um ser de outro planeta, que ficou sozinho na Terra, protegendo-o de todas as formas para evitar que ele seja capturado e transformado em cobaia. Gradativamente, surge entre os dois uma forte amizade.', 'Inglês', 'img/et.jpg', '_self', ''),
(30, 'FANTASIA', 'Ben Sharpsteen, James Algar, Samuel Armstrong', 1940, 123, 'EUA', 'null', 'Henry Thomas, Drew Barrymore, Dee Wallace', 'português', 'FANTASIA', 'FANTASIA foi a segunda longa-metragem produzida pelo mago da animação, Walt Disney, em 1940, depois do grande triunfo que constituiu a primeira, BRANCA DE NEVE E OS SETE ANÕES. Mas, de facto, «Fantasia» é, antes de mais, uma colagem de pequenos episódios, ou segmentos, cada um deles ilustrando uma composição (ou parte) célebre de música clássica.', 'Inglês', 'img/fantasia.jpg', '', ''),
(31, 'WALLACE & GROMIT: A MALDIÇÃO DO COELHO-HOMEM', 'Nick Park, Steve Box', 2005, 85, 'UK', 'null', 'Animação', 'português', 'FANTASIA', 'Gromit é um ser genial, o caríssimo Wallace é um cavalheiro very british, um inventor imparável, mas muito menos dotado que o seu cão, talvez por consumo excessivo de queijo. “A Maldição do Coelhomem” confirma em absoluto esta análise de perfis da dupla mais famosa da animação britânica, análise desenvolvida ao longo dos tempos e da coleção de curtas que contabiliza fãs desde os idos de 1990, com o inaugural A Grand Day Out (Dia de Folga). No filme de hoje, uma inspiradíssima variação cómica dos filmes de terror ingleses dos anos sessenta da produtora Hammer, Wallace depois de um acidente com um invento de indução telepática de pensamentos bons cria uma terrível criatura que destroi hortas e ameaça o histórico Festival de Legumes Gigantes. Felizmente o Gromit anda por perto.', 'Inglês', 'img/wallacegromit.jpg', '', ''),
(32, 'O REI LEÃO', 'Rob Minkoff, Roger Allers', 1994, 87, 'EUA', 'null', 'Animação', 'português', 'THE LION KING', 'Esta animação da Disney leva-nos ao reino dos leões e segue as aventuras do jovem leão Simba, filho do Rei Mufasa. O malvado tio de Simba, Scar, lança-se numa conspiração para usurpar o trono de Mufasa, atraindo pai e filho para uma armadilha. No entanto, Simba escapa e irá regressar mais tarde, já adulto para recuperar a sua terra natal, libertando-a de Scar, com a ajuda dos seus amigos Timão e Pumba.', 'Inglês', 'img/lionking.jpeg', '', ''),
(33, 'LUA DE PAPEL', 'Peter Bogdanovich', 1973, 102, 'EUA', 'null', 'Ryan O\'Neal, Tatum O\'Neal, Madeline Kahn', 'português', 'PAPER MOON', 'Durante a Grande Depressão, Addie Loggins perde a mãe e fica ao cuidado de um velho amigo desta, Moses Pray, um pequeno vigarista que se compromete a entregá-la à tia no Kansas. Esta será uma viagem iniciática para Addie, Moses e para todas as gerações de espectadores que acompanharam esta dupla num filme inesquecível que evoca os grandes do cinema clássico, num casamento feliz entre Ford, Chaplin e Hitchcock.', 'Inglês', '', '', ''),
(34, 'MARY POPPINS', 'Robert Stevenson', 1964, 137, 'EUA', 'null', 'Julie Andrews, Dick Van Dyke, David Tomlinson, Glynis Johns, Ed Wynn', 'português', 'MARY POPPINS', 'Um dos grandes êxitos da produção dos estúdios Disney nos anos 60, MARY POPPINS ganhou, entre vários outros, um Oscar pelos seus efeitos especiais, que permitiram\r\nfilmar ações reais sobre fundos animados. O argumento parte do livro de P. L. Travers sobre uma ama invulgar que, em Londres, por volta de 1910, altera profundamente a vida da família Banks. Jane Darwell\r\naparece pela última vez no cinema no papel da “mulher dos pássaros”, Julie Andrews e Dick Van Dyke têm desempenhos inesquecíveis.', 'Inglês', 'img/marypoppins.jpeg', '', ''),
(35, 'O NAVEGANTE', 'Donald Crisp, Buster Keaton', 1924, 59, 'EUA', 'null', 'Buster Keaton, Kathryn Mc Guire, Frederick Vroom', 'português', 'THE NAVIGATOR', 'Buster Keaton é desta vez um jovem rico e ocioso que, por desfastio, decide casar e fazer uma grande viagem de barco com a vizinha da frente, no dia seguinte. O casamento não se concretiza, mas a viagem acontece e será uma aventura inesquecível. O filme entrou para o panteão do American Film Institute como uma das 100 melhores comédias de todos os tempos.', 'Inglês', '', '', ''),
(36, 'SUPER 8', 'J.J Abrams', 2011, 120, 'EUA', 'null', 'Joel Courtney, Kyle Chandler, Riley Griffiths', 'português', 'SUPER 8', 'Joe Lamb perdeu a mãe há pouco tempo, o que fez com que seu relacionamento com o pai, um policial dedicado que não sabe como se comportar com o filho, se deteriorasse. Fã de cinema e estudioso de maquiagem, ele se diverte ao lado dos amigos Charles, Martin e Cary ao tentar rodar um filme caseiro para participar de uma competição local para jovens cineastas. Joe logo se anima quando Charles convida Alice Dainard para o elenco, já que está a fim dela.', 'Inglês', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `footer_row`
--

CREATE TABLE `footer_row` (
  `id` int(25) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `target` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `footer_row`
--

INSERT INTO `footer_row` (`id`, `titulo`, `url`, `target`) VALUES
(1, '©Cinemateca Portuguesa', 'index.php', '_self'),
(2, 'Política de Privacidade', 'politicadeprivacidade.php', '_self'),
(3, 'Livraria e Restaurante', 'livraria_restaurante.php', '_self');

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupos_acordeoes`
--

CREATE TABLE `grupos_acordeoes` (
  `id` int(25) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `ordem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `grupos_acordeoes`
--

INSERT INTO `grupos_acordeoes` (`id`, `nome`, `ordem`) VALUES
(1, 'cinemateca_junior', '1'),
(2, 'coleccoes_arquivos', '2'),
(3, 'biblioteca_arquivo_fotografico', '3'),
(4, 'arquivo_filmico_videografico', '4');

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupos_slides`
--

CREATE TABLE `grupos_slides` (
  `id` int(25) NOT NULL,
  `titulo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `grupos_slides`
--

INSERT INTO `grupos_slides` (`id`, `titulo`) VALUES
(1, 'galeria1'),
(2, 'galeria2'),
(3, 'galeria3'),
(4, 'cinematecajunior'),
(5, 'cinematecajunior_digital'),
(6, 'oficinas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `historia`
--

CREATE TABLE `historia` (
  `id` int(25) NOT NULL,
  `ano` varchar(255) NOT NULL,
  `evento` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `historia`
--

INSERT INTO `historia` (`id`, `ano`, `evento`) VALUES
(5, '1948', 'Criação da Cinemateca Nacional, pela Lei nº 2027, integrada nos serviços do SNI.'),
(6, '1956', 'Construção dos depósitos de filmes da Cinemateca Nacional com sistema de condicionamento de ar.'),
(7, '1958', '29 de Setembro: Início da actividade de programação da Cinemateca no Palácio Foz. \r\n30 de Setembro: Abertura da Biblioteca ao público.'),
(8, '1971', 'Lei 7/71 de 7 de Janeiro, que estabelece a criação do Instituto Português de Cinema e a integração da Cinemateca Nacional no mesmo; transferência dos serviços para a Rua de S. Pedro de Alcântara; os cofres e a sala de cinema mantêm-se no Palácio Foz.'),
(9, '1980', 'Pelo Decreto-Lei nº 59/80, de 3 de Abril, a Cinemateca Portuguesa (designação que substituía a de Cinemateca Nacional) é dotada de autonomia administrativa e financeira, personalidade jurídica e património próprio. Aquisição do imóvel na Rua Barata Salgueiro para edifício-sede da Cinemateca Portuguesa.<br>\r\n14 de Julho: Início das sessões diárias da Cinemateca, na nova sala construída no edifício da Rua Barata Salgueiro, acompanhadas de um texto analítico original.\r\n1 de Agosto: Publicação do decreto regulamentar nº 33/80, dotando a Cinemateca \"dos meios e estruturas consentâneos com a missão que lhe está reservada\". Neste decreto é estabelecido que as receitas da Cinemateca correspondem a 20% das receitas orçamentais do IPC, provenientes do imposto adicional sobre espectáculos de cinema. Constituição de um grupo de trabalho proposto pelo IPC e RTP, que integra elementos da Cinemateca, para a criação do Arquivo Nacional das Imagens em Movimento.\r\n27 de Outubro: A UNESCO aprova e publica a \"Recomendação de Belgrado\", que chama a atenção de todos os governos do mundo para a importância da conservação das imagens em movimento.'),
(10, '1981', 'Janeiro: Instalação dos serviços e pessoal da Cinemateca no novo edifício.<br>\r\n23 de Abril: Destruição total da sala de cinema, provocada por um incêndio devido à combustão de um rolo de uma cópia com suporte de nitrato de celulose.<br>\r\nSetembro: Projecto ANIM é transferido para a esfera de orientação da Cinemateca.'),
(11, '1991', 'Julho: Reunidos em Lisboa, representantes das principais cinematecas europeias lançam o Projecto LUMIÈRE, integrado no Programa Media da Comunidade Europeia. O projecto, que constitui a primeira iniciativa comunitária de apoio ao património cinematográfico, tem sede em Portugal e decorre até 1995, altura em que é activada a ACCE (Associação das Cinematecas da Comunidade Europeia), hoje ACE (Associação das Cinematecas Europeias).'),
(12, '1996', '6 de Outubro: Inauguração do centro de conservação (ANIM) da Cinemateca.'),
(13, '1997', 'Decreto-Lei nº 165/97, de 28 de Junho, que consagra a natureza e o regime de funcionamento da Cinemateca Portuguesa-Museu do Cinema. No âmbito do programa MEDIA, a UE cria o projecto ARCHIMEDIA, que reúne cinematecas, laboratórios e universidades para a formação específica dos jovens profissionais neste domínio.'),
(14, '2000', 'Durante a presidência portuguesa da UE, os peritos dos 15 estados-membros reúnem-se em Sintra para os \"Estados Gerais do Património Cinematográfico Europeu : 100 anos de imagens a salvar para o futuro\", organizados pela Cinemateca.'),
(15, '2003', 'Janeiro: inauguração do edifício-sede da Cinemateca, após as obras de remodelação que incluíram a construção de duas salas de cinema (\"Sala M. Félix Ribeiro” e “Sala Luís de Pina\"), o aumento do espaço para depósito de livros e arquivo fotográfico, a criação de salas museográficas e a construção de uma livraria e um restaurante.'),
(16, '2007', '20 de Abril: Inauguração da Cinemateca Júnior, no Palácio Foz.'),
(17, '2010', 'Construção de cinco novos cofres para arquivo de filmes em suporte safety (acetato e poliéster).');

-- --------------------------------------------------------

--
-- Estrutura da tabela `info_geral`
--

CREATE TABLE `info_geral` (
  `id` int(25) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `conteudo` text NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `fk_seccao` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `info_geral`
--

INSERT INTO `info_geral` (`id`, `titulo`, `conteudo`, `img`, `fk_seccao`) VALUES
(1, 'A CINEMATECA', 'A Cinemateca Portuguesa-Museu do Cinema é o organismo nacional, tutelado pelo Ministro da Cultura, que tem por missão a salvaguarda e a divulgação do património cinematográfico. Foi fundada no início dos anos 50 por um dos pioneiros das cinematecas europeias, Manuel Félix Ribeiro, e tornou-se uma instituição autónoma em 1980. Desde 1956, a Cinemateca é membro da Federação Internacional dos Arquivos de Filmes (FIAF), criada em 1938, com o objectivo de promover a conservação e o conhecimento do património cinematográfico, conjugando os esforços dos mais importantes arquivos do mundo, e que conta actualmente com mais de 150 afiliados de 77 países. Também em 1956, foi inaugurada a primeira sala própria da Cinemateca, dedicada à sua actividade exibidora. Em 1996, a Cinemateca abriu um moderno centro de conservação nos arredores de Lisboa, que é actualmente a base de todas as actividades de preservação, pesquisa técnica e acesso, incluindo o uso de novas tecnologias. A Cinemateca desempenhou um papel decisivo na criação e desenvolvimento da rede de instituições europeias dedicadas à preservação do património cinematográfico europeu, sendo co-fundadora da Associação Europeia de Cinematecas (ACE) e participando em diversos programas, tais como: Projecto LUMIÈRE (Programa Europeu Media I, 1991-1995, que teve sede em Lisboa); ARCHIMEDIA – Rede Europeia de Formação para a Promoção do Património Cinematográfico; «Urgent: Nitrate Can\'t Wait» (programa Raphael); European Film Gateway (2008-2011).', NULL, 9999),
(2, 'PROGRAMAÇÃO', '', '', 1),
(3, 'CINEMATECA JÚNIOR', '<div class=\"col-lg-4 col-md-4 col-sm-12 col-xs-12 bilheteira nopadding\">\r\n<h4>Bilheteira</h4><br>\r\n<h4>Sessões de Cinema</h4><br>\r\n<p>Júnior(até aos 16 anos) - 1,10€</p><br>\r\n<p>Adultos - 3,20€</span></p><br>\r\n<p>(descontos habituais - consultar bilheteira)</p><br>\r\n<h4>Oficina </h4><br>\r\n<p>4,00€ por criança</p><br>\r\n<p class=\"margin-bottom-50\">Bilhetes à venda em <a href=\"cinemateca.bol.pt\" class=\"link\">cinemateca.bol.pt</a>\r\n</div>\r\n\r\n<div class=\"col-lg-4 col-md-4 col-sm-12 col-xs-12 nopadding info-marcacoes\">\r\n<h4>Informações e Marcações</h4><br>\r\n<p>2ª a 6ª feira <span class=\"horario\"> 0h00 - 12h30 | 1h30 - 17h00</span></p><br>\r\n<p>Tel: 213 462 157 | 213 476 129</p><br>\r\n<a href=\"mailto:cinemateca@cinemateca.pt\" class=\"link\">cinemateca@cinemateca.pt</a>\r\n</div>\r\n', 'img/wizardofoz.jpg', 9999),
(4, 'COLECÇÕES E ARQUIVOS', ' <div class=\"col-lg-6 col-md-6 col-sm-12 col-xs-12\">\r\nA colecção de imagens em movimento a cargo da Cinemateca é muito diversificada e inclui os mais diversos tipos de suportes. Analógicos e digitais. A totalidade de títulos identificados actualmente em arquivo ascende aproximadamente a 33.000, correspondendo a mais de 70.000 elementos materiais inventariados. Perto de 50.000 correspondem a materiais fílmicos, nos diferentes formatos (35mm, 16mm, 9,5mm, 8mm e super 8mm). Os restantes materiais são vídeo, analógico ou digital.\r\n\r\nDestes títulos, mais de 21.000 são de produção portuguesa. Uma pequena parte pertencendo ao universo das longas-metragens, com 988 títulos; e a maioria pertencendo ao universo das curtas-metragens (ficção, documentais, actualidades, filmes de família, etc).\r\n</div>\r\n\r\n<div class=\"col-lg-6 col-md-6 col-sm-12 col-xs-12\">\r\nAs entradas destes títulos e respectivos materiais na colecção são resultado de diversos tipos de processo de aquisição. Entram através do regime de depósito voluntário, onde a política de prospecção activa tem sido muito importante, poderão entrar através de compra por parte da Cinemateca, também por oferta ou integração patrimonial e através de tiragem, no âmbito dos diversos programas de preservação do arquivo.<br> A colecção de Equipamentos da Cinemateca começou a ser constituída desde a sua fundação, em 1948. Um entendimento alargado da história do cinema português e do valor da cultura cinematográfica impulsionou a faceta coleccionista do primeiro director, M. Félix Ribeiro, permitindo a recolha de um grande número de câmaras, projectores e diversos objectos ligados à realização de filmes portugueses.\r\n</div>\r\n\r\n', '', 9999),
(5, 'HISTÓRIA', '', '', 1),
(6, 'MISSÃO E ACTIVIDADES', 'A Cinemateca Portuguesa-Museu do Cinema tem por missão recolher, proteger, preservar e divulgar o património relacionado com as imagens em movimento, promovendo o conhecimento da história do cinema e o desenvolvimento da cultura cinematográfica e audiovisual. São atribuições da Cinemateca, I. P.:\r\n<br><br>\r\n\r\na) Coleccionar, preservar, restaurar e catalogar as obras cinematográficas e quaisquer outras imagens em movimento de produção portuguesa ou equiparada, independentemente da forma de aquisição, bem como a documentação e quaisquer outros materiais, seja qual for a sua natureza, a elas associados, no interesse da salvaguarda do património artístico e histórico português;<br>\r\nb) Coleccionar, preservar, restaurar e catalogar as obras cinematográficas e outras imagens em movimento de produção internacional, bem como a documentação e quaisquer outros materiais, seja qual for a sua natureza, a elas associados, seleccionadas segundo a sua importância como obras de arte, documentos históricos ou de interesse científico, técnico ou didáctico;<br>\r\nc) Promover a exibição regular de obras da sua colecção ou de outras com as mesmas características que lhe sejam temporariamente cedidas por terceiros;\r\nd) Promover a componente museográfica do património fílmico e audiovisual;<br>\r\ne) Estabelecer protocolos de colaboração e apoio e contratos de prestação de serviços com outras instituições públicas e privadas, nacionais e internacionais, no âmbito da museologia cinematográfica;\r\nf) Promover a sua filiação em entidades internacionais que se proponham a defesa dos arquivos e museus cinematográficos;<br>\r\ng) Promover a exposição e o acesso público à sua colecção para fins de divulgação, estudo e investigação, sem prejuízo dos objectivos de preservação do património, dos direitos dos depositantes e da legislação relativa aos direitos de autor e direitos conexos em vigor;<br>\r\nh) Promover a investigação, a formação, a edição e a publicação de obras relacionadas com a história, estética e técnica cinematográficas;<br>\r\ni) Incentivar a difusão e promoção não comercial do cinema e do audiovisual, nomeadamente através do apoio às actividades dos cineclubes e aos festivais de cinema e vídeo.\r\n\r\n', 'img/joaocesarmonteiro.jpg', 1),
(7, 'EXPOSIÇÕES', '', '', 1),
(8, 'ORGANIZAÇÃO E GESTÃO', 'A Cinemateca Portuguesa-Museu do Cinema é um organismo da administração indireta do Estado, dotado de autonomia administrativa e financeira e património próprio, que funciona sob a tutela do Ministério da Cultura. É atualmente dirigida por um Diretor (José Manuel Costa) e por um Subdiretor (Rui Machado). Os atuais Estatutos da Cinemateca Portuguesa-Museu do Cinema foram aprovados pela Portaria nº 374/2007 de 30 de março, que cria as unidades orgânicas nucleares (Departamentos) e intermédias (Divisão).', 'img/sala-felix-ribeiro.jpg', 1),
(9, 'FAMÍLIA', 'Aos Sábados propomos um programa aberto ao público, «O Sábado em Família», com uma sessão de cinema, às 15h00, e um Atelier Família no último Sábado de cada mês, às 11h30, em que se pretende envolver o público adulto, as famílias e os jovens.', 'img/bedknobs-and-broomsticks.jpg', 3),
(10, 'SÁBADOS[15H]', '', '', 3),
(11, 'ESCOLAS E GRUPOS', 'A Cinemateca Júnior é um serviço da Cinemateca Portuguesa – Museu do Cinema, dedicado ao público infantil e juvenil, e em particular às escolas. Aqui pode trazer os seus alunos, de qualquer nível de ensino, para uma viagem de descoberta em torno da arte cinematográfica, cuja história se iniciou há mais de um século mas que permanece eternamente jovem.', 'img/totoro.jpg', 3),
(12, 'A CINEMATECA JÚNIOR VAI A CASA', '', '', 3),
(13, 'BIBLIOTECA E ARQUIVO FOTOGRÁFICO', 'A colecção de Equipamentos da Cinemateca começou a ser constituída desde a sua fundação, em 1948. Um entendimento alargado da história do cinema português e do valor da cultura cinematográfica impulsionou a faceta coleccionista do primeiro director, M. Félix Ribeiro, permitindo a recolha de um grande número de câmaras, projectores e diversos objectos ligados à realização de filmes portugueses.', 'img/costa-do-castelo.jpg', 4),
(14, 'ARQUIVO FÍLMICO E VIDEOGRÁFICO', 'As colecções de imagens em movimento da Cinemateca podem ser visionadas no âmbito de projectos de investigação universitária ou equivalente, devidamente credenciados.<br> Os pedidos devem ser feitos com, pelo menos, 1 mês de antecedência - previamente à autorização do pedido, o ANIM procederá à pesquisa/verificação das obras disponíveis para consulta, assim como à preparação dos materiais.\r\n', 'img/anim.jpg', 4),
(15, 'CINEMATECA DIGITAL', '<div class=\"col-lg-6 col-md-6 col-sm-12 col-xs-12\" id=\"cinematecadigital\">\r\n<h2 id=\"cinematecadigital\">CINEMATECA DIGITAL</h2>\r\nA Cinemateca Digital nasceu em 2011 da participação portuguesa no projecto European Film Gateway – consórcio constituído por 16 cinematecas e arquivos fílmicos europeus enquanto fornecedores de conteúdos e 6 entidades fornecedoras de serviços tecnológicos –, que funciona como agregador sectorial para o portal Europeana.<br> Para a selecção das obras a fornecer no âmbito desse projecto, a Cinemateca adoptou como critério o tema da produção portuguesa de não-ficção do período 1896-1931, consubstanciado nas representações digitais dos seguintes materiais: a) 170 filmes;b) material gráfico (fotografias, cartazes, anúncios);c) textos (de época ou posteriores). a lista de títulos e o universo seleccionado têm vindo a alargar-se, estando actualmente disponíveis mais de 1200 filmes nesta plataforma.<br>\r\n</div>\r\n<div class=\"col-lg-6 col-md-6 col-sm-12 col-xs-12 margin-top-100\">\r\nO acesso à colecção digital pode fazer-se mediante pesquisa ou por navegação através dos filtros. Os conteúdos da Cinemateca Digital estão também disponíveis através dos portais Europeana (www.europeana.eu) e European Film Gateway (www.europeanfilmgateway.eu).O acesso à Cinemateca Digital tem apenas como fim a consulta e visionamento em linha dos filmes ali representados digitalmente. Para qualquer outro tipo de utilização das imagens, deverão consultar-se os serviços do arquivo da Cinemateca, através do seu Departamento ANIM.\r\n</div>\r\n', 'img/cinematecadigital1.jpg', 4),
(16, 'VALORES', 'Na prossecução dos seus objectivos, a Cinemateca Portuguesa-Museu do Cinema orienta as suas actividades e constrói a sua cultura organizacional com base nos seguintes valores:<br><br>\r\n\r\n- Respeito pelo património em acervo, pelos seus doadores e depositantes e pelos seus utilizadores;<br>\r\n- Primado do serviço público, considerando os direitos dos cidadãos à fruição cultural e ao acesso à informação;<br>\r\n- Excelência técnica em todos os procedimentos relativos à salvaguarda e comunicação do património cinematográfico, museográfico e biblio-iconográfico.', '', 1),
(17, 'TEMPORÁRIA<br>CENTENÁRIO DO CINEMA DE ANIMAÇÃO PORTUGUÊS:100 ANOS, 100 FILMES<br><h3 class=\"subtitle\">15.03.2023 - 09.06.2023</h3>', 'Exposição de trabalhos de gravura e serigrafia dos alunos do 12º ano do Curso de Produção Artística, Especialização em Gravura e Serigrafia da Escola Artística António Arroio, resultante duma formação em contexto de trabalho que decorreu em janeiro na Cinemateca.<br>A partir de um miniciclo de quatro filmes alusivo ao tema O Cinema e os Discursos de Poder (CINEMA - ALGUNS CORTES: CENSURA II de Manuel Mozos; AS VINHAS DA IRA de John Ford; PERSÉPOLIS de Marjane Satrapi e GRAU DE DESTRUIÇÃO de François Truffaut), organizado pela Cinemateca Júnior em sessões-conversa, os alunos desenvolveram as suas leituras visuais.<br>Cinema e discursos de poder destilados em gravura, um novo mapa a desbravar.', 'img/exposicaotemporaria.jpg', 7),
(18, 'PERMANENTE', '<div class=\"col-lg-6 col-md-6 col-sm-12 col-xs-12 nopadding\">\r\n<p>Um percurso cronológico que começa nos espectáculos de sombras e na sua relação com o cinema, passando pelas lanternas mágicas e por todos os inventos que, nos séculos XVIII e XIX (e até aos começos do século XX), foram animando imagens, permitindo criar ficções a partir da ilusão do movimento. É uma exposição didáctica, lúdica e interactiva, composta por várias réplicas dos objectos mais significativos que contribuíram para a descoberta do cinema, dando ao público a possibilidade de interagir, conhecendo o seu funcionamento e a sua importância histórica. Para mais informações, consulte a secção Cinemateca Júnior.</p><br><br><h4>Horário da Exposição Permanente de Pré-Cinema</h4><br><p>2ª a 6ª feira  <span class=\"horario\">10h00 - 17h00</span></p><br><p>Sábados  <span class=\"horario\">11h-18h00</span></p><br><p>Nota: as visitas à exposição são condicionadas nos períodos em que estejam a decorrer sessões de cinema ou oficinas. Por esse motivo, recomenda-se confirmação telefónica prévia.</p><br><p>Para mais informações, consulte a secção <a href=\"cinematecajunior.php\" target=\"_self\" class=\"link\">Cinemateca Júnior</a>.</p>\r\n</div>', 'img/ernemann.jpg', 1),
(20, 'ACTIVIDADES', '- Oficinas didáticas para os mais novos;<br>\r\n\r\n- Visitas guiadas à nossa exposição permanente dedicada aos inventos, brinquedos óticos e espetáculos que antecederam a invenção do Cinematógrafo e à origem do cinema;<br>\r\n\r\n- Visionamento de películas dos arquivos da Cinemateca, desde os primórdios do cinema até à atualidade.<br>\r\n\r\n- Todas estas actividades estão sujeitas a marcação prévia.<br>', NULL, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `menus`
--

CREATE TABLE `menus` (
  `id` int(25) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `ordem` int(10) NOT NULL,
  `url` varchar(255) NOT NULL,
  `target` varchar(50) NOT NULL,
  `img` varchar(255) NOT NULL,
  `fk_menus` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `menus`
--

INSERT INTO `menus` (`id`, `titulo`, `ordem`, `url`, `target`, `img`, `fk_menus`) VALUES
(1, '', 1, 'index.php', '_self', 'img/logo.svg', 9999),
(2, 'A Cinemateca', 1, 'acinemateca.php', '_self', '', 9999),
(3, 'Programação', 2, 'programacao.php', '_self', '', 9999),
(4, 'Cinemateca Júnior', 3, 'cinematecajunior.php', '_self', '', 9999),
(5, 'Colecções e Arquivos', 4, 'coleccoesearquivos.php', '_self', '', 9999),
(6, 'Moradas e Contactos', 5, '#footer', '_self', '', 9999),
(7, '', 6, 'index.php', '_self', 'img/search.svg', 0),
(8, '<h4 class=\"active-underline\">INFORMAÇÃO GERAL</h4>', 7, '#infogeral', '_self', '', 2),
(9, 'HISTÓRIA', 8, '#historia', '_self', '', 2),
(10, 'MISSÃO E ACTIVIDADES', 9, '#missaoactividades', '_self', '', 2),
(11, 'EXPOSIÇÕES', 10, '#exposicoes', '_self', '', 2),
(12, 'ORGANIZAÇÃO E GESTÃO', 11, '#organizacaogestao', '_self', '', 2),
(13, '<h4 class=\"active-underline\">PROGRAMAÇÃO</h4>', 12, '#programacao', '_self', '', 3),
(14, 'CICLOS', 13, '#ciclos', '_self', '', 3),
(15, '<h4 class=\"active-underline\">INFORMAÇÃO GERAL</h4>', 1, '#infogeral', '_self', '', 4),
(16, 'A CINEMATECA JÚNIOR VAI A CASA', 4, '#acinematecavaiacasa', '_self', '', 4),
(17, 'FAMÍLIAS', 2, '#familias', '_self', '', 4),
(18, 'ESCOLAS E GRUPOS', 3, '#escolasgrupos', '_self', '', 4),
(19, '<h4 class=\"active-underline\">COLECÇÕES E ARQUIVOS</h4>', 18, '#coleccoesarquivos', '_self', '', 5),
(20, 'BIBLIOTECA E ARQUIVO FOTOGRÁFICO', 19, '#arquivo', '_self', '', 5),
(21, 'ARQUIVO FÍLMICO E VIDEOGRÁFICO', 20, '#arquivofilmico', '_self', '', 5),
(22, 'CINEMATECA DIGITAL', 21, '#cinematecadigital', '_self', '', 5),
(23, '<h4 class=\"active-underline\">FILMES</h4>', 1, '#filmes', '_self', '', 0),
(24, 'SESSÕES', 2, '#sessoes', '_self', '', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `moradas_contactos`
--

CREATE TABLE `moradas_contactos` (
  `id` int(25) NOT NULL,
  `morada` text NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mapa` text NOT NULL,
  `titulo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `moradas_contactos`
--

INSERT INTO `moradas_contactos` (`id`, `morada`, `telefone`, `email`, `mapa`, `titulo`) VALUES
(1, 'Rua Barata Salgueiro 39, 1269-059 Lisboa', '213 596 200', 'cinemateca@cinemateca.pt', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3112.858560935567!2d-9.150982988099747!3d38.72105616629536!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd193379ae86c37f%3A0x60e5cf4e502a31c5!2sCinemateca%20Portuguesa%20-%20Museu%20do%20Cinema!5e0!3m2!1spt-PT!2spt!4v1686043987236!5m2!1spt-PT!2spt\" width=\"250\" height=\"150\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade', 'Cinemateca'),
(2, 'Palácio Foz, Praça dos Restauradores, 1269-059 Lisboa', '213 596 200', 'cinemateca@cinemateca.pt', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3113.0739648113963!2d9.144536723018215!3d38.71611079774972!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd19331eccbecb4f%3A0x32f5226e6c5ea384!2sCinemateca%20J%C3%BAnior%20(Cinemateca%20Portuguesa%E2%80%93Museu%20do%20Cinema)!5e0!3m2!1spt-PT!2spt!4v1686044349416!5m2!1spt-PT!2spt\" width=\"250\" height=\"150\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade', 'Cinemateca Júnior'),
(3, 'Quinta da Cerca, Rua da República 11, Chamboeira, 2670-674 BUCELAS', '213 596 200', 'cinemateca@cinemateca.pt', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3104.685825318934!2d9.163328172745773!3d38.90829925052228!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd192b10bb6ce2e3%3A0x4c72a88a1ab536fc!2sANIM%20-%20Arquivo%20Nacional%20das%20Imagens%20em%20Movimento!5e0!3m2!1spt-PT!2spt!4v1686044419292!5m2!1spt-PT!2spt\" width=\"250\" height=\"150\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade', 'Centro de Conservação (ANIM)');

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE `noticias` (
  `id` int(25) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `short_content` text NOT NULL,
  `data` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `target` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `short_content`, `data`, `img`, `content`, `url`, `target`) VALUES
(1, 'CINEMATECA E FILMIN DISPONIBILIZAM A PROMESSA EM STREAMING', 'Meio século depois da apresentação em Cannes, A PROMESSA, vai estar disponível em exclusivo na Filmin, através de uma colaboração entre a Cinemateca e aquela plataforma de streaming.<br> Produzido pelo Centro Português de Cinema e realizado por António de Macedo, a partir da obra teatral homónima de Bernardo Santareno, A PROMESSA foi o primeiro filme português oficialmente selecionado para o Festival de Cannes.', '13.07', 'img/apromessa.jpg', '<div class=\"col-lg-6 col-md-6 col-sm-12 col-xs-12 nopadding\">\r\nMeio século depois da apresentação em Cannes, A PROMESSA, vai estar disponível em exclusivo na Filmin, através de uma colaboração entre a Cinemateca e aquela plataforma de streaming.\r\n \r\nProduzido pelo Centro Português de Cinema e realizado por António de Macedo, a partir da obra teatral homónima de Bernardo Santareno, A PROMESSA foi o primeiro filme português oficialmente selecionado para o Festival de Cannes.\r\n \r\nConsiderada uma das obras mais icónicas do realizador, figura de culto no panorama do cinema português e um dos fundadores do Cinema Novo português, relata a história de um casal de jovens recém-casados que vive numa aldeia de pescadores cuja intimidade é assolada por um voto de castidade e a presença de um estranho que acolhem em casa. O filme é um repositório de questões sexuais, que constituem o eixo do mesmo, e foi alvo de enorme polémica à época de estreia em Portugal, tendo sido a primeira obra portuguesa a mostrar dois corpos nus.\r\n \r\nA chegada de A PROMESSA à Filmin terá lugar hoje, dia 23 de maio, e representa a primeira colaboração da Cinemateca com a plataforma de streaming.\r\n</div>\r\n\r\n<div class=\"col-lg-6 col-md-6 col-sm-12 col-xs-12\">\r\nAté 2025, a Cinemateca Portuguesa irá digitalizar mais de 1000 filmes portugueses de longa e curta-metragem, no âmbito do Plano de Digitalização do Cinema Português que já está em curso. Este projeto tem como missão levar o património cinematográfico às gerações atuais e futuras, através do regresso desses mesmos filmes às salas de cinema, e irá, certamente, transformar a nossa compreensão coletiva do Cinema Português, seja por restabelecer o acesso a filmes caídos no esquecimento, por recuperar obras conhecidas através da disponibilização de cópias digitais de qualidade, ou por fomentar novas sinergias de programação.\r\n \r\nO filme de António de Macedo vai estar disponível na Filmin durante as próximas semanas, coincidindo em parte com as datas da presente edição do Festival de Cannes, onde por estes dias é apresentada a nova versão digital de VALE ABRAÃO, de Manoel de Oliveira, um restauro realizado pela Cinemateca Portuguesa.\r\n</div>', 'noticia_pagina.php', '_self');

-- --------------------------------------------------------

--
-- Estrutura da tabela `politicadeprivacidade`
--

CREATE TABLE `politicadeprivacidade` (
  `id` int(25) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `conteudo` text NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `politicadeprivacidade`
--

INSERT INTO `politicadeprivacidade` (`id`, `titulo`, `conteudo`, `img`) VALUES
(4, 'POLÍTICA DE PRIVACIDADE ', '', 'img/politicadeprivacidade.png'),
(5, '<br><br>Acessibilidade', 'Este sítio Web cumpre as Directivas para a acessibilidade do conteúdo da Web - 1.0, WAI, do W3C, em conformidade com a Resolução do Conselho de Ministros Nº 155/2007, de 2 de Outubro.', ''),
(6, 'Copyright', 'O conteúdo deste sítio Web é propriedade da Cinemateca Portuguesa-Museu do Cinema e dos autores, sempre que indicados. A sua utilização é livre exclusivamente para fins de uso pessoal, educacionais e de divulgação das actividades da Cinemateca Portuguesa-Museu do Cinema. Todas as utilizações deverão ser acompanhadas da referência à fonte de informação. Não é permitida a cópia e utilização de conteúdos para outros fins, sem autorização expressa da Cinemateca Portuguesa-Museu do Cinema.', ''),
(7, 'Privacidade', 'A Cinemateca Portuguesa-Museu do Cinema garante a privacidade de todos os elementos de informação recolhidos através deste sítio Web. \r\nOs dados destinam-se exclusivamente para os fins solicitados ou aderidos pelos utilizadores e não serão transmitidos, sob qualquer forma ou condição, a terceiros.\r\nA Cinemateca Portuguesa-Museu do Cinema poderá proceder à recolha de informações sobre a utilização deste sítio, unicamente para fins estatísticos e de gestão.', ''),
(8, 'Encarregado de Protecção de Dados EPD', 'José Bernardo Vilhena Júlio Marques Vidal', ''),
(9, 'Contactos', '(+351) 21 392 79 20', ''),
(10, 'Endereço de Email', 'pro.dados@sg.pcm.gov.pt', ''),
(11, 'Limite de Responsabilidade', 'Este sítio foi concebido para fornecer um serviço contínuo. Quaisquer eventuais quebras deste serviço ou de serviços e conteúdos de outros sítios para os quais este sítio forneça ligações não são, no entanto, da responsabilidade da Cinemateca Portuguesa-Museu do Cinema. A Cinemateca Portuguesa-Museu do Cinema reserva-se o direito de efectuar, a qualquer momento, as alterações que entender necessárias aos conteúdos e funcionalidades deste sítio Web. Qualquer alteração destes termos e condições será difundida neste sítio.\r\n\r\n', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `programacao_dia`
--

CREATE TABLE `programacao_dia` (
  `id` int(25) NOT NULL,
  `hora` varchar(255) NOT NULL,
  `fk_filme` varchar(255) NOT NULL,
  `fk_sala` varchar(255) NOT NULL,
  `fk_ciclo` varchar(255) NOT NULL,
  `fk_diasemana` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `programacao_dia`
--

INSERT INTO `programacao_dia` (`id`, `hora`, `fk_filme`, `fk_sala`, `fk_ciclo`, `fk_diasemana`) VALUES
(1, '15h30', '2', '3', '1', '1'),
(2, '19h00', '9', '2', '2', '1'),
(3, '19h30', '18', '4', '4', '1'),
(4, '21h45', '25', '3', '3', '1'),
(5, '15h30', '2', '1', '1', '2'),
(6, '19h00', '8', '2', '2', '2'),
(7, '19h30', '16', '4', '4', '2'),
(8, '21h45', '23', '3', '4', '2'),
(9, '15h30', '24', '3', '3', '3'),
(10, '19h00', '22', '4', '4', '3'),
(11, '19h30', '17', '4', '4', '3'),
(12, '21h45', '15', '2', '2', '3'),
(13, '15h30', '14', '2', '2', '4'),
(14, '19h00', '18', '4', '4', '4'),
(15, '19h30', '21', '4', '4', '4'),
(16, '21h45', '12', '2', '2', '4'),
(17, '15h30', '13', '2', '2', '5'),
(18, '19h00', '27', '3', '3', '5'),
(19, '19h30', '28', '3', '3', '5'),
(20, '21h45', '13', '2', '4', '5'),
(21, '15h30', '20', '3', '4', '6'),
(22, '19h00', '11', '2', '2', '6'),
(23, '19h30', '21', '1', '4', '6'),
(24, '21h45', '19', '1', '4', '6');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sabados_emfamilia`
--

CREATE TABLE `sabados_emfamilia` (
  `id` int(25) NOT NULL,
  `dia_mes` varchar(255) NOT NULL,
  `fk_filme` int(10) NOT NULL,
  `fk_sala` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `sabados_emfamilia`
--

INSERT INTO `sabados_emfamilia` (`id`, `dia_mes`, `fk_filme`, `fk_sala`) VALUES
(1, '01.07', 29, 3),
(2, '08.07', 30, 3),
(3, '15.07', 31, 3),
(4, '22.07', 32, 3),
(5, '29.07', 34, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `salas`
--

CREATE TABLE `salas` (
  `id` int(25) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `ordem` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `salas`
--

INSERT INTO `salas` (`id`, `nome`, `ordem`) VALUES
(1, 'SALA M. FÉLIX RIBEIRO', 1),
(2, 'SALA LUÍS DE PINA', 2),
(3, 'SALÃO FOZ', 3),
(4, 'ESPLANADA', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `slides`
--

CREATE TABLE `slides` (
  `id` int(25) NOT NULL,
  `img` varchar(255) NOT NULL,
  `fkgrupo_slides` int(10) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `slides`
--

INSERT INTO `slides` (`id`, `img`, `fkgrupo_slides`, `nome`, `info`) VALUES
(1, 'img/cinematografo.jpeg', 1, 'bbbb', 'bbbbb'),
(2, 'img/lanterna-magica-biunial.jpg', 1, '', ''),
(3, 'img/expopermanente3.jpg', 1, '', ''),
(4, 'img/zootropio.jpg', 1, '', ''),
(5, 'img/praxinoscopio.jpg', 1, '', ''),
(6, 'img/lanterna-magica-cine.jpg', 1, '', ''),
(7, 'img/panfleto_1.jpg', 2, '', ''),
(8, 'img/panfleto_2.jpg', 2, '', ''),
(9, 'img/panfleto_3.jpg', 2, '', ''),
(10, 'img/panfleto_4.jpg', 2, '', ''),
(11, 'img/anim-32.jpg', 3, '', ''),
(12, 'img/arquivo.jpg', 3, '', ''),
(13, 'img/anim-20.jpg', 3, '', ''),
(14, 'img/anim-65.jpg', 3, '', ''),
(15, 'img/cinematecajunior1.jpg', 4, '', ''),
(16, 'img/cinematecajunior2.jpg', 4, '', ''),
(17, 'img/cinematecajunior3.jpg', 4, '', ''),
(18, 'img/cinematecajunior4.jpg', 4, '', ''),
(19, 'img/cinematecajunior5.jpg', 4, '', ''),
(20, 'img/cinematecajunior7.jpg', 4, '', ''),
(21, 'img/animacao.jpg', 5, 'ANIMAÇÃO', 'a partir dos 8 anos'),
(22, 'img/comedia.png', 5, 'COMÉDIA', 'a partir dos 8 anos'),
(23, 'img/imaginarios.png', 5, 'IMAGINÁRIOS', 'a partir dos 6 anos'),
(24, 'img/paisagens.png', 5, 'PAISAGENS', 'a partir dos 6 anos'),
(25, 'img/proezas.png', 5, 'PROEZAS', 'a partir dos 6 anos'),
(26, 'img/oficina_garfopente.png', 6, 'GARFO-PENTE E OUTRAS HISTÓRIAS', ''),
(27, 'img/oficina_chaplin.png', 6, 'UM CHARLOT PARA BRINCAR', ''),
(28, 'img/oficina_silhuetas.png', 6, 'TEATRO DE SILHUETAS', ''),
(29, 'img/oficina_flipbook.png', 6, 'FLIPBOOKS PARA VER, FAZER E ANIMAR', ''),
(30, 'img/oficina_stopmotion.png', 6, 'ANIMAÇÃO COM RECORTES', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `404_page`
--
ALTER TABLE `404_page`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `acordeoes`
--
ALTER TABLE `acordeoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `amigosdacinemateca`
--
ALTER TABLE `amigosdacinemateca`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `banners_paginas`
--
ALTER TABLE `banners_paginas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `banner_principal`
--
ALTER TABLE `banner_principal`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `ciclos`
--
ALTER TABLE `ciclos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `dia_semana`
--
ALTER TABLE `dia_semana`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `filmes`
--
ALTER TABLE `filmes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `footer_row`
--
ALTER TABLE `footer_row`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `grupos_acordeoes`
--
ALTER TABLE `grupos_acordeoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `grupos_slides`
--
ALTER TABLE `grupos_slides`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `historia`
--
ALTER TABLE `historia`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `info_geral`
--
ALTER TABLE `info_geral`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `moradas_contactos`
--
ALTER TABLE `moradas_contactos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `politicadeprivacidade`
--
ALTER TABLE `politicadeprivacidade`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `programacao_dia`
--
ALTER TABLE `programacao_dia`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sabados_emfamilia`
--
ALTER TABLE `sabados_emfamilia`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `salas`
--
ALTER TABLE `salas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `404_page`
--
ALTER TABLE `404_page`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `acordeoes`
--
ALTER TABLE `acordeoes`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `amigosdacinemateca`
--
ALTER TABLE `amigosdacinemateca`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `banners_paginas`
--
ALTER TABLE `banners_paginas`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `banner_principal`
--
ALTER TABLE `banner_principal`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `ciclos`
--
ALTER TABLE `ciclos`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `dia_semana`
--
ALTER TABLE `dia_semana`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `filmes`
--
ALTER TABLE `filmes`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `footer_row`
--
ALTER TABLE `footer_row`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `grupos_acordeoes`
--
ALTER TABLE `grupos_acordeoes`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `grupos_slides`
--
ALTER TABLE `grupos_slides`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `historia`
--
ALTER TABLE `historia`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `info_geral`
--
ALTER TABLE `info_geral`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `moradas_contactos`
--
ALTER TABLE `moradas_contactos`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `politicadeprivacidade`
--
ALTER TABLE `politicadeprivacidade`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `programacao_dia`
--
ALTER TABLE `programacao_dia`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `sabados_emfamilia`
--
ALTER TABLE `sabados_emfamilia`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `salas`
--
ALTER TABLE `salas`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
