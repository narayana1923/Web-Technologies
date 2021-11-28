<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data</title>
    <style>
        h1 {
            color: green;
        }
        body {
            background-color: <?php echo $_POST['col']; ?>;
        }
    </style>
</head>

<body>
    <style>
    </style>
    <h1><?php echo $_POST["uname"]; ?></h1>
</body>

</html>