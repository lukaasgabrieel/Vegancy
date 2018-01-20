<?php

require_once '../init.php';

// pega os dados do formuário
$produto = isset($_POST['produtos']) ? $_POST['produtos'] : null;
$cliente = isset($_POST['clientes']) ? $_POST['clientes'] : null;
$qtd = isset($_POST['qtd']) ? $_POST['qtd'] : null;
$status = isset($_POST['status']) ? $_POST['status'] : null;

echo $produto;
echo $cliente;
$PDO = db_connect();
$sql = "INSERT INTO pedidos (produtos_id, Cliente_id, qtd, status) VALUES (?, ?, ?, ?);";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(1, $produto);
$stmt->bindParam(2, $cliente);
$stmt->bindParam(3, $qtd);
$stmt->bindParam(4, $status);

if ($stmt->execute())
{
	header('Location: ../view/pedidos.php');
}
else
{
	echo "Erro ao cadastrar";
	print_r($stmt->errorInfo());
}

