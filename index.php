<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="assets/js/switchLight.js" defer></script>
    <script src="assets/js/formValid.js" defer></script>
    <script src="assets/js/scroll.js" defer></script>
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Главная</title>
</head>

<body>
    <?php include('includes/header.php') ?>

    <main>
        <section class="production" style="background: linear-gradient(0deg, rgb(0,0,0) 0%, rgba(0,0,0,0.5) 53%, rgba(0,0,0,0) 100%), url('/assets/img/production/production.jpg'); background-repeat: no-repeat; background-size: cover">
            <div class="container">
                <div class="title">
                    LuftKuss <span>Schokolade</span>
                </div>
                <p class="white-text" id="text1">Ручная работа</p>
                <p class="white-text" id="text2">Только качественный шоколад</p>
                <div class="block-button">
                    <button class="black-button" id="catalog-button">
                        Перейти в каталог
                    </button>
                    <script>
                        document.getElementById("catalog-button").addEventListener("click", function() {
                            window.location.href = "products";
                        });
                    </script>
                </div>
            </div>
        </section>

        <section class="recommend container">
            <div class="title">
                Рекомендуемые шоколадки
            </div>
            <div class="recommend-content">
                <?php
                require_once './db/connect.php';
                $query = "SELECT * FROM products WHERE is_recommend = 1";
                if ($result = $conn->query($query)) {
                    foreach ($result as $row) {
                        echo "<div class='recommend-elem'>";

                        $img_src = 'data:image/jpeg;base64,' . base64_encode($row['photo']);
                        echo "<img src='" . $img_src . "' alt='#'>";

                        echo "<div class='recommend-elem-title'>";
                        echo "<h3 class='bold-text'>" . $row['name'] . "</h3>";
                        echo "<p class='white-text'>Цена: " . $row['price'] . " руб.</p>";
                        echo "</div>";

                        echo "<div class='recommend-elem-description'>";
                        echo "<p class='small-text'> " . $row['description'] . " </p>";
                        echo "</div>";

                        echo "<div class='block-button'>";
                        echo "<a href='/products' class='yellow-button'>Посмотреть</a>";
                        echo "</div>";

                        echo "</div>";
                    }
                }
                ?>
            </div>
        </section>

        <section class="news container">
            <div class="news-content">
                <div class="news-img">
                    <div class="title">
                        Скоро в продаже!
                    </div>
                    <img src="./assets/img/news/strawberry-chocolate.jpg" alt="">
                </div>
                <div class="news-text">
                    <h3 class="bold-text">
                        Белый шоколад с клубникой
                    </h3>
                    <p class="gray-text">
                        Белый шоколад с клубникой -
                        нежный и ароматный десерт, <br>
                        который точно понравится любителям
                        сладостей. <br>
                        Наслаждайтесь богатым и кремовым вкусом белого шоколада, <br>
                        дополненным свежей и сочной клубникой,
                        которая придаст десерту <br> неповторимую сладость
                        и легкую кислинку. <br> Этот десерт идеально подойдет
                        для романтического ужина <br> или спокойного вечера
                        в кругу семьи и друзей.
                    </p>
                    <p class="small-text">
                        У вас есть бесплатная возможность попробовать новинку!
                        <br> После нажатия на кнопку, мы доставим Вам плитку в течение 3 дней.
                    </p>
                    <form method="POST" action="index.php">
                        <input type="submit" class="yellow-button" value="Получить на пробу">
                    </form>
                </div>
            </div>
        </section>

        <section class="about container">
            <div class="about-content">
                <div class="about-text">
                    <div class="title">
                        Как делается LuftKuss?
                    </div>
                    <p class="gray-text">
                        Шоколад, созданный вручную, - <br>
                        это тщательно отобранные ингредиенты и <br>
                        заботливо продуманная технология производства.
                    </p>
                    <p class="gray-text">
                        Для начала процесса изготовления шоколада ручной <br>
                        работы смешиваются различные сорта какао-бобов. <br>
                        Затем, бобы подвергаются тщательной обработке, <br>
                        включающей их очистку от оболочек, жарку <br>
                        и измельчение до состояния какао-массы. <br>
                        Далее к массе добавляются натуральные ингредиенты, <br>
                        такие как сахар и молоко, и происходит <br>
                        перемешивание до получения однородной массы. <br>
                        <br>
                        После этого, масса разливается в формы, <br>
                        где происходит затвердение в течение нескольких часов. <br>
                        После затвердевания, шоколад снимают из форм <br>
                        и происходит процесс тщательной отделки: <br>
                        с помощью специальных инструментов удаляются <br>
                        все неровности и несовершенства, <br>
                        чтобы получить гладкий и блестящий шоколадный блок. <br>
                    </p>
                </div>
                <div class="about-img">
                    <img src="./assets/img/about/handmake.jpg" alt="#">
                </div>

            </div>
        </section>

        <section class="order container">
            <div class="title">
                Закажите шоколад LuftKuss
            </div>
            <div class="order-content">
                <div class="order-text">
                    <p class="gray-text">
                        Для того, чтобы мы приняли Ваш заказ, <br>
                        нужно заполнить форму.
                        <br>
                        Доставка работает по всей России в течение 3-ёх дней
                    </p>
                    <p class="white-text">
                        Пункты выдачи, с которыми мы работаем: <br>
                        <span class="bold-text">
                            Boxberry, СДЭК, Почта Росиии
                        </span>
                    </p>
                    <p class="white-text">
                        Если хотите сохранять товар в корзине, <br>
                        Вам нужно зарегестрироваться
                    </p>
                    <div class="block-button">
                        <a href="../auth/register" class="yellow-button">Зарегестрироваться</a>
                    </div>
                </div>
                <form class="default-form" action="index.php" method="post">
                    <label for="chocolate">Выберите товар</label>
                    <select name="chocolate" id="chocolate">
                        <option value="Молочный">Молочный</option>
                        <option value="Молочный">Очень молочный</option>
                        <option value="Молочный">Белый</option>
                    </select>

                    <label for="name">Ваше имя:</label>
                    <input type="text" id="name">

                    <label for="number">Ваш номер телефона:</label>
                    <input type="text" id="number">
                    <span id="phone-field"></span>

                    <label for="mail-index">Почтовый индекс:</label>
                    <input type="number" id="mail-index">

                    <div class="block-button">
                        <input type="submit" value="Заказать" class="yellow-button">
                    </div>
                </form>

            </div>
        </section>
    </main>
</body>

</html>