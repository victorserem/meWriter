<?php
session_start();
if(!isset($_SESSION["writersId"])){
header("Location: login.php");
exit(); }
?>