<?php 
$username=$_POST['username'];
$pass=$_POST['pass'];
$db_connect=new PDO("mysql:host=localhost;dbname=ama_school;port=3306;charset=utf8",'root','');
$query=$db_connect->prepare('SELECT COUNT(*) FROM users where username=? AND pass=? ');
$query->execute(array($username,$pass));

if($query->fetchColumn()>0){

    session_start();
    $_SESSION['username']=$_POST['username'];
    $_SESSION['password']=$_POST['pass'];

    header('location:dashboard.php');
}else{
    header('location:admin.php?msg=failed');
}

?>