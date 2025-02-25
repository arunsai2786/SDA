<?php
require('db.php');
include("auth_session.php");

// Query to retrieve age data from database
$query="SELECT *from student_data";
$count=mysqli_query($con,$query);
$total=array();
while ($row = mysqli_fetch_assoc($count)) {
  $total[] = $row['description'];
}


$query1 = "SELECT *from student_data where description='Financial Problems'";
$query2 = "SELECT *from student_data where description='Domestic Work'";
$query3 = "SELECT *from student_data where description='Lack of interest in education'";
$query4 = "SELECT *from student_data where description='Inadequate teaching staff'";
$query5 = "SELECT *from student_data where description='Overloaded with course works'";
$query6 = "SELECT *from student_data where description='Others'";

$count1 = mysqli_query($con, $query1);
$count2 = mysqli_query($con, $query2);
$count3 = mysqli_query($con, $query3);
$count4 = mysqli_query($con, $query4);
$count5 = mysqli_query($con, $query5);
$count6 = mysqli_query($con, $query6);


// Initialize an array to store age and count data
$age_data = array();
$dw = array();
$lie = array();
$its = array();
$ocw = array();
$others = array();

while ($row = mysqli_fetch_assoc($count1)) {
  $age_data[] = $row['description'];
}
while ($row = mysqli_fetch_assoc($count2)) {
  $dw[] = $row['description'];
}
while ($row = mysqli_fetch_assoc($count3)) {
  $lie[] = $row['description'];
}
while ($row = mysqli_fetch_assoc($count4)) {
  $its[] = $row['description'];
}
while ($row = mysqli_fetch_assoc($count5)) {
  $ocw[] = $row['description'];
}
while ($row = mysqli_fetch_assoc($count6)) {
  $others[] = $row['description'];
}
?>
<html>
  <head>
  
    <!--<title> Responsiive Admin Dashboard</title>-->
    <link rel="stylesheet" href="admin.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  </head>
  

  <body>
  <div class="sidebar">
    <div class="logo-details">
      <span class="logo_name" style="margin-left: 10%;">SDA Admin</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="admin.php">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="student_filter.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">Search</span>
          </a>
        </li>
        
        <li>
          <a href="analysis.php" class="active">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">Analytics</span>
          </a>
        </li>
        <li>
          <a href="add_data.php">
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name">Add Data</span>
          </a>
        </li>
        <li>
          <a href="#">
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
       <!-- <i class='bx bx-chevron-down' ></i>--> 
      </div>
    </nav>

    <div>
      <p>
        <div class="main" style="height:100%; width:100%;"><br>
          <div id="piechart"></div>
          <p><b>Total Students Dropped: <?php echo count(array_filter($total));?></b></p></div>
          <script type="text/javascript">
              // Load google charts
              google.charts.load('current', {'packages':['corechart']});
              google.charts.setOnLoadCallback(drawChart);
              
              // Draw the chart and set the chart values
              function drawChart() {
                var data = google.visualization.arrayToDataTable([
                  ['Task', 'Hours per Day'],
                ['Financial Problems', <?php echo count(array_filter($age_data)); ?>],
                ['Domestic Work', <?php echo count(array_filter($dw)); ?>],
                ['Lack of interest in education', <?php echo count(array_filter($lie)); ?>],
                ['Inadequate teaching staff', <?php echo count(array_filter($its)); ?>],
                ['Overloaded with course works', <?php echo count(array_filter($ocw)); ?>],
                ['Other Reasons',<?php echo count(array_filter($others)); ?>]
              ]);
              
                // Optional; add a title and set the width and height of the chart
                var options = {'title':'Student DroupOut Analysis', 'width':850, 'height':600};
              
                // Display the chart inside the <div> element with id="piechart"
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                chart.draw(data, options);
              }
              </script>
              </p>
              
            </div>
            
  </section>


 

</body>
</html>

<?php
// Close database conection
mysqli_close($con);
?>
