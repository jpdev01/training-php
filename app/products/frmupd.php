<?php
$codigo = $_GET['codigo'];

$sql = "SELECT * FROM produtos WHERE codigo=:codigo";
$stm_sql = $db_connection->prepare($sql);
$stm_sql->bindParam(':codigo', $codigo);//quero trocar o que tem no parâmetro id pelo que tem na variável $id
$stm_sql-> execute();

$product = $stm_sql->fetch(PDO::FETCH_ASSOC);
?>
<div class="col-12">
  <div class="row">
    <div class="col-6">
      <h2>Alteração de produto: <?php echo $product['modelo']; ?></h2>
    </div>
  </div>
  <div class="row">
    <div class="col-6">
      <form name="updcategory" action="main.php?folder=products/&file=upd.php" method="post">
        <input type="hidden" name="codigo" value="<?php echo $codigo;?>">
        <br>
        <div class="form-group">
          <label>Categoria:</label>
          <select name="categoria" class="form-control">
            <?php
            $sql = "SELECT * FROM categorias";
            $stm_sql = $db_connection->prepare($sql);
            $stm_sql -> execute();

            $categories = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
            foreach ($categories as $category){
              $selecionado="";
              if ($category['id'] == $product['categorias_id']){
                $selecionado ="selected";
              }
              ?>
              <option value="<?php echo $category['id'];?>" <?php echo $selecionado;?>> <?php echo $category['nome'];?> </option>
              <?php
            }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label>Modelo:</label>
          <input type="text" name="modelo" value="<?php echo $product['modelo'];?>" class="form-control">
        </div>
        <div class="form-group">
          <label>Valor:</label>
          <input type="text" name="valor" value="<?php echo $product['valor'];?>" class="form-control">
        </div>
        <div class="form-group">
          <label>Descrição:</label>
          <textarea name="descricao" class="form-control"><?php echo $product['descricao'];?></textarea>
        </div>
        <button type="reset" class="btn btn-danger">Limpar</button>
        <button type="submit"  class="btn btn-success">Salvar</button>
      </form>
    </div>
  </div>
</div>
