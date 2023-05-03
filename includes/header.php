<?php session_start(); ?>
<header>
    <div class="header-up">
        <div class="container">
            <div class="logo">
                <a href="/"> LuftKuss <br> <span>Schokolade</span></a>
            </div>
            <nav class="header-menu">
                <ul>
                    <li>
                        <p class="white-text">Рабочее время: <br> 8:00 - 19:00</p>
                    </li>
                    <li>
                        <p class="white-text">Написать нам <br> luftkuss@gmail.com</p>
                    </li>
                    <li>
                        <p class="white-text">Позвонить нам <br> +7 (999)-999-99-99</p>
                    </li>
                </ul>
            </nav>
            <nav class="header-menu">
                <ul>
                    <?php
                    // проверяем, есть ли данные пользователя в сессии
                    if (empty($_SESSION['name'])) {
                        echo '<li><a class="link-text" href="../auth/login">Вход</a></li>
                        <li><a class="link-text" href="../auth/register">Регистрация</a></li>';
                    } elseif ($_SESSION['is_admin']) {
                        echo $_SESSION['is_admin'];
                        echo '<li><a class="yellow-text" href="orders">Заказы</a></li>
                        <li><a class="yellow-text" href="admin">Админ панель</a></li>
                        <li><img src="../assets/img/header/notification.svg" alt="#">
                        <a class="link-text" href="#">' . $_SESSION['name'] . '</a></li>
                        <li><img src="../assets/img/header/basket.svg" alt="#">
                        <a class="link-text" href="basket">Корзина</a></li>
                        <li><a class="link-text" href="auth/logout">Выход</a></li>';
                    } else {
                        echo '<li><img src="../assets/img/header/notification.svg" alt="#">
                      <a class="link-text" href="#">' . $_SESSION['name'] . '</a></li>
                      <li><img src="../assets/img/header/basket.svg" alt="#">
                      <a class="link-text" href="basket">Корзина</a></li>
                      <li><a class="link-text" href="auth/logout">Выход</a></li>';
                    }
                    ?>
                </ul>
            </nav>

        </div>
    </div>

    <div class="header-down">
        <div class="container">
            <nav class="header-menu">
                <ul>
                    <a class="dark-text" href="/about">О бренде</a>
                    <a class="dark-text" href="/products">Продукты</a>
                    <a class="dark-text" id="scroll-link" href="/">Доставка и оплата</a>
                </ul>
            </nav>
        </div>
    </div>
</header>