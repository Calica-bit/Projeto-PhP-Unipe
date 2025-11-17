<?php
    echo "<h2>Fale conosco</h2>";
    echo "<p>Entre em contato diretamente conosco</p>";
    echo "<p> 83 99600-5989"
?>
<form action="?pg=envia-form" method="post">
    <label>Nome:</label>
    <input type="text" name="nome"> <br>
    <label>E-mail:</label>
    <input type="text" name="email"><br>
    <label>Telefone:</label>
    <input type="text" name="telefone"><br>
    <label>Mensagem</label>
    <textarea name="mensagem"></textarea> <br>
    <input type="submit" value="Enviar">
</form>