<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="ad_pages.css">
</head>
<body>
<?php
if (isset($_POST['Submit'])) {
    $price = $_POST['price'];
    $discount = $_POST['discount'];
    $image = $_POST['image'];

    if ($price && $discount && $image) {
        $connection = new mysqli('localhost', 'client', '', 'try_database');
        if ($connection->connect_error) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $query = "INSERT INTO `product_pages`(price, discount, image) VALUES ('$price','$discount','$image')";
        $result = mysqli_query($connection, $query);

        if ($result) {
            echo "Successfully added";
        } else {
            echo "Not connected: " . mysqli_error($connection);
        }
    }
}
?>

<form action="ad_productpages.php" method="post" style="text-align: center;" class="form-sp" enctype="multipart/form-data">
        <input type="text" name="price" placeholder="price" required></br>
        <input type="text" name="discount" placeholder="discount" required></br>
        <input type="text" name="image" placeholder="image" required></br>
        <input type="submit" name="Submit" required>
    </form>
</body>
</html>