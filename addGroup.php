<?php
    session_start();
    if(!isset($_SESSION['email'])){
        header ('location:index.php');
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
        <style>
            body{
                font-size: 18px;
                line-height: 18px;
                color: #333;
                background-color: #fff;
                text-rendering: optimizeLegibility;
                font-family: 'Lato','Helvetica Neue',Helvetica,Arial,sans-serif !important;
                padding:100px; 
            }
            form{
                padding-left:50px;
            }
        </style>
    </head>
    <body>
        <?php
            require('header.php');
        ?>
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-2">
                    <div class="panel" style="background-color: #FBF8F8;">
                        <div class="panel-heading">
                            <center><h2><stong>ADD GROUP</strong></h2></center>
                        </div>
                        <div class="panel-body">
                            <form method="post" action="addGroup_script.php">
                                <legend>Name your <span style="color:LightSeaGreen;font:strong;"> Group :</span></legend>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="groupname" placeholder="groupname" required>
                                </div>
                                <div class="form-group">
                                    <input type="number" name="num" class="form-control" placeholder="total number of members" required><br>
                                </div>
                                <legend><span style="color:LightCoral;font:strong;"> Group Members:(Other than you)</span></legend>
                                
                                <div class="form-group">
                                    <input type="text" name="member2" class="form-control" placeholder="Member2 name" ><br>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="member3" class="form-control" placeholder="Member3 name" ><br>
                                </div>    
                                <div class="form-group">
                                    <input type="text" name="member4" class="form-control" placeholder="Member4 name" ><br>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="member5" class="form-control" placeholder="Member5 name" ><br>
                                </div>
                                
                                <div class="form-group">
                                    <input type="submit" class="btn btn-default btn-primary btn-block" value="Create group">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end of container -->
    </body>
</html>