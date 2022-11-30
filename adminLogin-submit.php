<?php include("top.html")?>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

 
  <script src="passwordCheck.js"></script>

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
    $usernameEntered = $_POST["userName"];
    $passwordEntered =$_POST["password"];
    $IPRecorded = $_SERVER['REMOTE_ADDR'];

    //get information from database
    $sql  = "SELECT pasword, id, IP FROM User WHERE username = '$usernameEntered' AND controlLevel = TRUE";
    $result = mysqli_query($conn, $sql);

    //if username exists
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $password = $row['pasword'];
            $id = $row['id'];
            $IP = $row['IP'];
        }
        $IPList = explode(",", $IP);
    

        //if the password match, get id and send to session and redirect to home
        if ($password == $passwordEntered) {
            if (in_array($IP, $IPList))
            {
              session_start();
              $_SESSION['user_id'] = $id;
              $_SESSION['authorized'] = "TRUE";
              header('Location: indexsecurity.php');
            }
            else{
              session_start();
              $_SESSION['user_id'] = $id;
              header('Location: adminHome.php');
            }
        }

        //if it doesn't match, display error
        else {
            //print "Wrong password!";
            
            header('Location: adminLogin.php?value=false');
        }
    }
  //if username doesn't exist
  else {
      header('Location: adminLogin.php?user=false');
      print "Invalid username";
  }


      $conn->close();


?>
</body>
<?php include("bottom.html") ?>

</html>