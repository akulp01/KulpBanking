<link rel="stylesheet" href="css/home.css" type="text/css">
<script src="JS/menu.js"></script>
<script src="JS/table.js"></script>
<?php

//querying data for display purposes

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

//start session to grab user id
  session_start();
  $user_id = $_SESSION["user_id"];

//grabbing name based on login information from server
  $nameresult = $conn->query("select firstName, lastName from User where id = $user_id");

    while ($nameinfo = mysqli_fetch_assoc($nameresult)) {
        $user_fn = $nameinfo['firstName'];
        $user_ln = $nameinfo['lastName'];
    }
?>

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<div id="header">
</div>

<div id="mySidebar" class="sidebar" onmouseover="toggleSidebar()" onmouseout="toggleSidebar()">
  <a href="adminHome.php"><span><i class="material-icons">home</i><span class="icon-text">Dashboard</span></a><br>
  <a href="openAccount.php"><i class="material-icons">data_thresholding</i><span class="icon-text"></span>Open New Account</a></span>
  </a><br>
  <a href="makeDeposit.php"><i class="material-icons">monetization_on</i><span class="icon-text"></span>Make Deposit</span></a><br>
  <a href="logout.php"><i class="material-icons">arrow_back_ios</i><span class="icon-text"></span>Logout<span></a>
</div>

<div id="main">
    <section>
    <div class="wrapper">
        <div id="bg"> Kulp Banking </div>
        <div id="fg"> Banking Reimagined </div>
    </div>
    <!--for demo wrap-->
    <h1>All Accounts</h1>
    <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
                <tr>
                    <th>Account Number</th>
                    <th>Routing Number</th>
                    <th>Name on Account</th>
                    <th>Type</th>
                    <th>Date Created</th>
                    <th>Balance</th>
                </tr>
            </thead>
        </table>
    </div>
    <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
            <?php
                $accountResult = $conn->query("select * from Account");

                while ($accountInfo = mysqli_fetch_assoc($accountResult)) {
                    $number = $accountInfo['accountNum'];
                    $routing = $accountInfo['routingNum'];
                    $type = $accountInfo['type'];
                    $date = $accountInfo['dateCreated'];
                    $balance = $accountInfo['balance'];
                    $typeName = $type == 0 ? "Checking" : "Savings";
                    $ownerId = $accountInfo['ownerId'];

                    $userResult = $conn->query("select firstName, lastName from User where id = '$ownerId'");
                    while($userInfo = mysqli_fetch_assoc($userResult))
                    {
                        $firstName = $userInfo['firstName'];
                        $lastName = $userInfo['lastName'];
                    }
            ?>
                <tr class="row" onclick="<?php $_SESSION["accNum"]=$number?>; window.location='transactions.php';">
                    <td><?=$number?></td>
                    <td><?=$routing?></td>
                    <td><?=$firstName . " " . $lastName?></td>
                    <td><?=$typeName?></td>
                    <td><?=$date?></td>
                    <td><?=$balance?></td>
                </tr>
            <?php
                }
            ?>
            </tbody>
        </table>
    </div>
    </section>
</div>