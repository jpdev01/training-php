<?php

$codigo = $_GET['codigo'];
$status="danger";

$sql = "DELETE FROM produtos WHERE codigo=:codigo";

$stm_sql = $db_connection->prepare($sql);

$stm_sql-> bindParam(':codigo', $codigo);

$result = $stm_sql->execute();
if($result){
  $msg = "Exclusão efetuada com sucesso!";
  $status="success";
}else{
  $msg = "Falha ao Excluir!";
  $status="danger";
}
$link = "main.php?folder=products/&file=frmins.php";
header("Location: ".$link."&mensagem=".$msg."&status=".$status);
?>
