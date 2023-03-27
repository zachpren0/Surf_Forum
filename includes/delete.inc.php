<?php
// includes/delete.inc.php

if(isset($_GET['post_id'])) {
    // retrieve the post ID from the GET parameter
    $deleteId = $_GET['post_id'];

    require_once 'db.inc.php';
    require_once 'functions.inc.php';
    
    // delete the row from the database
    
    $sql = "DELETE FROM POST WHERE post_id=?;";
    delete($conn, $sql, $deleteId);
    // redirect the user to the post page
    header("location: ../post.php?delete=success");
    exit();
} 
else if ((isset($_GET['comment_id']))){
    // retrieve the post ID from the GET parameter
    $deleteId = $_GET['comment_id'];

    require_once 'db.inc.php';
    require_once 'functions.inc.php';
    
    // delete the row from the database
    
    $sql = "DELETE FROM COMMENT WHERE comment_id=?;";
    delete($conn, $sql, $deleteId);
    // redirect the user to the post page
    header("location: ../post.php?delete=success");
    exit();
}
else {
    // if the post ID is not set, redirect the user to the post page
    header("location: ../post.php?error=idNotSet");
    exit();
}







