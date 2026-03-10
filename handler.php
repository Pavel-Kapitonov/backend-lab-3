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

$email = $_POST['email'] ?? '';

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Почта введена неправильно";
}

$gender = $_POST['gender'] ?? ''; 

if (empty($gender)) {
    $errors[] = "Поле 'Пол' не может быть пустым.";
} elseif (!in_array($gender, ['M', 'F'])) { 
    $errors[] = "Выбран недопустимый пол.";
}

$languages = $_POST['languages'] ?? [];

if (empty($languages)) {
    $errors[] = "Необходимо выбрать хотя бы один язык программирования.";
}

if (!empty($errors)) {
    echo "<h2>Произошли ошибки:</h2>";
    foreach ($errors as $error) {
        echo "- $error<br>";
    }
} else {
    echo "<h2>Данные прошли проверку</h2>";
}


?>
