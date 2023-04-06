<?php
include_once 'header.php';
include_once 'includes/db.inc.php';
include_once 'includes/functions.inc.php';
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
                        <th scope="col">Email</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $stmt = mysqli_stmt_init($conn);
                      $sql = "SELECT * FROM USER";
                      if (!mysqli_stmt_prepare($stmt, $sql)){
                        header("location: ../admin.php?error=stmtFailed");
                      }
                      mysqli_stmt_execute($stmt);
    
                      $result = mysqli_stmt_get_result($stmt);
                      if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()) {
                          echo '<tr>';
                          echo '<th scope="row"><a href="account.php?id='.$row['id'].'">'.$row['username'].'</a></th>';
                          echo '<td>'.$row['email'].'</td>';
                          echo '</tr>';
                        }
                      } else {
                        echo "No users found";
                      }
                        mysqli_stmt_close($stmt);
                      ?>
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