<?php 


require_once '../init.php';
require_once 'header.php';


// abre a conexão
$PDO = db_connect();

// SQL para selecionar os registros
$sql = 'SELECT * FROM categoria ORDER BY id DESC';

// seleciona os registros
$stmt = $PDO->prepare($sql);
$stmt->execute();


while ($user = $stmt->fetch(PDO::FETCH_ASSOC)):
	echo $user['id'] ;
echo $user['nome'];




?>