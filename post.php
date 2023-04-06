<?php
include_once 'header.php';
include_once 'includes/db.inc.php';
include_once 'includes/functions.inc.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$postTitle = "none";
$postId = "none";
$postBody = 'load issue';






if(isset($_SESSION['postTitle'])) {
  $postTitle = $_SESSION['postTitle'];
  //debug_to_console($postTitle);
}
if(isset($_SESSION['postId'])) {
  $postId = $_SESSION['postId'];
  $catTitle = getCategoryTitle($postId, $conn);
  $postBody = getPostBody($postId, $conn);
  //debug_to_console($postBody);
}


?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
   $(document).ready(function() {
   $('.edit-comment-btn').click(function() {
   var commentId = $(this).data('comment-id');
   var commentBody =$(this).data('comment-body');
   $('#editCommentId').val(commentId);
   $('#editCommentBody').val(commentBody); });

  });

  $(document).ready(function() {
  $('.edit-post-btn').click(function() {
    var postBody = $(this).data('post-body');
    $('#editPostBody').val(postBody);
  });
});

  
</script>
        <main>
          <div class="container-fluid">
            <div class="row top-buffer">
              <div class="col-9 rounded bg-beige1">
                  <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="home.php">Home</a></li>
                        <?php
                        if(isset($catTitle)) {
                          echo "<li class='breadcrumb-item active'><a href='category.php'>".$catTitle."</a></li>";
                        }?>
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
                    echo '<h3 class="display-7 text-left">'.$row['title'].'</h3>';
                      echo '<p>User: <a href="account.php?id='.$row['user_id'].'">'.fetchUserById($conn, $row['user_id'])['username'].'</a></p>';
                      echo '</div>';
                    echo '<div class="col-2">';
                          //debug_to_console($_SESSION["userid"]);
                          //debug_to_console($row["user_id"]);
                      if (isset($_SESSION["userid"])) {
                        if ($_SESSION["userid"] === $row['user_id'] || isset($_SESSION["admin"]) ){
                          
                    //echo '<button type="button" class="btn bg-blue d-inline m-1" data-bs-toggle="modal" data-bs-target="#editPost">edit</button>';
                    echo '<button type="button" class="btn bg-blue d-inline m-1 edit-post-btn" data-bs-toggle="modal" data-bs-target="#editPost" data-post-body="'.$postBody.'">edit</button>';
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
                          <h5 class="modal-title" id="changeProfileHeading">Create New Comment</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div style="display: none;">
                              <label for="postId" class="form-label">Post ID</label>
                              <input type="text" name="postId" class="form-control required" id="postId" value="<?php echo $postId ?>" readonly>
                              <div id="userHelp" class="form-text">This cannot be changed</div>

                              <label for="username" class="form-label">Post Name</label>
                              <input type="text" name="postTitle" class="form-control required" id="postTitle" value="<?php echo $postTitle ?>" readonly>
                              <div id="userHelp" class="form-text">This cannot be changed</div>

                              <label for="userId" class="form-label">User ID</label>
                              <input type="text" name="userId" class="form-control required" id="userId" value="<?php if (isset($_SESSION['userid'])){echo $_SESSION['userid'];} ?>" readonly>
                              <div id="userHelp" class="form-text">This is determined by your login credentials and cannot be changed</div>
                            </div>

                              
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
                  <!-- comments -->

                  <!-- edit comment modal -->
                  

                  <div class="modal fade" id="editComment" tabindex="-1" aria-labelledby="profile" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">

                      <form method="post" id="commentForm" action="includes/editComment.inc.php">
                        <div class="modal-header">
                          <h5 class="modal-title" id="changeProfileHeading">Edit Comment</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                              <div style="display: none;">
                              <label for="editCommentID" class="form-label">Comment ID</label>
                              
                              <input type="text" name="editCommentID" class="form-control required" id="editCommentId" value="" readonly>
                              <div id="userHelp" class="form-text">This cannot be changed</div>


                              <label for="userId" class="form-label">User ID</label>
                              <input type="text" name="userId" class="form-control required" id="userId" value="<?php if (isset($_SESSION['userid'])){echo $_SESSION['userid'];} ?>" readonly>
                              <div id="userHelp" class="form-text">This is determined by your login credentials and cannot be changed</div>
                              </div>

                              
                              Edit your comment here:
                              <textarea name="newCommentBody" rows="5" cols="61"  class="form-control required" id="editCommentBody" value=""></textarea>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" name="submit" class="btn btn-primary">Edit Comment</button>
                        </div>
                      </div>
                    </form>

                    </div>
                  </div>

                  <!-- END edit comment modal -->
                  <!-- edit post modal -->

                  <div class="modal fade" id="editPost" tabindex="-1" aria-labelledby="profile" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">

                      <form method="post" id="commentForm" action="includes/editPost.inc.php">
                        <div class="modal-header">
                          <h5 class="modal-title" id="changeProfileHeading">Edit Post</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                              <div style="display: none;">
                              <label for="editPostId" class="form-label">Post ID</label>
                              <input type="text" name="editPostId" class="form-control required" id="editPostId" value="<?php echo $postId ?>" readonly>
                              <div id="userHelp" class="form-text">This cannot be changed</div>

                              <label for="postTitle" class="form-label">Post Name</label>
                              <input type="text" name="postTitle" class="form-control required" id="postTitle" value="<?php echo $postTitle ?>" readonly>
                              <div id="userHelp" class="form-text">This cannot be changed</div>

                              <label for="userId" class="form-label">User ID</label>
                              <input type="text" name="userId" class="form-control required" id="userId" value="<?php if (isset($_SESSION['userid'])){echo $_SESSION['userid'];} ?>" readonly>
                              <div id="userHelp" class="form-text">This is determined by your login credentials and cannot be changed</div>


                              
                             </div>
                             Edit your post here:
                              <textarea name="editPostBody" rows="5" cols="61"  class="form-control required" id="editPostBody" value=""></textarea>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" name="submit" class="btn btn-primary">Edit Post</button>
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
                  
                  //edit comment array
                  $comment_ids = array();
                  $index = 0; 

                  if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()) {

                      echo '<div class="row border-beige1">';
                      echo '<div class="row">';
                      echo '<div class="col-10">';
                      echo '<p>User: <a href="account.php?id='.$row['user_id'].'">'.fetchUserById($conn, $row['user_id'])['username'].'</a></p>';
                      echo '</div>';
                      echo '<div class="col-2">';
                      if (isset($_SESSION["userid"])) {
                        if ($_SESSION["userid"] === $row['user_id'] || isset($_SESSION["admin"]) ){
                      echo '<button type="button" class="btn bg-blue d-inline m-1 edit-comment-btn" data-bs-toggle="modal" data-bs-target="#editComment" data-comment-id="'.$row['comment_id'].'" data-comment-body="'.$row['body'].'">edit</button>';
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