<?php
$id = $_GET['id'];
$sql ="SELECT nome, descricao FROM categorias WHERE id=:id";
$stm_sql = $db_connection->prepare($sql);
$stm_sql->bindParam(':id', $id);//quero trocar o que tem no parâmetro id pelo que tem na variável $id
$stm_sql-> execute();

$categoria = $stm_sql->fetch(PDO::FETCH_ASSOC);
?>
<div class="col-12">
  <div class="row">
    <div class="col-6">
      <h2>Alteração de Categoria: <?php echo $categoria['nome']; ?></h2>
    </div>
  </div>
  <div class="row">
    <div class="col-6">
      <form name="updcatg" action="main.php?folder=categories/&file=upd.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id;?>" class="form-control">
        <br>
        <div class="form-group">
          <label>Nome:</label>
          <input type="text" name="nome" value="<?php echo $categoria['nome'];?>" class="form-control">
        </div>
        <div class="form-group">
          <label>Descrição:</label>
          <input type="text" name="descricao" value="<?php echo $categoria['descricao'];?>" class="form-control">
        </div>
        <button type="reset" class="btn btn-danger">Desfazer</button>
        <button type="submit" class="btn btn-success">Enviar</button>
      </form>
    </div>
  </div>
</div>
