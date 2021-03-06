<?php


class Eleitor
{
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function cadastrarEleitor($req)
    {
        if (empty($req['nome']) || empty($req['cpf'])) {
            return "Preencha todos os campos";
        }
        try {
            $res = $this->pdo->prepare("SELECT * from eleitor WHERE cpf = :cpf ");
            $res->bindValue(":cpf", $req['cpf']);
            $res->execute();
            $dados = $res->fetch();

            if ($dados) {
                echo( "Usuário já cadastro");
                exit;
            }

            $res = $this->pdo->prepare("INSERT into eleitor (nome, cpf) values (:nome, :cpf)");
            $res->bindValue(":nome", $req['nome']);
            $res->bindValue(":cpf", $req['cpf']);

            if($res->execute()) {
                echo ("Cadastrado com Sucesso!!");
                exit;
            }
            echo ("Cadastro não efetuado");
            exit;

        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function pesquisarEleitores()
    {
        $res = $this->pdo->query("SELECT * from eleitor ORDER BY cpf DESC");
        $dados = $res->fetchAll(PDO::FETCH_ASSOC);
        return $dados;
    }
    public function pesquisarEleitor($req) 
    {
        $res = $this->pdo->prepare("SELECT * from eleitor WHERE id = :id ");
        $res->bindValue(":id", $req);
        $res->execute();
        $dados = $res->fetch();
        return $dados;
    }
    public function alterarEleitor($req)
    {
       
        $res = $this->pdo->prepare("UPDATE eleitor SET nome = :nome, cpf = :cpf where id = :id");
        $res->bindValue(":nome", $req['editar_nome']);
        $res->bindValue(":cpf", $req['cpf']);
        $res->bindValue(":id", intval($req['id_editar']));
        
        $res->execute();

        echo "Editado com Sucesso!!";
    }
    public function excluirEleitor($req) 
    {
        $res = $this->pdo->prepare("DELETE from eleitor WHERE id = :id ");
        $res->bindValue(":id", $req);
        $res->execute();
        $dados = $res->fetch();
       echo "Deletado com sucesso!";
    }
    
}
