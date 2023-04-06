<?php
include_once 'header.php';
?>

        <main>
            <div class="container-fluid">
                <div class="row">
                <div class="top-buffer col-12 rounded bg-beige1">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                          <li class="breadcrumb-item active">Login</li>
                        </ol>
                      </nav>
                </div>
              </div>
          </div>
          <div class="container">
            <div class="row bg-beige3 rounded top-buffer d-flex">
                    <div class="col-6 offset-3 top-buffer bottom-buffer">

                        <form method="post" id="signupForm" action="includes/login.inc.php">
                            <div class="mb-3">
                              <label for="username" class="form-label">Username</label>
                              <input type="text" name="username" class="form-control required" id="InputUser" placeholder='Username / Email'>
                            </div>
                            <div class="mb-5">
                              <label for="password" class="form-label">Password test</label>
                              <input type="password" name="password" class="form-control required">
                            </div>
                            <div class="mb-5 text-center d-grid gap-2 col-12 mx-auto">
                            <button type="submit" name="submit" class="btn bg-blue">Login</button>
                              <a href="https://en.wikipedia.org/wiki/Hippopotamus">I (grom) forgot my password</a>
                            </div>
                          </form>
                          <?php
                            if(isset($_GET["error"])){
                              if ($_GET["error"]== "emptyInput"){
                                echo "<p>Missing Fields</p>";
                            } 
                            else if ($_GET["error"]== "wrongLogin"){
                              echo "<p>Username or password is incorrect</p>";
                            }
                            else if ($_GET["error"]== "disabled"){
                              echo "<p>Your account has been disabled, this action has pinged an admin to reassess your ban status";
                            }
                            
                          }

                          ?>

                    </div>
            </div>
          </div>
            
        </main>

        <?php
include_once 'footer.php';
?>