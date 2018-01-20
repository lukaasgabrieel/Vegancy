<?php 
include 'categoriasadd.php';

require_once '../init.php';
require_once 'header.php';


// abre a conexão
$PDO = db_connect();

// SQL para selecionar os registros
$sql = 'SELECT * FROM categoria ORDER BY id DESC';

// seleciona os registros
$stmt = $PDO->prepare($sql);
$stmt->execute();

?>
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
       <h3 class="page-header"><i class="fa fa fa-bars"></i> Cadastro de Categorias</h3>
       <ol class="breadcrumb">
        <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
        <li><i class="fa fa-bars"></i>Cadastro</li>
        <li><i class="fa fa-cubes"></i>Categorias</li>
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
          Categorias Cadastradas
        </header>
        
        <table class="table table-striped table-advance table-hover">
         <tbody>

          <tr>
           <th><i class="icon_profile"></i> ID</th> 
           <th><i class="icon_profile"></i> Categoria</th>
         </tr>
         <?php while ($user = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
          <td><?php echo $user['id'] ?></td>
          <td><?php echo $user['categoria'] ?></td>
          <td>
            <div class="btn-group">
              <a class="btn btn-primary" href="#myModal" data-toggle="modal"><i class="icon_plus_alt2"></i></a>
              <a class="btn btn-success" href="#myEditar_<?php echo $user['id']; ?>" data-toggle="modal"><i class="icon_check_alt2"></i></a>
              <a class="btn btn-danger" href="../Controller/categoriadelete.php?id=<?php echo $user['id'] ?>" onclick="return confirm('Tem certeza de que deseja remover?');"><i class="icon_close_alt2"></i></a>
            </div>
          </td>
        </tr>
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myEditar_<?php echo $user['id']; ?>" class="modal fade">
          <form method="post" action="../Controller/categoriaedit.php">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                  <h4 class="modal-title">Alterar Cadastro de Categorias</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $user['id'] ?>">
                    <label for="Nome">Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $user['categoria'] ?>">
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
