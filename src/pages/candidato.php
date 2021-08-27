<?php
define("TITLE", "Projeto CIPA | Eleitor");
@define("CSS", "../../assets/css/header.css");
@define("JS", "../../assets/js/header.js");
@define("MASCARA", "../../assets/js/mascara.js");
@define("FAVICON", "../../assets/img/favicon.ico");
require_once("../../config/conexao.php");
require "../controllers/candidatosController.php";
?>
<?php



$res = new Candidatos($pdo);
$allCandidatos = $res->allCandidate();
$dados = $allCandidatos;

?>

<head>
    <link rel="stylesheet" href="../../assets/css/index.css">
</head>



<style>
    main {
        display: flex !important;
        /* flex-direction: row !important; */
    }
</style>

<body>
    <?php include '../components/header/header.php' ?>

    <main>
        <form method="POST" id="formCreate">
            <h1>CADASTRO DE CANDIDATOS</h1>
            <div id="img">
                <img src="../../assets/img/cipalogo.jpg" alt="" width="250px">
            </div>
            <input type="hidden" name="create" value="true">
            <input class="textInput" type="text" name="nome" placeholder="Nome" required>
            <input class="textInput" type="text" name="cpf" id="cpf" placeholder="CPF" required>
            <input class="textInput" type="text" name="numero" maxlength="5" required placeholder="DIGITE SEU NÚMERO">

            <button type="submit" class="btn btn-success btn-lg" id="cadastrar">CADASTRAR</button>

            <div id="message"></div>
        </form>

        <div id="listarCandidato">
            <h1 class="text-center">LISTA DE CANDIDATOS</h1>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">NOME</th>
                        <th scope="col">CPF</th>
                        <th scope="col">NÚMERO</th>
                        <th scope="col">AÇÃO</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dados as $value) { ?>
                        <tr>
                            <td class="d-none"><?= $value['id'] ?></td>
                            <td><?= $value['nome'] ?></td>
                            <td><?= $value['cpf'] ?></td>
                            <td><?= $value['numero_candidato'] ?></td>

                            <td><a href="candidato.php?delete=<?= $value['id'] ?>"><i class="fas fa-trash-alt"></i></a></td>
                            <td><a href="candidato.php?edit=<?= $value['id'] ?>"><i class="fas fa-edit"></i></a></td>
                        </tr>
                    <?php } ?>

                    <?php ?>

                </tbody>
            </table>
        </div>

        <?php if (@$_GET['delete'] || @$_GET['edit']) {
            if (@$_GET['edit']) {
                $data = $res->findCandidate(intval($_GET['edit']));
                $title = "Editar Candidato";
                $nome = @$data['nome'];
                $cpf = @$data['cpf'];
                $numero_candidato = @$data['numero_candidato'];
                $id = @$data['id'];

                $button = 'Editar';
                $styleButton = "primary";
                $actionButton = "buttonEdit";
                $form = 'formEditar';
            } else {
                $title = "Excluir Candidato";
                $button = "Excluir";
                $styleButton = "danger";
                $actionButton = "buttonDelete";
                $form = 'formExcluir';
            } ?>
            <div id="editCandidato">
                <!-- Button trigger modal -->
                <button type="button" class="d-none" data-toggle="modal" id="abrirModal" data-target="#exampleModalCenter">
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle"><?= $title ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- SE FOR EDITAR ABRE MODAL DE EDIT -->
                                <?php if (@$_GET['edit']) { ?>
                                    <form id="<?= $form ?>" method="POST">
                                        <h1>Editar</h1>

                                        <input type="hidden" name="id_editar" value="<?= $id ?>">
                                        <input class="textInput" type="text" id="nome" name="nome" value="<?= $nome ?>" required>
                                        <input class="textInput" type="text" id="cpfEdit" name="cpf" value="<?= $cpf ?>" required>
                                        <input class="textInput" type="text" id="numero" name="numero" value="<?= $numero_candidato ?>" required >

                                        <div id="message1"></div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" id="fecharModal" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                <button id="<?= $actionButton ?>" type="submit" class="btn btn-<?= $styleButton ?>"><?= $button ?></button>
                                </form>
                            </div>
                        <?php } else if ($_GET['delete']) { 
                            $nomeCandidato = $res->findCandidate($_GET['delete']);?>
                        <span>Deseja remover o candidato: <strong><?=$nomeCandidato['nome']?>?</strong></span>
                            <form id="<?= $form ?>" method="POST">
                                <input type="hidden" name="id_excluir" value="<?= $_GET['delete'] ?>">
                                <div id="message1"></div>
                                <div class="modal-footer">
                                    <button type="button" id="fecharModal" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    <button id="<?= $actionButton ?>" type="submit" class="btn btn-<?= $styleButton ?>"><?= $button ?></button>
                            </form>
                        </div>
                    <?php
                                } ?>

                    </div>
                </div>
            </div>
            </div>
        <?php } ?>


    </main>

</body>

</html>


<script>
    const button = document.getElementById("abrirModal");
    <?php if (@$_GET['delete'] || @$_GET['edit']) { ?>
        button.click();
    <?php } ?>


    // FUNÇÃO PARA CADASTRAR CANDIDATO
    $(document).ready(function() {
        $('#cadastrar').click(function(event) {
            event.preventDefault();
            $.ajax({
                url: "candidato.php",
                method: "post",
                data: $('#formCreate').serialize(),
                dataType: "text",
                success: function(message) {
                    <?php
                    if (@$_POST['create']) {
                        $createdCandidate = $res->createdCandidate($_POST);
                    }
                    ?>
                    $('#message').addClass("text-success text-center")
                    $('#message').css("display", "block")
                    $('#message').text('Cadastrado com sucesso!')
                    setTimeout(() => {
                        window.location = "candidato.php";

                    }, 2000);
                },
            })

        });

        // FUNÇÃO PARA EDITAR CANDIDATO

        $('#buttonEdit').click(function(event) {
            event.preventDefault();
            $.ajax({
                url: "candidato.php",
                method: "post",
                data: $('#formEditar').serialize(),
                dataType: "text",
                success: function(message) {
                    <?php
                    if (@$_POST['id_editar']) {
                        $editCandidate = $res->alterarCandidato($_POST);
                        echo $editCandidate;
                    }
                    ?>
                    $('#message1').addClass("text-success text-center")
                    $('#message1').css("display", "block")
                    $('#message1').text('Editado com sucesso!')
                    setTimeout(() => {
                        $('#fecharModal').click()
                        window.location = "candidato.php";
                    }, 2000);
                },
            })

        });

        // FUNÇÃO PARA EXCLUIR CANDIDATO

        $('#buttonDelete').click(function(event) {
            event.preventDefault();
            $.ajax({
                url: "candidato.php",
                method: "post",
                data: $('#formExcluir').serialize(),
                dataType: "text",
                success: function(message) {
                    <?php
                    if (@$_POST['id_excluir']) {
                        $deleteCandidato = $res->excluirCandidatos($_POST['id_excluir']);
                        echo $deleteCandidato; ?>
                    <?php }
                    ?>
                    $('#message1').addClass("text-success text-center")
                    $('#message1').css("display", "block")
                    $('#message1').text('Excluído com sucesso!')
                    setTimeout(() => {
                        $('#fecharModal').click()
                        window.location = "candidato.php";
                    }, 2000);
                },
            })

        });
    })
</script>