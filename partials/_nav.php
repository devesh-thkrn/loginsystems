<?php

session_start();

// Checking whether there is an active log in or not.
if (isset($_SESSION['loggedin']) || $_SESSION['loggedin']== TRUE){  //If there is no login.
  $loggedin = TRUE;
}
else {
  $loggedin = FALSE;
}

echo '<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/loginsystem">iSecure</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/loginsystem/welcome.php">Home</a>
        </li>';
// if conditionals to ensure coherent nav bar. Dependent on log in status.
        if ($loggedin == FALSE){
          echo
          '<li class="nav-item">
            <a class="nav-link" href="/loginsystem/login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/loginsystem/signup.php">Sign Up</a>
          </li>';
        };
      
        if($loggedin == TRUE){
        echo '
          <li class="nav-item">
            <a class="nav-link" href="/loginsystem/logout.php">Log Out</a>
          </li> 
        ';};

        echo '
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>';
?>
