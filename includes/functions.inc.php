<?php
  //we left off at
    //https://www.youtube.com/watch?v=gCo6JqGMi30&list=PL0eyrZgxdwhyfSPF6sHd7Ibm3R0THoOJd&index=3
    //

    function debug_to_console($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);
    
        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }

//signup functions

function emptySignupInput($email,$username,$password,$password2) {
    $result;

    

    if ( empty($email) || empty($username) || empty($password) || empty($password2) ){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function invalidUid($username) {
    $result;
    if (!preg_match("/^[a-zA-Z0-9_]*$/", $username)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function invalidEmail($email) {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function passwordMatch($password,$password2){
    $result;
    if ($password !== $password2){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function uidExists($conn, $username, $email){
    // prepare a statement to query the database for the username
    $stmt = mysqli_stmt_init($conn);
    $sql = "SELECT * FROM USER WHERE username=? OR email = ?;";

    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtFailed");
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    
    if ($row = mysqli_fetch_assoc($result)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
  mysqli_stmt_close($stmt);
}

function createUser($conn,$email,$username,$password){
    // prepare a statement to query the database for the username
    $stmt = mysqli_stmt_init($conn);
    $sql = "INSERT INTO USER (username, password_hash, email) VALUES (?,?,?);";

    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtFailed");
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $username, $hashedPassword, $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../signup.php?error=none");
    exit();
  
}


//login functions
/*
function emptySignupInput($username,$password) {
    $result;

    

    if ( empty($username) || empty($password)  ){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
*/
function loginUser($conn,$username,$password){

    $uidExists = uidExists($conn, $username, $username);

    if ($uidExists === false){
        header("location: ../login.php?error=wrongLogin");
        exit();
    }

    $passwordHashed = $uidExists["password_hash"];

    $checkPassword = password_verify($password,$passwordHashed);

    if ( $checkPassword === false) {
        header("location: ../login.php?error=wrongLogin");
        exit();
    } else if ($checkPassword === true){
        session_start();
        $_SESSION["userid"] = $uidExists["id"];
        $_SESSION["username"] = $uidExists["username"];
        header("location: ../home.php");
        exit();
    }


}

//post creation
function emptyPostInput($categoryId,$categoryName,$newPostTitle,$newPostBody) {
    $result;
    if ( empty($categoryId) || empty($categoryName) || empty($newPostTitle) || empty($newPostBody) ){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}