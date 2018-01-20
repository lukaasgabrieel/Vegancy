<?php require_once "../init.php"; 

  // abre a conexão
$PDO = db_connect();

// SQL para selecionar os registros
$sql = 'SELECT * FROM produtos';

// seleciona os registros
$stmt = $PDO->prepare($sql);
$stmt->execute();
$result = $stmt-> fetchAll(PDO::FETCH_ASSOC);

$query = 'SELECT * FROM cliente';

$s1tmt = $PDO->prepare($query);
$s1tmt->execute();
$set = $s1tmt->fetchAll(PDO::FETCH_ASSOC);


?>




<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
  <form method="post" action="../Controller/pedidosadd.php">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
          <h4 class="modal-title">Cadastro de Pedidos</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="produtos">Produtos</label>
            <select class="form-control m-bot15" id="produtos" name="produtos" >
              <?php if (count($result)) {              
               foreach( $result as $row ){ ?>
               <option value="<?php echo $row['id'];?>"><?php echo $row['nome'];?></option>
               <?php 
             }
           }
           ?>
         </select>
       </div>
       <div class="form-group">
        <label for="cliente">Clientes</label>
        <select class="form-control m-bot15" id="clientes" name="clientes">
          <?php if (count($set)) {              
           foreach( $set as $r1ow ){ ?>
           <option value="<?php echo $r1ow['id'];?>"><?php echo $r1ow['name'];?></option>
           <?php 
         }
       }
       ?>
     </select>
   </div>
   <div class="form-group">
    <label for="quantidade">Quantidade</label>
    <input type="text" class="form-control" name="qtd" id="qtd">
  </div>           
  <input type="hidden" class="form-control" name="status" id="status" value="Pedido"> 
  <div class="form-group">
    <button class="btn btn-primary" type="submit">Salvar</button>
  </div>
</form>
</div>
</div>
</div>
</div>


