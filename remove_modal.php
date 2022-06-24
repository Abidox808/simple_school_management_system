<?php 
include 'database_config.php';
if(isset($_POST['id'])){
    $id=$_POST['id'];
    $whre=" where id=$id";
    $query="DELETE FROM students ".$whre;
    $rslt=$db_connect->prepare($query);
    $rslt->execute();


    header('location:students.php');
    
}else{
    header('location:students.php');
}