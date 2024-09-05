<?php
session_start();

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Homepage</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/Homepage.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
    </head>
    <body>
        <nav class ="navbar navbar-expand-md sticky-top">
            <div class = "container-fluid navbar-size">
                <a href="Homepage.php" class="navbar-brand">Turf Management System</a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav">
                    <li class="nav-item"><a href="turfs.php" class="nav-link">Turfs</a></li>
                    <li class="nav-item"><a href="" class="nav-link">Terms and conditions</a></li>
                    <li class="nav-item"><a href="" class="nav-link">About</a></li>
                    <li class="nav-item but"><a href="<?php if(isset($_SESSION['loggedin']) == true){echo "../html/logout.php";}else{echo "../html/login.php";} ?>">
                    <?php if(isset($_SESSION['loggedin']) == true){echo "Logout";}else{echo "Login";} ?>
                </a></li>
                    
                    
                    </ul>
                </div>
            </div>
        </nav>

        <div class="row gx-0 bg-image">
            <div class="col-md-6">
                <div class="text-main">
                    <h1>Book a turf in just a few clicks!</h1>
                    <h2>Easy-to-use online booking system,so you don't lose even a second.</h2>
                    <p>Simply select the date and time that works best for you, choose your turf, and make your payment securely and conveniently right from our website.</p>
                    <button class="button"><a class="button" href="../html/turfs.php">Book a Turf</a></button>    
                </div>
            </div>
            <div class="col-md-6 hero image">

            </div>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous" async defer></script>
    </body>
</html>