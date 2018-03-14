<?php
    require 'connection.php';
    session_start();
    if(!isset($_SESSION['email'])){
        header ('location:index.php');
    }
    $uid=$_SESSION['id'];
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
            li.expenses{
                background-color:#eee;
                color:#999;
                padding:10px;
                font-size:20px;
            }
            li.expenses:hover{
                background-color:#ddd;
                color:#aaa;
            }
        </style>
    </head>

    <body>
        <?php
            require('header.php');
        ?>
    <div class="container">
        <br><br><br><br><br>
            <div class="row">
                <div class="col-xs-4">
                    <div class="panel" style="background-color: #FBF8F8;">
                        <div class="panel-heading">
                            <center><h1 style="color:grey; height:20px;" ><b>Activity</b></h1></center>
                        </div>
                        <div class="panel-body">
                           <ul style="list-style-type:none;width:100%;">
                            
                            <li class="expenses">Groups</li>
                            <ul>
                                <li style="list-style-type:none; font-size:20px;"><a href="addGroup.php" target="_self">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>+add</strong></a></li>
                            </ul>
                            <?php
                                $usergrps="select gid,gname from groups where uid='$uid'";
                                $usergrps_result=mysqli_query($con,$usergrps) or die(mysqli_error($con));
                                while($row=mysqli_fetch_array($usergrps_result)){
                                    $url="addEvent.php?gid=".$row['gid'];
                                    $url2="deleteGroup.php?gid=".$row['gid'];
                                    ?>
                                    <li style="font-size:18px;"><a href="<?php echo $url; ?>"><span class="glyphicon glyphicon-bookmark"></span> <b><?php echo $row['gname']; ?></b></a></li>
                                    <a href="<?php echo $url2; ?>" class="btn btn-primary">Delete group</a><br><br>
                                    <?php
                                }
                            ?>
                            <br>
                            
                            <?php
                                $userfriends="select";
                            ?>
                            
                        </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-7 col-xs-offset-1">
                    <div class="panel" style="background-color: #FBF8F8;">
                        <div class="panel-heading">
                            <center><h1 style="color:grey; height:20px;" ><b>Dashboard</b></h1></center>
                        </div>
                        <div class="panel-body">
                           <ul style="list-style-type:none;width:100%;">
                           <?php
                                $usergrps="select gid,gname from groups where uid='$uid'";
                                $usergrps_result=mysqli_query($con,$usergrps) or die(mysqli_error($con));
                                while($row=mysqli_fetch_array($usergrps_result)){
                                    $url="addEvent.php?gid=".$row['gid'];
                                    $gid=$row['gid'];
                                    ?>
                                    <li style="font-size:25px;"><a href="<?php echo $url ?>"><span class="glyphicon glyphicon-menu-right"></span> <b><?php echo $row['gname']; ?></b></a></li>
                                    <?php 
                                    $events_query="select * from event where gid='$gid'";
                                    $events_query_result=mysqli_query($con,$events_query) or die(mysqli_error($con));
                                    $num_rows= mysqli_num_rows($events_query_result);
                                    if($num_rows>0){
                                        ?>
                                        <legend><span style="color:LightSeaGreen;font:strong; font-size:20px;"> Events in this group :</span></legend>
                                        <?php

                                        while($row=mysqli_fetch_array($events_query_result)){
                                            $url="eventDetails.php?eid=".$row['eid'];
                                        ?>
                                        <a href="<?php echo $url;?>"><p><span class="glyphicon glyphicon-menu-right"></span><?php echo $row['ename']; ?></p></a>
                                        <?php
                                        }
                                    }else{
                                        ?>
                                        <p>No events in this group.</p>
                                        <?php
                                    }
                                }
                            ?>
                           </ul>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </body>
</html>