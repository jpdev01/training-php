<div class="col-12">
  <div class="row">
    <div class="col-6">
      <h2>Cadastro de Usuários</h2>
    </div>
    <div class="col-6">
      <h2>Usuários Cadastrados</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-6">
      <form name="insuser" action="main.php?folder=users/&file=ins.php" method="post">
        <div class="form-group">
          <label>E-mail:</label>
          <input type="email" name="email" class="form-control">
        </div>
        <div class="form-group">
          <label>Usuário:</label>
          <input type="text" name="usuario" class="form-control">
        </div>
        <div class="form-group">
          <label>Senha:</label>
          <input type="password" name="senha" class="form-control">
        </div>
        <button type="reset" class="btn btn-danger">Limpar</button>
        <button type="submit" class="btn btn-success">Enviar</button>
      </form>
      <br>
      <a href="main.php">Menu</a>
    </div>
    <?php

    $sql = "SELECT * FROM usuarios";

    $stm_sql = $db_connection->prepare($sql);
    $stm_sql -> execute();

    $users = $stm_sql->fetchAll(PDO::FETCH_ASSOC);

    //var_dump($users);
    ?>
    <div class="col-6">
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Usuário</th>
              <th>Senha</th>
              <th>E-mail</th>
              <th>Permissão</th>
              <th>Ativo</th>
              <th>Alterar</th>
              <th>Excluir</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach($users as $user){//para cada linha, crie uma variavel user
              if ($user['permissao']==0){
                $permissao = "Adm";
              }
              else if ($user['permissao']==1){
                $permissao = "Comum";
              }
              else{
                $permissao = "Erro";
              }
              if ($user['ativo']==0){
                $ativo = "Sim";
              }
              else if ($user['ativo']==1){
                $ativo = "Não";
              }
              else{
                $ativo = "Erro";
              }
              ?>

              <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['usuario'];?></td>
                <td><?php echo $user['senha'];?></td>
                <td><?php echo $user['email'];?></td>
                <td><?php echo $permissao;?></td>
                <td><?php echo $ativo;?></td>
                <td><a href="main.php?folder=users/&file=frmupd.php&id=<?php echo $user['id']; ?>" onclick="return valAlt('usuário','<?php echo $user['usuario']; ?>')"><img class="icon-library" src="../assets/images/editar.png"></img></a></td>
                <td><a href="main.php?folder=users/&file=del.php&id=<?php echo $user['id']; ?>" onclick="return valDel('usuário','<?php echo $user['usuario']; ?>')"><img class="icon-library" src="../assets/images/excluir.png"></img></a></td>
              </tr>

              <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
