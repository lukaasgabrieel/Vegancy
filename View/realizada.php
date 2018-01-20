<?php 

require_once '../init.php';
require_once 'header.php';


// abre a conexão
$PDO = db_connect();

// SQL para selecionar os registros
$sql = 'SELECT * FROM venda ORDER BY id DESC';
// seleciona os registros
$stmt = $PDO->prepare($sql);
$stmt->execute();

// SQL para selecionar os registros
$s1ql = 'SELECT SUM(valor_venda) FROM venda WHERE MONTH(data_venda) = '.date('n').'';
// seleciona os registros
$s1tmt = $PDO->prepare($s1ql);
$s1tmt->execute();

// SQL para selecionar os registros
$s2ql = 'SELECT SUM(valor_venda),pagamento FROM venda WHERE MONTH(data_venda) ='.date('n').' GROUP BY pagamento';
// seleciona os registros
$s2tmt = $PDO->prepare($s2ql);
$s2tmt->execute();
?>
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
       <h3 class="page-header"><i class="fa fa fa-bars"></i> Vendas Realizadas</h3>
       <ol class="breadcrumb">
        <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
        <li><i class="fa fa-bars"></i>Relatorios</li>
        <li><i class="fa fa-institution"></i>Vendas Realizadas</li>
      </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-3">
      <section class="panel">
        <header class="panel-heading">
          Valor da Vendas do mês 
        </header>
        
        <table class="table table-striped table-advance table-hover">
         <tbody>

          <tr>
           <th><i class="icon_calendar"></i> Valor</th>
         </tr>
         <?php while ($u1ser = $s1tmt->fetch(PDO::FETCH_ASSOC)): ?>
          <td>R$ <?php echo number_format($u1ser['SUM(valor_venda)'],2) ?></td>
          <td>
          </td>
        </tr>

      <?php endwhile; ?>
    </tbody>

  </table>
</section>
</div>
    <div class="col-lg-8">
      <section class="panel">
        <header class="panel-heading">
          Valor da Vendas Pela Forma de Pagamento 
        </header>
        
        <table class="table table-striped table-advance table-hover">
         <tbody>

          <tr>
           <th><i class="icon_calendar"></i> Valor</th>
            <th><i class="icon_calendar"></i> Forma</th>
         </tr>
         <?php while ($u2ser = $s2tmt->fetch(PDO::FETCH_ASSOC)): ?>
          <td>R$ <?php echo number_format($u2ser['SUM(valor_venda)'],2) ?></td>
          <td> <?php echo $u2ser['pagamento'] ?></td>
          <td>
          </td>
        </tr>

      <?php endwhile; ?>
    </tbody>

  </table>
</section>
</div>
</div>
<div class="row">
  <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading">
        Vendas Realizadas
      </header>

      <table class="table table-striped table-advance table-hover">
       <tbody>

        <tr>
         <th><i class="icon_profile"></i> ID</th> 
         <th><i class="icon_institution"></i> Data</th>
         <th><i class="icon_calendar"></i> Valor</th>
         <th><i class="icon_cogs"></i> Pagamento</th>
       </tr>
       <?php while ($user = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
        <td><?php echo $user['id'] ?></td>
        <td><?php echo date('d/m/Y', strtotime($user['data_venda'])); ?></td>
        <td>R$ <?php echo number_format($user['valor_venda'],2) ?></td>
        <td><?php echo $user['pagamento'] ?></td>

        <td>
        </td>
      </tr>

    <?php endwhile; ?>
  </tbody>

</table>
</section>
</div>
</div>

<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<!-- nice scroll -->
<script src="../js/jquery.scrollTo.min.js"></script>
<script src="../js/jquery.nicescroll.js" type="text/javascript"></script><!--custome script for all page-->
<script src="../js/scripts.js"></script>


</body>
</html>
