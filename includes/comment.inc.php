<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST["submit"])){
    $postId = $_POST["postId"];
    $postTitle = $_POST["postTitle"];
    $userId = $_POST["userId"];
    $newCommentBody = $_POST["newCommentBody"];
    

    require_once 'db.inc.php';
    require_once 'functions.inc.php';

    
    
    /*
    if (emptyCommentInput($postId,$postTitle,$newCommentBody) !== false) {
        header("location: ../post.php?error=emptyInput");
        exit();
    }
    */
   
    $stmt = mysqli_stmt_init($conn);
    $sql = "INSERT INTO `db_10967677`.`COMMENT` (`user_id`, `comment_id`, `discussion_id`, `body`, `created_at`, `updated_at`) VALUES (?, NULL, ?, ?, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);";

    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../post.php?error=stmtFailed&title=".$postTitle."&catId=".$postId);
    }

    mysqli_stmt_bind_param($stmt, "sss", $userId, $postId, $newCommentBody);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../post.php?postTitle=".$postTitle."&postId=".$postId);
}
else {
    header("location: ../post.php?error=stmtFailed&postTitle=".$postTitle."&postId=".$postId);
    exit();
}