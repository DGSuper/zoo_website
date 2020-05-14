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
<body>
    <?php
    echo "<h1>".$animal_name."</h1>";
    echo "Species: ".$animal_type."<br>";
    echo "Home: <a href='enclosure.php?id=$animal_enclosure_id'>$animal_enclosure</a>";
    ?>

</body>
