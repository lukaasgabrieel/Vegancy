<?php

require_once '../init.php';

// pega os dados do formuário
$name = isset($_POST['nome']) ? $_POST['nome'] : null;
$sg = isset($_POST['sigla']) ? $_POST['sigla'] : null;



// insere no banco
$PDO = db_connect();
$sql = "INSERT INTO estado (estado, sigla) VALUES (?,?);";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(1, $name);
$stmt->bindParam(2, $sg);

if ($stmt->execute())
{
	header('Location: ../view/estado.php');
}
else
{
	echo "Erro ao cadastrar";
	print_r($stmt->errorInfo());
}