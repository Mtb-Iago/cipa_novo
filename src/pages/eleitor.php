<?php
define("TITLE", "Projeto CIPA | Eleitor");
@define("CSS", "../../assets/css/header.css");
@define("JS", "../../assets/js/header.js");
?>
<head>
    <link rel="stylesheet" href="../../assets/css/index.css">
</head>

<body>
<?php include '../components/header/header.php' ?>
    <main>
        <form method="POST" action="crud/eleitor/inserir.php">
            <h1>CADASTRO CIPA ELEITOR</h1>
            <div id="img">
                <img src="../../assets/img/cipalogo.jpg" alt="" width="250px">
            </div>
            <input class="textInput" type="text" name="nome" placeholder="Nome">
            <input class="textInput" type="text" name="cpf" placeholder="CPF">
            <input class="textInput" type="text" name="email" placeholder="EMAIL">
            
            <button type="submit" class="btn btn-success btn-lg">CADASTRAR</button>
        </form>
    </main>

</body>

</html>