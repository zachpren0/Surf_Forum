<?php
include_once 'header.php';
include_once 'includes/db.inc.php';
include_once 'includes/functions.inc.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$categoryTitle = "none";
$categoryId = "none";
if(isset($_GET['title'])) {
  $categoryTitle = $_GET['title'];
}
if(isset($_GET['catId'])) {
  $categoryId = $_GET['catId'];
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
                    <button type="button" class="btn bg-blue d-inline">Create new post</button>
                  </div>
                  <div class="col-10">
                    <h3 class="display-7 text-center"><?php echo $categoryTitle; ?></h3>
                    
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