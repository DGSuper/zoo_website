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
    $new_user = "INSERT INTO `ZOO_VISITOR`( `EMAIL`, `USERNAME`, `NAME`, `PASSWORD`) VALUES (\"".$_POST['email']."\",\"".$_POST['username']."\",\"".$_POST['name']."\",\"".$_POST['psw']."\")";
    $user_result = $conn->query($new_user);
    $_SESSION["username"] = $_POST["username"];
    header('Location: home.php');

    ?>
</body>
