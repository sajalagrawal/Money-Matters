<?php
    require 'connection.php';
    session_start();
    $gid=$_GET['gid'];
    $delquery="delete from groups where gid='$gid'";
    $del_result=mysqli_query($con,$delquery) or die(mysqli_error($con));
    $delmem="delete from grpmembers where gid='$gid'";
    $delmem_result=mysqli_query($con,$delmem) or die(mysqli_error($con));
    $delevent="delete from event where gid='$gid'";
    $delevent_result=mysqli_query($con,$delevent) or die(mysqli_error($con));
    $share_query="delete from eventexpense where eid IN (select eid from event where gid='$gid')";
    $share_result=mysqli_query($con,$share_query) or die(mysqli_error($con));
    header("location: dashboard.php");
?>