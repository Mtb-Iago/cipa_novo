<?php
require_once("../../config/conexao.php");
define("TITLE", "Projeto CIPA | APURAÇÃO");
@define("CSS", "../../assets/css/header.css");
@define("JS", "../../assets/js/header.js");
@define("MASCARA", "../../assets/js/mascara.js");
@define("FAVICON", "../../assets/img/favicon.ico");
require "../controllers/votarController.php";


$res = new Votacao($pdo);
$allCandidatos = $res->computarVotacao();
$dados = $allCandidatos;

?>
<?php include '../components/header/header.php' ?>
<h3 class="text-center m-5">APURAÇÃO DE VOTOS</h3>
<table id="table" class="table table-hover text-center">
    <thead class="thead-dark">
        <tr>
            <th scope="col">COLOCAÇÃO</th>
            <th scope="col">Nome</th>
            <th scope="col">CPF</th>
            <th scope="col">NÚMERO DO CANDIDATO</th>
            <th scope="col">QUANTIDADE DE VOTOS</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($dados as $key => $value) { ?>
            <tr>
                <th scope="row"><strong><?= $key + 1 ?>º</strong></th>
                <td><?= $value['nome'] ?></td>
                <td><?= $value['cpf'] ?></td>
                <td><?= $value['id_candidato'] ?></td>
                <td id="total"><?= $value['qtd_total'] ?></td>
            </tr>
        <?php }
        if (!$dados) { ?>
            <td>Ainda não temos votos computados</td>

        <?php } ?>

    </tbody>
</table>
<?php include '../components/footer/footer.php' ?>
</body>

</html>

<style>
    #table {
        width: 90% !important;
        margin: auto;
    }

    body>.table>tbody>tr {

        font-weight: bolder;
    }

    #total {
        background: cadetblue;
    }
</style>