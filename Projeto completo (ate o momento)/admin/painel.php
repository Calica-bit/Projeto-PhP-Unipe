<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
    exit;
}

$jsonPath = "../agendamento/horarios.json";
$horarios = json_decode(file_get_contents($jsonPath), true);

if (isset($_POST['dia']) && isset($_POST['hora'])) {
    $dia = $_POST['dia'];
    $hora = $_POST['hora'];
    
    $statusAtual = $horarios[$dia][$hora];

    // alterna entre disponível ↔ indisponível
    if ($statusAtual === "disponivel") {
        $horarios[$dia][$hora] = "indisponivel";
    } else {
        $horarios[$dia][$hora] = "disponivel";
    }

    file_put_contents($jsonPath, json_encode($horarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    header("Location: painel.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="admin.css">
    <title>Painel Admin</title>
</head>
<body>
    <h1>Painel de Administração</h1>
    <a href="logout.php" class="logout">Sair</a>

    <div class="container">
        <?php foreach ($horarios as $dia => $listaHoras): ?>
            <div class="dia-card">
                <h2><?= ucfirst($dia) ?></h2>

                <?php foreach ($listaHoras as $hora => $status): ?>
                    <form method="POST" class="hora-form">
                        <input type="hidden" name="dia" value="<?= $dia ?>">
                        <input type="hidden" name="hora" value="<?= $hora ?>">

                        <button type="submit"
                            class="botao <?= $status === 'disponivel' ? 'verde' : 'vermelho' ?>">
                            <?= $hora ?> - <?= $status ?>
                        </button>
                    </form>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
