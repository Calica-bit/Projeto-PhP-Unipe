<?php

    $arquivo_json = "produtos.json";

    $produtos = json_decode(file_get_contents($arquivo_json), true);

    echo "<h1>Lista de produtos</h1>";

    echo"<a href='cadastrar-produto-form.php'>Cadastre um novo Produto</a>";
?>
<h2>Lista de produtos</h2>
<ul>
    <?php foreach ($produtos as $produto): ?>
        <li>
            Produto: <?= $produto['nomedoproduto'] ?> <br>
            Especificação: <?= $produto['especificacao'] ?> <br>
            Tamanho: <?= $produto['tamanho'] ?> <br>
            Preço: <?= $produto['preco'] ?> <br>
        </li>
    <?php endforeach; ?>
</ul>
