<?php

$id = $_GET['id'];
$status="danger";
$sql = "DELETE FROM usuarios WHERE id=:id";

$stm_sql = $db_connection->prepare($sql);

$stm_sql-> bindParam(':id', $id);

$result = $stm_sql->execute();
if($result){
  $msg = "Exclusão efetuada com sucesso!";
  $status="success";
}else{
  $msg = "Falha ao Excluir!";
  $status="danger";
}
$link = "main.php?folder=users/&file=frmins.php";
header("Location: ".$link."&mensagem=".$msg."&status=".$status);
?>
