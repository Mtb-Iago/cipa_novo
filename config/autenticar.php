<?php
@session_start();
require './conexao.php';

if (isset($_POST['cpf'])) {
    $res = $pdo->prepare("SELECT * from eleitor WHERE cpf = :id ");
    $res->bindValue(":id", $_POST['cpf']);
    $res->execute();
    $dados = @$res->fetch();
    if ($dados) {
        if (count($dados) > 0) {
            var_dump($dados);
            exit;
        }
    } else {
        echo "Usuário não identificado, favor entrar em contato com setor responsável.";
    }
}
