<?php
// xxe.php

$xml = $_POST['xml'] ?? '';

if (!empty($xml)) {
    // Уязвимое место: не отключена обработка внешних сущностей
    $doc = new DOMDocument();
    $doc->loadXML($xml, LIBXML_NOENT); // LIBXML_NOENT включает обработку &xxe;
    
    echo "<h3>Результат:</h3>";
    echo "<pre>" . htmlspecialchars($doc->textContent) . "</pre>";
}
?>

<!DOCTYPE html>
<html>
<head><title>XXE Demo</title></head>
<body>
    <h2>Отправьте XML:</h2>
    <form method="post">
        <textarea name="xml" rows="10" cols="50" placeholder="Введите XML..."></textarea>
        <br>
        <button type="submit">Отправить</button>
    </form>
</body>
</html>