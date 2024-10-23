<?php
session_start();
require "koneksi.php";

if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];

    $stmt = $conn->prepare("SELECT * FROM produk WHERE nama_produk LIKE ?");
    $likeTerm = '%' . $searchTerm . '%';
    $stmt->bind_param("s", $likeTerm);

    // Execute the query
    $stmt->execute();
    $result = $stmt->get_result();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="search.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <nav class="navbar">
        <img class="logo" src="asset/pngwing.com.png" alt="logohks">
        <ul>
            <div class="search-container">
              <form action="Search.php" method="GET">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
              </form>
            </div>
            <li><a href="#Scratch">Scratch & Dents Deals</a></li>
            <li><a href="aboutme.php">About Me</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="#wheels">Shop Wheels</a></li>
            <li><a href="index.php">Home</a></li>
            <li><button class="darkie" onclick="darkmode()">Toggle dark mode</button></li>
        </ul>
        <button class="hamburger" id="hamburger">
          <i class="fa fa-bars"></i>
        </button>
    </nav>

    <div class="maincontainer4">
        <?php
        if (isset($result)) {
            $productCount = mysqli_num_rows($result);
            $currentCard = 0;

            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="card3">
                    <div class="imgBox">
                        <img src="asset/<?php echo htmlspecialchars($row['foto_produk']); ?>" alt="item">
                    </div>
                    <div class="contentBox">
                        <h3><?php echo htmlspecialchars($row['nama_produk']); ?></h3>
                        <h2 class="price">$<?php echo number_format($row['harga'], 2); ?></h2>
                        <a href="#" class="buy">Buy Now</a>
                    </div>
                </div>
                <?php
                $currentCard++;
            }
        } else {
            echo "<p>No products found for the search term.</p>";
        }
        ?>
    </div>

</body>
</html>