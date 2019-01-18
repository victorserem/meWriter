<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tastic</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">

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

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Tastic Admin Panel</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                  
                   
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                    
                            <div class="input-group custom-search-form">
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Products<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="viewproducts.php">View Products</a>
                                </li>
                                <li>
                                    <a href="addproduct.php">Add Product</a>
                                </li>
                                <li>
                                    <a href="editproducts.php">Edit Products</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-table fa-fw"></i> Categories<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="viewcategories.php">View Categories</a>
                                </li>
                                <li>
                                    <a href="addcategory.php">Add Category</a>
                                </li>
                                <li>
                                    <a href="editproduct.php">Edit Categories</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                       <li>
                            <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Users</a>
                        </li>
                        
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper" align="center">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit product</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
<?php
/* 
 EDIT.PHP
 Allows user to edit specific entry in database
*/

 // creates the edit record form
 // since this form is used multiple times in this file, I have made it a function that is easily reusable
 function renderForm($id, $name, $price, $category ,$description  ,$error )
 {
 ?>

 <body>
 <?php 
 // if there are any errors, display them
 if ($error != '')
 {
 echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
 }
 ?> 
 
 <form action="editproduct.php" method="post">
 <input type="hidden" name="id" value="<?php echo $id; ?>"/>
 <div>
<!--  <p><strong>ID:</strong> <?php echo $id; ?></p>

 -->
 <br>
 <table class="table table-bordered" id="addItemTable">
 <?php

$connection = new mysqli('localhost', 'root', '','tastic');
$sql = "SELECT categoryname FROM categories";
$result = mysqli_query($connection, $sql);

echo " <tr><td> Category: </strong> <select name='categories'>";
while ($row = mysqli_fetch_array($result)) {
    echo "<option value='" . $row['categoryname'] . "'>" . $row['categoryname'] . "</option>";
}
echo "</select>";

?>
   <option><Strong>Previous:</Strong><?php echo $category; ?></option>
   
        </td>
    </tr>
    <tr><td>Name</td><td><input type="text"  name="name" value="<?php echo $name;?>"></td></tr>
    <tr><td>Description</td><td><input type="text" name ="description"  value="<?php echo $description; ?>"></td></tr>
    <tr><td>Price</td><td><input type="text" name="price" value="<?php echo $price; ?>"></td></tr>
  <tr><td>Picture</td><td><input type="file" name="itemImage"></td></tr>
    <tr><td><button type="submit" name="submit" class="btn btn-success">Submit</button></td><td><button type="reset" class="btn btn-warning">Clear</button></td></tr>

</table>
 </div>
 </form> 
 </body>
<!-- </html> -->


 <?php
 }



 // connect to the database
 include('variables.php');
 
 // check if the form has been submitted. If it has, process the form and save it to the database
 if (isset($_POST['submit']))
 { 
 // confirm that the 'id' value is a valid integer before getting the form data
 if (is_numeric($_POST['id']))
 {
 // get form data, making sure it is valid
 $id = $_POST['id'];
 $name = mysqli_real_escape_string($connection, $_POST['name']);
 $price = mysqli_real_escape_string($connection, $_POST['price']);
 $category = mysqli_real_escape_string($connection, $_POST['categories']); 
$description = mysqli_real_escape_string($connection, $_POST['description']);

 // check that all fields are both filled in
 if ($name == ''  || $price== '' || $description== '' )
 {
 // generate error message
 $error = 'ERROR: Please fill in all required fields!';
 
 //error, display form
 renderForm($id, $name, $price, $category ,$description  ,$error );
 }
 else
 {
 // save the data to the database
 mysqli_query($connection, "UPDATE products SET name='$name', price='$price' , categoryname='$category' , description = '$description' WHERE id='$id'")
 or die(mysqli_error($connection)); 
 
 // once saved, redirect back to the view page
//header("Location: editproduct.php"); 
 echo "You have added  "."<b>$name</b>";
    echo " category "."<b>$category</b>";
    echo "  to be sold at   "."<b>KSh. $price</b>";
 }
 }
 else
 {
 // if the 'id' isn't valid, display an error
 echo 'Error!';
 }
 }
 else
 // if the form hasn't been submitted, get the data from the db and display the form
 {
 
 // get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)
 if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
 {
 // query db
 $id = $_GET['id'];
 $result = mysqli_query($connection,"SELECT * FROM products WHERE id=$id")
 or die(mysqli_error($connection)); 
 $row = mysqli_fetch_array($result);
 
 // check that the 'id' matches up with a row in the databse
 if($row)
 {
 
 // get data from db
 $name = $row['name'];
 $price = $row['price'];
 $category=$row['categoryname'];
$description=$row['description'];
 
 // show form
 renderForm($id, $name, $price, $category ,$description  ,'');
  
 }
 else
 // if no match, display result
 {
 echo "No results!";
 }
 }
 else
 // if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error
 {
 echo 'Error!';
 }
 }
?>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/jquery/jquery2.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="vendor/raphael/raphael.min.js"></script>
    <script src="vendor/morrisjs/morris.min.js"></script>
    <script src="data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
