<div class="col-12">
  <div class="row">
    <div class="col-6">
      <h2>Cadastro de Produtos</h2>
    </div>
    <div class="col-6">
      <h2>Produtos Cadastrados</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-6">
      <form name="insuser" action="main.php?folder=products/&file=ins.php" method="post">
        <div class="form-group">
          <label>Categoria:</label>
          <select class="form-control" name="categoria">
            <option value="">Selecione...</option>
            <?php
            // include "../../security/database/connection.php";
            $sql = "SELECT id, nome FROM categorias";
            $stm_sql = $db_connection->prepare($sql);
            $stm_sql -> execute();

            $categories = $stm_sql->fetchAll(PDO::FETCH_ASSOC);

            foreach ($categories as $category){
              ?>
              <option value="<?php echo $category['id'];?>"><?php echo $category['nome'];?></option>
              <?php
            }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label>Modelo:</label>
          <input type="text" class="form-control" name="modelo" value="">
        </div>
        <div class="form-group">
          <label>Valor:</label>
          <input type="number" class="form-control" name="valor" value="">
        </div>
        <div class="form-group">
          <label>Descrição:</label>
          <textarea class="form-control" name="descricao"></textarea>
        </div>
        <button type="reset" class="btn btn-danger">Limpar</button>
        <button type="submit" class="btn btn-success">Enviar</button>
      </form>
      <br>
      <a href="main.php">Menu</a>
    </div>
    <?php
    $sql = "SELECT p.*, c.nome AS nomecategoria FROM produtos p INNER JOIN categorias c ON categorias_id=id";

    $stm_sql = $db_connection->prepare($sql);
    $stm_sql -> execute();

    $products = $stm_sql->fetchAll(PDO::FETCH_ASSOC);

    //var_dump($users);
    ?>
    <div class="col-6">
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Código</th>
              <th>Categoria</th>
              <th>Modelo</th>
              <th>Valor</th>
              <th>Descrição</th>
              <th>Alterar</th>
              <th>Excluir</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach($products as $product){//para cada linha, crie uma variavel product
              ?>


              <tr>
                <td><?php echo $product['codigo']; ?></td>
                <td><?php echo $product['categorias_id'];?> - <?php echo $product['nomecategoria'];?></td>
                <td><?php echo $product['modelo'];?></td>
                <td><?php echo $product['valor'];?></td>
                <td><?php echo $product['descricao'];?></td>
                <td><a href="main.php?folder=products/&file=frmupd.php&codigo=<?php echo $product['codigo']; ?>" onclick="return valAlt('produto','<?php echo $product['modelo']; ?>')"><img class="icon-library" src="../assets/images/editar.png"></img></a></td>
                <td><a href="main.php?folder=products/&file=del.php&codigo=<?php echo $product['codigo']; ?>" onclick="return valDel('produto','<?php echo $product['modelo'];?>')"><img class="icon-library" src="../assets/images/excluir.png"></img></a></td>
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
