<script src="JS/menu.js"></script>
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
<!--Stylesheet-->
<style media="screen">
        form{
            display: inline-block;
            height: 300px;
            width: 800px;
            background-color: rgba(255,255,255,0.13);
            border-radius: 10px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255,255,255,0.1);
            box-shadow: 0 0 40px rgba(8,7,16,0.6);
            padding: 50px 35px;
            text-align: left;
        }
        form *{
            font-family: 'Poppins',sans-serif;
            color: #ffffff;
            letter-spacing: 0.5px;
            outline: none;
            border: none;
        }
        form h3{
            font-size: 32px;
            font-weight: 500;
            line-height: 42px;
            text-align: center;
        }

        .head{
            display: block;
            margin-top: 0px;
            font-size: 16px;
            font-weight: 500;
        }
        .nonradio{
            display: block;
            height: 50px;
            width: 100%;
            background-color: rgba(255,255,255,0.07);
            border-radius: 3px;
            padding: 0 10px;
            margin-top: 10px;
            font-size: 14px;
            font-weight: 300;
        }

        ::placeholder{
            color: #e5e5e5;
        }
        button{
            margin-top: 20px;
            width: 100%;
            background-color: #ffffff;
            color: #080710;
            padding: 15px 0;
            font-size: 18px;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
        }
        #validspace{
            height: 10px;
            position: 50% 50%;
            padding-bottom: 30px;
        }
        .social{
        margin-top: 30px;
        display: flex;
        }
        .social div{
        background: red;
        width: 150px;
        border-radius: 3px;
        padding: 5px 10px 10px 5px;
        background-color: rgba(255,255,255,0.27);
        color: #eaf0fb;
        text-align: center;
        }
        .social div:hover{
        background-color: rgba(255,255,255,0.47);
        }
        .social .fb{
        margin-left: 25px;
        }
        .social i{
        margin-right: 4px;
        }



        h1{
        font-size: 30px;
        color: #fff;
        text-transform: uppercase;
        font-weight: 300;
        text-align: center;
        margin-bottom: 15px;
        }

        body {
        font-family: "Lato", sans-serif;
        }

        .sidebar {
        height: 100%;
        width: 85px;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #111;
        transition: 0.5s;
        overflow-x: hidden;
        padding-top: 60px;
        white-space: nowrap;
        }

        .sidebar a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        text-align: left;
        }

        .sidebar a:hover {
        color: #f1f1f1;
        }

        main .sidebar {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
        }

        .material-icons,
        .icon-text {
        vertical-align: middle;
        }

        .material-icons {
        padding-bottom: 3px;
        margin-right: 30px;
        }

        #main {
        padding: 16px;
        margin-left: 85px;
        transition: margin-left 0.5s;
        }

        @media screen and (max-height: 450px) {
        .sidebar {
            padding-top: 15px;
        }
        .sidebar a {
            font-size: 18px;
        }
        }

        .wrapper{
        text-align: left
        }



        /* demo styles */

        @import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);
        body{
        background-color: 36454F;
        font-family: 'Roboto', sans-serif;
        text-align: center;
        }
        section{
        margin: 50px;
        }


        #bg{
        font-size: 30px;
        text-decoration-line: underline; 
        color: white;
        }

        #fg{
        font-size: 15px;
        color: white;
        }

    </style>

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
        <h1>Open Account</h1>
        <div class = "form">
            <form action="openAccount-submit.php" method="post">
                <label class="head"> Name on Account: </label>
                <input class="nonradio" type="text" name="acc_name" id="acc_name" autofocus="autofocus" required="required" /><br />

                <label class="head"> Routing Number: </label>
                <input class="nonradio" type="number" name="acc_routing" id="acc_routing"  required="required"/><br />

                <label class="head"> Account Type: </label>
                <br />
                <input class="radio" type="radio" name="acc_type" id="acc_type" value=0/>
                <label class="radiol"> checking </label>
                <br />
                <input class="radio" type="radio" name="acc_type" id="acc_type" value=1/>
                <label class="radiol"> Savings </label>

                <button type="submit">Open Account</button>
            </form>
        </div>
    </section>
</div>