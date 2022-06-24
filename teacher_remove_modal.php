<?php 
include 'database_config.php';
if(isset($_POST['id'])){
    $id=$_POST['id'];
    $whre=" where id=$id";
    $query="DELETE FROM teachers ".$whre;
    $rslt=$db_connect->prepare($query);
    $rslt->execute();


    header('location:teachers.php');
    
}else{
    header('location:teachers.php');
}