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
                    <?php
                    $eid=$_GET['eid'];
                    $enamequery="select * from event where eid='$eid'";
                    $enamequery_result=mysqli_query($con,$enamequery) or die(mysqli_error($con));
                    $row=mysqli_fetch_array($enamequery_result);
                    $ename=$row['ename'];
                    $gid=$row['gid'];
                    $gnamequery="select gname,noofmem from groups where gid='$gid'";
                    $gnamequery_result=mysqli_query($con,$gnamequery) or die(mysqli_error($con));
                    $row2=mysqli_fetch_array($gnamequery_result);
                    $gname=$row2['gname'];
                    $noofmem=$row2['noofmem'];
                    ?>
                    <legend><span style="color:LightSeaGreen;font:strong; font-size:28px;"> Group: </span><?php echo $gname;?></legend>
                    <legend><span style="color:LightSeaGreen;font:strong; font-size:26px;"> Event: </span><?php echo $ename;?></legend>
                    <legend><span style="color:LightSeaGreen;font:strong; font-size:24px;"></span>Share details:</legend>
                    <?php
                    $eventdet="select * from eventexpense where eid='$eid'";
                    $eventdet_result=mysqli_query($con,$eventdet) or die(mysqli_error($con));
                    $share=[];
                    $member=[];
                    $total=0;
                    $counter=0;
                    ?>
                    <table class="table table-responsive table-striped table-bordered">
                    <col width="150">
                    <col width="400">
                    <tbody>
                    <?php
                    while($row3=mysqli_fetch_array($eventdet_result)){
                    ?>
                    <tr>
                        <td style="font-size:16px;"><?php echo $row3['memname']; $member[$counter]=$row3['memname'];?></td>
                        <td style="font-size:16px;">Rs. <?php echo $row3['share'];  $share[$counter]=$row3['share']; $counter++; $total+=$row3['share']?></td>
                    </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                    </table>
                    <p><span style="color:LightSeaGreen;font:strong; font-size:24px;">Total expense: <?php echo $total;?></span></p>
                    <?php 
                       //for($i=0; $i<$noofmem;$i++)echo $members[$i]." ".$share[$i]." ";
                       $lshare=$share[0];
                       //echo "total=".$total."<br>";
                       //print_r($share);
                       
                       $avg=$total/$noofmem;
                       //echo "avg=".$avg."<br>";
                       $group_leader_owe=$avg-$lshare;
                       
                       $owe_p=[];
                       $owe_n=[];
                       for($i=0;$i<$noofmem;$i++){
                           $owe_n[$i]=-9999;
                           $owe_p[$i]=-9999;
                       }
                       $member_p=[];
                       $member_n=[];
                       for($i=0;$i<$noofmem;$i++)
                       {
                           $owe[$i]=$avg-$share[$i];    
                       }
                      // echo "owe:";
                      // print_r($owe);
                      // echo "<br>";
                       for($i=1;$i<$noofmem;$i++){                           
                           if($owe[$i]>0){
                              $owe_p[$i]=$owe[$i];
                              $member_p[$i]=$member[$i];
                           }
                           else if($owe[$i]<0){
                               $owe_n[$i]=$owe[$i];
                               $member_n[$i]=$member[$i];
                           }
                           else{
                               //nothing
                           }
                       }
                       /*
                       echo "owe p :";
                       print_r($owe_p);
                       echo "<br>";
                       echo "owe n:";
                       print_r($owe_n);
                       echo "<br>";
                       echo "member p:";
                       print_r($member_p);
                       echo "<br>";
                       echo "member n:";
                       print_r($member_n);
                       */
                       $i=0;
                       for($i=0;$i<$noofmem-1;$i++){
                           for($j=0;$j<$noofmem-$i-1;$j++){//descending
                               if($owe_p[$j]!=-9999 and $owe_p[$j+1]!=-9999 and $owe_p[$j]<$owe_p[$j+1]){
                                   $temp=$owe_p[$j];
                                   $owe_p[$j]=$owe_p[$j+1];
                                   $owe_p[$j+1]=$temp;
                                   $temp2=$member_p[$j];
                                   $member_p[$j]=$member_p[$j+1];
                                   $member_p[$j+1]=$temp2;
                               }
                           }
                       }
                       for($i=0;$i<$noofmem-1;$i++){
                           for($j=0;$j<$noofmem-$i-1;$j++){//ascending
                               if($owe_n[$j]!=-9999 and $owe_n[$j+1]!=-9999 and $owe_n[$j]>$owe_n[$j+1]){
                                   $temp=$owe_n[$j];
                                   $owe_n[$j]=$owe_n[$j+1];
                                   $owe_n[$j+1]=$temp;
                                   $temp2=$member_n[$j];
                                   $member_n[$j]=$member_n[$j+1];
                                   $member_n[$j+1]=$temp2;
                               }
                           }
                       }
                       /*
                       echo "owe p :";
                       print_r($owe_p);
                       echo "<br>";
                       echo "owe n:";
                       print_r($owe_n);
                       echo "<br>";
                       echo "member p:";
                       print_r($member_p);
                       echo "<br>";
                       echo "member n:";
                       print_r($member_n);
                       echo "<br>";
                       */
                       if($group_leader_owe>0) {
                           $owe_leader=($group_leader_owe);
                           $diff=$owe_leader;
                           $i=0;
                           while($i<$noofmem){
                               if($owe_n[$i]!=-9999){
                                   echo "You owe ".min($diff,-$owe_n[$i])." to ".$member_n[$i]."<br>";
                                   $diff=$diff-min($diff,-$owe_n[$i]);
                               }
                               $i++;
                           }
                           //if($diff==$owe_leader)
                           //{
                           //   echo "GroupLeader owes".(-$owe_leader)." to ".$member_n[$i]."<br>"; 
                           //}
                       }
                       else if($group_leader_owe==0){
                           echo "No transactions required to be done by you.";
                       }
                       else {
                           $owe_leader=-($group_leader_owe);
                           $diff=$owe_leader;
                           $i=0;
                           while($i<$noofmem){
                               if($owe_p[$i]!=-9999){
                                   echo $member_p[$i]." owes You ".min($diff,$owe_p[$i])."<br>";
                                   $diff=$diff-min($diff,$owe_p[$i]);
                               }
                               $i++;
                           }
                           //if($diff==$owe_leader)
                           //{
                           //    echo $member_p[$i]." owes GroupLeader".($owe_leader)."<br>";
                           ///}
                       }
                    ?>
            </div>
    </div>
    </body>
</html>