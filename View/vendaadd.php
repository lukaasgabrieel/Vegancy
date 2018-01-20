
<?php

require_once '../init.php';

// abre a conexão
$PDO = db_connect();

$sql = 'SELECT * FROM venda ORDER BY id DESC LIMIT 1';
$stmt = $PDO->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);


$s1ql = 'SELECT * FROM produtos';

// seleciona os registros
$s1tmt = $PDO->prepare($s1ql);
$s1tmt->execute();
$r1esult = $s1tmt-> fetchAll(PDO::FETCH_ASSOC);
?>

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
  <form method="post" action="../Controller/vendaaddproduto.php">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
          <h4 class="modal-title">Adicionar Produtos</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" value="<?php echo $result['id']?>" id="id" name="id">
            <label for="cliente">Produtos</label>
            <select class="form-control m-bot15" id="nome" name="nome">
              <?php if (count($r1esult)) {              
               foreach( $r1esult as $row ){ ?>
               <option value="<?php echo $row['id'];?>"><?php echo $row['nome'];?></option>
               <?php   }      }
               ?>
             </select>
           </div>

           <div class="form-group">
            <label for="qtd">Quantidade</label>
            <input type="text" class="form-control" name="qtd" id="qtd" placeholder="Digite a Quantidade...">
          </div>                    
          <div class="form-group">
            <button class="btn btn-success" id='success' type="submit">Salvar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

