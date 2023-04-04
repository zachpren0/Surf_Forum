<?php
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <!-- bootstrap 5.2 styles -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test if this changes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/custom.css">
    
  </head>
  <body>
      <header>
            <div class="container-fluid bg-blue">
              <div class="row d-flex">
              
                  <div class="col-2">
                    <img src="images/logo.png" class="rounded float-start img-fluid" alt="logo">
                  </div>

                  <div class="col-6 d-flex align-items-center justify-content-center offset-1">
                    <h1 class="display-4"><a class="nav-link" href="home.php">Surf - Forum</a></h1>
                    <?php 
                        if (isset($_SESSION["admin"])){
                          echo "<p>Logged in as Administrator</p>";
                        } 
                        ?>
                  </div>

                  <div class="col-2 d-flex align-items-end justify-content-end">
                    <nav class="nav">
                      <?php 
                        if (isset($_SESSION["userid"])){
                          echo "<a class='nav-link text-black' href='account.php?id=".$_SESSION["userid"]."'>Profile</a>";
                          echo "<a class='nav-link text-black' href='includes/logout.inc.php'>Logout</a>";
                        } else {
                          echo "<a class='nav-link text-black' href='signup.php'>Signup</a>";
                          echo "<a class='nav-link text-black' href='login.php'>Login</a>";
                          echo "<a class='nav-link text-black' href='admin.php'>Admin</a>";
                        }
                        ?>
                    </nav>

                </div>
              </div>
        </header>