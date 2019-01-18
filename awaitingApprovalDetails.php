<?php
ob_start();
include('auth.php');
include('variables.php');

// confirm that the 'id' variable has been set
if (isset($_GET['orderId']) && is_numeric($_GET['orderId']))
{
// get the 'id' variable from the URL
$id = $_GET['orderId'];
$_SESSION['orderId']=$id;
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
                $paperFormat = $row ['paperFormat'];
                $serviceType = $row ['serviceType'];
}
}
}
else
{
  header("Location:pendingOrders.php"); 
}
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
                    <?php echo $_SESSION['writersName'];?>  &nbsp<i class="fa fa-caret-down"></i>
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
                                            <a href="pendingOrders.php">Orders in progress</a>
                                        </li>
                                        <li>
                                            <a href="awaitingApproval.php">Pending Approval</a>
                                        </li>
                                        <li>
                                            <a href="revisedOrders.php">Revised Orders</a>
                                        </li>
                                        <li>
                                            <a href="completedOrders.php">Completed Orders</a>
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
                                    </tbody>
                                </table>
                                <div class="well">
                                <h4><strong>Description of the paper</strong></h4>
                                <p><?php echo $paperDescription?></p>
                                </div>
                                <div class="well">
                                <h4><strong>Assignment Files</strong></h4>
                                <?php
                                $sql = "SELECT * FROM answerFiles WHERE orderId='$id'";
                                    $result = $connection->query($sql);
                                    if ($result) {
                                        $rowCount = mysqli_num_rows($result);
                                        if($rowCount>0){
                                           while($row = $result->fetch_assoc()) { 
                                                $fileId = $row ['fileId'];
                                                $fileName = $row ['fileName'];
                                                ?>
                                                 <p><?php echo '<a href="downloadFile.php?fileName=' . $row ['fileName']. '">' .$fileName. '</a>'; 
                                                                          } 
                                                        }                
                                                else {
                                                    echo 'No assignment Files attached';
                                                      } 
                                                      }?></p>
                                </div>
                                <div class="well">
                                <h4 style="text-align:left;">
                                    <strong>My Uploads</strong>
                                    <span style="float:right;"><strong>Upload Date</strong></span>
                                </h4>
                                <?php
                                $sql = "SELECT * FROM answerFiles WHERE orderId='$id'";
                                    $result = $connection->query($sql);
                                    if ($result) {
                                        $rowCount = mysqli_num_rows($result);
                                        if($rowCount>0){
                                           while($row = $result->fetch_assoc()) { 
                                                $fileId = $row ['fileId'];
                                                $fileName = $row ['fileName'];
                                                $uploadDate = $row['uploadDate'];
                                                ?>
                                                 <p style="text-align:left;"><?php echo '<a href="downloadFile.php?fileName=' . $row ['fileName']. '">' .$fileName.'</a>
                                                 <span style="float:right;">'.$uploadDate.'</span>';
                                                                          } 
                                                        }                
                                                else {
                                                    echo 'No assignment Files attached';
                                                      } 
                                                      }  ?> </p>
                                </div>
                               </div>
                            <style>
.accordion {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
}

.active, .accordion:hover {
    background-color: #ccc; 
}

.coll_panel {
    padding: 0 18px;
    display: none;
    background-color: white;
    overflow: hidden;
}
.accordion:after {
    content: '\02795'; /* Unicode character for "plus" sign (+) */
    font-size: 13px;
    color: #777;
    float: right;
    margin-left: 5px;
}

.active:after {
    content: "\2796"; /* Unicode character for "minus" sign (-) */
}
</style>
<div class="well">
<h4><strong>Comments</strong></h4>
<?php
$id = $_GET['orderId'];
$_SESSION['orderId']=$id;
$sql = "SELECT * FROM comments WHERE orderId='".mysql_real_escape_string($id)."'";
$result = mysqli_query($connection, $sql) or die ("no query");
if ($result) {
    // output data of each row                    
   $result_array = array();
while($row = mysqli_fetch_assoc($result))
{
    $commentSubject = $row ['commentSubject'];
    $date = $row ['date'];
    $commentMessage = $row ['commentMessage'];
    $result_array[0] = $row['writersId'];
    $result_array[1] = $row['administratorsId'];
    $result_array[2] = $row['clientId'];
echo '
<button class="accordion">'.$commentSubject.'</button>
<div class="coll_panel">';
if($result_array[0]!=null || $result_array[0]!="")
        echo "<p> <strong>From:</strong> Writer</p>";
    else if($result_array[1]!=null || $result_array[1]!="")
        echo "<p> <strong>From:</strong> Administrator</p>";
    else if($result_array[2]!=null || $result_array[2]!="")
        echo "<p> <strong>From:</strong> Client</p>";
echo '<p> <strong>Date: </strong>'.$date.'</p>
<p><strong><u>Message</u></strong></p>
  <p>'.$commentMessage.'</p>
</div>';
                                        }
             }
?>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var coll_panel = this.nextElementSibling;
        if (coll_panel.style.display === "block") {
            coll_panel.style.display = "none";
        } else {
            coll_panel.style.display = "block";
        }
    });
}
</script>

                            </div>
                            <?php
                            if (isset($_POST['postComment'])) {
                                if(isset($_SESSION['orderId'])){
                                    $commentSubject = stripslashes($_REQUEST['commentSubject']);
                                    $commentSubject = mysqli_real_escape_string($connection,$commentSubject);
                                    $commentMessage = stripslashes($_REQUEST['commentMessage']);
                                    $commentMessage = mysqli_real_escape_string($connection,$commentMessage);
                                    $orderId = $_SESSION['orderId'];
                                    $writersId= $_SESSION['writersId'];
                                    $query="INSERT INTO comments (commentSubject, commentMessage, orderId,writersId) VALUES ('$commentSubject', '$commentMessage', '$orderId', '$writersId')";
                                    $result = mysqli_query($connection,$query);
                                    if($result){
                                        echo '<p style="color:green;"> Comment Posted </p>';
                                    }
                                    else{
                                        echo '<p style="color:red;">Unable to post comment. Kindly try again later</p>';
                                    }
                                }else{
                                     header("Location: revisedOrders.php");
                                }
                            }
                            ?>
                            <div class="well">
                                <section id="comment_section">
                               <h4><strong>Write a comment</strong></h4>
                               <form role="form" action="" method="post">
                                    <input type="text"  class="form-control" name="commentSubject" placeholder="Subject" required>
                                    <input type="text"  class="form-control" name="commentMessage" placeholder="Type your message here" required>
                                    <input type="submit" class="btn btn-default" value="Send" name="postComment" onclick="location.href='#comment_section';">
                               </form>
                               </section>
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
