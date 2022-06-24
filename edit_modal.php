<?php 
include 'database_config.php';
if(isset($_POST['id'])){
    function query_execute($query){
        global $db_connect;
    $rslt=$db_connect->prepare($query);
    $rslt->execute();
    };
    $id=$_POST['id'];
    $update="UPDATE `students` SET ";
    $whre=" where id=$id";
    
    if(isset($_POST['fname']) && !empty($_POST['fname'])){
        
        $fname=$_POST['fname'];
        $update=$update."`first_name`".'='."'$fname'".$whre;
        query_execute($update);

    }if(isset($_POST['lname']) && !empty($_POST['lname'])){

        $lname=$_POST['lname'];
        $update="UPDATE `students` SET "."`last_name`".'='."'$lname'".$whre;
        query_execute($update);

    }if(isset($_POST['birthday']) && !empty($_POST['birthday'])){

        $birthday=$_POST['birthday'];
        $birthday = date("d-m-Y", strtotime($birthday));
        $update="UPDATE `students` SET "."`birthday`".'='."'$birthday'".$whre;
        query_execute($update);

    }if(isset($_POST['email']) && !empty($_POST['email'])){

        $email=$_POST['email'];
        $update="UPDATE `students` SET "."`email`".'='."'$email'".$whre;
        query_execute($update);

    }if(isset($_POST['phone']) && !empty($_POST['phone'])){

        $phone=$_POST['phone'];
        $update="UPDATE `students` SET "."`phone`".'='."'$phone'".$whre;
        query_execute($update);

    }if(isset($_POST['gender']) && !empty($_POST['gender'])){

        $gender=$_POST['gender'];
        $update="UPDATE `students` SET "."`gender`".'='."'$gender'".$whre;
        query_execute($update);

    }if(isset($_POST['level']) && !empty($_POST['level'])){

        $level=$_POST['level'];
        $update="UPDATE `students` SET "."`package`".'='."'$level'".$whre;
        query_execute($update);
    }

    header('location:students.php');
    
}else{
    header('location:students.php');
}








?>