<?php
  session_start();

  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
      header("location: admin.php");
      exit;
  }
  include '_dbconnect.php';
  $sql = "SELECT * FROM transactions where status = 0";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    echo '<table class="table table-dark table-striped">
      <tr> 
          <td> <font face="Arial">uid</font> </td> 
          <td> <font face="Arial">location</font> </td> 
          <td> <font face="Arial">start_time</font> </td> 
          <td> <font face="Arial">end_time</font> </td> 
          <td> <font face="Arial">Service_type</font> </td>
          <td> <font face="Arial">Status</font> </td> 
      </tr>';
    while ($row = $result->fetch_assoc()) {
      $field1name = $row["uid"];
      $field2name = $row["location"];
      $field3name = $row["start_time"];
      $field4name = $row["end_time"];
      $field5name = $row["service_type"]; 
      $field6name = $row["status"];
      echo '<tr> 
                <td>'.$field1name.'</td> 
                <td>'.$field2name.'</td> 
                <td>'.$field3name.'</td> 
                <td>'.$field4name.'</td> 
                <td>'.$field5name.'</td> 
                <td>'.$field6name.'</td> 
             </tr>';
  }
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
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
