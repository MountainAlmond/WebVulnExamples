<?php
session_start();

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(50));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Ошибка CSRF: недопустимый токен.");
    }

    $email = htmlspecialchars($_POST['email'] ?? '');
    echo "<h2>Ваш email был изменён на: $email</h2>";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Изменить email</title>
</head>
<body>
    <h1>Добро пожаловать, <?= $_SESSION['user'] ?></h1>
    <form method="post" action="">
        <input type="email" name="email" placeholder="Новый email">
        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
        <button type="submit">Сохранить</button>
    </form>
</body>
</html>