<?php

$arquivo_json = "clientes.json";

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];

if(file_exists($arquivo_json)){
    $json = file_get_contents($arquivo_json);
    $clientes = json_decode($json, true);

    if($clientes === null || !is_array($clientes)){
        $clientes = [];
    }
}else{
    $clientes = [];
}

$novo_id = count($clientes) + 1;
$novo_cliente = [
    "id" => $novo_id,
    "nome" => $nome,
    "email" => $email,
    "telefone" => $telefone,
    "cidade" => $cidade,
    "estado" => $estado
];

$clientes[] = $novo_cliente;

$novo_cliente = json_encode($clientes, JSON_UNESCAPED_UNICODE,
     JSON_PRETTY_PRINT);

if(file_put_contents($arquivo_json, $novo_cliente)) {
    echo "<p>Cliente $nome cadastrado com sucesso.</p>";
    echo "<p><a href='clientes-lista.php'>Listar Clientes</p>";
}else{
    echo "<h2>Erro ao enviar o formulário.</h2>";
    echo "<p><a href='clientes-lista.php>Listar Clientes</p>";
}

?>
