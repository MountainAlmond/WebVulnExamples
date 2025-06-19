<?php
// Получаем параметр 'q' из URL, если он есть
$search = isset($_GET['q']) ? $_GET['q'] : '';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Поиск</title>
</head>
<body>
    <h1>Результаты поиска для: 
        <!-- нет экранирования, поле уязвимо к XSS -->
        <?= $search?>
    </h1>

    <form method="get" action="reflected_xss.php">
        <input type="text" name="q" value="<?= $search?>">
        <button type="submit">Искать</button>
    </form>
</body>
</html>
