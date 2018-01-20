<?php 
require_once "../init.php"; 

  // abre a conexão
$PDO = db_connect();
// SQL para selecionar os registros
$sql = 'SELECT * FROM estado';

// seleciona os registros
$stmt = $PDO->prepare($sql);
$stmt->execute();
$result = $stmt-> fetchAll(PDO::FETCH_ASSOC);

?>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
  <form method="post" action="../Controller/cidadeadd.php">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
          <h4 class="modal-title">Cadastro de Estado</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="Nome">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite o Nome...">
          </div>
          <div class="form-group">
            <label for="cliente">Estado</label>
            <select class="form-control m-bot15" id="Estado_id" name="Estado_id">
              <?php if (count($result)) {              
               foreach( $result as $row ){ ?>
               <option value="<?php echo $row['id'];?>"><?php echo $row['estado'];?></option>
               <?php 
             }
           }
           ?>
         </select>
       </div>

       <div class="form-group">
        <button class="btn btn-primary" type="submit">Salvar</button>
      </div>
    </form>
  </div>
</div>
</div>
</div>


