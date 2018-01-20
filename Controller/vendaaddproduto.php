<?php

require_once '../init.php';

// pega os dados do formuário
$id = isset($_POST['id']) ? $_POST['id'] : null;
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$qtd = isset($_POST['qtd']) ? $_POST['qtd'] : null;
// atualiza o banco

$PDO = db_connect();
// seleciona os registros

$s1ql = 'SELECT * FROM produtos where id = '.$nome.'';
$s1tmt = $PDO->prepare($s1ql);
$s1tmt->execute();
$r1esult = $s1tmt-> fetchAll(PDO::FETCH_ASSOC);

foreach ($r1esult as $row) {
}

if ($qtd <= $row['quantidade']) {

	$totale = $row['quantidade'] - $qtd;
	$s2ql = "UPDATE produtos SET quantidade = ".$totale." WHERE id = ".$nome.";";
	$s2tmt = $PDO->prepare($s2ql);
	$s2tmt->execute();


	$sql = "INSERT INTO produtos_has_venda(produtos_id, venda_id, quantidade) VALUES (?, ?, ?);";
	$stmt = $PDO->prepare($sql);
	$stmt->bindParam(1, $nome);
	$stmt->bindParam(2, $id);
	$stmt->bindParam(3, $qtd);

	if ($stmt->execute())
	{
		header('Location: ../view/venda.php');

	}else
	{
		echo "Erro ao alterar";
		print_r($stmt->errorInfo());
	}



}	else{


	print "<script> alert('Estoque Indisponivel!.'); window.history.go(-1);

</SCRIPT>\n";

}

