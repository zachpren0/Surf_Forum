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
                              <label for="pwd" class="form-label">Password</label>
                              <input type="password" user="pwd" class="form-control required" id="pass1">
                            </div>
                            <div class="mb-5 text-center d-grid gap-2 col-12 mx-auto">
                            <button type="submit" class="btn bg-blue">Login</button>
                              <a href="https://en.wikipedia.org/wiki/Hippopotamus">I (grom) forgot my password</a>
                            </div>
                          </form>

                    </div>
            </div>
          </div>
            
        </main>

        <?php
include_once 'footer.php';
?>