<?php

require_once '../init.php';

// pega os dados do formuário
$name = isset($_POST['nome']) ? $_POST['nome'] : null;


// insere no banco
$PDO = db_connect();
$sql = "INSERT INTO categoria (categoria) VALUES (?);";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(1, $name);

if ($stmt->execute())
{
	header('Location: ../view/categorias.php');
}
else
{
	echo "Erro ao cadastrar";
	print_r($stmt->errorInfo());
}