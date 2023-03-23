<!DOCTYPE html>
<html>
  <head>
    <!-- bootstrap 5.2 styles -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
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
                    <h1 class="display-4"><a class="nav-link" href="home.html">Surf - Forum</a></h1>
                  </div>

                  <div class="col-2 d-flex align-items-end justify-content-end">
                    <nav class="nav">
                      <a class="nav-link text-black" href="signup.html">Signup</a>
                      <a class="nav-link text-black" href="login.html">Login</a>
                      <a class="nav-link text-black" href="admin.html">Admin</a>
                    </nav>

                </div>
              </div>
        </header>

        <main>
            <!--breadcrumb bar and search-->
            <div class="container-fluid">
                <div class="row top-buffer">
                    <div class="col-4 rounded bg-beige1">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active"><a href="home.html">Home</a></li>
                                <li class="breadcrumb-item active">Admin</li>
                            </ol>
                        </nav>
                    </div>
                 <div class="col-8">
                  
                   
                    <form class="admin-form" action="http://www.randyconnolly.com/tests/process.php">
                      <div class="input-group">
                      
                      <input type="text" class="form-control rounded-left " placeholder="Search.." name="search" aria-label="Search" aria-describedby="search-addon">
                      

                      
                      <button type="submit" class="btn bg-blue text-black ">Submit</button>
                      
                    </div>
                    </form>

                  
                 </div>
                </div>
            </div>
            <!--breadcrumb bar and search end-->

            <!--tabular search result container -->
            <div class ="container-fluid">

              <!--Row start-->
            <div class="row top buffer mt-3">

              <!--Col start-->
            <div class="col-12 gx-5">

              <!--row for header of table container-->
              <div class="row bg-beige1 rounded-top p-1">
                
              <div class="col-10">
                <h3 class="display-7 text-center"> Search Results </h3>
                
              </div>
            </div>
            <!--row for header of table container end-->
             
            

            <div class="row border-beige1">
              <div class="row">
                <div class="col-10">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">User</th>
                        <th scope="col">Post_Name</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row"><a href="account.html"> User_Name </a></th>
                        <td><a href="post.html"> Post_Name </a></td>
                        
                      </tr>
                      <tr>
                        <th scope="row">DummyUser</th>
                        <td>Post_Name_2</td>
                        
                      </tr>
                      <tr>
                        <th scope="row">DummyUser2</th>
                        <td>Post_Name_3</td>
                        
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            

            

          </div>
          <!--2nd row end below-->
        </div>
        <!--2nd container for row end below-->
      </div>

              </main>
        </main>

        <footer>
          <!-- empty so far -->
        </footer>
        <!-- bootstrap js stuff -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>