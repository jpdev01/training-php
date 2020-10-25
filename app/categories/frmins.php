<div class="col-12">
  <div class="row">
    <div class="col-6">
      <h2>Cadastro de Categorias</h2>
    </div>
    <div class="col-6">
      <h2>Categorias Cadastradas</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-6">
      <form name="inscategories" action="main.php?folder=categories/&file=ins.php" method="post">
        <div class="form-group">
          <label for="idnome">Nome:</label>
          <input type="text" class="form-control" id="idnome" name="nome">
        </div>
        <div class="form-group">
          <label for="iddsc">Descrição:</label>
          <input type="text" class="form-control" id="iddsc" name="descricao" maxlength="100">
        </div>
        <button type="reset" class="btn btn-danger">Limpar</button>
        <button type="submit" class="btn btn-success">Enviar</button>
      </form>
      <br>
      <a href="main.php">Menu</a>
    </div>
    <?php
    $sql = "SELECT * FROM categorias";
    $stm_sql = $db_connection->prepare($sql);
    $stm_sql -> execute();

    $categorias = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <div class="col-6">
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Descrição</th>
              <th>Alterar</th>
              <th>Excluir</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach($categorias as $categoria){
              $descricao = ($categoria['descricao']==NULL)?"----":$categoria['descricao'];
              ?>
              <tr>
                <td scope="row"><?php echo $categoria['id']; ?></td>
                <td><?php echo $categoria['nome']; ?></td>
                <td width="100px"><?php echo $descricao;?></td>
                <td><a href="main.php?folder=categories/&file=frmupd.php&id=<?php echo $categoria['id']; ?>" onclick="return valAlt('categoria','<?php echo $categoria['nome']; ?>')"><img class="icon-library" src="../assets/images/editar.png"></img></a></td>
                <td><a href="main.php?folder=categories/&file=del.php&id=<?php echo $categoria['id']; ?>" onclick="return valDel('categoria','<?php echo $categoria['nome'];?>')"><img class="icon-library" src="../assets/images/excluir.png"></img></a></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
