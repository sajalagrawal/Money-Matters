<?php
    require 'connection.php';   
    session_start();
    if(!isset($_SESSION['email'])){
        header('location:index.php');
    }
?>
<!DOCTYPE HTML>
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
    <body >  
        <?php
            require 'header.php';
        ?>
        <div class="container">
            <br><br><br><br><br>
            <div class="row">
                <div class="col-xs-4 col-xs-offset-4">
                    <h2 style="color:grey;">Change password</h2><hr>
                    <form method="post" action="settings_script.php">
                        <div class="form-group">
                            <input type="password" class="form-control" name="oldPassword" placeholder="Old Password">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="newPassword" placeholder="New Password">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="retype" placeholder="Retype new password">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Change">
                        </div><hr>
                    </form>
                </div>
            </div>
        </div>
             
    </body>
</html>

