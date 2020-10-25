<?php
$status="danger";
$nome     = $_POST['nome'];
$descricao   = ($_POST['descricao']!="")?$_POST['descricao']:null;
if($nome==""){
  $msg = "Preencha o campo nome.";
}
else{

  $sql = "SELECT nome FROM categorias WHERE nome=:nome";

  $stm_sql = $db_connection-> prepare($sql);
  $stm_sql -> bindParam(':nome', $nome);
  $stm_sql -> execute();

  if ($stm_sql->rowCount()==0){

    // - inicio cadastro (inserir) do usuario -- //
    $sql = "INSERT INTO categorias (id, nome, descricao) VALUES (:id, :nome, :descricao)";//DBO= PARAMETROS (SGBD:LOCAL HOST QUE ESTA ARMAZENANDO ESSE SGBD; NOME DO BANCO DE DADOS DENTRO DO HOST Q VAMOS EXECUTAR, CONJUNTO DE CARACTERES PARA EXECUTAR ESSA CONEXAO) , "PROXIMOS PARAMETROS" ==> 1-USUARIO

    $stm_sql = $db_connection-> prepare ($sql);

    $id = null;

    $stm_sql-> bindParam(':id', $id);
    $stm_sql-> bindParam(':nome', $nome);
    $stm_sql-> bindParam(':descricao', $descricao);

    $result = $stm_sql->execute();

    if($result){
      $msg = "Cadastro efetuado com sucesso!";
      $status = "success";
    }else{
      $msg = "Falha ao cadastrar!";
    }
    // -- fim cadastro (inserir) do usuario -- //
  }
  else{
    $msg= "Essa categoria já está cadastrada no banco de dados.";
    $status = "warning";
  }
}
$link = "main.php?folder=categories/&file=frmins.php";
header("Location: ".$link."&mensagem=".$msg."&status=".$status);
?>
