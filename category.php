<?php
include_once 'header.php';
include_once 'includes/db.inc.php';
include_once 'includes/functions.inc.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$categoryTitle = "none";
$categoryId = "none";
if(isset($_SESSION['catTitle'])) {
  $categoryTitle = $_SESSION['catTitle'];
}
if(isset($_SESSION['catId'])) {
  $categoryId = $_SESSION['catId'];
}
?>

        <main>
          <div class="container-fluid">
            <div class="row top-buffer">
                <div class="col-9 rounded bg-beige1">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="home.php">Home</a></li>
                        <li class="breadcrumb-item active"><?php echo $categoryTitle; ?></li>
                        </ol>
                    </nav>
                </div>
                    <div class="col-3">
                    <div class="input-group">
                          <form action="search.php" method="post">
                          <input type="search" name="search" class="form-control rounded-left" placeholder="Search" aria-label="Search" aria-describedby="search-addon" style="float: left; width: 70%;" />
                            <button type="submit" name="submit" class="btn bg-blue text-black" style="float: right;">search</button>
                          </form>  
                      </div>
                    </div>
          </div>
      </div>
      <div class="container-fluid">
            <div class="row top-buffer">

            <?php
              include_once 'categoryList.php';
            ?>

                
                <div class="col-9 gx-5">
                  <div class="row bg-beige1 rounded-top p-1">
                    <div class="col-2">
                    <?php if(isset($_SESSION['userid'])){echo '<button type="button" class="btn bg-blue d-inline" data-bs-toggle="modal" data-bs-target="#makePost">Create new post</button>';} ?>
                  </div>
                  <div class="col-10">
                    <h3 class="display-7 text-center"><?php echo $categoryTitle; ?></h3>
                    
                  </div>
                </div>


                <div class="modal fade" id="makePost" tabindex="-1" aria-labelledby="profile" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">


                        <form method="post" id="commentForm" action="includes/post.inc.php">
                        <div class="modal-header">
                          <h5 class="modal-title" id="changeProfileHeading">new post for category: <?php echo $categoryTitle; ?></h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                              <div style="display: none;">
                              <label for="categoryId" class="form-label">Category ID</label>
                              <input type="text" name="categoryId" class="form-control required" id="categoryId" value="<?php echo $categoryId ?>" readonly>
                              <div id="userHelp" class="form-text">This cannot be changed</div>

                              <label for="username" class="form-label">Category Name</label>
                              <input type="text" name="categoryName" class="form-control required" id="categoryName" value="<?php echo $categoryTitle ?>" readonly>
                              <div id="userHelp" class="form-text">This cannot be changed</div>

                              <label for="userId" class="form-label">User ID</label>
                              <input type="text" name="userId" class="form-control required" id="userId" value="<?php if (isset($_SESSION['userid'])){echo $_SESSION['userid'];} ?>" readonly>
                              <div id="userHelp" class="form-text">This is determined by your login credentials and cannot be changed</div>
                              </div>

                              <label for="username" class="form-label">Post Title:</label>
                              <input type="text" name="newPostTitle" class="form-control required" id="InputUser">
                                Type your post here:
                              <textarea name="newPostBody" rows="5" cols="61"  class="form-control required" id="InputBreak" value="Account_Break"></textarea>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" name="submit" class="btn btn-primary">Create Post</button>
                        </div>
                      </div>
                    </form>


                    </div>
                  </div>


                <?php
                  $stmt = mysqli_stmt_init($conn);
                  $sql = "SELECT * FROM POST WHERE category_id=?;";
                  if (!mysqli_stmt_prepare($stmt, $sql)){
                    header("location: ../category.php?error=stmtFailed");
                  }
                  mysqli_stmt_bind_param($stmt, "s", $categoryId);
                  mysqli_stmt_execute($stmt);

                  $result = mysqli_stmt_get_result($stmt);
                  if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()) {
                      echo '<div class="row border-beige1">';
                        echo '<div class="row">';
                          echo '<div class="col-10">';
                            echo  '<h3 class="display-7 text-left"><u><a href="route/post.route.php?postId='.$row['post_id'].'&postTitle='.$row['title'].'">'.$row['title'].'</a></u></h3>';
                            echo  '<p><a href="account.php?id='.$row['user_id'].'">'.fetchUserById($conn, $row['user_id'])['username'].'</a></p>';
                         
                          echo '<div class="col-2">';
                          /*
                            if (isset($_SESSION["userid"])) {
                            if ($_SESSION["userid"] === $row['user_id'] || isset($_SESSION["admin"]) ){
                              echo '<button type="button" class="btn bg-blue d-inline " data-bs-toggle="modal" data-bs-target="#">edit</button>';
                              echo '<button type="button" class="btn bg-blue d-inline " data-bs-toggle="modal" data-bs-target="#"><a style="text-decoration: none; color: black;" href="includes/deletePost.inc.php?post_id='.$row['post_id'].'">delete</a></button>'; 
                            }
                            }
                            */
                            
                          echo '</div>';
                        echo '</div>';
                      echo '</div>';

                      echo '<div class="row">';
                      echo '<p>';

                        echo $row['body'];

                      echo    '</p>';
                      echo  '</div>';
                      echo '</div>';
                    }
                }else {
                  echo "No posts found";
                }
                  
                  mysqli_stmt_close($stmt);
                ?>

                

              </div>
            </div>
          </div>
        </div>
        </main>

        <?php
include_once 'footer.php';
?>