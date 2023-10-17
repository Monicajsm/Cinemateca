<?php  
	require_once 'admin/functions/dbconfig.php';
	
	if (isset($_GET['id']) && $_GET['id'] != '') {
		$id = $_GET['id'];
		$pesquisa = $mysqli->query("SELECT * FROM `livraria_restaurante` WHERE `id` = '$id'");
		if($pesquisa->num_rows>0){
			$print = $pesquisa->fetch_object();
		}else{
			header("Location: 404.php");
			exit();
		}
	}else{
		header("Location: 404.php");
		exit();
	}
?>