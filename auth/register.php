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
    echo "Заполните все поля";
} elseif ($password !== $password_repeat) {
    echo "Пароли не совпадают";
} else {
    $sql = "SELECT * FROM users WHERE phone='$phone'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "Пользователь с таким номером уже существует";
    } else {
        $sql = "INSERT INTO users (name, phone, password)
                    VALUES ('$name', '$phone', '$password')";

        if (mysqli_query($conn, $sql)) {
            if ($name === "admin") {
                $user_id = mysqli_insert_id($conn);
                $sql = "UPDATE users SET is_admin = true WHERE id = $user_id";
                mysqli_query($conn, $sql);
            }
            $_SESSION['name'] = $name;
            $_SESSION['phone'] = $phone;
            header('location: /');
        } else {
            echo "Ошибка: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);
?>