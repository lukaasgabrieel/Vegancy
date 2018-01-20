<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
  <form method="post" action="../Controller/estadoadd.php">
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
            <label for="Sigla">Sigla</label>
            <input type="text" class="form-control" name="sigla" id="sigla" placeholder="Digite a Sigla...">
          </div>
          <div class="form-group">
            <button class="btn btn-primary" type="submit">Salvar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


