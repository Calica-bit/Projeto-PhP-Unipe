<?php

$arquivo_json = "produtos.json";

$nomedoproduto = $_POST['nomedoproduto'];
$especificacao = $_POST['especificacao'];
$tamanho = $_POST['tamanho'];
$preco = $_POST['preco'];

if(file_exists($arquivo_json)){
    $json = file_get_contents($arquivo_json);
    $produtos = json_decode($json, true);

    if($produtos === null || !is_array($produtos)){
        $produtos = [];
    }
}else{
    $produtos = [];
}

$novo_id = count($produtos) + 1;
$novo_produto = [
    "id" => $novo_id,
    "nomedoproduto" => $nomedoproduto,
    "especificacao" => $especificacao,
    "tamanho" => $tamanho,
    "preco" => $preco
];

$produtos[] = $novo_produto;

$novo_produto = json_encode($produtos, JSON_UNESCAPED_UNICODE,
     JSON_PRETTY_PRINT);

if(file_put_contents($arquivo_json, $novo_produto)) {
    echo "<p>Produto $nomedoproduto cadastrado com sucesso.</p>";
    echo "<p><a href='produtos-lista.php'>Listar Produtos</p>";
}else{
    echo "<h2>Erro ao enviar o formulário.</h2>";
    echo "<p><a href='produtos-lista.php'>Listar Produtos</p>";
}

?>
