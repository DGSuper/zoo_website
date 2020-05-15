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

    $user_query = "SELECT * FROM ZOO_VISITOR WHERE USERNAME = \"".$_POST["uname"]."\"";
    $user_result = $conn->query($user_query);


    if (mysqli_num_rows($user_result)==0)
    {
        //Wrong username
        echo "User ".$_POST["uname"]." not found!";
    }
    else
    {
        $firstrow = mysqli_fetch_assoc($user_result);
        if ($firstrow["PASSWORD"] != $_POST["psw"])
        {
            //Wrong Password
            echo "Incorrect Password!";
        }
        else
        {
            //Successful login.
            header('Location: home.php');
            $_SESSION["username"] = $_POST["uname"];
        }
    }

    ?>
</body>
