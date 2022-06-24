<?php 
include 'database_config.php';

if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['gender']) && isset($_POST['birthday']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['package'])){

$fname=$_POST['first_name'];
$lname=$_POST['last_name'];
$birth=$_POST['birthday'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$package=$_POST['package'];


$query="INSERT INTO `students` (`first_name`, `last_name`, `gender`, `birthday`, `email`, `phone` , `package`) VALUES ('$fname', '$lname', '$gender', '$birth', '$email', '$phone', '$package')";
$rslt=$db_connect->prepare($query);
$rslt->execute();

header('location:success.php');
}else{
    header('location:register.php');
}



?>