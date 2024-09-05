<?php
session_start();

?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Turfs</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <link rel="stylesheet" href="../css/common.css">
        <link rel="stylesheet" href="../css/turfs.css">
    </head>
    <body>
        <nav class ="navbar navbar-expand-md sticky-top">
            <div class = "container-fluid navbar-size">
                <a href="../html/Homepage.php" class="navbar-brand">Turf Management System</a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav">
                    <li class="nav-item"><a href="turfs.html" class="nav-link">Turfs</a></li>
                    <li class="nav-item"><a href="" class="nav-link">Terms and conditions</a></li>
                    <li class="nav-item"><a href="" class="nav-link">About</a></li>
                    <li class="nav-item but"><a href="<?php if(isset($_SESSION['loggedin']) == true){echo "../html/logout.php";}else{echo "../html/login.php";} ?>">
                    <?php if(isset($_SESSION['loggedin']) == true){echo "Logout";}else{echo "Login";} ?>
                </a></li>
                    
                    
                    </ul>
                </div>
            </div>
        </nav>
        <div class="text-box">
            <div class="text-area">
                <h2>Handpicked Football Turfs In Mumbai</h2>
                <p>Looking out to rent a football ground near you? Discover premium football grounds and turfs across Mumbai and compare with other grounds in your area.  </p>
                <p>Experience the premium facilities at all our venues and we'll make sure your gang has a great game every time.</p>
                <p>Compare pictures, prices, location, facilities and choose a ground you want to play at. Once selected, pay to book and secure your football ground instantly.</p>
            </div>
        </div>
        <div class="container bg-cards">
            <div class="row justify-content-evenly info-cards">
                <div class="col-md-6">
                    <div class="card">
                        <img src="../Images/KJSIT-turf.jpg" class="card-img-top img" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">K.J Somaiya Institute of technology,Sion</h5>
                          <p class="card-text">Located inside the KJSIT campus.Well-maintained and reasonable price. </p>
                          <p class="card-text">Price: Rs.1300/hr</p>
                          <a href="" class="btn btn-danger">Book Slot</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <img src="../Images/KJSCE-turf.jpg" class="card-img-top img" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">K.J Somaiya Campus,Vidyavihar</h5>
                          <p class="card-text">Located inside the KJ Somaiya campus at Vidyavihar.Offers larger play area along with all the necessary facilities </p>
                          <p class="card-text">Price: Rs.1500/hr</p>
                          <a href="" class="btn btn-danger">Book Slot</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="" async defer></script>
    </body>
</html>