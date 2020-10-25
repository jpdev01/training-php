<?php
$status = "danger";
$id       = $_POST['id'];
$nome    = $_POST['nome'];
$descricao   = ($_POST['descricao']!="")?$_POST['descricao']:null;

$msg = "";

if($nome==""){
  $msg = "Preencha o campo Nome.";
}



else{

  $sql = "SELECT * FROM categorias WHERE nome=:nome AND id<>:id";
  $stm_sql = $db_connection -> prepare($sql);
  $stm_sql->bindParam(':id', $id);
  $stm_sql->bindParam(':nome', $nome);
  $stm_sql->execute();

  if($stm_sql->rowCount()==0){
    $sql = "UPDATE categorias SET nome=:nome, descricao=:descricao WHERE id=:id";
    $stm_sql = $db_connection->prepare($sql);
    $stm_sql->bindParam(':id', $id);
    $stm_sql->bindParam(':nome', $nome);
    $stm_sql->bindParam(':descricao', $descricao);
    $result = $stm_sql->execute();

    if($result){
      $msg = "Atualização efetuada com sucesso!";
      $status="success";
    }else{
      $msg = "Falha ao Atualizar!";
    }

  }

  else{
    $msg = "Essa categoria já está cadastrado no banco de dados.";
    $status = "warning";
  }

}
$link = "main.php?folder=categories/&file=frmins.php";
header("Location: ".$link."&mensagem=".$msg."&status=".$status);
?>
