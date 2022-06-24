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
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/teachers.css">
    <title>AMA - Teachers</title>
</head>
<body>
    <div class="side-menu">
        <div class="brand-name">
            <img src="images/AMA.png" alt="">
        </div>
        <ul>
            <li><a href="dashboard.php"><i class="fa-solid fa-house"></i>&nbsp;<span>Dashboard</span></a></li>
            <li><a href="students.php"><i class="fa-solid fa-graduation-cap"></i>&nbsp;<span>Students</span></a></li>
            <li><a href=""><i class="fa-solid fa-person-chalkboard"></i>&nbsp;<span>Teachers</span></a></li>
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
    <!-- Start Team -->
    <div class="team" id="team">
      <h2 class="main-title">Teachers</h2>
      <div class="buttons">
        <a id="bp">Primaire</a>
        <a id="cp">Collége</a>
        <a id="lp">Lycée</a>
      </div>
      <div class="containers" id="pc" >
      <?php while($teacher0=$teachers0->fetch(PDO::FETCH_ASSOC)){?>
        <div class="box">
          <div class="data">
          <img src="images/teacher.jpeg" alt="" />
          </div>
          <div class="info">
          <h3><?php echo $teacher0['fullname'] ?></h3> 
          <p><?php echo '<b>ID</b>'?><b><?php echo ''.$teacher0['id']?></b><b><?php echo ' '.$teacher0['filiere']?></b><?php echo' '.'Teacher'.'.' ?></p>
          </div>
        </div>
        <?php } ?>
      </div>
      <div class="containers" id="cc" style="display:none">
      <?php while($teacher1=$teachers1->fetch(PDO::FETCH_ASSOC)){?>
        <div class="box">
          <div class="data">
            <img src="images/teacher.jpeg" alt="" />
          </div>
          <div class="info">
          <h3><?php echo $teacher1['fullname'] ?></h3> 
          <p><?php echo '<b>ID</b>'?><b><?php echo ''.$teacher1['id']?></b><b><?php echo ' '.$teacher1['filiere']?></b><?php echo' '.'Teacher'.'.' ?></p>
          </div>
        </div>
        <?php } ?>
      </div>
      <div class="containers" id="lc" style="display:none">
      <?php while($teacher2=$teachers2->fetch(PDO::FETCH_ASSOC)){?>
        <div class="box">
          <div class="data">
          <img src="images/teacher.jpeg" alt="" />
          </div>
          <div class="info">
          <h3><?php echo $teacher2['fullname'] ?></h3> 
          <p><?php echo '<b>ID</b>'?><b><?php echo ''.$teacher2['id']?></b><b><?php echo ' '.$teacher2['filiere']?></b><?php echo' '.'Teacher'.'.' ?></p>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
    <div class="spikes"></div>
    <!-- End Team -->
    <div class="button">
        <button id="edit" class="edit">EDIT</button>
        <button id="remove" class="remove">Remove</button>
        <button id="add" class="remove">Add</button>
      </div>
      </div>
 <div id="editModal" class="modal">

<!-- Modal content -->
<div class="modal-content">
  <div class="modal-header">
    <span class="close">&times;</span>
    <h2>Edit Teacher</h2>
  </div>
  <div class="modal-body">
  <body>
  <div class="testbox">
    <form action="teacher_edit_modal.php" method="POST">
      <div class="colums">
      <div class="item">
              <label class="label-id"for="ide"><span>*</span>ID</label>
              <input id="ide" type="text" name="id" required/>
            </div>
            <div class="item">
              <label for="fullname">Full Name :</label>
              <input id="fullname" type="text" name="fullname" />
            </div>
            <div class="item">
              <label for="filiere">Filiere :</label>
              <input id="filiere" type="text" name="filiere" />
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
    <h2>Remove Teacher</h2>
  </div>
  <div class="modal-body">
  <div class="testbox">
  <form action="teacher_remove_modal.php" method="POST">
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
<div id="addModal" class="modal">

<!-- Modal content -->
<div class="modal-content">
  <div class="modal-header">
    <span class="close">&times;</span>
    <h2>Edit Teacher</h2>
  </div>
  <div class="modal-body">
  <body>
  <div class="testbox">
    <form action="teacher_add_modal.php" method="POST">
      <div class="colums">
            <div class="item">
              <label for="fullname">Full Name :</label>
              <input id="fullname" type="text" name="fullname" />
            </div>
            <div class="item">
              <label for="filiere">Filiere :</label>
              <input id="filiere" type="text" name="filiere" />
            </div>
      </div>
      <div class="question">
          <label>Level:</label>
          <div class="question-answer">
            <div>
            <input type="radio" value="Primaire" id="radio_1" name="level"/>
              <label for="radio_1" class="radio"><span>Primaire</span></label>
            </div>
            <div>
            <input  type="radio" value="Collége" id="radio_2" name="level"/>
            <label for="radio_2" class="radio"><span>Collége</span></label>
            </div>
            <div>
            <input  type="radio" value="Lycée" id="radio_3" name="level"/>
            <label for="radio_3" class="radio"><span>Lycée</span></label>
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
<script src="js/modal.js"></script>
<script src="js/teachers.js"></script>
</body>
</html>
<?php
}else{

  header('location:admin.php');
}
?>