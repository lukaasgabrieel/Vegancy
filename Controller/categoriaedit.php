<?php

require_once '../init.php';

// resgata os valores do formulário
$name = isset($_POST['nome']) ? $_POST['nome'] : null;
$id = isset($_POST['id']) ? $_POST['id'] : null;

// atualiza o banco
$PDO = db_connect();
$sql = "UPDATE categoria SET categoria = ? WHERE id = ?";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(1, $name);
$stmt->bindParam(2, $id, PDO::PARAM_INT);

if ($stmt->execute())
{
	header('Location: ../view/categorias.php');

}
else
{
	echo "Erro ao alterar";
	print_r($stmt->errorInfo());
}