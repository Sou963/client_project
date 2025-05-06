<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<?php
    if (isset($_POST['Submit'])) {
        $p_name = $_POST['p_name'];
        $price = $_POST['price'];
        $image = $_FILES['shop-image-b']['name'];
        $tmp = explode(".", $image);
        $newfilename = round(microtime(true)) . '.' . end($tmp);
        $uploadpath = "upload-shop-image/" . $newfilename;

        if (move_uploaded_file($_FILES['shop-image-b']['tmp_name'], $uploadpath)) {
            if ($p_name && $price && $newfilename) {
                $connection = new mysqli('localhost', 'client', '', 'try_database');
                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }

                $query = $connection->prepare("INSERT INTO `4` (p_name, price, image) VALUES (?, ?, ?)");
                $query->bind_param("sss", $p_name, $price, $newfilename);
                $result = $query->execute();

                if ($result) {
                    echo "Upload successful!";
                } else {
                    echo "Error: " . $query->error;
                }

                $query->close();
                $connection->close();
            } else {
                echo "Please fill in all fields.";
            }
        } else {
            echo "File upload failed.";
        }
    } 
    ?>
    <form action="admin.php" method="post" style="text-align: center;" class="form-sp" enctype="multipart/form-data">
        <input type="text" name="p_name" placeholder="p_name" required></br>
        <input type="text" name="price" placeholder="price" required></br>
        <input type="file" name="shop-image-b" required></br>
        <input type="submit" name="Submit" required>
    </form>
</br>
<div class="container py-3">
    <div class="col-lg-12">
    <div class="text-center center">
    <button class="btn btn-outline-primary" onclick="location.href='ad_productpages.php'">Pages</button>
  </div>
</div>
</body>
</html>