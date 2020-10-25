<?php
$status="warning";
$codigo           = $_POST['codigo'];
$modelo           = $_POST['modelo'];
$valor            = $_POST['valor'];
$descricao   = ($_POST['descricao']!="")?$_POST['descricao']:null;//alterei
$categorias_id    = $_POST['categoria'];

$msg = "";

if($modelo==""){
  $msg = "Preencha o campo Modelo.";
}
else if($valor==""){
  $msg = "Preencha o campo Valor.";
}
else if($categorias_id==""){
  $msg = "Defina uma categoria.";
}


else{
  $sql = "SELECT * FROM produtos WHERE modelo=:modelo AND categorias_id=:categorias_id";
  $stm_sql = $db_connection -> prepare($sql);
  $stm_sql->bindParam(':modelo', $modelo);
  $stm_sql->bindParam(':categorias_id', $categorias_id);
  $stm_sql->execute();

  if($stm_sql->rowCount()==0){
    $sql = "UPDATE produtos SET modelo=:modelo, valor=:valor, descricao=:descricao, categorias_id=:categorias_id WHERE codigo=:codigo";
    $stm_sql = $db_connection->prepare($sql);
    $stm_sql->bindParam(':codigo', $codigo);
    $stm_sql->bindParam(':modelo', $modelo);
    $stm_sql->bindParam(':valor', $valor);
    $stm_sql->bindParam(':descricao', $descricao);
    $stm_sql->bindParam(':categorias_id', $categorias_id);
    $result = $stm_sql->execute();

    if($result){
      $msg = "Atualização efetuada com sucesso!";
      $status= 'success';
    }else{
      $msg = "Falha ao Atualizar!";
      $status= 'success';
    }

  }

  else{
    $msg = "Produto já cadastrado.";
    $status = "warning";
  }

}
$link = "main.php?folder=products/&file=frmins.php";
header("Location: ".$link."&mensagem=".$msg."&status=".$status);
?>
