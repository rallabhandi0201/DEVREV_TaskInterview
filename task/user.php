<?php
session_start();
// $_SESSION["uid"]=$_POST["username"];
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Welcome - <?php $_SESSION['username']?></title>
  </head>
  <body>
    <!-- <?php require '_nav.php' ?> -->
    <?php 
      include '_dbconnect.php';
      $sql = "Select * from locations";
      $result = mysqli_query($conn, $sql);
      $loc=Array();
      $k=0;
      while($row=$result->fetch_assoc()){
        $loc[$k++]=$row["location"];
      }
      ?>
      <?php 
      include '_dbconnect.php';
      $sql = "Select * from services";
      $result = mysqli_query($conn, $sql);
      $srv=Array();
      $k=0;
      while($row=$result->fetch_assoc()){
        $srv[$k++]=$row["service"];
      }
    ?>
    <div class="shadow p-3 mb-5 bg-body rounded"><h1>Select Location :</h1> </div>
      <form method ="get" action="bookings.php">
        <select name="location" class="form-select" aria-label="Default select example">
          <option selected>Select Location</option>
          <?php
            foreach($loc as $x => $loc_value) {
              echo '<option value = ',$loc_value,'>',$loc_value,'</option>';
            }
          ?>
        </select>
        <select name="service" class="form-select" aria-label="Default select example">
            <option Selected>Select Service</option>
            <?php
                foreach($srv as $x => $srv_value) {
                echo '<option value = ',$srv_value,'>',$srv_value,'</option>';
                }
            ?>
        </select>
        <div class="form-group">
            <label for="start_time">Start Time</label>
            <input type="text" class="form-control" id="start_time" name="start_time" aria-describedby="emailHelp">
            
        </div>
        <div class="form-group">
            <label for="end_time">End Time</label>
            <input type="text" class="form-control" id="end_time" name="end_time" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-primary">Next</button>
      </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
