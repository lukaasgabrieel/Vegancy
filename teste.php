<?php 

require_once 'init.php';

$parcelas = 4;
$data = date('d/m/y');
for($i = 1;$i < $parcelas;$i++){
  $retorno = mktime(0, 0, 0, $data[0], $data[1]+$i, $data[2]);
  echo date('d/m/Y',$retorno).'<br>';
}

 ?>