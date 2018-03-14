<?php
    require 'connection.php';
    session_start();
    $eid=$_GET['eid'];
    $gid=$_GET['gid'];
    $delquery="delete from event where eid='$eid'";
    $del_result=mysqli_query($con,$delquery) or die(mysqli_error($con));
    $delmem="delete from eventexpense where eid='$eid'";
    $delmem_result=mysqli_query($con,$delmem) or die(mysqli_error($con));
    $url3="addEvent.php?gid=".$gid;
    header("location: $url3");
?>