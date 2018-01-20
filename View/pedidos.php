<?php 
include 'pedidosadd.php';

require_once '../init.php';
require_once 'header.php';


// SQL para selecionar os registros
$s1ql = 'SELECT * FROM produtos';

// seleciona os registros
$s1tmt = $PDO->prepare($sql);
$s1tmt->execute();
$r1esult = $s1tmt-> fetchAll(PDO::FETCH_ASSOC);

$query = 'SELECT * FROM cliente';

$s2tmt = $PDO->prepare($query);
$s2tmt->execute();
$set = $s2tmt->fetchAll(PDO::FETCH_ASSOC);



// abre a conexão
$PDO = db_connect();

// SQL para selecionar os registros
$sql = 'SELECT a.id, b.name, c.nome,a.qtd,a.status FROM pedidos a INNER JOIN cliente b ON a.Cliente_id = b.id INNER JOIN produtos c ON a.produtos_id = c.id';

// seleciona os registros
$stmt = $PDO->prepare($sql);
$stmt->execute();

?>
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
       <h3 class="page-header"><i class="fa fa fa-bars"></i> Cadastro de Pedidos</h3>
       <ol class="breadcrumb">
        <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
        <li><i class="fa fa-bars"></i>Cadastro</li>
        <li><i class="  fa fa-truck"></i>Pedidos</li>
      </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <section class="panel">
        <header class="panel-heading">
          Pedidos Cadastrados
        </header>
        
        <table class="table table-striped table-advance table-hover">
         <tbody>

          <tr>
           <th><i class="icon_profile"></i> ID</th> 
           <th><i class="icon_profile"></i> Produto</th>
           <th><i class="icon_calendar"></i> Cliente</th>
           <th><i class="icon_cogs"></i> Quantidade</th>
           <th><i class="icon_cogs"></i> Status</th>
           <th><i class="icon_cogs"></i> Funções</th>
         </tr>
         <?php while ($user = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
          <td><?php echo $user['id'] ?></td>
          <td><?php echo $user['nome'] ?></td>
          <td><?php echo $user['name']; ?></td>
          <td><?php echo $user['qtd']; ?></td>
          <td><?php echo $user['status'] ?></td>
          <td>
            <div class="btn-group">
              <a class="btn btn-primary" href="#myModal" data-toggle="modal"><i class="icon_plus_alt2"></i></a>
              <a class="btn btn-success" href="#myEditar_<?php echo $user['id']; ?>" data-toggle="modal"><i class="icon_check_alt2"></i></a>
              <a class="btn btn-danger" href="../Controller/pedidosdelete.php?id=<?php echo $user['id'] ?>" onclick="return confirm('Tem certeza de que deseja remover?');"><i class="icon_close_alt2"></i></a>
            </div>
          </td>
        </tr>
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myEditar_<?php echo $user['id']; ?>" class="modal fade">
          <form method="post" action="../Controller/pedidosedit.php">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                  <h4 class="modal-title">Alteração de Pedidos</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                   <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $user['id'] ?>">
                   <label for="produtos">Produtos</label>
                   <select class="form-control m-bot15" id="produtos" name="produtos" >
                    <?php if (count($r1esult)) {              
                     foreach( $r1esult as $r1ow ){ ?>
                     <option value="<?php echo $r1ow['id'];?>"><?php echo $r1ow['nome'];?></option>
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
                 foreach( $set as $r2ow ){ ?>
                 <option value="<?php echo $r2ow['id'];?>"><?php echo $r2ow['name'];?></option>
                 <?php 
               }
             }
             ?>
           </select>
         </div>
         <div class="form-group">
          <label for="quantidade">Quantidade</label>
          <input type="text" class="form-control" name="qtd" id="qtd" value="<?php echo $user['qtd'] ?>">
        </div>           
        <div class="form-group">
          <label for="quantidade">Status</label>
          <input type="text" class="form-control" name="status" id="status" value="<?php echo $user['status'] ?>">
        </div>         
        <div class="form-group">
          <button class="btn btn-primary" type="submit">Salvar</button>
        </div>
      </form>
    </div>
  </div>
</div>
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
  <div class="credits">
                 </div>
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
