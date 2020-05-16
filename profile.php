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

$user_info_sql = "SELECT * FROM ZOO_VISITOR WHERE USERNAME = \"".$_SESSION["username"]."\"";
$user_info_result = $conn->query($user_info_sql);

if (mysqli_num_rows($user_info_result)==0)
{
    //No such user id exists, go back home.
    header('Location: home.php');
}

$user_info_firstrow = mysqli_fetch_assoc($user_info_result);
$user_name = $user_info_firstrow["NAME"];
$user_email = $user_info_firstrow["EMAIL"];
$user_username = $_SESSION["username"]

?>

<head>
</head>
<body>
<?php
  echo "<h1>$user_username</h1>";
  echo "Name: $user_name<br>";
  echo "Email: $user_email";
?>

<form action="username_change_landing.php" method="post">
  <label for="fname">New Username</label><br>
  <input type="text" id="new_username" name="new_username"><br>
  <input type="submit" value="Submit">
</form> 
</body>