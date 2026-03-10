<?php

$fio = $_POST['fio'] ?? '';

$errors = [];

if (empty($fio)) {
    $errors[] = "Поле ФИО пустое";
} elseif (strlen($fio) > 150) {
    $errors[] = "ФИО слишком длинное";
} elseif (!preg_match('/^[a-zA-Zа-яёА-ЯЁ ]+$/u', $fio)) {
    $errors[] = "В  ФИО можно только буквы и пробелы";
}

if (!empty($errors)) {
    echo "<h2>Произошли ошибки:</h2>";
    foreach ($errors as $errors) {
        echo "- $error<br>";
    }
} else {
    echo "<h2>Данные прошли проверку</h2>";
}

?>

