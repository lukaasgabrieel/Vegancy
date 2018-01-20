<?php

require_once '../init.php';

// resgata os valores do formulário
$name = isset($_POST['nome']) ? $_POST['nome'] : null;
$sigla = isset($_POST['Estado_id']) ? $_POST['Estado_id'] : null;
$id = isset($_POST['id']) ? $_POST['id'] : null;

echo $name;

echo $sigla;
echo $id;

// atualiza o banco
$PDO = db_connect();
$sql = "UPDATE cidade SET nome = ?, Estado_id = ? WHERE id = ?";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(1, $name);
$stmt->bindParam(2, $sigla);
$stmt->bindParam(3, $id, PDO::PARAM_INT);

if ($stmt->execute())
{
	header('Location: ../view/cidade.php');

}
else
{
	echo "Erro ao alterar";
	print_r($stmt->errorInfo());
}