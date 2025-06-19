<?php
$ip = $_GET['ip'] ?? '';
$output = '';

if (!empty($ip)) {
    if (filter_var($ip, FILTER_VALIDATE_IP)) {
        $output = shell_exec("ping -c 4 " . escapeshellarg($ip));
    } else {
        $output = "Ошибка: Неверный формат IP-адреса.";
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Ping Tool</title></head>
<body>
    <h2>Введите IP для проверки:</h2>
    <form method="get" action="fix_command_enjection.php">
        <input type="text" name="ip" value="<?= htmlspecialchars($ip) ?>">
        <button type="submit">Пинговать</button>
    </form>

    <?php if (!empty($output)): ?>
        <h3>Результат:</h3>
        <pre><?= htmlspecialchars($output) ?></pre>
    <?php endif; ?>
</body>
</html>