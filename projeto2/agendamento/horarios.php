<?php
$arquivo = 'horarios.json';
$horarios = json_decode(file_get_contents($arquivo), true);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Horário</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="agenda.css">
</head>
<body>
<header>
    <h1>Agendar Horário</h1>
    <nav>
        <a href="../index.html">Voltar</a>
    </nav>
</header>

<section class="agendar-container">
    <h2 class="sec-title">Escolha um horário disponível</h2>
    <div class="horarios-grid">
        <?php foreach($horarios as $hora => $status): ?>
            <?php if($status == 'disponivel'): ?>
                <a href="reservar.php?hora=<?= $hora ?>" class="btn-horario"><?= $hora ?></a>
            <?php else: ?>
                <div class="btn-indisponivel"><?= $hora ?></div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</section>

</body>
</html>
