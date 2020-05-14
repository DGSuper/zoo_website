<?php
$servername = "mysql.eecs.ku.edu";
$username = "dgsuper09";
$password = "DGarcia09!";
$dbname = "dgsuper09";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

$enclosure_sql = "SELECT * FROM ZOO_ENCLOSURE";
$enclosure_result = $conn->query($enclosure_sql);
?>

<body>
    <h1>All Enclosures </h1>
    <ul>
    <?php
        while($row = $enclosure_result->fetch_assoc()) {
            $enclosure_name = $row['TYPE'];
            $enclosure_id = $row['ID'];
            echo "<li><a href='enclosure.php?id=$enclosure_id'>$enclosure_name</a></li>";
          }
    ?>
    </ul>
</body>