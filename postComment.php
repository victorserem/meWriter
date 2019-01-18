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
                                        echo '<p> Comment Posted </p>';
                                    }
                                }else{
                                     header("Location: revisedOrders.php");
                                }
                            }
                            ?>