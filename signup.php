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
                          <li class="breadcrumb-item active">Signup</li>
                        </ol>
                      </nav>
                </div>
              </div>
          </div>
          <div class="container">
            <div class="row bg-beige3 rounded top-buffer d-flex">
                    <div class="col-6 offset-3 justify-content-center top-buffer bottom-buffer">
                        
                    <form method="post" id="signupForm" action="includes/signup.inc.php">
                            <div class="mb-3">
                              <label for="email" class="form-label">Email address</label>
                              <input type="email" name="email" class="form-control required" id="InputEmail" aria-describedby="emailHelp">
                              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-3">
                              <label for="username" class="form-label">Username</label>
                              <input type="text" name="username" class="form-control required" id="InputUser">
                              <div id="userHelp" class="form-text">This must be unique</div>
                            </div>
                            <div class="mb-5">
                              <label for="pwd" class="form-label">Password</label>
                              <input type="password" name="pwd" class="form-control required" id="pass1">
                              <label for="pwd2" class="form-label mt-2"> Repeat Password</label>
                              <input type="password" name="pwd2" class="form-control required" id="pass1">
                            </div>
                            <div class="mb-3 form-check">
                              <input type="checkbox" name="terms"   class="form-check-input required" id="terms">
                              <label class="form-check-label" for="terms">I agree to <a href="https://en.wikipedia.org/wiki/Mallard">the terms of service</a></label>
                            </div>
                            <div class="mb-5 text-center d-grid gap-2 col-12 mx-auto">
                              <button type="submit" name="submit" class="btn bg-blue">Submit</button>
                            </div>
                          </form>

                    </div>
            </div>
          </div>
            
        </main>

        <?php
include_once 'footer.php';
?>