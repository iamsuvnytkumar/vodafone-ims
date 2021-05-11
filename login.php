<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">

    <style>
        h1 {
            color: rgb(4, 0, 0);
            text-align: center;
        }

        body {
            background-image: url("image.jpg");
            background-color: #cccccc;
        }

        h2 {
            color: rgb(4, 0, 0);
            text-align: center;
        }

        body {
            text-align: center;
            background-image: url("image.jpg");
            background-color: #cccccc;
        }

        form {
            display: inline-block;
        }


        .button {
            display: inline-block;
            border-radius: 4px;
            background-color: #e7e7e7;
            color: black;
            border: none;
            color: black;
            text-align: center;
            font-size: 15px;
            padding: 10px;
            width: 100px;
            transition: all 0.5s;
            cursor: pointer;
            margin: 5px;
        }

        .button span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }

        .button span:after {
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }

        .button:hover span {
            padding-right: 25px;
        }

        .button:hover span:after {
            opacity: 1;
            right: 0;
        }

        .container {
            width: 600px;
            opacity: 0.95;
            clear: both;
        }

        .container input {
            text-align: center;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
            clear: both;
        }

        label{
            display: inline-block;
            text-align: right;
            width: 150px;
        }

        
    </style>
</head>




<!-- Sing in  Form -->
<!-- Sing in  Form -->
<section class="sign-in">

    <div class="container">

        <figure><img src="images/signin-image.PNG" alt="logo"></figure>
        <h1 class="form-title">Vodafone Inventory Management System</h1>
        <a href="adminlogin.php">
            Go To Admin Login
        </a>

        <div class="container">
            <h2 class="form-title">Login</h2>
            <form method="POST" class="register-form" action="login.php" id="login-form">

                <?php include('errors.php'); ?>

                <div class="form-group">
                    <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                    <input type="text" name="username" id="username" required="_required" placeholder="Employee #" />
                </div>
                <div class="form-group">
                    <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                    <input type="password" name="password" id="password" required="_required" placeholder="Password" />
                </div>

                <div class="form-group form-button">
                    <input type="submit" name="submit" id="submit" class="form-submit" value="Log in" />
                </div>
            </form>
        </div>


        <footer>
            <div class="footer-area">
                <p>© Copyright Suvneet Kumar. All rights reserved.</a></p>
            </div>
        </footer>
    </div>
    </div>
</section>

</div>

<!-- JS -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="js/main.js"></script>

</body>


</html>
