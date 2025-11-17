<?php

    $arquivo_json = "clientes.json";

    $clientes = json_decode(file_get_contents($arquivo_json), true);

    echo "<h1>Lista de clientes</h1>";

    echo"<a href='clientes-cadastro-form.php'>Cadastrar Cliente</a>";
?>
<h2>Lista de Alunos</h2>
<ul>
    <?php foreach ($clientes as $cliente): ?>
        <li>
            Nome: <?= $cliente['nome'] ?> <br>
            E-mail: <?= $cliente['email'] ?> <br>
            Telefone: <?= $cliente['telefone'] ?> <br>
            Cidade: <?= $cliente['cidade'] ?> <br>
            Estado: <?= $cliente['estado'] ?> <br>
        </li>
    <?php endforeach; ?>
</ul>
