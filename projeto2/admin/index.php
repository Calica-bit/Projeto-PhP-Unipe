<?php
session_start();

$login_correto = "barbeariaunipe";
$senha_correta = "2025";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if ($login === $login_correto && $senha === $senha_correta) {
        $_SESSION['admin'] = true;
        header("Location: painel.php");
        exit;
    } else {
        $erro = "Login ou senha incorretos!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Login Admin</title>
</head>
<body>
    <div class="login-box">
        <h2>Área Admin</h2>
        <?php if (!empty($erro)) echo "<p class='erro'>$erro</p>"; ?>
        <form method="POST">
            <input type="text" name="login" placeholder="Login" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>
