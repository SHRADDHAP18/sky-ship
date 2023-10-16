<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["Password"];
    $cpassword = $_POST["cpassword"];

    $existSql = "SELECT * FROM `Users` WHERE username = '$username'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        // $exists = true;
        $showError = "Username Already Exists";
    }
    else{
      if(($password == $cpassword) && $exists==false){
        $sql = "INSERT INTO `Users` ( `Username`, `Password`, `dt`) VALUES ('$username', '$password', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        if ($result){
            $showAlert = true;
        }
    }
  
    else{
        $showError = "Passwords do not match";
    }
  }
}
    
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>SignUp</title>
  </head>
  <body>
    <?php require 'partials/_nav.php' ?>

    <?php
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can login
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"></span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"></span>
        </button>
    </div> ';
    }
    ?>
    <div class=" container">
        <h1 class="text-center">Signup to SKYSHIP</h1>
    </div>



  <form action="/SKYSHIP/signup.php"method="POST">
  <div class="form-group">
    <label for="uname" class="form-label">Username</label>
    <input type="Username" class="form-control" id="username" name= "username" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="form-group">
    <label for="emailid" class="form-label">Email address</label>
    <input type="Email" class="form-control" id="Email" name= "Email ID" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else</div>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="Password" class="form-control" id="exampleInputPassword1" name= "Password">
  </div>
  <div class="form-group">
    <label for="phno" class="form-label">Repeat Password</label>
    <input type="cpassword" class="form-control" id="cpassword" name= "cpassword" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <button type="submit" class="btn btn-primary">Signup</button>
</form>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

  </body>
</html>