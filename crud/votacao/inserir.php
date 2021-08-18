<?php 

require_once("../../config/conexao.php");
@session_start();


$nome = $_POST['nome'];
$data_inicio = strval($_POST['data_inicio']);
$data_final  = strval($_POST['data_fim']);
$numero_votacao  = $_POST['numero_votacao'];

if($nome == ''){
	echo "Preencha o Nome!";
	exit();
}

	$res = $pdo->prepare("INSERT into votacao (nome, data_inicio, data_final, numero_votacao) values (:nome, :data_inicio, :data_final, :numero_votacao)");

	
	$res->bindValue(":nome", $nome);
	$res->bindValue(":data_inicio", $data_inicio);
	$res->bindValue(":data_final", $data_final);
	$res->bindValue(":numero_votacao", $numero_votacao);
		
	$res->execute();

	echo "Cadastrado com Sucesso!!";



?>