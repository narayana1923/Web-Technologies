<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "practice";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT `name`, `author`, `publisher`, `price` FROM `book` WHERE category = 'Computers'";
$result = $conn->query($sql);
?>
<html>

<head>
  <title>Computers</title>
  <link rel="stylesheet" href="../css/catalogue.css" />
</head>

<body>
  <div class="main-content">
    <?php
    while ($row = $result->fetch_assoc()) {
    ?>
      <div class="content">
        <img alt="SAP MM" src="https://images-na.ssl-images-amazon.com/images/I/51ZjBJVsczL._SX381_BO1,204,203,200_.jpg" />
        <div class="imgcontent">
          <?php
          echo "<b>{$row['name']}</b>";
          echo "<h4>{$row['author']}</h4>";
          echo "<h4>{$row['publisher']}</h4>";
          echo "<h4>Rs. {$row['price']}/-</h4>";
          ?>
        </div>
        <span>More Details</span>
      </div>
    <?php
    }
    ?>
</body>
<script>
  var abcFromUrl = Request.QueryString["abc"];
  document.write(abcFromUrl);
</script>
</html>