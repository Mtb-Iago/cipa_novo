<?php
@define("TITLE", "");
@define("PAGE_HOME", "../../index.php");
@define("PAGE_ELEITOR", "eleitor.php");
@define("PAGE_CANDIDATO", "candidato.php");
@define("PAGE_VOTACAO", "vote.php");
@define("PAGE_APURACAO", "apurar.php");
@define("CSS", "assets/css/header.css");
@define("FAVICON", "assets/img/favicon.ico");
@define("JS", "assets/js/header.js");
@define("MASCARA", "assets/js/mascara.js");

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?=FAVICON?>" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="" crossorigin="anonymous"></script> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <script src="<?=MASCARA?>"></script>
    <link rel="stylesheet" href="<?=CSS?>">
    <script src="<?=JS?>"></script>
    <title> <?=TITLE?> </title>
</head>
<body>
<section class="navigation">
  <div class="nav-container">
    <div class="brand">
      <a href="#!">CIPA</a>
    </div>
    <nav>
      <div class="nav-mobile"><a id="navbar-toggle" href="#!"><span></span></a></div>
      <ul class="nav-list">
        <li>
          <a href="<?=PAGE_HOME?>">Inicio</a>
        </li>
        <li>
          <a href="<?=PAGE_VOTACAO?>">Votar</a>
        </li>
        <li>
          <a href="<?=PAGE_APURACAO?>">Apuração</a>
        </li>
        <li>
          <a href="<?=PAGE_CANDIDATO?>">Candidato</a>
        </li>
        <li>
          <a href="<?=PAGE_ELEITOR?>">Eleitor</a>
        </li>
      </ul>
    </nav>
  </div>
</section>