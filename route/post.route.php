<?php

session_start();
if(isset($_GET['postTitle']) && isset($_GET['postId'])) {
    $_SESSION['postTitle'] = $_GET['postTitle'];
    $_SESSION['postId'] = $_GET['postId'];
    header('location: ../post.php');
}
else{
    header('location: ../home.php');
}

