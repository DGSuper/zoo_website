
<?php
session_start();
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

<?php
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
?>


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



<!-- Page content -->
<div class="w3-content" style="max-width:2000px;margin-top:46px">

  <!-- Automatic Slideshow Images -->
  <div class="mySlides w3-display-container w3-center">
    <img src="zoo_entry.jpg" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
      <h3>WELCOME</h3>
      <p><b>Join us to admire the beutiful animals!</b></p>
    </div>
  </div>
  <div class="mySlides w3-display-container w3-center">
    <img src="lion.jpg" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
      <h3>Lion</h3>
      <p><b>RAWR.</b></p>
    </div>
  </div>
  <div class="mySlides w3-display-container w3-center">
    <img src="monkey.jpg" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
      <h3>Monkeys</h3>
      <p><b>Let's monkey around!</b></p>
    </div>
  </div>


  <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="band">
    <h2 class="w3-wide">HISTORY</h2>
    <p class="w3-opacity"><i>Our Story</i></p>
    <p class="w3-opacity"><i>"It's hard to be blue, when you run a zoo"</i> - Clint Eastwood<br>We made this zoo because monkeys are epic and cool.</p>

    <h2 class="w3-wide">THE TEAM</h2>
    <div class="w3-row w3-padding-32">
    <?php
        $employee_sql = "SELECT NAME, JOB FROM ZOO_EMPLOYEE";
        $employee_result = $conn->query($employee_sql);

        if ($employee_result->num_rows > 0) {
          // output data of each row
          while($row = $employee_result->fetch_assoc()) {
            echo "<div class='w3-third'>";
            echo "<p>".ucfirst($row['JOB'])."</p>";
            echo " <img src='blank_person.png' class='w3-round w3-margin-bottom' alt='Random Name' style='width:60%'>";
            echo "<p>".$row['NAME']."</p>";
            echo "</div>";
          }
        } else {
          echo "0 results";
        }
        ?>
      </ul>
    </div>
  </div>


  <div class="w3-black" id="animals">
    <div class="w3-container w3-content w3-padding-64" style="max-width:800px">
      <h1 class="w3-wide w3-center">EXPLORE OUR ZOO</h2>
      <h3 class="w3-wide w3-center"><a href="all_animals.php">ANIMALS</a></h2>
      <h3 class="w3-wide w3-center"><a href="all_enclosures.php">ENCLOSURES</a></h2>

      <div class="w3-row-padding w3-padding-32" style="margin:0 -16px">
        <div class="w3-third w3-margin-bottom">
          <img src="ticket.jpg" alt="ga" style="width:100%" class="w3-hover-opacity">
          <div class="w3-container w3-white">
            <p><b>General Admission</b></p>
            <p>Grants you entry to the zoo, except to paid exhibits.</p>
            <button class="w3-button w3-black w3-margin-bottom" onclick="document.getElementById('ticketModal').style.display='block'">Coming Soon</button>
          </div>
        </div>
        <div class="w3-third w3-margin-bottom">
          <img src="ticket.jpg" alt="food" style="width:100%" class="w3-hover-opacity">
          <div class="w3-container w3-white">
            <p><b>GA + Food</b></p>
            <p>Grants entry to the zoo plus two food tickets.</p>
            <button class="w3-button w3-black w3-margin-bottom" onclick="document.getElementById('ticketModal').style.display='block'">Coming Soon</button>
          </div>
        </div>
        <div class="w3-third w3-margin-bottom">
          <img src="ticket.jpg" alt="vip" style="width:100%" class="w3-hover-opacity">
          <div class="w3-container w3-white">
            <p><b>VIP Tickets</b></p>
            <p>Grants to access to everything on the park.</p>
            <button class="w3-button w3-black w3-margin-bottom" onclick="document.getElementById('ticketModal').style.display='block'">Coming Soon</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="ticketModal" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4">
      <header class="w3-container w3-teal w3-center w3-padding-32">
        <span onclick="document.getElementById('ticketModal').style.display='none'"
       class="w3-button w3-teal w3-xlarge w3-display-topright">×</span>
        <h2 class="w3-wide"><i class="fa fa-suitcase w3-margin-right"></i>Tickets</h2>
      </header>
      <div class="w3-container">
        <p><label><i class="fa fa-shopping-cart"></i> Tickets, $15 per person</label></p>
        <input class="w3-input w3-border" type="text" placeholder="How many?">
        <p><label><i class="fa fa-user"></i> Send To</label></p>
        <input class="w3-input w3-border" type="text" placeholder="Enter email">
        <button class="w3-button w3-block w3-teal w3-padding-16 w3-section w3-right">PAY <i class="fa fa-check"></i></button>
        <button class="w3-button w3-red w3-section" onclick="document.getElementById('ticketModal').style.display='none'">Close <i class="fa fa-remove"></i></button>
        <p class="w3-right">Need <a href="#" class="w3-text-blue">help?</a></p>
      </div>
    </div>
  </div>


  <div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="contact">
    <h2 class="w3-wide w3-center">CONTACT</h2>
    <p class="w3-opacity w3-center"><i>Tell us how to improve!</i></p>
    <div class="w3-row w3-padding-32">
      <div class="w3-col m6 w3-large w3-margin-bottom">
        <i class="fa fa-map-marker" style="width:30px"></i> Kansas, US<br>
        <i class="fa fa-phone" style="width:30px"></i> Phone: +00 0000000<br>
        <i class="fa fa-envelope" style="width:30px"> </i> Email: mail@mail.com<br>
      </div>
      <div class="w3-col m6">
        <form action="/action_page.php" target="_blank">
          <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
            <div class="w3-half">
              <input class="w3-input w3-border" type="text" placeholder="Name" required name="Name">
            </div>
            <div class="w3-half">
              <input class="w3-input w3-border" type="text" placeholder="Email" required name="Email">
            </div>
          </div>
          <input class="w3-input w3-border" type="text" placeholder="Message" required name="Message">
          <button class="w3-button w3-black w3-section w3-right" type="submit">SEND</button>
        </form>
      </div>
    </div>
  </div>


</div>


<img src="zoo_top_view.jpg" class="w3-image w3-greyscale-min" style="width:100%">


<footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge">
  <i class="fa fa-facebook-official w3-hover-opacity"></i>
  <i class="fa fa-instagram w3-hover-opacity"></i>
  <i class="fa fa-snapchat w3-hover-opacity"></i>
  <i class="fa fa-pinterest-p w3-hover-opacity"></i>
  <i class="fa fa-twitter w3-hover-opacity"></i>
  <i class="fa fa-linkedin w3-hover-opacity"></i>
  <p class="w3-medium">Powered by <a href="https://www.ku.edu" target="_blank">KU</a></p>
</footer>

<script>
// Automatic Slideshow - change image every 4 seconds
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}
  x[myIndex-1].style.display = "block";
  setTimeout(carousel, 4000);
}

// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else {
    x.className = x.className.replace(" w3-show", "");
  }
}

// When the user clicks anywhere outside of the modal, close it
var modal = document.getElementById('ticketModal');
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>
</html>
