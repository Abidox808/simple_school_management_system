<?php 
include 'database_config.php';
if(isset($_POST['id'])){
    function query_execute($query){
        global $db_connect;
    $rslt=$db_connect->prepare($query);
    $rslt->execute();
    };
    $id=$_POST['id'];
    $update="UPDATE `teachers` SET ";
    $whre=" where id=$id";
    
    if(isset($_POST['fullname']) && !empty($_POST['fullname'])){
        
        $fullname=$_POST['fullname'];
        $update=$update."`fullname`".'='."'$fullname'".$whre;
        query_execute($update);

    }if(isset($_POST['filiere']) && !empty($_POST['filiere'])){

        $filiere=$_POST['filiere'];
        $update="UPDATE `teachers` SET "."`filiere`".'='."'$filiere'".$whre;
        query_execute($update);

    }if(isset($_POST['level']) && !empty($_POST['level'])){

        $level=$_POST['level'];
        $update="UPDATE `teachers` SET "."`levell`".'='."'$level'".$whre;
        query_execute($update);
    }

    header('location:teachers.php');
    
}else{
    header('location:teachers.php');
}








?>