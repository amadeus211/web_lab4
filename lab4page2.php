<?php

$dataFile = 'data.txt';

$data = file($dataFile);

$found = false;

$input_data = trim($_GET['selectedValue']);

$j = 0;

echo '<!DOCTYPE html>
<html>
<head>
    <title>Таблиця з даними</title>
    <link href = "index.css" rel="stylesheet"></link>
    <style>
        h1{
            text-transform: uppercase;        }
    </style>
</head>
<body>
    <h1> ' . htmlspecialchars(urldecode($input_data)) . '</h1>
    <table class="data-table">
    <tr>
            <th>№</th>
            <th>Середній бал вступників на бюджет</th>
            <th>Кількість вступників на бюджет</th>
            <th>Недобор</th>
            <th>Кількість контрактників</th>
            <th>Навчальний заклад</th>

        </tr>';


for ($i = 0; $i < count($data); ++$i) {
    if (trim($data[$i]) === $input_data) {
        $found = true;

    } elseif ($found) {
        while (empty(trim($data[$i + 1])) != true) {
            $avg = $data[$i + 1];
            $count_of_students = $data[$i + 2];
            $lack_of_students = " - ";
            $contract_students = $data[$i + 3];
            $university = $data[$i + 4];

            echo '<tr>';
            echo '<td>' . htmlspecialchars($j) . '</td>';
            echo '<td>' . htmlspecialchars($avg) . '</td>';
            echo '<td>' . htmlspecialchars($count_of_students) . '</td>';
            echo '<td>' . htmlspecialchars($lack_of_students) . '</td>';
            echo '<td>' . htmlspecialchars($contract_students) . '</td>';
            echo '<td>' . htmlspecialchars($university) . '</td>';
            $i = $i + 4;
            $j++;
            echo '</tr>';

        }
        $found = false;

    }
}


'</table>
</body>
</html>';
