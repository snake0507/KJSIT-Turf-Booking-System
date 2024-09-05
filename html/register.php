<?php

$nameErr = $emailErr = $passwordErr = $conpassErr =  "";
$name = $email = $password = $conpass = "";
$enable = false;
$exists = false;
$match = false;
$alert = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include '../partials/dbconnect.php';
  $enable = true;
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
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
  
  if (empty($_POST["conpass"])) {
    $conpassErr = "Confirm Password is Empty";
  } else {
    $conpass = test_input($_POST["conpass"]);
    if($password != $conpass){
      $conpassErr = "Passwords don't match.";
      $match = false;
    }
    else{$match = true;}
  }
  $existsSql = "Select * from  `users` where email = '$email'";
  $result = mysqli_query($conn,$existsSql);
  $numExistRows = mysqli_num_rows($result);
  if($numExistRows > 0 ){
      
      $emailErr = "Username already exists";
  } else{
    
    if($match){
      $sql = "INSERT INTO `users` ( `name`, `email`, `password`, `dt`) VALUES ( '$name', '$email', '$password', current_timestamp())";
      $result = mysqli_query($conn,$sql);
      if($result){
        $alert = true;
        
      }
    }
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/common.css">
    
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" integrity="sha512-9oXHUIbY5ggztQSpGM/F8ffumz2nTHkG81Qxvm/JJOlcj0nPu8T/A/vCXmlJRP2wt4iF3L2zL+P1rF2odicJ3Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/register.css">
    <title>Register</title>
</head>
<body>

  
  <?php
if($alert){
  echo '<script>alert("Your account has been successfully created!")</script>';
  echo "<script> location.href='http://localhost/project/html/login.php'; </script>";
        exit;
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
    <div class="reg-area container col-5">
        <div class="reg mb-4 mt-1">Register</div>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
              <form name="f1" method="post" action="../html/register.php">
                
                <div class="form-outline ">
                    <input type="text" id="typeText" class="form-control" name="name" value="<?php echo $name;?>" />
                    <label class="form-label" for="typeText">Name</label>
                  </div>
                  <p class="err mb-3"><?php echo $nameErr;?></p>
                <!-- Email input -->
                <div class="form-outline ">
                    <input type="text" id="formTextExample1" name="email" class="form-control" aria-describedby="textExample1" value="<?php echo $email;?>"/>
                    <label class="form-label" for="formTextExample1">Email</label>
                  </div>
                  <div id="textExample1" class="form-text mb-3 <?php if ($_SERVER["REQUEST_METHOD"] == "POST"){echo "err";} ?>">
                    <?php
                    if($enable == false){
                      echo "We'll never share your email with anyone";
                    }
                    else{
                      echo $emailErr;
                    }
                    ?>
                  </div>
          
                <!-- Password input -->
                <div class="form-outline ">
                  <input type="password" id="loginPassword" name="password" class="form-control" aria-describedby="textExample2" value="<?php echo $password;?>"/>
                  <label class="form-label" for="loginPassword">Password</label>
                </div>
                <div id="textExample2" class="form-text mb-3 <?php if ($_SERVER["REQUEST_METHOD"] == "POST"){echo "err";} ?>">
                <?php
                    if($enable == false){
                      echo "Password must be 8-20 characters long.";
                    }
                    else{
                      echo $passwordErr;
                    }
                    ?>
                  </div>
                
                
                <div class="form-outline ">
                    <input type="password" id="loginPassword" name="conpass" class="form-control"value="<?php echo $conpass;?>"/>
                    <label class="form-label" for="loginPassword">Confirm Password</label>
                  </div>
                  <p class="err mb-4"><?php echo $conpassErr;?></p>
                
          
                <!-- Submit button -->
                <button type="submit" class="btn btn-danger btn-block mb-4">Sign in</button>
          
                <!-- Register buttons -->
                
              </form>
            </div>
            
          </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js" integrity="sha512-ec1IDrAZxPSKIe2wZpNhxoFIDjmqJ+Z5SGhbuXZrw+VheJu2MqqJfnYsCD8rf71sQfKYMF4JxNSnKCjDCZ/Hlw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
</html>