<!DOCTYPE html>
<html>

<head>
  <title>Register</title>
  <link rel="stylesheet" href="../css/registration.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="registration.js"></script>
</head>

<body>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <fieldset>
      <legend>Create your account</legend>
      <input type="text" name="fname" id="fname" placeholder="First Name" />
      <input type="text" id="lname" name="lname" placeholder="Last Name" /><br /><br />
      <span class="alerter fname-alert">*First name is invalid</span>
      <span class="alerter lname-alert">*Last name is invalid</span><br />
      <span>Gender: </span>
      <input type="radio" id="Male" name="gender" value="Male" />
      <label for="Male">Male</label>
      <input type="radio" id="Female" name="gender" value="Female" />
      <label for="Female">Female</label>
      <span class="alerter radio-alert">*Choose your gender</span>
      <br /><br />
      <label for="dob">Date of birth:</label>
      <input type="text" id="dob" name="dob" placeholder="MM/DD/YYYY" />
      <span class="alerter dob-alert">*Enter a valid date</span>
      <br /><br />
      <input type="text" id="email" name="email" placeholder="Email" name="email" />
      <input type="text" id="uname" name="uname" placeholder="Username" /><br /><br />
      <span class="alerter email-alert">*Enter a valid email</span>
      <span class="alerter uname-alert">*Enter a valid username</span><br />
      <input type="test" id="pswd" name="password" placeholder="Password" />
      <input type="text" id="cnfrm" name="confirmpassword" placeholder="Confirm Password" /><br /><br />
      <span class="alerter pswd-alert">*Enter a valid password</span>
      <span class="alerter cnfrm-alert">*Passwords don't match</span><br />
      <textarea id="address" name="address" rows="3" cols="20" maxlength="60" placeholder="Address"></textarea><br /><br />
      <input type="text" id="post" name="postal" placeholder="postal code" />
      <input type="text" id="num" name="num" placeholder="mobile number" /><br /><br />
      <span class="alerter post-alert">*Enter a valid code</span>
      <span class="alerter num-alert">*Enter a valid number</span><br />
      <input type="submit" value="Register" />
    </fieldset>
  </form>
  <?php
  function showAlert($message)
  {
    echo "<script>alert('$message');</script>";
  }
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "practice");
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $uname = $_POST["uname"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $num = $_POST["num"];
    $addess = $_POST["address"];
    $pincode = $_POST["postal"];
    $gender = $_POST["gender"];
    $dob = $_POST["dob"];
    $pass = $_POST["password"];
    $sql = "INSERT INTO `registration`(`uname`, `fname`, `lname`, `email`, `mobile_number`, `address`, `password`, `dob`, `gender`, `pincode`) VALUES ('$uname','$fname','$lname','$email','$num','$addess','$pass','$dob','$gender','$pincode')";
    if ($conn->query($sql) === TRUE) {
      showAlert("Registered successfully");
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
  }
  ?>
</body>

</html>