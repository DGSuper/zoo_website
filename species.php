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
$species_id = $params['id'];

$species_info_sql = "SELECT * FROM ZOO_ANIMAL_TYPE WHERE ID=".$species_id;
$species_info_result = $conn->query($species_info_sql);

if (mysqli_num_rows($species_info_result)==0)
{
    //No such species id exists, go back home.
    header('Location: home.php');
}

$species_info_firstrow = mysqli_fetch_assoc($species_info_result);
$species_name = $species_info_firstrow["NAME"];
$species_description = $species_info_firstrow["DESCRIPTION"];

$animals_in_species_sql = "SELECT * FROM ZOO_ANIMAL WHERE ANIMAL_TYPE_ID = $species_id";
$animals_in_species_result = $conn->query($animals_in_species_sql);
?>
<head>
</head>
<body>
    <?php echo "<h1>$species_name</h1>"; ?>
    <?php echo "<i>$species_description</i>"; ?><br>

    Animals:
    <ul>
    <?php
    while($row = $animals_in_species_result->fetch_assoc()) {
        $animal_name = $row['NICKNAME'];
        $animal_id = $row['ID'];
        echo "<li><a href='animal.php?id=$animal_id'>$animal_name</a></li>";
      }
    ?>
    </ul>
    

</body>