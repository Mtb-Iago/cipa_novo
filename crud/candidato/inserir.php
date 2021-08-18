<?php 

require_once("../../config/conexao.php");
@session_start();


$nome = $_POST['nome'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$check = $_POST['check'];

if($nome == ''){
	echo "Preencha o Nome!";
	exit();
}
	//verificar duplicaidade de dados
	$res = $pdo->query("SELECT * from candidato where cpf = '$cpf'");
	$dados = $res->fetchAll(PDO::FETCH_ASSOC);
	$linhas = count($dados);
	if($linhas > 0){
		echo 'Registro já Cadastrado';
		exit();
	}


	$res = $pdo->prepare("INSERT into candidato (nome, email, cpf) values (:nome, :email, :cpf)");

	
	$res->bindValue(":nome", $nome);
	$res->bindValue(":cpf", $cpf);
	$res->bindValue(":email", $email);
		
	$res->execute();

	echo "Cadastrado com Sucesso!!";



?>