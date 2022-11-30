<?php include("top.html")?>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

</head>

<body>
  <!--logging in the user in-->
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


    //get password from index.php submission
    $securityEntered= $_POST["security"];
    $user_Id = $_POST["user_id"];
    $authorized = $_POST["authorized"];

    //get information from database
    $sql  = "SELECT securityAnswer, IP FROM User WHERE id = '$user_Id'";
    $result = mysqli_query($conn, $sql);

    //if username exists
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $dbAnswer = $row['securityAnswer'];
            $IP = $row['IP'];
        }
    
        //if the password match, get id and send to session and redirect to home
        if ($dbAnswer == $securityEntered) {
            $newIPList = $IP . "," . $_SERVER['REMOTE_ADDR'];

            $sql = "UPDATE User SET IP='$newIPList' WHERE id='$user_Id'";
            if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            } else {
            echo "Error updating record: " . $conn->error;
            }

            session_start();
            $_SESSION['user_id'] = $user_Id;
            if($authorized === "FALSE"){
              header('Location: home.php');
            }
            else{
              header('Location: adminHome.php');
            }
        }

        //if it doesn't match, display error
        else {
            //print "Wrong password!";
            if($authorized === "FALSE"){
              header('Location: index.php?value=secfalse');
            }
            else{
              header('Location: adminLogin.php?value=secfalse');
            }
        }
    }
    //if username doesn't exist
    else {
        if($authorized === "FALSE"){
          header('Location: index.php?user=secfalse');
        }
        else{
          header('Location: adminLogin.php?value=secfalse');
        }
    }


      $conn->close();


?>
</body>
<?php include("bottom.html") ?>

</html>