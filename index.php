<?php
require_once("./config/conexao.php");
require "./src/controllers/candidatosController.php";
require "./src/controllers/votarController.php";

$res = new Candidatos($pdo);
$res1 = new Votacao($pdo);

$allCandidatos = $res->allCandidate();
$dados = json_encode($allCandidatos);

if (isset($_POST['vote'])) {
    foreach ($allCandidatos as $value) {
        if ($_POST['vote'] == $value['numero_candidato']) {
            $res1->realizarVotacao($_POST['vote']);
            exit();
        }
    }
    $res1->realizarVotacao(0);
    exit;
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <title>Urna Eletrônica</title>
</head>

<body>
    <div class="titulo">
        <h1>Urna Eletrônica</h1>
    </div>
    <div class="urna">
        <div class="tela">
            <div class="d-1">
                <div class="d-1-left">
                    <div class="d-1-1">
                        <span>SEU VOTO PARA</span>
                    </div>
                    <div class="d-1-2">
                        <span>CANDIDATO</span>
                    </div>
                    <div class="d-1-3">
                        <div class="numero pisca"></div>
                        <div class="numero"></div>
                    </div>
                    <div class="d-1-4">
                        Nome: FULANO<br />
                        CPF: NOVO<br />

                    </div>
                </div>
                <div class="d-1-right">
                    <div class="d-1-image">
                        <img src="assets/img/ImagesFakes/hagar.PNG" alt="" />

                    </div>
                    <div class="d-1-image small">
                        <img src="assets/img/ImagesFakes/guy.PNG" alt="" />

                    </div>
                </div>
            </div>
            <div class="d-2">
                Aperte a tela: <br />
                CONFIRMA para CONFIRMAR este voto<br />
                CORRIGE para CORRIGIR este voto
            </div>
        </div>
        <div class="esquerda">
            <div class="topo-esquerda">
                <div class="logo"> <img src="assets/img/cipa-semfundo.png" alt="" /> </div>
                <div class="Justica-eleitoral">SISTEMAS DE<br />INFORMAÇÃO</div>
            </div>
            <div class="teclado">
                <div class="teclado--linha">
                    <div class="teclado--botao" onclick="clicou('1')">1</div>
                    <div class="teclado--botao" onclick="clicou('2')">2</div>
                    <div class="teclado--botao" onclick="clicou('3')">3</div>
                </div>
                <div class="teclado--linha">
                    <div class="teclado--botao" onclick="clicou('4')">4</div>
                    <div class="teclado--botao" onclick="clicou('5')">5</div>
                    <div class="teclado--botao" onclick="clicou('6')">6</div>
                </div>
                <div class="teclado--linha">
                    <div class="teclado--botao" onclick="clicou('7')">7</div>
                    <div class="teclado--botao" onclick="clicou('8')">8</div>
                    <div class="teclado--botao" onclick="clicou('9')">9</div>
                </div>
                <div class="teclado--linha">
                    <div class="teclado--botao" onclick="clicou('0')">0</div>
                </div>
                <div class="teclado--linha">
                    <div class="teclado--botao botao--branco" onclick="branco()">BRANCO</div>
                    <div class="teclado--botao botao--corrige" onclick="corrige()">CORRIGE</div>
                    <div class="teclado--botao botao--confirma" id="computarVoto" onclick="confirma()">CONFIRMA</div>
                </div>
            </div>
        </div>

    </div>

    <h2><a href="index.php" target="_self"><strong>Recarregar</strong></a></h2>
    <h2><a href="src/pages/candidato.php" target="_self"><strong>ADMIN</strong></a></h2>

    <link rel="stylesheet" href="assets/css/style.css" />
    <!-- <script src="assets/js/etapas.js"></script> -->


</body>

</html>
<script>
    $(document).ready(function() {
        $('#computarVoto').click(function(event) {
            event.preventDefault();
            $.ajax({
                type: 'post',
                url: 'index.php',
                data: {
                    vote: numero
                },
                dataType: "json",
                complete: function(response) {
                    console.log(response.data);

                }
            });

            return false;

        });
    })
</script>

<script>
    etapas = [{
        titulo: 'CANDIDATO',
        numeros: 5,
        candidatos: <?= $dados ?>
    }];
</script>
<script src="assets/js/script.js"></script>