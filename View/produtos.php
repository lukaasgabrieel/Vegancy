<?php 
include 'produtosadd.php';

require_once '../init.php';
require_once 'header.php';


// abre a conexão
$PDO = db_connect();


// SQL para selecionar os registros
$sql = 'SELECT a.id, a.nome, a.preco_custo, a.preco_venda, a.quantidade, a.codigo, a.estoque_minimo, b.categoria FROM produtos a INNER JOIN categoria b ON a.categoria_id = b.id';

// seleciona os registros
$stmt = $PDO->prepare($sql);
$stmt->execute();


$s1ql = 'SELECT * FROM categoria';

// seleciona os registros
$s1tmt = $PDO->prepare($s1ql);
$s1tmt->execute();
$r1esult = $s1tmt-> fetchAll(PDO::FETCH_ASSOC);

?>
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
       <h3 class="page-header"><i class="fa fa fa-bars"></i> Cadastro de Produtos</h3>
       <ol class="breadcrumb">
        <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
        <li><i class="fa fa-bars"></i>Cadastro</li>
        <li><i class="fa fa-barcode"></i>Produtos</li>
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
          Produtos Cadastrados
        </header>
        
        <table class="table table-striped table-advance table-hover">
         <tbody>

          <tr>
           <th><i class="icon_profile"></i> ID</th> 
           <th><i class="icon_profile"></i> Nome</th>
           <th><i class="icon_calendar"></i> Preço de Compra</th>
           <th><i class="icon_cogs"></i> Preço de Venda</th>
           <th><i class="icon_cogs"></i> Quantidade</th>
           <th><i class="icon_cogs"></i> Codigo</th>
           <th><i class="icon_cogs"></i> Estoque Minimo</th>
           <th><i class="icon_cogs"></i> Categoria</th>
           <th><i class="icon_cogs"></i> Funções</th>
         </tr>
         <?php while ($user = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
          <td><?php echo $user['id'] ?></td>
          <td><?php echo $user['nome'] ?></td>
          <td>R$ <?php echo number_format($user['preco_custo'],2); ?></td>
          <td>R$ <?php echo number_format($user['preco_venda'],2); ?></td>
          <td><?php echo $user['quantidade'] ?></td>
          <td><?php echo $user['codigo'] ?></td>
          <td><?php echo $user['estoque_minimo'] ?></td>
          <td><?php echo $user['categoria'] ?></td>
          <td>
            <div class="btn-group">
              <a class="btn btn-primary" href="#myModal" data-toggle="modal"><i class="icon_plus_alt2"></i></a>
              <a class="btn btn-success" href="#myEditar_<?php echo $user['id']; ?>" data-toggle="modal"><i class="icon_check_alt2"></i></a>
              <a class="btn btn-danger" href="../Controller/cidadedelete.php?id=<?php echo $user['id'] ?>" onclick="return confirm('Tem certeza de que deseja remover?');"><i class="icon_close_alt2"></i></a>
            </div>
          </td>
        </tr>
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myEditar_<?php echo $user['id']; ?>" class="modal fade">
          <form method="post" action="../Controller/produtoedit.php">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                  <h4 class="modal-title">Alterar Cadastro de Produtos</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $user['id'] ?>">
                    <label for="Nome">Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $user['nome'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="pc">Preço de Custo</label>
                    <input type="text" class="form-control" name="pc" id="pc" value="<?php echo $user['preco_custo'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="pv">Preço de Venda</label>
                    <input type="text" class="form-control" name="pv" id="pv" value="<?php echo $user['preco_venda'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="qtd">Quantidade</label>
                    <input type="text" class="form-control" name="qtd" id="qtd" value="<?php echo $user['quantidade'] ?>">
                  </div>                    
                  <div class="form-group">
                    <label for="codigo">Codigo</label>
                    <input type="text" class="form-control" name="codigo" id="codigo" value="<?php echo $user['codigo'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="minimo">Estoque Minimo</label>
                    <input type="text" class="form-control" name="minimo" id="minimo" value="<?php echo $user['estoque_minimo'] ?>">
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
