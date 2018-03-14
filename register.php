<?php
    session_start();
    if(isset($_SESSION['email'])){
        header ('location:dashboard.php');
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="img/logo.jpg" />
        <title>MoneyMatters</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jQuery library -->
        <script src="bootstrap/js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <!-- Latest compiled and minified javascript -->
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- External CSS file -->
        <link rel="stylesheet" href="css/style.css" type="text/css">
        
    </head>

    <body>
         <?php
            require('header.php');
        ?>
    <div class="container">
        <br><br><br><br><br><br>
            <div class="row">
                <div class="col-xs-2">
                    <br><br><br><br>
                    <img src="img/logo.jpg" alt="logo">
                </div>
                <div class="col-xs-6 col-xs-offset-2">
                    <div class="panel" style="background-color: #FBF8F8;">
                        <div class="panel-heading">
                            <center><h1 style="color:grey;width:400px;"><b>New to MoneyMatters?<br>REGISTER HERE!</b></h1></center>
                        </div>
                        <div class="panel-body">
                            <form method="post" action="user_registration_script.php">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Name" required="true">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email" required="true">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password" required="true">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-default btn-block" value="Register">
                            </div><br>
                            <p>Already registered?  <a href="index.php">  Login</a> </p><br><br>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </body>
</html>