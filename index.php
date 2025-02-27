<?php
session_start();
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['captcha']) && $_POST['captcha'] === $_SESSION['captcha']) {
        $message = 'Правильно';
    } 
    else {
        $message = 'Неправильно';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Регистрация</h1>
    <img src="captcha.php" alt="CAPTCHA">
    <form method="post">
        <label>Введите строку <input type="text" name="captcha"></label>
        <button type="submit">OK</button>
    </form>
    <p><?= htmlspecialchars($message) ?></p>
</body>
</html>