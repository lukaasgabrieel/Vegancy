<?php

require_once '../init.php';

// pega os dados do formuário
$id = isset($_POST['id']) ? $_POST['id'] : null;
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;

// atualiza o banco
$PDO = db_connect();
$sql = "INSERT INTO cliente_has_venda(Cliente_id, venda_id) VALUES (?, ?);";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(1, $nome);
$stmt->bindParam(2, $id);

if ($stmt->execute())
{
	header('Location: ../view/venda.php');

}
else
{
	echo "Erro ao alterar";
	print_r($stmt->errorInfo());
}
