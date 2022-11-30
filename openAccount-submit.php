<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Open Account</title>

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


    //get all the variables
    $routing = $_POST["acc_routing"];
    $type = $_POST["acc_type"];
    //start session to grab user id
    session_start();
    $user_id = $_SESSION["user_id"];
    $accNum = mt_rand(100000000,999999999);
    $date = date("Y/m/d");

    $sql = "INSERT INTO Account (accountNum, routingNum, ownerId, dateCreated, type, balance)
    VALUES ('$accNum', '$routing', '$user_id', '$date', '$type', 0)";

    if ($conn->query($sql) === TRUE) {
    echo "Account creation successful";
    } 
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

      $conn->close();

      header('Location: home.php');

?>
</body>

</html>

<?php include ("bottom.html")?>
