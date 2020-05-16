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

$current_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// Use parse_url() function to parse the URL
// and return an associative array which
// contains its various components
$url_components = parse_url($current_url);

// Use parse_str() function to parse the
// string passed via URL
parse_str($url_components['query'], $params);

// Display result
$animal_id = $params['id'];

$animal_info_sql = "SELECT A.NICKNAME, A.NAME AS TYPE, A.TYPE_ID, ZOO_ENCLOSURE.TYPE AS LOCATION, ZOO_ENCLOSURE.ID AS ENCLOSURE_ID
FROM (

SELECT ZOO_ANIMAL.ID, ZOO_ANIMAL.ENCLOSURE_ID, ZOO_ANIMAL.NICKNAME, ZOO_ANIMAL_TYPE.NAME, ZOO_ANIMAL_TYPE.DESCRIPTION, ZOO_ANIMAL_TYPE.ID AS TYPE_ID
FROM ZOO_ANIMAL_TYPE
LEFT JOIN ZOO_ANIMAL ON ZOO_ANIMAL_TYPE.ID = ZOO_ANIMAL.ANIMAL_TYPE_ID
) AS A
LEFT JOIN ZOO_ENCLOSURE ON ZOO_ENCLOSURE.ID = A.ENCLOSURE_ID WHERE A.ID = ".$animal_id;
$animal_info_result = $conn->query($animal_info_sql);

if (mysqli_num_rows($animal_info_result)==0)
{
    //No such animal id exists, go back home.
    header('Location: home.php');
}

$animal_info_firstrow = mysqli_fetch_assoc($animal_info_result);
$animal_name = $animal_info_firstrow["NICKNAME"];
$animal_type = $animal_info_firstrow["TYPE"];
$animal_type_id = $animal_info_firstrow["TYPE_ID"];
$animal_enclosure = $animal_info_firstrow["LOCATION"];
$animal_enclosure_id = $animal_info_firstrow["ENCLOSURE_ID"];

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
      <h2 class="w3-wide w3-center">ANIMAL</h2>
      <p class="w3-opacity w3-center"><i>Learn about this animal:</i></p><br>

      <ul class="w3-ul w3-border w3-white w3-text-grey">
        <?php
        echo "<h1>".$animal_name."</h1>";
        echo "Species: <a href='species.php?id=$animal_type_id'>".$animal_type."</a><br>";
        echo "Home: <a href='enclosure.php?id=$animal_enclosure_id'>$animal_enclosure</a>";
        ?>
      </ul>
    </div>
  </div>


</body>
</html>
