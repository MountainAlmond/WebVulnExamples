<?php
$ip = $_GET['ip'] ?? '';

if (!empty($ip)) {
    // Уязвимая строка: передача пользовательского ввода напрямую в shell_exec()
    $output = shell_exec("ping -c 4 " . $ip);
    echo "<pre>$output</pre>";
}
?>

<!DOCTYPE html>
<html>
<head><title>Ping Tool</title></head>
<body>
    <h2>Введите IP для проверки:</h2>
    <form method="get" action="command_enjection.php">
        <input type="text" name="ip" value="<?= htmlspecialchars($ip) ?>">
        <button type="submit">Пинговать</button>
    </form>
</body>
</html>
