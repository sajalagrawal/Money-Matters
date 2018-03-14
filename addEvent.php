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
                <div class="col-xs-3">
                    <br><br>
                    <?php 
                        $gid=$_GET['gid'];
                        $events_query="select * from event where gid='$gid'";
                        $events_query_result=mysqli_query($con,$events_query) or die(mysqli_error($con));
                        $num_rows= mysqli_num_rows($events_query_result);
                        $gnamequery="select gname from groups where gid='$gid'";
                        $gnamequery_result=mysqli_query($con,$gnamequery) or die(mysqli_error($con));
                        $row2=mysqli_fetch_array($gnamequery_result);
                        $gname=$row2['gname'];
                        ?>
                        <legend><span style="color:LightSeaGreen;font:strong; font-size:28px;"> Group: </span><?php echo $gname;?></legend>
                        <?php
                        if($num_rows>0){
                            ?>
                            <legend><span style="color:LightSeaGreen;font:strong; font-size:26px;"> Events in this group :</span></legend>
                            <?php
                            
                            while($row=mysqli_fetch_array($events_query_result)){
                                $url="eventDetails.php?eid=".$row['eid'];
                                $url2="deleteEvent.php?eid=".$row['eid']."&gid=".$gid;
                            ?>
                            <a href="<?php echo $url;?>"><p id="autoResize"><span class="glyphicon glyphicon-menu-right"></span><?php echo $row['ename']; ?></p></a>
                            <a href="<?php echo $url2;?>" class="btn btn-primary">Delete event</a><br><br>
                            <?php
                            }
                        }else{
                            ?>
                            <p id="autoResize">No events in this group.</p>
                            <?php
                        }
                        ?>
                </div>
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="panel" style="background-color: #FBF8F8;">
                        <div class="panel-heading">
                            <center><h2><stong>ADD EVENT</strong></h2></center>
                        </div>
                        <div class="panel-body">
                            <?php 
                                $gid=$_GET['gid'];
                                $memquery="select noofmem from groups where gid='$gid'";
                                $memquery_result=mysqli_query($con,$memquery) or die(mysqli_error($con));
                                $row1=mysqli_fetch_array($memquery_result);
                                $noofmem=$row1['noofmem'];
                                $url="addEvent_script.php?noofmem=".$noofmem."&gid=".$gid;
                            ?>
                            
                            <form method="post" action="<?php echo $url;?>">
                                <legend>Name your <span style="color:LightSeaGreen;font:strong;"> EVENT :</span></legend>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="ename" placeholder="Event name" required>
                                </div>
                                <legend><span style="color:LightCoral;font:strong;"> Share of each member:</span></legend>
                                <?php 
                                    $gid=$_GET['gid'];
                                    $grpmem="select mname from grpmembers where gid='$gid' order by inorder  ";
                                    $grpmem_result=mysqli_query($con,$grpmem) or die(mysqli_error($con));
                                    $counter=1;
                                    while($row=mysqli_fetch_array($grpmem_result)){
                                        $memname=$row['mname'];
                                        ?>
                                        <div class="form-group">
                                            <input type="text" name="<?php echo "mem".$counter;  ?>" class="form-control" value="<?php echo $memname; ?>" required><br>
                                            <input type="number" name="<?php echo "share".$counter; $counter++; ?>" class="form-control" placeholder="share" required><br>
                                        </div>
                                        <?php
                                    }
                                ?>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-default btn-primary btn-block" value="Create event">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </body>
</html>