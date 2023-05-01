<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="assets/js/counter.js" defer></script>
    <script src="assets/js/basketPrice.js" defer></script>
    <title>Корзина</title>
</head>
<body>
<?php include('includes/header.php') ?>
<main>
    <section class="basket container">
        <div class="basket-total">
            <form action="index.php">
                <p class="bold-text">
                    Итого: <span class="yellow-text total-price">0 руб.</span>
                </p>
                <div class="block-button">
                    <input type="submit" value="Оплатить" class="yellow-button">
                </div>
            </form>
        </div>
        <div class="title">
            Корзина
        </div>
        <div class="basket-content">
            <div class="basket-card">
                <img src="./assets/img/products/milkChocolate.jpg" alt="#">
                <div class="basket-info">
                    <div class="basket-title">
                        <p class="bold-text">
                            Молочный шоколад
                        </p>
                        <p class="gray-text">Вес: 150г.</p>
                    </div>
                    <div class="counter">
                        <button class="decrement">
                            <strong>-</strong>
                        </button>
                        <span class="count bold-text">1</span>
                        <button class="increment">
                            <strong>+</strong>
                        </button>
                    </div>
                    <div class="basket-price">
                        <p class="white-text">Цена: 300 руб.</p>
                    </div>
                </div>
            </div>

            <div class="basket-card">
                <img src="./assets/img/products/milkChocolate.jpg" alt="#">
                <div class="basket-info">
                    <div class="basket-title">
                        <p class="bold-text">
                            Молочный шоколад
                        </p>
                        <p class="gray-text">Вес: 150г.</p>
                    </div>
                    <div class="counter">
                        <button class="decrement">
                            <strong>-</strong>
                        </button>
                        <span class="count bold-text">1</span>
                        <button class="increment">
                            <strong>+</strong>
                        </button>
                    </div>
                    <div class="basket-price">
                        <p class="white-text">Цена: 300 руб.</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

</main>
</body>
</html>