<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "practice";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT `name`, `author`, `publisher`, `price`,`img` FROM `book` WHERE category = 'Computers'";
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
        <?php
          $alt = explode(' ',$row['img'])[0];
          echo "<img alt=$alt src='../img/{$row['img']}'>";
        ?>
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

</html>