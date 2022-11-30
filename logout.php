<?php include("top.html")?>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">


  <script src="passwordCheck.js"></script>

</head>

<body>
<?php
//clear session array which contains global user id
$_SESSION = array();

//clear session contents on hard mysqli_driver
session_destroy();

//redirect to login page
  header('Location: index.php');
 ?>


</body>
<?php include("bottom.html") ?>

</html>
