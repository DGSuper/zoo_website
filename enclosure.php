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
      
$enclosure_id = $params['id'];

$enclosure_info_sql = "SELECT * FROM ZOO_ENCLOSURE WHERE ID =".$enclosure_id;
$enclosure_info_result = $conn->query($enclosure_info_sql);

if (mysqli_num_rows($enclosure_info_result)==0)
{
    //No such enclosure id exists, go back home.
    header('Location: home.php');
}

$enclosure_info_firstrow = mysqli_fetch_assoc($enclosure_info_result);
$enclosure_name = $enclosure_info_firstrow["TYPE"];

$animals_in_enclosure_info_sql = "SELECT * FROM ZOO_ANIMAL WHERE ENCLOSURE_ID = ".$enclosure_id;
$animals_in_enclosure_info_result = $conn->query($animals_in_enclosure_info_sql);

$enclosure_workers_info_sql = "SELECT NAME, JOB, YEARS_OF_SERVICE, ID FROM ZOO_WORKS_AT LEFT JOIN ZOO_EMPLOYEE ON ZOO_WORKS_AT.EMPLOYEE_ID = ZOO_EMPLOYEE.ID WHERE ENCLOSURE_ID =$enclosure_id";
$enclosure_workers_info_result = $conn->query($enclosure_workers_info_sql);

$enclosure_visitors_info_sql = "SELECT NAME, ID FROM ZOO_VISIT, ZOO_VISITOR WHERE ZOO_VISIT.VISITOR_ID = ZOO_VISITOR.ID && ENCLOSURE_ID =$enclosure_id";
$enclosure_visitors_info_result = $conn->query($enclosure_visitors_info_sql);

?>
<body>
    <?php
    echo "<h1>".$enclosure_name."</h1>";
    ?>

    Animals in Enclosure:
    <ul>
    <?php
    while($row = $animals_in_enclosure_info_result->fetch_assoc()) {
        $animal_name = $row['NICKNAME'];
        $animal_id = $row['ID'];
        echo "<li><a href='animal.php?id=$animal_id'>$animal_name</a></li>";
      }
    ?>
    </ul>

    Staff:
    <ul>
    <?php
    while($row = $enclosure_workers_info_result->fetch_assoc()) {
        $employee_name = $row['NAME'];
        $employee_id = $row['ID'];
        $employee_job = $row['JOB'];
        $employee_years = $row['YEARS_OF_SERVICE'];
        echo "<li>$employee_name, <i>$employee_job</i></li>";
      }
    ?>
    </ul>

    Visitors:
    <ul>
    <?php
    while($row = $enclosure_visitors_info_result->fetch_assoc()) {
        $visitor_name = $row['NAME'];
        $visitor_id = $row['ID'];
        echo "<li>$visitor_name</li>";
      }
    ?>
    </ul>

</body>
