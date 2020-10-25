<?php
$pagina ="main";
include "../security/authentication/validation.php";
include "../security/database/connection.php";
// session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Project One</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
  <link rel="stylesheet" href="../assets/css/main.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="../assets/js/bootstrap.js"></script>
  <script src="../assets/js/main.js"></script>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="main.php">Project One</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="main.php?folder=users/&file=frmins.php">Usuários <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="main.php?folder=categories/&file=frmins.php">Categorias</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="main.php?folder=products/&file=frmins.php">Produtos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../security/authentication/logout.php" tabindex="-1" aria-disabled="true">Sair</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="container-fluid">
    <?php
    $msg = (isset($_GET['mensagem']))?$_GET['mensagem']:"";
    $status = (isset($_GET['status']))?$_GET['status']:"";
    if (($msg!="") && ($status!="")){ ?>
      <div class="alert alert-<?php echo $status; ?> mt-2" role="alert">
        <?php echo $msg; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php } ?>
    <div class="row">
      <?php
      if (isset($_GET['folder']) && isset($_GET['file'])){ // se tiver include
        // if(!include $_GET['folder'].$_GET['file']){  //se o include de uma pagina der errado
        //   echo "Deu errado o include";
        // }
        if(@!include $_GET['folder'].$_GET['file']){  //se o include de uma pagina der errado..........o "@" suprime o erro
          include '404.php';
        }
      }else{
        echo "Bem vindo ". $_SESSION['usuario'];
        echo " ----> " .  $_SESSION['idsessao'];
      }
      ?>
    </div>
  </div>
</body>
</html>
