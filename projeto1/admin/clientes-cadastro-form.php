<?php
    echo "<h2>Cadastro de Clientes</h2>";

?>
<form method="post" action="clientes-cadastro.php">
    <label>Nome:</label>
    <input type="text" name="nome"> <br>
    <label>E-mail:</label>
    <input type="text" name="email"> <br>
    <label>telefone:</label>
    <input type="text" name="telefone"> <br>
    <label>Cidade:</label>
    <input type="text" name="cidade"> <br>
    <label>Estado:</label>
    <input type="text" name="estado"> <br>

    <input type="submit" value="Cadastrar">
</form>