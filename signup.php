<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $showAlert = false;
    $showError = false;
    include 'partials/_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    //checking if the username already exists.
    $existSql = "SELECT * FROM `users` WHERE username = '$username'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
      $showError = "Username already exists.";
    }
    else{
    if(($password == $cpassword)){
       $sql = "INSERT INTO `users` (`username`, `password`, `dt`) VALUES ('$username', '$password', current_timestamp());";
       $result = mysqli_query($conn, $sql);
       if ($result){
        $showAlert = true;
       }
       else{
        echo "Unfortunately, the request could not be completed. Please try again later. We regret the inconvenience.";
       }
    }
    else{
        $showError = "Password does not match";
    }

}
}
?>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
<!-- Putting in the code to put in the navbar in each page -->
  <?php require 'partials/_nav.php'?>
  <?php
  if($showAlert){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> Your account is now created!
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
  }
  if($showError){
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Error!</strong>  ". $showError ."
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
  }
  ?>
    <div class="container col-md-6">
        <h1 class= "text-center">Sign Up to our Website</h1>
        <form action="/loginsystem/signup.php" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" aria-describedby="emailHelp" name="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword">
                <small id="emailHelp" class="form-text text-muted">Make sure to type the same password</small>
            </div>

            <button type="submit" class="btn btn-primary">Sign Up</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>