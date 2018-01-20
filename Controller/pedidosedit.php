<?php

require_once '../init.php';

// resgata os valores do formulário
$produtos = isset($_POST['produtos']) ? $_POST['produtos'] : null;
$clientes = isset($_POST['clientes']) ? $_POST['clientes'] : null;
$qtd = isset($_POST['qtd']) ? $_POST['qtd'] : null;
$status = isset($_POST['status']) ? $_POST['status'] : null;
$id = isset($_POST['id']) ? $_POST['id'] : null;

// atualiza o banco
$PDO = db_connect();
$sql = "UPDATE pedidos SET produtos_id = ?, Cliente_id = ?, qtd = ?, status = ? WHERE id = ?";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(1, $produtos);
$stmt->bindParam(2, $clientes);
$stmt->bindParam(3, $qtd);
$stmt->bindParam(4, $status);
$stmt->bindParam(5, $id, PDO::PARAM_INT);

if ($stmt->execute())
{
	header('Location: ../view/pedidos.php');

}
else
{
	echo "Erro ao alterar";
	print_r($stmt->errorInfo());
}