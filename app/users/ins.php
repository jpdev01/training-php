<?php
$status='warning';
$email     = $_POST['email'];
$usuario   = $_POST['usuario'];
$senha     = $_POST['senha'];
$senha_criptografada = md5($senha);
$msg = "";

if($email==""){
  $msg = "Preencha o campo e-mail.";
}elseif($usuario==""){
  $msg = "Preencha o campo usuário.";
}elseif($senha==""){
  $msg = "Preencha o campo senha.";
}else{

  $sql = "SELECT * FROM usuarios WHERE usuario=:usuario";

  $stm_sql = $db_connection-> prepare($sql);
  $stm_sql -> bindParam(':usuario', $usuario);
  $stm_sql -> execute();

  if ($stm_sql->rowCount()==0){

    // - inicio cadastro (inserir) do usuario -- //
    $sql = "INSERT INTO usuarios (id, usuario, senha, email, permissao, ativo) VALUES (:id, :usuario, :senha, :email, :permissao, :ativo)";//DBO= PARAMETROS (SGBD:LOCAL HOST QUE ESTA ARMAZENANDO ESSE SGBD; NOME DO BANCO DE DADOS DENTRO DO HOST Q VAMOS EXECUTAR, CONJUNTO DE CARACTERES PARA EXECUTAR ESSA CONEXAO) , "PROXIMOS PARAMETROS" ==> 1-USUARIO

    $stm_sql = $db_connection-> prepare ($sql);

    $id = null;
    $permissao = 0;
    $ativo = 0;

    $stm_sql-> bindParam(':id', $id);
    $stm_sql-> bindParam(':usuario', $usuario);
    $stm_sql-> bindParam(':senha', $senha_criptografada);
    $stm_sql-> bindParam(':email', $email);
    $stm_sql-> bindParam(':permissao', $permissao);
    $stm_sql-> bindParam(':ativo', $ativo);

    $result = $stm_sql->execute();

    if($result){
      $msg = "Cadastro efetuado com sucesso!";
      $status = 'success';
    }else{
      $msg = "Falha ao cadastrar!";
      $status = 'danger';
    }
    // -- fim cadastro (inserir) do usuario -- //
  }
  else{
    $msg= "Esse usuário já está cadastrado no banco de dados.";
    $status = 'warning';
  }
}
$link = "main.php?folder=users/&file=frmins.php";
header("Location: ".$link."&mensagem=".$msg."&status=".$status);
?>
