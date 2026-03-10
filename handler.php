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

$phone = $_POST['phone'] ?? '';


if (empty($phone)) {
    $errors[] = "Поле 'Телефон' не может быть пустым.";
} elseif (!preg_match('/^\+?[0-9\-]+$/', $phone)) { // + в начале, цифры и -
    $errors[] = "Телефон введен некорректно.";
} elseif (strlen($phone) < 6 || strlen($phone) > 20) {
    $errors[] = "Телефон должен содержать от 6 до 20 символов.";
}

$agreement = isset($_POST['agreement']);

if (!$agreement) {
    $errors[] = "Необходимо согласиться с правилами.";
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

