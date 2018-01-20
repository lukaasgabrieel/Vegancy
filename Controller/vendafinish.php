<?php

require_once '../init.php';

// resgata os valores do formulário
$id = isset($_POST['id']) ? $_POST['id'] : null;
$valor = isset($_POST['valor']) ? $_POST['valor'] : null;
$forma = isset($_POST['forma']) ? $_POST['forma'] : null;

// atualiza o banco
$PDO = db_connect();
$sql = "UPDATE venda SET valor_venda = ?, pagamento = ? WHERE  id = ?";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(1, $valor);
$stmt->bindParam(2, $forma);
$stmt->bindParam(3, $id, PDO::PARAM_INT);
$stmt->execute();

date_default_timezone_set('America/Sao_Paulo');
$date = date('Y-m-d');

$s1ql = 'INSERT INTO venda (data_venda) VALUES (?);';
$s1tmt = $PDO->prepare($s1ql);
$s1tmt->bindParam(1, $date);

if ($s1tmt->execute())
	
{


	header('Location: ../view/venda.php');

}
else
{
	echo "Erro ao alterar";
	print_r($stmt->errorInfo());
}
