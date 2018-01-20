<?php

require_once '../init.php';

// pega os dados do formuário
$id = isset($_POST['id']) ? $_POST['id'] : null;
$name = isset($_POST['nome']) ? $_POST['nome'] : null;
$nascimnento = isset($_POST['Nascimnento']) ? $_POST['Nascimnento'] : null;
$sexo = isset($_POST['Sexo']) ? $_POST['Sexo'] : null;
$telefone = isset($_POST['telefone']) ? $_POST['telefone'] : null;
$celular = isset($_POST['celular']) ? $_POST['celular'] : null;
$endereco = isset($_POST['endereco']) ? $_POST['endereco'] : null;
$bairro = isset($_POST['bairro']) ? $_POST['bairro'] : null;
$Cidade_id = isset($_POST['Cidade_id']) ? $_POST['Cidade_id'] : null;
$rg = isset($_POST['rg']) ? $_POST['rg'] : null;
$cpf = isset($_POST['cpf']) ? $_POST['cpf'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;


// atualiza o banco
$PDO = db_connect();
$sql = "UPDATE cliente SET name = ?, data_nascimento = ?, sexo = ?, telefone = ?, celular = ?, endereco = ?, bairro = ?, Cidade_id = ?, email = ?, rg = ?, cpf = ? WHERE id = ?";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(1, $name);
$stmt->bindParam(2, $nascimnento);
$stmt->bindParam(3, $sexo);
$stmt->bindParam(4, $telefone);
$stmt->bindParam(5, $celular);
$stmt->bindParam(6, $endereco);
$stmt->bindParam(7, $bairro);
$stmt->bindParam(8, $Cidade_id);
$stmt->bindParam(9, $email);
$stmt->bindParam(10, $rg);
$stmt->bindParam(11, $cpf);
$stmt->bindParam(12, $id, PDO::PARAM_INT);

if ($stmt->execute())
{
	header('Location: ../view/cliente.php');

}
else
{
	echo "Erro ao alterar";
	print_r($stmt->errorInfo());
}