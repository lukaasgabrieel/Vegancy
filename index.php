<?php 
require_once 'init.php';

// abre a conexão
$PDO = db_connect();


// SQL para selecionar os registros
$sql = 'SELECT SUM(quantidade) as valor FROM produtos';

// seleciona os registros
$stmt = $PDO->prepare($sql);
$stmt->execute();
$result = $stmt-> fetchColumn();

// SQL para selecionar os registros
$s1ql = 'SELECT SUM(qtd) FROM pedidos';

// seleciona os registros
$s1tmt = $PDO->prepare($s1ql);
$s1tmt->execute();
$r1esult = $s1tmt-> fetchColumn();

$s2ql = 'SELECT COUNT(name) FROM cliente';
$s2tmt = $PDO->prepare($s2ql);
$s2tmt->execute();
$r2esult = $s2tmt->fetchColumn();

$s3ql = 'SELECT COUNT(pagamento) FROM venda';
$s3tmt = $PDO->prepare($s3ql);
$s3tmt->execute();
$r3esult = $s3tmt->fetchColumn();


?>
<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="img/favicon.png">
	<title>Vegancy Admin</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/bootstrap-theme.css" rel="stylesheet">
	<link href="../css/elegant-icons-style.css" rel="stylesheet" />
	<link href="../css/font-awesome.min.css" rel="stylesheet" />
	<link href="../css/style.css" rel="stylesheet">
	<link href="../css/style-responsive.css" rel="stylesheet" />
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-theme.css" rel="stylesheet">
	<link href="css/elegant-icons-style.css" rel="stylesheet" />
	<link href="css/font-awesome.min.css" rel="stylesheet" />
	<link href="css/style.css" rel="stylesheet">
	<link href="css/style-responsive.css" rel="stylesheet" />

</head>

