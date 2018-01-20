<?php 
include 'vendaadd.php';
include 'vendaaddcliente.php';
require_once '../init.php';
require_once 'header.php';

// abre a conexão
$PDO = db_connect();


$sql = 'SELECT * FROM venda ORDER BY id DESC LIMIT 1';
$stmt = $PDO->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

$id = $result['id'];

// SQL para selecionar os registros
$s2ql = 'SELECT b.nome, a.quantidade, b.preco_venda FROM produtos_has_venda a INNER JOIN produtos b ON a.produtos_id = b.id INNER JOIN venda c on a.venda_id = c.id WHERE c.id = '.$id.'';

// seleciona os registros
$s2tmt = $PDO->prepare($s2ql);
$s2tmt->execute();

$s3ql = 'SELECT * FROM cliente_has_venda a INNER JOIN cliente b ON a.Cliente_id = b.id where a.venda_id = '.$id.'';

$s3tmt = $PDO->prepare($s3ql);
$s3tmt->execute();
?>
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="row">
     <div class="col-lg-12">
      <h3 class="page-header"><i class="fa fa fa-bars"></i> Venda</h3>
      <ol class="breadcrumb">
        <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
        <li><i class="fa fa-bars"></i>Vendas</li>
        <li><i class="fa fa-shopping-cart"></i>Venda</li>
      </ol>
      <div class="row">
        <div class="col-lg-12">
          <section class="panel">
            <header class="panel-heading">
             Cliente
           </header>
           <div class="panel-body">
            <form class="form-horizontal " method="get">
              <div class="form-group">
                <label class="col-sm-2 control-label">Cliente</label>
                <div class="col-sm-10">
                 <?php while ($user = $s3tmt->fetch(PDO::FETCH_ASSOC)): ?>
                  <input class="form-control" id="disabledInput" type="text" value="<?php echo $user['name'] ?>" disabled >
                <?php endwhile; ?>
              </div>
            </div>
          </form>
        </div>
      </section>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-3">
      <section class="panel">
        <header class="panel-heading">
          Funções
        </header>
        <div class="panel-body">
          <a class="btn btn-danger btn-lg btn-block" href="../Controller/vendasadd.php"><i class="icon_plus_alt2"></i>   Nova venda</a>
          <a class="btn btn-primary btn-lg btn-block" href="#myModal" data-toggle="modal"><i class="icon_plus_alt2"></i>   Adicionar Produto</a>
          <a class="btn btn-warning btn-lg btn-block" href="#myModal2" data-toggle="modal"><i class="icon_plus_alt2"></i>   Adicionar Cliente</a>
          <a class="btn btn-success btn-lg btn-block" href="#myModal3" data-toggle="modal"><i class="icon_plus_alt2"></i>   Finalizar Venda</a>
        </div>
      </section>
    </div>
    <div class="col-lg-9">
      <section class="panel">
       <header class="panel-heading">
        Produtos
      </header>
      <div class="panel-body">
        <table class="table table-striped table-advance table-hover">
         <tbody>
          <tr>
           <th><i class="icon_profile"></i> Produtos</th>
           <th><i class="icon_calendar"></i> Quantidade</th>
           <th><i class="icon_mail_alt"></i> Preço</th>
           <th><i>TOTAL</i></th>
         </tr>
         <tr>

          <?php while ($user = $s2tmt->fetch(PDO::FETCH_ASSOC)): ?>
            <td><?php echo $user['nome'] ?></td>
            <td><?php echo $user['quantidade']; ?></td>
            <td>R$<?php echo number_format($user['preco_venda'],2); ?></td>
            <?php $total = $user['quantidade'] * $user['preco_venda'] ?>
            <td>R$<?php echo number_format($total,2); ?></td> 
          </tr>
        </tbody>
      <?php endwhile; ?>
    </table>
  </div>
</section>    
</div>
</div>
<?php 
$s4ql = 'SELECT SUM(a.quantidade), SUM(b.preco_venda) FROM produtos_has_venda a INNER JOIN produtos b ON a.produtos_id = b.id INNER JOIN venda c on a.venda_id = c.id WHERE c.id  = '.$id.'';
$s4tmt = $PDO->prepare($s4ql); 
$s4tmt->execute();
while ($u1ser = $s4tmt->fetch(PDO::FETCH_ASSOC)): ?>
<div class="row">
  <div class="col-lg-8">
  </div>
  <div class="col-lg-4">
   <section class="panel">                        
    <div class="panel-body">
      <div class="panel panel-danger">
       <?php $t2otal = $u1ser['SUM(a.quantidade)'] * $u1ser['SUM(b.preco_venda)'] ?>
       <h3>TOTAL:</h3>
       <div class="panel-heading"><h1>R$<?php echo number_format($t2otal,2); ?></h1></div>
     <?php endwhile; ?>
   </div>
 </div>
</div>
</form>
</div>
</section>
</div>
</div>

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal3" class="modal fade">
  <form method="post" action="../Controller/vendafinish.php">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
          <h4 class="modal-title">Finalizar Venda</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
           <input class="form-control" id="id" name="id" type="hidden" value="<?php echo $id; ?>" >
           <input class="form-control" id="valor" name="valor" type="hidden" value="<?php echo $t2otal; ?>">
         </div>
       </div>
       <div class="form-group">
        <label class="control-label col-lg-2" for="inputSuccess">Forma</label>
        <div class="col-lg-10">
          <select class="form-control m-bot15" name="forma" id="forma">
            <option>Á Vista</option>
            <option>Debito</option>
            <option>Crédito</option>
            <option>Cheque</option>
          </select>
        </div>
        <div class="form-group ">
          <button class="btn btn-primary" type="submit">Salvar</button>
          
        </div>
      </div>
    </form>
  </div>
</div>
</div>
</div>



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
