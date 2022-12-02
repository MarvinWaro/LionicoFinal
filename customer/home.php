<?php

    session_start();

    if (!isset($_SESSION['logged-in'])){
      header('location: ../login/login.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/customer.css">
    <title>Lionico | Home</title>
</head>
<body>
<header>
    <div class="container">
        <div class="label">
            <img src="../img/lion2.png" alt="lion-head" id="lion">
            <span class="logo-name">LIONICO BARBER</span>
        </div>

        <nav>
            <ul class="menu">
                <li><a href="../customer/home.php">Home</a></li>
                <li><a href="../customer/booknow.php">Book Now</a></li>
                <li><a href="../customer/about.php">About</a></li>
                <li><a href="../login/logout.php">Logout</a></li>
            </ul>
        </nav>
    </div>
</header>
<main>
      <div class="homecontent">
        <div class="container"> 
          <h1>Want a <span class="haircut">Haircut?</span></h1>
        </div>
      </div>
    </main>

    <section class="sections">
      <div class="container">

        <div class="col">
          <img src="../img/686317.png">
          <h2>About</h2>
          <p>About our Web</p>
          <a href="../customer/about.php">Click here</a><br>
        </div>
        
        <div class="col">
          <img src="../img/3342176.png">
          <h2>Gallery</h2>
          <p>Documentation Photos</p>
          <a href="../customer/gallery.html">Click here</a><br>
        </div>
        
        <div class="col">
          <img src="../img/42446.png">
          <h2>Book Now!</h2>
          <p>Bookings.</p>
          <a href="../customer/booknow.php">Click here</a><br>
        </div>
        
      </div>
    </section>

    <footer>
      <div class="container">
        <p>&copy; Lionico Barder Shop | Ayala Zamboanga City | 0905 188 4862</p>
      </div>
    </footer>

</body>
</html>