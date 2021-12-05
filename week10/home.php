<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "practice";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>

<html>

<head>
  <title>Home Page</title>
  <link rel="stylesheet" href="css/homepage.css" />
</head>

<body>
  <div class="header">
    <div class="headTop">
      <img src="img/bookStoreLogo.png" alt="book store logo" />
      <h3>Book Store</h3>
    </div>
    <div class="navbar">
      <span><a href="html/info.html" target="description">Home</a></span>
      <span>Latest Arrivals</span>
      <span><a href="php/storeBook.php" target="description">Add Book</a></span>
      <span>Contact Us</span>
      <span>Search</span>
    </div>
  </div>
  <div class="context">
    <div class="leftContext">
      <ul type="none">
        <?php
        $sql = "select DISTINCT category from book;";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
        ?>
          <li>
            <a href="php/<?php echo strtolower($row["category"]); ?>.php" class="linker" target="description">
              <?php
              echo $row["category"];
              ?>
            </a>
          </li>
        <?php
        }
        ?>
      </ul>
    </div>
    <div class="rightContext">
      <iframe src="php/storeBook.php" name="description"> </iframe>
    </div>
    <div class="Login">
      <form>
        <input type="text" placeholder="Username" id="username" /><br /><br />
        <input type="password" placeholder="Password" id="password" /><br /><br />
        <button id="signin">Sign-in</button><br />
        <h3>New User?</h3>
        <button id="signup">
          <a href="html/registration.html">Create an Account</a>
        </button>
      </form>
    </div>
  </div>
</body>

</html>