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
                                    <a href="viewproducts.php">View Categories</a>
                                </li>
                                <li>
                                    <a href="addproduct.php">Add Category</a>
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
                    <h1 class="page-header">Add Feature product</h1>
                    <form action="feature.php" method="post"  enctype="multipart/form-data"/>
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
   
        </td>
    </tr>
    <tr><td>Name</td><td><input type="text" name="productname" placeholder="Like V neck"></td></tr>
    <tr><td>Description</td><td><input type="text" name="description" placeholder="Like new Polo design v neck shirts"></td></tr>
    <tr><td>Price</td><td><input type="text" name="price" placeholder="in KSH"></td></tr>
<!--     <tr><td>Quantity</td><td><input type="text" name="itemQuantity" placeholder="the in Available stock "></td></tr>
 -->    <tr><td>Picture</td><td><input type="file" name="itemImage"></td></tr>
    <tr><td><button type="submit" name="submit" class="btn btn-success">Add Item</button></td><td><button type="reset" class="btn btn-warning">Clear</button></td></tr>

</table>
    <br>
    </br>
          <?php
 include_once'variables.php';
if(isset($_POST["submit"])){
    
    $productname = $_POST["productname"];
    $price = $_POST["price"];
    $categories = $_POST["categories"];
    $description = $_POST["description"];

    if(($productname!="") && ($price!="")&&($categories!="") 
        ){
   $name = $_FILES['itemImage']['name'];
    $extension=strtolower(substr($name, -3));
    $size = $_FILES['itemImage']['size'];
    $type = $_FILES['itemImage']['type'];
    $temp_name = $_FILES['itemImage']['tmp_name'];
    $status = "2";
    
    //moving file to specified location
    if($extension=='jpg'||$extension=='png'){
    $location = '../backend/images/';
    if(move_uploaded_file($temp_name, $location.$name)){
        $path=$location.$name;
   
    $query = "INSERT INTO products(name,price,categoryname,productimage,description, status)";
    $query .="VALUES ('$productname',$price,'$categories','$name', '$description', $status)";
      //Handle other code here
 $result= mysqli_query($connection,$query);
    
  }
}
    // $name = $_FILES['itemImage']['name'];
    // $ extension=strtolower(substr($name, -3));
    // $size = $_FILES['itemImage']['size'];
    // $type = $_FILES['itemImage']['type'];
    // $temp_name = $_FILES['itemImage']['tmp_name']; 
    // if($extension=='jpg'||$extension=='png'){
    // $location = '/opt/lampp/htdocs/tastic/backend/images/';
    // if(move_uploaded_file($temp_name, $location.$name)){
      
    
    }
  

    if(!$result){
      die ('Query Failed' . mysqli_error($connection));
        
        
    }
    
    if($productname &&$categories && $price )
    {
    echo "You have added  "."<b>$productname</b>";
    echo " category "."<b>$categories</b>";
    echo "  to be sold at   "."<b>KSh. $price</b>";
    echo "  described by    "."<b> $description</b>";
    }
    else{
        
        echo "Warning:Fields Cannot be Blank!";
 }}

?>
     </form>
       <tfoot>
        <tr><td colspan="9">
          <div class="text-center">
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
                                
                                
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

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
