<?php
include("auth_session.php");
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard</title>-->
    <link rel="stylesheet" href="admin.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>

   <style>
      .button {
        display: inline-block;
        padding: 15px 25px;
        font-size: 15px;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        outline: none;
        color: #fff;
        background-color: #4CAF50;
        border: none;
        border-radius: 15px;
        box-shadow: 0 9px #999;
      }

      .button:hover {background-color: #3e8e41}

      .button:active {
        background-color: #3e8e41;
        box-shadow: 0 5px #666;
        transform: translateY(4px);
      }
      .home-content{
        padding:50px;
      }

   </style>
<body>


  <?php
      require_once('db.php');
  ?>



<div class="sidebar">
    <div class="logo-details">
      <span class="logo_name" style="margin-left: 10%;">SDA Admin</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href=" admin.php" >
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href=" student_filter.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">Search</span>
          </a>
        </li>
        
        <li>
          <a href=" analysis.php">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">Analytics</span>
          </a>
        </li>
        <li>
          <a href=" add_data.php" class="active">
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name">Add Data</span>
          </a>
        </li>
        <li>
          <a href=" #">
            <i class='bx bx-user' ></i>
            <span class="links_name">Team</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Setting</span>
          </a>
        </li>
        <li class="log_out">
          <a href="/test/Student-Dropout-Analysis-main/index.html">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
</div>



  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>

      <div class="profile-details">
        <img src="https://i.ibb.co/QJbfhSv/review-1.png" alt="">
        <span class="admin_name"><?php echo $_SESSION['username']; ?></span>
      </div>
    </nav>

    <div class="home-content" >
      <form action="" method="post">
        Student Name   : <input type="text" name="name" style="padding: 12px 20px;  box-sizing: border-box; margin-left:1%"> <br> <br>

        Age  : <input type="number" name="age" style="padding: 12px 20px;  box-sizing: border-box; margin-left:7.5%"> <br> <br>

        Gender            : <input type="text" name="gender" style="padding: 12px 20px; box-sizing: border-box; margin-left:5.3%" > <br> <br>
        Caste     : <input type="text" name="caste" style="padding: 12px 20px; box-sizing: border-box; margin-left:6.3%"> <br> <br>
        School Name : <input type="text" name="school" style="padding: 12px 20px; box-sizing: border-box; margin-left:1.7%"> <br> <br>

        Area   : <input type="text" name="area" style="padding: 12px 20px;  box-sizing: border-box; margin-left:7%"> <br> <br>

        city   : <input type="text" name="city" style="padding: 12px 20px;  box-sizing: border-box; margin-left:7.6%"> <br> <br>

        <p>Description:  <select name="desc" id="">
        <option value=" "> </option>
          <option value="Financial Problems">Financial Problems</option>
          <option value="Domestic Work">Domestic Work</option>
          <option value="Lack of interest in education">Lack of interest in education</option>
          <option value="Inadequate teaching staff">Inadequate teaching staff</option>
          <option value="Overloaded with course works">Overloaded with course works</option>
          <option value="Others">Others</option>
        </select></p> <br> <br>
        <button name="submit" class="button">Add data</button> <br> <br>
         <?php
        // When form submitted, insert values into the database.
  $insert=false;
  if(isset($_REQUEST['submit'])){
      // removes backslashes
      $name = $_POST['name'];
      $age = $_POST['age'];
      $gender = $_POST['gender'];
      $caste = $_POST['caste'];
      $school = $_POST['school'];
      $area = $_POST['area'];
      $city    = $_POST['city'];
      $desc = $_POST['desc'];

      if($name!="" && $city!="" && $age!="" && $gender!="" && $caste!="" && $school!="" && $area!="" && $desc!=""){
          $sql    = "INSERT into student_data (name, age, gender, caste, school, area, city, description) VALUES ('$name','$age','$gender','$caste','$school','$area','$city','$desc')";
          $result   = mysqli_query($con, $sql);
          if ($result == true) {
                      $insert = true;
          } 
      }
      else{
          echo "<p style='color:red'>Enter Valid input</p>";
      }
      
      
  
      } 
            if($insert == true)
                echo "<p style='color:green'>Succesfully data inserted</p>"; 
             
        ?>
    </form>

    </div>
  </section>

  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>

</body>
</html>

  <?php


?> 

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="admin.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Add your styles here */
    </style>
</head>

<body>
     <!--Your existing HTML content here -->

    <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else {
                sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
            }
        }
    </script>
</body>
</html>