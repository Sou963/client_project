<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Size Dropdown</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <style>
      .custom-select-lg {
        font-size: 1.25rem;
        padding: 1rem;
        height: auto;
      }
      .a-b {
        font-size: 10px;
        border-radius: 20px;
        padding: 5px 15px;
        text-decoration: none;
      }
    </style>
  </head>
  <body class="bg-light p-5">
    <?php
      $connection = new mysqli('localhost', 'client', '', 'try_database');
      if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
      }
      $query = "SELECT * FROM `product_pages` WHERE 1";
      $result = mysqli_query($connection, $query);
    ?>

    <div class="container mb-4">
      <div class="row">
        <div class="col-lg-6">
          <p id="para1">from £5.99</p>
          <p id="para2">
            or 4 interest-free payments of £1.50 with
            <a href="#" class="btn bg-black text-white h-15px w-150px a-b">afterpay</a>
          </p>
        </div>
        <p>
          Some smells take you straight back to a favourite memory, and others leave you daydreaming of your future. For Maison Crivelli's founder Thibaud Crivelli, the aroma of oud offers both. Encapsulating the first moment the expert perfumer discovered the note, Jordi Fernandez creates the Oud Maracuja extrait de parfum with the woody and deep voluptuous nuances of the eponymous scent. Blended with honeyed Turkish rose and fruity passionfruit, it recreates the shock and surprise Crivelli felt at the discovery.
          <br /><br />
          <strong>PLEASE NOTE:</strong>
          <br /><br />
          1ml Samples are provided in half filled 2ml plastic Vials.
          <br /><br />
          <strong>Disclaimer - Please Read Before Purchase</strong>
          <br /><br />
          Stallion Scents are not directly affiliated with, endorsed, sponsored nor supported by any of the brands we sell. You will receive your sample in an unbranded glass atomiser and not in the retail-sized bottle as shown. All product images are strictly for illustration purposes only. All copyrighted trademarks are property of their respective owners and we do not claim to represent any of the brands we decant.
        </p>
      </div>
    </div>

    <div class="container my-3">
      <label for="sizeSelect" class="form-label fs-5">Select a size:</label>
      <select id="sizeSelect" class="form-select custom-select-lg">
        <option selected disabled>Select Size</option>
        <option value="am1">1ML SAMPLE SIZE</option>
        <option value="am2">5ML SAMPLE SIZE</option>
        <option value="am3">10ML SAMPLE SIZE</option>
        <option value="am4">30ML TRAVEL SIZE</option>
        <option value="am5">50ML DECANT BOTTLE</option>
        <option value="am6">100ML DECANT BOTTLE</option>
      </select>
    </div>

    <?php if ($result && mysqli_num_rows($result) > 0): ?>
      <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <script>
          const prices = {
            am1: <?php echo htmlspecialchars($row['price']); ?>,
            am2: <?php echo htmlspecialchars($row['image']); ?>,
            am3: 39.99,
            am4: 74.99,
            am5: 99.99,
            am6: 149.99,
          };

          document.getElementById("sizeSelect").addEventListener("change", function () {
            const selectedValue = this.value;
            const price = prices[selectedValue];
            if (price) {
              const splitAmount = (price / 4).toFixed(2);
              document.getElementById("para1").innerHTML = "£" + price.toFixed(2);
              document.getElementById("para2").innerHTML =
                `or 4 interest-free payments of £${splitAmount} with <a href='#' class='btn bg-black text-white h-15px w-150px a-b'>afterpay</a>`;
            }
          });
        </script>
      <?php endwhile; ?>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
