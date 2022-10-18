<?php
require_once("./conf.php");

$login = isset($_POST['login']) ? $_POST['login']: null; 
$erros = array();

if ($login) {
	
	require_once('./admin/sessao.class.php');
	
	$senha = isset($_POST['senha'])? $_POST['senha']: null;
	
	if (Sessao::autentica($login, $senha, $mensagemErro)) {
		
		header('Location: /organograma-atualizado/bem-vindo.php');
		exit;
	} else {
		$erros[] = $mensagemErro;
	}
}

require_once('login.html.php');
?>

