<?php
include_once 'header.php';
include_once 'includes/db.inc.php';
include_once 'includes/functions.inc.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$postTitle = "none";
$postId = "none";

/*
if(isset($_GET['postTitle'])) {
  $postTitle = $_GET['postTitle'];
}
if(isset($_GET['postId'])) {
  $postId = $_GET['postId'];
}*/

if(isset($_SESSION['postTitle'])) {
  $postTitle = $_SESSION['postTitle'];
  debug_to_console($postTitle);
}
if(isset($_SESSION['postId'])) {
  $postId = $_SESSION['postId'];
}
?>

        <main>
          <div class="container-fluid">
            <div class="row top-buffer">
              <div class="col-9 rounded bg-beige1">
                  <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="home.php">Home</a></li>
                        <li class="breadcrumb-item active"> <?php echo $postTitle; ?> </li>
                      </ol>
                  </nav>
              </div>
              <div class="col-3">
                <div class="input-group">
                  <input type="search" class="form-control rounded-left" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                  <button type="button" class="btn bg-blue text-black">search</button>
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
                    
                  <div class="col-10">
                    <h3 class="display-7 text-center"> <?php echo $postTitle; ?> </h3>
                    
                  </div>
                </div>

                <!-- post -->
                <?php
                  $stmt = mysqli_stmt_init($conn);
                  $sql = "SELECT * FROM POST WHERE post_id=?;";
                  if (!mysqli_stmt_prepare($stmt, $sql)){
                    header("location: ../post.php?error=stmtFailed");
                  }
                  mysqli_stmt_bind_param($stmt, "s", $postId);
                  mysqli_stmt_execute($stmt);

                  $result = mysqli_stmt_get_result($stmt);
                  //debug_to_console($result->num_rows);
                  if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()) {
                      echo '<div class="row border-beige1">';
                      echo '<div class="row">';
                  echo '<div class="col-10">';
                    echo '<h3 class="display-7 text-left"><u><a href="#">'.$row['title'].'</a></u></h3>';
                      echo '<p>'.fetchUserById($conn, $row['user_id'])['username'].'</p>';
                      echo '</div>';
                    echo '<div class="col-2">';
                          //debug_to_console($_SESSION["userid"]);
                          //debug_to_console($row["user_id"]);
                      if (isset($_SESSION["userid"])) {
                        if ($_SESSION["userid"] === $row['user_id'] || isset($_SESSION["admin"]) ){
                          
                    echo '<button type="button" class="btn bg-blue d-inline m-1" data-bs-toggle="modal" data-bs-target="#editPost">edit</button>';
                    echo '<button type="button" class="btn bg-blue d-inline m-1" data-bs-toggle="modal" data-bs-target="#"><a style="text-decoration: none; color: black;"   href="includes/delete.inc.php?post_id='.$row['post_id'].'">delete</a></button>'; 
                        }
                    }
                      echo '</div>';
                    echo '</div>';
                  echo '<div class="row">';
                  echo '<p>';
                      echo $row['body'];
                      echo '</p>';
                    echo '</div>';
                  echo '<div class="row">';
                  if(isset($_SESSION['userid'])){echo '<button type="button" class="btn bg-blue d-inline" data-bs-toggle="modal" data-bs-target="#makeComment">Comment</button>';}
                    echo '</div>';
                echo '</div>';
                    }
                }else {
                  echo "No posts found";
                }
                  
                  mysqli_stmt_close($stmt);
                ?>

                    

                <!-- create new comment modal-->
                <div class="modal fade" id="makeComment" tabindex="-1" aria-labelledby="profile" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">

                      <form method="post" id="commentForm" action="includes/comment.inc.php">
                        <div class="modal-header">
                          <h5 class="modal-title" id="changeProfileHeading">Profile</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                              <label for="postId" class="form-label">Post ID</label>
                              <input type="text" name="postId" class="form-control required" id="postId" value="<?php echo $postId ?>" readonly>
                              <div id="userHelp" class="form-text">This cannot be changed</div>

                              <label for="username" class="form-label">Post Name</label>
                              <input type="text" name="postTitle" class="form-control required" id="postTitle" value="<?php echo $postTitle ?>" readonly>
                              <div id="userHelp" class="form-text">This cannot be changed</div>

                              <label for="userId" class="form-label">User ID</label>
                              <input type="text" name="userId" class="form-control required" id="userId" value="<?php if (isset($_SESSION['userid'])){echo $_SESSION['userid'];} ?>" readonly>
                              <div id="userHelp" class="form-text">This is determined by your login credentials and cannot be changed</div>


                              
                                Type your comment here:
                              <textarea name="newCommentBody" rows="5" cols="61"  class="form-control required" id="InputBreak" value="Account_Break"></textarea>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" name="submit" class="btn btn-primary">Edit Comment</button>
                        </div>
                      </div>
                    </form>

                    </div>
                  </div>
                  <!-- comments -->

                  <!-- edit comment modal edit post next -->


                  <div class="modal fade" id="editPost" tabindex="-1" aria-labelledby="profile" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">

                      <form method="post" id="commentForm" action="includes/comment.inc.php">
                        <div class="modal-header">
                          <h5 class="modal-title" id="changeProfileHeading">Profile</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                              <label for="postId" class="form-label">Post ID</label>
                              <input type="text" name="postId" class="form-control required" id="postId" value="<?php echo $postId ?>" readonly>
                              <div id="userHelp" class="form-text">This cannot be changed</div>

                              <label for="username" class="form-label">Post Name</label>
                              <input type="text" name="postTitle" class="form-control required" id="postTitle" value="<?php echo $postTitle ?>" readonly>
                              <div id="userHelp" class="form-text">This cannot be changed</div>

                              <label for="userId" class="form-label">User ID</label>
                              <input type="text" name="userId" class="form-control required" id="userId" value="<?php if (isset($_SESSION['userid'])){echo $_SESSION['userid'];} ?>" readonly>
                              <div id="userHelp" class="form-text">This is determined by your login credentials and cannot be changed</div>


                              
                                Type your comment here:
                              <textarea name="newCommentBody" rows="5" cols="61"  class="form-control required" id="InputBreak" value="Account_Break"></textarea>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" name="submit" class="btn btn-primary">Create Comment</button>
                        </div>
                      </div>
                    </form>

                    </div>
                  </div>

                  <!-- END edit comment modal -->

                  <div class="modal fade" id="editComment" tabindex="-1" aria-labelledby="profile" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">

                      <form method="post" id="commentForm" action="includes/comment.inc.php">
                        <div class="modal-header">
                          <h5 class="modal-title" id="changeProfileHeading">Profile</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                              <label for="postId" class="form-label">Post ID</label>
                              <input type="text" name="postId" class="form-control required" id="postId" value="<?php echo $postId ?>" readonly>
                              <div id="userHelp" class="form-text">This cannot be changed</div>

                              <label for="username" class="form-label">Post Name</label>
                              <input type="text" name="postTitle" class="form-control required" id="postTitle" value="<?php echo $postTitle ?>" readonly>
                              <div id="userHelp" class="form-text">This cannot be changed</div>

                              <label for="userId" class="form-label">User ID</label>
                              <input type="text" name="userId" class="form-control required" id="userId" value="<?php if (isset($_SESSION['userid'])){echo $_SESSION['userid'];} ?>" readonly>
                              <div id="userHelp" class="form-text">This is determined by your login credentials and cannot be changed</div>


                              
                                Type your comment here:
                              <textarea name="newCommentBody" rows="5" cols="61"  class="form-control required" id="InputBreak" value="Account_Break"></textarea>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" name="submit" class="btn btn-primary">Create Comment</button>
                        </div>
                      </div>
                    </form>

                    </div>
                  </div>

                  <!-- end edit post module -->

                <?php
                  $stmt = mysqli_stmt_init($conn);
                  $sql = "SELECT * FROM COMMENT WHERE discussion_id=?;";
                  if (!mysqli_stmt_prepare($stmt, $sql)){
                    header("location: ../post.php?error=stmtFailed");
                  }
                  mysqli_stmt_bind_param($stmt, "s", $postId);
                  mysqli_stmt_execute($stmt);

                  $result = mysqli_stmt_get_result($stmt);
                  //debug_to_console($result->num_rows);
                  if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()) {
                      echo '<div class="row border-beige1">';
                      echo '<div class="row">';
                      echo '<div class="col-10">';
                      echo '<p>user no.'.$row['user_id'].'</p>';
                      echo '</div>';
                      echo '<div class="col-2">';
                      if (isset($_SESSION["userid"])) {
                        if ($_SESSION["userid"] === $row['user_id'] || isset($_SESSION["admin"]) ){
                      echo '<button type="button" class="btn bg-blue d-inline m-1" data-bs-toggle="modal" data-bs-target="#editComment">edit</button>';
                      echo '<button type="button" class="btn bg-blue d-inline m-1" data-bs-toggle="modal" data-bs-target="#"><a style="text-decoration: none; color: black;"  href="includes/delete.inc.php?comment_id='.$row['comment_id'].'">delete</a></button>';
                        }
                    }
                      echo  '</div>';
                      echo  '</div>';
                      echo  '<div class="row">';
                      echo  '<p>';
                        echo $row['body'];   
                      echo    '</p>';
                      echo  '</div>';
                      echo '</div>';
                    }
                  }else {
                    echo 'No comments yet';
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