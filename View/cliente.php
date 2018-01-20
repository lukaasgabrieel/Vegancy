<?php 
include 'clienteadd.php';

require_once '../init.php';
require_once 'header.php';

// abre a conexão
$PDO = db_connect();

$s1ql = 'SELECT * FROM cidade';

// seleciona os registros
$s1tmt = $PDO->prepare($s1ql);
$s1tmt->execute();
$r1esult = $s1tmt-> fetchAll(PDO::FETCH_ASSOC);



// SQL para selecionar os registros
$sql = 'SELECT * FROM cliente ORDER BY id DESC';

// seleciona os registros
$stmt = $PDO->prepare($sql);
$stmt->execute();

?>
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
       <h3 class="page-header"><i class="fa fa fa-bars"></i> Cadastro de Cliente</h3>
       <ol class="breadcrumb">
        <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
        <li><i class="fa fa-bars"></i>Cadastro</li>
        <li><i class="fa fa-group"></i>Cliente</li>
      </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-3">
      <a class="btn btn-primary" href="#myModal" data-toggle="modal">Novo <i class="icon_plus_alt2"></i></a>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-lg-12">
      <section class="panel">
        <header class="panel-heading">
          Clientes Cadastrados
        </header>
        
        <table class="table table-striped table-advance table-hover">
         <tbody>

          <tr>
           <th><i class="icon_profile"></i> ID</th> 
           <th><i class="icon_profile"></i> Nome</th>
           <th><i class="icon_calendar"></i> Endereço</th>
           <th><i class="icon_calendar"></i> Telefone</th>
           <th><i class="icon_calendar"></i> Celular</th>
           <th><i class="icon_cogs"></i> Funções</th>
         </tr>
         <?php while ($user = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
          <td><?php echo $user['id'] ?></td>
          <td><?php echo $user['name'] ?></td>
          <td><?php echo $user['endereco'] ?></td>
          <td><?php echo $user['telefone'] ?></td>
          <td><?php echo $user['celular'] ?></td>
          <td>
            <div class="btn-group">
              <a class="btn btn-primary" href="#myModal" data-toggle="modal"><i class="icon_plus_alt2"></i></a>
              <a class="btn btn-success" href="#myEditar_<?php echo $user['id']; ?>" data-toggle="modal"><i class="icon_check_alt2"></i></a>
              <a class="btn btn-danger" href="../Controller/clientedelete.php?id=<?php echo $user['id'] ?>" onclick="return confirm('Tem certeza de que deseja remover?');"><i class="icon_close_alt2"></i></a>
            </div>
          </td>
        </tr>
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myEditar_<?php echo $user['id']; ?>" class="modal fade">
          <form method="post" action="../Controller/clienteedit.php">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                  <h4 class="modal-title">Alterar Cadastro de Cidades</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                   <div class="col-lg-12">
                    <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $user['id'] ?>">
                    <label for="Nome">Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $user['name'] ?>">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="Nascimnento">data de Nascimnento</label>
                    <input type="date" class="form-control" name="Nascimnento" id="Nascimnento" value="<?php echo $user['data_nascimento'] ?>">
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
                <input type="text" class="form-control" name="telefone" id="telefone" value="<?php echo $user['telefone'] ?>">
              </div>
            </div>
            <div class="col-lg-6">
             <div class="form-group">
              <label for="celular">Celular</label>
              <input type="text" class="form-control" name="celular" id="celular" value="<?php echo $user['celular'] ?>">
            </div>
          </div>
               <div class="col-lg-12">           
          <div class="form-group">
            <label for="endereco">Endereço</label>
            <input type="text" class="form-control" name="endereco" id="endereco" value="<?php echo $user['endereco'] ?>">
          </div>
          </div>
          <div class="col-lg-6">
          <div class="form-group">
            <label for="bairro">Bairro</label>
            <input type="text" class="form-control" name="bairro" id="bairro" value="<?php echo $user['bairro'] ?>">
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
        <input type="text" class="form-control" name="rg" id="rg" value="<?php echo $user['rg'] ?>"">
      </div>
      </div>
      <div class="col-lg-6">
      <div class="form-group">
        <label for="cpf">CPF</label>
        <input type="text" class="form-control" name="cpf" id="cpf" value="<?php echo $user['cpf'] ?>">
      </div>
      </div>
      <div class="col-lg-12">
      <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" class="form-control" name="email" id="email" value="<?php echo $user['email'] ?>">
      </div>          
      </div>
      <div class="form-group">
        <button class="btn btn-primary" type="submit">Salvar</button>
      </div>
    </form>
  </div>

<?php endwhile; ?>
</tbody>

</table>

</section>
</div>
</div>

<!-- page end-->
</section>
</section>


<!--main content end-->
<div class="text-right">
</div>
</section>
<!-- container section end -->
<!-- javascripts -->
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<!-- nice scroll -->
<script src="../js/jquery.scrollTo.min.js"></script>
<script src="../js/jquery.nicescroll.js" type="text/javascript"></script><!--custome script for all page-->
<script src="../js/scripts.js"></script>


</body>
</html>
