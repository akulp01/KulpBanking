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
  $acc_Num = $_SESSION["accNum"];
  $approval = 'Y';

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
  <a href="home.php"><span><i class="material-icons">home</i><span class="icon-text">Dashboard</span></a><br>
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
        <h1>transactions</h1>
        <div class="tbl-header">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th>Transaction Number</th>
                        <th>Date of Transaction</th>
                        <th>Deposit/Withdrawl</th>
                        <th>Check/Withdrawl Number</th>
                        <th>Amount</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="tbl-content">
            <table cellpadding="0" cellspacing="0" border="0">
                <tbody>
                <?php
                    $transactionResult = $conn->query("select * from Deposit where userId = '$user_id' and accountNum = '$acc_Num'  and approvalStatus = '$approval'");

                    while ($transactionInfo = mysqli_fetch_assoc($transactionResult)) {
                        $tId = $transactionInfo['id'];
                        $user = $transactionInfo['userId'];
                        $amount = $transactionInfo['amount'];
                        $num = $transactionInfo['checkNum'];
                        $date = $transactionInfo['dateSubmitted'];
                        $approval = $transactionInfo['approvalStatus'];
                        $typeName = 'Deposit';
                ?>
                        <tr class="row">
                            <td><?=$tId?></td>
                            <td><?=$date?></td>
                            <td><?=$typeName?></td>
                            <td><?=$num?></td>
                            <td><?=$amount?></td>
                        </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
        </div>
    </section>
</div>