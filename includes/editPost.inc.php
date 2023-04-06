<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST["submit"])){
    $postId = $_POST["editPostId"];
    $newPostBody = $_POST["editPostBody"];
    

    require_once 'db.inc.php';
    require_once 'functions.inc.php';

    
    
    
   
    $stmt = mysqli_stmt_init($conn);
    $sql = "UPDATE `POST` SET `body`=?, `updated_at`=CURRENT_TIMESTAMP WHERE `post_id`=?";

    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../post.php?error=stmtFailed");
    }

    mysqli_stmt_bind_param($stmt, "si",  $newPostBody, $postId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../post.php");
   debug_to_console('yes');
   debug_to_console($postId);
}
else {
    header("location: ../post.php?error=stmtFailed");
    exit();
}