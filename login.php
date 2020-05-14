<?php
session_start();
?>

<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <style>
      body {font-family: Arial, Helvetica, sans-serif;}
      form {border: 3px solid #f1f1f1;}
      input[type=text], input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
      }
      button {
        background-color: #454545;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
      }
      button:hover {
        opacity: 0.8;
      }
      .cancelbtn {
        width: auto;
        padding: 10px 18px;
        background-color: #f44336;
      }
      .imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
      }
      img.avatar {
        width: 40%;
        border-radius: 50%;
      }
      .container {
        padding: 16px;
      }
      span.psw {
        float: right;
        padding-top: 16px;
      }
    </style>
  </head>
  <body>
    <h2>Login Page</h2>
    <form action="login_landing.php" method="post">
      <div class="imgcontainer">
        <img src="blank_person.png" alt="Avatar" class="avatar" />
      </div>
      <div>
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uname" required />
        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required />
        <button type="submit">Login</button>
      </div>
      <div class="container" style="background-color:#f1f1f1">
        <a href="home.php">
          <button type="button" class="cancelbtn">Cancel</button>
        </a>
      </div>
    </form>
  </body>
</html>
