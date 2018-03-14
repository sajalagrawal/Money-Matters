<?php
    session_start();
    session_unset();
    session_destroy();
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
    <body>  
        <?php
            require 'header.php';
        ?>
        <div class="container">
            <br><br><br><br><br><br>
        <div class="row">
            <div class="col-xs-6">
                <div class="panel panel-primary">
                    <div class="panel-heading"></div>
                    <div class="panel-body">
                        <br><p style="font-size:18px;">You have been logged out. <a href="index.php">Login again?</a></p><br>
                    </div>
                </div>
            </div>
        </div>
        </div>       
    </body>
</html>