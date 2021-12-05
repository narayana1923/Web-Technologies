<?php
$cookie_username = "username";
$cookie_uservalue = "narayana";
$cookie_password = "password";
$cookie_passwordValue = "tiger";
setcookie($cookie_username, $cookie_uservalue, time() + (86400 * 30), "/");
setcookie($cookie_password, $cookie_passwordValue, time() + (86400 * 30), "/");
?>

<html>

<head>
  <title>Home Page</title>
  <link rel="stylesheet" href="homepage.css">
</head>

<body>
  <div class="header">
    <div class="headTop">
      <img src="img/bookStoreLogo.png" alt="book store logo" />
      <h3>book store</h3>
    </div>
    <div class="navbar">
      <span><a class="linker" href="info.html" target="description">Home</a></span>
      <span>Latest Arrivals</span>
      <span>Best Sellers</span>
      <span>Contact Us</span>
      <span>Search</span>
    </div>
  </div>
  <div class="context">
    <div class="leftContext">
      <ul type="none">
        <li><a class="linker" href="computers.html" target="description">Computers</a></li>
        <li><a class="linker" href="computers.html" target="description">Electronics</a></li>
        <li><a class="linker" href="computers.html" target="description">Electrical</a></li>
        <li><a class="linker" href="computers.html" target="description">Bio-Tech</a></li>
      </ul>
    </div>
    <div class="rightContext">
      <iframe src="info.html" name="description"> </iframe>
    </div>
    <div class="Login">
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="text" placeholder="Username" name="uname" id="username"><br><br>
        <input type="password" placeholder="Password" name="pswd" id="password"><br><br>
        <button id="signin">Sign-in</button><br>
        <h3>New User?</h3>
        <button id="signup"><a href="registration.html">Create an Account</a></button>
      </form>
    </div>
  </div>
  <?php
  function showAlert($message)
  {
    echo "<script>alert('$message');</script>";
  }
  function checkInput($uname, $pswd)
  {
    if ($_COOKIE["username"] == $uname && $_COOKIE["password"] == $pswd) {
      showAlert("Welcome $uname");
    } else {
      showAlert("Incorrect username/password");
    }
  }
  $username = $password = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["uname"];
    $password = $_POST["pswd"];
    checkInput($username, $password);
  }
  ?>
</body>

</html>