<?php
// --- Carrega o arquivo JSON ---
$arquivo = 'horarios.json';
$horarios = json_decode(file_get_contents($arquivo), true);

// Recebe o dia e hora enviados pela URL
$dia = $_GET['dia'] ?? null;
$hora = $_GET['hora'] ?? null;

// Verifica se dia e hora existem
if (!$dia || !$hora || !isset($horarios[$dia][$hora])) {
    die("Horário inválido!");
}

// Se já estiver ocupado, apenas avisa
if ($horarios[$dia][$hora] === "ocupado") {
    $mensagem = "Este horário já foi reservado.";
} else {
    // Marca como ocupado e salva
    $horarios[$dia][$hora] = "ocupado";
    file_put_contents($arquivo, json_encode($horarios, JSON_PRETTY_PRINT));
    $mensagem = "Para confirmar entre em contato conosco :</br></br> (83) 94002-8922";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva Confirmada</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 60px;
            background: #111;
            color: #fff;
        }

        .box {
            background: #1c1c1c;
            border-radius: 12px;
            padding: 35px;
            display: inline-block;
            box-shadow: 0 0 25px rgba(255, 215, 0, 0.25);
        }

        h1 {
            margin-bottom: 20px;
            color: #f8d000;
        }

        .info {
            font-size: 20px;
            margin-bottom: 30px;
        }

        a {
            display: inline-block;
            background: #f8d000;
            color: #000;
            padding: 12px 22px;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            text-decoration: none;
            transition: 0.3s;
        }

        a:hover {
            background: #ffe766;
        }
    </style>
</head>

<body>

    <div class="box">
        <h1><?= $mensagem ?></h1>

        <p class="info">
            <strong>Dia:</strong> <?= ucfirst($dia) ?><br>
            <strong>Horário:</strong> <?= $hora ?>
        </p>

        <a href="horarios.php">Voltar aos horários</a>
    </div>

</body>
</html>

