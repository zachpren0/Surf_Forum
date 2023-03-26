<?php
include_once 'header.php';
?>

        <main>
            <!--breadcrumb bar and search-->
            <div class="container-fluid">
                <div class="row top-buffer">
                    <div class="col-4 rounded bg-beige1">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active"><a href="home.php">Home</a></li>
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
                        <th scope="row"><a href="account.php"> User_Name </a></th>
                        <td><a href="post.php"> Post_Name </a></td>
                        
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

        <?php
include_once 'footer.php';
?>