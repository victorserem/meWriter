 <?php
require('variables.php');
 session_start();
// If form submitted, insert values into the database.
if (isset($_POST['username'])){
        // removes backslashes
    $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
    $username = mysqli_real_escape_string($connection,$username);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($connection,$password);
    //Checking is user existing in the database or not
    $query = "SELECT * FROM `users` WHERE userName='$username' and userPassword='".md5($password)."'";
    $result = mysqli_query($connection,$query) or die(mysql_error());
    $rows = mysqli_num_rows($result);
    $rs = mysqli_fetch_array($result);
    $userId=$rs['userId'];
    $userEmail = $rs['userEmail'];
    $_SESSION['userId']=$userId;
    $_SESSION['userEmail']=$userEmail;
        if($rows==1){
        $_SESSION['username'] = $username;
            // Redirect user to index.php
        header("Location: index.php");
         }else{
    echo "
<h3>Username/password is incorrect.</h3>
 <h4>Kindly try loggin in again </h4>";
    }
    }
    ?>  