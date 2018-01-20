<?php 
require_once "../init.php";

// abre a conexão
$PDO = db_connect();

$s1ql = 'SELECT * FROM cidade';

// seleciona os registros
$s1tmt = $PDO->prepare($s1ql);
$s1tmt->execute();
$r1esult = $s1tmt-> fetchAll(PDO::FETCH_ASSOC);


?>

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
  <form method="post" action="../Controller/clienteadd.php">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
          <h4 class="modal-title">Cadastro de Clientes</h4>
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
            <label for="Nascimnento">Data de Nascimnento</label>
            <input type="date" class="form-control" name="Nascimnento" id="Nascimnento" placeholder="">
          </div>
        </div>
        <div class="col-lg-6">
         <div class="form-group">
          <label for="Nascimnento">Sexo</label>
          <select class="form-control m-bot15" name="sexo" id="sexo">
            <option>Feminino</option>
            <option>Masculino</option>
          </select>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
          <label for="telefone">Telefone</label>
          <input type="text" class="form-control" name="telefone" id="telefone" placeholder="Digite o numero...">
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
          <label for="celular">Celular</label>
          <input type="text" class="form-control" name="celular" id="celular" placeholder="Digite o numero...">
        </div>
      </div>
      <div class="col-lg-12">
        <div class="form-group">
          <label for="endereco">Endereço</label>
          <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Digite o endereço...">
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
          <label for="bairro">Bairro</label>
          <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Digite o bairro...">
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
          <label for="cliente">Cidade</label>
          <select class="form-control m-bot15" id="Cidade_id" name="Cidade_id">
            <?php if (count($r1esult)) {              
             foreach( $r1esult as $row ){ ?>
             <option value="<?php echo $row['id'];?>"><?php echo $row['nome'];?></option>
             <?php 
           }
         }
         ?>
       </select>
     </div>
   </div>
   <div class="col-lg-6">
     <div class="form-group">
      <label for="rg">RG</label>
      <input type="text" class="form-control" name="rg" id="rg" placeholder="Digite o rg...">
    </div>
  </div>
  <div class="col-lg-6">
    <div class="form-group">
      <label for="cpf">CPF</label>
      <input type="text" class="form-control" name="cpf" id="cpf" placeholder="Digite o cpf...">
    </div>
  </div>
  <div class="col-lg-12">

    <div class="form-group">
      <label for="email">E-mail</label>
      <input type="email" class="form-control" name="email" id="email" placeholder="Digite o email...">
    </div>          
  </div>
  <div class="form-group">
    <button class="btn btn-primary" type="submit">Salvar</button>
  </div>
</form>
</div>
</div>
</div>
</div>


