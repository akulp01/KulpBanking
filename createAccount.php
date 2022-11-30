<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Account</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

    <script src="JS/passwordCheck.js"></script>


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
            height: 1000px;
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
            left: -280px;
            top: 200px;
        }
        .shape:last-child{
            background: linear-gradient(
                to right,
                #ff512f,
                #f09819
            );
            right: -280px;
            bottom: 200px;
        }
        form{
            height: 1000px;
            width: 800px;
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
            margin-top: 0px;
            font-size: 14px;
            font-weight: 500;
        }
        input{
            display: block;
            height: 25px;
            width: 100%;
            background-color: rgba(255,255,255,0.07);
            border-radius: 3px;
            padding: 0 10px;
            margin-top: 0px;
            font-size: 14px;
            font-weight: 300;
        }

        ::placeholder{
            color: #e5e5e5;
        }
        button{
            margin-top: 0px;
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
        <div class = "form">
            <form action="createAccount-submit.php" method="post">
                <h3>Create Account</h3> 
                <label class=""> First Name: </label>
                <input type="text" name="user_fn" id="user_fn" autofocus="autofocus" required="required" /><br />

                <label class=""> Last name: </label>
                <input type="text" name="user_ln" id="user_ln"  required="required" /><br />

                <label class=""> Username: </label>
                <input type="text" name="username" id="username"  required="required" /><br />

                <label class=""> SSN: </label>
                <input type="number" name="ssn" id="ssn"  required="required"/><br />

                <label class=""> Password: </label>
                <input type="password" name="password" id="password" required="required" onkeyup='check();' /><br />

                <label class=""> Reenter Password: </label>
                <input type="password" name="confirm_password" id="confirm_password" required="required"
                    onkeyup='check();' />
                <span id='message'></span>
                    </br>
                <p>Security Question: </p>
                <label class=""> What was the Model of your First Car? </label>
                <input type="text" name="user_security" id="user_security"  required="required" /><br />

                <label class=""> Address: </label>
                <input type="text" name="user_address" id="user_address"
                    required="required" /><br />

                <label class=""> City: </label>
                <input type="text" name="user_city" id="user_city"  required="required" /><br />

                <label class=""> Zipcode: </label>
                <input type="number" name="user_zipcode" id="user_zipcode"  required="required"
                    /><br />

                <label class=""> Email: </label>
                <input type="text" name="user_email" id="user_email"  required="required" /><br />

                <label class=""> Admin Code: </label>
                <input type="text" name="user_admin" id="user_admin" /><br />

                <button type="submit">Create Account</button>
            </form>
        </div>

</body>

</html>
