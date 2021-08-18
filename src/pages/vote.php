<?php
require_once("../../config/conexao.php");
require "../controllers/candidatosController.php";


// $dados = file_get_contents('https://jsonplaceholder.typicode.com/users/1/todos');
define("TITLE", "Projeto CIPA | VOTAÇÃO");
@define("CSS", "../../assets/css/header.css");
@define("JS", "../../assets/js/header.js");



$candidato = new Canditados($pdo);
$allCandidatos = $candidato->allCandidate();

$dados = $allCandidatos;
?>

<head>
    <link rel="stylesheet" href="../../assets/css/vote.css">
</head>

<body>
    <?php include '../components/header/header.php' ?>

    <main>
        <div class="one">
            <h1>VOTAÇÃO</h1>
            <div class="tela">
                <div id="cardOne">
                    <img src="../../assets/img/user.png" alt="" width="200px">
                    <small id="nome">ESCOLHA SEU CANDIDATO</small>
                </div>
                <form action="#" method="post">
                    <div class="number">
                        <input type="text" name="number" class="form-control" placeholder="Digite o número do candidato" id="myInput">
                    </div>
                    <div id="buttonsDiv">
                        <button class="btn btn-light" type="button" id="branco" onclick="votarEmBranco()">BRANCO</button>
                        <button class="btn btn-warning" name="corrigir" id="corrigir" type="button" onclick="corrigir()">CORRIGIR</button>
                        <button class="btn btn-success" type="submit" id="confirmar">CONFIRMAR</button>
                    </div>
                </form>


            </div>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Ver lista de candidatos
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Lista de Candidatos</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center active">
                                    Nome
                                    <span class="badge badge-primary badge-pill">Número</span>
                                </li>
                                <?php
                                $data = $dados;
                                foreach ($data as $key => $value) { ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <?= $value['nome'] ?>
                                        <span class="badge badge-primary badge-pill"><?= $value['numero_candidato'] ?></span>
                                    </li>
                                <?php } ?>

                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>

<script>
    // function sendData() {
    //     // Declare variables
    //     array = [];
    //     
    //     var input, filter, ul, li, a, i, txtValue;
    //     input = document.getElementById('myInput');
    //     filter = input.value.toUpperCase();


    //     document.getElementById("nome").innerHTML = filter

    //     for (var i = 0; i < array.length; i++) {
    //         if (array[i].numero_candidato === parseInt(filter)) {

    //             document.getElementById("nome").innerHTML = array[i].nome
    //             console.log('Aachou' + array[i].numero_candidato)
    //         }
    //     }

    // }
    
        function corrigir() {
            alert('asdsaid')
            // document.getElementById('nome').innerHTML = 'ESCOLHA SEU CANDIDATO'
            // document.getElementById('myInput').value = ''
            // document.getElementById('myInput').disabled = 'false'
        }
    
        function votarEmBranco() {
    
            input = document.getElementById('myInput').disabled = true
            input = document.getElementById('myInput').value = 0
            document.getElementById('nome').innerHTML = 'DESEJA VOTAR EM BRANCO? CONFIRMA.'
    
        }

</script>