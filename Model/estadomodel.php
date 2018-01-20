<?php 

require_once 'Controller/estadocontroller.php';
require_once 'View/estado.php'

// pega os dados do formuário
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$sigla = isset($_POST['sigla']) ? $_POST['sigla'] : null;

 
 
// validação (bem simples, só pra evitar dados vazios)
if (empty($nome) || empty($sigla) 
{
    echo "Volte e preencha todos os campos";
    exit;
}