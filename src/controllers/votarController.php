<?php


class Votacao
{
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function realizarVotacao($req)
    {
        try {
            $res = $this->pdo->prepare("INSERT into votacao (id_canditado, quantidade_votos) values (:id_canditado, :quantidade_votos)");
            $res->bindValue(":id_canditado", $req);
            $res->bindValue(":quantidade_votos", 1);

            $res->execute();

            return "Votação concluida";
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function computarVotacao($req) 
    {
        $res = $this->pdo->prepare("SELECT * from votacao WHERE id = :id ");
        $res->bindValue(":id", $req);
        $res->execute();
        $dados = $res->fetch();
        return $dados;
    }
    public function alterarVotacao($req)
    {
       
        $res = $this->pdo->prepare("UPDATE eleitor SET nome = :nome, cpf = :cpf where id = :id");
        $res->bindValue(":nome", $req['editar_nome']);
        $res->bindValue(":cpf", $req['cpf']);
        $res->bindValue(":id", intval($req['id_editar']));
        
        $res->execute();

        echo "Editado com Sucesso!!";
    }
    public function excluirVotacao($req) 
    {
        $res = $this->pdo->prepare("DELETE from eleitor WHERE id = :id ");
        $res->bindValue(":id", $req);
        $res->execute();
        $dados = $res->fetch();
       echo "Deletado com sucesso!";
    }

}
