<?php
include 'database_config.php';
//fetch new students with limit of last 5 students only
$query="SELECT id,first_name,last_name,package FROM students ORDER BY id DESC LIMIT 5";
$stmt=$db_connect->prepare($query);
$stmt->execute();

//fetch new payments for last 5 students only
$query2="SELECT id,first_name,last_name FROM students ORDER BY id DESC LIMIT 5";
$stmt2=$db_connect->prepare($query2);
$stmt2->execute();

//count all students
$query3="SELECT COUNT(*) FROM students";
$stdt=$db_connect->query($query3);
$count=$stdt->fetchColumn();

//fetch income
$query4="SELECT count(package) as count,package FROM ama_school.students group by package";
$rslt=$db_connect->prepare($query4);
$rslt->execute();

//calculate total income
$total=0;
while($income=$rslt->fetch(PDO::FETCH_ASSOC)){
    $pack=$income['package'];
    if($pack=='Primaire')
    $total+=$income['count']*1200;
    else if($pack == 'Collége')
    $total+=$income['count']*1500;
    else
    $total+=$income['count']*2500; }

$query5="SELECT * FROM students";
$students=$db_connect->prepare($query5);
$students->execute();

//get teachers
$query6="SELECT id,fullname,filiere FROM teachers where levell='Primaire'";
$query7="SELECT id,fullname,filiere FROM teachers where levell='Collége'";
$query8="SELECT id,fullname,filiere FROM teachers where levell='Lycée'";

$teachers0=$db_connect->prepare($query6);
$teachers0->execute();

$teachers1=$db_connect->prepare($query7);
$teachers1->execute();

$teachers2=$db_connect->prepare($query8);
$teachers2->execute();

//count teachers
$query9="SELECT COUNT(*) FROM teachers";
$teachercount=$db_connect->query($query9);
$countt=$teachercount->fetchColumn();
?>