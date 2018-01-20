<?php

require_once '../init.php';

// abre a conexão
$PDO = db_connect();

$s1ql = 'SELECT * FROM Categoria';

// seleciona os registros
$s1tmt = $PDO->prepare($s1ql);
$s1tmt->execute();
$r1esult = $s1tmt-> fetchAll(PDO::FETCH_ASSOC);


?>


<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
  <form method="post" action="../Controller/produtosadd.php">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
          <h4 class="modal-title">Cadastro de Produtos</h4>
        </div>
        <div class="modal-body">
           <div class="col-lg-12">
          <div class="form-group">
            <label for="Nome">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite o Nome...">
          </div>
          </div>
           <div class="col-lg-6">
          <div class="form-group">
            <label for="pc">Preço de Custo</label>
            <input type="text" class="form-control" name="pc" id="pc" placeholder="Digite a Preço...">
          </div>
          </div>
           <div class="col-lg-6">
          <div class="form-group">
            <label for="pv">Preço de Venda</label>
            <input type="text" class="form-control" name="pv" id="pv" placeholder="Digite a Preço...">
          </div>
          </div>
          <div class="form-group">
            <label for="qtd">Quantidade</label>
          <input type="text" class="form-control" name="qtd" id="qtd" placeholder="Digite a Quantidade...">
          </div>                    
          <div class="form-group">
            <label for="codigo">Codigo</label>
            <input type="text" class="form-control" name="codigo" id="codigo" placeholder="Digite o Codigo...">
          </div>
          <div class="form-group">
            <label for="minimo">Estoque Minimo</label>
            <input type="text" class="form-control" name="minimo" id="minimo" placeholder="Digite o estoque minimo...">
          </div>
          <div class="form-group">
            <label for="cliente">Categoria</label>
            <select class="form-control m-bot15" id="categoria" name="categoria">
              <?php if (count($r1esult)) {              
               foreach( $r1esult as $row ){ ?>
               <option value="<?php echo $row['id'];?>"><?php echo $row['categoria'];?></option>
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


