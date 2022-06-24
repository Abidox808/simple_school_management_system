<?php 
include 'database_config.php';
if(isset($_POST['fullname']) && !empty($_POST['fullname']) && isset($_POST['filiere']) && !empty($_POST['filiere']) && isset($_POST['level']) && !empty($_POST['level'])){
    function query_execute($query){
        global $db_connect;
    $rslt=$db_connect->prepare($query);
    $rslt->execute();
    };

    $fname=$_POST['fullname'];
    $filliere=$_POST['filiere'];
    $level=$_POST['level'];

    $add="INSERT INTO `teachers` (`fullname`, `filiere`, `levell`) VALUES ('$fname', '$filliere', '$level')";
        
    query_execute($add);

    header('location:teachers.php');
    
}else{
    header('location:teachers.php');
}








?>