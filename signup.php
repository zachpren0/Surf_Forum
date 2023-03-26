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
                        <form method="get" id="signupForm" action="http://www.randyconnolly.com/tests/process.php">
                            <div class="mb-3">
                              <label for="InputEmail" class="form-label">Email address</label>
                              <input type="email" name="email" class="form-control required" id="InputEmail" aria-describedby="emailHelp">
                              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-3">
                              <label for="InputUser" class="form-label">Username</label>
                              <input type="text" name="user" class="form-control required" id="InputUser">
                              <div id="userHelp" class="form-text">This must be unique</div>
                            </div>
                            <div class="mb-5">
                              <label for="pass1" class="form-label">Password</label>
                              <input type="password" user="pass" class="form-control required" id="pass1">
                            </div>
                            <div class="mb-3 form-check">
                              <input type="checkbox" name="agree"   class="form-check-input required" id="terms">
                              <label class="form-check-label" for="terms">I agree to <a href="https://en.wikipedia.org/wiki/Mallard">the terms of service</a></label>
                            </div>
                            <div class="mb-5 text-center d-grid gap-2 col-12 mx-auto">
                              <button type="submit" class="btn bg-blue">Submit</button>
                            </div>
                          </form>
                    </div>
            </div>
          </div>
            
        </main>

        <?php
include_once 'footer.php';
?>