<?php 

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome - <?php echo $_SESSION['username'];?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
   
<!-- Putting in the code to put in the navbar in each page -->
  <?php require 'partials/_nav.php'?>
  <h1>
  Welcome - <?php echo $_SESSION['username'];?>
</h1>
<div class="container">
  <div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Welcome <?php echo $_SESSION['username']?>!</h4>
    <p>You are logged in! </p>
    <hr>
    <p class="mb-0">Whenever you need to, be sure to log out <a href="logout.php">using this link.</a></p>
  </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>