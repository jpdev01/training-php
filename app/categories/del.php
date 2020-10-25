<?php

$id = $_GET['id'];
$status="danger";

$sql = "DELETE FROM categorias WHERE id=:id";

$stm_sql = $db_connection->prepare($sql);

$stm_sql-> bindParam(':id', $id);

$result = $stm_sql->execute();
if($result){
  $msg = "Categoria excluída com sucesso!";
  $status="success";
}else{
  $msg = "Falha ao excluir a categoria!";
  $status="danger";
}
$link = "main.php?folder=categories/&file=frmins.php";
header("Location: ".$link."&mensagem=".$msg."&status=".$status);
?>
