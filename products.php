<?php
session_start();
require_once './db/connect.php';

if (isset($_POST['add_to_basket'])) {
    $user_id = $_POST['user_id'];
    $product_id = $_POST['product_id'];

    $query = "SELECT * FROM basket WHERE user_id='$user_id' AND product_id='$product_id'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        header('location: products');
        exit();
    } else {
        $query = "INSERT INTO basket (user_id, product_id) VALUES ('$user_id', '$product_id')";
        if ($conn->query($query) === TRUE) {
            header('location: products');
            exit();
        } else {
            echo "Ошибка";
        }
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="assets/js/counter.js" defer></script>
    <title>Продукты</title>
</head>

<body>
    <?php include('includes/header.php') ?>
    <main>
        <section class="products container">
            <div class="title">Все продукты LuftKuss</div>
            <?php
            if (empty($_SESSION['name'])) {
                echo '<p class="gray-text">Чтобы добавить товар в корзину - нужно <a class="yellow-text" href="auth/login">авторизоваться!</a></p>';
            } else {
                echo "";
            }
            ?>
            <div class="products-content">
                <?php
                $query = "SELECT * FROM products";
                if ($result = $conn->query($query)) {
                    foreach ($result as $row) {
                        echo "<div class='products-card'>";
                        $img_src = 'data:image/jpeg;base64,' . base64_encode($row['photo']);
                        echo "<img src='" . $img_src . "' alt='#'>";
                        echo "<div class='products-card-title'>";
                        echo "<h3 class='bold-text'>" . $row['name'] . "</h3>";
                        echo "</div>";
                        echo "<div class='products-card-info'>";
                        echo "<div class='products-card-text'>";
                        echo "<p class='gray-text'>Вес: " . $row['weight'] . " г.</p>";
                        echo "<p class='white-text'>Цена: " . $row['price'] . " руб.</p>";
                        echo "</div>";
                        echo "<div class='block-button'>";
                        if (empty($_SESSION['name'])) {
                            echo "";
                        } else {
                            echo "<form action='products' method='post'>";
                            echo "<input type='hidden' name='user_id' value='" . $_SESSION['user_id'] . "'>";
                            echo "<input type='hidden' name='product_id' value='" . $row['id'] . "'>";
                            echo "<input type='submit' name='add_to_basket' value='Добавить в корзину' class='yellow-button'>";
                            echo "</form>";
                        }
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                    $result->free();
                } else {
                    echo "Ошибка";
                }
                ?>
            </div>

        </section>
    </main>
</body>

</html>
<?php mysqli_close($conn); ?>