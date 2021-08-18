<?php


class Canditados
{
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function createdCandidate($req)
    {
        try {
            $res = $this->pdo->prepare("INSERT into candidato (nome, numero_candidato, cpf) values (:nome, :numero, :cpf)");
            $res->bindValue(":nome", $req['nome']);
            $res->bindValue(":cpf", $req['cpf']);
            $res->bindValue(":numero", $req['numero']);

            $res->execute();

            echo "Cadastrado com Sucesso!!";
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function allCandidate()
    {
        $res = $this->pdo->query("SELECT * from candidato");
        $dados = $res->fetchAll(PDO::FETCH_ASSOC);
        return $dados;
    }
    public function findCandidate($req) 
    {
        $res = $this->pdo->prepare("SELECT * from candidato WHERE id = :id ");
        $res->bindValue(":id", $req);
        $res->execute();
        $dados = $res->fetch();
        return $dados;
    }
    public function alterarCandidato($req)
    {
       
        $res = $this->pdo->prepare("UPDATE candidato SET nome = :nome, cpf = :cpf, numero_candidato = :numero_candidato where id = :id");
        $res->bindValue(":nome", $req['nome']);
        $res->bindValue(":cpf", $req['cpf']);
        $res->bindValue(":numero_candidato", $req['numero']);
        $res->bindValue(":id", intval($req['id_editar']));
        
        $res->execute();

        echo "Editado com Sucesso!!";
    }
    public function excluirCandidatos($req) 
    {
        $res = $this->pdo->prepare("DELETE from candidato WHERE id = :id ");
        $res->bindValue(":id", $req);
        $res->execute();
        $dados = $res->fetch();
       echo "Deletado com sucesso!";
    }

}
