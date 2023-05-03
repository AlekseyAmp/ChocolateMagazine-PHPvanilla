<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <script src="../assets/js/formValid.js" defer></script>
    <title>Регистрация</title>
</head>

<body>
    <?php include('../includes/header.php') ?>
    <main>
        <section class="register">
            <div class="title">Регистрация</div>
            <div class="register-content">
                <form class="default-form" action="register.php" method="post">
                    <label for="name">Ваше имя:</label>
                    <input type="text" id="name" name="name">

                    <label for="number">Ваш номер телефона:</label>
                    <input type="text" id="number" name="number">
                    <span id="phone-field"></span>

                    <label for="password">Придумайте пароль:</label>
                    <input type="password" id="password" name="password">

                    <label for="password_repeat">Повторите пароль:</label>
                    <input type="password" id="password_repeat" name="password_repeat">
                    <span id="password-field"></span>

                    <div class="block-button">
                        <input type="submit" value="Зарегестрироваться" class="yellow-button">
                    </div>
                </form>
            </div>
            <div class="auth-help">
                <p class="white-text">Есть аккаунт?</p>
                <a href="../auth/login" class="link-text">Вход</a>
            </div>
        </section>
    </main>
</body>

</html>
<?php
session_start();

require_once '../db/connect.php';

$name = $_POST['name'];
$phone = $_POST['number'];
$password = $_POST['password'];
$password_repeat = $_POST['password_repeat'];

if (empty($name) || empty($phone) || empty($password) || empty($password_repeat)) {
    echo "<p class='white-text'>Заполните все поля</p>";
} elseif (!preg_match('/^\+7|8/', $phone) && $phone !== 'admin') {
    echo "<p class='white-text'>Номер телефона должен начинаться с +7 или 8</p>";
} elseif (preg_match('/^\+7/', $phone) && strlen($phone) !== 12 && $phone !== 'admin') {
    echo "<p class='white-text'>Номер телефона, начинающийся с +7, должен иметь 12 символов</p>";
} elseif (preg_match('/^8/', $phone) && strlen($phone) !== 11 && $phone !== 'admin') {
    echo "<p class='white-text'>Номер телефона, начинающийся с 8, должен иметь 11 символов</p>";
} elseif ($password !== $password_repeat) {
    echo "<p class='white-text'>Пароли не совпадают</p>";
} else {
    $query = "SELECT * FROM users WHERE phone='$phone'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "<p class='white-text'>Пользователь с таким номером уже существует</p>";
    } else {
        $query = "INSERT INTO users (name, phone, password)
                    VALUES ('$name', '$phone', '$password')";

        if (mysqli_query($conn, $query)) {
            if ($phone === "admin") {
                $_SESSION['is_admin'] = true;
                $user_id = mysqli_insert_id($conn);
                $query = "UPDATE users SET is_admin = true WHERE id = $user_id";
                mysqli_query($conn, $query);
            } else {
                $_SESSION['name'] = $name;
                $_SESSION['phone'] = $phone;
                $_SESSION['user_id'] = mysqli_insert_id($conn);
                $_SESSION['is_admin'] = false;
            }
            header('location: /');
        } else {
            echo "<p class='white-text'>Ошибка</p>";
        }
    }
}

mysqli_close($conn);
?>