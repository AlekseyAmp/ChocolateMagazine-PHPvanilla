<?php session_start(); ?>
<header>
    <div class="header-up">
        <div class="container">
            <div class="logo">
                <a href="/"> LuftKuss <br> <span>Schokolade</span></a>
            </div>
            <form method="POST">
                <input type="text" placeholder="Найти шоколадку">
            </form>
            <nav class="header-menu">
                <ul>
                    <li>
                        <p class="white-text">Связаться с нами <br> +7 (999)-999-99-99</p>
                    </li>
                    <?php
                    // проверяем, есть ли данные пользователя в сессии
                    if (empty($_SESSION['number']) && empty($_SESSION['name'])) {
                        echo '<li><a class="link-text" href="../auth/login">Вход</a></li>
                        <li><a class="link-text" href="../auth/register">Регистрация</a></li>';
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
                    <a class="dark-text" href="/stock">Акции</a>
                    <a class="dark-text" id="scroll-link" href="/">Доставка и оплата</a>
                </ul>
            </nav>
        </div>
    </div>
</header>