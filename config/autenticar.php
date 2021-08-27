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
            $_SESSION['eleitor'] = $dados['cpf'];
            header('Location: ../index.php');
            exit;
        }
    } else if (!$dados) {

        $res = $pdo->prepare("SELECT * from candidato WHERE cpf = :id ");
        $res->bindValue(":id", $_POST['cpf']);
        $res->execute();
        $dados1 = @$res->fetch();
        if ($dados1) {
            if (count($dados1) > 0) {
                $_SESSION['candidato'] = $dados1['cpf'];
                header('Location: ../index.php');
                exit;
            }
        } else if (!$dados1) {
            $res = $pdo->prepare("SELECT * from administrador WHERE cpf = :id ");
            $res->bindValue(":id", $_POST['cpf']);
            $res->execute();
            $dados = @$res->fetch();
            if ($dados) {
                if (count($dados) > 0) {
                    $_SESSION['admin'] = $dados['cpf'];
                    header('Location: ../src/pages/eleitor.php');
                    exit;
                }
            }
            echo ("<script>alert('Usuário não encontrado')</script>");
        } else {
            echo ("<script>alert('Usuário não encontrado')</script>");
            header('Location: ../login.php');
        }
    }
}
