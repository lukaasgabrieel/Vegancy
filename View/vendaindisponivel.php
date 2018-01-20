

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
           </div>

          <div class="form-group">
            <button class="btn btn-primary" type="submit">Salvar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


