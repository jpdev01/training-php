<?php
$status="warning";
$categorias_id     = $_POST['categoria'];
$modelo     = $_POST['modelo'];
$valor     = $_POST['valor'];
$descricao   = ($_POST['descricao']!="")?$_POST['descricao']:null;

if($modelo==""){
  $msg = "Preencha o campo modelo.";
}
else if($valor==""){
  $msg = "Preencha o campo valor.";
}
else if($categorias_id==""){
  $msg = "Defina a categoria.";
  // $status="warning";
}
else{

  $sql = "SELECT modelo FROM produtos WHERE modelo=:modelo AND categorias_id=:categorias_id";

  $stm_sql = $db_connection-> prepare($sql);
  $stm_sql -> bindParam(':modelo', $modelo);
  $stm_sql-> bindParam(':categorias_id', $categorias_id);
  $stm_sql -> execute();

  if ($stm_sql->rowCount()==0){

    // - inicio cadastro (inserir) do usuario -- //
    $sql = "INSERT INTO produtos (codigo, modelo, valor, descricao, categorias_id) VALUES (:codigo, :modelo, :valor, :descricao, :categorias_id)";//DBO= PARAMETROS (SGBD:LOCAL HOST QUE ESTA ARMAZENANDO ESSE SGBD; NOME DO BANCO DE DADOS DENTRO DO HOST Q VAMOS EXECUTAR, CONJUNTO DE CARACTERES PARA EXECUTAR ESSA CONEXAO) , "PROXIMOS PARAMETROS" ==> 1-USUARIO

    $stm_sql = $db_connection-> prepare ($sql);

    $codigo = null;
    $stm_sql-> bindParam(':codigo', $codigo);
    $stm_sql-> bindParam(':modelo', $modelo);
    $stm_sql-> bindParam(':valor', $valor);
    $stm_sql-> bindParam(':descricao', $descricao);
    $stm_sql-> bindParam(':categorias_id', $categorias_id);

    $result = $stm_sql->execute();

    if($result){
      $msg = "Cadastro efetuado com sucesso!";
      $status='success';
    }else{
      $msg = "Falha ao cadastrar!";
      $status='danger';
    }
    // -- fim cadastro (inserir) do usuario -- //
  }
  else{
    $msg= "Esse modelo já está cadastrado na categoria selecionada.";
    $status="warning";
  }
}
$link = "main.php?folder=products/&file=frmins.php";
header("Location: ".$link."&mensagem=".$msg."&status=".$status);
?>
