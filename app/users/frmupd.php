<?php
$id = $_GET['id'];
$sql ="SELECT email, usuario FROM usuarios WHERE id=:id";
$stm_sql = $db_connection->prepare($sql);
$stm_sql->bindParam(':id', $id);//quero trocar o que tem no parâmetro id pelo que tem na variável $id
$stm_sql-> execute();

$user = $stm_sql->fetch(PDO::FETCH_ASSOC);
?>
<div class="col-12">
  <div class="row">
    <div class="col-6">
      <h2>Alteração do usuário: <?php echo $user['usuario']; ?></h2>
    </div>
  </div>
  <div class="row">
    <div class="col-6">
      <form name="upduser" action="main.php?folder=users/&file=upd.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id;?>">
        <br>
        <div class="form-group">
          <label>E-mail:</label>
          <input type="email" name="email" value="<?php echo $user['email'];?>" class="form-control">
        </div>
        <div class="form-group">
          <label>Usuário:</label>
          <input type="text" name="usuario" value="<?php echo $user['usuario'];?>" class="form-control">
        </div>
        <div class="form-group">
          <label>Senha:</label>
          <input type="password" name="senha" class="form-control">
        </div>
        <button type="reset" class="btn btn-danger">Desfazer</button>
        <button type="submit" class="btn btn-success">Enviar</button>
      </form>
    </div>
  </div>
</div>
