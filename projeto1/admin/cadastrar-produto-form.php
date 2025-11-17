<?php
    echo "<h2>Cadastre um produto</h2>";

?>
<form method="post" action="produto-cadastro.php">
    <label>Nome do produto:</label>
    <input type="text" name="nomedoproduto"> <br>
    <label>Especificação:</label>
    <input type="text" name="especificacao"> <br>
    <label>Tamanho:</label>
    <input type="text" name="tamanho"> <br>
    <label>Preço:</label>
    <input type="text" name="preco"> <br>

    <input type="submit" value="Cadastrar">
</form>