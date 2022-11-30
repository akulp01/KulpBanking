<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Submit Deposit</title>

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
    $acc_Num = $_POST["accNum"];
    $check_Num = $_POST["checkNum"];
    $amount = $_POST["amount"];
    $depositId = mt_rand(100000000,999999999);
    $approvalStatus = 'N';
    $img = $_FILES["check"]["name"];
    //start session to grab user id
    session_start();
    $user_id = $_SESSION["user_id"];
    $date = date("Y/m/d");

    // Allow certain file formats 
    $fileName = basename($_FILES["check"]["name"]); 
    $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION)); 
    $allowTypes = array('jpg','png','jpeg'); 
    if(in_array($fileType, $allowTypes)){ 

        move_uploaded_file($_FILES["check"]["tmp_name"], "checks/$img");

        // Insert image content into database 
        $sql = "INSERT into Deposit (id, userId, accountNum, amount, checkNum, checkimg, dateSubmitted, approvalStatus) 
        VALUES ('$depositId', '$user_id', '$acc_Num', '$amount', '$check_Num', '$img', '$date', '$approvalStatus')"; 

        if ($conn->query($sql) === TRUE) {
            echo "Deposit creation successful";
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }   

    $conn->close();

    header('Location: home.php');

?>
</body>

</html>