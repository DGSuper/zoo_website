<?php
session_start();
?>

<head>
</head>
<body>

    <?php

    //ACQUIRE CONNECTION TO SQL
    $servername = "mysql.eecs.ku.edu";
    $username = "dgsuper09";
    $password = "DGarcia09!";
    $dbname = "dgsuper09";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }

    $username_change_sql = "UPDATE `ZOO_VISITOR` SET `USERNAME`=\"".$_POST['new_username']."\" WHERE USERNAME = \"".$_SESSION["username"]."\"";
    echo $username_change_sql;
    $user_result = $conn->query($username_change_sql);
    $_SESSION["username"] = $_POST['new_username'];
    header('Location: home.php');
    ?>
</body>
