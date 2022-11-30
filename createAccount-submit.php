<?php include ("top.html")?>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Account</title>

    <script src="passwordCheck.js"></script>

</head>

<body>
<!--create user account function-->
<?php

    //connection

    $servername = "kulpbank.c2jvijg48xu4.us-east-2.rds.amazonaws.com";
    $username = "admin44";
    $password = "dev123Dev";
    $dbname = "kulpBank";
    $port = 3360;

      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname, $port);
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      $id = mt_rand(100000000,999999999);


    //get all the variables
    $fname = $_POST["firstName"];
    $lname = $_POST["lastName"];
    $username = $_POST["username"];
    //$ssn = $_POST["ssn"];
    $password = $_POST["password"];
    $securityAnswer = $_POST["user_security"];
    $adminAccess = $_POST["user_admin"];
    //$address = $_POST["user_address"];
    //$user_city = $_POST["user_city"];
    //$zipcode = $_POST["user_zipcode"];
    //$email = $_POST["user_email"];
    //$phone = $_POST["user_phone"];
    //$phonetype = $_POST["phone_type"];
    $IP = $_SERVER['REMOTE_ADDR'];


    //inserting variables into the database
    $adminBool = $adminAccess == "A16F-32BD-MI9P-Z427";

    $sql = "INSERT INTO User (id, firstName, lastName, username, pasword, IP, securityAnswer, controlLevel)
    VALUES ('$id', '$fname', '$lname', '$username', '$password', '$IP', '$securityAnswer', $adminBool)";

    if ($conn->query($sql) === TRUE) {
    echo "Account creation successful";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

      $conn->close();

      header('Location: index.php');

?>
</body>

</html>

<?php include ("bottom.html")?>
