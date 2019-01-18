<?php
require('variables.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['username']))
{
        // removes backslashes
    $username = stripslashes($_REQUEST['username']);
    $hash = md5( rand(0,1000) );
        //escapes special characters in a string
    $username = mysqli_real_escape_string($connection,$username); 
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($connection,$email);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($connection,$password);
    $mobile = stripslashes($_REQUEST['mobile']);
    $mobile = mysqli_real_escape_string($connection,$mobile);
        $query = "INSERT into `writers` (writersName, writersPassword, writersEmail, writersMobile)
        VALUES ('$username', '".md5($password)."', '$email', '$mobile')";
        $result = mysqli_query($connection,$query);
        if($result){
         header("Location: login.php");
        }
}
?>