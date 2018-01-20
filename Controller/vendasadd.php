<?php

require_once '../init.php';

// insere no banco
$PDO = db_connect();
date_default_timezone_set('America/Sao_Paulo');
$date = date('Y-m-d');

$sql = 'INSERT INTO venda (data_venda) VALUES (?);';
$stmt = $PDO->prepare($sql);
$stmt->bindParam(1, $date);

if ($stmt->execute())
{
	header('Location: ../view/venda.php');
}
else
{
	echo "Erro ao cadastrar";
	print_r($stmt->errorInfo());
}