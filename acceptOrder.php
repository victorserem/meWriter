<?php
include('auth.php');

// connect to the database
include('variables.php');

// confirm that the 'id' variable has been set
if (isset($_GET['id']) && is_numeric($_GET['id']))
{
	if(isset($_SESSION['writersId'])){
// get the 'id' variable from the URL
$id = $_GET['id'];
$writersId = $_SESSION['writersId'];

// update record from database
if ($stmt = $connection->prepare("UPDATE orders  SET orderStatus = 1 ,writersId = '$writersId' WHERE orderId = '$id';"))
{
$stmt->bind_param("i",$id);
$stmt->execute();
$stmt->close();?>
<script type="text/javascript">
	alert('test');
</script>
<?php
}
else
{
echo "ERROR: could not prepare SQL statement.";
}
$connection->close();

// redirect user after delete is successful
header("Location: newOrders.php");
}
else
{
	echo 'User ID not set';
}
}
else
// if the 'id' variable isn't set, redirect the user
{
header("Location: newOrders.php");
}

?>