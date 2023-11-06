<?php
$dataFile = 'napr.txt';

$data = file($dataFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

sort($data);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selectedValue = $_POST['inputs_value'];
    
    header("Location: lab4page2.php?selectedValue=" . $selectedValue);
    exit;
}

echo '<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="index.css">
    <title>Таблиця з даними</title>
</head>
<body>
    <h1>Напрямки навчання</h1>
    <form method="post">
    <fieldset>
    <legend>Виберіть напрямок:</legend>';

    foreach ($data as $line) {
        echo '<div class = "radio-container">';
        echo '<input type="radio" name="inputs_value" value="' . htmlspecialchars($line) . '">';
        echo '<label for =  "'. htmlspecialchars($line) . '">'.htmlspecialchars($line).'</label> ';
        echo '</div>';
    }
    echo '<button class = "submit" type="">Відправити запит</button>';
    echo '</fieldset></form>';


'</body>
</html>';
?>
