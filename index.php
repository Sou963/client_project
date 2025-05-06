<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Perfume Products</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
$connection = new mysqli('localhost', 'client', '', 'try_database');
if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}
$query = "SELECT * FROM `4` WHERE 1";
$result = mysqli_query($connection, $query);
?>

<!-- Brand Navigation -->
<div class="container-fluid brand-nav">
  <div class="d-flex flex-wrap justify-content-center">
    <span>AMOUAGE</span> |
    <span>JO MALONE</span> |
    <span>NASOMATTO</span> |
    <span>BOADECIA</span> |
    <span>LE LABO</span> |
    <span>MANCERA</span> |
    <span>THAMEEN</span> |
    <span>DIOR</span> |
    <span>KILLIAN</span> |
    <span>MAISON MARGIELA</span> |
    <span>GUCCI</span> |
    <span>ARMANI PRIVE</span> |
    <span>EX NIHILO</span> |
    <span>FREDRIC MALLE</span> |
    <span>INITIO</span> |
    <span>MONTALE</span> |
    <span>NISHANE</span> |
    <span>PENHALIGONS</span> |
    <span>PDM</span> |
    <span>ROJA</span> |
    <span>GUERLAIN</span> |
    <span>PRADA</span> |
    <span>BOND 9</span> |
    <span>BYREDO</span> |
    <span>CHANEL</span> |
    <span>TOM FORD</span> |
    <span>LOUIS VUITTON</span> |
    <span>CREED</span> |
    <span>XERJOFF</span> |
    <span>MAISON CRIVELLI</span> |
    <span>MAISON FRANCIS KURKDJIAN</span> |
    <span>perfumes</span>
  </div>
</div>

<!-- Product Grid -->
<div class="container py-5">
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
    <?php if ($result && mysqli_num_rows($result) > 0): ?>
      <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <div class="col">
          <div class="text-center product-card">
            <a href="product_f.php">
            <img src="upload-shop-image/<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['p_name']); ?>">
            </a>
            
            <div class="product-title"><?php echo htmlspecialchars($row['p_name']); ?></div>
            <div class="product-price"><?php echo htmlspecialchars($row['price']); ?></div>
          </div>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <div class="col">
        <p class="text-center">No products available.</p>
      </div>
    <?php endif; ?>
  </div>
</div>

<div class="container py-3">
  <p class="text-center">This is not here when the admin page is built; this is gone</p>
  <div class="text-center">
    <button class="btn btn-outline-primary" onclick="location.href='admin.php'">Admin</button>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
