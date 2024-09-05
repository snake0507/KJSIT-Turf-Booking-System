<?php
$emailErr = $passwordErr = "";
$email = $password ="";
$login = false;
$error =false;
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  include '../partials/dbconnect.php';
  $login = false;
  $error =false;
  $password = $_POST["password"];
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
    // check if URL address syntax is valid
    
    } 

  
  $sql = "Select * from users where email='$email' AND password='$password'";
  $result = mysqli_query($conn,$sql);
  $num = mysqli_num_rows($result);
  if($num == 1){
    $login = true;
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['email'] = $email;
     

  }else{
    
      $error = true;
    
    
  }


  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/common.css">
        <link rel="stylesheet" href="../css/login.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" integrity="sha512-9oXHUIbY5ggztQSpGM/F8ffumz2nTHkG81Qxvm/JJOlcj0nPu8T/A/vCXmlJRP2wt4iF3L2zL+P1rF2odicJ3Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
          <link rel="stylesheet" href="../css/login.css">
        </head>
    <body>
    <?php
if($login){
  echo '<script>alert("You have successfully Logged In!")</script>';
  echo "<script> location.href='http://localhost/project/html/Homepage.php'; </script>";
        exit;
}
if($error){
  echo '<script>alert("Invalid Credentials")</script>';
}

  
?>
        <nav class ="navbar navbar-expand-md sticky-top">
            <div class = "container-fluid navbar-size">
                <a href="Homepage.html" class="navbar-brand">Turf Management System</a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav">
                    <li class="nav-item"><a href="" class="nav-link">Turfs</a></li>
                    <li class="nav-item"><a href="" class="nav-link">Terms and conditions</a></li>
                    <li class="nav-item"><a href="" class="nav-link">About</a></li>
                    <li class="nav-item but"><a href="../html/login.html">Login</a></li>
                    
                    
                    </ul>
                </div>
            </div>
        </nav>
        <div>
            <div class="login-area container col-md-5">
                <!-- Pills navs -->

  <!-- Pills navs -->
  <div class="login mb-3 mt-1">Login</div>
  <!-- Pills content -->
  <div class="tab-content">
    <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
      <form action="../html/login.php" method = "post" >
        
  
        <!-- Email input -->
        <div class="form-outline ">
          <input type="email" id="loginName" class="form-control" name = "email" />
          <label class="form-label" for="loginName">Email</label>
        </div>
        <p class="err mb-3"><?php echo $emailErr;?></p>
        <!-- Password input -->
        <div class="form-outline ">
          <input type="password" id="loginPassword" class="form-control" name="password" />
          <label class="form-label" for="loginPassword">Password</label>
        </div>
        <p class="err mb-3"><?php echo $passwordErr;?></p>
        <!-- 2 column grid layout -->
        
  
        <!-- Submit button -->
        <button type="submit" class="btn btn-danger btn-block mb-4">Log in</button>
  
        <!-- Register buttons -->
        <div class="text-center">
          <p>Not a member? <a href="../html/register.php">Register</a></p>
        </div>
      </form>
    </div>
    
  </div>
  <!-- Pills content -->
            </div>
        </div>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js" integrity="sha512-ec1IDrAZxPSKIe2wZpNhxoFIDjmqJ+Z5SGhbuXZrw+VheJu2MqqJfnYsCD8rf71sQfKYMF4JxNSnKCjDCZ/Hlw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </body>
</html>