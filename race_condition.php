<?php
session_start();

// Инициализация баланса и флага
if (!isset($_SESSION['balance'])) {
    $_SESSION['balance'] = 100;
}
if (!isset($_SESSION['used'])) {
    $_SESSION['used'] = false;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$used) {
    // Гонка: проверка -> обработка -> изменение флага
    if (!$_SESSION['used']) {
        // Симуляция задержки (усиливает гонку)
        usleep(10000000); // 0.1 секунды

        // Добавляем бонус
        $_SESSION['balance'] += 100;

        // Меняем флаг
        $_SESSION['used'] = true;
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Race Condition Demo</title></head>
<body>
    <h2>Ваш баланс: <?= htmlspecialchars($_SESSION['balance']) ?></h2>
    <form method="post">
        <button type="submit">Получить +100</button>
    </form>
</body>
</html>