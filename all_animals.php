<?php
session_start();
?>
<?php
$servername = "mysql.eecs.ku.edu";
$username = "dgsuper09";
$password = "DGarcia09!";
$dbname = "dgsuper09";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

$animal_sql = "SELECT * FROM ZOO_ANIMAL";
$animal_result = $conn->query($animal_sql);
?>
<!DOCTYPE html>
<html lang="en">
<title>THE ZOO</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: "Lato", sans-serif}
.mySlides {display: none}
</style>
<body>
  <div class="w3-top">
    <div class="w3-bar w3-black w3-card">
      <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
      <a href="home.php" class="w3-bar-item w3-button w3-padding-large">HOME</a>
      <a href="home.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">HISTORY</a>
      <a href="all_animals.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">ANIMALS</a>
      <a href="all_enclosures.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">ENCLOSURES</a>
      <div class="w3-dropdown-hover w3-hide-small">
        <button class="w3-padding-large w3-button" title="More">MORE <i class="fa fa-caret-down"></i></button>
        <div class="w3-dropdown-content w3-bar-block w3-card-4">
          <a href="#" class="w3-bar-item w3-button">STORE(soon)</a>
          <a href="#" class="w3-bar-item w3-button">EMPLOYEES(soon)</a>
        </div>
      </div>

      <?php
      if (array_key_exists('username', $_SESSION))
      {
        echo "Hello, ". $_SESSION["username"];
        echo "<a href='logout.php' class='w3-padding-large w3-hover-red w3-hide-small w3-right'>LOGOUT</a>";
      }
      else
      {
        echo "<a href='login.php' class='w3-padding-large w3-hover-red w3-hide-small w3-right'>LOGIN</a>";
        echo "<a href='create_acc.php' class='w3-padding-large w3-hover-red w3-hide-small w3-right'>CREATE ACCOUNT</a>";
      }
      ?>

    </div>
  </div>
  <div class="w3-black" id="animals">
    <div class="w3-container w3-content w3-padding-64" style="max-width:800px">
      <h2 class="w3-wide w3-center">ALL OF OUR ANIMALS</h2>
      <p class="w3-opacity w3-center"><i>Take a look at our beautiful animals!</i></p><br>

      <ul class="w3-ul w3-border w3-white w3-text-grey">
        <?php
            while($row = $animal_result->fetch_assoc()) {
                $animal_name = $row['NICKNAME'];
                $animal_id = $row['ID'];
                echo "<li><a href='animal.php?id=$animal_id'>$animal_name</a></li>";
              }
        ?>
      </ul>
    </div>
  </div>
</body>
