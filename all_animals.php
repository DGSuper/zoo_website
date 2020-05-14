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

<body>
    <h1>All Animals </h1>
    <ul>
    <?php
        while($row = $animal_result->fetch_assoc()) {
            $animal_name = $row['NICKNAME'];
            $animal_id = $row['ID'];
            echo "<li><a href='animal.php?id=$animal_id'>$animal_name</a></li>";
          }
    ?>
    </ul>
</body>