<?php
require_once '../init.php';
// pega os dados do formuário
$Nome = isset($_POST['Nome']) ? $_POST['Nome'] : null;
$idade = isset($_POST['selectidade']) ? $_POST['selectidade'] : null;
$mesa = isset($_POST['selectmesa']) ? $_POST['selectmesa'] : null;

// validação (bem simples, só pra evitar dados vazios)
if (empty($Nome) || empty($idade) || empty($mesa))
{
    echo "Volte e preencha todos os campos";
    exit;
}
// insere no banco
$PDO = db_connect();
$sql = "INSERT INTO tarefas(NomeTarefa, mesa, idade) VALUES(:Nome, :mesa, :idade)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':Nome', $Nome);
$stmt->bindParam(':mesa', $mesa);
$stmt->bindParam(':idade', $idade);

if ($stmt->execute())
{
    header('Location: msgSucesso.html');
}
else
{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}
?>