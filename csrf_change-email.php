<?php
session_start();

// Простая проверка наличия сессии (имитация авторизации)
if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = 'test_user';
}

$email = htmlspecialchars($_POST['email'] ?? '');

if ($email) {
    // В реальности здесь происходит сохранение email в БД
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
        <button type="submit">Сохранить</button>
    </form>
</body>
</html>