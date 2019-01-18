<?php
include('auth.php');
include('variables.php');

// confirm that the 'id' variable has been set
if (isset($_GET['orderId']) && is_numeric($_GET['orderId']))
{
// get the 'id' variable from the URL
$id = $_GET['orderId'];
$sql = "SELECT * FROM orders WHERE orderId='$id'";
$result = $connection->query($sql);
if ($result) {
    // output data of each row                    
    while($row = $result->fetch_assoc()) { 
        $orderCourse = $row ['orderCourse'];
         $orderTitle = $row ['orderTitle'];
          $pages = $row ['pages'];
           $deadline = $row ['deadline'];
            $fee = $row ['fee'];
             $paperDescription = $row ['paperDescription'];
              $academicLevel = $row ['academicLevel'];
               $titlePage = $row ['titlePage'];
                $assignmentFile = $row ['assignmentFile'];
                $paperFormat = $row ['paperFormat'];
                $serviceType = $row ['serviceType'];
}
}}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>meWriter</title>

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
                <a class="navbar-brand" href="index.html">meWriter</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                  
                   
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <?php echo $_SESSION['username'];?>  &nbsp<i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                     <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                            <a href="index.html"><i class="fa fa-home fa-fw"></i>Home</a>
                        </li>
                        
                     <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i>Orders<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="newOrders.php">New Orders</a>
                                </li>
                                <li>
                                    <a href="#">My Orders<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="pendingOrders.php">Pending Orders</a>
                                        </li>
                                        <li>
                                            <a href="#">Revised Orders</a>
                                        </li>
                                        <li>
                                            <a href="#">Completed Orders</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        </ul>
                        </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Order Details</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                        <tr>
                                            <th bgcolor="#D3D3D3">Order Id</th>
                                            <td colspan="2"><?php echo $id?></td>
                                            <td bgcolor="#D3D3D3" colspan="1";"><strong>Course</strong></td>
                                            <td colspan="2"><?php echo $orderCourse?></td>
                                        </tr>
                                         <tr>
                                            <th bgcolor="#D3D3D3">Deadline</th>
                                            <td colspan="2"><?php echo $deadline?></td>
                                            <td bgcolor="#D3D3D3" colspan="1"><strong>Paper Format</strong></td>
                                             <td colspan="2"><?php echo $paperFormat?></td>
                                        </tr>   
                                        <tr>
                                            <th bgcolor="#D3D3D3">Title</th>
                                            <td colspan="2"><?php echo $orderTitle?></td>
                                            <td bgcolor="#D3D3D3" colspan="1"><strong>Academic Level</strong></td>
                                             <td colspan="2"><?php echo $academicLevel?></td>
                                        </tr>   
                                        <tr>
                                            <th bgcolor="#D3D3D3">Fee</th>
                                            <td colspan="2"><?php echo $fee?></td>
                                            <td bgcolor="#D3D3D3" colspan="1"><strong>Title Page</strong></td>
                                             <td colspan="2"><?php echo $titlePage?></td>
                                        </tr>   
                                        <tr>
                                            <th bgcolor="#D3D3D3">Pages</th>
                                            <td colspan="2"><?php echo $pages?></td>
                                            <td bgcolor="#D3D3D3" colspan="1"><strong>Service Type</strong></td>
                                             <td colspan="2"><?php echo $serviceType?></td>
                                        </tr>    
                                         <tr>
                                            <th bgcolor="#D3D3D3" >Assignment File</th>
                                            <td colspan="4" type="file"><?php echo $assignmentFile?></td>
                                        </tr>                                       
                                    </tbody>
                                </table>
                                <div class="well">
                                <h4>Description of the paper</h4>
                                <p><?php echo $paperDescription?></p>
                                <?php echo '<a href="acceptOrder.php?id=' . $id. '"><button type="button" class="btn btn-default">Apply for job</button></a>';?>
                               
                            </div>
                          
    <!-- /#wrapper -->

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
