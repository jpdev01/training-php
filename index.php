<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Project One</title>
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/main.css">
  <link rel="stylesheet" href="assets/css/myindex.css"> <!--meu index -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="assets/js/bootstrap.js">  </script>
</head>
<?php
$msg = (isset($_GET['mensagem']))?$_GET['mensagem']:"";
if($msg!=""){ ?>
  <div class="alert alert-danger mt-2" role="alert">
    <?php echo $msg; ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <?php
}
?>
<body>
  <div class="loginbox">
    <img src="assets/images/avatar.png" class="avatar">
    <h1>Project One João Borba :)</h1>
    <form name="auth" action="security/authentication/login.php" method="post">
      <p>Usuário:</p>
      <input type="text" name="usuario" id="idusuario" placeholder="Enter usuario">
      <p>Senha</p>
      <input type="password" name="senha" id="idsenha" placeholder="Enter senha">
      <input type="submit" name="" onclick="fnvalidacao_login()">
    </form>

  </div>
</body>
</html>
