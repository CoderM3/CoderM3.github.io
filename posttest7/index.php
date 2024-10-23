<?php
session_start();
require "koneksi.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$query = "SELECT nama_produk, harga, foto_produk FROM produk";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet"  href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet"  href="https://fonts.googleapis.com/css?family=Abel">
    <link rel="stylesheet"  href="https://fonts.googleapis.com/css?family=Kanit">
    <link rel="stylesheet"  href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>High Performance Aftermarket Parts</title>
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
            <li><a href="Userpage.php">Userpage</a></li>
            <li><button class ="darkie" onclick="darkmode()">Toggle dark mode</button></li>
        </ul>
        <button class="hamburger" id="hamburger">
          <i class="fa fa-bars"></i>
        </button>
    </nav>

    <div class="maincontainer1">
        <img class="soarer" src="asset/soarer.jpg" alt="toyotasoarer">
        <div class="overlay"></div>
        <div class="text1">High Performance Automotive Parts</div>
        <div class="text2">HKS specializes in the engineering and production of aftermarket high performance auto parts.  
            And its possibly the most well-known aftermarket brand in the world. <br>
            WeShowSpeed™ is an HKS master seller, we carry the full line of HKS products, including exhaust, 
            suspension, intakes, apparel-accessories, and more.
          </div>
        <div class="text3">
          <?php 
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
              $username = htmlspecialchars($_POST['username']);
               
              echo "<div class='text4'><h1>Welcome, " . $username . "!</h1></div>";
            }
          ?>
         </div>
         
    </div>
    <div class="maincontainer2">
        <button class="left" id="leftBtn">
            <i class="fas fa-angle-double-left"></i>
        </button>
        <div class="scrollge">
            <a href="#Turbo"><div class="card">
                <div class="scroll-overlay"></div>
                <img class="cardpic" src="asset/GTRS.jpg" alt="turbo">
                <div class="card-text">Turbo</div>
            </div></a>
            <a href="#Exhaust"><div class="card">
                <div class="scroll-overlay"></div>
                <img class="cardpic" src="asset/027abf49d34e7e85ea305f0fab73c445.jpeg" alt="exhaust">
                <div class="card-text">Exhaust</div>
            </div></a>
            <a href="#AeroKit"><div class="card">
                <div class="scroll-overlay"></div>
                <img class="cardpic" src="asset/9523180.jpeg" alt="rsx">
                <div class="card-text">AeroKit</div>
            </div></a>
            <a href="#Engine"><div class="card">
                <div class="scroll-overlay"></div>
                <img class="cardpic" src="asset/vr38_43l_s3_01.jpg" alt="billet">
                <div class="card-text">Engine</div>
            </div></a>
            <a href="#Intake"><div class="card">
                <div class="scroll-overlay"></div>
                <img class="cardpic" src="asset/Intake.jpg" alt="Intake">
                <div class="card-text">Intake</div>
            </div></a>
            <a href="#drivetrain"><div class="card">
                <div class="scroll-overlay"></div>
                <img class="cardpic" src="asset/drivetrain.jpeg" alt="drivetrain">
                <div class="card-text">Drivetrain</div>
            </div></a>
            <a href="#electronic"><div class="card">
                <div class="scroll-overlay"></div>
                <img class="cardpic" src="asset/electronic.jpg" alt="electronic">
                <div class="card-text">Electronic</div>
            </div></a>
            <a href="#Fuel"><div class="card">
                <div class="scroll-overlay"></div>
                <img class="cardpic" src="asset/fuel.jpg" alt="fuel">
                <div class="card-text">Fuel System</div>
            </div></a>
            <a href="#Suspension"><div class="card">
                <div class="scroll-overlay"></div>
                <img class="cardpic" src="asset/s_img_sp.jpg" alt="suspension">
                <div class="card-text">Suspension</div>
            </div></a>
            <a href="#oil"><div class="card">
                <div class="scroll-overlay"></div>
                <img class="cardpic" src="asset/oil.jpg" alt="oil">
                <div class="card-text">Oil</div>
            </div></a>
        </div>
        <button class="right" id="rightBtn">
            <i class="fas fa-angle-double-right"></i>
        </button>
    </div>
    
    <div class="maincontainer3">
    <section>
            <p class="makers"><strong>By Make</strong></p>
            <form>
                <label class="filter"><input type="checkbox" name="fl-size" value="NISSAN" id="NISSAN" /> NISSAN<span class="filtermake"></span></label><br><br>
                <label class="filter"><input type="checkbox" name="fl-size" value="HONDA" id="HONDA" /> HONDA<span class="filtermake"></span></label><br><br>
                <label class="filter"><input type="checkbox" name="fl-size" value="ACURA" id="ACURA" /> ACURA<span class="filtermake"></span></label><br><br>
                <label class="filter"><input type="checkbox" name="fl-size" value="MITSUBISHI" id="MITSUBISHI" /> MITSUBISHI<span class="filtermake"></span></label><br><br>
                <label class="filter"><input type="checkbox" name="fl-size" value="MAZDA" id="MAZDA" /> MAZDA<span class="filtermake"></span></label><br><br>
                <label class="filter"><input type="checkbox" name="fl-size" value="TOYOTA" id="TOYOTA" /> TOYOTA<span class="filtermake"></span></label><br><br>
                <label class="filter"><input type="checkbox" name="fl-size" value="LEXUS" id="LEXUS" /> LEXUS<span class="filtermake"></span></label><br><br>
                <label class="filter"><input type="checkbox" name="fl-size" value="DODGE" id="DODGE" /> DODGE<span class="filtermake"></span></label><br><br>
                <label class="filter"><input type="checkbox" name="fl-size" value="SUBARU" id="SUBARU" /> SUBARU<span class="filtermake"></span></label><br>
            </form>  
        </div>
    </section>
    <section>
        <div class="maincontainer3">
            <p class="makers"><strong>By Make</strong></p>
            <form>
                <label class="filter"><input type="checkbox" name="fl-size" value="NISSAN" id="NISSAN" /> NISSAN<span class="filtermake"></span></label><br><br>
                <label class="filter"><input type="checkbox" name="fl-size" value="HONDA" id="HONDA" /> HONDA<span class="filtermake"></span></label><br><br>
                <label class="filter"><input type="checkbox" name="fl-size" value="ACURA" id="ACURA" /> ACURA<span class="filtermake"></span></label><br><br>
                <label class="filter"><input type="checkbox" name="fl-size" value="MITSUBISHI" id="MITSUBISHI" /> MITSUBISHI<span class="filtermake"></span></label><br><br>
                <label class="filter"><input type="checkbox" name="fl-size" value="MAZDA" id="MAZDA" /> MAZDA<span class="filtermake"></span></label><br><br>
                <label class="filter"><input type="checkbox" name="fl-size" value="TOYOTA" id="TOYOTA" /> TOYOTA<span class="filtermake"></span></label><br><br>
                <label class="filter"><input type="checkbox" name="fl-size" value="LEXUS" id="LEXUS" /> LEXUS<span class="filtermake"></span></label><br><br>
                <label class="filter"><input type="checkbox" name="fl-size" value="DODGE" id="DODGE" /> DODGE<span class="filtermake"></span></label><br><br>
                <label class="filter"><input type="checkbox" name="fl-size" value="SUBARU" id="SUBARU" /> SUBARU<span class="filtermake"></span></label><br>
            </form>
            <p class="makers"><strong>Products</strong></p>
            <form>
                <label class="filter"><input type="checkbox" name="fl-size" value="TURBO" id="TURBO" /> TURBO<span class="filtermake"></span></label><br><br>
                <label class="filter"><input type="checkbox" name="fl-size" value="SUPERCHARGER" id="SUPERCHARGER" /> SUPERCHARGER<span class="filtermake"></span></label><br><br>
                <label class="filter"><input type="checkbox" name="fl-size" value="COOLING" id="COOLING" /> COOLING<span class="filtermake"></span></label><br><br>
                <label class="filter"><input type="checkbox" name="fl-size" value="INTAKE" id="INTAKE" /> INTAKE<span class="filtermake"></span></label><br><br>
                <label class="filter"><input type="checkbox" name="fl-size" value="FUEL" id="FUEL" /> FUEL<span class="filtermake"></span></label><br><br>
                <label class="filter"><input type="checkbox" name="fl-size" value="SUSPENSION" id="SUSPENSION" /> SUSPENSION<span class="filtermake"></span></label><br><br>
                <label class="filter"><input type="checkbox" name="fl-size" value="EXHAUST" id="EXHAUST" /> EXHAUST<span class="filtermake"></span></label><br><br>
                <label class="filter"><input type="checkbox" name="fl-size" value="OIL" id="OIL" /> OIL<span class="filtermake"></span></label><br><br>
                <label class="filter"><input type="checkbox" name="fl-size" value="ELECTRONICS" id="ELECTRONICS" /> ELECTRONICS<span class="filtermake"></span></label><br>
            </form>
            <div class="maincontainer4">
              <?php
              $totalCards = 12;
              $productCount = mysqli_num_rows($result);
              $currentCard = 0;

              while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                  <div class="card3">
                      <div class="imgBox">
                          <img src="asset/<?php echo $row['foto_produk']; ?>" alt="item">
                      </div>
                      <div class="contentBox">
                          <h3><?php echo $row['nama_produk']; ?></h3>
                          <h2 class="price">$<?php echo number_format($row['harga'], 2); ?></h2>
                          <a href="#" class="buy">Buy Now</a>
                      </div>
                  </div>
                  <?php
                  $currentCard++;
              }

              while ($currentCard < $totalCards) {
                  ?>
                  <div class="card3">
                      <div class="imgBox">
                          <img src="asset/placeholder.png" alt="No Product">
                      </div>
                      <div class="contentBox">
                          <h3>N/A</h3>
                          <h2 class="price">No Data</h2>
                          <a href="#" class="buy">Not Available</a>
                      </div>
                  </div>
                  <?php
                  $currentCard++;
              }
              ?>
          </div>
            <div class="maincontainer5">
              
              <h4 class="header4">More About HKS</h4>
              <div class="gr8"><img src="asset/gr_86_4th03.jpg" alt="gr86" class="carpic"></div>
              <div class="accordion">
                <div class="accordion-item">
                  <input id="accordion-trigger-1" class="accordion-trigger-input" type="checkbox"></input>
                <label class="accordion-trigger" for="accordion-trigger-1">What are HKS Parts?
                  </label>
                  <section class="accordion-animation-wrapper">
                    <div class="accordion-animation">
                      <div class="accordion-transform-wrapper">
                        <div class="accordion-content">
                          <p>HKS parts are high-performance automotive components engineered and manufactured in Japan. 
                            Established in 1973, HKS has built a reputation for innovation, quality, and reliability in the automotive aftermarket industry. 
                            The company offers a wide range of products, including turbo kits, exhaust systems, suspension components, and engine internals, designed to enhance the performance of Japanese domestic model cars and beyond. HKS's commitment to motorsports and rigorous testing ensures their products meet the highest standards of performance and safety, 
                            making them a preferred choice for both professional racers and car enthusiasts worldwide.</p>
                        </div>
                      </div>
                    </div>
                  </section>
                </div>
                
                <div class="accordion-item">
                  <input id="accordion-trigger-2" class="accordion-trigger-input" type="checkbox"></input>
                <label class="accordion-trigger" for="accordion-trigger-2">What does HKS stands for?
                  </label>
                  <section class="accordion-animation-wrapper">
                    <div class="accordion-animation">
                      <div class="accordion-transform-wrapper">
                        <div class="accordion-content">
                          <h2>HKS stands for Hasegawa, Kitagawa, and Sigma, named after the company's founders.</h2>
                          <p>HKS was established in 1973 by Hiroyuki Hasegawa, a former Yamaha engineer, and Goichi Kitagawa, with the financial backing of Sigma Automotive. The company quickly became a leader in the high-performance automotive parts industry, specializing in aftermarket tuning and components.</p>
                        </div>
                      </div>
                    </div>
                  </section>
                </div>
                <div class="accordion-item">
                  <input id="accordion-trigger-3" class="accordion-trigger-input" type="checkbox"></input>
                <label class="accordion-trigger" for="accordion-trigger-3">Is HKS a Japanese company?
                  </label>
                  <section class="accordion-animation-wrapper">
                    <div class="accordion-animation">
                      <div class="accordion-transform-wrapper">
                        <div class="accordion-content">
                          <h2>Yes, HKS is a Japanese company.</h2>
                          <p>Founded in 1973, HKS is based in Fujinomiya, Shizuoka, Japan. The company specializes in high-performance automotive parts and has built a global reputation for innovation, quality, and excellence in the automotive aftermarket industry. HKS continues to design, develop, and manufacture its products in Japan, maintaining its commitment to superior craftsmanship and cutting-edge technology​</p>
                        </div>
                      </div>
                    </div>
                  </section>
                </div>
                <div class="accordion-item">
                  <input id="accordion-trigger-4" class="accordion-trigger-input" type="checkbox"></input>
                <label class="accordion-trigger" for="accordion-trigger-4">Where are HKS parts are made?
                  </label>
                  <section class="accordion-animation-wrapper">
                    <div class="accordion-animation">
                      <div class="accordion-transform-wrapper">
                        <div class="accordion-content">
                          <h2>HKS parts are made in Japan.</h2>
                          <p>The company is headquartered in Fujinomiya, Shizuoka, Japan, where it designs, develops, and manufactures its high-performance automotive parts. HKS maintains rigorous quality control and advanced manufacturing processes in its Japanese facilities to ensure the highest standards of performance and reliability</p>
                        </div>
                      </div>
                    </div>
                  </section>
                </div>
                <div class="accordion-item">
                  <input id="accordion-trigger-5" class="accordion-trigger-input" type="checkbox"></input>
                <label class="accordion-trigger" for="accordion-trigger-5">What is HKS known for?
                  </label>
                  <section class="accordion-animation-wrapper">
                    <div class="accordion-animation">
                      <div class="accordion-transform-wrapper">
                        <div class="accordion-content">
                          <h2>HKS is known for its high-performance automotive parts and pioneering innovations in the aftermarket industry.</h2>
                          <p>Key aspects of HKS's reputation include:
                            <br>
                            <li>Turbochargers and Turbo Kits</li>
                            <li>Exhaust Systems</li>
                            <li>Suspension Components</li>
                            <li>Engine Internals</li>
                            <li>Electronics and Engine</li>
                            <li>Management Systems</li>
                            <li> Motorsports Involvement</li>
                            <br>
                            These aspects highlight HKS's commitment to innovation, quality, and performance, making it a trusted name among car enthusiasts and professional racers worldwide.
                          </p>
                        </div>
                      </div>
                    </div>
                  </section>
                </div>
              </div>
        </div>
        <footer>
          <div class="maincontainer6">
            <div class="linkcontainer">
              <h class="linkheader">Helpful Info</h>
              <a href="#">Financing Options</a>
              <a href="#">Privacy Policy</a>
              <a href="#">Our Guarantee</a>
              <a href="#">Help or FAQ</a>
              <a href="#">Terms and Conditions</a>
              <a href="#">Do not sell my personal information</a>
            </div>
            <div class="linkcontainer">
              <h class="linkheader">Company Info</h>
              <a href="#">Our Story</a>
              <a href="#">Blog Posts</a>
              <a href="#">Rewards Program</a>
              <a href="#">Contact Us</a>
              <a href="#">Product Reviews</a>
              <a href="#">Brand Ambassador</a>
            </div>
          </div>
        </footer>
    </section>
    <script src="scripts.js"></script>
</body>
</html>