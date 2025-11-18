<?php
// Carrega todos os horários do JSON organizados por dia
$arquivo = 'horarios.json';
$dados = json_decode(file_get_contents($arquivo), true);

// Dias da semana disponíveis no sistema
$dias_semana = ["terca", "quarta", "quinta", "sexta", "sabado"];

// Dia selecionado na URL ou padrão: terça
$dia_ativo = $_GET['dia'] ?? "terca";

// Se o dia não existir, volta para terça
if (!in_array($dia_ativo, $dias_semana)) {
    $dia_ativo = "terca";
}

// Horários do dia selecionado
$horarios = $dados[$dia_ativo];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Horário • Barbearia Unipê</title>

    <link rel="stylesheet" href="agenda.css">
</head>
<body>

<header class="header">
    <h1 class="page-title">Agendar Horário</h1>
    <nav>
        <a href="../index.html" class="nav-link">Voltar</a>
    </nav>
</header>

<main class="agendar-container">

    <h2 class="sec-title">Escolha um dia</h2>

    <!-- ======================== ABAS DOS DIAS ======================== -->
    <div class="tabs-dias">
        <?php foreach ($dias_semana as $dia): ?>
            <a 
                href="horarios.php?dia=<?= $dia ?>" 
                class="tab-dia <?= $dia === $dia_ativo ? 'tab-ativa' : '' ?>"
            >
                <?= ucfirst($dia) ?>
            </a>
        <?php endforeach; ?>
    </div>

    <h2 class="sec-title">Horários de <?= ucfirst($dia_ativo) ?></h2>

    <!-- ======================== GRID DE HORÁRIOS ======================== -->
    <div class="horarios-grid">
        <?php foreach ($horarios as $hora => $status): ?>
            <?php if ($status == "disponivel"): ?>
                <a href="reservar.php?dia=<?= $dia_ativo ?>&hora=<?= $hora ?>" 
                   class="btn-horario"><?= $hora ?></a>
            <?php else: ?>
                <div class="btn-indisponivel"><?= $hora ?></div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>

</main>

<footer class="footer">
    <p>© 2025 Barbearia Unipê — Todos os direitos reservados.</p>
</footer>

</body>
</html>
