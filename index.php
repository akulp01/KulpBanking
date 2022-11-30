<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Design by foolishdeveloper.com -->
    <title>Login page</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <style media="screen">
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: #080710;
}
.background{
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}
.shape:first-child{
    background: linear-gradient(
        #1845ad,
        #23a2f6
    );
    left: -80px;
    top: -80px;
}
.shape:last-child{
    background: linear-gradient(
        to right,
        #ff512f,
        #f09819
    );
    right: -30px;
    bottom: -80px;
}
#first{
    height: 520px;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
#second{
    height: 30px;
    width: 400px;
    position: absolute;
    transform: translate(-50%,-50%);
    top:  70%;
    left: 50%;
    border-radius: 10px;
    padding-left: 37px;
    padding-right: 37px;
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

label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
#userName{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
#password{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    margin-bottom: 20px;
    font-size: 14px;
    font-weight: 300;
}

::placeholder{
    color: #e5e5e5;
}
button{
    margin-top: 10px;
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
#bestbutton{
    margin-top: 10px;
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
#adminbutton{
    margin-top: 10px;
    margin-left:10px;
    width: 10%;
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

    </style>
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form id="first" action="index-submit.php" method="POST" enctype="multipart/form-data">
        <h3>Kulp Banking</h3>

        <label for="userName">Username</label>
        <input type="text" name="userName" id="userName" autofocus="autofocus">

        <label for="password">Password</label>
        <input type="password" name="password" id="password">

        <?php
            if (isset($_GET["value"]) && $_GET["value"]=="false") {
                $output = "Wrong Password";
            }
            else if(isset($_GET["user"]) && $_GET["user"]=="false"){
                $output = "Wrong Username";
            }
            else if(isset($_GET["value"]) && $_GET["value"]=="secfalse"){
                $output = "Answer to Security Question Incorrect";
            }
            else{
                $output = "";
            }
        ?>
        <div id="validspace">
            <p>
                <?php print $output ?>
            </p>
        </div>

        <button type="submit">Log In</button>
    </form>

    <form id="second" action="createAccount.php" method="POST">
        <input id="bestbutton" type="submit" class="button" value="Create Account" />
    </form>

    <form id="third" action="adminLogin.php" method="POST">
        <input id="adminbutton" type="submit" class="button" value="Log In As Admin" />
    </form>

</body>
</html>