<?php
include_once 'header.php';
?>

<main>
          <div class="container-fluid">
            <div class="row top-buffer">
                <div class="col-9 rounded bg-beige1">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item active">Home</li>
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
                    <div class="col-2">
                    <button type="button" class="btn bg-blue d-inline" data-bs-toggle="modal" data-bs-target="#makePost">Create new post</button>
                  </div>
                  <div class="col-10">
                    <h3 class="display-7 text-center"> Recent</h3>
                    
                  </div>
                </div>


                <div class="modal fade" id="makePost" tabindex="-1" aria-labelledby="profile" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">


                        <form method="post" id="commentForm" action="includes/comment.inc.php">
                        <div class="modal-header">
                          <h5 class="modal-title" id="changeProfileHeading">Profile</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                              <label for="categoryId" class="form-label">Category ID</label>
                              <input type="text" name="categoryId" class="form-control required" id="categoryId" value="5" readonly>
                              <div id="userHelp" class="form-text">This cannot be changed</div>

                              <label for="username" class="form-label">Category Name</label>
                              <input type="text" name="categoryName" class="form-control required" id="categoryName" value="General" readonly>
                              <div id="userHelp" class="form-text">This cannot be changed</div>

                              <label for="userId" class="form-label">User ID</label>
                              <input type="text" name="userId" class="form-control required" id="userId" value="1" readonly>
                              <div id="userHelp" class="form-text">This is determined by your login credentials and cannot be changed</div>


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
                  $sql = "SELECT * FROM POST ORDER BY created_at DESC";
                  if (!mysqli_stmt_prepare($stmt, $sql)){
                    header("location: ../home.php?error=stmtFailed");
                  }
                  mysqli_stmt_execute($stmt);

                  $result = mysqli_stmt_get_result($stmt);
                  if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()) {
                      echo '<div class="row border-beige1">';
                      echo '<div class="row">';
                      echo '<div class="col-10">';
                      echo  '<h3 class="display-7 text-left"><u><a href="post.php?postId='.$row['post_id'].'&postTitle='.$row['title'].'">'.$row['title'].'</a></u></h3>';
                      echo  '<p>user no.'.$row['user_id'].'</p>';
                      echo '<div class="col-2">';
                      echo '<a href="#">edit</a>';
                      echo '<a href="#">delete</a>';
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