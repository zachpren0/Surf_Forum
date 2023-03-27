<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST["submit"])){
    $categoryId = $_POST["categoryId"];
    $categoryName = $_POST["categoryName"];
    $userId = $_POST["userId"];
    $newPostTitle = $_POST["newPostTitle"];
    $newPostBody = $_POST["newPostBody"];
    

    require_once 'db.inc.php';
    require_once 'functions.inc.php';

    
    

    if (emptyPostInput($categoryId,$categoryName,$newPostTitle,$newPostBody) !== false) {
        header("location: ../category.php?error=emptyInput");
        exit();
    }
   
    $stmt = mysqli_stmt_init($conn);
    $sql = "INSERT INTO `db_10967677`.`POST` (`post_id`, `user_id`, `title`, `body`, `created_at`, `updated_at`, `category_id`) VALUES (NULL, ?, ?, ?, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, ?);";

    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../category.php?error=stmtFailed&title=".$categoryName."&catId=".$categoryId);
    }

    mysqli_stmt_bind_param($stmt, "ssss", $userId, $newPostTitle, $newPostBody, $categoryId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../category.php?title=".$categoryName."&catId=".$categoryId);
}
else {
    header("location: ../category.php?title=".$categoryName."&catId=".$categoryId);
    exit();
}