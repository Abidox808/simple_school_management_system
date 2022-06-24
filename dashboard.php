<?php 
include 'new_students.php';
//Start a new session
session_start();
//Set the session duration for 120 seconds
$duration = 600;
//Read the request time of the user
$time = $_SERVER['REQUEST_TIME'];
//Check the user's session exist or not
if (isset($_SESSION['LAST_ACTIVITY']) && ($time - $_SESSION['LAST_ACTIVITY']) > $duration) {
    //Unset the session variables
    session_unset();
    //Destroy the session
    session_destroy();
}
//Set the time of the user's last activity
$_SESSION['LAST_ACTIVITY'] = $time;

if(isset($_SESSION['username']) && isset($_SESSION['password'])){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/ama_VZW_icon.ico">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/all.min.css">
    <title>AMA - Dashboard</title>
</head>
<body>
    <div class="side-menu">
        <div class="brand-name">
            <img src="images/AMA.png" alt="">
        </div>
        <ul>
            <li><a href="dashboard.php"><i class="fa-solid fa-house"></i>&nbsp;<span>Dashboard</span></a></li>
            <li><a href="students.php"><i class="fa-solid fa-graduation-cap"></i>&nbsp;<span>Students</span></a></li>
            <li><a href="teachers.php"><i class="fa-solid fa-person-chalkboard"></i>&nbsp;<span>Teachers</span></a></li>
            <li><a href="logout.php"><i class="fa-solid fa-person-walking-arrow-right"></i>&nbsp;<span>Logout</span></a></li>
        </ul>
    </div>
    <div class="container">
        <div class="header">
            <div class="nav">
                <div class="search">
                    <input type="text" placeholder="Search..">
                    <button type="submit"><img src="images/search.png" alt=""></button>
                </div>
                <div class="user">
                    <img src="images/notifications.png" alt="">
                    <div class="img-case">
                        <img src="images/user.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="box">
            <?php echo "<h1>$count</h1>" ?>
                        <h3>Students</h3>
                    </div>
                    <div class="icon-case">
                        <img src="images/students.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                    <?php echo "<h1>$countt</h1>" ?>
                        <h3>Teachers</h3>
                    </div>
                    <div class="icon-case">
                        <img src="images/teachers.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
            <?php echo "<h1>$total DH</h1>"; ?>
                        <h3>Income</h3>
                    </div>
                    <div class="icon-case">
                        <img src="images/income.png" alt="">
                    </div>
                </div>
            </div>
            <div class="content-2">
                <div class="recent-payments">
                    <div class="title">
                        <h2>Recent Payments</h2>
                    </div>
                    <table class="pyment">
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Amount</th>
                            <th>Option</th>
                        </tr>
                        <?php   while($result=$stmt->fetch(PDO::FETCH_ASSOC)){ 
                        $fname=$result['first_name']; $lname=$result['last_name']; $package=$result['package'];
                        if($package=='Primaire')
                        $amount=1200;
                        else if($package == 'Collége')
                        $amount=1500;
                        else
                        $amount=2500;
                        echo '<tr>';
                        echo "<td class='c'>$fname</td>";
                        echo "<td class='c'>$lname</td>";
                        echo "<td class='price'>$amount DH</td>";
                        echo '<td><img src="images/info.png" alt=""></td>';
                        echo '</tr>'; }?>
                    </table>
                </div>
                <div class="new-students">
                    <div class="title">
                        <h2>New Students</h2>
                        <a href="students.php" class="btn">View All</a>
                    </div>
                    <table >
                        <tr>
                            <th>Profile</th>
                            <th>FirstName</th>
                            <th>LastName</th>
                            <th>option</th>
                        </tr>
                    <?php   while($result2=$stmt2->fetch(PDO::FETCH_ASSOC)){
                    $fname2=$result2['first_name']; $lname2=$result2['last_name'];
                    echo '<tr>';
                    echo '<td><img src="images/student.png" alt=""></td>';
                    echo "<td class='c'>$fname2</td>";
                    echo "<td class='c'>$lname2</td>";
                    echo '<td><img src="images/info.png" alt=""></td>';
                    echo '</tr>';
                        } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php
}else{

    header('location:admin.php');
}
?>