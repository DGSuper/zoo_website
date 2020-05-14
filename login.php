
<!DOCTYPE html>
<html lang="en">
<title>THE ZOO</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body{
  background: #00589F;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00589F', endColorstr='#0073CF', GradientType=0);
  background: -webkit-linear-gradient(to bottom, #00589F 50%, #0073CF) !important;
  background: -moz-linear-gradient(to bottom, #00589F 50%, #0073CF) !important;
  background: -ms-linear-gradient(to bottom, #00589F 50%, #0073CF) !important;
  background: -o-linear-gradient(to bottom, #00589F 50%, #0073CF) !important;
  background: linear-gradient(to bottom, #00589F 50%, #0073CF) !important;
  color: white;
}

div.well{
  height: 250px;
}

.Absolute-Center {
  margin: auto;
  position: absolute;
  top: 0; left: 0; bottom: 0; right: 0;
}

.Absolute-Center.is-Responsive {
  width: 50%;
  height: 50%;
  min-width: 200px;
  max-width: 400px;
  padding: 40px;
}

#logo-container{
  margin: auto;
  margin-bottom: 10px;
  width:200px;
  height:30px;
  background-image:url('http://placehold.it/200x30/000000/ffffff/&text=BRAND+LOGO');
}
</style>
<body>
    <div class="w3-top">
    <div class="w3-bar w3-black w3-card">
        <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
        <a href="home.php" class="w3-bar-item w3-button w3-padding-large">HOME</a>
        <a href="#history" class="w3-bar-item w3-button w3-padding-large w3-hide-small">HISTORY</a>
        <a href="#animals" class="w3-bar-item w3-button w3-padding-large w3-hide-small">ANIMALS</a>
        <a href="#contact" class="w3-bar-item w3-button w3-padding-large w3-hide-small">CONTACT</a>
        <div class="w3-dropdown-hover w3-hide-small">
        <button class="w3-padding-large w3-button" title="More">MORE <i class="fa fa-caret-down"></i></button>
        <div class="w3-dropdown-content w3-bar-block w3-card-4">
            <a href="#" class="w3-bar-item w3-button">STORE</a>
            <a href="#" class="w3-bar-item w3-button">EMPLOYEES</a>
        </div>
        </div>
    </div>
    </div>
    <div class="container">
    <div class="row">
        <div class="Absolute-Center is-Responsive">
        <div id="logo-container"></div>
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <form action="login_landing.php" method="post" id="loginForm">
            <div class="form-group input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input class="form-control" type="text" name='username' placeholder="username"/>
            </div>
            <div class="form-group input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input class="form-control" type="password" name='password' placeholder="password"/>
            </div>
            <div class="checkbox">
                <label>
                <input type="checkbox"> I agree to the <a href="#">Terms and Conditions</a>
                </label>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-def btn-block">Login</button>
            </div>
            <div class="form-group text-center">
                <a href="#">Forgot Password</a>&nbsp;|&nbsp;<a href="#">Support</a>
            </div>
            </form>
        </div>
        </div>
    </div>
    </div>
</body>

</html>
