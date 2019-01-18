<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Victor Ngure">

    <title>meWriter</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body" style="align-items: center;">

                    <form role="form" action="" method="post">

                            <fieldset>
                                <div class="form-group" style="align-self: center;">
                                    <input class="form-control" placeholder="Username" name="writersName" type="text" autofocus style="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                             <button type="submit"  class="btn btn-lg btn-success btn-block">Login</button>
                              <?php
require('variables.php');
 session_start();
// If form submitted, insert values into the database.
if (isset($_POST['writersName'])){
        // removes backslashes
    $writersName = stripslashes($_REQUEST['writersName']);
        //escapes special characters in a string
    $writersName = mysqli_real_escape_string($connection,$writersName);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($connection,$password);
    //Checking is user existing in the database or not
    $query = "SELECT * FROM `writers` WHERE writersName='$writersName' and writersPassword='".md5($password)."'";
    $result = mysqli_query($connection,$query) or die(mysql_error());
    $rows = mysqli_num_rows($result);
    $rs = mysqli_fetch_array($result);
        if($rows==1){
            $writersId=$rs['writersId'];
            $writersName = $rs['writersName'];
            $_SESSION['writersId']=$writersId;
            $_SESSION['writersName'] = $writersName;
            // Redirect user to index.php
        header("Location: index.php");
         }else{
    echo "
<p style='color:red;'>Username/password is incorrect. \n Kindly try loggin in again</p>
 <h4> </h4>";
    }
    }
    
    ?>  

                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
