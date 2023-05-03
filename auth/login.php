<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <title>Вход</title>
</head>
<body>
<?php include('../includes/header.php') ?>
<main>
    <section class="login container">
        <div class="title">Вход</div>
        <div class="login-content">
            <form class="default-form" action="login.php" method="post">
                <label for="number">Номер телефона:</label>
                <input type="text" id="number" name="number">
                <span id="phone-field"></span>

                <label for="password">Пароль:</label>
                <input type="password" id="password" name="password">

                <div class="block-button">
                    <input type="submit" value="Войти" class="yellow-button">
                </div>
            </form>
        </div>
        <div class="auth-help">
            <p class="white-text">Ещё не зарегестрированы?</p>
            <a href="../auth/register" class="link-text">Регистрация</a>
        </div>
    </section>
</main>
</body>
</html>
<?php
session_start();

require_once '../db/connect.php';

$phone = $_POST['number'];
$password = $_POST['password'];

if (empty($phone) || empty($password)) {
    echo "<p class='white-text'>Заполните все поля</p>";
} else {
    $query = "SELECT * FROM users WHERE phone='$phone'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($password == $row['password']) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['phone'] = $phone;
            if ($phone === 'admin') {
                $_SESSION['is_admin'] = true;
            } else {
                $_SESSION['is_admin'] = false;
            }
            header('location: /');
        } 
        else {
            echo "<p class='white-text'>Неверный пароль</p>";
        }
    } else {
        echo "<p class='white-text'>Пользователь с таким номером телефона не найден</p>";
    }
}

mysqli_close($conn);
?>