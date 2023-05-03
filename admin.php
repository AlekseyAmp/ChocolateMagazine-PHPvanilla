<?php
session_start();
if ($_SESSION['is_admin'] === false || empty($_SESSION['name'])) {
    header('location: /');
}

require_once './db/connect.php';

if (isset($_POST['add_product'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $photo = $_FILES['photo']['tmp_name'];
    $price = $_POST['price'];
    $weight = $_POST['weight'];
    $is_recommend = $_POST['is_recommend'];

    $photo_data = file_get_contents($photo);
    $photo_data = mysqli_real_escape_string($conn, $photo_data);

    $query = "INSERT INTO products (name, description, photo, price, weight, is_recommend) VALUES ('$name', '$description', '$photo_data', $price, $weight, $is_recommend)";
    mysqli_query($conn, $query);

    header('location: /admin');
    exit();
}

elseif (isset($_POST['delete_product'])) {
    $id = $_POST['id'];

    $query = "DELETE FROM products WHERE id='$id'";
    if ($conn->query($query) === TRUE) {
        header('location: admin');
        exit();
    } else {
        echo "<p class='white-text'>Ошибка</p>";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <title>Админ панель</title>
</head>

<body>
    <?php include('includes/header.php') ?>
    <main>
        <section class="add-product container">
            <div class="title">Добавить товар</div>
            <div class="add-product-content">
                <form class="default-form" method="post" enctype="multipart/form-data">
                    <label for="name">Название:</label>
                    <input type="text" name="name">

                    <label for="description">Описание:</label>
                    <textarea name="description"></textarea>

                    <label for="photo">Фото:</label>
                    <input type="file" name="photo" accept="image/*">

                    <label for="price">Цена:</label>
                    <input type="number" name="price">

                    <label for="weight">Вес:</label>
                    <input type="number" name="weight">

                    <label for="is_recommend">Рекомендованный? 0 - нет, 1 - да</label>
                    <input type="number" name="is_recommend">

                    <div class="block-button">
                        <input type="submit" name="add_product" class="yellow-button" value="Добавить товар">
                    </div>
                </form>
            </div>
        </section>

        <div class="line"></div>

        <section class="edit-product container">
        <div class="title">Удалить товар</div>
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
                        echo "<p class='gray-text'>Описание: " . $row['description'] . ".</p>";
                        echo "</div>";
                        echo "<div class='products-card-info'>";
                        echo "<div class='products-card-text'>";
                        echo "<p class='gray-text'>Вес: " . $row['weight'] . " г.</p>";
                        echo "<p class='white-text'>Цена: " . $row['price'] . " руб.</p>";
                        echo "<p class='white-text'>Рекомендованный? " . $row['is_recommend'] . ".</p>";
                        echo "</div>";
                        echo "<div class='block-button'>";
                        echo "<form action='admin' method='post'>";
                        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                        echo "<input type='submit' name='delete_product' value='Удалить' class='yellow-button'>";
                        echo "</form>";
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