<body>
	<!-- container section start -->
	<section id="container" class="">
		<!--header start-->
		
		<header class="header dark-bg">
			<div class="toggle-nav">
				<div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
			</div>

			<!--logo start-->
			<a href="index.php" class="logo">Vegancy<span class="lite">Admin</span></a>
			<!--logo end-->

		</header>      
		<!--header end-->

		<!--sidebar start-->
		<aside>
			<div id="sidebar"  class="nav-collapse ">
				<!-- sidebar menu start-->
				<ul class="sidebar-menu">                
					<li class="">
						<a class="" href="index.php">
							<i class="icon_house_alt"></i>
							<span>Dashboard</span>
						</a>
					</li>
					<li class="sub-menu">
						<a href="javascript:;" class="">
							<i class="icon_document_alt"></i>
							<span>Cadastros</span>
							<span class="menu-arrow arrow_carrot-right"></span>
						</a>
						<ul class="sub">
							<li><a class="" href="View/estado.php">Estado</a></li>                          
							<li><a class="" href="View/cidade.php">Cidade</a></li>
							<li><a class="" href="View/cliente.php">Cliente</a></li>
							<li><a class="" href="View/produtos.php">Produtos</a></li>
							<li><a class="" href="View/categorias.php">Categorias</a></li>
						</ul>
					</li>       
					<li class="sub-menu">
						<a href="javascript:;" class="">
							<i class="icon_desktop"></i>
							<span>Vendas</span>
							<span class="menu-arrow arrow_carrot-right"></span>
						</a>
						<ul class="sub">
							<li><a class="" href="View/pedidos.php">Pedidos</a></li>
							<li><a class="" href="View/venda.php">Vendas</a></li>
						</ul>
					</li>
					<li class="sub-menu">
						<a href="javascript:;" class="">
							<i class="icon_desktop"></i>
							<span>Relátorios</span>
							<span class="menu-arrow arrow_carrot-right"></span>
						</a>
						<ul class="sub">
							<li><a class="" href="View/realizada.php">Vendas Realizadas</a></li>
						</ul>
					</li>
					
				</ul>
				<!-- sidebar menu end-->
			</div>
		</aside>
		<!--sidebar end-->

		
		<!--main content start-->
		<section id="main-content">
			<section class="wrapper">            
				<!--overview start-->
				<div class="row">
					<div class="col-lg-12">
						<h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
						<ol class="breadcrumb">
							<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
							<li><i class="fa fa-laptop"></i>Dashboard</li>						  	
						</ol>
					</div>
				</div>
				
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						<div class="info-box blue-bg">
							<i class="fa fa-cloud-download"></i>
							<div class="count"><br /><br /><?php echo $r2esult; ?></div>
							<div class="title">Clientes</div>						
						</div><!--/.info-box-->			
					</div><!--/.col-->
					
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						<div class="info-box brown-bg">
							<i class="fa fa-shopping-cart"></i>
							<div class="count"><br /><br /><?php echo $r3esult; ?></div>
							<div class="title">Vendas Feitas</div>						
						</div><!--/.info-box-->			
					</div><!--/.col-->	
					
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						<div class="info-box dark-bg">
							<i class="fa fa-thumbs-o-up"></i>
							<div class="count"><br /><br /><?php echo $r1esult ?></div>
							<div class="title">Pedidos</div>						
						</div><!--/.info-box-->			
					</div><!--/.col-->
					
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						<div class="info-box green-bg">
							<i class="fa fa-cubes"></i>
							<div class="count"><br /><br /><?php echo $result ?></div>
							<div class="title">Estoque</div>						
						</div><!--/.info-box-->			
					</div><!--/.col-->
					<!-- javascripts -->
					<script src="js/jquery.js"></script>
					<script src="js/jquery-ui-1.10.4.min.js"></script>
					<script src="js/jquery-1.8.3.min.js"></script>
					<script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
					<!-- bootstrap -->
					<script src="js/bootstrap.min.js"></script>
					<!-- nice scroll -->
					<script src="js/jquery.scrollTo.min.js"></script>
					<script src="js/jquery.nicescroll.js" type="text/javascript"></script>
					<!-- charts scripts -->
					<script src="assets/jquery-knob/js/jquery.knob.js"></script>
					<script src="js/jquery.sparkline.js" type="text/javascript"></script>
					<script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
					<script src="js/owl.carousel.js" ></script>
					<!-- jQuery full calendar -->
					<script src="js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
					<script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
					<!--script for this page only-->
					<script src="js/calendar-custom.js"></script>
					<script src="js/jquery.rateit.min.js"></script>
					<!-- custom select -->
					<script src="js/jquery.customSelect.min.js" ></script>
					<script src="assets/chart-master/Chart.js"></script>

					<!--custome script for all page-->
					<script src="js/scripts.js"></script>
					<!-- custom script for this page-->
					<script src="js/sparkline-chart.js"></script>
					<script src="js/easy-pie-chart.js"></script>
					<script src="js/jquery-jvectormap-1.2.2.min.js"></script>
					<script src="js/jquery-jvectormap-world-mill-en.js"></script>
					<script src="js/xcharts.min.js"></script>
					<script src="js/jquery.autosize.min.js"></script>
					<script src="js/jquery.placeholder.min.js"></script>
					<script src="js/gdp-data.js"></script>	
					<script src="js/morris.min.js"></script>
					<script src="js/sparklines.js"></script>	
					<script src="js/charts.js"></script>
					<script src="js/jquery.slimscroll.min.js"></script>
					<script>

      //knob
      $(function() {
      	$(".knob").knob({
      		'draw' : function () { 
      			$(this.i).val(this.cv + '%')
      		}
      	})
      });

      //carousel
      $(document).ready(function() {
      	$("#owl-slider").owlCarousel({
      		navigation : true,
      		slideSpeed : 300,
      		paginationSpeed : 400,
      		singleItem : true

      	});
      });

      //custom select box

      $(function(){
      	$('select.styled').customSelect();
      });
      
      /* ---------- Map ---------- */
      $(function(){
      	$('#map').vectorMap({
      		map: 'world_mill_en',
      		series: {
      			regions: [{
      				values: gdpData,
      				scale: ['#000', '#000'],
      				normalizeFunction: 'polynomial'
      			}]
      		},
      		backgroundColor: '#eef3f7',
      		onLabelShow: function(e, el, code){
      			el.html(el.html()+' (GDP - '+gdpData[code]+')');
      		}
      	});
      });

  </script>

</body>
</html>
