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
    <script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script>
    <link rel="icon" href="images/ama_VZW_icon.ico">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/students_table/students.css">
    <title>AMA - Students</title>
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

<div class="containers">
<table class="scroll">
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Birthday</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Package</th>
        </tr>
    <tbody>
      <?php while($all=$students->fetch(PDO::FETCH_ASSOC)){
        $fname=$all['first_name']; $lname=$all['last_name']; $package=$all['package']; $birth=$all['birthday']; $gender=$all['gender']; $email=$all['email']; $phone=$all['phone']; $id=$all['id'];
			echo '<tr>';		
			echo "<td id='id'>$id</td>
        <td class='c'>$fname</td>
				<td class='c'>$lname</td>
				<td >$gender</td>
				<td >$birth</td>
				<td >$email</td>
        <td >$phone</td>
        <td class='bld'>$package</td>
			</tr>";
      }
      ?>
    </tbody>
    </table>
      <div class="button">
          <button id="edit" class="edit">EDIT</button>
          <button id="remove" class="remove">Remove</button>
      </div>
</div>
<div id="editModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Edit Student</h2>
    </div>
    <div class="modal-body">
    <body>
    <div class="testbox">
      <form action="edit_modal.php" method="POST">
        <div class="colums">
        <div class="item">
            <label class="label-id"for="ide"><span>*</span>ID</label>
            <input id="ide" type="text" name="id" required/>
          </div>
          <div class="item">
            <label for="fname">First Name :</label>
            <input id="fname" type="text" name="fname" />
          </div>
          <div class="item">
            <label for="lname">Last Name :</label>
            <input id="lname" type="text" name="lname" />
          </div>
          <div class="item">
            <label for="birthday">Birthday :</label>
            <input id="birthday" type="date" name="birthday" />
        </div>
        <div class="item">
          <label for="email">Email Address :</label>
          <input id="email" type="text" name="email" />
        </div>
        <div class="item">
          <label for="phone">Phone :</label>
          <input id="phone" type="tel" name="phone" />
        </div>
        </div>
        <div class="question">
          <label>Gender:</label>
          <div class="question-answer">
            <div>
            <input type="radio" value="Male" id="radio_1" name="gender"/>
            <label for="radio_1" class="radio"><span>Male</span></label>
            </div>
            <div>
            <input  type="radio" value="Female" id="radio_2" name="gender"/>
            <label for="radio_2" class="radio"><span>Female</span></label>
            </div>
          </div>
          </div>
        <div class="question">
          <label>Level:</label>
          <div class="question-answer">
            <div>
            <input type="radio" value="Primaire" id="radio_4" name="level"/>
              <label for="radio_4" class="radio"><span>Primaire</span></label>
            </div>
            <div>
            <input  type="radio" value="Collége" id="radio_5" name="level"/>
            <label for="radio_5" class="radio"><span>Collége</span></label>
            </div>
            <div>
            <input  type="radio" value="Lycée" id="radio_6" name="level"/>
            <label for="radio_6" class="radio"><span>Lycée</span></label>
            </div>
          </div>
        </div>
        </div>
    </div>
    <div class="modal-footer">
    <div class="btn-block">
          <button type="submit" class="button-submit">Submit</button>
        </div>
    </div>
  </div>
  </form>
  </div>
</div>
<div id="removeModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Remove Student</h2>
    </div>
    <div class="modal-body">
    <div class="testbox">
    <form action="remove_modal.php" method="POST">
    <div class="item">
            <label class="label-id"for="ide"><span>*</span>ID</label>
            <input id="ide" type="text" name="id" required/>
    </div>
    </div>
    </div>
    <div class="modal-footer">
    <div class="btn-block">
          <button type="submit" class="button-submit">Submit</button>
    </div>
  </div>
  </form>
</div>
</div>
<script src="js/modal.js"></script>
<script src="js/table.js"></script>
</body>
</html>
<?php
}else{

  header('location:admin.php');
}
?>