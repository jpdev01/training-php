<?php
$status='warning';
$id       = $_POST['id']; // ID do usuário que será atualizado
$email    = $_POST['email'];
$usuario  = $_POST['usuario'];
$senha    = $_POST['senha'];
$senha_criptografada = md5($senha);

$msg = "";

if($email==""){
  $msg = "Preencha o campo e-mail.";
}

else if($usuario==""){
  $msg = "Preencha o campo usuário.";
}

else if($senha==""){
  $msg = "Preencha o campo senha.";
}


else{
  include "../../security/database/connection.php";

  $sql = "SELECT * FROM usuarios WHERE usuario=:usuario AND id<>:id";
  $stm_sql = $db_connection->prepare($sql);
  $stm_sql->bindParam(':usuario', $usuario);
  $stm_sql->bindParam(':id', $id);
  $stm_sql->execute();

  if($stm_sql->rowCount()==0){
    $sql = "UPDATE usuarios SET email=:email, usuario=:usuario, senha=:senha WHERE id=:id";
    $stm_sql = $db_connection->prepare($sql);
    $stm_sql->bindParam(':email', $email);
    $stm_sql->bindParam(':usuario', $usuario);
    $stm_sql->bindParam(':senha', $senha_criptografada);
    $stm_sql->bindParam(':id', $id);
    $result = $stm_sql->execute();

    if($result){
      $msg = "Alteração efetuada com sucesso!";
      $status='success';
    }else{
      $msg = "Falha ao alterar!";
      $status='danger';
    }

  }

  else{
    $msg = "Esse usuário já está cadastrado no banco de dados.";
    $status='warning';
  }

}
$link = "main.php?folder=users/&file=frmins.php";
header("Location: ".$link."&mensagem=".$msg."&status=".$status);
?>
