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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store Book</title>
    <link rel="stylesheet" href="../css/storeBook.css">
</head>

<body>
    <form action="storeBook.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <input type="text" name="name" id="name" required placeholder="Book Name"><br><br>
            <input type="text" name="author" id="author" required placeholder="Author"><br><br>
            <input type="text" name="publisher" id="publisher" required placeholder="Publisher"><br><br>
            <input type="number" name="price" id="price" required placeholder="Price"><br><br>
            <input type="text" name="category" id="category" required placeholder="Category"><br><br>
            <input type="file" name="image" id="image" required placeholder="Choose a logo" accept="image/*"><br><br>
            <input type="submit" value="Add">
        </fieldset>
    </form>
</body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "../img/";
    $fileName =  basename($_FILES["image"]["name"]);
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        $uploadOk = 0;
    }

    if ($uploadOk != 0) {
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    }
    $name = $_POST["name"];
    $author = $_POST["author"];
    $publisher = $_POST["publisher"];
    $price = (int) $_POST["price"];
    $category = $_POST["category"];
    $sql = "INSERT INTO `book`(`id`, `name`, `author`, `publisher`, `price`, `category`, `img`)
    VALUES (NULL,'$name','$author','$publisher','$price','$category','$fileName')";
    $conn->query($sql);
    $conn->close();
}
?>

</html>