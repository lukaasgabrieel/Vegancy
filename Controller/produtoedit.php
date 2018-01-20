<?php

require_once '../init.php';

// pega os dados do formuário
$id = isset($_POST['id']) ? $_POST['id'] : null;
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$pc = isset($_POST['pc']) ? $_POST['pc'] : null;
$pv = isset($_POST['pv']) ? $_POST['pv'] : null;
$qtd = isset($_POST['qtd']) ? $_POST['qtd'] : null;
$codigo = isset($_POST['codigo']) ? $_POST['codigo'] : null;
$minimo = isset($_POST['minimo']) ? $_POST['minimo'] : null;
$categoria = isset($_POST['categoria']) ? $_POST['categoria'] : null;

// atualiza o banco
$PDO = db_connect();
$sql = "UPDATE produtos SET nome = ?, preco_custo = ?, preco_venda = ?, quantidade = ?, codigo = ?, estoque_minimo = ?, categoria_id = ? WHERE id = ? ";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(1, $nome);
$stmt->bindParam(2, $pc);
$stmt->bindParam(3, $pv);
$stmt->bindParam(4, $qtd);
$stmt->bindParam(5, $codigo);
$stmt->bindParam(6, $minimo);
$stmt->bindParam(7, $categoria);
$stmt->bindParam(8, $id);

if ($stmt->execute())
{
	header('Location: ../view/produtos.php');

}
else
{
	echo "Erro ao alterar";
	print_r($stmt->errorInfo());
}