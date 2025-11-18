<?php
$arquivo = 'horarios.json';
$horarios = json_decode(file_get_contents($arquivo), true);

if(isset($_GET['hora'])){
    $hora = $_GET['hora'];
    if(isset($horarios[$hora]) && $horarios[$hora] == 'disponivel'){
        $horarios[$hora] = 'indisponivel';
        file_put_contents($arquivo, json_encode($horarios, JSON_PRETTY_PRINT));
        $mensagem = "Horário $hora reservado com sucesso!";
    } else {
        $mensagem = "Este horário já não está disponível!";
    }
} else {
    $mensagem = "Nenhum horário selecionado!";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva Confirmada</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="agenda.css">
</head>
<body>
<header>
    <h1>Reserva de Horário</h1>
    <nav>
        <a href="horarios.php">Voltar</a>
    </nav>
</header>

<section class="agendar-container">
    <h2 class="sec-title">Status da Reserva</h2>
    <p class="text-center" style="font-size: 20px; color: #d4a056;"><?= $mensagem ?></p>
    <a href="horarios.php" class="btn-agendar">Voltar aos Horários</a>
</section>

</body>
</html>
